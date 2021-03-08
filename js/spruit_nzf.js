(function ($) {
  Drupal.behaviors.NZFanimate = {
    attach: function (context, settings) {

      setTimeout(function(){
        $("#nzf-header-aftrap").addClass("nzf-header-aftrap-show");
      }, 1000);

      $("#nzf-header-aftrap").click(function(){
        window.location.href = "/fractievoorzitters";
      });

    }
  }

})(jQuery);

