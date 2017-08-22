<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Конкорданция стронга</title>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Fira+Sans+Extra+Condensed:300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="js/ajax.js"></script>
 
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>КОНКОРДАНЦИЯ СТРОНГА</h1><br />
 
  <form method="get" id="search" >
        <fieldset form="search" class="fieldset" id="search-field"> 
        <legend>Введите искомое значение</legend>
    
    <input type="text" id="query" name="query" autofocus required/>
    <input type="button" name="search" id="search-btn" value="Поиск" /></fieldset>
    
    <fieldset form="search" class="fieldset" id="search-choose"> 
     <legend>Условия поиска</legend>
   <label for="choose-query">По значению:
    <input type="radio" id="by-meaning" name="choose-query" value="meaning" checked="checked" /></label>
    <label for="choose-query">По номеру стронга:
    <input type="radio" id="by-strong" name="choose-query" value="strong"  />  </label>
    <label for="choose-query">По начертанию:
    <input type="radio" id="by-graph" name="choose-query" value="grafe" /> </label>  
     <br />
       </fieldset>
    <fieldset form="search" class="fieldset" id="concor-choose">
         <legend>Где искать</legend> 
         
    <label for="choose-concord">Греческий конкорданс:
    <input type="radio" id="by-strong" name="choose-concord" value="concor_greek" checked="checked"  /></label> 
     <label for="choose-concord">Еврейский конкорданс:
    <input type="radio" id="by-strong" name="choose-concord" value="concor_heebr" /> </label> 
    </fieldset>

    
  </form>
 <div class="conteiner" id="container"> 
    
 
  
  <?php
        require_once'query.php';
       
        
        
        
   
    
         
  ?>
  
  </div>
  <?php

 ?>
</body>
</html>
