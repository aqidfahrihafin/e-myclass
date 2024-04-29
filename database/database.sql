-- tabele data lembaga

CREATE TABLE lembaga (
    lembaga_id VARCHAR(32) PRIMARY KEY, 
    nama_lembaga VARCHAR(255),
    nsm VARCHAR(20),
    npsm VARCHAR(20),
    alamat TEXT,
    kecamatan VARCHAR(50),
    kabupaten VARCHAR(50),
    provinsi VARCHAR(50),
    logo VARCHAR(255),
    dosen_id VARCHAR(36),
    pimpinan VARCHAR(255),
    nip VARCHAR(20),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (dosen_id) REFERENCES dosen(dosen_id) ON DELETE SET NULL
);

INSERT INTO lembaga (lembaga_id, nama_lembaga, nsm, npsm, alamat, kecamatan, kabupaten, provinsi, logo, dosen_id, pimpinan, nip)
VALUES 
(MD5('1'), 'lembaga Apins Digital', '1234567890', '0987654321', 'Jl. Raya lembaga No. 123', 'Kota', 'Kabupaten A', 'Provinsi X', 'logo.png', NULL, 'Nama Pimpinan', '12345');



-- tabel mahasiswa
CREATE TABLE mahasiswa (
  mahasiswa_id VARCHAR(36) PRIMARY KEY,
  prodi_id VARCHAR(255),
  nim VARCHAR(10),
  no_card VARCHAR(4),
  nama_mahasiswa VARCHAR(100),
  tempat_lahir VARCHAR(30),
  tanggal_lahir DATE,
  jenis_kelamin VARCHAR(10),
  alamat_mahasiswa TEXT,
  email VARCHAR(100),
  telp_mahasiswa VARCHAR(20),
  photo VARCHAR(255),
  status ENUM('aktif',  'lulus', 'non-aktif'),
	tahun_ajaran_id VARCHAR(100)  NULL,
	tanggal_masuk VARCHAR(100)  NULL,
	create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (prodi_id) REFERENCES prodi (prodi_id),
	FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran (tahun_ajaran_id)
);

INSERT INTO mahasiswa (mahasiswa_id, nim, nik, no_kk, nama_mahasiswa, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_mahasiswa, email, telp_mahasiswa, nama_ayah, alamat_ayah, pendidikan_ayah, pekerjaan_ayah, telp_ayah, nama_ibu, alamat_ibu, pendidikan_ibu, pekerjaan_ibu, telp_ibu, photo, status)
VALUES 
(MD5('1'), '1234567890', '1234567890123456', '1234567890123456', 'Aqid', 'Jakarta', '2000-01-01', 'Laki-laki', 'Jl. Raya No. 123', 'ali@example.com', '081234567890', 'Abdul', 'Jl. Baru No. 456', 'SMA', 'PNS', '081234567891', 'Fatimah', 'Jl. Lama No. 789', 'SMA', 'Ibu Rumah Tangga', '081234567892', 'user.png', 'non-aktif');

-- tabel dosen
CREATE TABLE dosen (
  dosen_id VARCHAR(36) PRIMARY KEY,
  prodi_id VARCHAR(36),
  nidn VARCHAR(20),
  no_card VARCHAR(4),
  nama_dosen VARCHAR(100),
  tempat_lahir VARCHAR(30),
  tanggal_lahir DATE,
  jenis_kelamin VARCHAR(10),
  alamat_dosen TEXT,
  telp_dosen VARCHAR(20),
  pendidikan VARCHAR(20),
  qrcode VARCHAR(255),
  photo VARCHAR(255),
  status ENUM('aktif', 'non-aktif'),
	create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (prodi_id) REFERENCES prodi (prodi_id)
);

INSERT INTO dosen (dosen_id, nidn, nik, nama_dosen, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_dosen, telp_dosen, pendidikan, photo, status)
VALUES 
(MD5('4'), '1234567890', '1234567890123456', 'apins', 'Jakarta', '1980-01-01', 'Laki-laki', 'Jl. Raya No. 123', '081234567890', 'Sarjana (S1)', 'user.png', 'aktif');



-- tahun ajaran 
CREATE TABLE tahun_ajaran (
    tahun_ajaran_id VARCHAR(36) NOT NULL,
    kode_tahun VARCHAR(20) NOT NULL,
    nama_tahun VARCHAR(100) NOT NULL,
		create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('aktif', 'non-aktif') DEFAULT 'non-aktif',
    PRIMARY KEY (tahun_ajaran_id),
    UNIQUE INDEX idx_tahun_ajaran_kode_tahun (kode_tahun)
);


-- mata fakultas
CREATE TABLE fakultas (
  fakultas_id varchar(36) NOT NULL,
  kode_fakultas varchar(50) NOT NULL,
  nama_fakultas varchar(50) NOT NULL,
	create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (fakultas_id)
);

-- data prodi
CREATE TABLE prodi (
    prodi_id VARCHAR(36) NOT NULL,
    fakultas_id VARCHAR(50) NOT NULL,
    kode_prodi VARCHAR(255),
    nama_prodi VARCHAR(255),
    PRIMARY KEY (prodi_id),
    FOREIGN KEY (fakultas_id) REFERENCES fakultas (fakultas_id) ON DELETE CASCADE,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- data semester
CREATE TABLE semester (
  semester_id varchar(36) NOT NULL,
  semester varchar(36) NOT NULL,
  tahun_ajaran_id varchar(36) NOT NULL,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (semester_id),
  FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran (tahun_ajaran_id) ON DELETE CASCADE
);

-- tabel user
CREATE TABLE users (
  user_id varchar(36) NOT NULL,
  username varchar(36) NOT NULL,
  password varchar(255) NOT NULL,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	role ENUM('admin', 'bmsi','dosen','mahasiswa') DEFAULT 'mahasiswa',
  PRIMARY KEY (user_id),
	FOREIGN KEY (user_id) REFERENCES dosen (dosen_id) ON DELETE CASCADE
);

-- tabel users profile
CREATE TABLE users_profile (
  users_profile_id varchar(36) NOT NULL,
  user_id varchar(36) NULL,
  dosen_id varchar(36) NULL,
  mahasiswa_id varchar(36) NULL,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (users_profile_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  FOREIGN KEY (dosen_id) REFERENCES dosen (dosen_id) ON DELETE CASCADE,
  FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa (mahasiswa_id) ON DELETE CASCADE
);

-- tabel prestasi
CREATE TABLE prestasi (
    prestasi_id VARCHAR(36) NOT NULL,
    mahasiswa_id VARCHAR(36) NOT NULL,
    jenis_prestasi VARCHAR(20) NULL,
    tingkat_prestasi VARCHAR(20) NULL,
    nama_prestasi VARCHAR(100) NULL,
    tahun_prestasi VARCHAR(10) NULL,
    penyelenggara VARCHAR(100) NULL,
    peringkat VARCHAR(100) NULL,
    PRIMARY KEY (prestasi_id),
		FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa (mahasiswa_id) ON DELETE CASCADE
);


-- publikasi_peringkat
CREATE TABLE peringkat_publikasi (
    peringkat_publikasi_id VARCHAR(36) NOT NULL,
    slug_url VARCHAR(255), 
    nama_kategori VARCHAR(255),  
    nama_peringkat VARCHAR(255), 
		create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (peringkat_publikasi_id)
);

-- kategori
CREATE TABLE kategori (
    kategori_id VARCHAR(36) NOT NULL,
  	slug_url VARCHAR(255), 
    nama_kategori VARCHAR(255), 
    jenis_kategori_bpi VARCHAR(255), 
		create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (kategori_id)
);

-- tabel reward
CREATE TABLE reward (
    reward_id VARCHAR(36) NOT NULL,
    dosen_id VARCHAR(36) NOT NULL,
    peringkat_publikasi_id VARCHAR(36) NOT NULL,
		create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (reward_id),
		FOREIGN KEY (dosen_id) REFERENCES dosen (dosen_id) ON DELETE CASCADE,
		FOREIGN KEY (peringkat_publikasi_id) REFERENCES peringkat_publikasi (peringkat_publikasi_id) ON DELETE CASCADE
);

-- tabel anggota
CREATE TABLE anggota (
    anggota_id VARCHAR(36) NOT NULL,
    dosen_id VARCHAR(36) NOT NULL,
    reward_id VARCHAR(36) NOT NULL,
		create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (anggota_id),
		FOREIGN KEY (dosen_id) REFERENCES dosen (dosen_id) ON DELETE CASCADE,
		FOREIGN KEY (reward_id) REFERENCES reward (reward_id) ON DELETE CASCADE
);




