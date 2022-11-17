<?php

require_once 'Database.php';
$watches = Database::getInstance()->getAllWatches();
$comments = Database::getInstance()->getAllComments();

if (isset($_POST['delete'])) {
  $id = $_POST['watch_id'];

  if (Database::getInstance()->deleteWatch($id)) {
    header("Location: table.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="ikonicaa.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ponuda</title>
  <link rel="stylesheet" href="table.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
  #home {
    font-size: 30px;
    padding: 10px;
    font-family: sans-serif;
    color: white;
    border-radius: 15px;
    background-color: rgb(139, 69, 19);
    text-decoration: none;
    border-style: none;
    cursor: pointer;
  }

  #upperright {
    position: absolute;
    top: 3px;
    right: 0;
    padding: 8px;
  }
</style>

<body>
  <br>
  <h2 style="color:rgb(120,56,10);">Naša ponuda </h2>
  <table class="table table-striped" style="width:100%">

    <tr>
      <th>ID</th>
      <th>Sat</th>
      <th>Pol</th>
      <th>Cena</th>
      <th>&nbsp &nbsp &nbsp Slika</th>
    </tr>
    <?php foreach ($watches as $index => $watch) : ?>
      <tr>
        <td><?php echo ++$index; ?></td>
        <td><?php echo $watch['title']; ?></td>
        <td><?php echo $watch['gender']; ?></td>
        <td>$<?php echo $watch['price']; ?></td>
        <td>
          <img height= "120" width="10" src="<?php echo $watch['img']; ?>" alt="Nema slike" id="baryte">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button style="background-color:rgb(120,56,10); color:white"><a style="color:white" href="edit.php?id=<?php echo $watch['id']; ?>">edit</a></button>&nbsp;
          <form method="POST" style="display: inline;">
            <input type="hidden" name="watch_id" value="<?php echo $watch['id']; ?>">
            &nbsp; <button style="background-color:rgb(120,56,10); color:white" type="submit" name="delete">remove</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>

  <br><br>
  <h2 style="color:rgb(120,56,10);">Komentari</h2>
  <table class="table table-striped" style="width:100%">

    <tr>
      <th>Korisnik</th>
      <th>Komentar</th>
      <th>Sat</th>
    </tr>
    <?php foreach ($comments as $comment) : ?>
      <tr>
        <td><?php echo $comment['username']; ?></td>
        <td><?php echo $comment['content']; ?></td>
        <td><?php echo $comment['title']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <br><br><br>
  <div id="upperright">
    <a href="index.php" id="home">Početna</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>