
<?php
   include('session.php');
   include("database.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $message = mysqli_real_escape_string($conn,$_POST['Message']);
      $country= mysqli_real_escape_string($conn,$_POST['country']); 
      $fname = mysqli_real_escape_string($conn,$_POST['firstname']);
      $lname = mysqli_real_escape_string($conn,$_POST['lastname']); 
      $subject = mysqli_real_escape_string($conn,$_POST['Subject']);
      $email = mysqli_real_escape_string($conn,$_POST['Email']); 
      
      $sql = "INSERT INTO comment (`FirstName`, `LastName`, `Country`, `Email`, `Message`) VALUES ('$fname', '$lname', '$country', '$email','$message')";
      $result = mysqli_query($conn,$sql);
      echo '<script type="text/javascript">alert("' . 'Comment Saved Successfully!' . '")</script>';
     
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./style.css">
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
                <li><a class="active2" href="./contact.php">Contact</a></li>
                <li><a href="./account.php">Account</a></li>
                <li><a href="./gallery.php">Gallery</a></li>    
            </ul>
            </nav>
            <img src="./images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div> 
    <div style="margin-top: 15%;">
    <div class="hover14 column">
        <div>
            <figure><img src="./images/Contact.jpg" width="100%" height="200px" alt=""></figure>
        </div>
    </div>
    </div>
    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="hover01 column">
                    <div>
                        <figure><img src="./images/find-us.png" width="100px" alt=""></figure>
                    </div>
                </div>
                <h2 >How To Find Us</h2>
                <br>
                <p>If you have any questions, just fill in the contact form, and we will answer you shortly. If you are living nearby, come visit P.R.F. Seafood (Pvt) Ltd at our comfortable offices or Contact other option.</p>
                <br><hr><br>
                <h2>Get in touch with us</h2>
                <br>
                <ul>
                    <li>rushan@prfseafoods.com</li>
                    <li>info@prfseafoods.com (USA)</li>
                </ul>
                <br>
                <ul>
                    <li>Tel: +94 32 22 48335 (Office)</li>
                    <li>Tel: +94 32 22 43312 (Cold Storage)</li>
                    <li>Fax: +94 32 22 49095 (Office)</li>
                </ul>
                <br>
                <ul>
                    <li>Mob: +94 77 77 07050</li>
                    <li>(Rushan Fernando - Managing Director)</li>
                </ul>
                <br><hr><br>
                <h2>Our Location</h2>
                <br>
                    <ul>
                        <li>P.R.F. Seafood (Pvt) Ltd.</li>
                        <li>No.159, Pahala Para, Thoduwawa,</li>
                        <li>Sri Lanka.</li>
                        <li>Postal code - 61224</li>  
                    </ul>
            </div>
            <div class="col-2">
                <div class="container2">
                    <br>
                    <h2>SEND US A MESSAGE</h2>
                    <br><hr><br>
                    <p>Our friendly customer service representatives are committed to answering all your questions and meeting any need you may have. We would love to hear from you! Please fill out the form below so we may assist you.</p><br>
                    <form action = "" method = "post"> <!--action_page.php-->
                        
                      <label for="fname">First Name</label>
                      <input type="text" id="fname" name="firstname" placeholder="Your name..">
                  
                      <label for="lname">Last Name</label>
                      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                  
                      <label for="country">Country</label>
                      <select id="country" name="country">
                        <option value="sri_lanka">Sri Lanka</option>
                        <option value="australia">Australia</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                      </select>

                      <label for="email">Email</label>
                      <input type="text" id="email" name="Email" placeholder="Your email..">

                      <label for="subject">Subject</label>
                      <input type="subject" id="subject" name="Subject" placeholder="Your Subject..">
                  
                      <label for="message">Message</label>
                      <textarea id="message" name="Message" placeholder="Write something.." style="height:200px"></textarea>
                  
                      <input type="submit" value="Submit">
                  
                    </form>
                    </div>
            </div>
        </div>
        <div class="rowA">
            <div class="col-2A">
            <br><hr><br>
            <h1 style="text-align: center;">Location</h1>
                <br>
                    <div id="googleMap" style="width:100%;"></div>

                    <div class="mapouter"><div class="gmap_canvas">
                        <iframe width="100%" height="400px" id="gmap_canvas" src="https://maps.google.com/maps?q=P.R.F.%20SEAFOOD%20(PVT)%20LTD%20panadura&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://putlocker-is.org"></a>
                        <br>
                        <style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}</style>
                        <a href="https://www.embedgooglemap.net">google map html widget</a>
                        <style>.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}</style></div>
                    </div>
                    <p>If you have any questions, just fill in the contact form, and we will answer you shortly. If you are living nearby, come visit P.R.F. Seafood (Pvt) Ltd at our comfortable offices or Contact other option.</p>
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
</body>
</html>
