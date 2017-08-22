<?php
//ini_set('display_errors', 'Off');
       
        
       
      
        $text_in = preg_replace('/[{})(\[\]$-]|if|\(.+\)|echo|print|prin_f|\{/i', '', $_GET['query']);
        $choose_query = $_GET['choose-query'];
        $search = $_GET['search'];
        $choose_concord = $_GET['choose-concord'];
         require_once 'logins/loginsql.php';
        
        if(!$text_in==''){
          
        $conn = mysqli_connect($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
        
        //поиск по номеру стронга    
        if($choose_query=='strong'){
            if(preg_match('/[0-9]/',$text_in)){
                $query = "SELECT * FROM $choose_concord WHERE strID = $text_in";}
                else{
                echo '<h2 class="error">Введите число!</h2>';
                 }
        
                }
                //поиск по значению
        else if($choose_query=='meaning'){
                     $query = "SELECT * FROM $choose_concord WHERE disc LIKE '% $text_in%' OR disc LIKE '$text_in %' LIMIT 0, 30";
             
               
            
         }
                //поиск по греческому начертанию
        else if($choose_query=='grafe'){
                     $query = "SELECT * FROM $choose_concord WHERE  grf LIKE '$text_in%'";
            
              }
        
        query($query, $conn);    
        }
        else{
             echo '<h1></h1>';
        //Вывод при первой загрузке
        echo <<<END
        <p><strong>Конкорданс</strong><em>(словоуказатель)</em><strong> Стронга</strong> – полный словоуказатель выполненный по переводу Библии короля Иакова под руководством доктора экзегетической теологии Иакова Стронга (1822-1894) и впервые опубликованный в 1890г. Это был полный список всех слов в Библии Короля Иакова с перекрёстными ссылками на соответствующие слова в оригинальном тексте. </p>
<ul><br>Конкорданс включал:<br>
<li>8674 корневых форм еврейских слов Ветхого Завета.</li>
  <li>5523 корневых форм греческих слов Нового Завета.</li>
  </ul></br>
<p>Иаков Стронг создал одноимённый конкорданс не самостоятельно. Он был создан усилиями более ста его коллег и стал наиболее широко используемым конкордансом Библии Короля Иакова.<br><br>

Все слова оригинальных текстов были отсортированы в алфавитном порядке, и каждому из них был присвоен уникальный номер. Эта система нумерации слов стала известна как «Номера Стронга». Это позволяло пользователю конкорданса посмотреть значение оригинального слова в словаре идущем в конце конкорданса. Конкорданс Стронга до сих пор переиздаётся. Также, нумерация Стронга стала популярна применительно и к переводам выполненным на другие языки.<br>

  Греческие слова конкорданса Стронга пронумерованы с <strong class="red">1</strong> по  <strong class="red">5624</strong>. Номера  <strong class="red">2717</strong> и  <strong class="red"> 3203-3302</strong> были зарезервированы. Номера присваивались только словарной форме слова и поэтому, например αγαπησεις и αγαπατε имеют тот же номер  <strong class="red">(25)</strong> что и αγαπαω.<br></p>
 
 
 
<h2>Дополнения присутствующие в этой симфонии</h2><br>
  
<ul> 
Наряду с предоставлением словарных определений для каждого номера конкорданса – присутствуют также и следующие информационные дополнения:
 
<li>Все варианты греческих слов имеющие соответствующий номер Стронга со ссылками на греческо-русскую симфонию подстрочного перевода. Список отсортирован в алфавитном порядке.</li>
 
<li>Все варианты перевода обнаруженные в Синодальном тексте, где они сопоставлены соответствующему номеру Стронга. Список отсортирован в порятке убывания частоты.</li>
 
<li>Все варианты перевода обнаруженные в Библии короля Иакова, где они сопоставлены соответствующему номеру Стронга. Список отсортирован в порядке убывания частоты.</li></ul></p>
        
END;
        }
       
    
      function query($query, $conn ){
            /* $start = microtime(true);
                    вствить сюда функцию для определения скорости выполнения
              echo 'Время выполнения скрипта: '.(microtime(true) - $start).' сек.';*/  
             $result = mysqli_query($conn, $query);
             
             
             echo 'Поиск по слову: <strong>' . $GLOBALS["text_in"] . '</strong>.<br>';
            
              
             $printout;
            
             while($row = mysqli_fetch_array($result)){
                  
                // echo '<table class="tb-conc"><tr><td class="strong-num" rowspan="2">' . $row['strID'] . '</td><td class="grafe">' . $row['grf'] . '</td></tr><tr><td class="td-discript" >' . $row['disc'] . '</td></tr></table>';
                  $printout .='<table class="tb-conc"><tr><td class="strong-num" rowspan="2">' . $row['strID'] . '</td><td class="grafe">' . $row['grf'] . '</td></tr><tr><td class="td-discript" >' . $row['disc'] . '</td></tr></table>';
                  //strID = номер стронг, grf = начертание(grafe), disc(discription) = описание(значение)
                  $count_result++;
                 
                }
                
            
            
            echo $printout;
             
            
          


                
            mysqli_close($conn);
         
        }
         
  ?>