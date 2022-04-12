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
    <title>Welcome to FOODBOOK</title>
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/animate.min.css" type="text/css">
    <script src="<?=base_url()?>bootstrap/js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="<?=base_url()?>bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>
</head>
<body>
    <script type="text/javascript">
        Swal.fire({
            title: 'Hello',
            text: 'I hope you find this web app useful :)',
            imageUrl: '<?=base_url()?>bootstrap/images/hello.gif',
            imageWidth: 400,
            imageHeight: 300,
          });
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

          <a href="#about" class="navbar-item">
            <strong>About</strong>
          </a>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
          </div>
        </div>
      </div>
    </nav>
    <div class="container is-max-widescreen is-multiline is-mobile">
        <div class="box is-full mt-6 mb-6 pb-6 pt-6 columns animate__animated animate__fadeInLeft" id="about">
            <div class="column is-three-quarters">
                <h1 style="font-size: 80px;" class="title is-1">FOODBOOK</h1>
                <h3 style="margin-top: -30px; font-size: 20px;">Helping you decide</h3>
                <div class="content">
                    <p>We are introducing FOODBOOK, an application that gives you recipes about a dish depending on your available ingredients.</p>
                </div>
                <a href="#here" class="button is-link is-hoverable is-large is-outlined">Let's go! &nbsp<i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="column is-one-quarter container box is-64x64">
                <img class="" src="<?=base_url()?>bootstrap/images/logo2.png" alt="">
            </div>
        </div>
        <div class="box is-full mt-6 mb-6 pb-6 pt-6 columns animate__animated animate__fadeInLeft animate__delay-1s" id="here">
            <div class="column is-full mt-6">
                <div class="column is-half">
                    <img src="<?=base_url()?>bootstrap/images/logo_name-dark.png" alt="">
                </div>
                <p>Click on the categories based on what ingredients you have and we'll find the right dish for you!</p>
                <div class="box mt-4"> 
                  <?=form_open('database/search');?>
                      <div class="columns is-multiline is-mobile is-centered">
                          <div class="column button is-primary is-one-fifth is-normal">
                              <input type="checkbox" id="vege" value="Vegetables" onclick="checkboxFunction" name="Vegetables" >
                              <label>Vegtables</label>
                              
                          </div>
                          &nbsp;&nbsp;&nbsp;
                          <div class="column button is-primary is-one-fifth is-normal">
                              <input type="checkbox" id="vege" value="Chicken" onclick="checkboxFunction" name="Chicken" >
                              <label>Chicken</label>
                              
                          </div>
                          &nbsp;&nbsp;&nbsp;
                          <div class="column button is-primary is-one-fifth is-normal">
                              <input type="checkbox" id="vege" value="Soup" onclick="checkboxFunction" name="Soup" >
                              <label>Soup</label>
                          </div>
                      </div>
                      <br>
                      <div class="columns is-multiline is-mobile is-centered">
                          <div class="column button is-primary is-one-fifth is-normal">
                              <input type="checkbox" id="vege" value="Pork" onclick="checkboxFunction" name="Pork" >
                              <label>Pork</label>
                              
                          </div>
                          &nbsp;&nbsp;&nbsp;
                          <div class="column button is-primary is-one-fifth is-normal">
                              <input type="checkbox" id="vege" value="Broth" onclick="checkboxFunction" name="Broth" >
                              <label>Broth</label>
                              
                          </div>
                          &nbsp;&nbsp;&nbsp;
                          <div class="column button is-primary is-one-fifth is-normal">
                              <input type="checkbox" id="vege" value="Beef" onclick="checkboxFunction" name="Beef" >
                              <label>Beef</label>
                          </div>
                      </div>
                      <button class="button is-success is-large"><i class="fa fa-search"></i> &nbsp;Seek</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
      <div class="content has-text-centered">
        <p>
          <strong>Foodbook</strong> by <a href="<?=site_url('views/login')?>">The Amazing Group</a>. The source code is licensed
          <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
          is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
        </p>
      </div>
    </footer>
</body>
</html>