<?php

if(isset($_GET['language'])){

    $language = $_GET['language'];

    if($language == 'ita'){
        require 'datas/ita.php';
    
    }else if($language == 'esp'){
        require 'datas/esp.php';
    
    }else if($language == 'eng'){
        require 'datas/eng.php';
    }

    require 'html.php';


}else{
    echo "<div style='width:90%; padding:20px; margin:0 auto; background-color:rgb(203, 77, 77); color:white; font-size:35px; text-align:center; font-weight:bold; border-radius:10px;'> Errore nel caricare il curriculum </div>";
}

