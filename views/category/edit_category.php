<?php
include '../../config/database.php';



$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
    $data = show_data("SELECT * FROM category WHERE id = $id");

    if (count($data) > 0) {
        $row = $data[0];
    } else {
        echo "<script>alert('Data tidak ditemukan.');</script>";
        echo "<script>window.location.href = '../';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak valid.');</script>";
    echo "<script>window.location.href = '../index.php';</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <title>Edit Kategori</title>
</head>

<body>
    <nav>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">List Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../add_post.php">Add Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Edit Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Remove Post</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1 class="text-left title">Edit Category <?= $data[0]['kategori'] ?></h1>

        <div class="form">
            <form action="../../controllers/category_controller.php?action=update" method="POST">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?= $data[0]['id'] ?>" />
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="kategori" value="<?= $data[0]['kategori'] ?>" name="kategori" />
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>