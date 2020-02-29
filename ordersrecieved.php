<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require 'includes/common.php';
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="webframeworks\bootstrap\css\bootstrap.css" type="text/css" />

    <script src="webframeworks\bootstrap\js\jquery-3.3.1.min.js" type="text/javascript"/>
    </script>

    <script src="webframeworks\bootstrap\js\bootstrap.js" type="text/javascript"/>
   </script>
   <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
         <?php
    require 'includes/header.php';
    ?>
      
        
        <div class="container">
  <h2>Orders Received</h2>
  <p>check for items and address before confirming</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Ordered By</th>
        <th>Product Ordered</th>
        <th>Delivery Address</th>
        <th>Accept/Reject</th>
      </tr>
    </thead>
    <tbody>
          <?php
        // put your code here
        
         $conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
            $sql = "SELECT u.id as uid,ui.id,u.name,users_id,product_name,contact,city,address,ui.status,i.discounted_price FROM users u,items i,users_items ui where seller_id={$_SESSION['email']} and i.pid=ui.item_id and ui.users_id=u.id and ui.status='Requested merchant'; ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
      <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['contact'].",".$row['address'].",".$row['city']?></td>
        
        <td><a href="confirmationbymerchant.php?oid=<?php echo $row['id']?>&uid=<?php echo $row['uid']?>&pname=<?php echo $row['product_name']?>&dprice=<?php echo $row['discounted_price']?>" class="btn btn-success">Accept</a></td>
        <td><a href="rejectionbymerchant.php?oid=<?php echo $row['id']?>&uid=<?php echo $row['uid']?>&pname=<?php echo $row['product_name']?>&dprice=<?php echo $row['discounted_price']?>" class="btn btn-danger">Reject</a></td>
      </tr>
        <?php
                
    }
}
mysqli_close($conn);
            ?>
    </tbody>
  </table>
</div>
        <div class="container">     
  <h2>Orders Accepted</h2>
  <p>confirmed by you</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Ordered By</th>
        <th>Product Ordered</th>
        <th>Delivery Address</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
          <?php
        // put your code here
        
         $conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
            $sql = "SELECT ui.id,users_id,u.name,product_name,contact,city,address,ui.status,i.discounted_price FROM users u,items i,users_items ui where seller_id={$_SESSION['email']} and i.pid=ui.item_id and ui.users_id=u.id and ui.status='Confirmed'; ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
      <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['contact'].",".$row['address'].",".$row['city']?></td>
        
        <td><span class="label label-success">Order Accepted</span></td>
       
      </tr>
        <?php
                
    }
}
mysqli_close($conn);
            ?>
    </tbody>
  </table>
</div>
        
        <div class="container">     
  <h2>Orders Rejected</h2>
  <p>Rejected by you</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Ordered By</th>
        <th>Product Ordered</th>
        <th>Delivery Address</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
          <?php
        // put your code here
        
         $conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
            $sql = "SELECT ui.id,u.name,users_id,product_name,contact,city,address,ui.status,i.discounted_price FROM users u,items i,users_items ui where seller_id={$_SESSION['email']} and i.pid=ui.item_id and ui.users_id=u.id and ui.status='Rejected'; ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
      <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['contact'].",".$row['address'].",".$row['city']?></td>
        
        <td><span class="label label-danger">Order Rejected</span></td>
       
      </tr>
        <?php
                
    }
}
mysqli_close($conn);
            ?>
    </tbody>
  </table>
</div>

        
         <?php
    require 'includes/footer.php';
    ?>
    </body>
</html>
