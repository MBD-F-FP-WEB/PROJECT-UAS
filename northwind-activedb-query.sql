-------------------------------------------------------------------------------------------------------------
-- INCREMENT ID PER TABLE
-------------------------------------------------------------------------------------------------------------
-- table employee
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
	IF NEW.id_employee IS NULL
	THEN
		NEW.id_employee := NEXTVAL('employee_seq');
	END IF;
	RETURN NEW;
END;
$add_new_employee_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_employee
BEFORE INSERT ON employee
FOR EACH ROW
EXECUTE PROCEDURE add_new_employee_func();

-- table lapangan
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



