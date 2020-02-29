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
  <h2>Items present</h2>
  <p>updation for items</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product name</th>
        <th>Product brand</th>
        <th>Product Category</th>
        <th>Retail Price</th>
        <th>Discounted Price</th>
        <th>Related image</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
          <?php
        // put your code here
        
         $conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
            $sql = "SELECT * FROM items where seller_id={$_SESSION['email']}; ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
      <tr>
        <td><?php echo $row['pid']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['product_brand']?></td>
        <td><?php echo $row['product_category']?></td>
         <td><?php echo $row['retail_price']?></td>
        <td><?php echo $row['discounted_price']?></td>
        <td><?php echo $row['images']?></td>
        <td><?php echo $row['description']?></td>
        <td><a href="updaterofparticularitem.php?thisproduct=<?php echo $row['pid']?>" class="btn btn-success">Edit this</a></td>
        
        
      </tr>
        <?php
                
    }
}
mysqli_close($conn);
            ?>
    </tbody>
  </table>
</div>
    </body>