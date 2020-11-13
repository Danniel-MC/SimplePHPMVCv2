<?php
//middleware de configuración de todo el sitio
require_once "libs/parameters.php";
function site_init(){
    global $host_server;
    addToContext("page_title","Client Relation Manager");
    addToContext("max_file_size",20); // In Megas
    addToContext("footer_general", " Derechos Reservados 2020");
    addToContext("host_server",$host_server); 
    date_default_timezone_set ( "America/Tegucigalpa" );
}
site_init();

?>
