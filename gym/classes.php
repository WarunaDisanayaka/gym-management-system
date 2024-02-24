<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-class">
				<div class="card">
					<div class="card-header">
						    Class Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Class Name</label>
								<input type="text" class="form-control" name="class_name">
							</div>
							<div class="form-group">
								<label class="control-label">Description</label>
								<textarea class="form-control" cols="30" rows='3' name="description"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Time Range</label>
								<input type="text" class="form-control" name="time_range">
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Class List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<colgroup>
								<col width="5%">
								<col width="55%">
								<col width="20%">
								<col width="20%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Class Name</th>
									<th class="text-center">Time Range</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$classes = $conn->query("SELECT * FROM classes order by id asc");
								while($row=$classes->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Class Name: <b><?php echo $row['class_name'] ?></b></p>
										<p>Description: <small><b><?php echo $row['description'] ?></b></small></p>
										
									</td>
									<td class="text-center">
										<b><?php echo $row['time_range'] ?></b>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_class" type="button" data-id="<?php echo $row['id'] ?>" data-class_name="<?php echo $row['class_name'] ?>" data-description="<?php echo $row['description'] ?>" data-time_range="<?php echo $row['time_range'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_class" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
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
		$('#manage-class').get(0).reset()
		$('#manage-class input,#manage-class textarea').val('')
	}
	$('#manage-class').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_class',
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
	$('.edit_class').click(function(){
		start_load()
		var cat = $('#manage-class')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='class_name']").val($(this).attr('data-class_name'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='time_range']").val($(this).attr('data-time_range'))
		end_load()
	})
	$('.delete_class').click(function(){
		_conf("Are you sure to delete this class?","delete_class",[$(this).attr('data-id')])
	})
	function delete_class($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_class',
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
