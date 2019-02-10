<?php
if(isset($_POST['submit'])){
    $post = $_POST;
    $process = process_data($post);
    if($process){
        header("Location: index.php");
      }else{
        header("Location: index.php");  
      }
   
}


function process_data($data){
    
    $cookie_data = [];
    if(!empty($data)){
     
    $fname = !empty($data['firstname']) ? $data['firstname'] : 'firstname';
    $lname = !empty($data['lastname']) ? $data['lastname'] : 'lastname';
    $course = !empty($data['course']) ? $data['course'] : 'course';
    $time = !empty($data['time']) ? $data['time'] : 'time';
    $card = !empty($data['card']) ? $data['card'] : 'card';
    $date = !empty($data['date']) ? $data['date'] : 'date';
    $token = !empty($data['token']) ? $data['token'] : generate_token();
   
  setcookie( "firstname", $fname, time() + 36000 );
  setcookie( "lastname", $lname, time() + 36000 );
  setcookie( "course", $course, time() + 36000 );
  setcookie( "time", $time, time() + 36000 );
  setcookie( "card", $card, time() + 36000 );
  setcookie( "date", $date, time() + 36000 );
  setcookie( "token", $token, time() + 36000 );
  if(isset($_COOKIE['token'])){
  $cookie_data = [
      'firstname' => $_COOKIE['firstname'],
      'lastname' => $_COOKIE['lastname'],
      'course' => $_COOKIE['course'],
      'time' => $_COOKIE['time'],
      'card' => $_COOKIE['card'],
      'date' => $_COOKIE['date'],
      'token' => $_COOKIE['token'] 
  ];
    }else{
        $cookie_data = false;
    }
  return $cookie_data;
}
}

function generate_token()
{
  $token = md5(uniqid(rand(), true));
  return $token;
}
?>