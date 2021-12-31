<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
  <input type="text" name="receiver" placeholder="To..."><br><br>
  <input type="text" name="subject" placeholder="Subject..."><br><br>
  <textarea name="body"></textarea><br><br><br>
  <input type="submit" name="submit" value="SEND!">
 </form>  

<?php

$conn = mysqli_connect("", "", "", "");

if(isset($_POST['submit'])){
  if(isset($_POST['receiver']) && isset($_POST['subject']) && isset($_POST['body'])){
    if(!empty($_POST['receiver']) && !empty($_POST['body'])){
      $receiver = mysqli_real_escape_string($conn, $_POST['receiver']);
      $subject = mysqli_real_escape_string($conn, $_POST['subject']);
      $body = mysqli_real_escape_string($conn, $_POST['body']);
      
      $headers = "From: info@anstechnologies.xyz" . "\r\n" . "CC: somebodyelse@example.com";
      $sent = mail($to,$subject,$txt,$headers);
      
      if($sent){
        echo 'Mail sent';
      }else{
        echo 'Failed to send the mail';
      }
?>
