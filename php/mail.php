<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="vitaliy201982@gmail.com"; //"yourmail@yoursite.com";

  //from email adress
  $emailFrom ="info@kuy-s-nami.ru"; //"contact@yoursite.com";

  //email subject
  $emailSubject = "Сообщение с сайта www.kuy-s-nami.ru от заказчика";

  $name = $_POST["name"];
  $tel = $_POST["tel"];
  $email = $_POST["email"];
  $comment = $_POST["comment"];
  if($name == "")
   $data['success'] = false;

 if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
   $data['success'] = false;


 if($comment == "")
   $data['success'] = false;

 if($data['success'] == true){

  $message = "Имя: $name<br>
  телефон: $tel<br>
  e-mail: $email<br>
  Сообщение: $comment";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}
