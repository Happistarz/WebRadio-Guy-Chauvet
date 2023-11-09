<?php

require_once "../../../../conf/constantes.php";

if (isset($_POST['submit']) && $_POST['submit']) {
    ini_set('display_errors', 1);

    $data = json_decode($_POST['data'], true);
    $table = $_POST['table'];
    $action = $_POST['action'];

    $sql = 'aa';

    $doc = array();

    $model = "Model" . $table;
    require_once MODEL . $model . '.php';
    $model = new $model();

    switch ($action) {
        case 'add':
            $sql = "INSERT INTO $table (" . implode(', ', $model->getColumns()) . ") VALUES ('" . join("', '", $data) . "')";
            $model->exec($sql);
            break;
        case 'edit':
            $sql = "UPDATE $table SET ";

            $id = "0";
            foreach ($data as $d) {
                if ($d["name"] == "id") {$id = $d["value"];continue;}
                $sql .= strtoupper($d["name"]) . "= \"" . $d["value"] . "\", ";
            }
            if (substr($sql, -2) == ", ") $sql = substr($sql, 0, -2);

            $sql .= " WHERE ID = '" . $id ."'";
            break;
        case 'delete':
            $sql = "DELETE FROM $table WHERE ID = " . $data["IDEMISSION"];
            break;
        case 'get':
            $sql = "SELECT * FROM $table WHERE ID = " . $data["IDEMISSION"];
            $doc[] = $model->Liste("IDEMISSION = " . $data["IDEMISSION"]);
            break;
    }

    echo json_encode($sql);
}
