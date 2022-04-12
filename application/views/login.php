<?php 
  
  $loginVerification = $this->session->userdata('logged_in');

  if ($loginVerification) 
  {

      redirect("views/dashboard");

  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin LogIn</title>
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/animate.min.css" type="text/css">
    <script src="<?=base_url()?>bootstrap/js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="<?=base_url()?>bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>
</head>
<body>
<?php echo validation_errors(); ?>

<?php  
	if(isset($_SESSION['wrongLogIn'])){
		$message = $_SESSION['wrongLogIn'];

?>
<script type="text/javascript">
	Swal.fire({
		  icon: 'error',
		  title: 'Oops... Wrong LogIn',
		  text: 'Something is not Right!',
		  footer: '<p><?php ?></p>'
		});
</script>
<?php
	}
 ?>
<section class="hero is-primary is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-6-tablet is-5-desktop is-4-widescreen box animate__animated animate__fadeInUpBig">
          <?=form_open("database/login")?>
          	<div class="container">
          		<center>
	        		<figure class="image is-128x128">
					  <img class="is-rounded has-background-primary-light" src="<?=base_url()?>bootstrap/images/logo2.png">
					</figure>
					<h1 class="title is-4 has-text-black">Log-In Admin</h1>
				</center>
        	</div>
            <div class="field">
              <label for="" class="label">Email</label>
              <div class="control has-icons-left">
                <input type="email" placeholder="e.g. bobsmith@gmail.com" class="input" name="Username" required>
                <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label for="" class="label">Password</label>
              <div class="control has-icons-left">
                <input type="password" placeholder="*******" class="input" name="Password" required>
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
            </div>
            <div class="field buttons is-centered">
              <button class="button is-success">
              	<i class="fa fa-arrow-circle-right"></i>&nbsp;
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>