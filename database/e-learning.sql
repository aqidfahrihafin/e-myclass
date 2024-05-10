CREATE TABLE kelas (
    kelas_id VARCHAR(255) PRIMARY KEY,
    prodi_id VARCHAR(255),
    tahun_ajaran_id VARCHAR(255),
    nama_kelas VARCHAR(255),
    kode_kelas VARCHAR(50),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (prodi_id) REFERENCES prodi(prodi_id) ON DELETE CASCADE,
    FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran(tahun_ajaran_id) ON DELETE CASCADE
);

CREATE TABLE mahasiswa_kelas (
    mahasiswa_kelas_id VARCHAR(255) PRIMARY KEY,
    mahasiswa_id VARCHAR(255),
    kelas_id VARCHAR(255),
    status VARCHAR(50),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (mahasiswa_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id) ON DELETE CASCADE
);


CREATE TABLE matakuliah (
    matakuliah_id VARCHAR(255) PRIMARY KEY,
    kelas_id VARCHAR(255),
	dosen_id VARCHAR(255),
    nama_matakuliah VARCHAR(255),
    deskripsi TEXT,
    jumlah_sks INT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id) ON DELETE CASCADE,
	FOREIGN KEY (dosen_id) REFERENCES dosen(dosen_id) ON DELETE CASCADE
);

CREATE TABLE materi (
    materi_id VARCHAR(255) PRIMARY KEY,
    kelas_id VARCHAR(255),
    matakuliah_id VARCHAR(255),
    judul_materi VARCHAR(255),
    isi_materi TEXT,
	dokumen VARCHAR(255),
    tanggal_upload DATE,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id) ON DELETE CASCADE,
    FOREIGN KEY (matakuliah_id) REFERENCES matakuliah(matakuliah_id) ON DELETE CASCADE
);

CREATE TABLE dokumen_materi (
    dokumen_id VARCHAR(255) PRIMARY KEY,
    materi_id VARCHAR(255),
    nama_dokumen VARCHAR(255),
    tautan_dokumen VARCHAR(255),
    file_dokumen BLOB,
    tipe_dokumen VARCHAR(50),
    deskripsi_dokumen TEXT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (materi_id) REFERENCES materi(materi_id) ON DELETE CASCADE
);

CREATE TABLE tugas (
    tugas_id VARCHAR(255) PRIMARY KEY,
    kelas_id VARCHAR(255),
    materi_id VARCHAR(255),
    judul_tugas VARCHAR(255),
    deskripsi_tugas TEXT,
    deadline DATE,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id) ON DELETE CASCADE,
    FOREIGN KEY (materi_id) REFERENCES materi(materi_id) ON DELETE CASCADE
);

CREATE TABLE submisi_tugas (
    submisi_id VARCHAR(255) PRIMARY KEY,
    tugas_id VARCHAR(255),
    user_id VARCHAR(255),
    file_submisi BLOB,
    tanggal_submit DATETIME,
    nilai INT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tugas_id) REFERENCES tugas(tugas_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);


CREATE TABLE diskusi_materi (
    diskusi_materi_id VARCHAR(255) PRIMARY KEY,
    materi_id VARCHAR(255),
    user_id VARCHAR(255),
    isi_diskusi TEXT,
    tanggal_posting DATETIME,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (materi_id) REFERENCES materi(materi_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE diskusi_kelas (
    diskusi_kelas_id VARCHAR(255) PRIMARY KEY,
    kelas_id VARCHAR(255),
    user_id VARCHAR(255),
    judul_diskusi VARCHAR(255),
    isi_diskusi TEXT,
    tanggal_posting DATETIME,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
