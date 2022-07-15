<?php

header('Content-Type: application/json');
include("conn.php");



if (isset($_GET['numrows']) && isset($_GET['platform']) && isset($_GET['api_k'])) {
  include("conn.php");
  $find = $_GET['platform'];
  $number = $_GET['numrows'];

  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";

  $res = $conn->query($checkkey);

  $num = $res->num_rows;

  if ($num > 0) {

    $sql = "SELECT practice_gametable.gameID,practice_gametable.gameTitle,practice_gametable.criticID,practice_critictable.name,practice_gametable.review,platformID,score,date,URL 
      FROM practice_gametable 
      LEFT JOIN practice_critictable
      ON practice_critictable.criticID = practice_gametable.criticID WHERE platformID =$find LIMIT $number";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();
      while ($row = $result->fetch_assoc()) {
        $game = array(
          "gameID" =>  $row["gameID"],
          "gameTitle" => $row["gameTitle"],
          "criticID" => $row["criticID"],
          "criticName" => $row["name"],
          "review" => $row["review"],
          "platformID" => $row["platformID"],
          "score" => $row["score"],
          "date" => $row["date"],
          "URL" => $row["URL"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}


if (isset($_GET['platforms']) && isset($_GET['api_k'])) {

  include("conn.php");

  $find = $_GET['platforms'];
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";

  $res = $conn->query($checkkey);

  $num = $res->num_rows;

  if ($num > 0) {



    include("conn.php");

    $sql = "SELECT practice_gametable.gameID,practice_gametable.gameTitle,practice_gametable.criticID,practice_critictable.name,practice_gametable.review,platformID,score,date,URL 
      FROM practice_gametable 
      LEFT JOIN practice_critictable
      ON practice_critictable.criticID = practice_gametable.criticID WHERE platformID =$find LIMIT 90";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();
      while ($row = $result->fetch_assoc()) {
        $game = array(
          "gameID" =>  $row["gameID"],
          "gameTitle" => $row["gameTitle"],
          "criticID" => $row["criticID"],
          "criticName" => $row["name"],
          "review" => $row["review"],
          "platformID" => $row["platformID"],
          "score" => $row["score"],
          "date" => $row["date"],
          "URL" => $row["URL"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}




if (isset($_GET['about']) && isset($_GET['api_k'])) {
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";

  $res = $conn->query($checkkey);

  $num = $res->num_rows;

  if ($num > 0) {

    include("conn.php");

    $sql = "SELECT * FROM practice_abouttable";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();

      while ($row = $result->fetch_assoc()) {
        $game = array(
          "aboutID" =>  $row["aboutID"],
          "header" => $row["header"],
          "description" => $row["description"],
          "URL" => $row["imgURL"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}



if (isset($_GET['reviews']) && isset($_GET['api_k'])) {

  include("conn.php");
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";

  $res = $conn->query($checkkey);

  $num = $res->num_rows;

  if ($num > 0) {
    include("conn.php");
    $sql = "SELECT   userID, user_email, practice_gametable.gameTitle,practice_reviewtable.gameID, user_review,practice_gametable.URL FROM practice_reviewtable 
                INNER JOIN practice_gametable 
                ON practice_gametable.gameID = practice_reviewtable.gameID;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();

      while ($row = $result->fetch_assoc()) {
        $game = array(
          "userID" => $row["userID"],
          "gameTitle" => $row["gameTitle"],
          "user_email" =>  $row["user_email"],
          "review" => $row["user_review"],
          "URL" => $row["URL"],
          "gameID" => $row["gameID"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}






if (isset($_GET['reviewID']) && isset($_GET['api_k'])) {
  $find = $_GET['reviewID'];
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";
  $res = $conn->query($checkkey);
  $num = $res->num_rows;
  if ($num > 0) {

    include("conn.php");

    $sql = "SELECT   userID, user_email, practice_gametable.gameTitle,practice_reviewtable.gameID, user_review FROM practice_reviewtable 
            LEFT JOIN practice_gametable 
            ON practice_gametable.gameID = practice_reviewtable.gameID WHERE userID = $find ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();

      while ($row = $result->fetch_assoc()) {
        $game = array(
          "userID" => $row["userID"],
          "gameTitle" => $row["gameTitle"],
          "user_email" =>  $row["user_email"],
          "review" => $row["user_review"],
          "gameID" => $row["gameID"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}



if (isset($_GET['favourites']) && isset($_GET['api_k'])) {

  include("conn.php");
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";
  $res = $conn->query($checkkey);
  $num = $res->num_rows;

  if ($num > 0) {

    $sql = "SELECT * FROM `practice_favouritestable` LIMIT 40;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();

      while ($row = $result->fetch_assoc()) {
        $game = array(
          "gameID" =>  $row["gameID"],
          "gameTitle" => $row["gameTitle"],
          "score" => $row["score"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}

if (isset($_GET['search']) && isset($_GET['api_k'])) {

  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";

  $res = $conn->query($checkkey);

  $num = $res->num_rows;

  if ($num > 0) {

    include("conn.php");


    include("conn.php");
    $find = $_GET['search'];

    $sql = "SELECT practice_gametable.gameID,practice_gametable.gameTitle,practice_gametable.criticID,practice_gametable.review,practice_gametable.platformID,practice_gametable.score,practice_gametable.date,practice_critictable.name,URL
            FROM practice_gametable LEFT JOIN practice_critictable
            ON practice_gametable.criticID = practice_critictable.criticID
            WHERE practice_gametable.gameTitle LIKE '%$find%' LIMIT 30";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();

      while ($row = $result->fetch_assoc()) {
        $game = array(
          "gameID" =>  $row["gameID"],
          "gameTitle" => $row["gameTitle"],
          "criticID" => $row["criticID"],
          "criticName" => $row["name"],
          "review" => $row["review"],
          "platformID" => $row["platformID"],
          "score" => $row["score"],
          "date" => $row["date"],
          "URL" => $row["URL"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}


if (isset($_GET['gameID']) && isset($_GET['api_k'])) {

  include("conn.php");
  $find = $_GET['gameID'];
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_apiaccess WHERE apikey='$api' ";
  $res = $conn->query($checkkey);
  $num = $res->num_rows;

  if ($num > 0) {

    $sql = "SELECT practice_gametable.gameID,practice_gametable.gameTitle,practice_gametable.criticID,practice_gametable.review,practice_gametable.platformID,practice_gametable.score,practice_gametable.date,practice_critictable.name,URL
            FROM practice_gametable LEFT JOIN practice_critictable
            ON practice_gametable.criticID = practice_critictable.criticID
            WHERE practice_gametable.gameID = $find";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $users = array();

      while ($row = $result->fetch_assoc()) {
        $game = array(
          "gameID" =>  $row["gameID"],
          "gameTitle" => $row["gameTitle"],
          "criticID" => $row["criticID"],
          "criticName" => $row["name"],
          "review" => $row["review"],
          "platformID" => $row["platformID"],
          "score" => $row["score"],
          "date" => $row["date"],
          "URL" => $row["URL"]
        );
        array_push($users, $game);
      }
      echo json_encode($users);
    }
  } else {
    echo "You are not authenticated";
  }
}
















  

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_GET['update']) && isset($_GET['api_k'])) {
  include("conn.php");
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_adminapikeys WHERE api_key='$api' ";

  $res = $conn->query($checkkey);

  $num = $res->num_rows;

  if ($num > 0) {

    include("conn.php");

  $gameTitle = $_POST['var1'];
  $score = $_POST['var2'];
  $review = $_POST['var3'];
  $id = $_POST['var4'];

  include("conn.php");
  $sql = "UPDATE practice_gametable SET review = '$review',gameTitle = '$gameTitle',score ='$score' 
            WHERE gameID = {$id}";

  $result = $conn->query($sql);

}else{
  echo"Not authenticated";
}
}




if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_GET['delete']) && isset($_GET['api_k'])) {

  include("conn.php");
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_adminapikeys WHERE api_key='$api' ";

  $res = $conn->query($checkkey);

  $num = $res->num_rows;

  if ($num > 0) {

    include("conn.php");


  $gameID = $_POST['var1'];


  include("conn.php");
  $sql = "DELETE FROM practice_gametable 
            WHERE gameID = {$gameID}";

  $result = $conn->query($sql);
}else{
echo"You are not allowed";
}
}


if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_GET['add']) && isset($_GET['api_k'])) {

  include("conn.php");
  $api = $_GET['api_k'];

  $checkkey = "SELECT * FROM practice_adminapikeys WHERE api_key='$api' ";
  $res = $conn->query($checkkey);
  $num = $res->num_rows;

  if ($num > 0) {

  $gameTitle = $_POST['var1'];
  $criticID = $_POST['var2'];
  $platformID = $_POST['var3'];
  $date = $_POST['var4'];
  $score = $_POST['var5'];
  $review = $_POST['var6'];
  $url = $_POST['var7'];


  include("conn.php");
  $sql = "INSERT INTO practice_gametable (gameID, criticID,review,gameTitle,platformID,score,date,URL)
              VALUES (null,'$criticID','$review','$gameTitle','$platformID','$score','$date','$url')";

  $result = $conn->query($sql);
}else{
  echo "You are not authenticated";
}
}
