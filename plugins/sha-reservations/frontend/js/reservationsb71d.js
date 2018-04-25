var reservations_url = "/?p=319";


var timer_reservation_details;
jQuery(document).ready(function ($){
	var reservation = sha_load_reservation();
	
	var now = new Date();
	//var current_month = now.getMonth()+1;
	//var current_year = now.getFullYear();
	var current_month = parseInt(reservation.booking_start.substr(5, 2), 10);
	var current_year = parseInt(reservation.booking_start.substr(0, 4), 10);
	if (current_month<now.getMonth()+1){
		current_month = now.getMonth()+1;
		current_year = now.getFullYear();
	}

	var metrics = {};
	var const_min_days_res = 2;
	var minimum_days_reservation = const_min_days_res;
	
	var clicks_on_calendar = 0;
	
	metrics.pixel = function (type){
		//console.log("tracking...");
		//console.log(reservation);
	    var tracking_id = "8769207";
	    var params = [];
	    params.push('num='+reservation.people.length);
	    var trats = ""
	    if (typeof reservation.people[0].programme_codes == "object"){
		    trats = reservation.people[0].programme_codes.join('+')
	    } else {
	    	trats = reservation.people[0].programme_codes
	    }
	    params.push('trat='+trats);
	    params.push('cost='+reservation.total_price);
	    params.push('ref='+reservation.locator);
	    
	    
	    var gtm_params = {
		    'guests': reservation.people.length,
		    'treatments': trats,
		    'price': reservation.total_price,
		    'locator': reservation.locator,
		    'event': 'funnel'
		};
		
			// august 10th removed and placed on html
	    switch(type){
		    case "home":
		    	tracking_id = "8766046";
		    	break;
		    case "s1":
		    	tracking_id = "8769207";
		    	gtm_params.eAction = 'step1';
		    	//dataLayer.push(gtm_params);
		    	break;
		    case "s2":
		    	tracking_id = "8769212";
		    	gtm_params.eAction = 'step2';
		    	//dataLayer.push(gtm_params);
		    	break;
		    case "s3":
		    	tracking_id = "8769219";
		    	gtm_params.eAction = 'step3';
		    	//dataLayer.push(gtm_params);
		    	break;
		    case "s4":
		    	tracking_id = "8769224";
		    	gtm_params.eAction = 'step4';
		    	//dataLayer.push(gtm_params);
		    	break;
		    case "s5":
		    	tracking_id = "8769191";
		    	gtm_params.eAction = 'step5';
		    	//dataLayer.push(gtm_params);
		    	break;
		    case "confirmation":
		    	tracking_id = "8769245";
		    	gtm_params.eAction = 'step6';
		    	//dataLayer.push(gtm_params);
		    	break;
		    default:
		    	break;
	    }
		
	    
	    
	    
	    // deactivated 2017-07-31 and replaced by GTM
	    
	    var pl = document.createElement('script');
	    pl.setAttribute("id", "metric-pixels");
	    pl.type = 'text/javascript';
	    pl.async = false;
	    pl.src = 'https://secure.adnxs.com/seg?add='+tracking_id+'&t=1&' + params.join('&');
	    //console.log(pl.src);
		$('#metric-pixels').remove();
	    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(pl);
	    
	    
	}
	/* Changed to activate all languages booking
		if ($("html").attr("lang").substr(0, 2)!="es"){
			reservations_url = "/?p=319";
		}
	*/	

	/*-- NOT SPANISH --*/
	if ($("html").attr("lang").substr(0, 2)!="es"){
		reservations_url = "/?p=319";
	}	
	/*-- ENGLISH --*/
	if ($("html").attr("lang").substr(0, 2)=="en"){
		reservations_url = "/?p=319";
	}
	/*-- SPANISH --*/
	if ($("html").attr("lang").substr(0, 2)=="es"){
		reservations_url = "/?p=319";
	}
	/*-- FRENCH --*/
	if ($("html").attr("lang").substr(0, 2)=="fr"){
		reservations_url = "/?p=319";
	}
	/*-- GERMAN --*/
	if ($("html").attr("lang").substr(0, 2)=="de"){
		reservations_url = "/?p=319";
	}
	/*-- ARABIAN --*/
	if ($("html").attr("lang").substr(0, 2)=="ar"){
		reservations_url = "/?p=319";  
	} 
	/*-- RUSSIAN --*/
	if ($("html").attr("lang").substr(0, 2)=="ru"){
		reservations_url = "/?p=319";  
	}
	
	
	
	if ($(".reservation-main-holder").length>0){
		setup_reservation_steps(reservation);
		
		get_navision_prices();
		
		generate_map_month(current_month, current_year);
	}
	
	// interaction control
	$(document).on("click",".step-btn", step_clicked );
	$(document).on("mouseover",".info-btn", info_panel );
	$(document).on("mouseout",".info-btn", hide_info_panel );
	$(document).on("mouseover",".sha-package-check.disabled, .sha-programme-check.disabled", info_panel_incompat );
	$(document).on("mouseout",".sha-package-check.disabled, .sha-programme-check.disabled", hide_info_panel );
	$(document).on("click",".show-step-details", show_step_details );
	
	// programmes controls
	$(document).on("click",".sha-times-radio", times_clicked );
	$(document).on("click",".sha-people-radio", people_clicked );
	$(document).on("click",".sha-programme-check", programme_clicked );
	$(document).on("click",".sha-objectives-check", objectives_filter_clicked );
	$(document).on("click",".show-programme-details", show_programme_excerpt );
	$(document).on("click",".sha-duration-check", stay_duration_clicked );
	
	
	// calendar controls
	$(document).on("click",".prev-month", function (){return move_month(-1)} );
	$(document).on("click",".next-month", function (){return move_month(1)} );
	$(document).on("click",".change-day.plus", function (){return change_length(1);} );
	$(document).on("click",".change-day.minus", function (){return change_length(-1);} );
	
	$(document).on("click",".sha-calendar-table tbody td:not(.disabled)", day_clicked );
	$(document).on("mouseover",".sha-calendar-table tbody td:not(.disabled)", day_hover );
	$(document).on("mouseleave",".step.step-2", day_leave );
	$(document).on("change","#sha-num-nights", num_nights_changed );
	
	
	// room selection
	$(document).on("click","input[name='sha-room-option']", room_clicked );
	$(document).on("click",".show-suite-details, .suite-details p", show_suite_excerpt );
	
	// extras selection
	$(document).on("click",".sha-package-check", package_clicked );
	$(document).on("click",".sha-transfer-check", transfer_clicked );
	$(document).on("click",".sha-gift-check", gift_clicked );
	$(document).on("click",".show-package-details, .packages-information-wrapper", show_package_excerpt );
	$(document).on("click","#validate-coupon-btn", validate_coupon_code );
	$(document).on("click","#accept-newsletter-check", newsletter_checked );
	$(document).on("click","#sha-gift-open", gift_controller_clicked );
	
	
	$(document).on("click",".reservtion-start-over", reservation_startover );
	
	
	// widget interaction
	$(document).on("click",".goto-step-1", function (){return goto_step(1);} );
	$(document).on("click",".goto-step-2", function (){return goto_step(2);} );
	$(document).on("click",".goto-step-3", function (){return goto_step(3);} );
	$(document).on("click",".goto-step-4", function (){return goto_step(4);} );
	$(document).on("click",".remove-item-btn", remove_programme );
	$(document).on("click",".accept-and-continue", function (){ goto_step(reservation.step + 1 ); update_reservation_details(); return false;} );
	$(document).on("click","#back-btn, .back-btn", function (){return goto_step(reservation.step - 1 );} );
	$(document).on("click","#locator-holder, .locator-loader-btn", function (){ console.log("dadadsaadsDSA"); show_dialog('load-locator'); return false} );
	$(document).on("click","#cancel-btn", function (){ show_dialog(''); return false} );
	$(document).on("click","#send-booking-btn, #main-send-reservation", function (){ show_dialog('save-locator'); $("#locator-copy-fld").val(reservation.locator+"-NC").addClass("ok");return false} );
	$(document).on("focus","#locator-copy-fld", locator_focus);
	$(document).on("click","#load-locator-code", locator_load);
	
	$(document).on("blur","#locator-email-fld", function (){check_field($(this))} );
	$(document).on("click","#send-locator-code", send_locator_via_email);
	
	
	$(document).on("click","#show-menu-btn", show_mobile_menu);
	$(document).on("click","#show-summary-btn", scroll_to_summary);
	$(document).on("blur","#gift-email, #gift-address", update_reservation_details);
	
	// payment form
	$(document).on("blur",".payment-form input, .payment-form textarea", check_field_contents );
	$(document).on("blur","#user-email", sha_setup_checkout_forms );
	$(document).on("change",".payment-form select", check_field_contents );
	$(document).on("click","#pay-now-btn", validate_people );
	
	// home widget
	$(document).on("click", "#enter-reservation-process-btn", start_reservation_process);
	$(document).on("click", "#sha-stay-objectives", show_objectives_widget);
	$(document).on("click", ".sha-popup-objectives .sha-objectives-check", check_objectives_widget);
	$(document).on("click", ".sha-home-widget h3, .sha-home-widget p, .sha-home-widget div, .sha-home-widget", hide_objectives_panel);
	$(document).on("submit", "#stripe-form", function (){return goto_step(6);} );
	
	
	
	// programme widget
	$(document).on("click", "#add-programme-to-reservation-btn", add_programme_from_widget);
	
	// setup for 1 guest first
	
	$(".sha-guest-cell:last-child").addClass("hidden-col");
	$(".row-guest-2").fadeOut(100);
	$(".sha-programme-check.guest-2").prop("checked", false);
	
	
	setup_reservation_front(reservation);
	
	if ($(".reservation-main-holder").length>0){
		if (reservation.step == 1){
			//metrics.pixel("s1");
			
			var dlobj = {'event': 'funnel', 'eAction': 'step1' ,'eLabel': sha_get_programme_name(), 'eValue': 0 }
			dataLayer.push(dlobj);
		}
	}
	
	//show_reservation_button_allsite();
	
	function start_reservation_process(e){
		if (reservation){
			generate_empty_reservation();
			reservation.step = 1;
			reservation.booking_start = $("#sha-stay-dates").val() + "-01";
			console.log(reservation.booking_start);
			var d = Date.parse(reservation.booking_start);
			var dd = new Date(d);
			//var stay_days = parseInt($("#sha-stay-length").val(),10);
			var stay_days = 14;
			var end = dd.getTime() + stay_days*24*60*60*1000;
			var d_date = new Date(end);
			var end_str = d_date.toISOString().substr(0, 10);
			reservation.booking_end = end_str;
			
			
			var arr_obj_vals = [];
			$(".sha-popup-objectives .sha-objectives-check:checked").each(function (a,b){
				arr_obj_vals.push($(b).val());
			});
			reservation.objectives_list = arr_obj_vals;
			if (localStorage){
				localStorage.reservation = JSON.stringify(reservation);
			}
		}
		document.location = reservations_url;
		//alert("Starting")
		return false;
	}
	
	function add_programme_from_widget(){
		//console.log(reservation);
		if (reservation){
			var num_people = parseInt($("#sha-programme-guests").val(),10);
			reservation.step = 1;
			reservation.adults = num_people;
			reservation.people[0].programme_codes.push($("#sha-programme-code").val());
			//console.log("updating... " + $("#sha-programme-code").val());
			//console.log(reservation.people[0].programme_codes);
			//console.log(reservation);
			if (num_people == 2){
				if (reservation.people.length==1){
					reservation.people.push( new_person() );
				}
				if (reservation.people[1]){
					reservation.people[1].programme_codes.push($("#sha-programme-code").val());
				}
			}
			var num_nights = parseInt($("#sha-programme-code").val().substr(-2), 10)
			reservation.num_nights = Math.max(reservation.num_nights, num_nights);
			
			if (localStorage){
				localStorage.reservation = JSON.stringify(reservation);
			}
		}
		// rewrite reservation
		r = reservation;
		//console.log(reservation.people[0].programme_codes);
		//console.log(reservation.people[1].programme_codes);
		document.location = reservations_url;
		return false;
	}
	
	function send_locator_via_email(e){
		
		var filename = "/wp-admin/admin-ajax.php?action=sha_send_locator";
		//console.log(filename);
		$.ajax({
		  url: filename,
		  data: {reservation:reservation, comment: $("#comments-fld").val(), to: $("#locator-email-fld").val().replace("-NC", "")},
		  method: "POST",
		  success: function (r){
			  	//console.log(r);
			  	show_dialog('');
			},
		  dataType: "json"
		});
		
		return false;
	}
	
	function show_objectives_widget(e){
		$(".sha-popup-objectives").toggleClass("open");
		$(e.currentTarget).blur();
		return false;
	}
	function hide_objectives_panel(e){
		//console.log($(e.target))
		if ((!$(e.target).hasClass("sha-objectives-check")) && (!$(e.target).hasClass("sha-objectives-check-label"))){
			$(".sha-popup-objectives").removeClass("open");
		}
	}
	function check_objectives_widget(e){
		var arr_obj = [];
		var arr_obj_vals = [];
		$(".sha-popup-objectives .sha-objectives-check:checked").each(function (a,b){
			arr_obj.push($(b).parent().text());
			arr_obj_vals.push($(b).val());
		});
		//console.log(arr_obj);
		if (arr_obj.length>0){
			$("#sha-stay-objectives").val(arr_obj.join(", "));
			$("#sha-stay-objectives").removeClass("nok").addClass("ok");
			//$(".sha-popup-objectives").removeClass("open");
		} else {
			$("#sha-stay-objectives").removeClass("ok").addClass("nok");
		}
	}
	
// SETUP FUNCTIONS

function sha_load_reservation(){
	if(localStorage){
		r = localStorage.getItem('reservation');
	} else {
		r = null;
	}
	
	
	
	//console.log(r.people[0].programme_codes);
	if ((r) && (r != "") && (r != undefined)){
		r = JSON.parse(r);
		
		var noww = new Date();
		var r_initial_date = Date.parse(r.booking_date);
		
		var days_since_booking = (noww.getTime() - r_initial_date)/1000/60/60/24
		if ( (r) && ( days_since_booking < 3 ) ){
			r.lang = $("html").attr("lang").substr(0, 2);
		} else {
			r = generate_empty_reservation();
		}
	} else {
		r = generate_empty_reservation();
	}
	return r;
}
function generate_empty_reservation(){
	var d = new Date();
	var stay_days = 0;
	var end = d.getTime() + stay_days*24*60*60*1000;
	var d_date = new Date(end);
	var end_str = d_date.toISOString().substr(0, 10);
	
	r = { 
		step:1,
		unlocked_step:0,
		booking_date:d.toISOString().substr(0, 10),
		booking_start:d.toISOString().substr(0, 10),
		booking_end:end_str,
		adults:1,
		children:0,
		action:'availability',
		people:[new_person()],
		room_code:'',
		room_description:'',
		programmes:'',
		accommodation_type:'full-board',
		transfer:'no',
		locator: locator_code_generator(),
		lang: $("html").attr("lang").substr(0, 2),
		coupon_code: '',
		is_paid: 'no',
		confirmed: 'no'
	}
	return r;
}
	
	function info_panel(e){
		var panel = $(e.currentTarget).attr("data-message");
		var text = $(".info-panels p[data-message='"+panel+"']").html();
		$(".info-window").remove();
		var new_panel = $('<div class="info-window">'+text+'</div>').css({'top':e.pageY, 'left':e.pageX}).hide().fadeIn(300);
		$("body").append(new_panel);
	}
	function info_panel_incompat(e){
		var text = __("Algunos programas seleccionados son incompatibles con esta opción|Some selected programmes are incompatible with this option|Einige ausgewählte Programme sind nicht kompatibel mit dieser Option|Некоторые выбранные программы несовместимы с этой опцией|Certains programmes sélectionnés sont incompatibles avec cette option");
		$(".info-window").remove();
		var new_panel = $('<div class="info-window">'+text+'</div>').css({'top':e.pageY, 'left':e.pageX}).hide().fadeIn(300);
		$("body").append(new_panel);
	}
	
	function hide_info_panel(){
		$(".info-window").stop().fadeOut(300, function (){
			$(this).remove()
		});
	}
	
function reservation_startover(){
	if (localStorage){
		localStorage.reservation = null;
		localStorage.removeItem("reservation");
	}
	history.go(0);
	return false;
}
	

// INTERACTION FUNCTIONS
function scroll_to_summary(){
	$("body, html").animate({"scrollTop": $(".widget_sha_reservations_widget").offset().top - 15}, 400);
	return false;
}
function show_mobile_menu(){
	$(".sha-bullet-steps").toggleClass("open");
	return false;
}


function step_clicked(e){
	$(".sha-bullet-steps").removeClass("open");
	var step = $(e.currentTarget).find(".bullet").text();
	
	
	goto_step(step);
	return false;
}
function goto_step(step){
	step = parseInt(step, 10);
	//console.log(reservation.step)
	if (reservation.step > 0){
		if (reservation.first_time == "yes"){
			if (reservation.people[0].programme_codes.length == 0){
				reservation.step = 1
				alert(__("Debe seleccionar un programa.|You must select a programme.|Sie müssen ein Programm auswählen.|Вы должны выбрать программу.|Vous devez sélectionner un programme."));
				setup_reservation_steps(reservation);
				return false
			}
		}
	}
	
	if (step > 0){
		reservation.step = parseInt(step, 10);
		setup_reservation_steps(reservation);
		
		if(reservation.step >= 5){
			$("#sha-widget-buttons").fadeOut();
		} else {
			$("#sha-widget-buttons").fadeIn();
		}
	} else {
		window.history.go(-1);
	}
	if ($(window).width()<=768){
		$("body, html").animate({"scrollTop": $(".reservation-main-holder").offset().top}, 400);
	}
	
	
	sha_save_reservation();
	localStorage.reservation = JSON.stringify(reservation);
	
	
	var dlobj = {'event': 'funnel', 'eAction': 'step'+step ,'eLabel': sha_get_programme_name(), 'eValue': r.total_price };
	//console.log(dlobj);
	dataLayer.push(dlobj);
	
	
	var page = document.location.pathname + "step-" + step + "/";
	ga('set', 'page', page);
	ga('send', 'pageview');
	//ga('send', 'pageview', page);
	//validate_coupon_code();
	return false;
}

function locator_code_generator(){
	var today = new Date();
	var str_available = "QWERTYUPAFGHKZXVBM2356789";
	locator = "";
	for (var i=0;i<4;i++){
		locator+= str_available.charAt(Math.floor(Math.random() * str_available.length));
	}
	locator += "-"+(today.getYear()-100)+""+(today.getMonth()+1)+""+today.getDate();
	return locator;
}

function locator_focus(){
	$("#locator-copy-fld").select()
}

function times_clicked(e){
	var first = $(e.currentTarget).val();
	reservation.first_time = first;
}

function people_clicked(e){
	var num_people = parseInt($(e.currentTarget).val(), 10);
	if (num_people != reservation.people.length){
		// correction of the people array
		while (num_people<reservation.people.length){
			reservation.people.pop();
		}
		while (num_people>reservation.people.length){
			reservation.people.push( new_person() );
		}
	}
	reservation.adults = reservation.people.length;
	if (num_people==2){
		$(".sha-guest-cell:last-child").removeClass("hidden-col");
		$(".row-guest-2").fadeIn(100);
	} else {
		$(".sha-guest-cell:last-child").addClass("hidden-col");
		$(".row-guest-2").fadeOut(100);
		$(".sha-programme-check.guest-2").prop("checked", false);
	}
	
	update_reservation_details();
	//console.log(reservation.people);
}

function new_person(){
	return {name:'',surname:'',birth_date:'',allergies:'',phone:'',country:'',dni:'',email:'',title:'',details:'',programme_codes:[''],programme_price:0,programme_name:'' }
}

function objectives_filter_clicked(e){
	$(".sha-row[data-objectives], .separator-row[data-objectives]").fadeOut();
	
	
	// duration filter
	var max_days = parseFloat($(".sha-duration-check:checked").val());
	/*
	$(".sha-row[data-objectives], .separator-row[data-objectives]").each(function (a,b){
		var days = parseFloat($(b).attr("data-days"));
		console.log(days);
		console.log(max_days);
		if (days <= max_days){
			$(b).stop().fadeIn();
		}
	});
	*/
	var num_shown = 0;
	arr_obj_vals = [];
	$(".sha-objectives-check:checked").each(function(a,b){
		var obj = $(b).val();
		$(".sha-row[data-objectives*='"+obj+"'], .separator-row[data-objectives*='"+obj+"']").stop().fadeIn();
		//console.log(obj);
		num_shown += $(".sha-row[data-objectives*='"+obj+"'], .separator-row[data-objectives*='"+obj+"']").length;
		arr_obj_vals.push($(b).val());
	});
	reservation.objectives_list = arr_obj_vals;
	if($(".sha-objectives-check:checked").length == 0){
		$(".sha-row[data-objectives], .separator-row[data-objectives]").stop().fadeIn();
	} else {
		if (num_shown == 0){
			if ($(".sha-objectives-check:checked").val() == 'xxx'){
				// does not want a programme
				var msg = $("p[data-message='noprogrammes']").text();
			} else {
				// does not find any programme
				var msg = $("p[data-message='noprogrammesfound']").text();
			}
			show_warning(msg, $(".step.step-1 .sha-table"));
		}
	}
	
	$(".sha-row[data-objectives], .separator-row[data-objectives]").each(function (a,b){
		
	});
	
	//update_reservation_details();
}
function show_programme_excerpt(e){
	$(e.currentTarget).parent().parent().parent().toggleClass("open");
	return false;
}
function show_package_excerpt(e){
	var pckg = $(e.currentTarget).attr("data-package");
	$(".packages-information-wrapper[data-package='"+pckg+"']").toggleClass("open");
	return false;
}
function show_suite_excerpt(e){
	$(e.currentTarget).parent().parent().toggleClass("open");
	return false;
}
function show_step_details(e){
	
	$(e.currentTarget).parent().parent().parent().toggleClass("open");
	return false;
}

function show_warning(text, after){
	if ( $(after).length >0){
		$(".info-panel").remove();
		var sha_alert = $('<div class="alert alert-warning">' + text + '</div>');
		var t = $(after).offset().top + $(after).height();
		var l = $(after).offset().left;
		var w = $(after).width() - 20;
		//sha_alert.css({"top":t, "left":l, "width":w});
		$(after).after(sha_alert);
		setTimeout(function (){
			$(".info-panel.warning").slideUp(600, function (){
				$(".info-panel.warning").remove();
			});
		},10000);
	}
}


function show_dialog(item){
	$(".dialog-panel").remove();
	if ( $("div[data-dialog='"+item+"']").length > 0 ){
		text = $("div[data-dialog='"+item+"']").html();
		var sha_alert = $('<div class="dialog-panel">' + text + '</div>').hide();
		$("#sha-reservation").append(sha_alert.fadeIn(400));
	}
}
//show_warning("Este es el aviso", $(".sha-resume-block"));

function stay_duration_clicked(e){
	var number_of_nigths = $(e.currentTarget).val();
	number_of_nights = Math.max(number_of_nigths, parseInt($("#sha-num-nights").val(), 10) );
	var start_date = Date.parse(reservation.booking_start);
	var end_date = start_date + number_of_nigths*24*60*60*1000;
	reservation.booking_end = new Date(end_date);
	reservation.booking_end = reservation.booking_end.toISOString().substr(0, 10);
	$("#sha-num-nights").val( number_of_nights );
	update_reservation_details();
	
	
	// filter objectives and duration 
	objectives_filter_clicked(e);
	
}

function programme_clicked(e){
	if ($(e.currentTarget).hasClass("disabled")){
		return false;
	}
	reservation.unlocked_step = Math.max(1,reservation.unlocked_step);
	update_reservation_details();
}

function package_clicked(e){
	if ($(e.currentTarget).hasClass("disabled")){
		return false;
	}
	reservation.unlocked_step = Math.max(4,reservation.unlocked_step);
	update_reservation_details();
}

function transfer_clicked(e){
	reservation.unlocked_step = Math.max(4,reservation.unlocked_step);
	update_reservation_details();
}
function gift_clicked(e){
	reservation.unlocked_step = Math.max(4,reservation.unlocked_step);
	setTimeout(function (){
		if ($(".sha-gift-check[value='No']").prop("checked")){
			$("#sha-gift-open").prop("checked", false);
			$(".gift-reservation-hidden").slideUp();
		}
		if ($(".sha-gift-check[value='Digital']").prop("checked")){
			$("#gift-address").hide();
			$("#gift-email").show();
		}
		if ($(".sha-gift-check[value='Postal']").prop("checked")){
			$("#gift-address").show();
			$("#gift-email").hide();
		}
	}, 200);
	update_reservation_details();
}
function gift_controller_clicked(e){
	reservation.unlocked_step = Math.max(4, reservation.unlocked_step);
	if ($("#sha-gift-open").prop("checked")){
		$(".gift-reservation-hidden").slideDown();
		$(".sha-gift-check[value='Digital']").click();
	} else {
		$(".gift-reservation-hidden").slideUp();
		$(".sha-gift-check[value='No']").click();
	}
	update_reservation_details();
}

function newsletter_checked(e){
	
	update_reservation_details();
}

function remove_programme(e){
	var programme_code = $(e.currentTarget).attr("data-code");
	var guest_number = parseInt($(e.currentTarget).attr("data-guest"), 10);
	if (isNaN(guest_number)){
		guest_number = 1;
	}
	
	$("tr.programme-row[data-programme='"+programme_code+"'] .sha-programme-check.guest-"+guest_number).prop("checked", false);
	$(e.currentTarget).parent().parent().fadeOut(400, function(){update_reservation_details();});
	
	return false;
}

function change_length(dif){
	// reset number of clicks on the calendar
	clicks_on_calendar = 0;
	
	reservation.unlocked_step = Math.max(2,reservation.unlocked_step);
	var stay_days = parseInt( $("#sha-num-nights").val(), 10);
	var new_stay_length = stay_days + dif;
	var real_min = Math.max(minimum_days_reservation, const_min_days_res );
	if (new_stay_length<real_min){
		new_stay_length = real_min;
		var msg = $("p[data-message='minnightsprogramme']").text().replace("xxx", minimum_days_reservation).replace("zzz", new_stay_length);
		show_warning(msg, $(".step.step-2 .sha-header"));
	}
	
	if (new_stay_length<const_min_days_res){
		new_stay_length = const_min_days_res;
		var msg = $("p[data-message='minnights']").text();
		show_warning(msg, $(".step.step-2 .sha-header"));
	}
	
	$("#sha-num-nights").removeClass("nok").val(new_stay_length);
	
	var d = Date.parse(reservation.booking_start) + new_stay_length*24*60*60*1000;
	var d_date = new Date(d);
	
	
	var end = d_date.toISOString().substr(0, 10);
	reservation.booking_end = end;
	
	
	update_reservation_details();
	return false;
}


function day_clicked(e){
	
	
	// clicks_on_calendar
	clicks_on_calendar++;
	var day = $(e.currentTarget).attr("data-iso_date");
	var end = day;
	
	
	if (clicks_on_calendar==1){
		// first click
		
		// change const_min_days_res depending on the month
		var min_nights_per_month = [4,4,4,4,7,4,4,7,4,7,4,2];
		const_min_days_res = min_nights_per_month[parseInt(day.substr(5, 2), 10)-1];
		if ((day.substr(5, 2) == "04") && (parseInt(day.substr(8, 2)) >= 28)){
			const_min_days_res = 7;
		}
		console.log(const_min_days_res);
		
		reservation.booking_start = day;

		var stay_days = parseInt( $("#sha-num-nights").val(), 10);
		var stay_days = Math.max(const_min_days_res, stay_days);
		$("#sha-num-nights").val(stay_days)
		var d = Date.parse(day) + stay_days*24*60*60*1000;
		var d_date = new Date(d);
		end = d_date.toISOString().substr(0, 10);
	} else {
		// second click
		
		// dates selected, so we show the dates part in the ticket widget
		reservation.unlocked_step = Math.max(2,reservation.unlocked_step);
		var num_days = (Date.parse(day) - Date.parse(reservation.booking_start))/ (24*60*60*1000);
		console.log(num_days);
		if (num_days<=0){
			// user clicked on a previous date, so let's take it as a first click
			clicks_on_calendar=0;
			return day_clicked(e);
		}
		if (num_days>=minimum_days_reservation){
			$("#sha-num-nights").val(num_days);
			end = day;
		} else {
			 $("#sha-num-nights").val(minimum_days_reservation)
			var stay_days = parseInt( $("#sha-num-nights").val(), 10);
			var d = Date.parse(reservation.booking_start) + stay_days * 24*60*60*1000;
			var d_date = new Date(d);
			end = d_date.toISOString().substr(0, 10);
			
			//var real_min = Math.max(minimum_days_reservation-1, const_min_days_res );
			var real_min = Math.max(minimum_days_reservation, const_min_days_res );
			
			var msg = $("p[data-message='minnightsprogramme']").text().replace("xxx", minimum_days_reservation).replace("zzz", real_min);
			show_warning(msg, $(".step.step-2 .sha-header"));
		}
		
		
		// new search
		//metrics.pixel("search");
		clicks_on_calendar = 0;
	}
	
	reservation.booking_end = end;
	
	update_reservation_details();
	
	return false;
}

function day_hover(e){
	if (clicks_on_calendar == 1){
		var start_date = Date.parse(reservation.booking_start);
		var millisecs = 24*60*60*1000;
		var min_days = minimum_days_reservation;
		var hov = $(e.currentTarget).attr("data-iso_date");
		var hov_date = Date.parse(hov);
		$(".sha-calendar-table tbody td").removeClass("temporary").removeClass("last-day");
		$(e.currentTarget).addClass("last-day");
		for (i=0; i<=62; i++){
			var new_date = start_date + millisecs*i;
			var n_date = new Date(new_date);
			var current = n_date.toISOString().substr(0, 10);
			//console.log(new_date)
			//console.log(hov_date)
			if (new_date <= hov_date){
				// previous days
				$(".sha-calendar-table tbody td[data-iso_date='"+current+"']").addClass("selected");
				if (hov_date < start_date + millisecs*min_days){
					// not allowed days
					$(".sha-calendar-table tbody td[data-iso_date='"+current+"']").addClass("temporary");
				}
			} else {
				// future days
				if (new_date > start_date + millisecs*min_days){
					$(".sha-calendar-table tbody td[data-iso_date='"+current+"']").removeClass("selected");
				}
			}
		}
	}
}
function day_leave(e){
	if (clicks_on_calendar==1){
		clicks_on_calendar = 0;
		update_reservation_details();
	}
}

function check_field_contents(e){
	
	check_field($(e.currentTarget));
	
	update_people_details();
}
function check_field(f){
	var val = f.val();
	f.removeClass("ok");
	if (f.hasClass("sha-select")){
		// select
		if (f.get(0).selectedIndex == 0){
			f.removeClass("ok").addClass("nok");
		} else {
			f.removeClass("nok").addClass("ok");
		}
		
	} else {
		// text field or textarea
		if (val == ''){
			if (f.attr("id")!="user-observations"){
				f.addClass("nok");
			}
		} else {
			if ((f.attr("id")=="user-email")||(f.attr("id")=="locator-email-fld")){
				// validate email
				if (validate_email(val)){
					f.removeClass("nok").addClass("ok");
				} else {
					f.addClass("nok");
				}
			} else {
				f.removeClass("nok").addClass("ok");
			}
		}
	}
}

function update_people_details(){
	reservation.people[0].name= $("#user-name").val();
	reservation.people[0].surname= $("#user-last-name").val();
	reservation.people[0].phone= $("#user-phone").val();
	reservation.people[0].birth_date= $("#user-birth_date").val();
	reservation.people[0].dni= $("#user-passport").val();
	reservation.people[0].email= $("#user-email").val();
	reservation.people[0].title= $("#user-title").val();
	reservation.people[0].country= $("#user-country").val();
	reservation.people[0].details= $("#user-observations").val().split("'").join('').split('"').join('');
}
function validate_email(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function room_clicked(e){
	// room selected, so we show the rooms part in the ticket widget
	reservation.unlocked_step = Math.max(3,reservation.unlocked_step);
	
	var room = $(e.currentTarget).attr("data-room-code");
	reservation.room_code = room;
	
	update_reservation_details();
}

function num_nights_changed(e){
	var stay_days = parseInt( $("#sha-num-nights").val(), 10);
	if ((stay_days<(minimum_days_reservation-1))||(isNaN(stay_days))){
		var msg = $("p[data-message='numnights']").text();
		show_warning(msg, $(".step.step-2 .sha-header"));
		stay_days = minimum_days_reservation -1;
		$("#sha-num-nights").val(stay_days);
		$("#sha-num-nights").addClass("nok");
	} else {
		$("#sha-num-nights").removeClass("nok");
	}
	var d = Date.parse(reservation.booking_start) + stay_days*24*60*60*1000;
	var d_date = new Date(d);
	var end = d_date.toISOString().substr(0, 10);
	reservation.booking_end = end;
	reservation.num_nights = stay_days;
	update_reservation_details();
	return false;
}


function setup_reservation_steps(r){
	//console.log(r);
	// current step
	if ($(".sha-reservations-container").length == 0){
		//console.log("Setup called from outside reservations page")
		return false;
	}
	if((r.step>=4)&&(r.room_code.length<=1)){
		if ($(".sha-bullet-steps").length>=1){
			if (r.rooms_available>0){
				alert(__("Debe seleccionar una habitación.|You must select a room.|Sie müssen ein Zimmer auswählen.|Вы должны выбрать номер.|Vous devez sélectionner une pièce."));
				goto_step(3);
			} else {
				alert(__("Lo lamentamos pero no hay suites para las fechas seleccionadas. Por favor, seleccione otras fechas.|We´re sorry but there is no suite availability for the dates selected, please select another dates.|Es tut uns leid, aber keine Suiten im gewählten Zeitraum. Bitte wählen Sie ein anderes Datum.|Мы сожалеем, но в настоящее время нет сюиты для выбранных дат. Пожалуйста, выберите другие даты.|Nous sommes désolé mais aucun suites pour les dates sélectionnées. S'il vous plaît choisir d'autres dates."));
				goto_step(2);
			}
		}
		return false;
	}
	
	$(".sha-bullet-steps li").removeClass("completed");
	$(".sha-bullet-steps li").removeClass("current");
	$(".sha-bullet-steps li").addClass("active");
	$(".sha-bullet-steps li.step-" + r.step).addClass("current");
	
	$("#sha-widget-container").attr("data-step",r.step);
	
	$(".sha-bullet-steps li.step-" + r.step + "+li").removeClass("active");
	$(".sha-bullet-steps li.step-" + r.step + "+li+li").removeClass("active");
	$(".sha-bullet-steps li.step-" + r.step + "+li+li+li").removeClass("active");
	$(".sha-bullet-steps li.step-" + r.step + "+li+li+li+li").removeClass("active");
	$(".sha-bullet-steps li.step-" + r.step + "+li+li+li+li+li").removeClass("active");
	
	//if ((r.people) && (((r.people[0].programme_codes) && (r.people[0].programme_codes[0] != ''))||((r.people[1]) && ((r.people[0].programme_codes) && (r.people[1].programme_codes[0] != ''))))){
	if (r.step >= 1){
		$(".sha-bullet-steps li.step-1").addClass("completed");
	}
	//if (r.booking_start != ''){
	if (r.step >= 2){
		$(".sha-bullet-steps li.step-2").addClass("completed");
	}
	//if (r.room_code != ''){
	if (r.step >= 3){
		$(".sha-bullet-steps li.step-3").addClass("completed");
	}
	//if (r.transfer){
	if (r.step >= 4){
		$(".sha-bullet-steps li.step-4").addClass("completed");
	}
	//if ((r.people) && (r.people[0].name != '')){
	if (r.step >= 5){
		$(".sha-bullet-steps li.step-5").addClass("completed");
		
	}
	
	$(".reservation-texts .step").hide();
	$(".reservation-texts .step-"+r.step ).show();
	
	$(".reservation-forms .step").stop().fadeOut(300);
	$(".reservation-forms .step-"+r.step).stop().delay(400).fadeIn(500);
	
	var dt = Date.parse(r.booking_start);
	var ndt = now.getTime();
	
	if (dt < ndt ){
		// reservation date before now
		ndt_date = new Date();
		ndt_date.setTime(ndt);
		r.booking_start = reservation.booking_start = ndt_date.toISOString().substr(0, 10);
		r.booking_end = reservation.booking_end = ndt_date.toISOString().substr(0, 10);
		
		// before recalling reservation details we update the front
		setup_reservation_front(r);
		
		update_reservation_details();
	}
	
	
	if (dt < ndt + 3*24*60*60*1000){
		// check-in before 3 days. No time enough to get the tranfer ready, so we hide it
		$(".sha-transfer-check[value='No']").click();
		$("#transfer-hiddeable-wrapper").hide();
	} else {
		$("#transfer-hiddeable-wrapper").show();
	}
	
	if ((r.step==2)&&(r.people[0].programme_codes.length==0)){
		//alert("");
		var msg = $("p[data-message='emptyprogrammes']").text();
		show_warning(msg, $("#sha-widget-buttons"));
	}
	
	if (r.step==5){
		//$(".widget_sha_reservations_widget").addClass("disabled");
		$(".final-item-btn").remove();
		$('#mobile-panel .link.accept-and-continue.button').addClass("hidden");
		$('.sha-bullet-steps .link.accept-and-continue.button').addClass("hidden");
		sha_setup_checkout_forms();
	} else {
		$(".widget_sha_reservations_widget.disabled").removeClass("disabled");
		$('#mobile-panel .link.accept-and-continue.button').removeClass("hidden");
		$('.sha-bullet-steps .link.accept-and-continue.button').removeClass("hidden");
	}
	
	// metrics system
	//console.log("step: " + r.step)
	if ($(".reservation-main-holder").length>0){
		switch(r.step){
			case 1:
				metrics.pixel("s1");
				break;
			case 2:
				metrics.pixel("s2");
				break;
			case 3:
				metrics.pixel("s3");
				break;
			case 4:
				metrics.pixel("s4");
				break;
			case 5:
				metrics.pixel("s5");
				break;
			case 6:
				break;
			default:
				break;
		}
	}
	if (r.step == 6){
		// metrics.pixel("conversion");
		// google report conversion
		//goog_report_conversion('#reservation-request-step6');
		$(".widget_sha_reservations_widget").addClass("disabled");
		$(".final-item-btn").remove();
	}
}


///////////////////////////////////////////////////////
////
////    CALENDAR DRAWING
////
///////////////////////////////////////////////////////


function move_month(steps){
	current_month = current_month + steps;
	if (current_month>12){
		current_month -= 12;
		current_year ++;
	}
	if (current_month<1){
		current_month += 12;
		current_year --;
	}
	generate_map_month(current_month, current_year);
	
	return false;
}

function generate_map_month(m, y, month_item){
	//console.log("month: "+ m);
	if(month_item == undefined){
		month_item  = 1;
	}
	//console.log("Generating map for month: "+ m);
	$(".sha-month-name.month-"+month_item+"").text(month_names[m] + ' ' + y);
	var mm = "0"+m;
	mm = mm.substr(-2, 2);
	
	$(".sha-calendar-table.month-"+month_item+" tbody tr").remove();
	var current_day = 1;
	var current_holder = 1;
	var dt = new Date();
	var last_day_month = days_in_month(m,y);
	dt.setDate(1);
	dt.setMonth(m-1);
	dt.setFullYear(y);
	var week_day_offset = dt.getDay();
	if (week_day_offset==0) week_day_offset = 7;
	//week_day_offset = 8 - week_day_offset;
	//console.log(dt);
	//console.log(dt.getDay());
	for(var wk = 1; wk<=10; wk++){
		var wk_row = $("<tr />");
		for(var wk_day = 1; wk_day <=7; wk_day++){
			var new_day = $("<td />");
			if (current_holder>=week_day_offset){
				new_day.text(current_day);
				var dd = "0"+current_day;
				dd = dd.substr(-2, 2);
				
				new_day.attr("data-date", y+""+mm+""+dd);
				new_day.attr("data-iso_date", y+"-"+mm+"-"+dd);
				if (current_day>last_day_month){
					//month_item=2;
					//current_day=1;
					break;
				}
				current_day++;
			} else {
				new_day.text("").addClass("disabled");
			}
			if (wk_day>=6){
				new_day.addClass("weekend");
			}
			
			if (y == now.getFullYear()){
				// current or next year
				if (m <= now.getMonth()+1){
					// current or previous month
					if ( (current_day < now.getDate()+1) || (  (m < now.getMonth()+1)  )){
						// past days
						new_day.addClass("disabled");
					}
					if ((current_day == now.getDate()+1) && (m == now.getMonth()+1) && (y == now.getFullYear())){
						// today
						new_day.addClass("current");
					}
				}
			} else {
				if (y < now.getFullYear()){
					// previous year, so disabled
					new_day.addClass("disabled");
				}
			}
			wk_row.append(new_day);
			current_holder++;
		}
		$(".sha-calendar-table.month-"+month_item+" tbody").append(wk_row);
	}
	if (month_item == 1){
		get_availability(m, y, function (){});
		var nm = m+1;
		if (nm==13){
			nm=1;
			y++;
		}
		generate_map_month(nm, y, 2);
		return false;
	}
	// after drawing the month, get availability (this month and next)
	get_availability(m, y, function (){
		var nm = m+1;
		if (nm==13){
			nm=1;
			y++;
		}
		get_availability(nm, y, update_reservation_details);
	});
}
function days_in_month(month,year) {
    return new Date(year, month, 0).getDate();
}

///////////////////////////////////////////////////////
////
////    NAVISION PRICES
////
///////////////////////////////////////////////////////
function get_navision_prices(){
	var filename = "/wp-content/uploads/nav/prices.txt";
	//console.log(filename);
	$.ajax({
	  url: filename,
	  success: function (r){
		  	//console.log(r);
		  	cache_prices = r;
		  	update_programmes_prices();
		},
	  dataType: "json"
	});
}

function update_programmes_prices(){
	if (cache_prices){
	$(".programme-row").each(function (a,b){
	  	var code = $(b).attr("data-programme");
	  	var year_prices = reservation.booking_start.substr(2, 2);
	  	code = year_prices + code.substr(2, 100);
	  	//console.log(code);
	  	var loops = cache_prices.avaliable_programes.length;
	  	var found = false;
	  	
	  	/*
	  	// exception fitness programme fix (different code on each year)
	  	if (code=="16_FITN_07"){
		  	code = "16_FITNV2_07";
	  	}
	  	*/
	  	
	  	
	  	for(var i=0;i<loops;i++){
		  	//console.log(code);
		  	//console.log(cache_prices.avaliable_programes[i].programme_code)
		  	
		  	if(code == cache_prices.avaliable_programes[i].programme_code){
			  	var price = parseFloat(cache_prices.avaliable_programes[i].total_price);
			  	$(b).find(".programme-price-holder").html(price.toMoney());
			  	$(b).attr("data-price", price);
			  	found= true;
			  	break;
		  	}
	  	}
	  	if (!found){
			$(b).find(".programme-price-holder").text(__("No disponible|Not available|Nicht verfügbar|нет в наличии|Non disponible"));
			$(b).find(".sha-programme-check").attr("disabled", "disabled").css("opacity", 0.3);
			
	  	}
  	});
  	}
}

function new_programme(guest, name, price, code){
	var res = '<tr class="row-guest row-guest-'+guest+'"><td class="sha-remove-cell"><a href="#" class="remove-item-btn" data-code="'+code+'" data-guest="'+guest+'"><i class="icon icon-plus"></i></a></td><td class="sha-programme-cell">'+name+'</td><td class="sha-price-cell">'+price+'</td></tr>';
	return res;
}


function new_extra_item(name, price, type){
	var res = '<tr class="item-type-'+type+'"><td class="sha-room-type"><span id="sha-item-title">'+name+'</span></td><td class="sha-price-cell" id="sha-item-price">'+price+'</td></tr>';
	return res;
}
///////////////////////////////////////////////////////
////
////    CALENDAR DATA INSERTION
////
///////////////////////////////////////////////////////

function get_availability(m, y, callback){
	var mm = "0"+m;
	mm = mm.substr(-2, 2);
	var filename = "/wp-content/uploads/nav/availability-" + y + "-" + mm + ".txt";
	//console.log(filename);
	$.ajax({
	  url: filename,
	  success: function (r){
		  	//console.log(r);
		  	cache_availability[y+""+mm] = r;
		  	for (var i=1; i<=31; i++){
				var dd = "0"+i;
				dd = dd.substr(-2, 2);
				var this_day = y+""+mm+""+dd;
				var this_day_types = 0;
				if (r[this_day]!=undefined){
					for (var j=0; j<room_codes.length; j++){
						if ( parseInt(r[this_day][room_codes[j]].availability, 10) > 0 ){
							this_day_types++;
						}
					}
				}
				//console.log(this_day + " -> " + this_day_types);
				//this_day_types = filter_availability(this_day_types, this_day);
				if(this_day_types==0){
					
					$(".sha-calendar-table td[data-date='"+this_day+"']").addClass("unavailable");
				}
			}
			if (callback){
				callback();
			}
		},
	  dataType: "json"
	});
}
function filter_availability(previous_value, date){
	if(date.substr(0, 6) == "201608"){
		return 0;
	}
	return previous_value;
}

///////////////////////////////////////////////////////
////
////    SERVER SYNC OF RESERVATIONS
////
///////////////////////////////////////////////////////

function sha_save_reservation(){
	var filename = "/wp-admin/admin-ajax.php?action=sha_sync_reservation";
	//console.log(filename);
	$.ajax({
	  url: filename,
	  data: {r:reservation},
	  method: "post",
	  success: function (r){
//		  	console.log(r);
		},
	  dataType: "json"
	});
}


function sha_get_reservation_by_locator(l){
	var filename = "/wp-admin/admin-ajax.php?action=sha_get_reservation_by_locator";
	//console.log(l);
	$.ajax({
	  url: filename,
	  data: {locator:l.replace("-NC", "")},
	  method: "post",
	  success: function (r){
		  result = (r);
		  	//console.log(result);
		  	reservation = result;
		  	localStorage.reservation = JSON.stringify(reservation);
		  	setup_reservation_steps(r);
		  	setup_reservation_front(r);
		  	update_reservation_details();
		  	show_dialog('');
		},
	  dataType: "json"
	});
}

function locator_load(e){
	sha_get_reservation_by_locator($('#locator-load-fld').val());
}


function  setup_reservation_front(reservation){
	//console.log(reservation.people[0].programme_codes);
	$(".sha-bullet-steps ol").show();
	$("#locator-holder").val(reservation.locator + "-NC");
	$(".sha-people-radio[value='"+reservation.adults+"']").prop("checked", true);
	
	if (typeof reservation.first_time != "undefined"){
		if ( reservation.first_time == "yes" ){
			$(".sha-times-radio.radioy").prop("checked", true);
			$(".sha-times-radio.radion").prop("checked", false);
		} else {
			$(".sha-times-radio.radioy").prop("checked", false);
			$(".sha-times-radio.radion").prop("checked", true);
		}
	} else {
		reservation.first_time = "yes";
		$(".sha-times-radio.radioy").prop("checked", true);
		$(".sha-times-radio.radion").prop("checked", false);
	}
	
	if (reservation.adults==1){
		$(".sha-guest-cell:last-child").addClass("hidden-col");
		$(".row-guest-2").fadeOut(100);
		$(".sha-programme-check.guest-2").prop("checked", false);
	} else {
		$(".sha-guest-cell:last-child").removeClass("hidden-col");
		$(".row-guest-2").fadeIn(100);
	}
	// guests reservations
	for (var guest = 1; guest<=2; guest++){
		if (reservation.people[guest-1]){
			if (reservation.people[guest-1].programme_codes){
				for (var i=0; i<=reservation.people[guest-1].programme_codes.length; i++){
					$(".sha-row.programme-row[data-programme='"+reservation.people[guest-1].programme_codes[i]+"'] .sha-programme-check.guest-"+guest).prop("checked", true);
				}
			}
			if (reservation.people[guest-1].packages){
				for (var i=0; i<=reservation.people[guest-1].packages.length; i++){
					$(".sha-package-check.guest-"+guest+"[data-package='"+reservation.people[guest-1].packages[i]+"']").prop("checked", true);
				}
			}
		}
	}
	$("#sha-num-nights").val(reservation.num_nights);
	$(".sha-room-card input[data-room-code='"+reservation.room_code+"']").prop("checked", true);
	
	
	if (reservation.objectives_list){
		for (var o = 0; o<reservation.objectives_list.length; o++){
			$(".sha-objectives-check[value='"+reservation.objectives_list[o]+"']").prop("checked", true);
		}
	}
	objectives_filter_clicked(null);
	
	if ((reservation.coupon_code) && (reservation.coupon_code.length>1)){
		$("#coupon-code-fld").val(reservation.coupon_code).addClass("ok");
	}
	//console.log(reservation.people[0].title);
	// people details
	
	$("#user-title").val(reservation.people[0].title)
	if (reservation.people[0].title!=""){
		$("#user-title").addClass("ok");
	}
	$("#user-name").val(reservation.people[0].name)
	if (reservation.people[0].name!=""){
		$("#user-name").addClass("ok");
	}
	$("#user-last-name").val(reservation.people[0].surname)
	if (reservation.people[0].surname!=""){
		$("#user-last-name").addClass("ok");
	}
	$("#user-phone").val(reservation.people[0].phone)
	if (reservation.people[0].phone!=""){
		$("#user-phone").addClass("ok");
	}
	$("#user-birth_date").val(reservation.people[0].birth_date)
	if (reservation.people[0].birth_date!=""){
		$("#user-birth_date").addClass("ok");
	}
	$("#user-email").val(reservation.people[0].email)
	if (reservation.people[0].email!=""){
		$("#user-email").addClass("ok");
	}
	$("#user-passport").val(reservation.people[0].dni)
	if (reservation.people[0].dni!=""){
		$("#user-passport").addClass("ok");
	}
	$("#user-country").val(reservation.people[0].country)
	if (reservation.people[0].country!=""){
		$("#user-country").addClass("ok");
	}
	$("#user-observations").val(reservation.people[0].details)
	if (reservation.people[0].details!=""){
		$("#user-observations").addClass("ok");
	}
	
	
  	if (reservation.confirmed == "yes"){
	  	$(".sha-bullet-steps ol").hide();
	  	$(".locator-holder").text(reservation.locator);
	} else {
		$(".locator-holder").text(reservation.locator + "-NC");
	}
  	if (reservation.is_paid == "no"){
	  	$(".pending-confirmation").show();
	  	$(".confirmed-reservation").hide();
  	} else {
	  	$(".pending-confirmation").hide();
	  	$(".confirmed-reservation").show();
  	}
}
///////////////////////////////////////////////////////
////
////    AVAILABLE ROOMS CONTROLLER
////
///////////////////////////////////////////////////////
function get_single_person_price_for_room(code, default_price){
	var year = "";
	var this_year = new Date();
	if (parseInt(reservation.booking_start.substr(0,4), 10) != this_year.getFullYear() ){
		year = "NY_";
	}
	for (var a = 0; a < cache_prices.avaliable_rooms.length; a++){
		if (cache_prices.avaliable_rooms[a]){
			if (cache_prices.avaliable_rooms[a].room_code == year+code){
				return parseFloat(cache_prices.avaliable_rooms[a].total_price)/6;
			}
		}
	}
	return parseFloat(default_price);
}
function show_rooms_availability(){
	var rooms_available = [];
	
	var bsd = Date.parse(reservation.booking_start);
	var bed = Date.parse(reservation.booking_end);
	
	var bsd_date = new Date(bsd);
	var bed_date = new Date(bed);
	
	for (var j=0; j<room_codes.length; j++){
		
		var curd = bsd
		var is_room_avaliable = true;
		var room_price = 0;
		var days_count = 0;
		while (curd<bed){
			days_count++;
			curd += 24*60*60*1000;
			curd_date = new Date(curd);
			mm = "0" + (curd_date.getMonth()+1);
			mm = mm.substr(-2, 2);
			dd = "0" + (curd_date.getDate());
			dd = dd.substr(-2, 2);
			yyyy = curd_date.getFullYear();
			curd_day = yyyy + "" + mm + "" + dd;
			if(cache_availability[yyyy + "" + mm] == undefined){
				get_availability(mm, yyyy, show_rooms_availability);
				return false;
			}
			var avail = cache_availability[yyyy + "" + mm][curd_day][room_codes[j]];
			//console.log(room_codes[j])
			//console.log(avail)
			//avail = filter_room_availability(avail, curd_date, room_codes[j]);
			
			//console.log(avail);
			if(reservation.adults!=1){
				rpr = parseFloat(avail.price);
			} else {
				//rpr = get_single_person_price_for_room(room_codes[j], avail.price);
				rpr = parseFloat(avail.singleprice);
				if (rpr==0){
					rpr = parseFloat(avail.price);
				}
			}
			//console.log(rpr);
			if ((avail["avaliable"]!= "true")){ // ATTENTION MISSPELLED ATTRIBUTE
				is_room_avaliable = false;
				break;
			} else {
				room_price += rpr;
			}
			//console.log(avail);
		}
		var price_per_night = room_price/days_count;
		if (is_room_avaliable){
			if (room_price>0){
				rooms_available.push({'code':room_codes[j], 'price': room_price, 'per_night':price_per_night});
			}
		}
	}
	
	//console.log(rooms_available);
	$("input[data-room-code]").parent().hide();
	$(".suite-no-options").show();
	
	//$(".sha-room-card").hide();
	for (var j=0; j<rooms_available.length; j++){
		//console.log(rooms_available[j]["code"])
		$("input[data-room-code='"+rooms_available[j]["code"]+"']").parent().show()
		$(".sha-room-card[data-prefix='"+rooms_available[j]["code"].substr(0,2)+"']").show();
		$(".sha-room-card[data-prefix='"+rooms_available[j]["code"].substr(0,2)+"'] .suite-no-options").hide();
		$("input[data-room-code='"+rooms_available[j]["code"]+"']").parent().find(".sha-room-price").html( rooms_available[j]["per_night"].toMoney()  );
		$("input[data-room-code='"+rooms_available[j]["code"]+"']").attr("data-price", rooms_available[j]["price"]);
	}
	
	
	reservation.rooms_available = rooms_available.length;
	// if (reservation.rooms_available == 0){
	// 	alert(__("Lo lamentamos pero no hay suites para las fechas seleccionadas. Por favor, seleccione otras fechas.|We´re sorry but there is no suite availability for the dates selected, please select another dates."));
	// }
}
function filter_room_availability(previous_value, date, room_code){
	// EMERGENCY: Close Booking on August 2016
	if ((date.getMonth() == 7) &&(date.getFullYear() == 2016)){
		if (reservation.room_code == room_code){
			$("input[data-room-code='"+room_code+"']").prop("checked", false);
			reservation.room_code = "";
		}
		return "false";
	}
	return previous_value;
}

function validate_people(){
	
	if(reservation.room_code.length <= 1){
		
		msg = __("Por favor seleccione una suite|Please select a suite|Please select a suite|Please select a suite|Please select a suite");
		show_warning(msg, $("#pay-now-btn"));
		goto_step(3);
		return false;
	}
	
	if($("#accept-cancelation:checked").length == 0){
		
		msg = $("p[data-message='mustaccept']").text();
		show_warning(msg, $("#pay-now-btn"));
		return false;
	}
	
	
	
	$("#people-form input, #people-form select").each(function (a, b){
		//console.log("checking field");
		check_field($(b));
	});
	if ($("#people-form .nok").length>0){
		msg = $("p[data-message='incompleteform']").text();
		show_warning(msg, $(".step.step-5 .sha-header"));
		$("body, html").animate({"scrollTop": $(".step.step-5 .sha-header").offset().top}, 400);
		return false;
	}
	
	localStorage.reservation = JSON.stringify(reservation);
	sha_save_reservation();
	
	validate_credit_card();
	return false;
}

function validate_credit_card(){
	
	//if($("#card-name").val()=="test!"){
	if(1){
		$('.stripe-button-el').click();
		return false;
	}
	
	
	
	// Old manual system. Not used anymore
	
	$("#cards-form input, #cards-form select").each(function (a, b){
		//console.log("checking field");
		check_field($(b));
	});
	//goto_confirm_step();
	if ($("#cards-form .nok").length>0){
		msg = $("p[data-message='incompletecardform']").text();
		show_warning(msg, $("#people-form"));
		$("body, html").animate({"scrollTop": $("#cards-form").offset().top-100}, 400);
		return false;
	}
	
	
	
	var filename = "/wp-admin/admin-ajax.php?action=sha_validate_card&n="+$("#card-number").val()+"&t="+$("#card-type").val()+"&m="+$("#card-month").val()+"&y="+$("#card-year").val()+"&cvv="+$("#card-cvv").val()+"&l="+reservation.locator+"&nm="+$("#card-name").val();
	//console.log(filename);
	$.ajax({
	  url: filename,
	  success: function (r){
		  	//console.log(r);
		  	if (r.valid){
			  	// credit card is valid
			  	goto_confirm_step();
		  	} else {
			  	if ($("#card-type").val() != r.realtype){
			  		msg = $("p[data-message='invalidcardtype']").text();
			  	} else {
			  		msg = $("p[data-message='invalidcreditcard']").text();
			  	}
				show_warning(msg, $("#pay-now-btn"));
		  	}
		},
	  dataType: "json"
	});
	return false;
}
var timer_coupon = 0;
function validate_coupon_code(){
	clearTimeout(timer_coupon);
	reservation.coupon_code = $("#coupon-code-fld").val();
	$("#coupon-code-fld").removeClass("nok");
	$(".coupon-result").text(__("Verificando código...|Validating code...|Überprüfen Code...|Проверка кода...|Vérification du code..."));
	
	
	var filename = "/wp-admin/admin-ajax.php?action=sha_validate_coupon";
	//console.log(filename);
	$.ajax({
	  url: filename,
	  data: {r:reservation},
	  method: "post",
	  success: function (res){
			//console.log(res);
			if (res.valid=="yes"){
				valid=true;
				reservation.coupon_price_discount = 0;
				reservation.coupon_room_percent = 0;
				reservation.coupon_programme_percent = 0;
				reservation.coupon_description = "";
				var isApplicable = false;
				for (var i=0;i<reservation.people[0].programme_codes.length; i++){
					if (res.programme_codes.indexOf(reservation.people[0].programme_codes[i]) >= 0){
						isApplicable = true;
						break;
					}
				}
				if ( isApplicable ){
					if (res.price_discount>0){
						reservation.coupon_price_discount = parseFloat(res.price_discount);
						reservation.coupon_room_percent = parseFloat(res.room_percent);
						reservation.coupon_description = res.coupon_description;
					}
					if (res.room_percent>0){
						reservation.coupon_price_discount += reservation.room_price*parseFloat(res.room_percent)/100;
						reservation.coupon_room_percent = parseFloat(res.room_percent);
						//console.log(reservation.coupon_price_discount);
					}
					if (res.programme_percent>0){
						var discount_programmes = 0;
						for (var i=0;i<reservation.people[0].programme_codes.length; i++){
							if (res.programme_codes.indexOf(reservation.people[0].programme_codes[i]) >= 0){
								discount_programmes += reservation.people[0].programme_prices[i]*parseFloat(res.programme_percent)/100;
							}
						}
						//console.log(discount_programmes);
						reservation.coupon_price_discount += discount_programmes;
						reservation.coupon_programme_percent = parseFloat(res.programme_percent);
					}
				
				
				}
				if (res.coupon_description.length>0){
					for (var i=0;i<reservation.people[0].programme_codes.length; i++){
						if (res.programme_codes.indexOf(reservation.people[0].programme_codes[i]) >= 0){
							reservation.coupon_description = res.coupon_description;
						}
					}
					
					if ((reservation.coupon_description.length==0) || (!isApplicable)) {
						reservation.coupon_code = '';
						reservation.coupon_price_discount = 0;
						$("#coupon-code-fld").removeClass("ok");
						$("#coupon-code-fld").addClass("nok");
						$(".coupon-result").text(__("Lo sentimos pero el código introducido no es válido sin programa de salud.|Sorry, but the provided code is not valid if you have not selected a health programme.|Sorry, aber der Code eingegeben ist nicht gültig ohne Gesundheitsprogramm.|Извините, но введенный код не действителен без программы в области здравоохранения.|Désolé, mais le code saisi est valide sans programme de santé.") + " " + res.coupon_description);
						valid=false;
						reservation.coupon_price_discount = 0;
						reservation.coupon_programme_percent = 0;
					}
				}
				if (valid){
					$("#coupon-code-fld").addClass("ok");
					$(".coupon-result").text(__("Código válido. Descuentos aplicados.|Valid code. Your discount has been applied.|Gültiger Code. Rabatte angewendet.|действительный код. Скидки применяются.|Code valide. Réductions appliquées."));
					$(".coupon-result").append(" " +reservation.coupon_description);
				}
				//console.log(reservation.coupon_description);
			} else {
				reservation.coupon_code = '';
				reservation.coupon_price_discount = 0;
				$("#coupon-code-fld").removeClass("ok");
				$("#coupon-code-fld").addClass("nok");
				$(".coupon-result").text(__("Lo sentimos pero el código introducido no es válido.|Sorry, but the provided code is not valid.|Sorry, aber der Code ist ungültig.|Извините, но код введен неверно.|Désolé, mais le code saisi est invalide.") + " " + res.message);
		  	}
		  	//console.log(reservation.coupon_price_discount);
		  	update_reservation_details();
		},
	  dataType: "json"
	});
	
	timer_coupon = setTimeout(validate_coupon_code, 20000);
	
	return false;
}


function goto_confirm_step(){
	//metrics.pixel('confirmation');
	reservation.confirmed = "yes";
	reservation.is_paid = "no";
  	reservation.credit_card = $("#card-type").val() + " **** **** **** " + $("#card-number").val().substr(-4);
  	$(".pending-confirmation").show();
  	$(".confirmed-reservation").hide();
  	$(".locator-holder").text(reservation.locator);
	$(".sha-bullet-steps ol").hide();
  	goto_step(6);
}





///////////////////////////////////////////////////////
////
////    PAYMENTS
////
///////////////////////////////////////////////////////
function sha_setup_checkout_forms(){
	//console.log("Setting up Stripe form");
	
	// STRIPE
	amount = Math.round(reservation.total_price*0.3*100);
	locator = reservation.locator;
	
	$("#stripe-form input[name='stripe_amount']").val(amount);
	$("#stripe-form input[name='stripe_item_number']").val(locator);
	$("#stripe-form input[name='stripe_item_name']").val("SHA. 30% reservation");
	// pk_live_uCDiihi2JIjrILLVay7qDEYA production
	// pk_test_FczgMz99vN1GEGN3DjdsCx7d test
	var stripe_html = '<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_live_uCDiihi2JIjrILLVay7qDEYA" data-amount="'+amount+'" data-name="SHA Wellness Clinic" data-email="'+reservation.people[0].email+'" data-description="30% reservation"  data-locale="es" data-currency="eur" data-label="Realizar pago"></script>';
	//Pay tickets
	$("#stripe-form .stripe_form_container").empty();
	
	$("#stripe-form .stripe_form_container").append(stripe_html);
	
	
}
///////////////////////////////////////////////////////
////
////    RESERVATION CALCULATION
////
///////////////////////////////////////////////////////

function update_reservation_details(){
	// calendar update
	
	update_programmes_prices();
	
	nowd = new Date();
	reservation.last_interaction = nowd.toISOString();
	
	$(".sha-calendar-table tbody td").removeClass("selected").removeClass("last-day").removeClass("first-day").removeClass("temporary").removeClass("out-of-programme");
	$(".sha-calendar-table td[data-iso_date='"+reservation.booking_start+"']").addClass("selected").addClass("first-day");

	// locator update
	$("#locator-load-fld").val(reservation.locator+"-NC");
	
	$("#locator-copy-fld").val(reservation.locator+"-NC");
	//console.log(reservation.booking_start)
	var bsd = Date.parse(reservation.booking_start);
	var bed = Date.parse(reservation.booking_end);
	
	var bsd_date = new Date(bsd);
	var bed_date = new Date(bed);
	
	var curd = bsd
	var num_nights = 0;
	var curd_iso;
	while (curd<bed){
		num_nights++;
		curd += 24*60*60*1000;
		curd_date = new Date(curd);
		curd_iso = curd_date.toISOString().substr(0, 10);
		$(".sha-calendar-table td[data-iso_date='"+curd_iso+"']").addClass("selected");
		
	}
	
	//console.log(reservation.booking_end);
	$(".sha-calendar-table td[data-iso_date='"+curd_iso+"']").addClass("last-day");
	
	//reservation.booking_start
	show_rooms_availability();
	
	// widget update
	$("#number-nights").text( $("#sha-num-nights").val() );
	$("#check-in-date").text( locale_date(bsd_date) );
	$("#check-out-date").text( locale_date(bed_date) );
	$("#locator-holder").text(reservation.locator+"-NC");
	$("#locator-copy-fld").val(reservation.locator+"-NC");
	
	
	
	// programmes setup
	programmes_price = 0;
	reservation.people[0].programme_codes = [];
	reservation.people[0].programme_prices = [];
	if (reservation.people[1]){
		reservation.people[1].programme_codes = [];
		reservation.people[1].programme_prices = [];
	}
	$(".row-guest").remove();
	var days_in_programme_guest = [0,0];
	//console.log(days_in_programme_guest);
	$(".sha-programme-check").removeClass("disabled");
	reservation.people[0].programme_name = '';
	if (reservation.people[1]){
		reservation.people[1].programme_name = '';
	}
	$(".sha-programme-check:checked").each(function (a, b){
		var pr = parseFloat($(b).parent().parent().parent().attr("data-price"));
		var cd = $(b).parent().parent().parent().attr("data-programme");
		var days = parseInt($(b).parent().parent().parent().attr("data-days"), 10);
		
		var name = $(b).parent().parent().parent().attr("data-name") + " " + days + __(" días| days| Tage| дня| jours");
		var person = 0;
		if($(b).hasClass("guest-2")){
			person = 1;
		}
		
		if (reservation.people[person].programme_codes.length <= 1){
			var incompat = $(b).parent().parent().parent().attr("data-incompatibility").split(",");
			//console.log(incompat);
			for (var inco = 0; inco < incompat.length; inco++){
				$(".sha-row.programme-row[data-programme*='"+incompat[inco]+"'] .sha-programme-check.guest-"+(person+1)).addClass("disabled");
				//$(".sha-row.package-row[data-incompatibility*='"+cd+"'] .sha-package-check.guest-"+(person+1)).addClass("disabled");
				//console.log(".sha-row.package-row[data-incompatibility*='"+incompat[inco]+"'] .sha-package-check.guest-"+(person+1));
			}
			
			days_in_programme_guest[person] += days;
			//console.log(reservation);
			if (reservation.people[person] == undefined){
				reservation.people.push(new_person());
			}
			
			if (reservation.people[person]){
				reservation.people[person].programme_codes.push(cd);
				reservation.people[person].programme_price = (pr);
				reservation.people[person].programme_prices.push(pr);
				reservation.people[person].programme_name += (name) + ". ";
				programmes_price+= pr;
				var new_row = new_programme((person+1), name, pr.toMoney(), cd);
				$("#sha-reservation-programmes tbody.tbody-"+(person+1)).append(new_row);
				
			} else {
				console.error("Person does not exist");
			}
		} else {
			alert(__("Lo sentimos pero no se pueden elegir más de dos programas por persona.|Sorry, but you cannot select more than 2 programmes per person.|Entschuldigung, aber Sie können nicht mehr als 2 Programme pro Person auswählen.|Извините, но вы не можете выбрать более двух программ на человека.|Désolé, mais vous ne pouvez pas sélectionner plus de 2 programmes par personne."));
			$(b).prop("checked", false);
			//return;
		}
	});
	//console.log(reservation)
	minimum_days_reservation = Math.max( const_min_days_res, Math.max(days_in_programme_guest[0], days_in_programme_guest[1]));
	if ((reservation.unlocked_step<=1)&&(minimum_days_reservation!=parseFloat($("#sha-num-nights").val()))){
		$("#sha-num-nights").val(minimum_days_reservation);
		var bsd = Date.parse(reservation.booking_start);
		var bsd_date = new Date(bsd + minimum_days_reservation*24*60*60*1000);
		reservation.booking_end = bsd_date.toISOString().substr(0, 10);
		clearTimeout(timer_reservation_details);
		timer_reservation_details = setTimeout(update_reservation_details, 100);
		//update_reservation_details();
		return;
	}
	//console.log(days_in_programme_guest);
	
	// do not allow a user to book a programme longer than his stay
	if ((num_nights<days_in_programme_guest[0]-1) || (num_nights<days_in_programme_guest[1]-1)){
		var new_number_of_nights = Math.max(days_in_programme_guest[0], days_in_programme_guest[1]);
		num_nights = new_number_of_nights;
		$("#sha-num-nights").val(num_nights);
		var bsd = Date.parse(reservation.booking_start);
		var bsd_date = new Date(bsd + num_nights*24*60*60*1000);
		reservation.booking_end = bsd_date.toISOString().substr(0, 10);
		//show_warning(__("Your stay length has been adapted to ") + new_number_of_nights + __(" nights") , $("#number-nights"));
		//update_reservation_details();
		clearTimeout(timer_reservation_details);
		timer_reservation_details = setTimeout(update_reservation_details, 100);
		return;
	}
	
	if ( (num_nights >= 7) && ( Math.max( Math.max(days_in_programme_guest[0], days_in_programme_guest[1])) < 5) ) {
		alert(__("Lo sentimos pero para estancias de más de 7 noches es necesario seleccionar un programa de 7 días.|Sorry, but if you are going to stay more than 7 nights you must select a programme of 7 days or more.|Entschuldigung, aber wenn Sie länger als 7 Nächte bleiben, müssen Sie ein Programm von 7 Tagen oder mehr wählen.|Извините, но если вы собираетесь остановиться более 7 ночей, вы должны выбрать программу продолжительностью 7 дней или более.|Désolé, mais si vous restez plus de 7 nuits, vous devez sélectionner un programme de 7 jours ou plus."));
		goto_step(1)
		return
	}
	if ( (num_nights >= 14) && ( Math.max( Math.max(days_in_programme_guest[0], days_in_programme_guest[1])) < 8) ) {
		alert(__("Lo sentimos pero para estancias de más de 14 noches es necesario seleccionar un programa de 14 días.|Sorry, but if you are going to stay more than 14 nights you must select a programme of 14 days or more.|Entschuldigung, aber wenn Sie länger als 14 Nächte bleiben, müssen Sie ein Programm von 14 Tagen oder mehr wählen.|Извините, но если вы собираетесь остановиться более 14 ночей, вы должны выбрать программу продолжительностью 14 дней или более.|Désolé, mais si vous restez plus de 14 nuits, vous devez sélectionner un programme de 14 jours ou plus."));
		goto_step(1)
		return
	}
	// full board charges
	//console.log(days_in_programme_guest);
	var full_board_price = parseFloat($("#fullboard-price").val());
	var now_ = new Date();
	var next_year = "" + (now_.getFullYear() + 1);
	if (reservation.booking_start.substr(0, 4) == next_year){
		full_board_price = parseFloat($("#fullboard-price-next").val());
	}
	var boards_price = 0;
	var info_btn = "<a href='#' data-message='fullboard' class='info-btn'></a>";
	reservation.full_board_days = 0;
	for (i = 0; i<reservation.people.length; i++){
		var extra_days = num_nights - days_in_programme_guest[i];
		//console.log(extra_days);
		if (extra_days>0){
			var pr = extra_days*full_board_price;
			boards_price += pr;
			var new_row = new_programme((i+1), __("Pensión completa |Full board |Vollpension |полный пансион |Pension complète ") + extra_days + __(" días| days| Tage| дня| jours") + info_btn, pr.toMoney(), "FULLBOARD");
			//$(".row-guest-"+(i+1)+".header-row").after(new_row);
			$("#sha-reservation-programmes tbody.tbody-"+(i+1)).append(new_row);
		}
		reservation.full_board_days = Math.max(reservation.full_board_days, extra_days);
	}
	if (reservation.full_board_days>0){
		$(".sha-calendar-table td[data-iso_date].selected").each(function (a,b){
			if ((num_nights - a  <= reservation.full_board_days) && ( a  < num_nights)){
				$(b).addClass("out-of-programme");
			}
		});
	}
	
	
	
	// room setup
	var room_price = 0;
	if ($("input[name='sha-room-option']:checked").length>0){
		
		var room_name = $("input[name='sha-room-option']:checked").parent().parent().parent().find("h4").text() + " (" + $("input[name='sha-room-option']:checked").parent().find(".room-name").text() + ")";
		var rcode = $("input[name='sha-room-option']:checked").attr("data-room-code");
		if (rcode== undefined){
			rcode = "";
		}
		room_name = rcode + " " + room_name;
		$("#sha-room-title").text(room_name);
		var room_description = reservation.people.length + __(" huéspedes (| guests (| Gäste (| гости (| invités (") + num_nights +__(" noches)| nights)| Nächte)| ночью)| nuits)");
		$("#sha-room-description").text(room_description);
		reservation.room_description = room_name + ". " + room_description;
		room_price = parseFloat($("input[name='sha-room-option']:checked").attr("data-price"));
		//console.log(room_price)
		//console.log(room_name)
		$("#sha-room-price").html(room_price.toMoney());
	} else {
		$("#sha-room-title").text(__("No ha seleccionado suite|No suite selected|Sie haben nicht ausgewählt Suite|Вы не выбрали люкс|Vous n'avez sélectionné la suite"));
		$("#sha-room-description").text("");
		$("#sha-room-price").html((0).toMoney());
	}
	if ((isNaN(room_price)) || (room_price==0)){
		room_price = 0;
		$("input[data-room-code]").prop("checked", false);
		reservation.room_code = "";
		reservation.room_description = "";
		$("#sha-room-title").text(__("No ha seleccionado suite|No suite selected|Sie haben nicht ausgewählt Suite|Вы не выбрали люкс|Vous n'avez sélectionné la suite"));
		$("#sha-room-description").text("");
		$("#sha-room-price").html((0).toMoney());
		
	}
	reservation.daily_rate = room_price/num_nights;
	reservation.num_nights = num_nights;
	reservation.room_price = room_price;
	
	
	// packages setup
	packages_price = 0;
	reservation.people[0].packages = [];
	if (reservation.people[1]){
		reservation.people[1].packages = [];
	}
	$(".sha-package-check:checked").each(function (a, b){
		var pr = parseFloat($(b).attr("data-price"));
		if (isNaN(pr)){
			alert(__("Disculpe las molestias. Ha ocurrido un error con la disponibilidad del programa seleccionado. Por favor reinicie el proceso.|Sorry, we have encountered an error on the availability of your selected programme. Please restart the reservation.|Es ist ein Fehler auf der Verfügbarkeit des ausgewählten Programms aufgetreten. Bitte starten Sie die Reservierung neu.|К сожалению, мы обнаружили ошибку на свободные номера выбранной программы. Пожалуйста, перезагрузите бронирование.|Désolé, nous avons rencontré une erreur sur la disponibilité de votre programme sélectionné. Veuillez redémarrer la réservation."));
			location.reload();
		}
		var cd = $(b).attr("data-package");
		var name = $(b).parent().parent().parent().find(".package-name").text();
		var person = 0;
		if($(b).hasClass("guest-2")){
			person = 1;
		}
		
		if (reservation.people[person]){
			reservation.people[person].packages.push(cd);
			reservation.people[person].package_price = (pr);
			packages_price+= pr;
			var new_row = new_programme((person+1), name, pr.toMoney(), cd);
			//$(".row-guest-"+(person+1)+".header-row").after(new_row);
			$("#sha-reservation-programmes tbody.tbody-"+(person+1)).append(new_row);
			
		} else {
			console.error("Person does not exist");
		}
	});
	
	
	$(".widget-extras-part").hide();
	
	// transfer setup
	var transfer_type = $(".sha-transfer-check:checked").val();
	var transfer_price = parseFloat($(".sha-transfer-check:checked").attr("data-price"));
	reservation.transfer_price = transfer_price;
	reservation.transfer_type = transfer_type;
	reservation.transfer = transfer_type;
	$(".item-type-transfer").remove();
	if (transfer_type!= "No"){
		$(".widget-extras-part").show();
		var new_row = new_extra_item("Transfer: " + transfer_type, transfer_price.toMoney() ,'transfer');
		$(".widget-extras-part .sha-table tbody").append(new_row);
	}
	
	
	// gift
	var gift_value = $(".sha-gift-check:checked").val();
	reservation.is_gift = gift_value;
	$(".item-type-gift").remove();
	if (gift_value!= "No"){
		$(".widget-extras-part").show();
		var new_row = new_extra_item( __("Regalo: |Gift: |Gift: |Gift: |Gift: ") + gift_value, '-' ,'gift');
		$(".widget-extras-part .sha-table tbody").append(new_row);
		if (gift_value == "Digital"){
			reservation.gift_address = $("#gift-email").val();
		} else {
			reservation.gift_address = $("#gift-address").val();
		}
	} else {
		reservation.gift_address = '';
	}
	
	// coupon
	var coupon_discount = 0;
	$(".item-type-coupon").remove();
	//console.log(reservation.coupon_price_discount);
	if (reservation.coupon_code){
		if (reservation.coupon_code.length > 0){
			$(".widget-extras-part").show();
			if (reservation.coupon_price_discount==0){
				if (reservation.coupon_room_percent>0){
					reservation.coupon_price_discount = room_price*reservation.coupon_room_percent/100;
				}
			}
			reservation.coupon_price_discount = parseFloat(reservation.coupon_price_discount);
			if (isNaN(reservation.coupon_price_discount)){
				reservation.coupon_price_discount = 0;
			}
			coupon_discount = reservation.coupon_price_discount;
			if (reservation.coupon_description == ""){
				var new_row = new_extra_item( __("Código especial: |Special code: |Spezieller Code: |Специальный код: |Code spécial: ") + reservation.coupon_code, '-'+reservation.coupon_price_discount.toMoney() ,'coupon');
			} else {
				var new_row = new_extra_item( __("Código especial: |Special code: |Spezieller Code: |Специальный код: |Code spécial: ") + reservation.coupon_code +" <br><strong>"+reservation.coupon_description+"</strong>", '-'+reservation.coupon_price_discount.toMoney(2) ,'coupon');
			}
			$(".widget-extras-part .sha-table tbody").append(new_row);
		}
	}
	
	// newsletter
	reservation.newsletter = ($("#accept-newsletter-check").prop("checked"))? "Yes":"No";
	
	// ticket unlocked steps
	if (reservation.unlocked_step>=1){
		$(".widget-programmes-part").slideDown(600);
	}
	if (reservation.unlocked_step>=2){
		$(".widget-dates-part").slideDown(600);
	}
	if (reservation.unlocked_step>=3){
		$("#sha-rooms-selector").fadeIn()
		$(".widget-rooms-part").slideDown(600);
	}
	if (reservation.unlocked_step>=4){
		if ($(".widget-extras-part .sha-table tbody tr").length>0){
			$(".widget-extras-part").slideDown(600);
		}
	}
	
	// TOTAL ITEMS PRICES
	var total_amount = 0;
	
	
	
	if (reservation.unlocked_step>=1){
		// calculate programmes prices
		
		if (programmes_price){
			total_amount += programmes_price;
		}
		
		// calculate room price
		
		if (room_price){
			total_amount += room_price;
		}
		
		// calculate full board price
		
		if (boards_price){
			total_amount += boards_price;
		}
		
		// calculate extra treatments price / packages
		
		if (packages_price){
			total_amount += packages_price;
		}
		
		// calculate extra items
		
		if (transfer_price){
			total_amount += transfer_price;
		}
		
		if (coupon_discount){
			total_amount -= coupon_discount;
		}
	}
	// calculate totals
	$("#sha-total-price").html(total_amount.toMoney(2)).attr("float-val", total_amount);
	var reservation_price = total_amount*0.3;
	//console.log(reservation)
	if (reservation.is_gift != "No"){
		$(".sha-total-reservation-price .percent").text("100%");
		reservation_price = total_amount;
	} else {
		$(".sha-total-reservation-price .percent").text("30%");
	}
	$("#sha-reservation-price").html(reservation_price.toMoney(2));
	$("#sha-total-reservation-price").html(reservation_price.toMoney(2));
	
	reservation.total_price = total_amount;
}


});

/* Util functions */


function locale_date(dt){
	ndt = month_names[dt.getMonth()+1] + " "+ dt.getDate() + ", "+ dt.getFullYear();
	if (jQuery("html").attr("lang") == "es-ES"){
		ndt = dt.getDate() + " de "+month_names[dt.getMonth()+1]  + " de "+ dt.getFullYear();
	}
	return ndt;
}


Number.prototype.toMoney = function(decimals, decimal_sep, thousands_sep){ 
   var n = this,
   c = isNaN(decimals) ? 0 : Math.abs(decimals), //if decimal is zero we must take it, it means user does not want to show any decimal
   d = decimal_sep || ',', //if no decimal separator is passed we use the dot as default decimal separator (we MUST use a decimal separator)
   t = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep, 
   sign = (n < 0) ? '-' : '',
   i = parseInt(n = Math.abs(n).toFixed(c)) + '', 

   j = ((j = i.length) > 3) ? j % 3 : 0; 
   return sign + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : '') +"&nbsp;€"; 
}


function __(t){
	var arr_textos = t.split("|");
	var general_lang_code = jQuery("html").attr("lang");
	switch (general_lang_code){
		case "es-ES":
			resultado_seleccionado = arr_textos[0];
			break;
		case "en-US":
			resultado_seleccionado = (arr_textos[1]!=undefined)? arr_textos[1] : arr_textos[0];
			break;
		case "de-DE":
			resultado_seleccionado = (arr_textos[2]!=undefined)? arr_textos[2] : arr_textos[0];
			break;
		case "ru-RU":
			resultado_seleccionado = (arr_textos[3]!=undefined)? arr_textos[3] : arr_textos[0];
			break;
		case "fr-FR":
			resultado_seleccionado = (arr_textos[4]!=undefined)? arr_textos[4] : arr_textos[0];
			break;
		default:
			resultado_seleccionado = arr_textos[1];
			break;	
	} 
	return resultado_seleccionado;
}
/* Util variables */

/*
DE
|Januar
|Mai
|September
|Februar
|Juni
|Oktober
|März
|Juli
|November
|April
|August
|Dezember
|
|RU
|январь
|может
|сентябрь
|февраль
|июнь
|октября
|март
|июль
|ноябрь
|апреля
|август
|декабрь
|
|FR
|
|janvier
|mai
|septembre
|février
|juin
|octobre
|mars
|juillet
|novembre
|avril
|août
|décembre
	*/
var month_names = ["", __("Enero|January|Januar|январь|janvier"), __("Febrero|February|Februar|февраль|février"), __("Marzo|March|März|март|mars"), __("Abril|April|April|апреля|avril"), __("Mayo|May|Mai|может|mai"), __("Junio|June|Juni|июнь|juin"),  __("Julio|July|Juli|июль|juillet"), __("Agosto|August|August|август|août"), __("Septiembre|September|September|сентябрь|septembre"), __("Octubre|October|Oktober|октября|octobre"), __("Noviembre|November|November|ноябрь|novembre"), __("Diciembre|December|Dezember|декабрь|décembre")];
var room_codes = ["ADAPT", "DE", "DEJC", "DEVJ", "DEVM", "GRAN", "GRVJ", "PRES", "ROYAL", "SUP", "SUPJC", "SUPVJ", "SUPVM", "GAR", "PREM", "PEN"];
var cache_availability = {};
var cache_prices;

function show_reservation_button_allsite(){
	var rb = jQuery("<a href='"+reservations_url+"' class='sticky-booking-btn'>"+__("Reservar|Reservations|Reservations|Reservations|Réservations|Reservations|Reservations")+"</a>");
	jQuery("body").append(rb);
}
function sha_get_programme_name(){
	if (r.people[0].programme_name != undefined){
		return r.people[0].programme_name;
	} else {
		return "";
	}
}