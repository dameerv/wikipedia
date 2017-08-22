<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>insert data</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
 require_once 'loginsql.php';
$srsf =  file('biblewords.txt');
$counting = 0;
foreach($srsf as $line)
{
  
$dbc = mysqli_connect($hn, $un, $pw, $db )
    or die('Can\'t connect t    o base!');
        $row = explode("@", $line);
        $query = "INSERT INTO `gr_words` (book_name_rus, chapter, vers, grafe, russ, strong, morf) VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]')"; // . trim($row[0]) . "', chapter = '" . trim($row[1]) . "'vers = '" . trim($row[2]) . "', grafe = '" . trim($row[3]) . "', russ = '" . trim($row[4]) . "', strong = '" . trim($row[5]) . "', morf = '" . trim($row[6]) . "'";             
        mysqli_query($dbc, $query);
        mysqli_close($dbc);
        global $counting;
        $counting ++;
        echo $row[3]. ' ' . $row[5] . '<br>' ;
}
echo 'Added ' .$counting. 'lines.' 

 ?>
</body>
</html>