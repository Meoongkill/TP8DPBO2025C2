<div class="container-fluid">
    <h2 class="mb-4">Tambah Mahasiswa</h2>
    
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <span><i class="fas fa-user-plus me-2"></i> Form Tambah Mahasiswa</span>
                <a href="index.php?controller=Mahasiswa&action=index" class="btn btn-sm btn-light">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <form action="index.php?controller=Mahasiswa&action=create" method="post">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo htmlspecialchars($mahasiswa['NIM_Mahasiswa']); ?>" required>
                    <small class="text-muted">Nomor Induk Mahasiswa harus unik</small>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($mahasiswa['Nama_Mahasiswa']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($mahasiswa['Phone_Mahasiswa']); ?>" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>