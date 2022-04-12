<?php 
    $loginVerification = $this->session->userdata('logged_in');

    if (!$loginVerification) 
    {

        redirect("views/index");

    }
    $userID = $this->session->userdata('userID');
    $recipeID = $this->uri->segment(3);

       $resultrecipe = $this->db->query("SELECT * FROM recipe INNER JOIN users ON recipe.userID = users.userID WHERE recipe.recipeID = {$recipeID}");
    foreach ($resultrecipe->result() as $value) {
        

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recipe: <?=$value->recipe_title?></title>
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/blog.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/OverlayScrollbars.min.css" type="text/css">
    <script src="<?=base_url()?>bootstrap/js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="<?=base_url()?>bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>
</head>
<body>
    <?php 

    

        if(isset($_SESSION['update_error']))
        {
            $error = $_SESSION['update_error'];
        
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
<style type="text/css">
  
.hero-body
{
    background-image: url(<?=$value->recipe_image?>);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 500px;
}

</style>
   <!-- START NAV -->
    <nav class="navbar">
        <div class="container is-medium">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?=site_url('views/dashboard')?>">
                    <img src="<?=base_url()?>bootstrap/images/logo_name-dark.png" alt="Logo">
                </a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                <span></span>
                <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                   
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->

    <section class="hero is-info is-medium is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
              
            </div>
        </div>
    </section>


    <div class="container">
        <!-- START ARTICLE FEED -->
        <section class="articles">
            <div class="column is-8 is-offset-2">
                <?=form_open_multipart('database/update_post');?>
                <?=form_hidden("recipe_date",date("y_m_d H:i:s"))?>
                <input type="hidden" name="recipeID" value="<?=$recipeID?>">
                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <h1 class="title has-text-centered"><i class="fa fa-pencil"></i> Update Recipe</h1>
                        <br>
                                             <label class="title is-4 has-text-dark" for="img">Select image:</label>
                                             <br><br>
                                             <div id="image" class="file has-name is-info">
                                              <label class="file-label">
                                                <input class="file-input" type="file" name="userfile1" accept="image/*" required>
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
                        <div class="media">
                            <div class="media-content has-text-centered">
                                    <div class="field">
                                        <input class="input is-primary is-large has-text-centered" name="recipetitle" type="text" value="<?=$value->recipe_title?>" required="">
                                    </div>
                                <div class="tags has-addons level-item">
                                    <span class="tag is-rounded is-info">by: <?=$value->Fname?>&nbsp;<?=$value->Mi?>&nbsp;<?=$value->Lname?></span>
                                    <span class="tag is-rounded"><?=$value->recipe_date?></span>
                                </div>
                            </div>
                        </div>
                        <div class="content article-body">
                            <h3 class="has-text-left">Ingredients</h3>
                                    <div class="field">
                                        <textarea class="textarea is-primary" name="recipeingredients" rows="15" style="resize: none;" required=""><?=$value->recipe_ingredients?></textarea>
                                    </div>
                                
                            <h3 class="has-text-left">Instruction</h3>
                                <div class="field">
                                    <textarea class="textarea is-primary" name="recipeinstructions"rows="15" style="resize: none;" required=""><?=$value->recipe_instructions?></textarea>
                                </div>
                            <p></p>
                            <h3 class="has-text-left">Category</h3>
                            <p class="box"><?=$value->recipe_category?> </p>
                        </div>
                           <div class="field buttons is-centered">
                                <button class="button is-info is-medium"><i class="fa fa-upload"></i>&nbsp; Update Recipe</button>  
                            </div>
                    </div>
                </div>
                <!-- END ARTICLE -->
               </form>
            </div>
        </section>
        <!-- END ARTICLE FEED -->
        </div>
        <script async type="text/javascript" src="../js/bulma.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/js/OverlayScrollbars.min.js'></script>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
        //The first argument are the elements to which the plugin shall be initialized
        //The second argument has to be at least a empty object or a object with your desired options
        OverlayScrollbars(document.querySelectorAll("body"), { });
        });
        </script>
</body>
</html>
<?php 
     }
 ?>