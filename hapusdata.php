<?php

    require 'function.php';    

    $id = $_GET['id'];

    if(hapusdata($id) > 0)
    {
        echo "
            <script>
                alert('Berhasil dihapus!');
                document.location.href = 'http://localhost/C2C023061/datamahasiswa.php';
            </script>
            ";
    }
    else
    {
        echo "
            <script>
                alert('Gagal dihapus!');
                document.location.href = 'http://localhost/C2C023061/datamahasiswa.php';
            </script>
            ";
        mysqli_error($koneksi);
    }

?>