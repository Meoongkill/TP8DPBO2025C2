CREATE DATABASE db_mahasiwa;
USE db_mahasiwa;

-- 1. Tabel Dosen_Wali
CREATE TABLE Dosen_Wali (
    ID_Dosen_Wali INT AUTO_INCREMENT PRIMARY KEY,
    Nama_Dosen_Wali VARCHAR(100) NOT NULL,
    Jabatan_Dosen_Wali VARCHAR(50),
    Peruntukan_Semester INT
);

-- 2. Tabel Mahasiswa
CREATE TABLE Mahasiswa (
    ID_Mahasiswa INT AUTO_INCREMENT PRIMARY KEY,
    NIM_Mahasiswa VARCHAR(20) NOT NULL UNIQUE,
    Nama_Mahasiswa VARCHAR(100) NOT NULL,
    Phone_Mahasiswa VARCHAR(20),
    Join_Date_Mahasiswa DATE,
    ID_Dosen_Wali INT,
    FOREIGN KEY (ID_Dosen_Wali) REFERENCES Dosen_Wali(ID_Dosen_Wali)
);

-- 3. Tabel Mata_Kuliah
CREATE TABLE Mata_Kuliah (
    ID_Mata_Kuliah INT AUTO_INCREMENT PRIMARY KEY,
    Kode_Mata_Kuliah VARCHAR(20) NOT NULL UNIQUE,
    Nama_Mata_Kuliah VARCHAR(100) NOT NULL,
    Semester_Peruntukan INT,
    Pengampu_Mata_Kuliah VARCHAR(100)
);

-- 4. Tabel KRS
CREATE TABLE KRS (
    ID_KRS INT AUTO_INCREMENT PRIMARY KEY,
    ID_Mahasiswa INT,
    ID_Mata_Kuliah INT,
    Tahun_Akademik VARCHAR(9),
    Semester ENUM('Ganjil', 'Genap'),
    FOREIGN KEY (ID_Mahasiswa) REFERENCES Mahasiswa(ID_Mahasiswa),
    FOREIGN KEY (ID_Mata_Kuliah) REFERENCES Mata_Kuliah(ID_Mata_Kuliah)
);

-- 5. Tabel Kelas
CREATE TABLE Kelas (
    ID_Kelas INT AUTO_INCREMENT PRIMARY KEY,
    Nama_Kelas VARCHAR(50),
    ID_Mata_Kuliah INT,
    Tahun_Akademik VARCHAR(9),
    FOREIGN KEY (ID_Mata_Kuliah) REFERENCES Mata_Kuliah(ID_Mata_Kuliah)
);

-- 6. Tabel Nilai
CREATE TABLE Nilai (
    ID_Nilai INT AUTO_INCREMENT PRIMARY KEY,
    ID_Mahasiswa INT,
    ID_Mata_Kuliah INT,
    Nilai_Akhir DECIMAL(5,2),
    Grade CHAR(2),
    FOREIGN KEY (ID_Mahasiswa) REFERENCES Mahasiswa(ID_Mahasiswa),
    FOREIGN KEY (ID_Mata_Kuliah) REFERENCES Mata_Kuliah(ID_Mata_Kuliah)
);

-- Insert Dosen_Wali
INSERT INTO Dosen_Wali (Nama_Dosen_Wali, Jabatan_Dosen_Wali, Peruntukan_Semester) VALUES
('Dr. Ahmad Subandi', 'Lektor', 2),
('Prof. Siti Aminah', 'Guru Besar', 4),
('Drs. Budi Santoso', 'Asisten Ahli', 6),
('Dra. Rina Kumalasari', 'Lektor Kepala', 8),
('Dr. Indra Wijaya', 'Lektor', 1);

-- Insert Mahasiswa
INSERT INTO Mahasiswa (NIM_Mahasiswa, Nama_Mahasiswa, Phone_Mahasiswa, Join_Date_Mahasiswa, ID_Dosen_Wali) VALUES
('20241001', 'Andi Pratama', '081234567890', '2024-08-01', 1),
('20241002', 'Bella Sari', '081345678901', '2024-08-01', 2),
('20241003', 'Cahyo Nugroho', '081456789012', '2024-08-01', 3),
('20241004', 'Dina Maharani', '081567890123', '2024-08-01', 4),
('20241005', 'Eka Putri', '081678901234', '2024-08-01', 5);

-- Insert Mata_Kuliah
INSERT INTO Mata_Kuliah (Kode_Mata_Kuliah, Nama_Mata_Kuliah, Semester_Peruntukan, Pengampu_Mata_Kuliah) VALUES
('MK001', 'Algoritma dan Pemrograman', 1, 'Dr. Ahmad Subandi'),
('MK002', 'Basis Data', 2, 'Prof. Siti Aminah'),
('MK003', 'Struktur Data', 3, 'Drs. Budi Santoso'),
('MK004', 'Jaringan Komputer', 4, 'Dra. Rina Kumalasari'),
('MK005', 'Sistem Operasi', 5, 'Dr. Indra Wijaya');

-- Insert KRS
INSERT INTO KRS (ID_Mahasiswa, ID_Mata_Kuliah, Tahun_Akademik, Semester) VALUES
(1, 1, '2024/2025', 'Ganjil'),
(2, 2, '2024/2025', 'Genap'),
(3, 3, '2024/2025', 'Ganjil'),
(4, 4, '2024/2025', 'Genap'),
(5, 5, '2024/2025', 'Ganjil');

-- Insert Kelas
INSERT INTO Kelas (Nama_Kelas, ID_Mata_Kuliah, Tahun_Akademik) VALUES
('A', 1, '2024/2025'),
('B', 2, '2024/2025'),
('A', 3, '2024/2025'),
('C', 4, '2024/2025'),
('B', 5, '2024/2025');

-- Insert Nilai
INSERT INTO Nilai (ID_Mahasiswa, ID_Mata_Kuliah, Nilai_Akhir, Grade) VALUES
(1, 1, 88.50, 'A'),
(2, 2, 76.25, 'B'),
(3, 3, 82.00, 'A-'),
(4, 4, 69.00, 'C+'),
(5, 5, 91.00, 'A');
