-- SFT:INCREMENT EMPLOYEE ID
--------------------------------
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
CREATE SEQUENCE shipper_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
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
CREATE SEQUENCE category_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
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
CREATE SEQUENCE supplier_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
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
CREATE SEQUENCE product_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
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
CREATE SEQUENCE order_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
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

-- SFT:INCREMENT CUSTOMER ID
--------------------------------
CREATE SEQUENCE customer_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
CREATE OR REPLACE FUNCTION add_new_customer_func()
RETURNS TRIGGER
AS $add_new_customer_func$
BEGIN
  IF NEW.order_id IS NULL
  THEN
    NEW.order_id := NEXTVAL('customer_seq');
  END IF;
  RETURN NEW;
END;
$add_new_customer_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_customer
BEFORE INSERT ON customers
FOR EACH ROW
EXECUTE PROCEDURE add_new_customer_func();

-- SFT:INCREMENT ORDER_DETAIL ID
--------------------------------
CREATE SEQUENCE order_detail_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;
 
CREATE OR REPLACE FUNCTION add_new_order_detail_func()
RETURNS TRIGGER
AS $add_new_order_detail_func$
BEGIN
  IF NEW.order_detail_id IS NULL
  THEN
    NEW.order_detail_id := NEXTVAL('order_detail_seq');
  END IF;
  RETURN NEW;
END;
$add_new_order_detail_func$ LANGUAGE PLPGSQL;
 
CREATE TRIGGER add_new_order_detail
BEFORE INSERT ON order_details
FOR EACH ROW
EXECUTE PROCEDURE add_new_order_detail_func();

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

-- FT:UBAH REQUIRED DATE TO NOW IF < ORDER DATE
--------------------------------------------------
CREATE OR REPLACE FUNCTION proses_ubah_required_date() RETURNS TRIGGER AS $$
BEGIN
IF (TG_OP = 'INSERT' || NEW.required_date < NEW.order_date) THEN
	NEW.required_date := NEW.order_date + INTERVAL '1' DAY;
	RETURN NEW;
END IF;
END;
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER ubah_required_date
BEFORE INSERT OR UPDATE ON orders
FOR EACH ROW
EXECUTE PROCEDURE proses_ubah_required_date();

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

-- V:REKAP PEMASUKAN
----------------------------------------
CREATE OR REPLACE VIEW rekap_pemasukan_bulanan AS
SELECT
	order_date,
	SUM(t1.total_price)
FROM orders
JOIN (
	SELECT
		order_id,
		SUM(quantity * unit_price) AS total_price
	FROM order_details
	GROUP BY order_id
) AS t1 USING(order_id)
GROUP BY order_date;

-- V:REKAP PEMBELIAN PER PRODUK
---------------------------------------
CREATE OR REPLACE VIEW rekap_pembelian_per_produk AS
SELECT
	product_name,
	COUNT(
		SELECT COUNT(od.order_id)
		FROM order_details
		WHERE od.product_id=p.product_id
	) AS order_count
FROM products AS p;