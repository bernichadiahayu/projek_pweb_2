<?php 
    $data ="https://www.alodokter.com/cara-menjaga-kesehatan-tubuh-agar-terhindar-dari-penyakit";
    $get_isi = file_get_contents($data);

    echo $get_isi;

?>