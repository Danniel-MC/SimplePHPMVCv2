<?php
function run(){
  //componente de cuantos clientes hay registrados
  $usuario= $_SESSION["userCode"];
  $viewData["component"]=array();
  if (isAuthorized("cmp_cliente_count",$usuario )){
    include_once "models/mnt/clientes.model.php";
    $cmp_clientes_countd=getCountClientes();
    $cmp_str= renderizar("cmp/clientecount", $cmp_clientes_countd,"component_layout",false);
    $viewData["component"][]=$cmp_str;
  }
  renderizar("dashboard", $viewData);
}

run();
?>
