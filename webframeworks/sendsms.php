<html>
    <body
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
<?php
    $c=$_SESSION['confirm'];
    if(TRUE)
    {
 ?>
           var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=+91 9491699911&authkey=270930AC4X0FVjmPED5ca60474&message=Hello! This is a test message&country=91",
  "method": "GET",
  "headers": {}
};

$.ajax(settings).done(function (response) {
  document.write('done');
});
<?php 
    }
 else {
        echo 'not done';
}
?>

</script>
</body>
</html>