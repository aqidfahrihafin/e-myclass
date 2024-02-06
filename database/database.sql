-- tabele data pesantren

CREATE TABLE pesantren (
    pesantren_id VARCHAR(32) PRIMARY KEY, 
    nama_lembaga VARCHAR(255),
    nsm VARCHAR(20),
    npsm VARCHAR(20),
    alamat TEXT,
    kecamatan VARCHAR(50),
    kabupaten VARCHAR(50),
    provinsi VARCHAR(50),
    pimpinan VARCHAR(100),
    nip VARCHAR(20),
    logo VARCHAR(255),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- tabel santri
CREATE TABLE santri (
  santri_id VARCHAR(36) PRIMARY KEY,
  no_induk VARCHAR(10),
  nik VARCHAR(20),
  no_kk VARCHAR(20),
  nama_santri VARCHAR(30),
  tempat_lahir VARCHAR(30),
  tanggal_lahir DATE,
  jenis_kelamin VARCHAR(10),
  alamat_santri TEXT,
  telp_santri VARCHAR(20),
  nama_ayah VARCHAR(30),
  alamat_ayah TEXT,
  pendidikan_ayah VARCHAR(20),
  pekerjaan_ayah VARCHAR(20),
  telp_ayah VARCHAR(20),
  nama_ibu VARCHAR(30),
  alamat_ibu TEXT,
  pendidikan_ibu VARCHAR(20),
  pekerjaan_ibu VARCHAR(20),
  telp_ibu VARCHAR(20),
  photo VARCHAR(255),
  status ENUM('aktif', 'keluar', 'lulus', 'tidak_lulus'),
	create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- tabel guru
CREATE TABLE guru (
  guru_id VARCHAR(36) PRIMARY KEY,
  niy VARCHAR(20),
  nik VARCHAR(20),
  nama_guru VARCHAR(30),
  tempat_lahir VARCHAR(30),
  tanggal_lahir DATE,
  jenis_kelamin VARCHAR(10),
  alamat_guru TEXT,
  telp_guru VARCHAR(20),
  pendidikan VARCHAR(20),
  photo VARCHAR(255),
  status ENUM('aktif', 'non-aktif'),
	create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


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

-- kelas
CREATE TABLE kelas (
    kelas_id VARCHAR(36) NOT NULL,
    guru_id VARCHAR(50),
    tahun_ajaran_id VARCHAR(50) NOT NULL,
    kode_kelas VARCHAR(255),
    kelas VARCHAR(255),
    jenis_kelas VARCHAR(255),
    target_kelas VARCHAR(255),
    PRIMARY KEY (kelas_id),
    FOREIGN KEY (guru_id) REFERENCES guru(guru_id) ON DELETE SET NULL,
    FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran (tahun_ajaran_id),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- target atau kkm
CREATE TABLE kkm (
  kkm_id varchar(36) NOT NULL,
  kkm int(3) NULL,
  kelas_id varchar(36) NOT NULL,
  tahun_ajaran_id varchar(36) NOT NULL,
  semester varchar(36) NOT NULL,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (kkm_id),
  FOREIGN KEY (kelas_id) REFERENCES kelas (kelas_id),
  FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran (tahun_ajaran_id)
);


-- mata pelajaran
CREATE TABLE mapel (
  mapel_id varchar(36) NOT NULL,
  kelas_id varchar(36) NOT NULL,
  kode_mapel varchar(50) NOT NULL,
  nama_mapel varchar(50) NOT NULL,
	create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (mapel_id),
  FOREIGN KEY (kelas_id) REFERENCES kelas (kelas_id)
);
