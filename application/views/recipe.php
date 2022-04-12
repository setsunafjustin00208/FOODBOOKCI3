<?php 
    
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
                <a class="navbar-item" href="<?=site_url('views/index')?>">
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
                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content has-text-centered">
                                <p class="title article-title"><b><?=$value->recipe_title?></b></p>
                                <div class="tags has-addons level-item">
                                    <span class="tag is-rounded is-info">by: <?=$value->Fname?>&nbsp;<?=$value->Mi?>&nbsp;<?=$value->Lname?></span>
                                    <span class="tag is-rounded"><?=$value->recipe_date?></span>
                                </div>
                            </div>
                        </div>
                        <div class="content article-body">
                            <h3 class="has-text-left">Ingredients</h3>
                            <p><?=$value->recipe_ingredients?></p>
                                
                            <h3 class="has-text-left">Instruction</h3>
                            <p><?=$value->recipe_instructions?></p>
                            <h3 class="has-text-left">Category</h3>
                            <p class="box"><?=$value->recipe_category?> </p>
                        </div>
                    </div>
                </div>
                <!-- END ARTICLE -->
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