<?php
//POR ALEJANDRO RODRIGUEZ MENA
    function autoload($clase){
        $url = str_replace("\\","/",$clase.".php");
        $url = "../".$url;
        require_once($url);
    }
    spl_autoload_register('autoload');
?>
