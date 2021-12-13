<?php

if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $request = $_GET['request'];
    $temp = `sudo firewall-cmd --get-services`;
    $result = explode(" ", $temp);
    // print_r($result);
    $data = array();
    foreach ($result as $key => $value) {
        if ( $value != "") {
            $value = str_replace("\n", "", $value);
            $data[$key] = $value;
        }
    }
    echo json_encode($data);
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service = $_POST['service'];
    $zone = $_POST['zone'];
    $conf = $_POST['conf'];
    $action = $_POST['action'];
    if ($conf === '') {
        `sudo firewall-cmd --zone=$zone --$action-service=$service`;
        echo "success";
    }
    else if($conf === 'permanent') {
        `sudo firewall-cmd --zone=$zone --$action-service=$service --$conf`;
        echo "success";
    }
    // echo "success" . $service . $zone . $conf;
}


?>