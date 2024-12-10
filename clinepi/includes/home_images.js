<script type="text/javascript">  

 (function() {  
     var rotator = document.getElementById('rotator');  // change to match image ID  
     var imageDir = 'images/';                          // change to match images folder  
     var delayInSeconds = 5;                            // set number of seconds delay  
     // list image names  
     var images = ['calagra_injury.jpg', 'dir_compensation.jpg', 'osha_farm.jpg', 'title.jpg'];  

     // don't change below this line  
     var num = 0;  
     var changeImage = function() {  
         var len = images.length;  
         rotator.src = imageDir + images[num++];  
         if (num == len) {  
             num = 0;  
         }  
     };  
     setInterval(changeImage, delayInSeconds * 1000);  
 })();  
 </script> 

