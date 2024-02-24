<?php include('db_connect.php');?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Orders Information</b>
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
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Product Price</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $orders = $conn->query("SELECT o.*, m.username FROM orders o JOIN member m ON o.user_id = m.id");
                                while($row = $orders->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td class="text-center"><?php echo $row['username'] ?></td>
                                    <td class="text-center"><?php echo $row['product_name'] ?></td>
                                    <td class="text-center"><?php echo $row['product_price'] ?></td>
                                    <td class="text-center"><?php echo $row['full_name'] ?></td>
                                    <td class="text-center"><?php echo $row['email'] ?></td>
                                    <td class="text-center"><?php echo $row['created_at'] ?></td>
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
<script>
	function _reset(){
		$('#manage-package').get(0).reset()
		$('#manage-package input,#manage-package textarea').val('')
	}
	$('#manage-package').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_product',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_package').click(function(){
		start_load()
		var cat = $('#manage-package')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='product']").val($(this).attr('data-package'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='amount']").val($(this).attr('data-amount'))
		end_load()
	})
	$('.delete_product').click(function(){
		_conf("Are you sure to delete this package?","delete_product",[$(this).attr('data-id')])
	})
	function delete_product($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_product',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>