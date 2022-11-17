<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class Database {
  private $host = "localhost"; // Host
  private $db_name = "watches"; // DB Name
  private $username = "root"; // DB Username
  private $password = ""; // DB Password

  private static $instance = null; // Instanca klase
  public $connection = null; // Konekcija

  private function __construct() {
    $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
  }

  public function getConnection() {
    return $this->connection;
  }

  public static function getInstance() {
    if (!isset(self::$instance)) {
      self::$instance = new Database();
    }

    return self::$instance;
  }

  public function insertWatch($props) {
    $props = (object) $props;
    // print_r($props);
    $query = "INSERT INTO watch (username, title, gender, price, img) VALUES ('$props->username', '$props->title', '$props->gender', $props->price, '$props->img')";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));

    // print_r($query);

    if ($result) {
      return true;
    }

    return false;
  }

  public function getAllWatches() {
    $query = "SELECT * FROM watch";
    $result = mysqli_query($this->getConnection(), $query);
    $watches = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $watches;
  }

  public function getAllWatchesSorted($sortType) {
    $query = "SELECT * FROM watch ORDER BY $sortType";
    $result = mysqli_query($this->getConnection(), $query);
    $watches = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $watches;
  }

  public function searchWatches($searchText) {
    $query = "SELECT * FROM watch WHERE title LIKE '%$searchText%'";
    $result = mysqli_query($this->getConnection(), $query);
    $watches = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $watches;
  }

  public function getWatch($id) {
    $query = "SELECT * FROM watch WHERE id = $id";
    $result = mysqli_query($this->getConnection(), $query);
    $watch = $result->fetch_assoc();

    return $watch;
  }

  public function updateWatch($props, $id) {
    $props = (object) $props;
    $query = "UPDATE watch SET title = '$props->title', gender = '$props->gender', price = $props->price, img = '$props->img' WHERE id = $id LIMIT 1";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));

    return $result;
  }

  public function deleteWatch($id) {
    $query = "DELETE FROM watch WHERE id = $id LIMIT 1";
    $result = mysqli_query($this->getConnection(), $query);

    return $result;
  }

  public function insertComment($props) {
    $props = (object) $props;
    $query = "INSERT INTO comment (username, content, watch_id) VALUES ('$props->username', '$props->content', '$props->watch_id')";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));

    if ($result) {
      return true;
    }

    return false;
  }

  public function getAllComments() {
    $query = "SELECT c.*, m.title FROM comment c JOIN watch m ON m.id = c.watch_id";
    $result = mysqli_query($this->getConnection(), $query);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $comments;
  }

  public function getAllCommentsForWatch($id) {
    $query = "SELECT * FROM comment WHERE watch_id = $id";
    $result = mysqli_query($this->getConnection(), $query);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $comments;
  }
}
