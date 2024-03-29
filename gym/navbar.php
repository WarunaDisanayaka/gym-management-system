
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=members" class="nav-item nav-members"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Members</a>
				<a href="index.php?page=registered_members" class="nav-item nav-registered_members"><span class='icon-field'><i class="fa fa-id-card"></i></span> Membership Validity</a>
				<a href="index.php?page=schedule" class="nav-item nav-schedule"><span class='icon-field'><i class="fa fa-calendar-day"></i></span> Schedule</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=plans" class="nav-item nav-plans"><span class='icon-field'><i class="fa fa-th-list"></i></span> Plans</a>
				<a href="index.php?page=packages" class="nav-item nav-packages"><span class='icon-field'><i class="fa fa-list"></i></span> Packages</a>
				<a href="index.php?page=trainer" class="nav-item nav-trainer"><span class='icon-field'><i class="fa fa-user"></i></span> Trainers</a>
				<a href="index.php?page=doctors" class="nav-item nav-trainer"><span class='icon-field'><i class="fa fa-user-md"></i></span> Doctors</a>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="index.php?page=products" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-archive" aria-hidden="true"></i></span> Products</a>
				<a href="index.php?page=classes" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-book" aria-hidden="true"></i></span> Classes</a>
				<a href="index.php?page=appointments" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-book" aria-hidden="true"></i></span> Appointments</a>
				<a href="index.php?page=orders" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-book" aria-hidden="true"></i></span> Orders</a>
				<a href="index.php?page=classes_booking" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-book" aria-hidden="true"></i></span> Classes Booking</a>
				<a href="index.php?page=membership_buying" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-book" aria-hidden="true"></i></span> Memberhsip Buying</a>
	
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
