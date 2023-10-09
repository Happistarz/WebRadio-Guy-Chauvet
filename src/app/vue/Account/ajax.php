<?php

// check si le formulaire a été soumis
if (isset($_POST['submit']) && $_POST['submit']) {
  // récupérer les données du formulaire
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