<?php
// File: views/krs/index.php

// Data dikirim dari controller
// $krs_list: array of KRS records
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data KRS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">KRS</li>
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
                            <h3 class="card-title">Daftar KRS Mahasiswa</h3>
                            <div class="card-tools">
                                <a href="index.php?controller=Krs&action=create" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Tambah KRS
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                                <div class="alert alert-success">
                                    Data berhasil dihapus.
                                </div>
                            <?php endif; ?>
                            
                            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                                <div class="alert alert-danger">
                                    Gagal menghapus data.
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kode MK</th>
                                        <th>Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($krs_list)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($krs_list as $krs): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= htmlspecialchars($krs['NIM_Mahasiswa']) ?></td>
                                                <td><?= htmlspecialchars($krs['Nama_Mahasiswa']) ?></td>
                                                <td><?= htmlspecialchars($krs['Kode_Mata_Kuliah']) ?></td>
                                                <td><?= htmlspecialchars($krs['Nama_Mata_Kuliah']) ?></td>
                                                <td><?= htmlspecialchars($krs['Semester']) ?></td>
                                                <td><?= htmlspecialchars($krs['Nilai_Akhir']) ?></td>
                                                <td>
                                                    <a href="index.php?controller=Krs&action=view&id=<?= $krs['ID_KRS'] ?>" class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="index.php?controller=Krs&action=edit&id=<?= $krs['ID_KRS'] ?>" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="index.php?controller=Krs&action=delete&id=<?= $krs['ID_KRS'] ?>" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>