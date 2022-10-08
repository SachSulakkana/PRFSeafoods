
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <div style="margin-top: 15%;">
    <div class="hover14 column">
           <figure><img src="./images/productHome.jpeg" width="100%" height="200px" style="z-index: 1;" alt=""></figure>
    </div>
    </div>
    
    <!----features products------>
    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
            <div id="section1"></div>
            <!--<select>
                <option>Default sorting</option>
                <option>sort by price</option>
                <option>sort by populirity</option>
                <option>sort by ratings</option>
                <option>sort by sale</option>
            </select>-->
        </div><hr>
        <h2 class="title"  >OUR PRODUCTS</h2>
        <div class="row">
        <?php
                    include("database.php");
                    $sql = "SELECT * FROM product ";                        
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array ($result)){

                    
                    ?>
            <div class="col-4">
                <a href="./productDetail.php?product_code=<?php echo $row ['Product_Code']; ?>"> <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row ['Product_Imge'] ).'"  alt=""/>'; ?>      
                <h4><?php echo $row ['Product_Name']; ?> - <?php echo $row ['Product_Code']; ?></h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>Rs:<?php echo $row ['Price']; ?></p>
            </div>
            
            <?php
        }
        ?>
        </div>


        <div class="page-btn">
            <span>1</span>
            <span>&#8594;</span>
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