$(document).ready(function(){
 
 var lang = 'ru';
  
  $("#ru-button").click(function(){
    lang = 'ru';
    $("#random").html('Случайная статья');
    $("#submit").html('Поиск');
    $("#input").attr("placeholder","Введите слово");
  });
 
   $("#eng-button").click(function(){
    lang = 'en';
     $("#random").html('Random article');
      $("#submit").html('search');
     $("#input").attr("placeholder","Enter word");
  });
  
   $("#input").keyup(function() { 
     var input = $("#input");
       
    
     var baseurl = 'https://'+lang+'.wikipedia.org';
     var searchWord = input.val();
     var url = baseurl+"/w/api.php?action=query&format=json&origin=*&list=search&srsearch="+searchWord;
//$(".conteiner_text").html(url);
  $.ajax({url: url, 
      success: function(data){
        var results = data.query.search;
        var baseLink = baseurl+"/wiki/";
        
         $('.conteiner').css({"margin-top": "100%"});
     $(".conteiner").remove();
        
      for ( var i =0; i<=data.query.search.length-1; i++)     {
             var newElems;
            newElems = $(".body").append('<div class="container"><a          href="'+baseurl+'/wiki/'+data.query.search[i].title+'" target="_blank"><div class="conteiner" id="c'+i+'"><h5 class="conteiner_head" id="ch'+i+'"/></h5> <p class"conteiner_text" id="ct'+i+'"/></p></div></div></a>');
             
             
  
             
             $("#ch"+i).html(data.query.search[i].title);
             $("#ct"+i).html(data.query.search[i].snippet+'...');
             
           
    }
       $('.conteiner').css('marginTop', '0px');;   
        
      }
         
    });
    
       
    
     
    
    
 
      });
    
  
  });