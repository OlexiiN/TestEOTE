<?php session_start();

    if (! isset($_SESSION['logged']) ) {
        header('Location: login.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EotE Roller</title>

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,700' rel='stylesheet' type='text/css'>
    
    <link rel=icon href=/img/favicon.ico>

</head>
<body>

    <nav class="navbar">
        <div class="container">
            
            <a class="navbar-brand" href="/">
                <img alt="Brand" src="img/logo.png"  id="logo_art">
            </a>
            
            <p class="navbar-right">    
            <a href="logout.php" class=" btn pull-right" id="logout">Log out</a>
            </p>            
        </div> <!--/ container /-->
    </nav>

    <div class="container">
        <div class="row">
            
            <div class="col-md-6">

                <p class="info_text">Select dices <small>(click to select)</small></p>
                <div id="set_dices_box" class="well">
                    <ul id="dices_list">
                        <li id="add_boost"><img src="img/dices/boost.png" alt="boost.png"></li>
                        <li id="add_setback"><img src="img/dices/setback.png" alt="setback.png"></li>
                        <li id="add_ab"><img src="img/dices/ab.png" alt="ab.png"></li>
                        <li id="add_dif"><img src="img/dices/dif.png" alt="dif.png"></li>
                        <li id="add_prof"><img src="img/dices/prof.png" alt="prof.png"></li>
                        <li id="add_ch"><img src="img/dices/ch.png" alt="ch.png"></li>
                        <li id="add_force"><img src="img/dices/force.png" alt="force.png"></li>
                        <li id="add_d10"><img src="img/dices/d10.png" alt="d10.png"></li>
                    </ul>

                    <form id="roll_form" class="hidden" name="roll_form">
                        <input type="hidden" value="<?php 
                            if ( isset( $_SESSION['user']) ) 
                                echo $_SESSION['user'];
                            else 
                                echo "admin";
                        ?>" name="user" id="user" />
                        <br> Boost <input type="number" min="0" max="5" step="1" value="0" name="boost" id="boost" />
                        <br> Setback <input type="number" min="0" max="5" step="1" value="0" name="setback" id="setback" />
                        <br> Ability <input type="number" min="0" max="5" step="1" value="0" name="ab" id="ab" />
                        <br> Difficulty <input type="number" min="0" max="5" step="1" value="0" name="dif" id="dif" />
                        <br> Proficiency <input type="number" min="0" max="5" step="1" value="0" name="prof" id="prof" />
                        <br> Challenge <input type="number" min="0" max="5" step="1" value="0" name="ch" id="ch" />
                        <br> Force <input type="number" min="0" max="1" step="1" value="0" name="force" id="force" />
                        <br> d10 <input type="number" min="0" max="1" step="1" value="0" name="d10" id="d10" />
                        <br>
                    </form>

                </div>

                <p class="info_text">Dices selected <small>(click to remove)</small></p>
                <div id="chosen_dices_box" class="well">
                    <ul id="chosen_dices_list">
                    </ul>
                </div>
                
                <p class="info_text">Enter comment <small>(optional)</small></p>
                <textarea class="form-control" rows="1" id="comment"></textarea>
                
                
        
            <button id="roll_button" class="btn btn-success pull-right">Submit</button> 
            <button id="reset" class="btn btn-warning pull-right">Reset</button> 
                
                <div class="clearfix"></div>
        
    
                <p class="info_text">Destiny points</p>
                
                    <div class="well" id="destiny_box">
                        <ul id="destiny_list">
                                <li id="destiny_light">
                                    <img src="img/dices/destiny_light.png" alt="destiny_light.png">
                                    <div class="btn-group btn-group-vertical destiny_buttons" role="group">
                                        
                                        <?php if ( isset( $_SESSION['user']) AND $_SESSION['user']=="admin" ){
                                            echo "<button id='light_add' type='button' class='btn btn-default btn-xs'><i class='fa fa-angle-up'></i></button>";
                                        } ?>
                                        
                                      <button id="light_val" light='10' type="button" class="btn btn-default btn-xs">10</button>
                                      
                                       <?php if ( isset( $_SESSION['user']) AND $_SESSION['user']=="admin" ){
                                        echo "<button id='light_sub' type='button' class='btn btn-default btn-xs'><i class='fa fa-angle-down'></i></button>";
                                        } ?>
                                      
                                    </div>
                                
                                </li>
                                <li id="destiny_dark"><img src="img/dices/destiny_dark.png" alt="estiny_dark.png">
                                    <div class="btn-group btn-group-vertical destiny_buttons" role="group">
                                        
                                      <?php if ( isset( $_SESSION['user']) AND $_SESSION['user']=="admin" ){
                                      echo "<button id='dark_add' type='button' class='btn btn-default btn-xs'><i class='fa fa-angle-up'></i></button>";
                                      } ?>
                                      <button id='dark_val' dark='10' type='button' class='btn btn-default btn-xs'>10</button>
                                      
                                      <?php if ( isset( $_SESSION['user']) AND $_SESSION['user']=="admin" ){
                                        echo "<button id='dark_sub' type='button' class='btn btn-default btn-xs'><i class='fa fa-angle-down'></i></button>";
                                      } ?>    
                                    </div>
                                </li>
                            </ul>
                      </div>
                      
                      <p id="alert_box">
                       <?php if ( isset( $_SESSION['user']) AND $_SESSION['user']=="admin" ){   
                    
                          echo "<div id='destiny_ok' class='alert alert-success' role='alert'><strong>Success!</strong> Destiny points updated.</div>";
                          echo "<div id='destiny_err' class='hidden alert alert-danger' role='alert'><strong>Error!</strong> Verify console for error message.</div>";
                      } ?>
                      
                          <div id='roll_ok' class='alert alert-success' role='alert'><strong>Success!</strong> Your roll has been saved.</div>
                          <div id='roll_err' class='alert alert-danger' role='alert'><strong>Error!</strong> Your roll has not been saved :(</div>
                          
                          <div id='destiny_change' class='alert alert-info' role='alert'><strong>Attention!</strong> Destiny points has been changed.</div>
                          
                      </p>
                      
                      <?php if ( isset( $_SESSION['user']) AND $_SESSION['user']=="admin" ){  
                            
                            echo "<p></p><button id='destiny_update' class='btn btn-info'>Update</button></p>";
                            echo "<div class='clearfix'></div>";
                      
                      } ?>

            </div> <!-- / col-md-6 / -->
            
            <div class="col-md-6 col-sm-12">

                <p class="info_text">Results</p>
                <div id="results_box" class="well">
                    <ul id="results_list">
                    </ul>
                </div>

            </div> <!-- / col-md-6 / -->
            
        </div> <!-- /row/ -->
    </div>  <!-- / container end -->

    <script type="text/javascript" src="js/jquery2.js"></script>
    <script type="text/javascript" src="js/dices.js"></script>
    <script type="text/javascript" src="js/add_roll.js"></script>
    <?php if ( isset( $_SESSION['user']) AND $_SESSION['user']=="admin" ){
        echo "<script type='text/javascript' src='js/destiny.js'></script>";
    }
    ?>
    
</body>
</html>