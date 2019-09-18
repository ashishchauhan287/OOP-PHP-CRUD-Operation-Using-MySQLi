<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>OOP PHP CRUD Operation</title>
	</head>
<body>
	<nav class = "navbar navbar-default">
		<div class = "container-fluid">
			<a class = "navbar-brand" href = "https://www.sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class = "row">	
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well">
			<h3 class = "text-primary">OOP PHP CRUD Operation Using MySQLi - Part 2</h3>
			<hr style = "border-top:1px dotted #000;"/>
			<form method  = "POST" class = "form-inline" action = "create.php">
				<div class = "form-group">
					<label>Firstname:</label>
					<input type  = "text" id = "firstname" name = "firstname" class = "form-control" required = "required"/>
				</div>
				<div class = "form-group">
					<label>Lastname:</label>
					<input type  = "text" id = "lastname" name = "lastname" class = "form-control" required = "required"/>
				</div>
				<div class = "form-group">
					<button name = "save" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add</button>
				</div>
			</form>
			<br />
			<table class = "table table-bordered alert-warning table-hover">
				<thead>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
					require 'class.php';
					$conn = new db_class();
					$read = $conn->read();
					while($fetch = $read->fetch_array()){ 
				?>
					<tr>
						<td><?php echo $fetch['firstname']?></td>
						<td><?php echo $fetch['lastname']?></td>
						<td><center><a class = "btn btn-warning update_mem_id" data-toggle = "modal" data-target = "#update_modal" name = "<?php echo $fetch['mem_id']?>"><span class = "glyphicon glyphicon-edit"></span> Update</a> | <a class = "btn btn-danger del_mem_id" name = "<?php echo $fetch['mem_id']?>" data-toggle = "modal" data-target="#del_modal"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
					</tr>
				<?php
					}
				?>	
				</tbody>
			</table>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
		<center><h4 class = "text-danger">Are you sure you want to delete this record?</h4></center>
      </div>
      <div class="modal-footer">
        <button type = "button" class="btn btn-warning" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> No</button>
        <button type = "button" class="btn btn-danger del_mem"><span class = "glyphicon glyphicon-trash"></span> Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h3 class = "text-success modal-title">Update Member</h3>
		</div>
		<form method = "POST" action = "update_mem_query.php">
		<div class="modal-body update">
			
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" name = "update"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		
		//Delete
		$('.del_mem_id').on('click', function(){
			$mem_id = $(this).attr('name');
			$('.del_mem').on('click', function(){
				window.location = "delete_mem.php?mem_id=" + $mem_id;
			});
		});
		
		//Update
		$('.update_mem_id').on('click', function(){
			$mem_id = $(this).attr('name');
			$('.update').load('mem_data.php?mem_id=' + $mem_id);
		});
	});
</script>
</html>