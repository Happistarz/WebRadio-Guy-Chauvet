<?php

require_once "../../../../conf/constantes.php";

if (isset($_POST['submit']) && $_POST['submit']) {
    ini_set('display_errors', 1);

    $data = json_decode($_POST['data'], true);
    $table = $_POST['table'];
    // $action = $_POST['action'];

    $action = 'edit';

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

            foreach ($model->getColumns() as $column) {
                // $sql .= $column . " = '" . $data[] . "', ";
            }
            $sql .= " WHERE ID =". $data['IDEMISSION'];
            // $sql = "UPDATE $table SET ".join(", ",$data)." WHERE id =". $data['id'];
            break;
        case 'delete':
            $sql = "DELETE FROM $table WHERE ID = " . $data[0];
            break;
        case 'get':
            $sql = "SELECT * FROM $table WHERE ID = " . $data["IDEMISSION"];
            $doc[] = $model->Liste("IDEMISSION = " . $data["IDEMISSION"]);
            break;
    }

    echo json_encode($sql);
}
