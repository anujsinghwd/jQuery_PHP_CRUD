<!DOCTYPE html>
<html ng-app="userApp">
<head>
	<title>Welcome User</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">

</head>
<body>

  <nav class="nav-extended">
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#test1" id="add_u">Add New User</a></li>
        <li class="tab"><a href="#test2">Edit User Data</a></li>
      </ul>
    </div>
  </nav>
	<div class="container">
	<div id="test1">
		<div class="row">
			<div class="col s12 m12 l2"></div>
			<div class="col s12 m12 l8">
				<div class="card">
					<div class="card-content">
						<span class="card-title center">Enter User Information</span>
							<br>
								<div class="row">
								<p class="center red-text" id="headerr"></p>
						        <div class="input-field col s12">
						          <input type="text" id="name" class="validate"/>
						          <label for="name">Name</label>
						          <p class="red-text"></p>
						        </div>
						      </div>
						      <div class="row">
						       <div class="input-field col s12">
						          <input id="email" type="email" class="validate"/>
						          <label for="email">Email</label>
						          <p class="red-text" id="emailerr"></p>
						        </div>
						      </div>
						      <div class="row">
						      <div class="input-field col s12">
						          <input type="text" id="phone" class="validate"/>
						          <label for="mobile">Mobile Number</label>
						          <p class="red-text" id="mobileerr"></p>
						        </div>
							</div>
							<div class="row center">
								<button class="btn waves-effect waves-light" id="submit">Submit
							  </button>
							</div>	
					</div>
				</div>
			</div>
			<div class="col s12 m12 l2"></div>
		</div>
		</div>
		<div id="test2">
			<div class="col s12 m12 l2"></div>
			<div class="col s12 m12 l8" id="info_cont">
					<?php 
						require 'PHP/connection.php';
						$sql = "SELECT *FROM user_data";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						?>
							<table class="striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
						<?php	
							while($row = $result->fetch_assoc()) {
								?>
									<tr>
										<td> <?php echo $row['name']; ?></td>
										<td> <?php echo $row['email']; ?> </td>
										<td> <?php echo $row['mobile']; ?> </td>
										<td> <button class="waves-effect waves-light btn" type="button" onClick="selectId('<?php echo $row['name']; ?>');">Edit</button></td>
										<td> <button class="waves-effect waves-light btn red" type="button" onClick="delId('<?php echo $row['id']; ?>');">Delete</button></
									</tr>
								<?php
							}
						}
					?>
				</tbody>
			</table>	
			</div>
			<div class="col s12 m12 l2"></div>
		</div>
<br>
	 <!-- Modal Structure -->
  <div id="modal1">
  <div class="card">
    <div class="card-content">
      <h5 class="center">Edit Your Info</h5>
      <div class="row">
      	<p id="row_id" hidden="true"></p>
      </div>
      <div class="row">
      	<input type="text" id="name1" value=""/>
      </div>
      <div class="row">
      	<input type="text" id="email1" value=""/>
      </div>
      <div class="row">
      	<input type="text" id="mobile1" value=""/>
      </div>
    </div>
    <div class="card-action">
  	<a onclick="save_md();" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>		
      <a onclick="hide_md();" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
   </div> 
  </div>

	</div>

	 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
	<script src="js/init.js"></script>

	 
</body>
</html>