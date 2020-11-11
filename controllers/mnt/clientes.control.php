<?php
require_once "models/mnt/clientes.model.php";
function run(){
    $viewData = array();
    $viewData["clie_txtfilter"] = "";
    if (isset($_SESSION["clie_txtfilter"])) {
        $viewData["clie_txtfilter"] = $_SESSION["clie_txtfilter"];
    }
    if (isset($_POST["btnFiltrar"])) {
        mergeFullArrayTo($_POST, $viewData);
        $_SESSION["clie_txtfilter"] = $viewData["clie_txtfilter"];
    }
    if ($viewData["clie_txtfilter"] === "") {
        $viewData["clientes"] = getAllClientes();
    } else {
        $viewData["clientes"] = getclientesPorFiltro($viewData["clie_txtfilter"]);
    }
    renderizar("mnt/clientes",$viewData);
}

run();
?>