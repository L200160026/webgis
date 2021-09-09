<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>LOGIN</title>

		<link rel="stylesheet" href="<?php echo base_url('assets/login/login.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/flipclock/flipclock.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/login/roboto.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/login/font-awesome.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')?>">

		<script src="<?php echo base_url('assets/gentelella/vendors/jquery/dist/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets/flipclock/flipclock.js')?>"></script>
        <style>
            @media only screen and (max-width: 360px) {
                .clock { margin: 0 auto; display: block; width: 100%; }

                .flip-clock-wrapper ul { height: 35px; line-height: 35px; margin:2px; width: 24px !important;}
                .flip-clock-wrapper ul li a div.up:after { top: 16px; }
                .flip { width: 24px !important; }
                .flip-clock-divider { height: 35px; width: 10px !important;}
                .flip-clock-dot { height: 4px; width: 4px; left: 2px !important;}
                .flip-clock-dot.top { top: 12px; }
                .flip-clock-dot.bottom { bottom: 6px; }

                .flip-clock-divider .flip-clock-label { font-size: 11px !important; }
                .flip-clock-divider.days .flip-clock-label { right: -42px !important; }
                .flip-clock-divider.hours .flip-clock-label { right: -42px !important; }
                .flip-clock-divider.minutes .flip-clock-label { right: -48px !important; }
                .flip-clock-divider.seconds .flip-clock-label { right: -50px !important; }
                .flip-clock-wrapper ul li { line-height: 35px; }
                .flip-clock-wrapper ul { width: 24px !important; }
                .flip-clock-wrapper ul li a div div.inn { font-size: 21px; }
            }

            @media only screen and (min-width: 361px) and (max-width: 480px) {
                .clock { margin: 0 auto; display: block; width: 100%; }

                .flip-clock-wrapper ul { height: 35px; line-height: 35px; margin:2px; width: 30px !important;}
                .flip-clock-wrapper ul li a div.up:after { top: 16px; }
                .flip { width: 30px; }
                .flip-clock-divider { height: 35px; width: 15px;}
                .flip-clock-dot { height: 4px; width: 4px; left: 4px !important;}
                .flip-clock-dot.top { top: 12px; }
                .flip-clock-dot.bottom { bottom: 6px; }

                .flip-clock-divider .flip-clock-label { font-size: 11px !important; }
                .flip-clock-divider.days .flip-clock-label { right: -46px !important; }
                .flip-clock-divider.hours .flip-clock-label { right: -46px !important; }
                .flip-clock-divider.minutes .flip-clock-label { right: -55px !important; }
                .flip-clock-divider.seconds .flip-clock-label { right: -55px !important; }
                .flip-clock-wrapper ul li { line-height: 35px; }
                .flip-clock-wrapper ul { width: 26px; }
                .flip-clock-wrapper ul li a div div.inn { font-size: 21px; }
            }

            @media screen and (min-width: 481px) and (max-width: 767px) {
                .clock { margin: 0 auto; display: block; width: 100%; }

                .flip-clock-wrapper ul { height: 50px; line-height: 50px; }
                .flip-clock-wrapper ul li a div.up:after { top: 24px; }
                .flip-clock-divider { height: 50px; }
                .flip-clock-dot { height: 6px; width: 6px; left: 7px;}
                .flip-clock-dot.top { top: 17px; }
                .flip-clock-dot.bottom { bottom: 8px; }

                .flip-clock-divider .flip-clock-label { font-size: 11px; }
                .flip-clock-divider.days .flip-clock-label { right: -58px; }
                .flip-clock-divider.hours .flip-clock-label { right: -58px; }
                .flip-clock-divider.minutes .flip-clock-label { right: -64px; }
                .flip-clock-divider.seconds .flip-clock-label { right: -64px; }
                .flip-clock-wrapper ul li { line-height: 50px; }
                .flip-clock-wrapper ul { width: 37px; }
                .flip-clock-wrapper ul li a div div.inn { font-size: 30px; }
            }
        </style>
	</head>

	<body id="lockscreen">
        <div id="particles-js"></div>

		<div class="center">
			<div class="clock" style="margin-top:6em;"></div>

			<div class="modal-dialog modal-login">
				<div class="modal-content">
					<div class="modal-header">
						<div class="avatar">
							<img src="<?php echo base_url('assets/images/logo/LogoKotaSurakarta.png') ?>" alt="Logo" style="height: 100%;width: 100%;">
						</div>
								
						<h4 class="modal-title">Admin Login</h4>	
					</div>

					<div class="modal-body">
          <form action="<?php echo site_url('admin/home')?>" method="post">
							<div class="form-group">
								<input type="text" class="form-control" name="_username_" id="_username_" value="<?php echo set_value('_username_'); ?>" placeholder="Username" minlength="5" maxlength="12" required="required">		
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="_password_" id="_password_" value="<?php echo set_value('_password_'); ?>" placeholder="Password"  minlength="5" maxlength="20" required="required">	
							</div>        
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
							</div>
						</form>
					</div>

					<div class="modal-footer">
						<p></p>
					</div>
				</div>
			</div>
    </div>
        

    <script src="<?php echo base_url('assets/particles/particles.js')?>"></script>
    <script src="<?php echo base_url('assets/particles/demo/js/app.js')?>"></script>
    <script src="<?php echo base_url('assets/particles/demo/js/lib/stats.js')?>"></script>
    <!-- Sweet Alert -->
    <script src="<?php echo base_url('assets/sweetalert/dist/sweetalert2.all.min.js')?>"></script>

		<script type="text/javascript">
			var clock;
			
			$(document).ready(function() {
        var notif = {
          type:"<?php if(isset($notif["type"])) { echo $notif["type"]; } ?>", 
          message:"<?php if(isset($notif["message"])) { echo $notif["message"]; } ?>"
        };
        if (notif.type == "error" && notif.message != "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: notif.message
          })
        } else if(notif.type == "success" && notif.message != ""){
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            html: notif.message
          })
        }
			});

      clock = $('.clock').FlipClock({
        clockFace: 'TwentyFourHourClock'
      });

      $(function() {
          $(".center").center();
          $(window).resize(function() {
              $(".center").center();
          });
      });

      /* CENTER ELEMENTS IN THE SCREEN */
      jQuery.fn.center = function() {
          this.css("position", "absolute");
          this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                  $(window).scrollTop()) - 30 + "px");
          this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                  $(window).scrollLeft()) + "px");
          return this;
      }
      particlesJS("particles-js", 
        {
          "particles": {
            "number": {
            "value": 80,
            "density": {
                "enable": true,
                "value_area": 800
            }
            },
            "color": {
            "value": "#ffffff"
            },
            "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000"
            },
            "polygon": {
                "nb_sides": 6
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
            },
            "opacity": {
            "value": 0.3,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
            },
            "size": {
            "value": 30,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 10,
                "size_min": 40,
                "sync": false
            }
            },
            "line_linked": {
            "enable": false,
            "distance": 200,
            "color": "#ffffff",
            "opacity": 1,
            "width": 2
            },
            "move": {
            "enable": true,
            "speed": 8,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
            }
          },
          "interactivity": {
            "detect_on": "canvas",
            "events": {
            "onhover": {
                "enable": false,
                "mode": "repulse"
            },
            "onclick": {
                "enable": false,
                "mode": "push"
            },
            "resize": true
            },
            "modes": {
            "grab": {
                "distance": 400,
                "line_linked": {
                "opacity": 1
                }
            },
            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
            },
            "repulse": {
                "distance": 200,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
            }
          },
          "retina_detect": true
        }
      );
		</script>

	</body>
</html>                            