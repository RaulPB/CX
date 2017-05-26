<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>TimeLog - Coming Soon Template</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700' rel='stylesheet' type='text/css'>
	
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link rel="stylesheet" href="timelog/style.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>	
	<script type="text/javascript" src="timelog/js/supersized.3.2.7.min.js"></script>
	<script type="text/javascript" src="timelog/js/jquery.countdown.js"></script>
		
	<script type="text/javascript">
	

		$(window).load(function() { // makes sure the whole site is loaded
			$("#status").fadeOut(); // will first fade out the loading animation
			$("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
		})

		jQuery(function($){
			$.supersized({
			
				// Functionality
				slide_interval      :   10000,	// Length between transitions
				transition          :   1, 		// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
				transition_speed	:	700,	// Speed of transition
														   
				slides 		:  	[			// Slideshow Images - make sure the last item doesn`t have a comma after it. It might ruin your day :)
								{image : 'images/slide1.jpg'},
								{image : 'images/slide2.jpg'}
								]
				
			});
		});

		jQuery(document).ready(function() {			
		// cowntdown function. Set the date by modifying the date in next line (June 1, 2012 00:00:00):
			var austDay = new Date("December 01, 2016 00:00:00");
				
				$('#countdown').countdown({
					until: austDay, 
					layout: '<div class="cd-item"><span class="cd-number">{dn}</span> <span class="cd-word">{dl}</span></div> <div class="cd-item"><span class="cd-number">{hn}</span> <span class="cd-word">{hl}</span></div><div class="cd-item"><span class="cd-number">{mn}</span> <span class="cd-word">{ml}</span></div> <div class="cd-item last-cd"><span class="cd-number">{sn}</span> <span class="cd-word">{sl}</span></div>'
				});
				
				$('#year').text(austDay.getFullYear());
		});	
	</script>
</head>
<body>

	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>

	<div id="wrapper"></div>
	
	<div class="content-wrapper">			
	
		<img class="logo" src="images/ifiix_opt.jpg" alt="logo" />
		<h1>Este módulo esta en construcción, pero proximamente estará disponible</h1>
		
		<div class="separator"></div>
		
		<p>Estamos realizando algunos ajustes para que tengas la mejor experiencia</p>
		
		<div class="space"></div>
		
		<p>Estaremos disponibles en poco tiempo:</p>

		<div id="countdown"></div>			

	</div>
	
	<div id="footer">
		<ul class="social">
			<!-- Here you can add your social links. Go to http://fontawesome.io/icons/#brand to add more of these  -->
		</ul>
	

		
		<a class="credits" href="http://www.ourtuts.com/">&copy;</a>

	</div>
</body>
</html>