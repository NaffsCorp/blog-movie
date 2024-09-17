<?php
include '../../config/database.php';

$data = show_data("SELECT * FROM category ORDER BY id ASC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../assets/css/style.css" />
  <title>Kategori</title>
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
    <h1 class="text-left title">Add Category</h1>

    <div class="form">
      <form action="../../controllers/category_controller.php?action=add" method="POST">
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <input type="text" class="form-control" id="kategori" name="kategori" />
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Post</button>
        </div>
      </form>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $row): ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $row['kategori'] ?></td>
            <td>
              <a href="edit_category.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
              <a href="../../controllers/category_controller.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
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