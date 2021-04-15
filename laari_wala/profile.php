<!DOCTYPE html>
<html lang="en">
  <head>


   <?php
   include("connection.php");
  session_start();
  if(isset($_SESSION["laari_owner_id"]))
  {
    $query="SELECT * FROM laari_info WHERE laari_owner_id=:laari_owner_id";
    $pdo_stament=$con->prepare($query);
    $pdo_stament->execute(array(":laari_owner_id"=>$_SESSION["laari_owner_id"]));
    $result=$pdo_stament->fetch();
    $laari_id=$pdo_stament->fetchColumn();

  

  } 
   ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $result["laari_name"];?></title>
    
        <link rel="icon" type="img/png" href="img/logo.jpeg">
      

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
    body
    {
      color:black;
    }
    </style>
  </head>

  <body>
    <div class="container body">
      <div class="main_container">

        <!-- top navigation -->
        <div>
            <div>
                <ul class=" navbar-right">
                
                    <div >
                     <center> 
                    <img src="img/logo.png" style="height:15vh;">
                    </center>
                    </div>
                  </li>
  
                  
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <center>
        <div class="right_col" style="width:900px!important;align-self:center;">
          <div>
            <div class="page-title">
              <div>
                <h3>Laari Profile</h3>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo ucwords($result["laari_name"]);?>
                      <a class="btn btn-danger"  href="laari_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div >
                      <div>
                        <div>
                          <!-- Current avatar -->

                          <?php  $image_path="laari_pic/".$result[9]; ?>
                          <center>
                          <img class="img-responsive avatar-view" src="<?php echo $image_path;?>" alt="Avatar" title="Change the avatar" height="200" width="500">
                          </center>
                          <form method="POST" action="update_photo.php" enctype='multipart/form-data'>
                          <h2>Update Profile</h2>
                          <input type="file" name="img_name" id="img_name">
                          <input type="submit" name="Change_img" class="btn btn-success" value="Edit Image"> 
                          </form>
                          <br>
                          <br>
                          
                          <?php
                    if($result['status']==0)
                    {
                      ?>
                       <div class="alert alert-danger" id="status" style="font-size:14px;font-weight:bold;width:300px;">Close</div>                      
                   <?php   
                    } 

                     if($result['status']==1)
                    {
                      ?>
                       <div class="alert alert-info" id="status" style="font-size:14px;font-weight:bold;width:300px;">Open</div>                      
                   <?php   
                    } 
                    ?>
                        </div>
                        <div style="width:100%;">
                           <center>
                        <div>
                         
                          
                      <?php
                $query="SELECT rating_id FROM laari_rating WHERE laari_no=:laari_no";
                $pdo_stament=$con->prepare($query);
                $pdo_stament->execute(array(":laari_no"=>$laari_id));
                $total_ppl=$pdo_stament->rowCount();
                if($total_ppl!=0)
                {
               $query="SELECT SUM(rating) AS total FROM laari_rating WHERE laari_no=:laari_no";
                $pdo_stament=$con->prepare($query);
                $pdo_stament->execute(array(":laari_no"=>$laari_id));
                $rating_sum=$pdo_stament->fetchColumn();
                $avrage=$rating_sum/$total_ppl;
                echo "<h2><b>";
                echo $avrage;
                echo "</b></h2>";
                }
                else
                {
                   echo "<h2 style='color:red;'><b>";
               
                  echo "Not rated yet";
                      echo "</b></h2>";
            
                }
                      ?>
                        </div>

                          </center>
                      </div>
                      </div>
                      <div style="font-size:20px;">
                      <b>
                      <i style="color:green;">Opening Time:</i><?php echo $result["s_time"];?>
                      <i style="color:red;">Closing Time:</i><?php echo $result["e_time"];?>
                      </b>
                    </div>
                      <ul class="list-unstyled user_data">
                      <?php
                  $stmt = $con->prepare("SELECT place,street,area,pincode from laari_info where laari_owner_id=:l_own_id");
                  $stmt->execute(array(":l_own_id"=>$_SESSION["laari_owner_id"]));
                  $address=$stmt->fetch();
                  $str=implode(",",$address);
                  $a='https://maps.google.com/?q='.$str;
                  ?>
                    

                      </ul>
                     <div style="padding-left:20px;">
                      <h3>Items</h3>
                      
                        <?php
                    $item_array=unserialize($result["items"]); 
                    ?>
                          <?php
                          foreach ($item_array as $key ) {
                      echo  "<h4>". ucwords($key)."</h4>";
                      }
                      ?>
                      <!-- end of skills -->

                    </div>

                      <a class="btn btn-success" style="color:#fff;" onclick="laari_open();"><i style="color:#fff;"></i>Open</a>
                      <a class="btn btn-danger" style="color:#fff;" onclick="laari_close();"><i  style="color:#fff;"></i>Close</a>
                      <a class="btn btn-success" style="color:#fff;" href="laari_edit.php?lid=".<?php echo $_SESSION["laari_owner_id"];?>><i class="fa fa-edit m-right-xs" style="color:#fff;"></i>Edit Profile</a>
                      <a class="btn btn-success" style="color:#fff;" href="laari_menu_edit.php?lid=".<?php echo $_SESSION["laari_owner_id"];?>><i class="fa fa-edit m-right-xs" style="color:#fff;"></i>Edit menu</a>
                      <a class="btn btn-primary" style="color:#fff;" href='<?php echo $a;?>'><i class="fa fa-map"></i></a>
                      <br />

                      <!-- start skills -->
                     

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </center>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="vendors/raphael/raphael.min.js"></script>
    <script src="vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script type="text/javascript">
      
      function laari_open()
      {
        var owner_id='<?php echo $_SESSION["laari_owner_id"];?>';

        $.ajax({
          url:"laari_open.php",
          method:"GET",
          data:{"owner_id":owner_id},
          success:function(response)
          {
            if(response==1)
            {

              $("#status").removeClass("alert-danger").addClass("alert-info");
              document.getElementById("status").innerHTML="Open";
            }
          }
        });
      }
       
       function laari_close()
      {
        var owner_id='<?php echo $_SESSION["laari_owner_id"];?>';
        $.ajax({

          url:"laari_close.php",
          method:"GET",
          data:{"owner_id":owner_id},
          success:function(response)
          {
            if(response==1)
            {
              $("#status").removeClass("alert-info").addClass("alert-danger");
              document.getElementById("status").innerHTML="Close";
            }
          }
        });
      }


    </script>
  </body>
</html>