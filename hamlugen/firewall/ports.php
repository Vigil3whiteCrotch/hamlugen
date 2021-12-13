<?php

if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $request = $_GET['request'];
    $temp = `sudo firewall-cmd --get-services`;
    $result = explode(" ", $temp);
    // print_r($result);
    $data = array();
    $data = ["FTP: 21","SSH: 22","SMTP: 25","HTTP: 80","POP3: 110","IMAP: 143","HTTPS: 443","SQL Server: 1433","MySQL: 3306","Windows Server Remote Desktop Services: 3389","代理端口: 8080"];
    echo json_encode($data);
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $port = $_POST['port'];
    $protocol = $_POST['protocol'];
    $zone = $_POST['zone'];
    $conf = $_POST['conf'];
    $action = $_POST['action'];
    if ($conf === '') {
        `sudo firewall-cmd --zone=$zone --$action-port=$port/$protocol`;
        echo "success";
    }
    else if($conf === 'permanent') {
        `sudo firewall-cmd --zone=$zone --$action-port=$port/$protocol --$conf`;
        echo "success";
    }
}

?>