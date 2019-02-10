<?php
function panel($siite,$pathname,$type){
    $url=$siite . "/". $pathname . "." . $type;
    $ch = curl_init($url);
    ob_start();
    curl_exec($ch);
    ob_end_clean();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);       
    $info = curl_getinfo($ch);
    $status=$info['http_code'];
    curl_close($ch);
    return $status;
    }
// paste here your wordlist a forme array
$wordlist=array("admin","check","list","panel","index");

// chose php or asp or html or ...
$type="php";

// paste here your host
$site="localhost/eCommerce/admin";

for($i=0;$i<count($wordlist);$i++){
    $p=panel($site,$wordlist[$i],$type);
    
    if($p==200){
        echo "success !! " . $site . "/" . $wordlist[$i] . "." . $type;
    }
}
?>