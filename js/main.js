(function ($) {
  Drupal.behaviors.SiteHeaderSearchToggle = {
    attach: function (context, settings) {
      $('.site-search').hide();
      $('.search-toggle a', context).click(function(event){
        event.preventDefault();
        $('.site-search').slideToggle(320);
        $('body').toggleClass('site-search-on');
      });
    }
  };

  Drupal.behaviors.SiteHeaderMenuToggle = {
    attach: function (context, settings) {
      $('.menu-toggle button', context).click(function(event){
        event.preventDefault();
        $('.primary-menu').slideToggle(420);
      });
    }
  };

  function fitItems(target,screen,width) {
     space = Math.floor(screen / width);
     items = $(target).length;
     if(items > space) {
        items = space;
     } 
     return items;
  }

  Drupal.behaviors.SiteWaypoints = {
    attach: function(context,settings) {
      
      var wpSiteHeader = $('.site-header',context).waypoint({
        offset: '-52px',
        handler: function(direction) {
          $('.top-nav a').slideToggle();
        }
      });

      var wpMoreInfo = $('#more-info',context).waypoint({
        offset: '90%',
        handler: function(direction) {
          if(direction == "down") {
            $('.more-nav').slideUp();
          } else {
            $('.more-nav').slideDown();
          }
        }
      });

      $('.top-nav', context).click(function(event){
        $("html, body").animate({ scrollTop: 0 }, 444);
      	return false;
      }); 
    }
  };

  Drupal.behaviors.ClickForm = {
    attach: function(context,settings) {
      $('.contact-form input').on('click',function(){
         $('.more-nav, .top-nav, .social-share').fadeOut("fast");
      });
    }
  }  

  Drupal.behaviors.OwlCarousel = {
    attach: function(context,settings){
       // unsetting the function defined SPruit
    }
  };

  Drupal.behaviors.SmoothScroll = {
    attach: function(context,settings) {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if(location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    }
  };

  Drupal.behaviors.tracking = {
    attach: function(context,settings){
      $("#webform-client-form-1").submit(function(){
        fbq('track', 'ViewContent');
      });
    }
  }

})(jQuery);
