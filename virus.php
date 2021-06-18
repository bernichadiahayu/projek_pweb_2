<?php 
    $data ="https://www.alodokter.com/ketahui-cara-untuk-mencegah-penularan-virus-corona";
    $get_isi = file_get_contents($data);

    echo $get_isi;

?>