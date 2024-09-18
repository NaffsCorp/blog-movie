<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $konten = $_POST['konten'];
    $overview = $_POST['overview'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $rilis = $_POST['rilis'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $tmp_name = $_FILES['thumbnail']['tmp_name'];
    $path = "../assets/img/";
    $file = $path . basename($thumbnail);

    if (!empty($judul) && !empty($sutradara) && !empty($konten) && !empty($overview) && !empty($penulis) && !empty($kategori) && !empty($rilis) && !empty($thumbnail)) {
        require '../config/database.php';

        $check_category = mysqli_query($conn, "SELECT * FROM category WHERE id = '$kategori'");
        $rows = mysqli_num_rows($check_category);

        if ($rows > 0) {
            if (move_uploaded_file($tmp_name, $file)) {
                $sql = "INSERT INTO movie (judul, sutradara, konten, overview, penulis, category_id, rilis, thumbnail) 
                        VALUES ('$judul', '$sutradara', '$konten', '$overview', '$penulis', '$kategori', '$rilis', '$thumbnail')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Data berhasil ditambahkan.')</script>";
                    echo "<script>window.location.href = '../views/index.php';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Gagal mengupload thumbnail.')</script>";
            }
            mysqli_close($conn);
        } else {
            echo "<script>alert('Kategori tidak ditemukan.')</script>";
            echo "<script>window.location.href = '../views/tambah.php';</script>";
        }
    } else {
        echo "<script>alert('Semua field wajib diisi.')</script>";
        echo "<script>window.location.href = '../views/tambah.php';</script>";
    }
}
