<?php 
	
	$loginVerification = $this->session->userdata('logged_in');

	if (!$loginVerification) 
	{

   	 	redirect("views/index");

	}

	$userID = $this->session->userdata('userID');
	$queryuserinfo = $this->db->query("SELECT * FROM users where userID = {$userID}");
	foreach($queryuserinfo->result() as $rowinfo):

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome &nbsp; <?=$rowinfo->Fname?> </title>
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/tabs.css" type="text/css">
    <script src="<?=base_url()?>bootstrap/js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="<?=base_url()?>bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>
    <script src="<?=base_url()?>https://kit.fontawesome.com/7dc3015a44.js" crossorigin="anonymous"></script>
</head>
<body class="is-desktop is-mobile">
	
	<?php 


		if(isset($_SESSION['error']))
		{
			$error = $_SESSION['error'];
		
	 ?>
	 <script type="text/javascript">
		Swal.fire({
			  title: 'Error',
			  icon: 'error',
			  html:
			    '<b><?=$error?></b',
			  showCloseButton: true,
			  showCancelButton: false,
			  focusConfirm: false
			});
	</script>

	 <?php 


	 	}
	  ?>
	 <nav class="navbar is-info">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?=site_url('views/dashboard')?>">
                    <img src="<?=base_url()?>bootstrap/images/logo_name-light.png" alt="Bulma: a modern CSS framework based on Flexbox" width="132" height="48">
                </a>
                <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-start is-link">
                    <a class="navbar-item" href="<?=site_url('views/dashboard')?>">
                        Home
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="/documentation/overview/start/">
                            
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="<?=site_url('database/logout')?>">
                            	<i class="fa fa-arrow-circle-left"></i> &nbsp;
                                Log-Out
                            </a>
                        </div>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <section class="hero is-info">
            <div class="tabs is-boxed is-centered main-menu" id="nav">
                <ul>
                    <li data-target="pane-1" id="1" class="is-active">
                        <a>
                            <span class="icon is-small"><i class="fa fa-home"></i></span>
                            <span>Home - Your Recipes</span>
                        </a>
                    </li>
                    <li data-target="pane-2" id="2">
                        <a>
                            <span class="icon is-small"><i class="fa fa-book"></i></span>
                            <span>Upload Your Recipes</span>
                        </a>
                    </li>
                    <li data-target="pane-3" id="3">
                        <a>
                            <span class="icon is-small"><i class="fa fa-users"></i></span>
                            <span>Account Manager</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane is-active" id="pane-1">
                    <div class="contaner columns">
                   		<div class="column box is-12">
                   				<h1 class="title is-8 has-text-centered has-text-dark animate__animated animate__fadeInLeft ">
                   				<i class="fa fa-home"></i> My recipes</h1>
                   			<?php 
                   				$myrecipes = $this->db->query("SELECT * FROM recipe WHERE userID = {$userID}");
                   				foreach ($myrecipes->result() as $result) {
                   					
                   				
                   			 ?>
                   			 <div class="tile is-ancestor columns m-3 animate__animated animate__fadeInLeft animate__delay-1s">
						        <div class="tile is-child box is-2">
						          <figure class="image is-64x64 container">
						            <img class="" src="<?=$result->recipe_image?>" alt="">
						          </figure>
						        </div>
						        <div class="tile is-child box is-10 columns">
						        	<div class="column">
						        		<a href="<?=site_url('views/recipe_edit')?>/<?=$result->recipeID?>">
							             <h1 class="title is-4 has-text-link"><u><?=$result->recipe_title?></u></h1>
							            </a>
							             <p><?=$result->recipe_ingredients?></p>
						        	</div>
						            <div class="column">
						            	<a class="button is-danger"href="<?=site_url('database/delete_post')?>/<?=$result->recipeID?>"><i class="fa fa-trash-o"></i>&nbsp;Delete Recipe</a>
						            </div>

						        </div>
						      </div>

                   			 <?php 
                   			 	}
                   			  ?>
                   		</div>
                   </div>
                </div>
                <div class="tab-pane " id="pane-2">
                  <div class="contaner columns">
                   		<div class="column box is-12  has-shadow">
                   			<div class="contaner">
                   					<div class="contaner box scroll animate__animated animate__fadeInLeft">
                   						<h1 class="title is-8 has-text-centered has-text-dark">
                   							<i class="fa fa-book"></i> Upload your Recipes Here</h1>
                   						<?=form_open_multipart('database/post');?>
                   						<?=form_hidden("recipe_date",date("y_m_d H:i:s"))?>
                   							<input type="hidden" name="userID" value="<?=$rowinfo->userID?>">
                   							 <label class="title is-4 has-text-dark" for="img">Select image:</label>
                   							 <br><br>
                   							 <div id="image" class="file has-name is-info">
											  <label class="file-label">
											    <input class="file-input" type="file" name="userfile" accept="image/*" required>
											    <span class="file-cta">
											      <span class="file-icon">
											        <i class="fa fa-upload"></i>
											      </span>
											      <span class="file-label">
											        Choose a file…
											      </span>
											    </span>
											    <span class="file-name">
											      No file uploaded
											    </span>
											  </label>
											</div>

											<script>
											  const fileInput = document.querySelector('#image input[type=file]');
											  fileInput.onchange = () => {
											    if (fileInput.files.length > 0) {
											      const fileName = document.querySelector('#image .file-name');
											      fileName.textContent = fileInput.files[0].name;
											    }
											  }
											</script>
											   <br>
											  	<label class="title is-4 has-text-dark">Recipe information:</label>
											  	<br><br>
											  <div class="field">
											  	<input class="input is-primary" name="recipetitle" type="text" placeholder="Your Recipe Title" required="">
											  </div>
											  <div class="field">
											  	<textarea class="textarea is-primary" name="recipeingredients" placeholder="Recipe ingredients" rows="5" style="resize: none;" required=""></textarea>
											  </div>
											  <div class="field">
											  	<textarea class="textarea is-primary" name="recipeinstructions" placeholder="Recipe instruction" rows="5" style="resize: none;" required=""></textarea>
											  </div> 
											  <br><br>
											  <h1 class="title is-4 has-text-dark"> Select a Category:</h1>
											  <br>
											  <div class="columns is-multiline is-mobile is-centered">
						                        <div class="column button is-info is-one-fifth is-normal">
						                            <input type="checkbox" id="vege" value="Vegetables" onclick="checkboxFunction" placeholder="Vegtables" name="Vegetables">
						                            <label>Vegtables</label>
						                            
						                        </div>
						                        &nbsp;&nbsp;&nbsp;
						                        <div class="column button is-info is-one-fifth is-normal">
						                            <input type="checkbox" id="vege" value="Chicken" onclick="checkboxFunction" placeholder="Vegtables" name="Chicken">
						                            <label>Chicken</label>
						                            
						                        </div>
						                        &nbsp;&nbsp;&nbsp;
						                        <div class="column button pb-2 is-info is-one-fifth is-normal">
						                            <input type="checkbox" id="vege" value="Soup" onclick="checkboxFunction" placeholder="Vegtables" name="Soup">
						                            <label>Soup</label>
						                        </div>
						                    </div>
						                    <br>
						                    <div class="columns is-multiline is-mobile is-centered">
						                        <div class="column button is-info is-one-fifth is-normal">
						                            <input type="checkbox" id="vege" value="Pork" onclick="checkboxFunction" placeholder="Vegtables" name="Pork">
						                            <label>Pork</label>
						                            
						                        </div>
						                        &nbsp;&nbsp;&nbsp;
						                        <div class="column button is-info is-one-fifth is-normal">
						                            <input type="checkbox" id="vege" value="Broth" onclick="checkboxFunction" placeholder="Vegtables" name="Broth">
						                            <label>Broth</label>
						                            
						                        </div>
						                        &nbsp;&nbsp;&nbsp;
						                        <div class="column button is-info is-one-fifth is-normal">
						                            <input type="checkbox" id="vege" value="Beef" onclick="checkboxFunction" placeholder="Vegtables" name="Beef">
						                            <label>Beef</label>
						                        </div>
						                    </div>
						                    <br>
						                    <div class="field buttons is-centered">
						                    	<button class="button is-info is-medium"><i class="fa fa-upload"></i>&nbsp; Upload Recipe</button>  
						                    </div>
						                       							
                   						</form>
                   					</div>
                   			</div>
                   		</div>
                   		<div class="column">
                   			
                   		</div>
                   </div>
            	</div>
                <div class="tab-pane" id="pane-3">
                    <div class="contaner columns">
                   		<div class="column is-1">
                   			
                   		</div>
                   		<div class="column box is-10 container">
                   			<h1 class="title has-text-dark has-text-centered animate__animated animate__fadeInLeft"><i class="fa fa-users"></i>&nbsp; Users List</h1>
                   			<div class="container box p-2 m-2">
                   				<a class="button is-info animate__animated animate__fadeInUp" href="<?=site_url('views/add_user')?>"><i class="fa fa-plus"></i>&nbsp; Add users</a>
                   				<br>
                   				<br>
                   				<center>
                   				<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth animate__animated animate__fadeInRight">
                   					<tr>
                   						<th>First Name</th>
	                   					<th>Middle Initial</th>
	                   					<th>Last name</th>
	                   					<th colspan="2">Actions</th>
                   					</tr>
                   					<?php 
                   							$queryusers = $this->db->query("SELECT * FROM users");
                   							foreach ($queryusers->result() as $rowusers) {
                   								
                   							
                   						 ?>
                   					<tr>
                   						
                   						<td><?=$rowusers->Fname?></td>
                   						<td><?=$rowusers->Mi?></td>
                   						<td><?=$rowusers->Lname?></td>
                   						<td>
                   							<?php 
                   								if(($rowusers->userID) == $userID)
                   								{

                   							 ?>
                   							 <a class="button is-primary" href="<?=site_url('views/update_user')?>/<?=$rowusers->userID?>"><i class="fa fa-upload"></i>&nbsp;Update User</a>

                   							<?php 
                   							 	}
                   							 else
                   							 {
                   							  ?>
                   							
                   							<a class="button is-primary" href="<?=site_url('views/update_user')?>/<?=$rowusers->userID?>"><i class="fa fa-upload"></i>&nbsp;Update User</a> <a class="button is-danger" href="<?=site_url('database/delete_user')?>/<?=$rowusers->userID?>"><i class="fa fa-trash-o"></i>&nbsp;Delete User</a>

                   							<?php 		
                   								}

                   							 ?>
                   						</td>

                   						
                   					</tr>
                   					<?php 

                   							}
                   						 ?>
                   					
                   				</table>
                   				</center>
                   			</div>
                   		</div>
                   		<div class="column is-1">
                   			
                   		</div>
                   </div>
                </div>
        </div>
    </section>
    <script src="<?=base_url()?>bootstrap/js/bulma.js" type="text/javascript"></script>
    <script src="<?=base_url()?>bootstrap/js/tabs.js" type="text/javascript"></script>
</body>
</html>
<?php 
	
	endforeach;
	
 ?>