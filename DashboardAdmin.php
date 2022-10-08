<?php
    include('session.php');
    $user_check = $_SESSION['login_user'];

    include("database.php");                    
    $sql = "SELECT count(*) as X FROM customer";                        
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $customerCount =$row["X"];    
    
    $sql = "SELECT count(*) as Y FROM orderproduct";                        
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $orderCount =$row["Y"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Account</title>
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
      min-height: 1800px;
      height: 100%;
      width: 280px;
      padding-left: 5px;
      margin-left: 0;
    }
    .img{
      margin-left: -400px;
    }

    tr{
      text-align: center;
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
        <li class="active2"> <a href="./DashboardAdmin.php"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
        <li> <a href="./admin.php"><i class="fa fa-user-circle-o"></i>&nbsp; Profile</a></li>
        <li > <a href="./product.php"><i class="fa fa-history"></i>&nbsp; Products</a></li>
        <li> <a href="./oderlist.php"><i class="fa fa-shopping-bag"></i>&nbsp;Order List</a></li>
        <li> <a href="./announcement.php"><i class="fa fa-bullhorn"></i>&nbsp; Announcement</a></li>
        <li> <a href="./photoList.php"><i class="fa fa-camera"></i>&nbsp;Photo</a></li>
        <li> <a href="./customerList.php"><i class="fa fa-child"></i>&nbsp; Customer Details</a></li>
        <li> <a href="./Finance.php"><i class=" fa fa-comments-o"></i>&nbsp; Comments</a></li>
        <li> <a href="./logout.php"><i class="fa fa-sign-out"></i>&nbsp; Signout</a></li>
        </ul>
    </div>
    <div class="col-sm-8 text-left"> 
    <div class="rowforW ">
        <div class="dive col-99">    
                <!------------analog clock------------------> 
                <canvas id="canvas" width="200" height="200" style=" padding-top: 50px ; padding-left: 150px ; color: #ff0000;">
                </canvas>
                
                <!------------------------------>
            </div> 
            <div class="dive col-99"> 
                <div class="rowforW"> 
                <!-- weather widget start --><div id="m-booked-prime-days-12594"> <div class="weather-customize widget-type-prime-days">  <div class="booked-prime-days-in"> <div class="booked-prime-days-data"> <div class="booked-pd-today"> <div class="booked-pd-today-img wrz-03 "></div> <div class="booked-pd-today-temperature"> <div class="booked-wzs-pd-val"> <div class="booked-wzs-pd-number"><span class="plus">+</span>29</div> <div class="booked-wzs-pd-dergee"> <div class="booked-wzs-pd-dergee-val">&deg;</div> <div class="booked-wzs-pd-dergee-name">C</div> </div> </div> </div> <div class="booked-pd-today-extreme"> <div class="booked-pd booked-pd-h"><span>High:</span><span class="plus">+</span>29</div> <div class="booked-pd booked-pd-l"><span>Low:</span><span class="plus">+</span>27</div> </div> </div> <div class="booked-pd-ndays">  <div class="booked-pd-nitem"> <div class="booked-pd-nidi wrz-sml wrzs-18"></div> <div class="booked-pd-nidw">Mon</div> </div>  <div class="booked-pd-nitem"> <div class="booked-pd-nidi wrz-sml wrzs-18"></div> <div class="booked-pd-nidw">Tue</div> </div>  <div class="booked-pd-nitem"> <div class="booked-pd-nidi wrz-sml wrzs-18"></div> <div class="booked-pd-nidw">Wed</div> </div>  <div class="booked-pd-nitem"> <div class="booked-pd-nidi wrz-sml wrzs-18"></div> <div class="booked-pd-nidw">Thu</div> </div>  <div class="booked-pd-nitem"> <div class="booked-pd-nidi wrz-sml wrzs-18"></div> <div class="booked-pd-nidw">Fri</div> </div> </div> </div> </div> </div> </div><!-- weather widget end -->
            </div> 
            <div class="rowforW"> 
                <center>
                    <script language="javascript" type="text/javascript">
                    var day_of_week = new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
                    var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
                    
                    //  DECLARE AND INITIALIZE VARIABLES
                    var Calendar = new Date();
                    
                    var year = Calendar.getFullYear();     // Returns year
                    var month = Calendar.getMonth();    // Returns month (0-11)
                    var today = Calendar.getDate();    // Returns day (1-31)
                    var weekday = Calendar.getDay();    // Returns day (1-31)
                    
                    var DAYS_OF_WEEK = 7;    // "constant" for number of days in a week
                    var DAYS_OF_MONTH = 31;    // "constant" for number of days in a month
                    var cal;    // Used for printing
                    
                    Calendar.setDate(1);    // Start the calendar day at '1'
                    Calendar.setMonth(month);    // Start the calendar month at now
                    
                    
                    /* VARIABLES FOR FORMATTING
                    NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
                        tags to customize your caledanr's look. */
                    
                    var TR_start = '<TR>';
                    var TR_end = '</TR>';
                    var highlight_start = '<TD WIDTH="30"><TABLE CELLSPACING=0 BORDER=1 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC><TR><TD WIDTH=20><B><CENTER>';
                    var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
                    var TD_start = '<TD WIDTH="30"><CENTER>';
                    var TD_end = '</CENTER></TD>';
                    
                    /* BEGIN CODE FOR CALENDAR
                    NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
                    tags to customize your calendar's look.*/
                    
                    cal =  '<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 BORDERCOLOR=BBBBBB><TR><TD>';
                    cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
                    cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><CENTER><B>';
                    cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
                    cal += TR_start;
                    
                    //   DO NOT EDIT BELOW THIS POINT  //
                    
                    // LOOPS FOR EACH DAY OF WEEK
                    for(index=0; index < DAYS_OF_WEEK; index++)
                    {
                    
                    // BOLD TODAY'S DAY OF WEEK
                    if(weekday == index)
                    cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;
                    
                    // PRINTS DAY
                    else
                    cal += TD_start + day_of_week[index] + TD_end;
                    }
                    
                    cal += TD_end + TR_end;
                    cal += TR_start;
                    
                    // FILL IN BLANK GAPS UNTIL TODAY'S DAY
                    for(index=0; index < Calendar.getDay(); index++)
                    cal += TD_start + '  ' + TD_end;
                    
                    // LOOPS FOR EACH DAY IN CALENDAR
                    for(index=0; index < DAYS_OF_MONTH; index++)
                    {
                    if( Calendar.getDate() > index )
                    {
                    // RETURNS THE NEXT DAY TO PRINT
                    week_day =Calendar.getDay();
                    
                    // START NEW ROW FOR FIRST DAY OF WEEK
                    if(week_day == 0)
                    cal += TR_start;
                    
                    if(week_day != DAYS_OF_WEEK)
                    {
                    
                    // SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
                    var day  = Calendar.getDate();
                    
                    // HIGHLIGHT TODAY'S DATE
                    if( today==Calendar.getDate() )
                    cal += highlight_start + day + highlight_end + TD_end;
                    
                    // PRINTS DAY
                    else
                    cal += TD_start + day + TD_end;
                    }
                    
                    // END ROW FOR LAST DAY OF WEEK
                    if(week_day == DAYS_OF_WEEK)
                    cal += TR_end;
                    }
                    
                    // INCREMENTS UNTIL END OF THE MONTH
                    Calendar.setDate(Calendar.getDate()+1);
                    
                    }// end for loop
                    
                    cal += '</TD></TR></TABLE></TABLE>';
                    
                    //  PRINT CALENDAR
                    document.write(cal);
                    
                    //  End -->
                    </script>
                    </center>
                </div>

            </div> 
      </div> <!--//row end -->
          <!--/////////////////////////-->
          <!-- Header -->
          <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
          </header>

          <div class="w3-row-padding w3-margin-bottom" >
            <div class="w3-quarter">
              <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-cart-arrow-down w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3><?php echo $orderCount; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Orders</h4>
              </div>
            </div>
            
            <div class="w3-quarter" >
              <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3><?php echo $customerCount; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Users</h4>
              </div>
            </div>
          </div>
          <br>
          
          <hr>
          <div class="w3-container">

            <h5>Our Products</h5>
            <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                <tr>
                <td style="font-size:20px; text-align: center; text-decoration: underline;">Product Coad</td>
                <td style="font-size:20px; text-align:center ;text-decoration: underline;">Product Name</td>
              </tr>
              <?php
                    include("database.php");                    
                    $sql = "SELECT * FROM product Limit 4";                        
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array ($result)){
                    
                    ?>
              <tr>
                <td><?php echo $row ['Product_Code']; ?></td>
                <td><?php echo $row ['Product_Name']; ?></td>
              </tr>
              <?php
            }
           ?>
              
              
            </table><br>
            <button class="w3-button w3-dark-grey" ><a href="product.php" style="text-decoration: none; color: white;" >More Products</a> <i class="fa fa-arrow-right"></i></button>
          </div>
          <hr>

            <hr>
        
          <div class="w3-container">
            <h5>Recent Comments</h5>
            <?php
                    include("database.php");                    
                    $sql = "SELECT * FROM invoice_slip ORDER BY Buy_Date DESC Limit 3";                        
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array ($result)){
                    
                    ?>
            <div class="w3-row">
              <div class="w3-col m2 text-center">
                <img class="w3-circle" src="./images/avatar3.png" style="width:96px;height:96px">
              </div>
              <div class="w3-col m10 w3-container">
                <h4>Customer - <?php echo $row ['Customer_Name']; ?> <span class="w3-opacity w3-medium"></span></h4>
                <p>Product Coad - <?php echo $row ['Product_Code']; ?></p>
                <p>Quantity - <?php echo $row ['Quantity']; ?></p>
                <p>Total Ammount - <?php echo $row ['Total_Amount']; ?></p><br>
              </div>
            </div>
            <?php
            }
           ?>
            
            <button class="w3-button w3-dark-grey" ><a href="./oderlist.php" style="text-decoration: none; color: white;" >More Order Details </a> <i class="fa fa-arrow-right"></i></button>
          
          <hr>

          <hr>
        
          <div class="w3-container">
            <h5>Recent Comments</h5>
            <?php
                    include("database.php");                    
                    $sql = "SELECT * FROM comment Limit 2";                        
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array ($result)){
                    
                    ?>
            <div class="w3-row">
              <div class="w3-col m2 text-center">
                <img class="w3-circle" src="./images/avatar3.png" style="width:96px;height:96px">
              </div>
              <div class="w3-col m10 w3-container">
                <h4>User - <?php echo $row ['Email']; ?> <span class="w3-opacity w3-medium"></span></h4>
                <p><?php echo $row ['Message']; ?></p><br>
              </div>
            </div>
            <?php
            }
           ?>
            
            <button class="w3-button w3-dark-grey" ><a href="Finance.php" style="text-decoration: none; color: white;" >More Comments </a> <i class="fa fa-arrow-right"></i></button>

           
         
         
           <!-- <div class="w3-row">
              <div class="w3-col m2 text-center">
                <img class="w3-circle" src="./images/avatar1.png" style="width:96px;height:96px">
              </div>
              <div class="w3-col m10 w3-container">
                <h4>User - ID008 <span class="w3-opacity w3-medium">Apr 28, 2021, 10:15 PM</span></h4>
                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
              </div>
              
            </div>-->
          </div>
          <br>
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
