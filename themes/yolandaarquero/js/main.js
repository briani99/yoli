(function($){
	
$.noConflict();

$(document).ready(function(){
    
    function dirIsRtl(){
		if ( $("html").attr("dir") == "rtl" ){
			return true;
		} else {
			return false;
		}
	}
    
    $(".site-topbar .search").click(function(){
	    if ( $(this).hasClass("open") ){
			$(this).removeClass("open");
			$(".site-header").removeClass("search-open");
			$(this).find(".fa").html("").addClass("fa-search");
			$(".site-header #searchform").fadeOut(200); 
			$(".site-header #searchform input[type='text']").focusout();
		} else {
			$(this).addClass("open");
			$(".site-header").addClass("search-open");
			$(this).find(".fa").html("✕").removeClass("fa-search");
			$(".site-header #searchform").fadeIn(200); 
			$(".site-header #searchform input[type='text']").focus();
			return false;
		}
    });
    
    viewportUnitsBuggyfill.init();
	
	// Abre el callmeback
	$("#callmeback-trigger").click(function(){
		$("#callmeback-trigger").addClass("closed");	
		setTimeout(function(){
			$("#callmeback").addClass("opened");	
		}, 200);
	});
	// Cierra el callmeback
	$("#callmeback .closer").click(function(){
		$("#callmeback").removeClass("opened");
		setTimeout(function(){
			$("#callmeback-trigger").removeClass("closed");	
		}, 200);	
	});
	
	// Tooltips con click
	$(document).on("click", ".tooltip-click .tooltip-icon", function(){
		if ( $(this).parents(".tooltip-click").hasClass("open") ){
			$(".tooltip-click").removeClass("open");
		} else {
			$(".tooltip-click").removeClass("open");
			$(this).parents(".tooltip-click").addClass("open");
		}
	});
    	
    // Efecto hover del menu	
    $(".home .site-header #menu-menu-principal > li > a, .home .site-header #menu-menu-principal > li .sub-menu-outer").mouseenter(function(){
	    if ( $(window).width() > 991 ){
		    $(".site-topbar").addClass("hovered");
		    $(".site-header").addClass("hovered");
	    }
    });

    $(".home .site-header #menu-menu-principal > li > a,  .home .site-header #menu-menu-principal > li .sub-menu-outer").mouseleave(function(){
	    if ( $(window).width() > 991 ){
			$(".site-topbar").removeClass("hovered");
			$(".site-header").removeClass("hovered");
		}
    });
    
	$("#home-carousel .carousel-container .left").slick({
	    autoplay: false,
	    arrows: false,
	    dots: false,
	    slidesToShow: 1,
	    draggable: false,
	    infinite: true,
	    pauseOnHover: false,
	    swipe: false,
	    loop: true,
	    touchMove: false,
	    vertical: true,
	    verticalSwiping: true,
	    speed: 1200,
	    useTransform: true,
	    cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
	});
	
	$("#home-carousel .carousel-container .right").slick({
	    autoplay: false,
	    arrows: false,
	    dots: false,
	    slidesToShow: 1,
	    draggable: false,
	    infinite: true,
	    pauseOnHover: false,
	    swipe: false,
	    loop: true,
	    touchMove: false,
	    vertical: true,
	    verticalSwiping: true,
	    speed: 1200,
	    useTransform: true,
	    cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
	});
	
	$("#home-carousel .carousel-container .arrows a.up").click(function(){
		$("#home-carousel .carousel-container .left").slick("slickNext");
		$("#home-carousel .carousel-container .right").slick("slickPrev");		
	});
	
	$("#home-carousel .carousel-container .arrows a.down").click(function(){
		$("#home-carousel .carousel-container .left").slick("slickPrev");
		$("#home-carousel .carousel-container .right").slick("slickNext");						
	});

	// Slider de instalaciones
	$("#home-latest .promotions-slider").slick({
		slidesToShow: 2,
		slidesToScroll: 2,
		infinite: false,
		prevArrow: '<button type="button" data-role="none" class="slick-prev slick-arrow"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" data-role="none" class="slick-next slick-arrow"><i class="fa fa-angle-right"></i></button>',
		dots: false,
		focusOnSelect: true,
		responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		      }
		    }
		  ]
	});
		
	// Slider de instalaciones
	$("#page-instalaciones .tab-content .slider").slick({
		centerMode: true,
  		centerPadding: '60px',
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: false,
		rtl: dirIsRtl(),
		focusOnSelect: true
	});
	
	// Slider de instalaciones
	$("#page-medios .featured .media-featured-slider").slick({
		autoplay: true,
		autoplaySpeed: 4000,
		pauseOnHover: false,
		centerMode: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: "#page-medios .featured .media-featured-slider-prev",
		nextArrow: "#page-medios .featured .media-featured-slider-next",	
		dots: false,
		focusOnSelect: true
	});

	// Slider de post tipo galeria
	$("#single-content .gallery .slider").slick({
		centerMode: true,
  		centerPadding: '0px',
		slidesToShow: 1,
		slidesToScroll: 1,
		adaptiveHeight: true,
		prevArrow: "#single-content .gallery .prev",
		nextArrow: "#single-content .gallery .next",		
		dots: false,
		rtl: dirIsRtl(),
		focusOnSelect: true
	});
	
	$("#page-instalaciones .tab-content .slider-container .prev").click(function(){
		$(this).parents(".slider-container").find(".slider").slick("slickPrev")
	});
	$("#page-instalaciones .tab-content .slider-container .next").click(function(){
		$(this).parents(".slider-container").find(".slider").slick("slickNext")
	});
	$("#page-instalaciones .slider-tabs-container ul li a").click(function(){
		setTimeout(function(){
			$("#page-instalaciones .tab-content .slider").slick('setPosition');			
		}, 250);
	});

	// Slider de proyectos de fundacion
	if ($("#page-fundacion .slider .slide").length > 1 ){
		$("#page-fundacion .slider").slick({
			centerMode: true,
			centerPadding: "0px",
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: "#page-fundacion .slider-container .prev",
			nextArrow: "#page-fundacion .slider-container .next",
			dots: false,
			rtl: dirIsRtl(),
			focusOnSelect: true
		});
	} else {
		$("#page-fundacion .projects .prev, #page-fundacion .projects .next").css("opacity", "0"); 
	}

	// Slider de videos de Transformative Stories
	if ($("#page-transformative-stories .slider .slide").length > 1 ){
		$("#page-transformative-stories .slider").slick({
			centerMode: true,
			centerPadding: "0px",
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: "#page-transformative-stories .slider-container .prev",
			nextArrow: "#page-transformative-stories .slider-container .next",
			dots: false,
			rtl: dirIsRtl(),
			focusOnSelect: true
		});
	} else {
		$("#page-transformative-stories .videos .prev, #page-transformative-stories .videos .next").css("opacity", "0"); 
	}
		
	// Desplegable de registro en página de prensa
	$(".open-register-js").click(function(){
		if ( $(this).parents("section").find(".register").hasClass("open") ) { 
			$(this).parents("section").find(".register").removeClass("open");		
		} else {
			$(this).parents("section").find(".register").addClass("open");		
		}
	});

	$(".close-register-js").click(function(){
		$(this).parents(".register").removeClass("open");		
	});

	// Desplegable de contacto en página de contacto
	$(".open-contact-js").click(function(){
		$(this).parents("section").find(".emails").removeClass("open");		
		if ( $(this).parents("section").find(".contact").hasClass("open") ) { 
			$(this).parents("section").find(".contact").removeClass("open");		
		} else {
			$(this).parents("section").find(".contact").addClass("open");		
		}
	});

	$(".close-contact-js").click(function(){
		$(this).parents(".contact").removeClass("open");		
	});
	
	// Desplegable de como llegar en página de contacto
	$(".open-directions-js").click(function(){
		if ( $(this).parents("section").find(".directions").hasClass("open") ) { 
			$(this).parents("section").find(".directions").removeClass("open");		
		} else {
			$(this).parents("section").find(".directions").addClass("open");		
		}
	});

	$(".close-directions-js").click(function(){
		$(this).parents(".directions").removeClass("open");		
	});
	
	// Scroll animado
	$('a[href*="#"]:not([href="#"]):not(.nav-tab):not(.nav-pill):not(.panel-title a)').click(function() {
	    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
	        var target = $(this.hash);
	        if ( $(window).width() <= 767 ) { 
	        	var alturaHeader = 60;
	        } else {
				var alturaHeader = 100;
	        }
	        //console.log(alturaHeader);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	        if (target.length) {
	            $('html, body').animate({
	                scrollTop: target.offset().top - alturaHeader
	            }, 600);
	            return false;
	        }
	    }
	});


	
	// Toggles 
	$(document).on("click", ".toggles-container .toggle .toggle-title", function(){
		$togglesContainer = $(this).parents(".toggles-container");
		$toggle = $(this).parents(".toggle");
		if ( $toggle.hasClass("slide") && $(window).width() > 767 ){
			$togglesContainer.find(".toggle").removeClass("open");
			$togglesContainer.find(".toggle .toggle-content").removeClass("open");
			$toggle.addClass("open");
			$toggle.find(".toggle-content").addClass("open");			
		} else {
			if ( $toggle.hasClass("open") ){
				$toggle.removeClass("open");
				$toggle.find(".toggle-title .fa").toggleClass('fa-angle-down fa-angle-up');
				$toggle.find(".toggle-content").slideUp(300);
			} else {
				$togglesContainer.find(".toggle").removeClass("open");
				$togglesContainer.find(".toggle .toggle-content").slideUp(300);
				$togglesContainer.find(".toggle .toggle-title .fa-angle-up").toggleClass('fa-angle-down fa-angle-up');
				$toggle.find(".toggle-title .fa").toggleClass('fa-angle-down fa-angle-up');
				$toggle.addClass("open");
				$toggle.find(".toggle-content").slideDown(300);
			}
		}
	});
	
	$(".toggles-container .toggle .toggle-content .closer").click(function(){
		$togglesContainer = $(this).parents(".toggles-container");
		$toggle = $(this).parents(".toggle");
		$togglesContainer.find(".toggle").removeClass("open");
		$togglesContainer.find(".toggle .toggle-content").removeClass("open");			
	});
	
	
	// Filtro para la página de programas y carga con AJAX
	$("#filter-programas input[type='checkbox']").on("change", function(){
		var activeValues = "";
		var url = $("#filter-programas input[name='url']").val();
		var $containerAjax = $("#page-programas");
		var $loader = $(".loader-programas");
		if ( $(this).val() == "all" || $("#filter-programas input[type='checkbox']:checked").length == 0 ){
			//window.location.replace(url);
			$("#filter-programas input[type='checkbox']").prop("checked", false);
			$("#filter-programas input[value='all']").prop("checked", true);
			$loader.fadeIn(400);
			$containerAjax.addClass("loading");
			setTimeout(function(){
				$.ajax({
					url: url,
					global: false,
					success: function(data) { 
						$containerAjax.html( $(data).find("#page-programas").html() );
						setTimeout(function(){
							window.history.pushState("", "", url);
							$loader.fadeOut(400);
							$containerAjax.removeClass("loading");
						}, 1000);
					}
				});
			}, 1000);	
		} else {
			$("#filter-programas input[value='all']").prop("checked", false);
			$("#filter-programas input[type='checkbox']:checked").each(function(){
				if (activeValues == "" ){
					activeValues = $(this).val();
				} else {
					activeValues += "," +$(this).val();
				}
			});	
			//window.location.replace(url + "?cat=" + activeValues);
			$loader.fadeIn(400);
			$containerAjax.addClass("loading");
			setTimeout(function(){
				$.ajax({
					url: url + "?cat=" + activeValues,
					global: false,
					success: function(data) { 
						$containerAjax.html( $(data).find("#page-programas").html() );
						setTimeout(function(){
							window.history.pushState("", "", url + "?cat=" + activeValues);
							$loader.fadeOut(400);
							$containerAjax.removeClass("loading");
						}, 1000);
					}
				});
			}, 1000);	
		}
	});
	
	// Filtro para la página de de comparador de programas
	$("#page-comparador-programas .card input[type='checkbox']").on("change", function(){
		var activeValues = "";
		var url = $("#page-comparador-programas input[name='url']").val();
		var length = $("#page-comparador-programas .card input[type='checkbox']:checked").length;
		if ( length >= 3){
			$("#page-comparador-programas .button").removeClass("disabled");
			swal($(".error-messages .error-title-1").text(), $(".error-messages .error-description-1").text(), "warning");
			$(this).prop("checked", false).blur();
			return false;
		} else if (length == 2 ) {
			$("#page-comparador-programas .button").removeClass("disabled");
		} else {
			$("#page-comparador-programas .button").addClass("disabled");
		}
		if ( $(this).prop("checked") == true ){
			$(this).parents(".card").addClass("active");
		} else {
			$(this).parents(".card").removeClass("active");
		}
	});
	
	// Filtro por AJAX del comparador de programas
	$("#page-comparador-programas .js-comparar").click(function(){
		var activeValues = "";
		var url = $("#page-comparador-programas input[name='url']").val();
		var $containerAjax = $("#page-comparador-result");
		var $loader = $(".loader-programas");
		var length = $("#page-comparador-programas .card input[type='checkbox']:checked").length;
		if ( length == 0){
			swal($(".error-messages .error-title-2").text(), $(".error-messages .error-description-2").text(), "info");
		} else if (length == 1) {
			swal($(".error-messages .error-title-2").text(), $(".error-messages .error-description-3").text(), "info");
		} else {
			$("#page-comparador-programas input[type='checkbox']:checked").each(function(){
				if (activeValues == "" ){
					activeValues = $(this).val();
				} else {
					activeValues += "," +$(this).val();
				}
			});
			$loader.fadeIn(400);
			$containerAjax.addClass("loading");
			$('html, body').animate({
	            scrollTop: $("#page-comparador-result").offset().top - 100
	        }, 800);
			setTimeout(function(){
				$.ajax({
					url: url + "?ids=" + activeValues,
					global: false,
					success: function(data) { 
						$containerAjax.html( $(data).find("#page-comparador-result").html() );
						setTimeout(function(){
							window.history.pushState("", "", url + "?ids=" + activeValues);
							$loader.fadeOut(400);
							$containerAjax.removeClass("loading");
						}, 1000);
					}
				});
			}, 1000);
		}
		return false;
	});
	
	// Muestra el contenido en el tipo .block2
	if ($(window).width() <= 767 ){
		$(".block-ls .block2").click(function(){
			$(".block-ls .block2 .description").slideUp(200);
			$(this).find(".description").stop().slideToggle(200);
		});
	} else {
		$(".block-ls .block2").hover(function(){
			$(this).find(".description").stop().slideDown(200);
		});
		$(".block-ls .block2").mouseleave(function(){
			$(this).find(".description").stop().slideUp(200);
		});

	}
	
	// Filtro para la página de empleo y carga con AJAX
	$("#page-empleo .form.filter").on("submit", function(event){
		event.preventDefault();
		var formAction = $(this).attr('action');
		var selectedOption = $(this).find("select").val();
		var $containerAjax = $("#page-empleo .empleo-ls");
		var $loader = $("#page-empleo .loader-empleo");
		if ( selectedOption == "" ){
			var url = formAction;
		} else {
			var url = formAction + "?cat=" + selectedOption;
		}
		$loader.fadeIn(400);
		$containerAjax.addClass("loading");
        $('html, body').animate({
            scrollTop: $("#page-empleo").offset().top - 100
        }, 800);
		setTimeout(function(){
			$.ajax({
				url: url,
				global: false,
				success: function(data) { 
					$containerAjax.html( $(data).find(".empleo-ls").html() );
					setTimeout(function(){
						window.history.pushState("", "", url);
						$loader.fadeOut(400);
						$containerAjax.removeClass("loading");
					}, 1000);
				}
			});
		}, 1000);	


		//return false;
	});

    
	// Play en pagina de Sha Spirit
	/*
	$("#page-spirit .video .play").click(function(){
		var $videoContainer = $(this).parents(".video");
		var $sectionContainer = $(this).parents("section");
		$sectionContainer.addClass("video-is__playing");
		player.playVideo();
		//var $iframe = $videoContainer.find("iframe");
		//var iframeSrc = $iframe.attr("src");
		//$iframe.attr("src", iframeSrc + "?autoplay=1");
	});
	*/
				        
	// Slider de otros Maestros *Deshabilitado provisionalmente
	/*
	$("#single-maestros .sidebar .other .slider").slick({
	    autoplay: false,
	    dots: false,
	    prevArrow: "#single-maestros .sidebar .other .navigation .prev",
	    nextArrow: "#single-maestros .sidebar .other .navigation .next",
	    slidesToShow: 4,
	    slidesToScroll: 1,
	    infinite: false,
  		loop: false,
	    speed: 300,
	    useTransform: true,
	    cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
	});
	*/

	// Sliders en pagina de suites
	$("#page-residences .gallery-container .thumbnails .thumb, #page-suites .gallery-container .thumbnails .thumb").click(function(){
		if ( !$(this).hasClass("active") ){
			img = $(this).attr("data-img");
			$gallery = $(this).parents(".gallery-container");
			$gallery.find(".thumbnails .thumb").removeClass("active");
			$(this).addClass("active");
			$gallery.find(".image .bg").css("background-image", "url(" + img + ")");
		}	
		return false;
	});
	
	// Slider en single de suites
	$("#single-suites .main .bg .slider").slick({
	    autoplay: false,
	    dots: false,
	    prevArrow: "#single-suites .main .arrows .prev",
	    nextArrow: "#single-suites .main .arrows .next",
	    slidesToShow: 1,
	    slidesToScroll: 1,
		infinite: true,
		speed: 300,
		rtl: dirIsRtl(),
		useTransform: true,
	    cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)'
	});

	$("#single-residences .main .bg .slider").slick({
	    autoplay: false,
	    dots: false,
	    prevArrow: "#single-residences .main .arrows .prev",
	    nextArrow: "#single-residences .main .arrows .next",
	    slidesToShow: 1,
	    slidesToScroll: 1,
		infinite: true,
		speed: 300,
		rtl: dirIsRtl(),
		useTransform: true,
	    cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)'
	});

	$("#single-suites .main .bg .slider").on('beforeChange', function(event, slick, currentSlide, nextSlide){
		$("#single-suites .sidebar .gallery .image").removeClass("active");
		$("#single-suites .sidebar .gallery .image[data-index='" + nextSlide + "']").addClass("active");
	});

	$("#single-residences .main .bg .slider").on('beforeChange', function(event, slick, currentSlide, nextSlide){
		$("#single-residences .sidebar .gallery .image").removeClass("active");
		$("#single-residences .sidebar .gallery .image[data-index='" + nextSlide + "']").addClass("active");
	});
	
	$("#single-suites .sidebar .gallery .image").click(function(){
		if ( !$(this).hasClass("active") ){
			index = $(this).attr("data-index");
			$("#single-suites .sidebar .gallery .image").removeClass("active");
			$(this).addClass("active");
			$("#single-suites .main .bg .slider").slick("slickGoTo", index);
		}
		return false;
	});

	$("#single-residences .sidebar .gallery .image").click(function(){
		if ( !$(this).hasClass("active") ){
			index = $(this).attr("data-index");
			$("#single-residences .sidebar .gallery .image").removeClass("active");
			$(this).addClass("active");
			$("#single-residences .main .bg .slider").slick("slickGoTo", index);
		}
		return false;
	});

	// Copiar al portapapeles el codigo de la promocion.
	$(".js-clipboard").click(function(){
		var copyText = $(this).val();
		var successMsg = $(this).attr("data-msg");
		$(this).select();
		document.execCommand("copy");
		$(this).blur();
		swal(copyText, successMsg, "success");
	});
	
	// Toggles para la version mobile del footer
	$(".site-footer .footer-menu .title").click(function(){
		if ($(window).width() <= 767 ){
			if ($(this).parents(".footer-menu").hasClass("open") ){
				$(this).parents(".footer-menu").removeClass("open");
				$(this).parents(".footer-menu").find("ul").slideUp(200);
			} else {
				$(".site-footer .footer-menu").removeClass("open");
				$(this).parents(".footer-menu").addClass("open");
				$(".site-footer .footer-menu ul").slideUp(200);
				$(this).parents(".footer-menu").find("ul").slideDown(200);
			}

		} 		
	});

	// Toggles para la version mobile de los filtros
	$("#filter-programas .box .title").click(function(){
		if ($(window).width() <= 767 ){
			if ($(this).parents(".box").hasClass("open") ){
				$(this).parents(".box").removeClass("open");
				$(this).parents(".box").find(".checkbox-container").slideUp(200);
			} else {
				$(this).parents(".box").addClass("open");
				$(this).parents(".box").find(".checkbox-container").slideDown(200);
			}
		} 		
	});
	
	
	// Apertura del menu en movil
	$(".site-header .hamburger").click(function(){
		if ( $(".site-header").hasClass("menu-open") ){
			$(".site-header").removeClass("menu-open");
			$(".site-header .menu, .site-header .menu-magazine").removeClass("open");			
		} else {
			$(".site-header").addClass("menu-open");
			$(".site-header .menu, .site-header .menu-magazine").addClass("open");			
		}
		return false;
	});
	
	$(".site-header #menu-menu-principal > li .sub-menu-trigger").click(function(){
		if ( $(this).parent().hasClass("sub-menu-open") ){
			$(this).parent().find(".sub-menu-outer").slideUp(200);
			$(this).parent().removeClass("sub-menu-open");			
		} else {
			$(".site-header #menu-menu-principal > li .sub-menu-outer").slideUp(200);
			$(".site-header #menu-menu-principal > li").removeClass("sub-menu-open");
			$(this).parent().find(".sub-menu-outer").slideDown(200);
			$(this).parent().addClass("sub-menu-open");
		}
		return false;
	});
	
	$("#program-reservation-cta").click(function(){
		if (r){
			reservation = r;
			var num_people = 1;
			reservation.step = 1;
			reservation.adults = num_people;
			reservation.people[0].programme_codes.push($(this).attr('data-code'));
			reservation.objectives_list = [$(this).attr('data-objective')];
			var num_nights = 7
			reservation.num_nights = Math.max(reservation.num_nights, num_nights);
			if (localStorage){
				localStorage.reservation = JSON.stringify(reservation);
			}
		}
		document.location = reservations_url;
	});
	
	
	// Premios y reconocimientos
	if ( $("#page-premios").length > 0 ){
		
		var $grid = $('.award-ls');
		$grid.isotope({
			itemSelector: '.award-container',
		});
		
		$("#page-premios form").on("submit", function(){
			$(".no-results-found").hide();
			var year = $("#page-premios form select").val();
			if ( year == "all" ){
				$grid.isotope({ filter: '*' });
			} else {
				$grid.isotope({ filter: '.year-' + year });
				setTimeout(function(){
					if ( $(".award-container:visible").length == 0 ){
						$(".no-results-found").slideDown();
					} else {
						$(".no-results-found").slideUp();
					}				
				}, 500);
			}
			return false;
		});
	}	

	// Premios y reconocimientos
	if ( $("#page-medios").length > 0 ){
		
		var $offlineGrid = $('.offline-media-ls');
		$offlineGrid.isotope({
			itemSelector: '.offline-media-container',
		});
		
		$("#page-medios form.offline").on("submit", function(){
			$("#offline-tab .no-results-found").hide();
			var year = $("#page-medios form.offline select").val();
			if ( year == "all" ){
				$offlineGrid.isotope({ filter: '*' });
			} else {
				$offlineGrid.isotope({ filter: '.year-' + year });
				setTimeout(function(){
					if ( $(".offline-media-container:visible").length == 0 ){
						$("#offline-tab .no-results-found").slideDown();
					} else {
						$("#offline-tab .no-results-found").slideUp();
					}				
				}, 500);
			}
			return false;
		});
				
		
		var $onlineGrid = $('.online-media-ls');
		
		$("#page-medios .nav-tab[href='#online-tab']").click(function(){
			setTimeout(function(){
				$onlineGrid.isotope({
					itemSelector: '.online-media-container',
				});					
				
			}, 1000)
	
		});

		
		$("#page-medios form.online").on("submit", function(){
			$("#online-tab .no-results-found").hide();
			var year = $("#page-medios form.online select").val();
			if ( year == "all" ){
				$onlineGrid.isotope({
					itemSelector: '.online-media-container',
					filter: '*'
				});
			} else {
				$onlineGrid.isotope({
					itemSelector: '.online-media-container',
					filter: '.year-' + year
				});
				setTimeout(function(){
					if ( $(".online-media-container:visible").length == 0 ){
						$("#online-tab .no-results-found").slideDown();
					} else {
						$("#online-tab .no-results-found").slideUp();
					}				
				}, 500);
			}
			return false;
		});

	}	

	// Cookie Newsletter		
	if ($.cookie('sha-newsletter-suscription') != 'on') {		
		$.removeCookie('sha-newsletter-suscription', { path: '/' });
		$("#newsletter-popup").fadeIn(400);
    }
    
    $(".site-topbar .subscribe").click(function(){
		$("#newsletter-popup").fadeIn(400);
		$("html").addClass("lock__scroll");
    });
	
	$('#delete-cookie').click(function() {
        $.cookie('sha-newsletter-suscription', 'on', { expires: 30, path: '/' });
		$("#newsletter-popup").fadeOut(400);
		$("html").removeClass("lock__scroll");
		//window.location.reload();
	});
		
	// Sharer en mobile magazine
	$("#single-fixed .sharer").click(function(){
		$("#single-fixed .share").fadeIn(200);	
	});
	$("#single-fixed .share .closer").click(function(){
		$("#single-fixed .share").fadeOut(200);	
	});
				
});

$(window).on("load", function(){
	
	var scroll = $(window).scrollTop();
	
	if ( scroll > 0 ){
		$("body").addClass("is-scrolled");	
	} else {
		$("body").removeClass("is-scrolled");				
	}
});


$(window).on("scroll", function(){
	
	var scroll = $(window).scrollTop();
	var windowHeight = $(window).height();
	var pageHeight = $("html").height() - windowHeight;
	var footerHeight = $(".site-prefooter").outerHeight() + $(".site-footer").outerHeight() + $(".site-bottombar").outerHeight();
	//var scrollAmount = windowHeight/pageHeight;
	//var scrollParameter = scroll/scrollAmount;
	//console.log(windowHeight);
	//console.log(pageHeight);
	
	if ( scroll > 0 ){
		$("body").addClass("is-scrolled");	
	} else {
		$("body").removeClass("is-scrolled");				
	}
	
	// Cierra el callmeback
	$("#callmeback").removeClass("opened");
	setTimeout(function(){
		$("#callmeback-trigger").removeClass("closed");	
	}, 200);	
	
	var scrollResult = (scroll*100/(pageHeight - footerHeight))
	$("#single-fixed .line span").css("width", scrollResult + "%");

	if ( scroll > (pageHeight - footerHeight + 64)  ){
		$("#single-fixed").addClass("unfix");
	} else if ( scroll < (pageHeight - footerHeight)  ){
		$("#single-fixed").removeClass("unfix");
	}
	
});

$(window).on("resize", function(){

	// Menus desplegables del footer
	if ($(window).width() <= 767 ){
		$(".site-footer .footer-menu").removeClass("open");
		$(".site-footer .footer-menu ul").slideUp(200);
	} else {
		$(".site-footer .footer-menu").removeClass("open");
		$(".site-footer .footer-menu ul").slideDown(200);
	}

	// Menus desplegables del footer
	if ($(window).width() <= 767 ){
		$("#filter-programas .box").removeClass("open");
		$("#filter-programas .box .checkbox-container").css("display", "none");
	} else {
		$("#filter-programas .box").removeClass("open");
		$("#filter-programas .box .checkbox-container").css("display", "flex");
	}	
	
	// Cierra el menu movil
	$(".site-header").removeClass("menu-open");
	$(".site-header .menu, .site-header .menu-magazine").removeClass("open");	
	
	// Cambio de elementos de lugar
	// --- Titular página prensa
	if ($(window).width() <= 767 ){
		$("#page-prensa .sidebar .description .title").appendTo("#page-prensa .image");
	} else {
		$("#page-prensa .image .title").prependTo("#page-prensa .sidebar .description");
	}	

	// --- Titular en pagina de Suites
	if ($(window).width() <= 991 ){
		$("#page-suites .suite").each(function(){
			var $title = $(this).find(".title-container");
			var $content = $(this).find(".content-container")
			$title.prependTo($content);
		});		
	} else {
		$("#page-suites .suite").each(function(){
			var $title = $(this).find(".title-container");
			var $content = $(this).find(".title-outer")
			$title.prependTo($content);
		});		
	}	
	
	// --- Bloque .bottom de programas
	if ($(window).width() <= 767 ){
		$("#single-programas .main .content .bottom").prependTo("#single-programas .sidebar");
		$("#single-programas .sidebar .reservation .offer").appendTo("#single-programas .main .content");
	} else {
		$("#single-programas .sidebar .bottom").appendTo("#single-programas .main .content");
		$("#single-programas .main .content .offer").appendTo("#single-programas .sidebar .reservation");
	}	
	
	// --- Singles Magazine - Modulo Redes sociales
	if ($(window).width() <= 767 ){
		$("#single-content .share-container .share").insertBefore( $("#single-content .title.h1") );
	} else {
		$("#single-content .share").appendTo("#single-content .share-container");
	}	
	
});

$(document).ready(function(){
	
	// Cambio de elementos de lugar
	// --- Titular página prensa
	if ($(window).width() <= 767 ){
		$("#page-prensa .sidebar .description .title").detach().appendTo("#page-prensa .image");
	} else {
		$("#page-prensa .image .title").detach().prependTo("#page-prensa .sidebar .description");
	}
	
	// --- Titular en pagina de Suites
	if ($(window).width() <= 991 ){
		$("#page-suites .suite").each(function(){
			var $title = $(this).find(".title-container");
			var $content = $(this).find(".content-container")
			$title.prependTo($content);
		});		
	} else {
		$("#page-suites .suite").each(function(){
			var $title = $(this).find(".title-container");
			var $content = $(this).find(".title-outer")
			$title.prependTo($content);
		});		
	}	
	
	// --- Bloque .bottom de programas
	if ($(window).width() <= 767 ){
		$("#single-programas .main .content .bottom").prependTo("#single-programas .sidebar");
		$("#single-programas .sidebar .reservation .offer").appendTo("#single-programas .main .content");
	} else {
		$("#single-programas .sidebar .bottom").appendTo("#single-programas .main .content");
		$("#single-programas .main .content .offer").appendTo("#single-programas .sidebar .reservation");
	}
	
	// --- Singles Magazine - Modulo Redes sociales
	if ($(window).width() <= 767 ){
		$("#single-content .share-container .share").insertBefore( $("#single-content .title.h1") );
	} else {
		$("#single-content .share").appendTo("#single-content .share-container");
	}	
	
	
});
						    
})(jQuery);

