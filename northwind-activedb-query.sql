-- SFT:INCREMENT EMPLOYEE ID
--------------------------------
-- select * from shippers order by shipper_id desc
CREATE SEQUENCE employee_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
CREATE OR REPLACE FUNCTION add_new_employee_func()
RETURNS TRIGGER
AS $add_new_employee_func$
BEGIN
  IF NEW.employee_id IS NULL
  THEN
    NEW.employee_id := NEXTVAL('employee_seq');
  END IF;
  RETURN NEW;
END;
$add_new_employee_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_employee
BEFORE INSERT ON employees
FOR EACH ROW
EXECUTE PROCEDURE add_new_employee_func();

-- SFT:INCREMENT SHIPPER ID
--------------------------------
-- select * from shippers order by shipper_id desc
CREATE SEQUENCE shipper_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 7;
 
CREATE OR REPLACE FUNCTION add_new_shipper_func()
RETURNS TRIGGER
AS $add_new_shipper_func$
BEGIN
  IF NEW.shipper_id IS NULL
  THEN
    NEW.shipper_id := NEXTVAL('shipper_seq');
  END IF;
  RETURN NEW;
END;
$add_new_shipper_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_shipper
BEFORE INSERT ON shippers
FOR EACH ROW
EXECUTE PROCEDURE add_new_shipper_func();
 
-- SFT:INCREMENT CATEGORY ID
--------------------------------
-- select * from categories order by category_id desc
CREATE SEQUENCE category_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 9;
 
CREATE OR REPLACE FUNCTION add_new_category_func()
RETURNS TRIGGER
AS $add_new_category_func$
BEGIN
  IF NEW.category_id IS NULL
  THEN
    NEW.category_id := NEXTVAL('category_seq');
  END IF;
  RETURN NEW;
END;
$add_new_category_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_category
BEFORE INSERT ON categories
FOR EACH ROW
EXECUTE PROCEDURE add_new_category_func();
 
-- SFT:INCREMENT SUPPLIER ID
--------------------------------
-- select * from suppliers order by supplier_id desc
CREATE SEQUENCE supplier_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 30;
 
CREATE OR REPLACE FUNCTION add_new_supplier_func()
RETURNS TRIGGER
AS $add_new_supplier_func$
BEGIN
  IF NEW.supplier_id IS NULL
  THEN
    NEW.supplier_id := NEXTVAL('supplier_seq');
  END IF;
  RETURN NEW;
END;
$add_new_supplier_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_supplier
BEFORE INSERT ON suppliers
FOR EACH ROW
EXECUTE PROCEDURE add_new_supplier_func();
 
-- SFT:INCREMENT PRODUCT ID
--------------------------------
-- select * from products order by product_id desc
CREATE SEQUENCE product_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 78;
 
CREATE OR REPLACE FUNCTION add_new_product_func()
RETURNS TRIGGER
AS $add_new_product_func$
BEGIN
  IF NEW.product_id IS NULL
  THEN
    NEW.product_id := NEXTVAL('product_seq');
  END IF;
  RETURN NEW;
END;
$add_new_product_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_product
BEFORE INSERT ON products
FOR EACH ROW
EXECUTE PROCEDURE add_new_product_func();
 
-- SFT:INCREMENT ORDER ID
--------------------------------
-- select * from orders order by order_id desc
CREATE SEQUENCE order_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 99999
START WITH 11081;
 
CREATE OR REPLACE FUNCTION add_new_order_func()
RETURNS TRIGGER
AS $add_new_order_func$
BEGIN
  IF NEW.order_id IS NULL
  THEN
    NEW.order_id := NEXTVAL('order_seq');
  END IF;
  RETURN NEW;
END;
$add_new_order_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_order
BEFORE INSERT ON orders
FOR EACH ROW
EXECUTE PROCEDURE add_new_order_func();

-- FT:MENGISI TANGGAL ORDER SESUAI NOW
--------------------------------
CREATE OR REPLACE FUNCTION proses_ubah_tgl_order() 
RETURNS TRIGGER AS 
$$
BEGIN
	NEW.order_date := current_timestamp;
	RETURN NEW;
END;
$$ 
LANGUAGE 'plpgsql';

CREATE TRIGGER ubah_tgl_order
BEFORE INSERT OR UPDATE ON orders
FOR EACH ROW
EXECUTE PROCEDURE proses_ubah_tgl_order();

-- F:HITUNG ORDER PRICE
-------------------------------------------------
CREATE OR REPLACE FUNCTION calc_total (o_id integer)
RETURNS integer AS $total$
declare
    total integer;
BEGIN
   	select SUM(de.unit_price * de.quantity) as totalprice into total
	from order_details as de
	natural join orders as o
	where de.order_id = o_id
	group by de.order_id;
	RETURN total;
END;
$total$ LANGUAGE plpgsql;
--
select calc_total(10248);

-- F:HITUNG ORDER PRICE - DISCOUNT
-------------------------------------------------
CREATE OR REPLACE FUNCTION calc_diskon (o_id integer)
RETURNS integer AS $total$
declare
    total integer;
BEGIN
   	select calc_total(o_id)*(1 - de.discount) as totalprice into total
	from order_details as de
	natural join orders as o
	where de.order_id = o_id
	group by de.order_id, de.discount;
	RETURN total;
END;
$total$ LANGUAGE plpgsql;
--
select calc_diskon(10248);

-- FT:UBAH REQUIRED DATE TO TOMORROW OF ORDER DATE IF < ORDER DATE
--------------------------------------------------
CREATE OR REPLACE FUNCTION proses_ubah_required_date() RETURNS TRIGGER AS $$
BEGIN
IF (TG_OP = 'INSERT' OR NEW.required_date < NEW.order_date) THEN
	NEW.required_date := NEW.order_date + INTERVAL '1' DAY;
	RETURN NEW;
END IF;
END;
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER ubah_required_date
BEFORE INSERT OR UPDATE ON orders
FOR EACH ROW
EXECUTE PROCEDURE proses_ubah_required_date();

-- FT:UBAH SHIPPED DATE TO TOMORROW OF ORDER DATE IF < ORDER DATE
--------------------------------------------------
CREATE OR REPLACE FUNCTION proses_ubah_shipped_date() RETURNS TRIGGER AS $$
BEGIN
IF (TG_OP = 'INSERT' OR NEW.shipped_date < NEW.order_date) THEN
	NEW.shipped_date := NEW.order_date + INTERVAL '1' DAY;
	RETURN NEW;
END IF;
END;
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER ubah_shipped_date
BEFORE INSERT OR UPDATE ON orders
FOR EACH ROW
EXECUTE PROCEDURE proses_ubah_required_date();

-- FT:UPDATE UNIT IN STOCK & UNIT IN ORDER
---------------------------------------
CREATE OR REPLACE FUNCTION jum_unit() 
RETURNS TRIGGER AS 
$$
DECLARE
	q integer;
	p_id integer;
BEGIN
	q := NEW.quantity;
	p_id := NEW.product_id;
	UPDATE products
	SET 
	units_in_stock = units_in_stock - q,
	units_on_order = units_on_order + q
	WHERE product_id = p_id;
	RETURN NULL;
END;
$$ 
LANGUAGE 'plpgsql';

CREATE TRIGGER ubah_jum_unit
AFTER INSERT OR UPDATE ON order_details
FOR EACH ROW
EXECUTE PROCEDURE jum_unit();
--
INSERT INTO order_details VALUES (10248, 75, 8, 25, 0);
select * 
FROM products
where product_id = 75

-- FT:CEK DETAIL ORDER YANG DISCONTINU
-------------------------------------------------
CREATE OR REPLACE FUNCTION cek_continu() 
RETURNS TRIGGER AS 
$$
DECLARE
	p_id integer;
	p_discontinu integer;
BEGIN
	p_id := NEW.product_id;
	
	SELECT discontined into p_discontinu
	from products
	where product_id = p_id;
	
	IF p_discontinu = 1
	THEN
		RAISE EXCEPTION 'Order with Product ID % is discontinu', p_id
      	USING HINT = 'Order dibatalkan';
		RETURN NULL;
	END IF;	
	
	RETURN NEW;
END;
$$ 
LANGUAGE 'plpgsql';

CREATE TRIGGER trig_cek_continu
BEFORE INSERT ON order_details
FOR EACH ROW
EXECUTE PROCEDURE cek_continu();
--
INSERT INTO order_details VALUES (10248, 1, 18, 1, 0);
select * from products


-- P:INSERT ORDER
---------------------
CREATE OR REPLACE PROCEDURE insert_orders (
	customer_id varchar,
	employee_id int,
	required_date date,
	shipped_date date,
	ship_via int,
	freight int,
	ship_name varchar,
	ship_address varchar,
	ship_city varchar,
	ship_region varchar,
	ship_postal_code varchar,
	ship_country varchar
)
LANGUAGE SQL
AS $$
INSERT INTO orders(customer_id, employee_id, required_date, shipped_date, ship_via, freight, ship_name, ship_address, ship_city, ship_region, ship_postal_code, ship_country) 
VALUES (customer_id, employee_id, required_date, shipped_date, ship_via, freight, ship_name, ship_address, ship_city, ship_region, ship_postal_code, ship_country);
$$
--
CALL insert_orders('WOLZA', 2, '1998-06-07', NULL, 2, 8, 'Ship Name', 'Ship Address', 'Ship City', 'NM', '87110', 'ID');

-- P:INSERT SUPPLIER
---------------------
CREATE OR REPLACE PROCEDURE insert_suppliers (
	company_name varchar,
	contact_name varchar,
	contact_title varchar,
	address varchar,
	city varchar,
	region varchar,
	postal_code varchar,
	country varchar,
	phone varchar,
	fax varchar,
	homepage varchar
)
LANGUAGE SQL
AS $$
INSERT INTO suppliers(company_name, contact_name, contact_title, address, city, region, postal_code, country, phone, fax, homepage)
VALUES (company_name, contact_name, contact_title, address, city, region, postal_code, country, phone, fax, homepage);
$$

-- P:INSERT CATEGORY
---------------------
CREATE OR REPLACE PROCEDURE insert_categories (
	category_name varchar,
	description varchar,
	picture bytea
)
LANGUAGE SQL
AS $$
INSERT INTO categories(category_name, description, picture)
VALUES (category_name, description, picture);
$$

-- P:INSERT CUSTOMER
---------------------
CREATE OR REPLACE PROCEDURE insert_customers (
	company_name varchar,
	contact_name varchar,
	contact_title varchar,
	address varchar,
	city varchar,
	region varchar,
	postal_code varchar,
	country varchar,
	phone varchar,
	fax varchar
)
LANGUAGE SQL
AS $$
INSERT INTO customers(company_name, contact_name, contact_title, address, city, region, postal_code, country, phone, fax)
VALUES (company_name, contact_name, contact_title, address, city, region, postal_code, country, phone, fax);
$$

-- P:INSERT PRODUCT
---------------------
CREATE OR REPLACE PROCEDURE insert_products (
	product_name varchar,
	supplier_id int,
	category_id int,
	quantity_per_unit varchar,
	unit_price int,
	units_in_stock int,
	units_on_order int,
	reorder_level int,
	discontined int
)
LANGUAGE SQL
AS $$
INSERT INTO products(product_name, supplier_id, category_id, quantity_per_unit, unit_price, units_in_stock, units_on_order, reorder_level, discontined)
VALUES (product_name, supplier_id, category_id, quantity_per_unit, unit_price, units_in_stock, units_on_order, reorder_level, discontined);
$$

-- P:INSERT SHIPPER
---------------------
CREATE OR REPLACE PROCEDURE insert_shippers (
	company_name varchar,
	phone varchar
)
LANGUAGE SQL
AS $$
INSERT INTO shippers(company_name, phone)
VALUES (company_name, phone);
$$

-- P:INSERT EMPLOYEE
---------------------
CREATE OR REPLACE PROCEDURE insert_employees (
	last_name varchar,
	first_name varchar,
	title varchar,
	title_of_courtesy varchar,
	birth_date date,
	hire_date date,
	address varchar,
	city varchar,
	region varchar,
	postal_code varchar,
	country varchar,
	home_phone varchar,
	extension varchar,
	photo bytea,
	notes text,
	reports_to int,
	photo_path varchar
)
LANGUAGE SQL
AS $$
INSERT INTO employees(last_name, first_name, title, title_of_courtesy, birth_date, hire_date, address, city, region, postal_code, country, home_phone, extension, photo, notes, reports_to, photo_path)
VALUES (last_name, first_name, title, title_of_courtesy, birth_date, hire_date, address, city, region, postal_code, country, home_phone, extension, photo, notes, reports_to, photo_path);
$$

-- P:INSERT REGION
---------------------
CREATE OR REPLACE PROCEDURE insert_region (
	region_description varchar
)
LANGUAGE SQL
AS $$
INSERT INTO region(region_description)
VALUES (region_description);
$$

-- P:INSERT TERRITORIES
---------------------
CREATE OR REPLACE PROCEDURE insert_territories (
	territory_description varchar,
	region_id int
)
LANGUAGE SQL
AS $$
INSERT INTO territories(territory_description, region_id)
VALUES (territory_description, region_id);
$$

-- P:INSERT CUSTOMER
---------------------
CREATE OR REPLACE PROCEDURE insert_customers (
	customer_id varchar,
    company_name varchar,
    contact_name varchar,
    contact_title varchar,
    address varchar,
    city varchar,
    region varchar,
    postal_code varchar,
    country varchar,
    phone varchar,
    fax varchar
)
LANGUAGE SQL
AS $$
INSERT INTO customers(customer_id, company_name, contact_name, contact_title, address, city, region, postal_code, country, phone, fax)
VALUES (customer_id, company_name, contact_name, contact_title, address, city, region, postal_code, country, phone, fax);
$$

-- P:SET DISCOUNT diskon PADA ORDER YANG quantity nya >= jml_produk
---------------------
CREATE OR REPLACE PROCEDURE add_discount(jml_produk INTEGER, diskon NUMERIC)
LANGUAGE plpgsql
AS $$
	DECLARE
		cari_discount CURSOR FOR
			SELECT order_id
			FROM order_details
			GROUP BY order_id
			HAVING SUM(quantity) >= jml_produk AND SUM(discount) = 0;
		d_id INTEGER;
	BEGIN
		OPEN cari_discount;
		LOOP
			FETCH cari_discount INTO d_id;
			
			UPDATE order_details
			SET discount = diskon
			WHERE order_id = d_id;
			
			EXIT WHEN NOT FOUND;
		END LOOP;
	END;
	$$
--
CALL add_discount(100, 0.15);
select * from order_details
where quantity = 100

-- I:INDEXING EACH IMPORTANT TABLE
---------------------------------------
--customers:
CREATE INDEX idx_customer_contact_name ON customers(contact_name);
CREATE INDEX idx_customer_id ON customers(customer_id);
CREATE INDEX idx_customer_region ON customers(region);

--products:
CREATE INDEX idx_product_name_product ON products(product_name);
CREATE INDEX idx_supplier_id_product ON products(supplier_id);

--suppliers:
CREATE INDEX idx_company_name_supplier ON suppliers(company_name);
CREATE INDEX idx_contact_name_supplier ON suppliers(contact_name);

--order:
CREATE INDEX idx_customer_id_order ON orders(customer_id);
CREATE INDEX idx_employee_id_order ON orders(employee_id);

--order_details:
CREATE INDEX idx_product_id_orderdetails ON order_details(product_id);
CREATE INDEX idx_discount_orderdetails ON order_details(discount);

--------------------------------------------
-- aggregate
--------------------------------------------
-- order per bulannya
select to_char(order_date,'Mon') as mon,
       extract(year from order_date) as yyyy,
       count(order_id) as jml
from orders
group by mon, yyyy;

-- shipper paling diminati
select s.company_name as PT, count(order_id) as jml
from orders o 
join shippers s on o.ship_via = s.shipper_id
group by PT

-- category yg paling banyak penjualannya
select ca.category_name, count(order_id) as jml
from products pr
join order_details od on pr.product_id = od.product_id
join categories ca on pr.category_id = ca.category_id
group by ca.category_name

-- order tiap customer
select c.contact_name, count(o.order_id)
from customers c
join orders o on c.customer_id = o.customer_id
group by contact_name

-- kategori yg paling sering dibeli tiap customer nya
select cu.contact_name, max(ca.category_name), count(ca.category_name)
from customers cu
natural join orders o
natural join order_details od
natural join products p
natural join categories ca
group by cu.contact_name

-- produk paling laku
select  order_details.product_id, count(orders.order_id) as orderedtime
from order_details
natural join orders
group by  order_details.product_id
order by orderedtime desc
