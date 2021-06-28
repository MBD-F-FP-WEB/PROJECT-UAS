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
-- function: MENGUBAH TANGGAL ORDER SESUAI WAKTU SAAT ITU
-------------------------------------------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION proses_ubah_order_date() RETURNS TRIGGER AS $$
BEGIN
IF (TG_OP = 'INSERT') THEN
	NEW.order_date := current_timestamp;
	RETURN NEW;
ELSEIF (TG_OP = 'UPDATE') THEN
	NEW.order_date := current_timestamp;
	RETURN NEW;
END IF;
END;
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER ubah_order_date
BEFORE INSERT OR UPDATE ON order
FOR EACH ROW
EXECUTE PROCEDURE proses_ubah_order_date();



-------------------------------------------------------------------------------------------------------------
-- function: required date diubah ke tanggal sekarang misal kurang dari order date
-------------------------------------------------------------------------------------------------------------
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


-- function: 
-- CREATE OR REPLACE FUNCTION show_description  (i_course_no number)
-- RETURN varchar2
-- AS
-- 	v_description varchar2(50);
-- BEGIN
-- 	SELECT description
-- 		INTO v_description
-- 		FROM course
-- 		WHERE course_no = i_course_no;
-- 	RETURN v_description;
-- EXCEPTION
-- 	WHEN NO_DATA_FOUND
-- 	THEN
-- 		RETURN('The Course is not in the database');
-- 	WHEN OTHERS
-- 	THEN
-- 		RETURN('Error in running show_description');
-- END;

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



CREATE OR REPLACE PROCEDURE insert_peminjam (nama_peminjam VARCHAR, alamat_peminjam VARCHAR, telp_peminjam VARCHAR)
LANGUAGE SQL
AS $$
INSERT INTO peminjam(nama_peminjam, alamat_peminjam, telp_peminjam) VALUES (nama_peminjam, alamat_peminjam, telp_peminjam);
$$

CALL insert_peminjam('Doni', 'Surabaya timur', '086888777555');
SELECT * FROM peminjam;
