<?php 

			 $loginVerification = $this->session->userdata('logged_in');

			  if ($loginVerification) 
			  {

			      redirect("views/dashboard");

			  }

			$Vegetables1 = $_SESSION['Vegetables'];
			$Chicken1 = $_SESSION['Chicken'] ;
			$Beef1 = $_SESSION['Beef'] ;
			$Pork1 = $_SESSION['Pork'];
			$Soup1 = $_SESSION['Soup'];
			$Broth1 = $_SESSION['Broth'];
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Results: <?php echo $Vegetables1." ".$Chicken1." ".$Beef1." ".$Pork1." ".$Soup1." ".$Broth1;?></title>
	<link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/blog.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/OverlayScrollbars.min.css" type="text/css">
    <script src="<?=base_url()?>bootstrap/js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="<?=base_url()?>bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>
</head>
<body>
  <style type="text/css">
    p{
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
  </style>
	<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {

          // Get all "navbar-burger" elements
          const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

          // Check if there are any navbar burgers
          if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
              el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

              });
            });
          }

        });
    </script>
	 <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="<?=site_url('views/index')?>">
          <img src="<?=base_url()?>bootstrap/images/logo_name-light.png" width="112" height="38">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a href="<?=site_url('views/index')?>" class="navbar-item">
            <strong>Home</strong>
          </a>

          <a href="<?=site_url('views/index')?>#about" class="navbar-item">
            <strong>About</strong>
          </a>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
          </div>
        </div>
      </div>
    </nav>
    <div class="container is-fluid box mt-5">
      <div class="container box is-fluid columns animate__animated animate__fadeInLeft">
        <section class="column box is-2">
          <figure class="image is-128x128">
            <img class="" src="<?=base_url()?>bootstrap/images/logo2.png" alt="">
          </figure>
        </section>
        <section class="column is-10 ">
          <h1 class="title">Results:</h1>
          <h2 class="subtitle">
            <strong>Tags: </strong><?php echo $Vegetables1." ".$Chicken1." ".$Beef1." ".$Pork1." ".$Soup1." ".$Broth1;?>
          </h2>
        </section>
      </div>
      <br>
      <hr class="navbar-divider">
      <br>
      <?php 

          if($Vegetables1 == "")
          {
              $cat1 = "";
          }
          else
          {
            $cat1 =  "%".$Vegetables1."%";
          }

          if($Chicken1 == "")
          {
            $cat2 = "";
          }
          else
          {
             $cat2 =  "%".$Chicken1."%";
          }

          if($Beef1 == "")
          {
            $cat3 = "";
          }
          else
          {
             $cat3 =  "%".$Beef1."%";
          }

         if($Pork1 == "")
         {
          $cat4 = "";
         }
         else
         {
           $cat4 =  "%".$Pork1."%";
         }

         if($Soup1 == "")
         {
            $cat5 = ""; 
         }
         else 
         {
          $cat5 = "%".$Soup1."%";
         }
          
          if($Broth1 == "")
          {
            $cat6 = "";
          }
          
          else
            {
              $cat6 =  "%".$Broth1."%";
            }

        $categorysearch = $this->db->query("SELECT * FROM recipe WHERE recipe_category LIKE '{$cat1}' OR recipe_category LIKE '{$cat2}' OR recipe_category LIKE '{cat3}' OR recipe_category LIKE '{$cat4}' OR recipe_category LIKE '{$cat5}' OR recipe_category LIKE '{$cat6}'");
        foreach ($categorysearch->result() as $result) {
          
        
       ?>
      <div class="tile is-ancestor columns animate__animated animate__fadeInLeft animate__delay-1s">
        <div class="tile is-child box is-2">
          <figure class="image is-128x128 container">
            <img class="" src="<?=$result->recipe_image?>" alt="">
          </figure>
        </div>
        <div class="tile is-child box is-10">
            <a href="<?=site_url('views/recipe')?>/<?=$result->recipeID?>">
             <h1 class="title is-2 has-text-link"><u><?=$result->recipe_title?></u></h1>

            </a>
             <p><?=$result->recipe_ingredients?></p>
        </div>
      </div>
      <?php 
        }
       ?>
    </div>
    <footer class="footer">
      <div class="content has-text-centered">
         <img src="<?=base_url()?>bootstrap/images/logo_name-dark.png" width="112" height="38">
         <p>2020-2021</p>
      </div>
</footer>
</body>
</html>