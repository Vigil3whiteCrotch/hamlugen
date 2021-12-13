<?php

    $temp = `sudo firewall-cmd --list-all`;
    $result = array();
    $result = explode("\n", $temp);
    $data = array();
    foreach ($result as $key => $value) {
        if ($key === 0) {
            $data['zone'] = $value;
        }
        if ( strpos($value, ": ") != false) {
            $temp = explode(': ', $value);
            $str = trim($temp[0]);
            $data[$str] = $temp[1];
        }
    }
    echo json_encode($data);
    // print_r($data);
?>