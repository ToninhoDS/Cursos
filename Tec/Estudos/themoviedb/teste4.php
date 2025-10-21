
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="css/carossel2.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/card.css">


    <title>Document</title>
</head>
<body>


<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
  <h2>Our  Partners</h2>
   <section class="customer-logos slider">
      <div class="slide">
        <img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg">
      </div>
      <div class="slide">
        <img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg">
      </div>
      <div class="slide">
        <img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg">
    </div>
      <div class="slide">
        <img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg">
      </div>
      <div class="slide">
        <img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg">
      </div>
      <div class="slide">
        <img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg">
      </div>
      <div class="slide">
        <img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg">
    </div>
     
   </section>
</div>

<?php

 ?>
<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>
 <script src="js/carossel.js"></script>
</body>
</html>