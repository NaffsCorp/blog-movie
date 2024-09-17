<?php

require '../config/database.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'add' && $_SERVER["REQUEST_METHOD"] == "POST") {
    add_category();
} elseif ($action == 'delete' && isset($_GET['id'])) {
    delete_category();
} elseif ($action == 'update' && $_SERVER["REQUEST_METHOD"] == "POST") {
    update_category();
}

function add_category()
{
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kategori = $_POST['kategori'];

        if (!empty($kategori)) {
            $sql = "INSERT INTO category (kategori) VALUES ('$kategori')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>window.location.href = '../views/category/add_category.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Data gagal ditambahkan.')</script>";
            echo "<script>window.location.href = '../views/category/add_category.php';</script>";
        }
    }
}

function update_category()
{
    global $conn;

    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';

    if ($id > 0 && !empty($kategori)) {
        $idExist = mysqli_query($conn, "SELECT * FROM category WHERE id = $id");

        if (mysqli_num_rows($idExist) > 0) {
            $sql = "UPDATE category SET kategori = '$kategori' WHERE id = $id";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Kategori berhasil diperbarui.')</script>";
                echo "<script>window.location.href = '../views/category/add_category.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Kategori tidak ditemukan.')</script>";
            echo "<script>window.location.href = '../views/category/add_category.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak valid.')</script>";
        echo "<script>window.location.href = '../views/category/add_category.php';</script>";
    }
}

function delete_category()
{
    global $conn;

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        $idExist = mysqli_query($conn, "SELECT * FROM category WHERE id = $id");

        if (mysqli_num_rows($idExist) > 0) {
            mysqli_query($conn, "DELETE FROM category WHERE id = $id");

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>alert('Data berhasil dihapus.')</script>";
            } else {
                echo "<script>alert('Data gagal dihapus.')</script>";
            }
        } else {
            echo "<script>alert('Kategori dengan ID tersebut tidak ditemukan.')</script>";
        }

        echo "<script>window.location.href = '../views/category/add_category.php';</script>";
    } else {
        echo "<script>alert('ID tidak valid.')</script>";
        echo "<script>window.location.href = '../views/category/add_category.php';</script>";
    }
}
