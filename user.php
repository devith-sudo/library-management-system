<?php
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {
	header("Location: index.php");
}
include('inc/header4.php');
?>
<title>Dul Devith : Demo Library Management System with PHP & MySQL</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="./css/dashboard.css" />
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<script src="js/user.js"></script>
</head>
<body>
	
	<div class="container-fluid">
	<?php include('top_menus.php'); ?>
		<div class="row row-offcanvas row-offcanvas-left">
			<?php include('left_menus.php'); ?>
			<div class="col-md-9 col-lg-10 main"> 
			<h2>Users</h2>
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10">
						<h3 class="panel-title"></h3>
					</div>
					<div class="col-md-2" align="right">
						<button type="button" id="addUser" class="btn btn-info" title="Add user"><span class="glyphicon glyphicon-plus">Add</span></button>
					</div>
				</div>
			</div>			
			<table id="userListing" class="table table-striped table-bordered">
				<thead>
					<tr>						
						<th>No.</th>					
						<th>Name</th>					
						<th>Email</th>
						<th>Role</th>						
						<th></th>
						<th></th>					
					</tr>
				</thead>
			</table>				
			</div>
		</div>		
		<div id="userModal" class="modal fade">
			<div class="modal-dialog">
				<form method="post" id="userForm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><i class="fa fa-plus"></i> Edit User</h4>
						</div>
						<div class="modal-body">						
							
							<div class="form-group">
								<label for="country" class="control-label">Role</label>							
								<select class="form-control" id="role" name="role"/>
									<option value="">Select Role</option>							
									<option value="admin">Admin</option>
									<option value="user">User</option>								
								</select>							
							</div>
							
							<div class="form-group">							
								<label for="Income" class="control-label">First Name</label>							
								<input type="text" name="first_name" id="first_name" autocomplete="off" class="form-control" placeholder="first name"/>
												
							</div>
							
							<div class="form-group"
								<label for="project" class="control-label">Last Name</label>
								<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" >			
							</div>	

							<div class="form-group"
								<label for="project" class="control-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" >			
							</div>
							
							<div class="form-group"
								<label for="project" class="control-label">New Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="password" >			
							</div>
											
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id" id="id" />						
							<input type="hidden" name="action" id="action" value="" />
							<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

