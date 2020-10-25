<?php
function run(){
    $viewData = array(
        "cuenta"=>"1503199802687",
        "nombre"=>"Danniel Enriquen Mc. Carthy Navarro",
        "correo"=>"enriquenavarro315@gmail.com"
    );

    $proyectos = array(
        array("id"=>"1","name"=>"Titulo Primaria","location"=>"Escual Mixta Pedro Nufio","year"=>"2010"),
        array("id"=>"2","name"=>"Titulo Secundaria","location"=>"Instituto Técnico 18 de Noviembre","year"=>"2016"),
        array("id"=>"3","name"=>"Practica profesional de bachiller en informatica","location"=>"Instituto Técnico 18 de Noviembre","year"=>"2016"),
        array("id"=>"4","name"=>"Realizacion del ESVU1 UNICAH","location"=>"UNICAH Santa Clara","year"=>"2017")
        
    );
    $viewData["proyectos"]=$proyectos;
    renderizar("about", $viewData);
    
    
}
run();

?>