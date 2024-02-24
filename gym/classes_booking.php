<?php include('db_connect.php');?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Class Bookings</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <colgroup>
                                <col width="5%">
                                <col width="20%">
                                <col width="20%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Class Name</th>
                                    <th class="text-center">Booking Date</th>
                                    <th class="text-center">Booking Time</th>
                                    <th class="text-center">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $classBookings = $conn->query("SELECT cb.*, m.username FROM class_bookings cb JOIN member m ON cb.member_id = m.id");
                                while($row = $classBookings->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td class="text-center"><?php echo $row['username'] ?></td>
                                    <td class="text-center"><?php echo $row['class_name'] ?></td>
                                    <td class="text-center"><?php echo $row['booking_date'] ?></td>
                                    <td class="text-center"><?php echo $row['booking_time'] ?></td>
                                    <td class="text-center"><?php echo $row['phone'] ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>    
</div>


<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
