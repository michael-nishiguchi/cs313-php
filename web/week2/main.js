$(document).ready(function(){
   $('#fade').on('click', function(event) {
      $('#div3').fadeToggle(1000);
   })
   //$('#div3').css('background-color', 'pink');

})


function setColor() {

   var color = $('#color').val();

   if(isColor(color)) {
      $('#div3').css('background-color', color);
   }
   else {
      alert(color + " is not a color");
   }
}

function isColor(strColor){
   var s = new Option().style;
   s.color = strColor;
   return s.color == strColor;
}
