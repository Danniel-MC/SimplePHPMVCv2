<?php
require_once "models/mnt/comunicaciones.model.php";
function run(){
    $viewData = array();
    $viewData["cmn_txtfilter"] = "";
    if (isset($_SESSION["cmn_txtfilter"])) {
        $viewData["cmn_txtfilter"] = $_SESSION["cmn_txtfilter"];
    }
    if (isset($_POST["btnFiltrar"])) {
        mergeFullArrayTo($_POST, $viewData);
        $_SESSION["cmn_txtfilter"] = $viewData["cmn_txtfilter"];
    }
    if ($viewData["cmn_txtfilter"] === "") {
        $viewData["comunicaciones"] = getAllcomunicaciones();
    } else {
        $viewData["comunicaciones"] = getcomunicacionesPorFiltro($viewData["cmn_txtfilter"]);
    }
    renderizar("mnt/comunicaciones",$viewData);
}

run();
?>