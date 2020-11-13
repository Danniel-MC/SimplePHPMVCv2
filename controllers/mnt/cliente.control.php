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
 */

require_once "models/mnt/clientes.model.php";
require_once "models/mnt/categorias.model.php";

function run() {
    $viewData=array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["clienteId"] = 0;
    $viewData["clienteName"] = "" ;
    $viewData["clienteGenero"] = "FEM";
    $viewData["clientePhone"] = "";
    
    $viewData["clienteEmail"] = "";
    $viewData["clienteIdNumber"] = "";
    $viewData["clienteBio"] = "";
    $viewData["clientStatus"] = "ACT";
    $viewData["catecod"] = 4; //Normal
    $viewData["catecod_cmb"] = "";

    $viewData["clienteGenero_FEM"] = "selected";
    $viewData["clienteGenero_MAS"] = "";

    $viewData["clientStatus_ACT"] = "selected";
    $viewData["clientStatus_INA"] = "";

    $viewData["readonly"] = "";

    $modedsc = array(
    "INS"=>"Nuevo Cliente",
    "UPD"=>"Actualizar Cliente %s",
    "DSP"=>"Detalle de Cliente %s"
    );
    if (isset($_GET["mode"])) {
        $viewData["mode"] = $_GET["mode"];
        $viewData["clienteId"] = intval($_GET["clienteId"]);
        if (!isset($modedsc[$viewData["mode"]])) {
            redirectWithMessage("No se puede realizar esta operación.", "index.php?page=clientes");
            die();
        }
    }

    if (isset($_POST["btnsubmit"])) {
        mergeFullArrayTo($_POST, $viewData);
        //Verificacion de XSS_Token
        if (!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] == $viewData["xsstoken"])) {
            redirectWithMessage("No se puede realizar esta operación.", "index.php?page=clientes");
            die();
        }

        // Validaciones de Entrada de Datos


        switch ($viewData["mode"]){
        case "INS":
            $result = addNewCliente(
                $viewData["clienteName"],
                $viewData["clienteGenero"],
                $viewData["clientePhone"],                
                $viewData["clienteEmail"],
                $viewData["clienteIdNumber"],
                $viewData["clienteBio"],
                $viewData["clientStatus"],
                $viewData["catecod"]
            );
            if ($result > 0) {
                redirectWithMessage("Guardado Exitosamente", "index.php?page=clientes");
                die();
            }
            break;
        case "UPD":
            $result = updateCliente(
                $viewData["clienteName"],
                $viewData["clienteGenero"],
                $viewData["clientePhone"],
                
                $viewData["clienteEmail"],
                $viewData["clienteIdNumber"],
                $viewData["clienteBio"],
                $viewData["clientStatus"],
                $viewData["catecod"],
                $viewData["clienteId"]
            );
            if ($result >= 0) {
                redirectWithMessage("Actualizado Exitosamente", "index.php?page=clientes");
                die();
            }
            break;
        
        
        }
    }
    if ($viewData["mode"] === "INS") {
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    } else {
        $clientDBData = getClienteById($viewData["clienteId"]);
        mergeFullArrayTo($clientDBData, $viewData);

        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["clienteName"]);

        $viewData["clienteGenero_FEM"] = ($viewData["clienteGenero"]=="FEM")?"selected":"";
        $viewData["clienteGenero_MAS"] = ($viewData["clienteGenero"]=="MAS")?"selected":"";

        $viewData["clientStatus_ACT"] = ($viewData["clientStatus"] == "ACT") ? "selected" : "";
        $viewData["clientStatus_INA"] = ($viewData["clientStatus"] == "INA") ? "selected" : ""; 
        // Sacar la data de la DB
        if ($viewData["mode"] != 'UPD') {
            $viewData["readonly"] = "readonly";
        }

        
    }
    $viewData["catecod_cmb"] = addSelectedCmbArray(getcategoriasActivas(), "catecod", $viewData["catecod"]);
    // Crear un token unico
    // Guardar en sesión ese token unico para su verificación posterior
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mnt/cliente", $viewData);
}

run();
?>
