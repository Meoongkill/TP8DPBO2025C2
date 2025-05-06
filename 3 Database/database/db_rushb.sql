create database db_rushb;
use db_rushb;

-- 2. Buat tabel Mahasiswa
CREATE TABLE Mahasiswa (
    ID_Mahasiswa INT AUTO_INCREMENT PRIMARY KEY,
    NIM_Mahasiswa VARCHAR(20) NOT NULL UNIQUE,
    Nama_Mahasiswa VARCHAR(100),
    Phone_Mahasiswa VARCHAR(20)
);

-- 3. Buat tabel KRS
CREATE TABLE KRS (
    ID_KRS INT AUTO_INCREMENT PRIMARY KEY,
    ID_Mahasiswa INT,
    Kode_Mata_Kuliah VARCHAR(10),
    Nama_Mata_Kuliah VARCHAR(100),
    Semester VARCHAR(10),
    Nilai_Akhir DECIMAL(5,2),
    FOREIGN KEY (ID_Mahasiswa) REFERENCES Mahasiswa(ID_Mahasiswa)
);

-- 4. Insert data ke tabel Mahasiswa
INSERT INTO Mahasiswa (NIM_Mahasiswa, Nama_Mahasiswa, Phone_Mahasiswa) VALUES
('20241001', 'Andi Pratama', '081234567890'),
('20241002', 'Bella Sari', '081345678901'),
('20241003', 'Cahyo Nugroho', '081456789012'),
('20241004', 'Dina Maharani', '081567890123'),
('20241005', 'Eka Putri', '081678901234');

-- 5. Insert data ke tabel KRS
INSERT INTO KRS (ID_Mahasiswa, Kode_Mata_Kuliah, Nama_Mata_Kuliah, Semester, Nilai_Akhir) VALUES
(1, 'MK001', 'Algoritma', 'Ganjil', 88.50),
(2, 'MK002', 'Basis Data', 'Genap', 76.25),
(3, 'MK003', 'Struktur Data', 'Ganjil', 82.00),
(4, 'MK004', 'Jaringan', 'Genap', 69.00),
(5, 'MK005', 'Sistem Operasi', 'Ganjil', 91.00);