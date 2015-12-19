<?php

  include "../session.php";
    if(!checkSession()) {
      die( "<script>if(parent.logout) parent.logout(301); else document.location.href=\"http://onlineevents.techtatva.in/?nologin=true\";</script>");
    }
    
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Electrific</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
      <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
        <link rel="stylesheet" href="css/style.css">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
  <script type="text/javascript">
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
  </head>

  <body>

    <!-- Preloader -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>

<div class="container">
  <div class="row">

  <!-- previous questions -->

    <div class="col-md-6 previous">
        <form class="electrific" id="theForm" action="upload.php" method="post" enctype="multipart/form-data" onsubmit="start();">       
          <h2 class="electrific-heading">Previous Questions</h2>
           <p>Your previously answered questions will show up here.</p>
        </form>
    </div>

    <!-- play part -->
    <div class="col-md-6 play">
          <div class="electrific welcome">     
                  <h2 class="electrific-heading">Electrific!</h2>
                  <h4 class="question_no"></h4>
                  <h3 class="question"></h3>
                  <img class="image"/>
                <form method="post" action="answer.php" id="form">
                  <input type="text" name="answer" required id="answer" style="display:none;" />
                </form><br>
                  <button class="btn btn-lg btn-success btn-block" id="start-quiz">Start Quiz</button>
          </div>
    </div>

  </div>
</div>
    

      <!-- Preloader -->
  <script type="text/javascript">
    //<![CDATA[
      $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
      })
    //]]>
  </script>
  
  <script src="js/default.js"></script>


  </body>
    </body>
  <div class="se-pre-con"></div>
</html>
