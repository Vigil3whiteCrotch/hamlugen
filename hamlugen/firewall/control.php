<?php

if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $temp = `sudo firewall-cmd --list-all`;
    $result = explode("\n", $temp);
    $lenth = count($result);
    $data = array();
    foreach ($result as $key => $value) {
        if ($key === 0) {
            $data['zone'] = $value;
        }
        if($key === ($lenth-2)) {
            // echo $value;
            $richRules = `sudo firewall-cmd --list-rich-rules`;
            $richStr = str_replace("\n", "<br/>", $richRules);
            $data['rich rules'] = $richStr;
        }
        if ( strpos($value, ": ") != false) {
            $temp = explode(': ', $value);
            $str = trim($temp[0]);
            $data[$str] = $temp[1];
        }
        if ($key == 9) {
            $forwardList = `sudo firewall-cmd --list-forward-ports`;
            $forwardStr = str_replace("\n", "<br/>", $forwardList);
            $data['forward-ports'] = $forwardStr;
        }
    }
    echo json_encode($data);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    if ($action === 'reload') {
        `sudo firewall-cmd --reload`;
        echo "success";
    }
    else if ($action === 'start' || $action === 'restart' || $action === 'stop') {
        `sudo systemctl $action firewalld`;
        echo "success";
    }
    else if ($action === 'panic') {
        `sudo firewall-cmd --panic-on`;
        echo "success";
    }
    else if($action === 'flush') {
        echo "success";
    }
}

?>