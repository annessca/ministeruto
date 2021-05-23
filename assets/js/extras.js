document.addEventListener('DOMContentLoaded', function () {

  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var btn = document.getElementById("myImg");

  btn.addEventListener("click", function() {
    modal.style.display = "block";
  });

  /*
  var span = document.getElementsByClassName("close")[0];
  span.addEventListener("click", function() {
    modal.style.display = "none";
  }); */

  modal.addEventListener("click", function() {
    modal.style.display = "none";
  });


  // Set the date we're counting down to 
  let targetDate = document.getElementById('destination').innerHTML;
  var countDownDate = new Date(targetDate).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();
          
      // Find the distance between now an the count down date
      var distance = countDownDate - now;
          
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
      // Output the result in an element with id="demo"
      document.getElementById("timer").innerHTML ="<div class='start-in'>start in:</div><span><strong class='values'>"+ days +"</strong>days<strong class='values'>&nbsp;&nbsp;:"+ hours +"</strong>hours<strong class='values'>&nbsp;&nbsp;:" + minutes + "</strong>minutes<strong class='values'>&nbsp;&nbsp;:" + seconds + "</strong>secs</span>";

      // If the count down is over, write some text 
      if (distance < 0) {
          clearInterval(x);
          document.getElementById("timer").innerHTML = "EXPIRED EVENT";
      }

  }, 1000);
  
})

