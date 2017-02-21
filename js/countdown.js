(function ($) {
  Drupal.behaviors.AgendaCountdown = {
    attach: function (context, settings) {

      // set the date we're counting down to
      var target_date = new Date("Mar 15, 2017").getTime();
       
      // variables for time units
      var days, hours, minutes, seconds;
       
      // get tag element
      var countdown = document.getElementById("tk2017countdown");

      // update the tag with id "countdown" every 1 second
      setInterval(function () {

          // find the amount of "seconds" between now and target
          var current_date = new Date().getTime();
          var seconds_left = (target_date - current_date) / 1000;

          // do some time calculations
          days = parseInt(seconds_left / 86400);
          seconds_left = seconds_left % 86400;

          hours = parseInt(seconds_left / 3600);
          seconds_left = seconds_left % 3600;

          minutes = parseInt(seconds_left / 60);
          if (minutes <10) {
            minutes = '0' + minutes;
          }
          seconds = parseInt(seconds_left % 60);
          if (seconds < 10) {
            seconds = '0' + seconds;
          }

          // format countdown string + set tag value
          countdown.innerHTML = "Stem over " + days + " dagen en " + hours + ":"
          + minutes + ":" + seconds + " uur" + "</br>Voor een Nationaal ZorgFonds";

      }, 1000);


    }
  }

})(jQuery);

