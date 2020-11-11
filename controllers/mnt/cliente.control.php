<?php
require_once "models/mnt/clientes.model.php";
require_once "models/mnt/categorias.model.php";

function run(){
    $viewData["modedsc"]="";
    $viewData["mode"]=""; 
    $viewData["clienteId"]=0;
    $viewData["clienteName"]= "";
    $viewData["clienteGenero"]= "FEM"; 
    $viewData["clientePhone"]= ""; 
    $viewData["clienteEmail"]= ""; 
    $viewData["clienteIdNumber"]= "";
    $viewData["clienteBio"]= ""; 
    $viewData["clientStatus"]= "ACT";
    $viewData["catecod"]=4;//normal
    $viewData["catecod_cmb"]="";

    $viewData["clienteGenero_FEM"]= "selected";
    $viewData["clienteGenero_MAS"]= ""; 

    $viewData["clientStatus_ACT"] = "selected";
    $viewData["clientStatus_INA"] = "";

    $viewData["readOnly"]="";
    $viewData=array();
    
    $modedsc = array(
        "INS"=>"Nuevo Cliente",
        "UPD"=>"Actualizar Cliente %s",
        "DSP"=>"Detalles %s"
        
    );
    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["clienteId"]/*este clienteId me llevo medio dia arreglarlo jajaja*/ = intval($_GET["clienteId"]);
        if (!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede realizar esta operacion","index.php?page=clientes");
            die();
        }
    }
    if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST, $viewData);
        
        
        //verifiacion del xsstoken        
        if (!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] == $viewData["xsstoken"])) {
            redirectWithMessage("No se puede realizar esta operación.", "index.php?page=clientes");
            die();
        }

        //validaciones de entrada de datos
        
        switch ($viewData["mode"]){
            case "INS":
                
                $result = addNewCliente( $viewData["clienteName"],
                    $viewData["clienteGenero"],
                    $viewData["clientePhone"],
                    $viewData["clienteEmail"],
                    $viewData["clienteIdNumber"],
                    $viewData["clienteBio"], 
                    $viewData["clientStatus"],
                    $viewData["catecod"]
                    
                );
                if($result >0){
                    redirectWithMessage("Guardado Correctamente", "index.php?page=clientes");
                    die();
                }
                break;
            case "UPD":
                $result = updateCliente( $viewData["clienteName"],
                    $viewData["clienteGenero"],
                    $viewData["clientePhone"],
                    $viewData["clienteEmail"],
                    $viewData["clienteIdNumber"],
                    $viewData["clienteBio"], 
                    $viewData["clientStatus"],
                    $viewData["catecod"],
                    $viewData["clienteId"]
                    
                );
                if($result >=0){
                    redirectWithMessage("Actualizado Correctamente", "index.php?page=clientes");
                    die();
                }
                break;
        }
    }
    if($viewData["mode"] == "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    } else {
        $clienteDBData = getClientebyId($viewData["clienteId"]);
        mergeFullArrayTo($clienteDBData, $viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["clienteName"]);

        $viewData["clienteGenero_FEM"] = ($viewData["clienteGenero"]=="FEM")?"selected":"";
        $viewData["clienteGenero_MAS"] = ($viewData["clienteGenero"]=="MAS")?"selected":"";

        $viewData["clientstatus_ACT"] = ($viewData["clientstatus"] == "ACT") ? "selected" : "";
        $viewData["clientstatus_INA"] = ($viewData["clientstatus"] == "INA") ? "selected" : ""; 
        // Sacar la data de la DB
        if ($viewData["mode"] != 'UPD') {
            $viewData["readonly"] = "readonly";
        }
        
    }


    
    // Guardar en sesión ese token unico para su verificación posterior
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mnt/cliente", $viewData);
    }
run();


?>