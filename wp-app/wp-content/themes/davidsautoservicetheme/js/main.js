jQuery(function($) {'use strict',

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
	});


	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Initiat WOW JS
	new WOW().init();

	// gallery filter
	$(window).load(function(){'use strict';
		var $gallery_selectors = $('.gallery-filter >li>a');
		var $gallery = $('.gallery-items');
		$gallery.isotope({
			itemSelector : '.gallery-item',
			layoutMode : 'fitRows'
		});

		$gallery_selectors.on('click', function(){
			$gallery_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$gallery.isotope({ filter: selector });
			return false;
		});
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),

			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">' + data.message + '</p>').delay(3000).fadeOut();
		});
	});


	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
  });

  // Read more setup
  // var $el, $ps, $up, totalHeight;

  // $(".clients-comments .button").click(function () {

  //   totalHeight = 0

  //   $el = $(this);
  //   $p = $el.parent();
  //   $up = $p.parent();
  //   $ps = $up.find("p:not('.read-more')");

  //   // measure how tall inside should be by adding together heights of all inside paragraphs (except read-more paragraph)
  //   $ps.each(function () {
  //     totalHeight += $(this).outerHeight();
  //   });

  //   $up
  //     .css({
  //       // Set height to prevent instant jumpdown when max height is removed
  //       "height": $up.height(),
  //       "max-height": 9999
  //     })
  //     .animate({
  //       "height": totalHeight
  //     });

  //   // fade out read-more
  //   $p.fadeOut();

  //   // prevent jump-down
  //   return false;

  // });
});

// jQuery(".carousel").carousel({
//   pause: false
// })

setInterval(() => {
  jQuery('#main-slider .next').click();
}, 7000);
