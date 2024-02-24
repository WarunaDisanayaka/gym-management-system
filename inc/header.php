<?php
session_start();

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION["id"]);
}

?>
<!-- Header Start -->
<nav class="navbar navbar-expand-lg navigation fixed-top" id="navbar">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">
			<h2 class="text-white text-capitalize"></i>AJ<span class="text-color">GYM</span></h2>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsid"
			aria-controls="navbarsid" aria-expanded="false" aria-label="Toggle navigation">
			<span class="ti-view-list"></span>
		</button>
		<div class="collapse text-center navbar-collapse" id="navbarsid">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">Pages.</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="about.php">About</a></li>
						<li><a class="dropdown-item" href="trainer.php">Trainer</a></li>
						
					</ul>
				</li>
				<li class="nav-item"><a class="nav-link" href="service.php">Services</a></li>
				<li class="nav-item"><a class="nav-link" href="pricing.php">Memebership</a></li>
				<li class="nav-item"><a class="nav-link" href="doctors.php">Doctors</a></li>
				<li class="nav-item"><a class="nav-link" href="products.php">Equipments</a></li>
				<li class="nav-item"><a class="nav-link" href="classes.php">Classes</a></li>


				<li class="nav-item dropdown">
					
					
				</li>
				<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
				<li class="nav-item">
                    <?php if (isLoggedIn()) : ?>
                        <a class="nav-link" href="logout.php">Logout</a>
                    <?php else : ?>
                        <a class="nav-link" href="login.php">Login</a>
                    <?php endif; ?>
                </li>			</ul>
			<div class="my-md-0 ml-lg-4 mt-4 mt-lg-0 ml-auto text-lg-right mb-3 mb-lg-0">
				<a href="tel:+23-345-67890">
					<h3 class="text-color mb-0"><i class="ti-mobile mr-2"></i>0716846739</h3>
				</a>
			</div>
		</div>
	</div>
</nav>
