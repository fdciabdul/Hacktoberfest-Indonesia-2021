// audio
// function play() {
// 	var audio = document.getElementById("audio");
// 	audio.play();
// }

// Animate On Scroll Library : https://michalsnik.github.io/aos/
AOS.init({
  delay: 200,
  duration: 1000
});

// auto scroll
$(document).ready(function() {
  var audioElement = document.createElement('audio');
  audioElement.setAttribute('src', 'music/bentuk-cinta-full.ogg');
  
  audioElement.addEventListener('ended', function() {
      this.play();
  }, false);
  
  audioElement.addEventListener("canplay",function(){
      $("#length").text("Duration:" + audioElement.duration + " seconds");
      $("#source").text("Source:" + audioElement.src);
      $("#status").text("Status: Ready to play").css("color","green");
  });
  
  audioElement.addEventListener("timeupdate",function(){
      $("#currentTime").text("Current second:" + audioElement.currentTime);
  });
  
  $('#play').click(function() {
      audioElement.play();
      $("#status").text("Status: Playing");
  });
  
  $('#pause').click(function() {
      audioElement.pause();
      $("#status").text("Status: Paused");
  });
  
  $('#restart').click(function() {
      audioElement.currentTime = 0;
  });

  var scroll = true;
  $(window).scroll(function (e) {

      // var position = $(document).scrollTop();
      // var startP = $("#").position();
      var finishP = $("#two");
      
      if(audioElement.currentTime == 8.843565 && scroll==true ) {
          scroll = false;
          
          $('html,body').animate({scrollTop: finishP.offset().top},2000);
          
      }
  });
});  