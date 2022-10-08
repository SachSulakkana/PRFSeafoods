<?php
   include('session.php');
   include("database.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $listOfItems = $_SESSION['products'];
      $nic = $_SESSION['nic'];
      $name = $_SESSION['name'];
      $address = $_SESSION['address'];
      $contact = $_SESSION['contact'];
      foreach($listOfItems as $item) {
         //$item['filename'];
         //$item['filepath'];
         $tempCode = $item->code;
         $tempName = $item->productName;
         $tempQuantity = $item->quantity;
         $tempPrice = $item->price;

         $sql = "INSERT INTO orderproduct (`Order_No`, `Product_Name`, `Product_Code`, `Quantity`, `Customer_NIC`) VALUES (0,'$tempName','$tempCode','$tempQuantity','$nic')";
         $result = mysqli_query($conn,$sql);
         $id = mysqli_insert_id($conn);
         //var_dump($id);
         $sql = "INSERT INTO invoice_slip (`Invoice_No`, `Product_Name`, `Product_Code`, `Quantity`, `Total_Amount`, `Customer_Name`, `Customer_Address`, `Customer_ContactNo`, `Order_No`) VALUES(0,'$tempName','$tempCode','$tempQuantity','$tempPrice','$name','$address','$contact','$id')";
         $result = mysqli_query($conn,$sql);
       }

      $state= mysqli_real_escape_string($conn,$_POST['state']); 
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $address = mysqli_real_escape_string($conn,$_POST['address']); 
      $contact = mysqli_real_escape_string($conn,$_POST['contact']);
      $email = mysqli_real_escape_string($conn,$_POST['email']); 
      
      $sql = "INSERT INTO payment (`Payement_No`, `Customer_Name`, `Customer_Email`, `Customer_ContactNo`, `Customer_Address`, `Province`) VALUES (0,'$name', '$email', '$contact', '$address','$state')";
      $result = mysqli_query($conn,$sql);
      $id = mysqli_insert_id($conn);
      if($id > 0){
          // success
          echo '<script type="text/javascript">alert("' . 'Checkout Successfully!' . '"); window.location.href="index.html";</script>';
          //header("location: index.html");
      }
      else{
          // unsuccess
          echo '<script type="text/javascript">alert("' . 'Something Went Wrong!' . '")</script>';
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="./account.php">Account</a></li>
                <li><a class="active2" href="./CreditMethod.php">Payment</a></li>
            </ul>
            </nav>
            <img src="./images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div> 
    
    <!----------Credit API--------------->
    <div style="margin-top: 15%;"></div>
    <div class="container">
        <div class="row">
            <img src="./images/credit-approved.png" style="width: 25%;">
        </div>
        <div class="row" style="margin-bottom: 35px;">
            <h1 style="color: red; font-weight: bold;">Checkout  &nbsp<i class="fa fa-check-square-o"></i> </h1>
        </div>
        <div class="row">
            <div class="rowPay">
            <div class="col-75">
                <div class="containerPay">
                <form action="" method="post">
                
                    <div class="rowPay">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="name" placeholder="John M. Doe" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="john@example.com" required>
                        <label for="contact"><i class="fa fa-volume-control-phone"></i> Contact</label>
                        <input type="text" id="contact" name="contact" placeholder="07X XXX XXXX" required>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="Colombo" required>
                        <label for="country"><i class="fa fa-road"></i> Country</label>
                        <input type="text" id="country" name="country" placeholder="Sri Lanka" required>

                        <div class="rowPay">
                        <div class="col-50">
                            <label for="state">State/Province</label>
                            <input type="text" id="state" name="state" placeholder="WP" required>
                        </div>
                        <div class="col-50">
                            <label for="zip">Zip</label>
                            <input type="text" id="zip" name="zip" placeholder="10001" required>
                        </div>
                        </div>
                        <label for="date"><i class="fa fa-calendar-check-o"></i> When you want Delivery</label>
                         <input type="datetime-local" id="date" name="ddate" placeholder="" required>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Credit</label><hr>
                        <p>Thank you for dealing with us. We will make arrangements to receive your order within 2 weeks. Please be kind to complete the payment within two months. We are grateful for the trust you have placed in us.</p>
                        <div class="icon-containerPay">
                            <img src="./images/credit.png" style="width: 25%;" alt="">
                         </div>
                        <p style=" color: crimson;">*If you neglect to make your payment within 45 days, Keep in mind that our company has the power to take legal action.<hr><br></p>
                        <ul style="padding-left: 10%;">
                            <li style=" color: #075800;">
                                <li style=" color: #075800;">
                                <i class="fa fa-spinner fa-spin"></i>&nbsp Usually Delivery takes 2 or 3 weeks
                            </li>
                                <i class="fa fa-spinner fa-spin"></i>&nbsp Free delivery to Negambo & Dikowita
                            </li>
                            <li style=" color: #ff0000;">
                                <i class="fa fa-spinner fa-spin"></i>&nbsp Delivery Charge may be apply to other area
                            </li>
                            <li style=" color: #ff0000;">
                                <i class="fa fa-spinner fa-spin"></i>&nbsp Delivery Cost : Rs. 350/- per order
                            </li>
                        </ul><br>
                        
                        <p style="text-align: center;"><input id="field_terms" type="checkbox" required name="terms">
                        <label for="field_terms">I accept the <u>Terms and Conditions</u></label></p>
                        
                    </div>
                    </div>
               <!-- </form> -->
                    <label >
                    <input type="checkbox" checked="checked" name="sameadr" required>&nbsp Shipping address same as billing</input>
                    </label>
                    <input type="submit" value="Continue to checkout" class="btnPay">
                 </form>
                    <!-- The Modal -->
                    <div id="myModal" class="modal" >

                        <!-- Modal content -->
                        <div class="modal-content" style="width: 50%; height: auto; background-color: #F1F6F6;">
                        <div class="modal-header">
                            <span class="close">&times;</span>
                            <h2><i class="fa fa-check-square-o"></i>&nbsp Checkout Successed...! </h2>
                        </div>
                        <div class="modal-body">
                            <img src="./images/suc.gif" style="width: 40%; height: auto; margin-left: 30%;">
                            <table >
                                <tr>
                                    <td style="width:50%">
                                        <button type="button" class="cancel-btn" id="Exit" style="font-size:20px;"><i class="fa fa-times-circle"></i>&nbsp Exit </button>
                                    </td>
                                    <td style="width:50%">
                                        <button type="button" class="buy-btn" id="downInvoice"><i class="fa fa-download"></i>&nbsp Download Invoice</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <h3 style="font-size: 15px;"><i class="fa fa-handshake-o"></i>&nbsp Thank you, Shopping with us...<dive style="float: right;"><i class="fa fa-spinner fa-spin"></i></dive></h3>
                        </div>
                        </div>
                    
                    </div>

                </div>
            </div>
            <div class="col-25">

            <?php
                    include("database.php");
                   
                    $tot = $_SESSION['total'] + 350;
                    
                    ?>
                <div class="containerPay">
                    <h4>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                    <p><a href="#"><?php echo $_SESSION['p']; ?></a> <span class="price">Rs:<?php echo $_SESSION['unit']; ?></span></p>
                    <hr>
                    <p>Block <span class="price" style="color:black"><b><?php echo $_SESSION['block']; ?></b></span></p>
                    <p>Total <span class="price" style="color:black"><b>Rs:<?php echo $_SESSION['total']; ?></b></span></p>
                    <p>Delivery <span class="price" style="color:black"><b>Rs:350.00</b></span></p>
                    <hr>
                    <p style="color:black; font-weight: bold;">Net Total <span class="price" style="color:black"><b>Rs:<?php echo $tot; ?></b></span></p>
                    </div>

             <!--   <div class="containerPay">
                    <h4>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                    <p><a href="./001-IllexSquid.html">Illex Squid - 001</a> <span class="price">Rs:590.00</span></p>
                    <hr>
                    <p>Block <span class="price" style="color:black"><b>03</b></span></p>
                    <p>Total <span class="price" style="color:black"><b>Rs:1770.00</b></span></p>
                    <p>Delivery <span class="price" style="color:black"><b>Rs:350.00</b></span></p>
                    <hr>
                    <p style="color:black; font-weight: bold;">Net Total <span class="price" style="color:black"><b>Rs:2120.00</b></span></p>
                    </div> -->
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



</body>
</html>