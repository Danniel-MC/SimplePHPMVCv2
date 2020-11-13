<?php 
/*
clientid bigint(15) AI PK
clientname varchar(128)
clientgender char(3)
clientphone1 varchar(255)
clientphone2 varchar(255)
clientemail varchar(255)
clientIdnumber varchar(45)
clientbio varchar(5000)
clientstatus char(3)

CREATE TABLE `nw202003`.`comunicaciones` ( `cmnid` BIGINT(18) NOT NULL AUTO_INCREMENT , `clienteId` BIGINT(15) NOT NULL , 
`cmnNotas` VARCHAR(5000) NOT NULL , `cmntags` VARCHAR(255) NOT NULL , `cmnfechaing` DATETIME NOT NULL , `cmnusing` BIGINT(10) NOT NULL , 
`cmntipo` VARCHAR(45) NOT NULL , PRIMARY KEY (`cmnid`)) ENGINE = InnoDB;
 */

require_once "models/mnt/clientes.model.php";
require_once "models/mnt/comunicaciones.model.php";

function run() {
    $viewData=array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["cmnid"] = 0;
    $viewData["clienteName"] = "" ;    
    $viewData["clienteEmail"] = "";
    $viewData["clienteId"] = "";
    $viewData["cmnNotas"] = "";
    $viewData["cmntags"] = "";
    $viewData["cmnusing"] ="";
    $viewData["cmntipo"] = "";

    $viewData["readonly"] = "";

    $modedsc = array(
    "INS"=>"Nueva Comunicacion",
    "DSP"=>"Detalle de Comunicacion%s"
    );
    if (isset($_GET["mode"])) {
        $viewData["mode"] = $_GET["mode"];
        $viewData["cmnid"] = intval($_GET["cmnid"]);
        if (!isset($modedsc[$viewData["mode"]])) {
            redirectWithMessage("No se puede realizar esta operación.", "index.php?page=comunicaciones");
            die();
        }
    }

    if (isset($_POST["btnsubmit"])) {
        mergeFullArrayTo($_POST, $viewData);
        //Verificacion de XSS_Token
        if (!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] == $viewData["xsstoken"])) {
            redirectWithMessage("No se puede realizar esta operación.", "index.php?page=comunicaciones");
            die();
        }

        // Validaciones de Entrada de Datos

//$clienteId,$cmnNotas, $cmntags,$cmnfechaing,$cmnusing,$cmntipo
        switch ($viewData["mode"]){
        case "INS":
            $result = addNewcomunicaciones(
                $viewData["clienteId"],
                $viewData["cmnNotas"],
                $viewData["cmntags"],                
                $viewData["cmnfechaing"],
                $viewData["cmnusing"],
                $viewData["cmntipo"]
            );
            if ($result > 0) {
                redirectWithMessage("Guardado Exitosamente", "index.php?page=comunicaciones");
                die();
            }
            break;
        
        
        }
    }
    if ($viewData["mode"] != 'INS') {
        $viewData["readonly"] = "readonly";
    }
    
    // Crear un token unico
    // Guardar en sesión ese token unico para su verificación posterior
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mnt/comunicacion", $viewData);
}

run();
?>
