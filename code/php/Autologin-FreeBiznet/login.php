<?php
$host= "8.8.8.8";
$waktu= "array()";
	exec("ping -c 1 " . $host, $output, $result);
	print_r($output[1]);
        if ($result == 0) {
    echo "\033[0;92m KAMU TERHUBUNG ! \033[0m";
}
        else {
        file_get_contents("http://10.10.10.10/login?username=newhotspot&password=biznet&uip=192.168.100.12&client_mac=B4:0F:3B:5C:11:A8&ssid=&starturl=");
	exec("curl -s 10.10.10.10/status|grep -Po 'left:</td><td>\K.*?(?=</td></tr>)' ", $waktu);
    echo "\033[0;92mLimit Telah  Direset !   \033[0m";
	print_r("\033[0;92m $waktu[0]\033[0m");
    echo "\033[01;31m   Jika Gagal Coba Login Manual ! \033[0m";
}
