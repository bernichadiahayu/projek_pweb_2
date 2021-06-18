<?php 
    $data ="https://www.alodokter.com/ini-makanan-sehat-yang-perlu-dikonsumsi-setiap-hari";
    $get_isi = file_get_contents($data);

    echo $get_isi;

?>