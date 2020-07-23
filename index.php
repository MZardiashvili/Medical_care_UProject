<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Health medical project" />
    <meta name="keywords" content="" />
    <meta name="author" content="Zardiashvili Mariami" />
    <title>HealthCare</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="images/Doctor_Mike_Icon.png" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>

    <!-- start of the header -->
    <header>
      <div class="container">
        <div class="top-header">
          <ul>
            <li><a href="#">Emergency Services</a></li>
            <li><a href="#">Appointment</a></li>
            <li><a href="#">healthcare@med.com</a></li>
            <li>
              <img
                src="images/phone-icon.png"
                alt="phone-icon"
                class="phone-icon"
              />
            </li>
            <li>+12 345 678 9892</li>
            <!-- <li><a href="#" class="login-button" id="button">Sign in</a></li> -->
            <li>	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user_profile.png"  style="width:10%;">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div></li>
          </ul>
         

        </div>
        <div class="logo">
          <a href="index.html"><img src="images/logo.png" alt="logo" /></a>
        </div>
        <div class="menu" id="myTopnav">
          <a href="index.html" class="active">home</a>
          <a href="about.html">about</a>
          <a href="doctors.html">doctor</a>
          <a href="services.html">services</a>
          <a href="news.html">news</a>
          <a href="contact.html">contact</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
          <div class="search-container">
            <div class="container">
              <input type="text" placeholder="Search.." name="search" />
              <button type="submit" class="search">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end of the header -->
    <div class="popup">
      <div class="popup-content">
        <img
          src="images/iconfinder_icon-close_211652.png"
          alt="close"
          class="close"
        />
        <img src="images/stock_people.png" alt="user" />
        <input type="text" placeholder="Username" />
        <input type="password" placeholder="Password" />
        <a href="#" class="login-button">Sign in</a>
      </div>
    </div>
    <!-- start of the banner area -->
    <section>
      <div class="container">
        <div class="banner-content">
          <h1>
            Medical Services <br />
            that you can trust
          </h1>
          <h2>stay happy and healthy</h2>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s.
          </p>
          <button class="btn">GET STARTED</button>
        </div>
      </div>
    </section>
    <!-- end of the banner area -->
    <!-- start the services -->
    <div class="services">
      <div class="container">
        <h3>Our Services</h3>
        <h4>to choose from here</h4>
        <div class="grid-container">
          <div class="icons">
            <div class="grid-item">
              <img src="images/icon_1.svg" alt="cardiology" />
              <div class="title">Cardiology</div>
            </div>
            <div class="text">
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some words which
              don't look even slightly believable.
            </div>
          </div>
          <div class="icons">
            <div class="grid-item">
              <img src="images/icon_2.svg" alt="Gastroenterology" />
              <div class="title">Gastroenterology</div>
            </div>
            <div class="text">
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some words which
              don't look even slightly believable.
            </div>
          </div>
          <div class="icons">
            <div class="grid-item">
              <img src="images/icon_3.svg" alt="MedicalLab" class="position" />
              <div class="title">Medical Laboratory</div>
            </div>
            <div class="text">
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some words which
              don't look even slightly believable.
            </div>
          </div>
        </div>
        <div class="btn1">
          <a href="services.html"
            ><span>read more</span><span>read more</span></a
          >
        </div>
      </div>
    </div>

    <!-- end of the services -->
    <!--start of the book appointment-->
    <div id="appointment">
      <div class="form-style-5">
        <form>
          <fieldset>
            <legend>Make an Appointment</legend>
            <input
              type="text"
              name="name"
              placeholder="Your Full Name *"
              required
            />
            <input type="text" name="age" placeholder="Your Age *" />
            <input
              type="tel"
              name="phone"
              placeholder="Phone number *"
              required
            />
            <input type="email" name="mail" placeholder="Your Email *" />
            <input type="date" name="AppointmentDate" required />
            <textarea name="field3" placeholder="Message"></textarea>
            <label for="doctors">Please select your doctor to visit</label>
            <select id="doctors" name="field4">
              <option disabled selected value> -- select a doctor -- </option>
              <option value="1">Mikhail Varshavski</option>
              <option value="2">John Murphy</option>
              <option value="3">Sarah Barnett</option>
              <option value="4">Suzanne M Hess</option>
              <option value="5">Federico A Steiner</option>
              <option value="6">Vickie B Hug</option>
              <option value="7">Rebecca C Yang</option>
              <option value="8">Other</option>
            </select>
          </fieldset>
          <button type="submit" class="btn">Apply</button>
        </form>
      </div>
    </div>
    <!--end of the book appointment-->
    <!-- START OF THE FOOTER -->
    <footer>
      <div class="footer-area">
        <div class="left box">
          <h3>about us</h3>
          <div class="footer-content">
            <div class="about">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum
                illum eum eaque, eius sapiente veniam minus laborum beatae.
                Quisquam, dolores veniam? Alias ipsum suscipit itaque fuga quasi
                odit officiis repellendus?
              </p>
            </div>
          </div>
        </div>
        <div class="center box">
          <h3>We're available</h3>
          <div class="footer-content">
            <ul>
              <li>
                <span>Monday – Thursday</span>
                <span>8.00 – 19.00</span>
              </li>
              <li>
                <span>Friday</span>
                <span>8.00 - 18.30</span>
              </li>
              <li>
                <span>Saturday</span>
                <span>9.30 – 17.00</span>
              </li>
              <li>
                <span>Sunday</span>
                <span>9.30 – 15.00</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="right box">
          <h3><a href="contact.html">Contact US</a></h3>
          <div class="footer-content">
            <form action="#">
              <div class="footer-email">
                <label for="email">Email *</label>
                <input type="email" id="email" required />
              </div>
              <div class="msg">
                <label for="message">Message *</label>
                <textarea
                  id="message"
                  name="message"
                  cols="25"
                  rows="2"
                  required
                ></textarea>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
          <div class="social">
            <ul>
              <li>
                <a href="https://www.facebook.com/" target="_blank"
                  ><img
                    src="images/fb-footer.png"
                    alt="facebook"
                    style="height: 24px; width: 24px;" /></a
                >Facebook
              </li>
              <li>
                <a href="https://twitter.com/explore" target="_blank"
                  ><img
                    src="images/twitter-footer.png"
                    alt="twitter"
                    style="height: 24px; width: 24px;" /></a
                >Twitter
              </li>
              <li>
                <a href="https://www.pinterest.com/" target="_blank"
                  ><img
                    src="images/pinterest-footer.png"
                    alt="pinterest"
                    style="height: 24px; width: 24px;" /></a
                >Pinterest
              </li>
              <li>
                <a href="https://www.linkedin.com/" target="_blank"
                  ><img
                    src="images/In-footer.png"
                    alt="LinkedIn"
                    style="height: 24px; width: 24px;" /></a
                >LinkedIn
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- END OF THE FOOTER -->
  </body>
</html>
