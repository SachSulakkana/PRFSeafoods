<?php
   include('session.php');
   include("database.php");
   $error = "";
   $valid = true;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    if (empty($_POST["title"])) {  
        $error = "Title is required!";
        $valid = false;  
    } else {  
       $name = input_data($_POST["title"]);  
           // check if name only contains letters and whitespace  
           if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
               $error = "Only alphabets and white space are allowed"; 
               $valid = false; 
           }  
    }
    if(empty($_POST["title"])){
        $error = $error ." Image file is required!"; 
        $valid = false; 
    }
    if(empty($_POST["description"])){
        $error = $error ." Description is required!";
        $valid = false;  
    }
    if($valid){
      $title = mysqli_real_escape_string($conn,$_POST['title']);
      $code = mysqli_real_escape_string($conn,$_POST['code']); 
      $description = mysqli_real_escape_string($conn,$_POST['description']);
      //$files = mysqli_real_escape_string($conn,$_POST['files']); 
      $Thumbimg = addslashes(file_get_contents($_FILES['files1']['tmp_name']));
      
      $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));

      $sql = "INSERT INTO photo_gallery (`Title`, `Description`, `ThumbnailPhoto`, `Photo`) VALUES ('$title','$description','$Thumbimg','$imgData')";
      $result = mysqli_query($conn,$sql);
      $id = mysqli_insert_id($conn);
      if($id > 0) echo '<div class="alert alert-success" role="alert">Successfully Saved the image! </div>';
      else echo '<div class="alert alert-danger" role="alert">Something went wrong! </div>';
    }
   }

   function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
  }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Event</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="./style2.css">
  <link rel="stylesheet" href="./w3.css">
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

    body{
  background: rgb(222,222,224);
  background: linear-gradient(90deg, rgba(222,222,224,1) 0%, rgba(230,230,230,1) 23%, rgba(227,227,227,1) 62%);
  
  padding: 0;

}

.box{
  max-width: 600px;
  width: 100%;
  height: 900px;
  background:ghostwhite;
  margin-top: 3cm;
  margin: 40px auto;
  padding: 30px;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
}
.box .title{
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 25px;
  margin-top: 25px;
  color: black;
  text-transform: uppercase;
  text-align: center;
  text-decoration: underline  ;



}

.box .form{
  width: 100%;
  height: 750px;

}

.box .form .input_field{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}
.box .form .input_field label{
  width: 200px;
  color: black;
  margin-right: 10px;
  font-size: 20px ;
 
}


.box .form .image label{
  box-sizing: border-box;
  border: 2px solid black;
  padding: 10px;
  width: 350px;
  height: 50px;
  color: #84838b;
  margin-right: 10px;
  font-size: 20px ;
  left: 10px;
  background: rgb(218,216,241);
  background: linear-gradient(90deg, rgba(218,216,241,1) 0%, rgba(255,255,255,1) 100%);
 
}

.box .form .image1 label{
  box-sizing: border-box;
  border: 2px solid black;
  padding: 10px;
  width: 350px;
  height: 50px;
  color: #84838b;
  margin-right: 10px;
  font-size: 20px ;
  left: 10px;
  background: rgb(218,216,241);
  background: linear-gradient(90deg, rgba(218,216,241,1) 0%, rgba(255,255,255,1) 100%);
 
}

.box .form .input_field .input,
.box .form .input_field .textarea{
  width: 100%;
  outline: none;
  border: 1px solid black;
  font-size: 15px;
  border-radius: 5px;
  transition: all 0.3s eases;
  height: 50px;
}

.box .form .input_field .textarea{
  resize: none;
  height: 125px;

}
.box .form .input_field .custom{
  position: relative;
  width: 100%;
  height: 37px;
}

.box .form .input_field .custom select{

  border: 1px solid #d5dbd9; 
  width: 100%;
  height: 100%;
  padding: 8px 10px;
  border-radius: 5px;
  outline: none;
}
.box .form .input_field .input:focus,
.box .form .input_field .textarea:focus,
.box .form .input_field select:focus
{
  border: 2px solid #2233e9;
}
.image{
  position: absolute;
  left: 40%;
  font-size: 14px;

}
.image1{
  position: absolute;
  left: 40%;
  font-size: 14px;

}

.btn {background-image: linear-gradient(90deg, rgba(132,131,139,1) 0%, rgba(102,98,98,1) 23%, rgba(183,183,196,1) 62%);}
.btn {
  position: absolute;
  margin: 10px;
  padding: 15px 45px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;            
  box-shadow: 0 0 20px #eee;
  border-radius: 10px;
  display: block;
  left: 43%;
  font-size: 14px;

          }

.btn:hover {
  background-position: right center; 
  color: #fff;
  text-decoration: none;
  transition: .5s ease;
  transform: scale(1.1);
          }
.box .img{
  width: 150px;
  height: 50px;
  margin-left: -400px;
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
      <a class="navbar-brand" href="./Profile.html"><img src="./images/avatar6.png" style="width: 50px; border-radius: 50%;" alt=""><p style="font-size: 13px; text-align: center;">ADMIN</p></a>
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
  
<div class="container-fluid text-center">
  <div class="row content">
        
    <div class="col-sm-2 sidenav">
        <img src="./images/logo2.png" style="width: 100%; padding-bottom: 15px;">
      <ul>
      <li > <a href="./DashboardAdmin.php"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
        <li > <a href="./admin.php"><i class="fa fa-user-circle-o"></i>&nbsp; Profile</a></li>
        <li> <a href="./product.php"><i class="fa fa-history"></i>&nbsp; Products</a></li>
        <li> <a href="./announcement.php"><i class="fa fa-bullhorn"></i>&nbsp; Announcement</a></li>
        <li class="active2"> <a href="./photoList.php"><i class="fa fa-camera"></i>&nbsp;Photo</a></li>
        <li> <a href="./customerList.php"><i class="fa fa-child"></i>&nbsp; Customer Details</a></li>
        <li> <a href="./Finance.php"><i class=" fa fa-comments-o"></i>&nbsp; Finance</a></li>
        <li> <a href="./logout.php"><i class="fa fa-sign-out"></i>&nbsp; Signout</a></li>
        </ul>
    </div>
     <div class="box">
      <img class="img" src="./images/logo.png">
    <div class="title">
     Image Updates
    </div>
    
    <div class="form">
    <form action = "" enctype="multipart/form-data" method = "post" novalidate>
      
      
      <div class="input_field">
        <span class="text-danger"><?php echo $error; ?></span>
      </div>
      <div class="input_field">
        <label>Event Code : </label>
        <input type="text" class="input" name="code" required>
      </div>
      
      <div class="input_field">
        <label>Title : </label>
        <input type="text" class="input" name="title" required>
      </div>

      <div class="input_field">
        <label>Discription : </label>
        <textarea class="textarea" name="description" required></textarea>
      </div>
      <br><br>
      <div class="image1">
        <label>Add Thumbnail Photo : </label>
        <input type="file" id="files1" name="files1" required>
      </div>
      <br><br><br><br><br><br><br>
          
      <div class="image">
        <label>Add images : </label>
        <input type="file" id="files" name="files" multiple required>
      </div>

      <br><br><br><br><br><br><br><br>

      
      
       <div class="input_field">
        <input type="submit" class="btn" value="Add Event">
      </div>

    </form>
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

<!--Clock JS-->
<script>
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    var radius = canvas.height / 2;
    ctx.translate(radius, radius);
    radius = radius * 0.90
    setInterval(drawClock, 1000);
    
    function drawClock() {
      drawFace(ctx, radius);
      drawNumbers(ctx, radius);
      drawTime(ctx, radius);
    }
    
    function drawFace(ctx, radius) {
      var grad;
      ctx.beginPath();
      ctx.arc(0, 0, radius, 0, 2*Math.PI);
      ctx.fillStyle = 'white';
      ctx.fill();
      grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
      grad.addColorStop(0, '#333');
      grad.addColorStop(0.5, 'white');
      grad.addColorStop(1, '#333');
      ctx.strokeStyle = grad;
      ctx.lineWidth = radius*0.1;
      ctx.stroke();
      ctx.beginPath();
      ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
      ctx.fillStyle = '#333';
      ctx.fill();
    }
    
    function drawNumbers(ctx, radius) {
      var ang;
      var num;
      ctx.font = radius*0.15 + "px arial";
      ctx.textBaseline="middle";
      ctx.textAlign="center";
      for(num = 1; num < 13; num++){
        ang = num * Math.PI / 6;
        ctx.rotate(ang);
        ctx.translate(0, -radius*0.85);
        ctx.rotate(-ang);
        ctx.fillText(num.toString(), 0, 0);
        ctx.rotate(ang);
        ctx.translate(0, radius*0.85);
        ctx.rotate(-ang);
      }
    }
    
    function drawTime(ctx, radius){
        var now = new Date();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        //hour
        hour=hour%12;
        hour=(hour*Math.PI/6)+
        (minute*Math.PI/(6*60))+
        (second*Math.PI/(360*60));
        drawHand(ctx, hour, radius*0.5, radius*0.07);
        //minute
        minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
        drawHand(ctx, minute, radius*0.8, radius*0.07);
        // second
        second=(second*Math.PI/30);
        drawHand(ctx, second, radius*0.9, radius*0.02);
    }
    
    function drawHand(ctx, pos, length, width) {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.moveTo(0,0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }
    </script>
<!--Wather -->
<script type="text/javascript"> var css_file=document.createElement("link"); var widgetUrl = location.href; css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-prime-days.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData_12594(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-prime-days-12594'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=19459;type=6;scode=124;ltid=3457;domid=w209;anc_id=71986;countday=5;cmetric=1;wlangID=1;color=137AE9;wwidth=250;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";widgetSrc += ';ref=' + widgetUrl;widgetSrc += ';rand_id=12594';var weatherBookedScript = document.createElement("script"); weatherBookedScript.setAttribute("type", "text/javascript"); weatherBookedScript.src = widgetSrc; document.body.appendChild(weatherBookedScript) </script>


</body>
</html>
