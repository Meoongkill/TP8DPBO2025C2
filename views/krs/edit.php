<?php
// File: views/krs/edit.php

// Data untuk form dikirim dari controller
// $mahasiswa_list: array of mahasiswa for dropdown
// $errors: validation errors if any
// $krs: KRS data to edit
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit KRS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?controller=Krs&action=index">KRS</a></li>
                        <li class="breadcrumb-item active">Edit KRS</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit KRS</h3>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($errors)): ?>
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form action="index.php?controller=Krs&action=edit&id=<?= $krs['ID_KRS'] ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_mahasiswa">Mahasiswa</label>
                                    <select name="id_mahasiswa" id="id_mahasiswa" class="form-control">
                                        <option value="">-- Pilih Mahasiswa --</option>
                                        <?php foreach ($mahasiswa_list as $mahasiswa): ?>
                                            <option value="<?= $mahasiswa['ID_Mahasiswa'] ?>" <?= $krs['ID_Mahasiswa'] == $mahasiswa['ID_Mahasiswa'] ? 'selected' : '' ?>>
                                                <?= $mahasiswa['NIM_Mahasiswa'] ?> - <?= $mahasiswa['Nama_Mahasiswa'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kode">Kode Mata Kuliah</label>
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?= htmlspecialchars($krs['Kode_Mata_Kuliah']) ?>" placeholder="Masukkan kode mata kuliah">
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($krs['Nama_Mata_Kuliah']) ?>" placeholder="Masukkan nama mata kuliah">
                                </div>

                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value="">-- Pilih Semester --</option>
                                        <option value="Ganjil" <?= $krs['Semester'] == 'Ganjil' ? 'selected' : '' ?>>Ganjil</option>
                                        <option value="Genap" <?= $krs['Semester'] == 'Genap' ? 'selected' : '' ?>>Genap</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nilai">Nilai Akhir</label>
                                    <input type="number" step="0.01" min="0" max="100" class="form-control" id="nilai" name="nilai" value="<?= htmlspecialchars($krs['Nilai_Akhir']) ?>" placeholder="Masukkan nilai akhir (0-100)">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="index.php?controller=Krs&action=index" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>