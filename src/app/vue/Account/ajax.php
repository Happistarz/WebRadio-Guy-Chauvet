<?php

if (isset($_POST['submit']) && $_POST['submit']) {
  $data = json_decode($_POST['data']);
  $username = $data->username;
  $password = $data->password;

  session_start();
  $_SESSION['valid'] = true;
  $_SESSION['login'] = $username;
  $_SESSION['role'] = "redacteur";
  echo '{"success":true,"data":{"username":"' . $username . '","password":"' . $password . '"}}';
}

?>