<?php
include('session.php');
include("database.php");
include("staticValues.php");

//$productsInCart = null;


if(array_key_exists( "order",$_POST)) {
    //session_start();
    $item = mysqli_real_escape_string($conn,$_POST['itemCode']);
    $qty = mysqli_real_escape_string($conn,$_POST['quantity']); 
    
    //$productsInCart = $_SESSION['products'];
    //if($productsInCart == null)  $productsInCart =array();
    $sql = "select * from product where Product_Code = '$item'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
    $uprice = $row['Price'];
    $price = $uprice * $qty;
    $name= $row['Product_Name'];
    addItemtoCart($item, $name, $qty, $uprice, $price);
}

function addItemtoCart($code,$name, $qty, $uprice, $price) {
     $newProduct = new Product();
     $newProduct->code = $code;
     $newProduct->productName = $name;
     $newProduct->quantity = $qty;
     $newProduct->unitPrice = $uprice;
     $newProduct->price = $price;     

     $productsInCart = $_SESSION['products'];
     if($productsInCart == null) $productsInCart = array($newProduct);
     else array_push($productsInCart,$newProduct);
     $_SESSION['products'] = $productsInCart;
     $_SESSION['total']  = $price;
     $_SESSION['block']  = $qty;
     $_SESSION['unit'] = $uprice;
     $_SESSION['p'] = $name;
     //var_dump($productsInCart);
     echo '<div id="myModal" class="modal"> <div class="modal-content"> <div class="modal-header">  <h2>Select Payment Methord &nbsp<i class="fa fa-check-square-o"></i></h2> </div> <div class="modal-body"> <a href="./CashOnDelivery.php" class="select-btn"><i class="fa fa-truck"></i> &nbsp Cash on Delivery  &#8594; </a> <a href="./BankDeposite.php" class="select-btn"><i class="fa fa-institution"></i>&nbsp Bank Deposite  &#8594; </a> <a href="./CreditMethod.php" class="select-btn"><i class="fa fa-money"></i>&nbsp Credit Method&#8594; </a> <a href="./CreditDebite-cards.php" class="select-btn"><i class="fa fa-credit-card-alt"></i>&nbsp Credit/Debite Card  &#8594; </a> <a href="./products.php"><button type="button" class="cancel-btn">Cancel  &#8594; </button></a></div> <div class="modal-footer"> <h3 style="font-size: 15px;"><i class="fa fa-handshake-o"></i>&nbsp Thank you, Shopping with us...</h3> </div> </div> </div>';
    // header("location: cashOnDelivery.php");
}
   
?>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Payment Method</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./rag.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body>
    <div class="container">
    </div>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
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