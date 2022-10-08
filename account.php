<?php
   include('session.php');
   include("database.php");

   $errorname=""; $erroraddress=""; $errorcontact=""; $errorpwd="";$errormail="";$errornic="";$erroruser="";
   $validated = true;
   //$sid= session_id();
  /* if(session_status() == PHP_SESSION_ACTIVE){
      $type = $_SESSION['type'];
      if($type == 'normal') header("location: DashboardUser.php");
      if($type == 'admin') header("location: DashboardAdmin.php");
   } */
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      if(isset($_POST['register'])){  // register process

     
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $address= mysqli_real_escape_string($conn,$_POST['address']); 
        $contact = mysqli_real_escape_string($conn,$_POST['contact']);
        $user = mysqli_real_escape_string($conn,$_POST['user']); 
        $pwd1 = md5(mysqli_real_escape_string($conn,$_POST['pwd1']));
        $pwd2 = md5(mysqli_real_escape_string($conn,$_POST['pwd2'])); 
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $nic = mysqli_real_escape_string($conn,$_POST['nic']);
         
        if(!isset($name) || trim($name) === ''){
            $errorname = "Name Required!";
            $validated = false;
        }
        if(!isset($address) || trim($address) === ''){
            $erroraddress = "Address Required!";
            $validated = false;
        }
        if(!isset($contact) || trim($contact) === ''){
            $errorcontact = "Contact Required!";
            $validated = false;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errormail = "Valid Mail Required!";
            $validated = false;
        }
        if(!isset($nic) || trim($nic) === ''){
            $errornic = "NIc Required!";
            $validated = false;
        }
        if(!isset($user) || trim($user) === ''){
            $erroruser = "UserName Required!";
            $validated = false;
        }
        if($pwd1 != $pwd2){
            $errorpwd = "Passwords Should Match and Required!";
            $validated = false;
        }

        if($validated){
        // customer registration // first create login then the customer record
        $sql = "INSERT INTO login (`UserName`, `Password`) VALUES ( '$user' ,'$pwd1')";
        $result = mysqli_query($conn,$sql);

        $sql = "INSERT INTO customer (`Customer_NIC`, `Customer_Name`, `Customer_Address`, `Customer_ContactNo`, `Customer_Email`, `UserName`, `Password`) VALUES('$nic','$name','$address','$contact','$email','$user','$pwd1')";
        $result = mysqli_query($conn,$sql);
  
        $id = mysqli_insert_id($conn);
        echo '<script type="text/javascript">alert("' . 'Registration Success!' . '")</script>';
        
      }
      else {echo '<script type="text/javascript">alert("' . 'Invalid input! Registation Error'. '")</script>';
       }
   }
      else
      {
      // username and password sent from form 
      $user = mysqli_real_escape_string($conn,$_POST['user']); 
      $pwd = md5(mysqli_real_escape_string($conn,$_POST['pwd']));    
      $sql = "select * from customer where `UserName` = '$user' and `Password` = '$pwd'";
      $result = mysqli_query($conn,$sql);

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      

      if($count == 1) {    
         //session_start();     
         $_SESSION['login_user'] = $user;
         $_SESSION['nic'] = $row['Customer_NIC'];
         $_SESSION['name'] = $row['Customer_Name'];
         $_SESSION['address']= $row['Customer_Address'];
         $_SESSION['contact'] = $row['Customer_ContactNo'];
         $_SESSION['type'] = 'normal';
         header("location: index.html");
      }else {
          $sql = "select * from administrator where `UserName` = '$user' and `Password` = '$pwd'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $count = mysqli_num_rows($result);
      
          // If result matched $myusername and $mypassword, table row must be 1 row		
            if($count == 1) {
                //session_start();
                $_SESSION['login_user'] = $user;
                $_SESSION['type'] = 'admin';
                header("location: DashboardAdmin.php");
            }else {
                $error = "Your Login Name or Password is invalid";
                echo '<script type="text/javascript">alert("' . 'Username and Password are mismatched!' . '")</script>';   

            }
      }
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./rag.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/up2.gif" width="50px" alt=""></button>
        
    <div class="container">
        <div class="navbar" id="navbar">
            <div class="logo">
               <a href="./index.html">
                <div class="hover01 column">
                    <div>
                        <figure><img src="./images/logo.png" width="220" id="A"  alt=""  ></figure>
                    </div>
                </div>
                 </a>
            </div>
            <nav>
            <ul id="MenuItems">
                <li><a href="./index.html">Home</a></li>
                <li><a href="./products.php">Products</a></li>
                <li><a href="./about.html">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <li><a class="active2" href="./account.php">Account</a></li>
                <li><a href="./gallery.php">Gallery</a></li>
            </ul>
            </nav>
            <img src="./images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div> 
    
    <!---------------Account Page--------->
    <div style="margin-top: 15%;"></div>
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img class="mySlides w3-animate-fading" src="./images/Home1.png" alt="" style="width:100%">
                    <img class="mySlides w3-animate-fading" src="./images/Home2.png" alt="" style="width:100%">
                    <img class="mySlides w3-animate-fading" src="./images/Home3.png" alt="" style="width:100%">
                    <img class="mySlides w3-animate-fading" src="./images/Home4.png" alt="" style="width:100%">
                    <img class="mySlides w3-animate-fading" src="./images/Home5.png" alt="" style="width:100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" action="" method="post" >
                            <input type="text" name="user" placeholder="Username" required>
                            <input type="password" name="pwd" placeholder="Password" required>
                            <button type="submit" name="save" class="btn">Login</button>
                            <!--<a href="">Forgot Password</a>-->
                        </form>
                        <form id="RegForm" style="left:10%">
                            
                            <button type="button" class="btn" id="myBtn2" >Click Here to Register</button>
                                

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

 <!-----------footer--------------->
 <div class="footer">
    <div class="container">
        <div class="row">
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

   <!-- The Modal -->
   <div id="myModal" class="modal" >

    <!-- Modal content -->
    <div class="modal-content" style="width: 50%;">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Registration &nbsp<i class="fa fa-check-square-o"></i></h2>
        </div>
        <div class="modal-body">
                <div class="content">
                  <form class="form2" action="" method="post" >
                    <div class="user-details">
                      <div class="input-box">
                        <spanX class="details">NIC Number</spanX>
                        <input type="text" placeholder="Enter your NIC" name = "nic" required>
                        <span style="color:red"><?php echo $errornic; ?></span>
                      </div>
                      <div class="input-box">
                        <spanX class="details">Customer Name</spanX>
                        <input type="text" placeholder="Enter your name" name="name" required>
                        <span style="color:red"><?php echo $errorname; ?></span>
                      </div>
                      <div class="input-box">
                        <spanX class="details">Address</spanX>
                        <input type="text" placeholder="Enter your Address" name="address" required>
                        <span style="color:red"><?php echo $erroraddress; ?></span>
                      </div>
                      <div class="input-box">
                        <spanX class="details">Contact Num</spanX>
                        <input type="num" placeholder="Enter your Contact number" name="contact" required>
                        <span style="color:red"><?php echo $errorcontact; ?></span>
                      </div>
                      <div class="input-box">
                        <spanX class="details">E-mail</spanX>
                        <input type="E-mail" placeholder="Enter your E-mail" name="email" required>
                        <span style="color:red"><?php echo $errormail; ?></span>
                      </div>
                      <div class="input-box">
                        <spanX class="details">Usre Name</spanX>
                        <input type="text" placeholder="Enter Your User Name" name ="user" required>
                        <span style="color:red"><?php echo $erroruser; ?></span>
                      </div>
                      <div class="input-box">
                        <spanX class="details">Password</spanX>
                        <input type="Password" placeholder="Enter Your Password" name="pwd1" required>
                      </div>
                      <div class="input-box">
                        <spanX class="details">Conform Password</spanX>
                        <input type="Password" placeholder="Enter Your Password Again" name="pwd2" required>
                        <span style="color:red"><?php echo $errorpwd; ?></span>
                      </div>
                    </div>
                   
                    <div class="button">
                       
                        <input type="submit" name="register" value="Register">
            
                    </div>
                </form>
        </div>
        <div class="modal-footer" style="margin: 0; padding: 0;">
            <a href="./index.html"><img src="./images/logo2.png" width="50%" style="padding: 10px; " alt=""></a>
        </div>
        </div>

</div>

    <!------------------js for navBar and TOPscroll---------------------------->
    <script>
        var mybutton = document.getElementById("myBtn"); //button of top scroll
        // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
          if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "20px 10px";
            var image = document.getElementById("A");
                image.style.width = "100px";
            document.getElementById("navbar").style.backgroundColor="#ffffff";
          } else {
            document.getElementById("navbar").style.padding = "60px 10px";
            var image = document.getElementById("A");
                image.style.width = "200px";
            document.getElementById("navbar").style.backgroundColor="#ffffff00";   //End navbar
          }
            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) { //TOP scroll 
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
            function topFunction() { // When the user clicks on the button, scroll to the top of the document
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
        </script>
<!------------------home slider---------------------------->
<script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 5000);    
    }
    </script>

<!------------------js for POPUP Buttons menu---------------------------->
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn2");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

<!------------------js for toggle menu---------------------------->
        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                    {
                        MenuItems.style.maxHeight = "200px"
                    }
                else
                    {
                        MenuItems.style.maxHeight = "0px";
                    }
            }
        </script>

<!--------------------js for toggle Form-->
        <script>

            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");

            function login(){
                    
                    LoginForm.style.transform = "translateX(300px)";
                    RegForm.style.transform = "translateX(300px)";
                    Indicator.style.transform = "translateX(0px)";
                }
                function register(){
                    
                    LoginForm.style.transform = "translateX(0px)";
                    RegForm.style.transform = "translateX(0px)";
                    Indicator.style.transform = "translateX(100px)";
                }

               

        </script>


</body>
</html>