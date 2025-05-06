<div class="container-fluid">
    <h2 class="mb-4">Daftar Mahasiswa</h2>
    
    <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mahasiswa berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal menghapus data! Mahasiswa memiliki data KRS terkait.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <span><i class="fas fa-users me-2"></i> Data Mahasiswa</span>
                <a href="index.php?controller=Mahasiswa&action=create" class="btn btn-sm btn-light">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Mahasiswa
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($mahasiswa_list)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data mahasiswa</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; ?>
                            <?php foreach ($mahasiswa_list as $mhs): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($mhs['NIM_Mahasiswa']); ?></td>
                                    <td><?php echo htmlspecialchars($mhs['Nama_Mahasiswa']); ?></td>
                                    <td><?php echo htmlspecialchars($mhs['Phone_Mahasiswa']); ?></td>
                                    <td>
                                        <a href="index.php?controller=Mahasiswa&action=view&id=<?php echo $mhs['ID_Mahasiswa']; ?>" class="btn btn-sm btn-info btn-action">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="index.php?controller=Mahasiswa&action=edit&id=<?php echo $mhs['ID_Mahasiswa']; ?>" class="btn btn-sm btn-warning btn-action">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="index.php?controller=Mahasiswa&action=delete&id=<?php echo $mhs['ID_Mahasiswa']; ?>" class="btn btn-sm btn-danger btn-action">
                                            <i class="fas fa-trash-alt"></i>
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