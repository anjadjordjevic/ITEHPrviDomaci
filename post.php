<?php

require_once 'Database.php';
$id = $_GET['id'];
$watch = Database::getInstance()->getWatch($id);

$comments = Database::getInstance()->getAllCommentsForWatch($id);

if (isset($_POST['insert-comment'])) {

  $username = $_POST['username'];
  $content = $_POST['content'];

  $errors = array();

  if (empty($username)) {
    $errors['username'] = '<br><label class="error">Please Confirm Password.</label><br>';
  }

  if (empty($content)) {
    $errors['content'] = '<br><label class="error">Please Confirm Password.</label></br>';
  }

  if (count($errors) == 0) {
    $data = array(
      "username" => $username,
      "content" => $content,
      "watch_id" => $id,
    );

    if (Database::getInstance()->insertComment($data)) {
      header("Location: post.php?id=$id");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="ikonicaa.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O proizvodu</title>
  <link rel="stylesheet" href="post.css">
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

    #upperleft {
      position: absolute;
      top: 0;
      left: 0;
      padding: 17px;
    }

    body{
      background-image: url('wall.jpg');
    }
    </style>
</head>

<body>
  <img src="<?php echo $watch['img']; ?>" alt="Nema slike">
  <p style="color:rgb(120,56,10);">Korisnik: <?php echo $watch['username']; ?></p><br>
  <p style="color:rgb(120,56,10);">Model: <b> <?php echo $watch['title']; ?> </b> </p><br>
  <p style="color:rgb(120,56,10);">Pol: <?php echo $watch['gender']; ?></p><br>
  <p style="color:rgb(120,56,10);">Cena: $<?php echo $watch['price']; ?></p><br>
  <br><br><br>

  <div class="Komentari:">
    <h1 style="color:rgb(120,56,10);">Komentari</h1>
    <?php echo sizeof($comments) == 0 ? "No comments" : ""; ?>
    <?php foreach ($comments as $comment) : ?>
      <div class="comment">
        <p><b>Korisnik</b> <?php echo $comment['username']; ?>:       <?php echo $comment['content']; ?></t></p>
        <p></p>
      </div>
    <?php endforeach; ?>
  </div>
      <br><br><br><br><br><br>
  <div class="commentForm">
    <form method="POST">
      <h3 style="color:rgb(120,56,10);">Dodajte Vaš komentar</h3>
      <label style="color:rgb(120,56,10);" for="username">Korisnik:</label><br>
      <input name="username" type="text" id="username">
      <br><br>
      <label style="color:rgb(120,56,10);" for="specimen">Komentar:</label><br>
      <input name="content" type="text" id="specimen">
      <br><br>
      <input style="background-color:rgb(120,56,10); color:rgb(238,232,170)" name="insert-comment" type="submit" value="Potvrdi">
    </form>
  </div>


  <br><br><br>
  <div id="upperleft">
    <a href="index.php" id="home">Početna</a>
  </div>

</body>

</html>