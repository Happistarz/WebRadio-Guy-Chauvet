<?php

if (isset($_POST['submit']) && $_POST['submit']) {
  $data = json_decode($_POST['data']);
  $username = $data->username;
  $password = $data->password;

  echo '{"success":true,"data":{"username":"' . $username . '","password":"' . $password . '"}}';
}

?>