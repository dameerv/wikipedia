<?php
$strong = $_POST['strong'];
echo <<<EOT
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>лексикон дворецкого</title>
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed|Gabriela|Noto+Serif|Prosto+One" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
    
EOT;
      require_once $_SERVER['DOCUMENT_ROOT'].'/logins/loginsql.php';
    
    $query = "SELECT *  FROM `dvoretsk` WHERE strID = 'G1473'";
    $dbc = mysqli_connect($hn, $un, $pw, $db )
                            or die('Can\'t connect to base!');
   
    $result =  mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    
    mysqli_close($dbc);
    //echo $query;
    echo '<p class="strong">' . $row['strID'] . '<br>' . $row['lexem']. '<br>'. $row['pronunc']. '<br>'. $row['shortdef']. '<br>'. $row['def']. '<br>'. '</p>'; 
    
    
    
echo <<<EOT

</body>
</html>
EOT;
?>
