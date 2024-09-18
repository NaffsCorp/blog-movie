<?php

include '../config/database.php';

$data = show_data("SELECT movie.*, category.kategori 
        FROM movie 
        INNER JOIN category ON movie.category_id = category.id
        ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>List View</title>
</head>

<body>
    <?php include '../components/navbar.html' ?>
    <div class="container">
        <h1 class="title">List Content</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Sutradara</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Rilis</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $list) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $list['judul'] ?></td>
                        <td><?= $list['kategori'] ?></td>
                        <td><?= $list['sutradara'] ?></td>
                        <td><?= $list['penulis'] ?></td>
                        <td><?= $list['rilis'] ?></td>
                        <td>
                            <a href="./edit_post.php?id=<?= $list['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="../controllers/delete_controller.php?id=<?= $list['id'] ?>" class="btn btn-danger">Delete</a>
                            <a href="#" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>