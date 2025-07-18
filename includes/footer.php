    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <?php
    // Load JS berdasarkan halaman
    if (strpos($_SERVER['PHP_SELF'], 'login.php') !== false || strpos($_SERVER['PHP_SELF'], 'register.php') !== false) {
        echo '<script src="assets/js/auth.js"></script>';
    } else {
        echo '<script src="assets/js/main.js"></script>';
    }
    ?>
</body>
</html>