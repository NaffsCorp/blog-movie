<?php
include '../config/database.php';

$data_kategori = show_data("SELECT * FROM category ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Add Post</title>
</head>

<body>
    <?php include '../components/navbar.html' ?>
    <div class="container">
        <h1 class="text-left title">Add Post</h1>
        <div class="form">
            <form class="row g-3" action="../controllers/add_controller.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="col-md-6">
                    <label for="sutradara" class="form-label">Sutradara</label>
                    <input type="text" class="form-control" id="sutradara" name="sutradara">
                </div>
                <div class="col-12">
                    <label for="konten">Konten</label>
                    <textarea class="form-control" rows="5" id="konten" name="konten"></textarea>
                </div>
                <div class="col-12">
                    <label for="overview">Overview</label>
                    <textarea class="form-control" rows="5" id="overview" name="overview"></textarea>
                </div>
                <div class="col-md-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis">
                </div>
                <div class="col-md-4">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select id="kategori" class="form-select" name="kategori">
                        <option selected>Choose...</option>
                        <?php foreach ($data_kategori as $data) : ?>
                            <?php $i = 1; ?>
                            <option for="<?= $data['kategori'] ?>" id="<?= $data['kategori'] ?>" name="<?= $data['kategori'] ?>" value="<?= $data['id'] ?>"><?= $data['kategori'] ?></option>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="rilis" class="form-label">Tahun Rilis</label>
                    <input type="number" class="form-control" id="rilis" name="rilis">
                </div>
                <div class="col-md-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
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