  var started = false;

  $("#start-quiz").click(function() {


    if(started == false) {
        $("#start-quiz").html("Submit");
        $("#answer").css("display","initial");
        started =true;
    }
    else
        checkAnswer();



   
  $(".previous").animate({
    opacity: 0.9,
    top : "0",
    left: "30px",
    height: "500px",
    width : "250px"
  }, 1000); 
    // Animation complete.
$( ".play" ).animate({
    top : "0vh",
     right: "0px",
    left: "50vh",
    height: "70vh",
    width : "60vw"
  }, 1000);

// json fetch

 $(function() {
    update_content();
});

});


function update_content() {
    $.getJSON("start.php", function(data) {
        $(".question_no").empty();
        $.each(data.json,
            function() {
                if(this['victory']==1)
                {
                    alert("You've already completed this event!");
                    localLogout();
                    return;
                }
                
                $(".question").html(this['question']);
                $(".question_no").html(this['question_no']+this['subgroup']);
                
                if(this['question_no']!=""){
                    $(".image").css("display","initial");
                    $(".image").attr("src",this['file']);
                }
                
                else {
                    $(".image").css("display","initial");
                    $(".image").attr("src","");
                }

            }
        );

        setTimeout(function(){
            update_content();
        }, 1000);
    });
}

function checkAnswer() {
    var d={};
    d.answer = $("#answer").val();
    
    console.log(d);
    
    $.ajax({
      dataType: "json",
      url: "answer.php",
      data: d,
      success: function(data) {
        
            $.each(data.json, 
                function() {
                    if(this['result']=='valid') {

                        $("#answer").val("");

                        alert("Correct!");
                        $(".question").html(this['question']);
                        $(".question_no").html(this['question_no']+this['subgroup']);
    
                        if(this['question_no']!="") {
                            $(".image").css("display","initial");
                            $(".image").attr("src",this['file']);
                        }
                        else {
                            $(".image").css("display","initial");
                            $(".image").attr("src","");
                        }
                    }
                    else if(this['result'] == "victory"){
                        alert("Kudos! You have successfully completed all the questions in this event!");
                        localLogout();
                    }
                    else if(this['result'] == "invalid")
                        alert("Wrong Answer!")
                }
            ); 
        }
    });

    /*$.getJSON("answer.php", );
        setTimeout(function(){
            update_content();
        }, 1000);
    });*/

}

function localLogout() {
    if(parent.logout)
        parent.logout(301);
    else 
        document.location.href="http://onlineevents.techtatva.in/";
}
