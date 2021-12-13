<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $addr = $_POST['addr'];
    $port = $_POST['port'];
    $protocol = $_POST['protocol'];
    $zone = $_POST['zone'];
    $conf = $_POST['conf'];
    $action = $_POST['action'];
    $deal = $_POST['deal'];

    if ($conf === '') {
        if($port === '') {
            `sudo firewall-cmd --zone=$zone --$action-rich-rule 'rule family="ipv4" source address="$addr" $deal'`;
        }
        else {
            `sudo firewall-cmd --zone=$zone --$action-rich-rule 'rule family="ipv4" source address="$addr" port port=$port protocol=$protocol $deal'`;
        }
        echo "success";
        // echo $deal;
    }
    else if($conf === 'permanent') {
        if($port === '') {
            `sudo firewall-cmd --zone=$zone --$action-rich-rule 'rule family="ipv4" source address="$addr" $deal' --$conf`;
        }
        else {
            `sudo firewall-cmd --zone=$zone --$action-rich-rule 'rule family="ipv4" source address="$addr" port port=$port protocol=$protocol $deal' --$conf`;
        }
        echo "success";
    }
}


?>