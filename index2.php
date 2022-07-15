if(isset($_GET['1000'])){

$find = $_GET['1000'];

include("conn.php");

$sql = "SELECT gameID, criticID, review, gameTitle, platformID, score, date FROM practice_gametable WHERE platformID={$find} LIMIT 40";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $users = array();
  while ($row = $result->fetch_assoc()) {
    $game = array(
      "gameID" =>  $row["gameID"],
      "criticID" => $row["criticID"],
      "review" => $row["review"],
      "gameTitle" => $row["gameTitle"],
      "platformID" => $row["platformID"],
      "score" => $row["score"],
      "date" => $row["date"]
    );
    array_push($users, $game);
    
  }
  
 
}
echo json_encode($users);

}

if($find == '1624'){

  include("conn.php");

  $sql = "SELECT gameID, criticID, review, gameTitle, platformID, score, date FROM practice_gametable WHERE platformID={$find} LIMIT 40";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $users = array();
    while ($row = $result->fetch_assoc()) {
      $game = array(
        "gameID" =>  $row["gameID"],
        "criticID" => $row["criticID"],
        "review" => $row["review"],
        "gameTitle" => $row["gameTitle"],
        "platformID" => $row["platformID"],
        "score" => $row["score"],
        "date" => $row["date"]
      );
      array_push($users, $game);
      
    }
    
   
  }
  echo json_encode($users);

  }

  if($find == '1290'){

    include("conn.php");
  
    $sql = "SELECT gameID, criticID, review, gameTitle, platformID, score, date FROM practice_gametable WHERE platformID={$find} LIMIT 40";
  
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      $users = array();
      while ($row = $result->fetch_assoc()) {
        $game = array(
          "gameID" =>  $row["gameID"],
          "criticID" => $row["criticID"],
          "review" => $row["review"],
          "gameTitle" => $row["gameTitle"],
          "platformID" => $row["platformID"],
          "score" => $row["score"],
          "date" => $row["date"]
        );
        array_push($users, $game);
        
      }
      
     
    }
    echo json_encode($users);
  
    }


    if($find == '3717'){

      include("conn.php");
    
      $sql = "SELECT gameID, criticID, review, gameTitle, platformID, score, date FROM practice_gametable WHERE platformID={$find} LIMIT 40";
    
      $result = $conn->query($sql);
    
      if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
          $game = array(
            "gameID" =>  $row["gameID"],
            "criticID" => $row["criticID"],
            "review" => $row["review"],
            "gameTitle" => $row["gameTitle"],
            "platformID" => $row["platformID"],
            "score" => $row["score"],
            "date" => $row["date"]
          );
          array_push($users, $game);
          
        }
        
       
      }
      echo json_encode($users);
    
      }
      
      
      
      if($find == '1633'){

        include("conn.php");
      
        $sql = "SELECT gameID, criticID, review, gameTitle, platformID, score, date FROM practice_gametable WHERE platformID={$find} LIMIT 40";
      
        $result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
          $users = array();
          while ($row = $result->fetch_assoc()) {
            $game = array(
              "gameID" =>  $row["gameID"],
              "criticID" => $row["criticID"],
              "review" => $row["review"],
              "gameTitle" => $row["gameTitle"],
              "platformID" => $row["platformID"],
              "score" => $row["score"],
              "date" => $row["date"]
            );
            array_push($users, $game);
            
          }
          
         
        }
        echo json_encode($users);
      
        }


        if($find == '1002'){

          include("conn.php");
        
          $sql = "SELECT gameID, criticID, review, gameTitle, platformID, score, date FROM practice_gametable WHERE platformID={$find} LIMIT 40";
        
          $result = $conn->query($sql);
        
          if ($result->num_rows > 0) {
            $users = array();
        

            while ($row = $result->fetch_assoc()) {
              $game = array(
                "gameID" =>  $row["gameID"],
                "criticID" => $row["criticID"],
                "review" => $row["review"],
                "gameTitle" => $row["gameTitle"],
                "platformID" => $row["platformID"],
                "score" => $row["score"],
                "date" => $row["date"]
              );
              array_push($users, $game);
              
            }
            
           
          }
          echo json_encode($users);
        
          }


          if($find == 'about'){

            include("conn.php");
          
            $sql = "SELECT aboutID, header, description,imgURL FROM practice_abouttable WHERE aboutID='1'";
          
            $result = $conn->query($sql);
          
            if ($result->num_rows > 0) {
              $users = array();
          
              while ($row = $result->fetch_assoc()) {
                $game = array(
                  "aboutID" =>  $row["aboutID"],
                  "header" => $row["header"],
                  "description" => $row["description"],
                  "URL"=>$row["imgURL"]
                );
                array_push($users, $game);
                
              }
              
             
            }
            echo json_encode($users);
          
            }

            
            
            if($find == 'reviews'){

              include("conn.php");
            
              $sql = "SELECT   user_email, practice_gametable.gameTitle, user_review FROM practice_reviewtable 
                    INNER JOIN practice_gametable 
                    ON practice_gametable.gameID = practice_reviewtable.gameID;";
            
              $result = $conn->query($sql);
            
              if ($result->num_rows > 0) {
                $users = array();
            
                while ($row = $result->fetch_assoc()) {
                  $game = array(
                    "gameTitle" => $row["gameTitle"],
                    "user_email" =>  $row["user_email"],
                     "review" => $row["user_review"],
                  );
                  array_push($users, $game);
                  
                }
                
               
              }
              echo json_encode($users);
            
              }


              if($find == 'favourites'){

                include("conn.php");
              
                $sql = "SELECT gameID,criticID,review,gameTitle,platformID,score,date FROM `practice_gametable`
                       WHERE `score`>90;";
              
                $result = $conn->query($sql);
              
                if ($result->num_rows > 0) {
                  $users = array();
              
                  while ($row = $result->fetch_assoc()) {
                $count++;
                 $game = array(
                "gameID" =>  $row["gameID"],
                "criticID" => $row["criticID"],
                "review" => $row["review"],
                "gameTitle" => $row["gameTitle"],
                "platformID" => $row["platformID"],
                "score" => $row["score"],
                "date" => $row["date"]
              );
                    array_push($users, $game);
                    
                  }
                  
                 
                }
                echo json_encode($users);
              
                }






                // ANY PAGE THAT USES API NEEDS THIS CODE

//$endp = "http://cmcgee17.lampt.eeecs.qub.ac.uk/gameAPI/?games=allgames";
//$user = "cmcgee480";
//$pw = "Mus1c5020";
//$opts = array(

// 'http' => array(
//      'method' => "GET",
//      'header' => "Authorization: Basic ".base64_encode("$user:$pw")
//   );
//include("conn.php");
//$contect = stream_context_create($opts);
//$res = file_get_contents($endp,false,$context);
//$gamedata = json_decode($res,true);