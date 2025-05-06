</main>
</div>

<footer class="mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">&copy; <?php echo date('Y'); ?> Sistem Informasi KRS - RushB</span>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script>
    // Konfirmasi hapus data
    const deleteButtons = document.querySelectorAll('.delete-confirm');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                e.preventDefault();
            }
        });
    });
    
    // Hilangkan pesan alert setelah beberapa detik
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('fade');
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 3000);
    });
</script>
</body>
</html>