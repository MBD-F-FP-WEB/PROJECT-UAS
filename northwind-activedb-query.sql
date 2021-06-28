-------------------------------------------------------------------------------------------------------------
-- INCREMENT ID PER TABLE
-------------------------------------------------------------------------------------------------------------
-- table region
CREATE SEQUENCE region_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 5;

CREATE OR REPLACE FUNCTION add_new_region_func()
RETURNS TRIGGER
AS $add_new_region_func$
BEGIN
	IF NEW.id_region IS NULL
	THEN
		NEW.id_region := NEXTVAL('region_seq');
	END IF;
	RETURN NEW;
END;
$add_new_region_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_region
BEFORE INSERT ON region
FOR EACH ROW
EXECUTE PROCEDURE add_new_region_func();

-- table employees
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

-- us_states
CREATE SEQUENCE us_states_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 10;

CREATE OR REPLACE FUNCTION add_new_us_states_func()
RETURNS TRIGGER
AS $add_new_us_states_func$
BEGIN
	IF NEW.us_states_id IS NULL
	THEN
		NEW.us_states_id := NEXTVAL('us_states_seq');
	END IF;
	RETURN NEW;
END;
$add_new_us_states_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_us_states
BEFORE INSERT ON us_states
FOR EACH ROW
EXECUTE PROCEDURE add_new_us_states_func();

-- shippers
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

-- categories
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

-- suppliers
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

-- products
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

-- orders
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


-------------------------------------------------------------------------------------------------------------
-- MENGUBAH TANGGAL RESERVASI SESUAI WAKTU SAAT ITU
-------------------------------------------------------------------------------------------------------------




-------------------------------------------------------------------------------------------------------------
-- VIEW REKAP PEMASUKAN
-------------------------------------------------------------------------------------------------------------




-------------------------------------------------------------------------------------------------------------
-- VIEW REKAP TERBOOKING
-------------------------------------------------------------------------------------------------------------




-------------------------------------------------------------------------------------------------------------
-- MENAMBAH SESI JIKA PENGGUNAAN MELEBIHI WAKTU SEHARUSNYA
-------------------------------------------------------------------------------------------------------------




-------------------------------------------------------------------------------------------------------------
-- PROCEDURE INSERT PEMINJAM
-------------------------------------------------------------------------------------------------------------



