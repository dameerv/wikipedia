jQuery(document).ready(function(xTest){
        var $form = $( "#search" ),//переменная селектора формы

         
         queryType =  $(['name="choose-query"']), //селектор input радио выбора условия поиска

         url = "query.php";

        var search =  $("#query");
        
     $("#search").keyup(function(){//событие отпускание клавиши
        
        //ajax запрос
                $.get( url, $form.serialize(), function(data){
                     $("#container").html(data);
                
                }); 
                 
      
    });
    
        
     $("#search-btn").click(function(){//событие "клик по кнопке поиска"
        
        //ajax запрос
                $.get( url ,$form.serialize(), function(data){
                     $("#container").html(data);
                     
                }); 
               
      
    });
    $("#by-strong").on('change', function () {
$("#input").attr("maxlength","4");
});
         
});

    
      
    
