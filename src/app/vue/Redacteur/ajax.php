
<?php


if (isset($_POST['submit']) && $_POST['submit']) {

    ini_set('display_errors', 1);

    $data = $_POST['data'];
    $table = $_POST['table'];
    $action = $_POST['action'];
    $sql = '';


    $model = "Model" . $table;
    // echo ROOT;
    require_once MODEL . $model . '.php';
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
            var_dump($model->Liste("IDEMISSION = ".$data[0]));
            break;
    }

    // if ($table == "Audio") {
    //     echo $audios = $doc;
    // }



    echo '{"success":true,"data":' . json_encode($doc) . '}';
}
?>