$(document).ready(function() { 

    'use strict';
       // to work nice scroll
      //  $('html').niceScroll ( { 
      //    cursorcolor: "#f7600e",
      //    cursorwidth: "10px",
      //    cursorborderradius:0,
      //    cursorborder: "2px solid #f7600e "
      //  });  


       $('#find').keyup(function(){
        var key = $(this).val();
        
           if (key != '') {
            $.ajax({
              url:'search.php',
              type: 'GET' ,
              data: 'K=' + key,  // search.php?k=val 
              success: function( get_data){
                $('.result').show();
                $('.result').html(get_data);
              } 
            });
           } else {
               $('.result').hide();
           }
    }); 
});

$(document).ready(function(){

  $('#cohes').change(function(){ 

    var id = $(this).val();
    $.ajax({
      url: 'new.php',
      type: 'GET' ,
      data: 'ID=' + id,  // search.php?k=val 
      success: function( get_data){
        $('.result').show();
        $('.result').html(get_data);
      } 
    });
});

});
