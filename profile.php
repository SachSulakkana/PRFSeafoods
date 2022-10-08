<?php
    include('session.php');
    $user_check = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Accounts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="./userstyle.css">
  <link rel="stylesheet" href="./rag.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 100%}
    
    /* Set gray background color and 100% height */
    .sidenav2 {
      padding-top: 20px;
      background-color: #0e889b;
      height: 100%;
      width: 150px;
    }
    .sidenav{
      padding-top: 20px;
      background-color: #0e889b;
      min-height: 1000px;
      height: 100%;
      width: 280px;
      padding-left: 5px;
      margin-left: 0;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="height: 80px;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="./Profile.html"><img src="./images/avatar2.png" style="width: 50px; border-radius: 50%;" alt=""><p style="font-size: 13px; text-align: center;">User</p></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li style="top: 10px;"><a href="./index.html">HOME</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li>
            <div class="search " style="top: 15px;">
                <label>
                    <input type="text " placeholder="Search here ">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </label>
            </div>
        </li>
        <li><a href="./logout.php" style="top: 10px;"><i class="fa fa-sign-out"></i>&nbsp; Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<form></form>
  
<div class="container-fluid text-center">
  <div class="row content">
        
    <div class="col-sm-2 sidenav">
        <img src="./images/logo2.png" style="width: 100%; padding-bottom: 15px;">
      <ul>
        <li > <a href="./DashboardUser.php"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
        <li class="active2"> <a href="./profile.php"><i class="fa fa-user-circle-o"></i>&nbsp; Profile</a></li>
        <li> <a href="./logout.php"><i class="fa fa-sign-out"></i>&nbsp; Signout</a></li>
        </ul>
    </div>
    <div class="col-sm-8 text-left"> 

    <?php
                    include("database.php");
                    $nic = $_SESSION['nic'];
                    $sql = "SELECT * FROM customer where Customer_NIC = '$nic'";                        
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array ($result)){
                    ?>
      <div class="rowforW ">
          <div class="dive col-99" style="align-items: center; text-align: center;">    
            <img src="./images/avatar2.png" style="width: 200px; border-radius: 100%; padding-top: 20px; " alt="">
            <p style="font-size: 20px; text-align: center;">User - <?php echo $row ['UserName']; ?></p>
          </div> 
      </div> <!--//row end -->
      <div class="rowforW ">
          <div class="user-details"  style="padding-bottom: 25px; margin-left: 0px; font-size: 20px;">

              <div class="input-box">
                <spanX class="details">Usre Name &emsp;&emsp;&ensp; : &emsp;&emsp;</spanX>
                <label><?php echo $row ['UserName']; ?></label>
            </div>

              <div class="input-box">
                <spanX class="details">NIC Number&emsp;&emsp; : &emsp;&emsp;</spanX>
               <label><?php echo $row ['Customer_NIC']; ?></label>
              </div>
            <div class="input-box">
                <spanX class="details">Admin Name&emsp;&emsp; : &emsp;&emsp;</spanX>
                <label><?php echo $row ['Customer_Name']; ?></label>
            </div>
            <div class="input-box">
                <spanX class="details">Address&emsp;&emsp;&emsp;&emsp; : &emsp;&emsp;</spanX>
                <label><?php echo $row ['Customer_Address']; ?></label>
            </div>
            <div class="input-box">
                <spanX class="details">Contact Num&emsp;&emsp; : &emsp;&emsp;</spanX>
               <label><?php echo $row ['Customer_ContactNo']; ?></label>
            </div>
            <div class="input-box">
                <spanX class="details">E-mail&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp;&emsp;</spanX>
                <label><?php echo $row ['Customer_Email']; ?></label>
            </div>
            
          <!--   <div class="input-box">
                <spanX class="details">ROLL&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; : &emsp;&emsp;</spanX>
                <label >#ROLL</label>
            </div>  -->
            
          </div>
      </div>
          
          <div class="button" style="align-items: center; text-align: center;">
            <a href="profileUpdate.php">
                <input type="submit" value="Update Info" style="background-color: #FBAB7E;
background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);
;">
          </div>
          <?php
        }
        ?>
        </div>
      </div>
      <!--
      <div class="col-sm-2 sidenav2">
        <div class="well">
          <p>ADS</p>
        </div>
        <div class="well">
          <p>ADS</p>
        </div>
      </div>-->
    </div>
  </div>

  <!-----------footer--------------->
  <div class="footer">
    <div class="container">
        <div class="rowF">
            <div class="footer-col-1">
                <h3>ABOUT US</h3>
                <ul>
                    <li>“THE BIGGEST TUNA BAIT IMPORTER IN SRI LANKA"</li>
                    
                    <li>The biggest tuna bait importer and place to buy prime seafood in Sri Lanka.</li>
                </ul>
                <br>
                <h3>Google Map</h3>
                <div class="mapouterNew"><div class="gmap_canvasNew">
                    <iframe width="90%"  id="gmap_canvas" src="https://maps.google.com/maps?q=P.R.F.%20SEAFOOD%20(PVT)%20LTD%20panadura&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://putlocker-is.org"></a>
                    <br>
                    <style>.mapouterNew{position:relative;text-align:right;width:90%;}</style>
                    <style>.gmap_canvasNew {overflow:hidden;background:none!important;width:90%;}</style></div>
                </div>
                
            </div>
            <div class="footer-col-2">
                <h3>P.R.F. SEAFOOD</h3>
                <img src="./images/logo-white.jpg" alt="">
                <br>
                <h3>OUR LOCATION</h3>
                <ul>
                    <li>P.R.F. Seafood (Pvt) Ltd.</li>
                    <li>No.159, Pahala Para, Thoduwawa,</li>
                    <li>Sri Lanka.</li>
                    <li>Postal code - 61224</li>  
                </ul>
            </div>
            <div class="footer-col-3">
                <h3>CONTACT US</h3>
                <ul>
                    <li>rushan@prfseafoods.com</li>
                    <li>info@prfseafoods.com (USA)</li>
                    <br>
                    <li>Tel: +94 32 22 48335 (Office)</li>
                    <li>Tel: +94 32 22 43312 (Cold Storage)</li>
                    <br>
                    <li>Fax: +94 32 22 49095 (Office)</li>
                    <br>
                    <li>Mob: +94 77 77 07050</li>
                    <li>(Rushan Fernando - Managing Director)</li>
                        
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>FOLLOW US</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
                <br>
                <h3>MAILING LIST</h3>
                <ul>
                    <li>Subscribe to our mailing list for offers, news updates and more!</li>
                </ul>
                <br>
                <input type="email" placeholder="enter your email.."/>
                <button type="submit" label="submit" placeholder="submit">Submit</button>
            </div>
        </div>
        <hr>
        <p class="copyright">© Copyright 2021 - All Rights Reserved.<br>
            Developed BY SNAP Solution</p>
    </div>
</div>



</body>
</html>