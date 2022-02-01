$(document).ready(function(){
  $('.nav-btn').click(function(){
    $('.nav-btn').toggleClass('open');
    //$('.navbar').toggleClass('open');
  });


  // number count for stats, using jQuery animate
  $('.counting').each(function() {
    var $this = $(this),
      countTo = $this.attr('data-count');
      $({ countNum: $this.text()}).animate({
        countNum: countTo
      },
      {
      duration: 2000,
      easing:'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      },
      complete: function() {
        $this.text(this.countNum);
      }
    });
  });

  $('#mailto').val('info@livelookingglass.com, info@lennar.com');

  $('input.builder-radio').change(function(){
    var emailTo = $(this).attr('data-mailto');
    $('#mailto').val(emailTo);
  });

	// Function to display homepage lightbox popup
	function displayLightbox(){
		$('html body').addClass('is-active');
		$('#homepagePopup').addClass('is-active');
	}
	function closeLightbox(){
		$('html body').removeClass('is-active');
		$('#homepagePopup').removeClass('is-active');
	}

	if(window.location.pathname === '/'){
    setTimeout(function(){
      displayLightbox();
    }, 5000);
  }

	$('.closePopup').click(function(){
		closeLightbox();
	});

});




// Init AOS
AOS.init();

// Smooth Scroll
// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          }
        });
      }
    }
  });
