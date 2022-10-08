<?php
   include('database.php');

   class Product
   {
    public $code;
    public $productName;
    public $quantity;
    public $unitPrice;
    public $price;
   }
   
   session_start();
   
   if(isset($_SESSION['login_user'])){
      $user_check = $_SESSION['login_user'];
      $ses_sql = mysqli_query($conn,"select UserName from login where UserName = '$user_check' ");
      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
      $login_session = $row['UserName'];
   }
   
   if(!isset($_SESSION['login_user']) && !strpos($_SERVER['REQUEST_URI'], 'account.php')){
      header("location:account.php");
      die();
   }

   if(strpos($_SERVER['REQUEST_URI'], 'account.php') && isset($_SESSION['login_user']) )
   {
      $type = $_SESSION['type'];
      if($type == 'normal') header("location: DashboardUser.php");
      if($type == 'admin') header("location: DashboardAdmin.php");
   }

?>