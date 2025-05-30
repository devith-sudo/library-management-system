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
<link rel="stylesheet" href="css/dashboard.css" />
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<script src="js/publisher.js"></script>
</head>
<body>
	
	<div class="container-fluid">
	<?php include('top_menus.php'); ?>
		<div class="row row-offcanvas row-offcanvas-left">
			<?php include('left_menus.php'); ?>
			<div class="col-md-9 col-lg-10 main"> 
			<h2>Publisher List</h2> 
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10">
						<h3 class="panel-title"></h3>
					</div>
					<div class="col-md-2" align="right">
						<button type="button" id="addPublisher" class="btn btn-info" title="Add publisher"><span class="glyphicon glyphicon-plus">Add</span></button>
					</div>
				</div>
			</div>
			<table id="publisherListing" class="table table-striped table-bordered">
				<thead>
					<tr>						
						<th>Sn.</th>					
						<th>Name</th>					
						<th>Status</th>											
						<th></th>
						<th></th>					
					</tr>
				</thead>
			</table>				
			</div>
		</div>		
		<div id="publisherModal" class="modal fade">
			<div class="modal-dialog">
				<form method="post" id="publisherForm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"></button>
							<h4 class="modal-title"><i class="fa fa-plus"></i> Edit publisher</h4>
						</div>
						<div class="modal-body">						
							
							<div class="form-group">							
								<label for="publisher" class="control-label">Publisher</label>							
								<input type="text" name="name" id="name" autocomplete="off" class="form-control" placeholder="publisher name"/>
												
							</div>
							
							<div class="form-group">
								<label for="status" class="control-label">Status</label>							
								<select class="form-control" id="status" name="status"/>
									<option value="">Select</option>							
									<option value="Enable">Enable</option>
									<option value="Disable">Disable</option>								
								</select>							
							</div>				
							
											
						</div>
						<div class="modal-footer">
							<input type="hidden" name="publisherid" id="publisherid" />					
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

