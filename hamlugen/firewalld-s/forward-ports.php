<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $addr = $_POST['addr'];
    $port = $_POST['port'];
    $dport = $_POST['dport'];
    $protocol = $_POST['protocol'];
    $zone = $_POST['zone'];
    $conf = $_POST['conf'];
    $action = $_POST['action'];

    if ($conf === '') {
        if($addr === '') {
            `sudo firewall-cmd --zone=$zone --$action-forward-port=port=$port:proto=$protocol:toport=$dport`;
        }
        else {
            `sudo firewall-cmd --zone=$zone --$action-forward-port=port=$port:proto=$protocol:toport=$dport:toaddr=$addr`;
        }
        echo "success";
        // echo $deal;
    }
    else if($conf === 'permanent') {
        if($addr === '') {
            `sudo firewall-cmd --zone=$zone --$action-forward-port=port=$port:proto=$protocol:toport=$dport --$conf`;
        }
        else {
            `sudo firewall-cmd --zone=$zone --$action-forward-port=port=$port:proto=$protocol:toport=$dport:toaddr=$addr --$conf`;
        }
        echo "success";
    }
}


?>