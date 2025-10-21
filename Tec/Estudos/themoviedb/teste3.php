<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carossel.css">
    <!-- <script src="carossel.js"></script> -->
    <title>Document</title>
    <script>
      $(document).ready(function() {

function play() {
    setInterval(function(){
        var next = $(".slideshow .active").removeClass("active").next(".image");
        if (!next.length) {
            next = $(".slideshow .image:first");
        }
        next.addClass("active");
    }, 5000);
}
play();

});

/*THIS IS WHERE SCRIPT FOR NAV BAR BEGINS*/

$(window).scroll(function() {

    if ($(window).scrollTop() > 50) {
        $('nav').addClass('follow');
    } else {
        $('nav').removeClass('follow');
    }
});

    </script>
</head>
<body>
<nav>
    <li class="flex-item">TESTMADE</li>
     <li class="flex-item">ABOUT</li>
    <li class="flex-item">NEWS</li>
    <li class="flex-item">SUPPORT</li>
  </nav>
</div>
  <div class="main-screen">
    <ul class="slideshow">
      <li class="image active"> <h1><i>Psst!</i>...Scroll Down To Reveal Content</h1></li>
      <li class="image"><h1><i>Psst!</i>...Scroll Down To Reveal Content</h1></li>
      <li class="image"><h1><i>Psst!</i>...Scroll Down To Reveal Content</h1></li>
    </ul>
  </div>
 



</body>
</html>