<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="copyright">
						<p><small>&copy; 1989 Speedo Tours. <br> All Rights Reserved. <br>
						Designed by <a href="http://freehtml5.co" target="_blank">FreeHTML5.co</a> </small>
						<br><small>Developed by MIU CSC Students</small>
						</p>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-3">
							<h3>Company</h3>
							<ul class="link">
								<li><a href="blog.php">About Us</a></li>
								<li><a href="hotel.php">Hotels</a></li>
								<li><a href="services.php">Pacakges</a></li>
								<li><a href="contact.php">Contact Us</a></li>
							</ul>
						</div>
						<!-- <div class="col-md-3">
							<h3>Our Facilities</h3>
							<ul class="link">
								<li><a href="#">Resturant</a></li>
								<li><a href="#">Bars</a></li>
								<li><a href="#">Pick-up</a></li>
								<li><a href="#">Swimming Pool</a></li>
								<li><a href="#">Spa</a></li>
								<li><a href="#">Gym</a></li>
							</ul>
						</div> -->
						<div class="col-md-6">
							<h3>Subscribe to our newswire</h3>
							<!-- <p>Sed cursus ut nibh in semper. Mauris varius et magna in fermentum. </p> -->
							<form action="" id="form-subscribe" method="post">
								<div class="form-field">
									<input type="email" name="em" placeholder="Email Address" id="email" required>
									<input type="submit" id="submit" name="submitnews" value="Send">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<!-- <ul class="social-icons">
						<li>
							<a href="#"><i class="icon-twitter-with-circle"></i></a>
							<a href="#"><i class="icon-facebook-with-circle"></i></a>
							<a href="#"><i class="icon-instagram-with-circle"></i></a>
							<a href="#"><i class="icon-linkedin-with-circle"></i></a>
						</li>
					</ul> -->
					<h1 id="fh5co-logo"><img id="LogoImg" src="images\WebAppLogo.png" alt="Flowers in Chania" width="150" height="100"></h1>
					<br><br>
					<span>&nbsp; &nbsp;&nbsp;&nbsp;Speedo Tours </span>
				</div>
			</div>
		</div>

		<?php
			require_once("app/model/subscribe_to_news_wire_model.php");
			require_once("app/controller/SubscibeController.php");
			// require_once("app/view/susbcribeview.php");
			$visitormodel = new subscribe();
			$subscribecontrol = new SubscribeController($visitormodel);
			// $viewsuccess= new Viewalert($subscribecontrol,$visitormodel);
			if (isset($_POST['submitnews']))
			{
				
				$subscribecontrol->subscribe();
				// $viewsuccess->output();
			}
		?>
