<?php 

if(isset($_GET['submit']) && $_GET['submit']) {
    $data = $_POST['data'];
    $table = $_GET['table'];
    $action = $_GET['action'];
    $sql = '';

    $model = "Model".$table;
    require_once MODEL. $model.'php';
    $model = new $model();

    switch ($action) {
        case 'add':
            // $model->add($data);
            $sql = "INSERT INTO $table (".join(", ",$model->getColumns()).") VALUES (".join(", ",$data).")";
            break;
        case 'edit':
            // $model->edit($data);
            $sql = "UPDATE $table SET ".join(", ",$model->getColumns())." WHERE id =". $data['id'];
            break;
        case 'delete':
            // $model->delete($data);
            $sql = "DELETE FROM $table WHERE id =". $data['id'];
            break;
        default:
            # code...
            $sql = "SELECT * FROM $table";
            break;
    }



    echo "{'success':true,'data':".json_encode($sql)."}";
}
?>