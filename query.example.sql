CREATE TABLE peminjam (
    id_peminjam INTEGER,
    nama_peminjam VARCHAR(50),
    alamat_peminjam VARCHAR(80),
    telp_peminjam VARCHAR(12),
    PRIMARY KEY(id_peminjam)
);

CREATE TABLE lapangan (
    id_lapangan INTEGER ,
    nama_lapangan VARCHAR(20),
    tarif_lapangan INTEGER,
    nama_pengelola VARCHAR(50),
    alamat_pengelola VARCHAR(80),
    telp_pengelola VARCHAR(12),
    PRIMARY KEY(id_lapangan)
);

CREATE TABLE komplain (
    id_komplain INTEGER,
    id_peminjam INTEGER,
    tgl_komplain DATE,
    judul_komplain VARCHAR(50),
    isi_komplain TEXT,
    PRIMARY KEY (id_komplain),
    CONSTRAINT fk_k_to_peminjam
        FOREIGN KEY (id_peminjam) 
        REFERENCES peminjam(id_peminjam)
);

CREATE TABLE reservasi(
    id_reservasi INTEGER,
    id_peminjam INTEGER,
    tgl_booking DATE,
    tgl_reservasi DATE,
    status_reservasi VARCHAR(10),
    nama_tiperes VARCHAR(50),
    waktu_mulai_sesi TIME,
    jumlah_sesi INTEGER,
    waktu_realisasi_sesi TIME,
    denda_reservasi INTEGER,
    PRIMARY KEY(id_reservasi),
    CONSTRAINT fk_r_to_peminjam
        FOREIGN KEY(id_peminjam)
        REFERENCES peminjam(id_peminjam)
);

CREATE TABLE fasilitas_lapangan (
    id_fasil INTEGER,
    nama_fasil VARCHAR(20),
    kondisi_fasil VARCHAR(20),
    biaya_fasil INTEGER,
    PRIMARY KEY(id_fasil)
);

CREATE TABLE reservasi_lapangan(
    id_lapangan INTEGER,
    id_reservasi INTEGER,
    CONSTRAINT fk_rl_to_lapangan
        FOREIGN KEY(id_lapangan)
        REFERENCES lapangan(id_lapangan),
    CONSTRAINT fk_rl_to_reservasi
        FOREIGN KEY(id_reservasi)
        REFERENCES reservasi(id_reservasi)
);

CREATE TABLE reservasi_fasilitas(
    id_reservasi INTEGER,
    id_fasil INTEGER,
    CONSTRAINT fk_rf_to_fasilitas
        FOREIGN KEY(id_fasil)
        REFERENCES fasilitas_lapangan(id_fasil),
    CONSTRAINT fk_rf_to_reservasi
        FOREIGN KEY(id_reservasi)
        REFERENCES reservasi(id_reservasi)
);

-------------------------------------------------------------------------------------------------------------
-- INSERT DATA
-------------------------------------------------------------------------------------------------------------

INSERT INTO peminjam VALUES (1, 'Agus', 'Asrama ITS', '081555333111');
INSERT INTO peminjam VALUES (2, 'Budi', 'Keputih, Sukolilo', '081444333222');
INSERT INTO peminjam VALUES (3, 'Dodi', 'Perumdos E', '081999000555');

INSERT INTO lapangan VALUES (1, 'Sepak bola', 100000, 'Gunawan', 'Sukolilo, Sukolilo', '081333444555');
INSERT INTO lapangan VALUES (2, 'Badminton', 120000, 'Dwi', 'Baturejo, Sukolilo', '081888222444');
INSERT INTO lapangan VALUES (3, 'Basket', 90000, 'Wahyu', 'Keputih, Sukolilo', '081000777555');

INSERT INTO komplain VALUES (1, 1, NOW(), 'komplain 1', 'isi komplain 1');
INSERT INTO komplain VALUES (2, 2, NOW(), 'komplain 2', 'isi komplain 2');
INSERT INTO komplain VALUES (3, 3, NOW(), 'komplain 3', 'isi komplain 3');

INSERT INTO reservasi VALUES (1, 1, NOW(), NOW(), 'ditunda', 'rutin', NOW(), 1, NOW(), 0);
INSERT INTO reservasi VALUES (2, 1, NOW(), NOW(), 'dibayar', 'accidental', NOW(), 1, NOW(), 0);
INSERT INTO reservasi VALUES (3, 2, NOW(), NOW(), 'bermain', 'rutin', NOW(), 2, NOW(), 0);
INSERT INTO reservasi VALUES (4, 2, NOW(), NOW(), 'bermain', 'rutin', NOW(), 1, NOW(), 0);
INSERT INTO reservasi VALUES (5, 3, NOW(), NOW(), 'selesai', 'rutin', NOW(), 1, NOW(), 0);

INSERT INTO fasilitas_lapangan VALUES (1, 'Bola basket', 'baik', 25000);
INSERT INTO fasilitas_lapangan VALUES (2, 'Bola Futsal', 'sedang', 25000);
INSERT INTO fasilitas_lapangan VALUES (3, 'Raket Badminton', 'baik', 40000);
INSERT INTO fasilitas_lapangan VALUES (4, 'Raket Tenis', 'buruk', 30000);
INSERT INTO fasilitas_lapangan VALUES (5, 'Bet Pingpong', 'baik', 20000);

INSERT INTO reservasi_lapangan VALUES (1, 1);
INSERT INTO reservasi_lapangan VALUES (2, 2);
INSERT INTO reservasi_lapangan VALUES (3, 2);
INSERT INTO reservasi_lapangan VALUES (1, 3);
INSERT INTO reservasi_lapangan VALUES (2, 3);
INSERT INTO reservasi_lapangan VALUES (3, 4);
INSERT INTO reservasi_lapangan VALUES (1, 5);
INSERT INTO reservasi_lapangan VALUES (2, 5);

INSERT INTO reservasi_fasilitas VALUES (1, 1);
INSERT INTO reservasi_fasilitas VALUES (2, 3);
INSERT INTO reservasi_fasilitas VALUES (3, 5);


-------------------------------------------------------------------------------------------------------------
-- INCREMENT ID PER TABLE
-------------------------------------------------------------------------------------------------------------
-- table peminjam
CREATE SEQUENCE peminjam_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 1;

CREATE OR REPLACE FUNCTION add_new_peminjam_func()
RETURNS TRIGGER
AS $add_new_peminjam_func$
BEGIN
	IF NEW.id_peminjam IS NULL
	THEN
		NEW.id_peminjam := NEXTVAL('peminjam_seq');
	END IF;
	RETURN NEW;
END;
$add_new_peminjam_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_peminjam
BEFORE INSERT ON peminjam
FOR EACH ROW
EXECUTE PROCEDURE add_new_peminjam_func();


-- table lapangan
CREATE SEQUENCE lapangan_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 1;

CREATE OR REPLACE FUNCTION add_new_lapangan_func()
RETURNS TRIGGER
AS $add_new_lapangan_func$
BEGIN
	IF NEW.id_lapangan IS NULL
	THEN
		NEW.id_lapangan := NEXTVAL('lapangan_seq');
	END IF;
	RETURN NEW;
END;
$add_new_lapangan_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_lapangan
BEFORE INSERT ON lapangan
FOR EACH ROW
EXECUTE PROCEDURE add_new_lapangan_func();


-- table komplain
CREATE SEQUENCE komplain_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 1;

CREATE OR REPLACE FUNCTION add_new_komplain_func()
RETURNS TRIGGER
AS $add_new_komplain_func$
BEGIN
	IF NEW.id_komplain IS NULL
	THEN
		NEW.id_komplain := NEXTVAL('komplain_seq');
	END IF;
	RETURN NEW;
END;
$add_new_komplain_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_komplain
BEFORE INSERT ON komplain
FOR EACH ROW
EXECUTE PROCEDURE add_new_komplain_func();


-- table reservasi
CREATE SEQUENCE reservasi_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 1;

CREATE OR REPLACE FUNCTION add_new_reservasi_func()
RETURNS TRIGGER
AS $add_new_reservasi_func$
BEGIN
	IF NEW.id_reservasi IS NULL
	THEN
		NEW.id_reservasi := NEXTVAL('reservasi_seq');
	END IF;
	RETURN NEW;
END;
$add_new_reservasi_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_reservasi
BEFORE INSERT ON reservasi
FOR EACH ROW
EXECUTE PROCEDURE add_new_reservasi_func();

-- table fasilitas_lapangan
CREATE SEQUENCE fasilitas_lapangan_seq
AS INTEGER
INCREMENT BY 1
MINVALUE 1
MAXVALUE 9999
START WITH 1;

CREATE OR REPLACE FUNCTION add_new_fasilitas_lapangan_func()
RETURNS TRIGGER
AS $add_new_fasilitas_lapangan_func$
BEGIN
	IF NEW.id_fasil IS NULL
	THEN
		NEW.id_fasil := NEXTVAL('fasilitas_lapangan_seq');
	END IF;
	RETURN NEW;
END;
$add_new_fasilitas_lapangan_func$ LANGUAGE PLPGSQL;

CREATE TRIGGER add_new_fasilitas_lapangan
BEFORE INSERT ON fasilitas_lapangan
FOR EACH ROW
EXECUTE PROCEDURE add_new_fasilitas_lapangan_func();

-------------------------------------------------------------------------------------------------------------
-- MENGUBAH TANGGAL RESERVASI SESUAI WAKTU SAAT ITU
-------------------------------------------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION proses_ubah_tgl_reservasi() RETURNS TRIGGER AS $$
BEGIN
IF (TG_OP = 'INSERT') THEN
	NEW.tgl_reservasi := current_timestamp;
	RETURN NEW;
ELSEIF (TG_OP = 'UPDATE') THEN
	NEW.tgl_reservasi := current_timestamp;
	RETURN NEW;
END IF;
END;
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER ubah_tgl_reservasi
BEFORE INSERT OR UPDATE ON reservasi
FOR EACH ROW
EXECUTE PROCEDURE proses_ubah_tgl_reservasi();

-------------------------------------------------------------------------------------------------------------
-- VIEW REKAP PEMASUKAN
-------------------------------------------------------------------------------------------------------------
CREATE OR REPLACE VIEW rekap_pemasukan_bulanan AS
SELECT 
	t1.tgl_booking, 
	t1.denda, 
	t1.pemasukan, 
	t2.pemasukan_fasil,
	(t1.denda + t1.pemasukan + t2.pemasukan_fasil) AS total_pemasukan
FROM (
	SELECT
		tgl_booking, 
		SUM(denda_reservasi) AS denda,
		SUM(jumlah_sesi * lapangan.tarif_lapangan) AS pemasukan
	FROM reservasi
	JOIN reservasi_lapangan USING(id_reservasi)
	JOIN lapangan USING(id_lapangan)
	GROUP BY tgl_reservasi
) AS t1
JOIN (
	SELECT
		tgl_booking, 
		SUM(fasilitas_lapangan.biaya_fasil) AS pemasukan_fasil
	FROM reservasi
	JOIN reservasi_fasilitas USING(id_reservasi)
	JOIN fasilitas_lapangan USING(id_fasil)
	GROUP BY tgl_reservasi
) AS t2 USING (tgl_reservasi);

-------------------------------------------------------------------------------------------------------------
-- VIEW REKAP TERBOOKING
-------------------------------------------------------------------------------------------------------------
CREATE OR REPLACE VIEW rekap_jadwal_lapangan_booked AS
SELECT
	lapangan.nama_lapangan,
	reservasi.tgl_book,
	reservasi.waktu_mulai_sesi,
	reservasi.waktu_mulai_sesi
		+ INTERVAL '1' HOUR * reservasi.jumlah_sesi
			AS waktu_selesai
FROM reservasi
JOIN reservasi_lapangan USING(id_reservasi)
JOIN lapangan USING(id_lapangan);

-------------------------------------------------------------------------------------------------------------
-- MENAMBAH SESI JIKA PENGGUNAAN MELEBIHI WAKTU SEHARUSNYA
-------------------------------------------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION check_session()
RETURNS TRIGGER
AS $check_session$
DECLARE
	time_start TIMESTAMP;
	time_end TIMESTAMP;
	time_diff INTEGER;
BEGIN
	time_start := (OLD.tgl_reservasi || ' ' || OLD.waktu_mulai_sesi)::TIMESTAMP;
	time_end := time_start + INTERVAL '1' HOUR * OLD.jumlah_sesi * 2;
	
	IF CURRENT_TIMESTAMP > time_end THEN
		time_diff := DATE_PART('hour', CURRENT_TIMESTAMP - time_end);
		RAISE NOTICE 'Time difference: % start % end %', time_diff, time_start, time_end;

		NEW.denda_reservasi = ((time_diff / 2) + 1)
			* (
				SELECT
					SUM(tarif_lapangan)
				FROM lapangan
				JOIN reservasi_lapangan USING(id_lapangan)
				JOIN reservasi USING(id_reservasi)
				WHERE reservasi.id_reservasi = NEW.id_reservasi
			);
	END IF;
	RETURN NEW;
END;
$check_session$ LANGUAGE PLPGSQL;

CREATE TRIGGER check_session_trigger 
BEFORE UPDATE ON reservasi
FOR EACH ROW
WHEN (NEW.status_reservasi = 'selesai')
EXECUTE PROCEDURE check_session();

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
