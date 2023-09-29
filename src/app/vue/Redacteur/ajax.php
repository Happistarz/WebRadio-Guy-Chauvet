<?php 

if(isset($_POST['submit']) && $_POST['submit']) {
    $data = array();
    echo "{'success':true,'data':"json_encode($data)."}";
}


?>