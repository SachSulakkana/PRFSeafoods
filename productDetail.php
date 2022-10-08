<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Product</title>
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
                    <li><a class="active2" href="./products.php">Products</a></li>
                    <li><a href="./about.html">About</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./account.php">Account</a></li>
                    <li><a href="./gallery.php">Gallery</a></li>
                </ul>
                </nav>
                <img src="./images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div> 
    
   
    <!------------singal product details--------------->
    <div style="margin-top: 15%;"></div>
    <div class="small-container single-product">
        <div class="row">
        <?php
                    include("database.php");
                    session_start();
                    
                    $current_page = $_GET['product_code'];

                    $sql = "SELECT * FROM product WHERE Product_Code = '$current_page'";                        
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array ($result)){

                    
                    ?>
            <div class="col-2">
                <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_Imge'] ).'" width="100%" id="ProductImg" alt=""/>'; ?>
            
               <div class="small-img-row">
                    <div class="small-img-col">
                        
                        <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_Imge'] ).'" width="100%" class="small-img" alt=""/>'; ?>

                    </div>
                    <div class="small-img-col">
                        <?php 
                             
                                echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_Imge1'] ).'" width="100%" class="small-img" alt=""/>'; 
                        
                        ?>

                    </div>
                    <div class="small-img-col">
                        <?php   
                         
                              echo   '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_Imge2'] ).'" width="100%" class="small-img" alt=""/>'; 
                          
                        ?>

                    </div>
                    <div class="small-img-col">
                        <?php 
                            
                               echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_Imge3'] ).'" width="100%" class="small-img" alt=""/>'; 
                            
                        ?>

                    </div>
                    <div class="small-img-col">
                        <?php 
                            
                               echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_image4'] ).'" width="100%" class="small-img" alt=""/>'; 
                            
                        ?>

                    </div>
                </div>
            
            
            </div>
        
            <div class="col-2">
                <p><a href="./index.html">Home </a><a href="./products.php">/ BAITS PRODUCTS</a></p><hr><br>
                <h1><span style="font-size: 40px;"><?php echo $row ['Product_Name']; ?></span></h1>  
                <h4 style="color: red; ">ITEM CODE : <?php echo $row ['Product_Code']; ?></h4>
                <h4 style="margin: 0; padding: 0;">Rs:<?php echo $row ['Price']; ?> (LKR)</h4>
                <br>
                <h4 style="margin: 0; padding: 0;">Weight per block   : <?php echo $row ['Store']; ?></h4>
                <div class="woocommerce">
                    <div class="div product">
                        <!--<p class="p stock out-of-stock">out-of-stock</p>  
                        <p class="p stock available-on-backorder">Stock-on-backorder</p>--> 
                        <!-- <p class="p stock">Stock-available</p>   --> 
                    </div>   
                </div> 
                
                <h3 style="margin-bottom: 5px;">Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo $row ['Product_Description']; ?></p><br><p style="color: crimson;">Delivery available and free delivery to Negambo and Dikowita.
                </p>
                <br>
                <form method="post" action="cart.php">
                <input type="number" value="<?php echo $row ['Product_Code']; ?>" name="itemCode" hidden >
                <h3 style="padding: 0; margin: 0;">Block : <input type="number" value="1" name="quantity" style="width: 55px; padding: 0; margin-top: 15px;" ></h3><br>
                <a href="./products.php"><button type="button" class="cancel-btn">Cancel  &#8594; </button></a>
                <button type="submit" class="buy-btn" name="order" >Buy It Now  &#8594; </button>
                </form>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Select Payment Methord &nbsp<i class="fa fa-check-square-o"></i></h2>
                    </div>
                    <div class="modal-body">
                        <a href="./CashOnDelivery.html" class="select-btn"><i class="fa fa-truck" ></i> &nbsp Cash on Delivery  &#8594; </a>
                        <a href="./BankDeposite.html" class="select-btn"><i class="fa fa-institution" \></i>&nbsp Bank Deposite  &#8594; </a>
                        <a href="./CreditMethod.html" class="select-btn"><i class="fa fa-money" \></i>&nbsp Credit Method&#8594; </a>
                        <a href="./CreditDebite-cards.html" class="select-btn"><i class="fa fa-credit-card-alt" ></i>&nbsp Credit/Debite Card  &#8594; </a>
                    </div>
                    <div class="modal-footer">
                        <h3 style="font-size: 15px;"><i class="fa fa-handshake-o"></i>&nbsp Thank you, Shopping with us...</h3>
                    </div>
                    </div>
                
                </div>
                 <!--End Modal -->
            </div>
            <?php
        }
        ?>
        </div>
    </div>

    <!-----title----------------->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p><a href="./products.php">View More</a></p>
        </div>
    </div>
    
    <!----features products------>
    <div class="small-container">
            <div class="row">
                                
                <?php
                    include("database.php");
                    //session_start();
                    
                    //$current_page = $_GET['product_code'];

                    $sql = "SELECT * FROM product limit 4";                        
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array ($result)){

                    
                    ?>


                <div class="col-4">
                    <!--<img src="./images/Products/Flying Fish/1.jpg" alt="">-->
                    <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_Imge'] ).'" alt=""/>'; ?>
            
                    <h4><?php echo $row ['Product_Name']; ?> - <?php echo $row ['Product_Code']; ?></h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>Rs: <?php echo $row ['Price']; ?></p>
                </div>

                <?php
        }
        ?>

                
                
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

<!---------------------js for product gallery-------------------------------------------->

        <script>
            var ProductImg = document.getElementById("ProductImg");
            var SmallImg = document.getElementsByClassName("small-img");

                SmallImg[0].onclick = function(){
                    ProductImg.src = SmallImg[0].src;
                }
                SmallImg[1].onclick = function(){
                    ProductImg.src = SmallImg[1].src;
                }
                SmallImg[2].onclick = function(){
                    ProductImg.src = SmallImg[2].src;
                }
                SmallImg[3].onclick = function(){
                    ProductImg.src = SmallImg[3].src;
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