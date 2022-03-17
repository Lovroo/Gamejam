<style >
	body{ height:100vh; margin:0; }

	/* Trick */
	body{ 
	display:flex; 
	flex-direction:column; 
	}

	footer{
	margin-top:auto; 
	}
</style>
<footer id="footer" class="footer">
			<div class="container">
				<div class="row">
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
						<div class="footer-single">
							<img src="img/gamejam.png" alt="Logo", style="height:50px; width:50px;padding:5px;">
							<p>Gamejam ERŠ 2022</p>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="footer-single">
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
						<div class="footer-single">
							<!--<h6>Socials</h6>
							<ul>
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Google</a></li>
								<li><a href="#">Forum</a></li>
							</ul>-->
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
						<div class="footer-single">
							<h6>Dodatne informacije</h6>
							<ul>
								<li>Več informacij: lovro.napotnik@scv.si</li>
								<li>Za gamejam se lahko prijaviš <a href="prijava.php">tukaj</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
</footer>

		<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>

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
		<script>
/**
 * Single Page Nav Plugin
 * Copyright (c) 2014 Chris Wojcik <hello@chriswojcik.net>
 * Dual licensed under MIT and GPL.
 * @author Chris Wojcik
 * @version 1.2.0
 */
(function(e, t, n, r) {
    "use strict";
    var i = {
        init: function(n, r) {
            this.options = e.extend({}, e.fn.singlePageNav.defaults, n);
            this.container = r;
            this.$container = e(r);
            this.$links = this.$container.find("a");
            if (this.options.filter !== "") {
                this.$links = this.$links.filter(this.options.filter)
            }
            this.$window = e(t);
            this.$htmlbody = e("html, body");
            
            this.didScroll = true;
            this.checkPosition();
            this.setTimer()
        },
        handleClick: function(t) {
            var n = this
              , r = t.currentTarget
              , i = e(r.hash);
            t.preventDefault();
            if (i.length) {
                n.clearTimer();
                if (typeof n.options.beforeStart === "function") {
                    n.options.beforeStart()
                }
                n.setActiveLink(r.hash);
                n.scrollTo(i, function() {
                    if (n.options.updateHash && history.pushState) {
                        history.pushState(null, null, r.hash)
                    }
                    n.setTimer();
                    if (typeof n.options.onComplete === "function") {
                        n.options.onComplete()
                    }
                })
            }
        },
        scrollTo: function(e, t) {
            var n = this;
            var r = n.getCoords(e).top;
            var i = true;
            n.$htmlbody.stop().animate({
                scrollTop: r
            }, {
                duration: n.options.speed,
                easing: n.options.easing,
                complete: function() {
                    if (typeof t === "function" && !i) {
                        t()
                    }
                    i = true
                }
            })
        },
        setTimer: function() {
            var e = this;
            e.$window.on("scroll.singlePageNav", function() {
                e.didScroll = true
            });
            e.timer = setInterval(function() {
                if (e.didScroll) {
                    e.didScroll = false;
                    e.checkPosition()
                }
            }, 250)
        },
        clearTimer: function() {
            clearInterval(this.timer);
            this.$window.off("scroll.singlePageNav");
            this.didScroll = false
        },
        checkPosition: function() {
            var e = this.$window.scrollTop();
            var t = this.getCurrentSection(e);
            this.setActiveLink(t)
        },
			
        setActiveLink: function(e) {
            var t = this.$container.find("a[href$='" + e + "']");
            if (!t.hasClass(this.options.currentClass)) {
                this.$links.removeClass(this.options.currentClass);
                t.addClass(this.options.currentClass)
            }
        },
        getCurrentSection: function(t) {
            var n, r, i, s;
            for (n = 0; n < this.$links.length; n++) {
                r = this.$links[n].hash;
                if (e(r).length) {
                    i = this.getCoords(e(r));
                    if (t >= i.top - this.options.threshold) {
                        s = r
                    }
                }
            }
            return s || this.$links[0].hash
        }
    };
    e.fn.singlePageNav = function(e) {
        return this.each(function() {
            var t = Object.create(i);
            t.init(e, this)
        })
    }
    ;
    e.fn.singlePageNav.defaults = {
        offset: 0,
        threshold: 120,
        speed: 400,
        currentClass: "current",
        easing: "swing",
        updateHash: true,
        filter: "",
        onComplete: true,
        beforeStart: true
    }
}
)(jQuery, window, document)


		</script>
</body>
</html>