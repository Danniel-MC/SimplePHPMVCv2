<?php

require_once "libs/dao.php";

function getAllClientes(){
    $sqlstr = "SELECT * from clientes;";
    $resultSet = array();           
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}
function getClientebyId($clienteId){
  $sqlstr = "SELECT * from clientes where clienteId = %d;";
  return obtenerUnRegistro(sprintf($sqlstr,$clienteId));
}
function addNewCliente($clienteName,$clienteGenero,$clientePhone,$clienteEmail,$clienteIdNumber,$clienteBio,$clientStatus){
  $insSql ="INSERT INTO `clientes`( `clienteName`,  `clienteGenero`,`clientePhone`, `clienteEmail`,`clienteIdNumber`,  `clienteBio`,
  `clientStatus`,`clienteDatecrt`,`clientUserCreates`)
  VALUES ('%s', '%s', '%s','%s','%s','%s','%s',now(),0);";

  return ejecutarNonQuery(
    sprintf(
      $insSql,$clienteName,$clienteGenero,
      $clientePhone,$clienteEmail,
      $clienteIdNumber,$clienteBio
      ,$clientStatus
    )
  );
}
function updateCliente ($clienteName,$clienteGenero,$clientePhone,$clienteEmail,$clienteIdNumber,$clienteBio,$clientStatus, $clienteId){
  $updsql= "UPDATE `clientes` SET `clienteName` = '%s',  `clienteGenero`= '%s',`clientePhone`= '%s', `clienteEmail`=' %s',
  `clienteIdNumber`= '%s',  `clienteBio`= '%s', `clientStatus`= '%s'
  WHERE `clienteId` = %d;";

  return ejecutarNonQuery(
    sprintf(
      $updsql,$clienteName,$clienteGenero,
      $clientePhone,$clienteEmail,
      $clienteIdNumber,$clienteBio
      ,$clientStatus, $clienteId
    )
);
}

?>