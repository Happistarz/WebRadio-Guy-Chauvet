<?php 

if(isset($_POST['submit']) && $_POST['submit']) {
    $data = $_POST['data'];
    $table = $_POST['table'];
    $action = $_POST['action'];
    $sql = '';
    
    echo WEBROOT;
    $model = "Model".$table;
    require ROOT."../../models/". $model.'.php';
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