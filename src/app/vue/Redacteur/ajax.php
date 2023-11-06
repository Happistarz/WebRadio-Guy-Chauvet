<?php

require_once "../../../../conf/constantes.php";


if (isset($_POST['submit']) && $_POST['submit']) {

    ini_set('display_errors', 1);

    // $data = $_POST['data'];
    // $table = $_POST['table'];
    // $action = $_POST['action'];
    // $data = array(
    //     "ID" => 1,
    //     "IDEMISSION" => 1,
    //     "NOM" => "test",
    //     "AUTEURS" => "test",
    //     "DESCRIPTION" => "test",
    //     "AUDIO" => "test",
    //     "CREATED" => "test",
    //     "HEURE" => "test",
    //     "DATE" => "test",
    // );
    $table = "Audio";
    // $action = "get";
    // $sql = '';


    $model = "Model" . $table;
    require_once ROOT ."../../models/". $model . '.php';
    $model = new $model();

    $doc = array();

    switch ($action) {
        case 'add':
            // $model->add($data);
            $sql = "INSERT INTO $table (" . implode(', ', $model->getColumns()) . ") VALUES (" . join(", ", $data) . ")";
            // var_dump( $model->getColumns());
            break;
        case 'edit':
            // $model->edit($data);
            // $sql = "UPDATE $table SET ".join(", ",$model->getColumns())." WHERE id =". $data['id'];
            // $sql = "UPDATE $table SET ".join(", ",$data)." WHERE id =". $data['id'];
            $sql = "edit";
            break;
        case 'delete':
            // $model->delete($data);
            $sql = "DELETE FROM $table WHERE id =" . $data[0];
            break;
        case 'get':
            # code...
            // $sql = "SELECT * FROM $table WHERE id =" . $data['id'];
            $audios = $model->Liste("IDEMISSION = " . $data["IDEMISSION"]);
            break;
    }

    echo '{"data":' . json_encode($audios) . '}';
}
?>