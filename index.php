<?php
include('glava.php');
include('povezava.php');
?>
		<div id="preloader">
			<img src="img/preloader.gif" alt="Preloader">
		</div>
		<!-- end preloader -->
		<section id="slider">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
				<!-- Indicators bullet -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<!-- End Indicators bullet -->				
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					
					<!-- single slide -->
					<div class="item active" style="background-image: url(img/tipkovnica.jpeg);">
					<?php
							if (isset($_GET['success_Login'])) {
							?>
								<div class="alert alert-success" id="msg_error" role="alert" style="margin-top:50px;">Uspešno ste prijavljeni z emailom <?php $_SESSION['emailu'] ?></div>
								<script>
									setTimeout(function() {
										var msg = document.getElementById("msg_error");
										msg.parentNode.removeChild(msg);
									}, 3000);
								</script>
							<?php
							}
						?>	
						<div class="carousel-caption">
							<h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated"> <strong>GAMEJAM</strong></h2>
							<h3 data-wow-duration="1000ms" class="wow slideInLeft animated"><span>Tekmovanje, kjer se bodo tekmovalci pomerili v izdelovanju iger! </span></h3>
							<p data-wow-duration="1000ms" class="wow slideInRight animated">Najboljše 3 čakajo tudi zanimive nagrade.</p>
						</div>
					</div>
					<!-- end single slide -->
					
					<!-- single slide -->
					<div class="item" style="background-image: url(img/banner.jpeg);">
						<div class="carousel-caption">
							<h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated"><span> Kako se prijavim ?</span></h2>
							<h3 data-wow-duration="500ms" class="wow slideInLeft animated"><span>Vse pomembne podatke lahko najdeš v <a href = "#works" > KAKO PRIJAVITI EKIPO ? </a>oddelku.</span></h3>
							<p data-wow-duration="500ms" class="wow slideInRight animated">Veselimo se vaše inovativnosti in novih iger :)</p>
						</div>
					</div>
					<div class="item" style="background-image: url(img/pct.jpeg);">
						<div class="carousel-caption">
							<h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated" style="color:black;"><span> Vstop za pogoj!</span></h2>
							<h3 data-wow-duration="500ms" class="wow slideInLeft animated" style="color:red;"><span>Po pravilih NIJZ morate za vstop na Gamejam izpolnjevati pogoj PCT</span></h3>
							<p data-wow-duration="500ms" class="wow slideInRight animated" style="color:black;">Prosimo vas za sodelovanje.</p>
						</div>
					</div>
					<!-- end single slide -->
					
				</div>
				<!-- End Wrapper for slides -->
				
			</div>
		</section>
		
        <!--
        End Home SliderEnd
        ==================================== -->
		
        <!--
        Features
        ==================================== -->
		
		<section id="features" class="features">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2>Kje, kdaj, kdo ?</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>

					<!-- service item -->
					<div class="col-md-4 wow fadeInLeft" data-wow-duration="500ms">
						<div class="service-item">							
							<div class="service-desc">
								<h3>KJE ?</h3>
								<p>Dogodek bo potekal v naši šoli (Šolski center Velenje) in sicer v Spodnji dvorani Gaudeamusa.</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
					
					<!-- service item -->
					<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
						<div class="service-item">							
							<div class="service-desc">
								<h3>KDAJ ?</h3>
								<p>Vse skupaj bi se dogajalo 24.2.2022 in sicer ob 13:00 uri. Dogodek bi se zaključil 25.2.2022 okoli 12:00 ure.</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
					
					<!-- service item -->
					<div class="col-md-4 wow fadeInRight" data-wow-duration="500ms"  data-wow-delay="900ms">
						<div class="service-item">							
							<div class="service-desc">
								<h3>KDO ?</h3>
								<p>Vabljeni ste vsi dijaki našega šolskega centra. V <a href = "Register/registracija.php" style = "color: #6CB670"> registraciji </a>imate možnost izbire oddelka. Obklukate tudi ali imate svoj računalnik ali ne.</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
						
				</div>
			</div>
		</section>
		
        <!--
        End Features
        ==================================== -->
		
		
        <!--
        Our Works
        ==================================== -->
		
		<section id="works" class="works clearfix">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center">
						<h2>Kako prijaviti ekipo ?</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="sec-sub-title text-center">
						<p>Za prijavo ekipe moraš imeti prvo svoj račun. Da si ga lahko narediš klikneš na <a href = "registracja.php" style = "color: #6CB670">register.</a> Potem pa najdeš v zgornjem desnem kotu opcijo za registracijo ekipe. Tisti ki prijavi ekipo je tudi "leader" te ekipe. </p>
					</div>
					
				</div>
					<div class="row">
					<div class="sec-title text-center">
						<h2>Sponzorji</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="sec-sub-title text-center">
						<p>Tukaj logoti sponzorjev.</p>
					</div>
					
				</div>
			</div>
			
			<div class="project-wrapper">
			</div>
		

		</section>
		
        <!--
        End Our Works
        ==================================== -->
		
        <!--
        Meet Our Team
        ==================================== -->		
		
        <!--
        End Meet Our Team
        ==================================== -->
		
		<!--
        Some fun facts
        ==================================== -->		
		
		
        <!--
        End Some fun facts
        ==================================== -->
		
		
		<!--
        Contact Us
        ==================================== -->		
		
		<section id="contact" class="contact">
			<div class="container">
				<div class="row mb50">
					
					<!-- contact address -->
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInLeft animated" data-wow-duration="500ms">
						<div class="contact-address">
							<h3>Za dodatne infromacije nas lahko kontaktirate tu.</h3>
							<p>Velenje, Slovenija</p>
							<p>Telefonska številka (041-992-334)</p>
						</div>
					</div>
					<!-- end contact address -->
					
					<!-- contact form -->
					<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="contact-form">
							<h3>Napišite nam Email</h3>
							<form action="process.php" id="contact-form">
								<div class="input-group name-email">
									<div class="input-field">
										<input type="text" name="name" id="name" placeholder="Name" class="form-control">
									</div>
									<div class="input-field">
										<input type="email" name="email" id="email" placeholder="Email" class="form-control">
									</div>
								</div>
								<div class="input-group">
									<textarea name="message" id="message" placeholder="Message" class="form-control"></textarea>
								</div>
								<div class="input-group">
									<input type="submit" id="form-submit" class="pull-right" value="Send message">
								</div>
							</form>
						</div>
					</div>
					<!-- end contact form -->				
				</div>
			</div>		
		</section>
				
        <!--
        End Contact Us
        ==================================== -->
	

		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- jquery.mixitup.min -->
        <script src="js/jquery.mixitup.min.js"></script>
		<!-- jquery.parallax -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countTo -->
        <script src="js/jquery-countTo.js"></script>
		<!-- jquery.appear -->
        <script src="js/jquery.appear.js"></script>
		<!-- Contact form validation -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
		<!-- Google Map -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
		<!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
		<!-- jquery easing -->
        <script src="js/wow.min.js"></script>
		<script>
			var wow = new WOW ({
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       120,          // distance to the element when triggering the animation (default is 0)
				mobile:       false,       // trigger animations on mobile devices (default is true)
				live:         true        // act on asynchronously loaded content (default is true)
			  }
			);
			wow.init();
		</script> 
		<!-- Custom Functions -->
        <script src="js/custom.js"></script>
		
		<script type="text/javascript">
			$(function(){
				/* ========================================================================= */
				/*	Contact Form
				/* ========================================================================= */
				
				$('#contact-form').validate({
					rules: {
						name: {
							required: true,
							minlength: 2
						},
						email: {
							required: true,
							email: true
						},
						message: {
							required: true
						}
					},
					messages: {
						name: {
							required: "come on, you have a name don't you?",
							minlength: "your name must consist of at least 2 characters"
						},
						email: {
							required: "no email, no message"
						},
						message: {
							required: "um...yea, you have to write something to send this form.",
							minlength: "thats all? really?"
						}
					},
					submitHandler: function(form) {
						$(form).ajaxSubmit({
							type:"POST",
							data: $(form).serialize(),
							url:"process.php",
							success: function() {
								$('#contact-form :input').attr('disabled', 'disabled');
								$('#contact-form').fadeTo( "slow", 0.15, function() {
									$(this).find(':input').attr('disabled', 'disabled');
									$(this).find('label').css('cursor','default');
									$('#success').fadeIn();
								});
							},
							error: function() {
								$('#contact-form').fadeTo( "slow", 0.15, function() {
									$('#error').fadeIn();
								});
							}
						});
					}
				});
			});
		</script>

<?php
require('noga.php');
?>