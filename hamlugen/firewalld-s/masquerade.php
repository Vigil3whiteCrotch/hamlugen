<?php

$zone = $_POST['zone'];
$action = $_POST['action'];
$conf = $_POST['conf'];
if ($conf === '') {
    `sudo firewall-cmd --zone=$zone --$action-masquerade`;
    echo "success";
}
else if($conf === 'permanent') {
    `sudo firewall-cmd --zone=$zone --$action-masquerade --$conf`;
    echo "success";
}

?>