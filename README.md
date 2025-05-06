# Janji Desan dan Pemrograman Berorientasi Objek
Saya Muhammad Fathan Putra dengan NIM 2300330 mengerjakan soal Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Catatan Untuk Asprak
Kang-Teh aslian, aku udah bikin 4 codingan cuma buat TP8 doang, capek kang aslian...

# Deskripsi Proyek
Ini adalah Sistem manajemen akademik berbasis web dengan arsitektur MVC (Model-View-Controller) untuk mengelola data mahasiswa dan KRS. Dibangun menggunakan:
- PHP Native
- Database MySQL
- html:5 untuk interface
- Arsitektur bergaya MVC

# Struktur Folder (Berdasarkan Screenshot)
/rushb_app
├── config/
│   └── database.php
├── controllers/
│   ├── MahasiswaController.php
│   └── KrsController.php
├── models/
│   ├── Mahasiswa.php
│   └── Krs.php
├── views/
│   ├── templates/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── sidebar.php
│   ├── mahasiswa/
│   │   ├── index.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── view.php
│   └── krs/
│       ├── index.php
│       ├── create.php
│       ├── edit.php
│       └── view.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
└── index.php

# Fitur Utama untuk Tugas Ini
Mahasiswa
- Tambah data Mahasiswa Baru
- Edit data Mahasiswa yang ada
- Hapus data Mahasiswa yang ada
- Tampilkan daftar Mahasiswa yang ada
  
Kartu Rencana Studi (KRS)
- Tambah data KRS Baru
- Edit data KRS yang ada
- Hapus data KRS yang ada
- Tampilkan daftar KRS yang ada

# Komponen Teknis 
1. Model
   - MahasiswaModel.php = Handle semua operasi database terkait mahasiswa
   - KrsModel.php = Handle semua operasi database terkait krs
    
2. Controller
   - MahasiswacController.php = Handle Request terkait mahasiswa
   - KrsController.php = Handle Request terkait krs
     
3. View
   - Template php untuk footer, header, dan sidebar
   - diproses untuk index, edit, dan create untuk mahasiswa dan KRS
     
4. config
   - untuk menyambungkan database dengan codingan
     
5. index
   - untuk mengakses semua fitur yang ada

# cara mengakses tugas
- Import database dari file db_rushb.sql
- Sesuaikan konfigurasi di database.php
- Akses melalui index.php
