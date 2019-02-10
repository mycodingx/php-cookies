<?php
require_once('page.php');
$token = generate_token(); 
$data = $_COOKIE;
$message = "";
$clear = "";
if(!empty($data['token']))
{   
    $message .="<p>Hi ".$data['firstname']." ".$data['lastname']."</p>";
    $message .="<p>Thanks you for registering in ".$data['course']."</p>";
    $message .="<p>You are enrolled in ".$data['time']." offering of this course.</p>";
    $message .= "<p>Your ".$data['card']." will be charged in the amoung of $300.00.</p>";
    $message .= "<p>Your order ID is : 0016254.</p>";
    $message .= "<p>We recommed that you print this page as a proof of purchase.</p>";
    echo $message;
    $clear .= "<p>";
    $clear .= "<form method='post' action=''>";
    $clear .= "<input type='submit' value='Click twice to go back' name='clear'>";
    $clear .= "</form>";
    $clear .= "</p>";
    echo $clear;
}
else{
  

?>

<!DOCTYPE html>
<html>
<head>
<style>
.form{
    border: 2px solid black;
    height:auto;
    width:400px;
    padding:10px;
}
.form-group{
    padding-bottom:10px;
}
.form-group input {
    margin-top: 5px;
    margin-bottom: 5px;
    display:inline-block;
    vertical-align:middle;
    margin-left:20px
}

.form-group select {
    margin-top: 5px;
    margin-bottom: 5px;
    display:inline-block;
    vertical-align:middle;
    margin-left:20px
}

.form-group label {
    display:inline-block;
    float: left;
    padding-top: 5px;
    text-align: right;
    width: 200px;
}

.form-group .fieldgroup{
   float: left;
   width: auto;
   margin-left: 3em;
}
</style>
</head>
<body>
<center>
<form class="form" method="POST" action="page.php">
<div class="form-group">
  <label>First name:</label>
  <input type="text" name="firstname" placeholder="First Name" required>
</div>
<div class="form-group">
 <label>Last name:</label>
  <input type="text" name="lastname" placeholder="Last Name" required>
 </div>
 <div class="form-group">
 <label> Course Selection:</label>
 <select name="course">
  <option value="COMP2098">COMP2098</option>
  <option value="COMP2080">COMP2080</option>
  <option value="COMP3035">COMP3035</option>
  <option value="COMP2077">COMP2077</option>
</select>
 </div>
 <div class="form-group">
 <label>Mode:</label>
 <div class="fieldgroup">
 <input type="radio" name="time" value="day time" checked> Day Time<br>
  <input type="radio" name="time" value="evening time"> Evening Time<br>
 </div>  
 </div>
 <div class="form-group">
 <label>Payment Card:</label>
 <select name="card">
  <option value="Visa">Visa</option>
  <option value="MasterCard">MasterCard</option>
  <option value="Amrican Express">Amrican Express</option>
</select>
 </div>
 <div class="form-group">
 <label>Expiry Date (MMYY):</label>
  <input type="text" name="date" placeholder="MMYY" required>
 </div>
 <input type="hidden" value="<?=$token?>" name="token">
  <input type="submit" value="submit" name="submit">
</form> 
</center>
</body>
</html>

<?php
}
if(isset($_POST['clear'])){
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
    }
    
}
?>




