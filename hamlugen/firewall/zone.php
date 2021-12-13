<?php

$zone = $_POST['zone'];
`sudo firewall-cmd --set-default-zone=$zone`;
echo "success";

?>