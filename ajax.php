<?php


if (!isset($_POST)) {
  exit;
}


require_once 'Database.php';
$watches = Database::getInstance()->getAllWatches();

if (isset($_POST['sortType'])) {
  $sortType = $_POST['sortType'];
  $watches = Database::getInstance()->getAllWatchesSorted($sortType);

  echo json_encode($watches);
  
  exit;
}

if (isset($_POST['searchText'])) {
  $searchText = $_POST['searchText'];
  $watches = Database::getInstance()->searchWatches($searchText);

  echo json_encode($watches);
  
  exit;
}