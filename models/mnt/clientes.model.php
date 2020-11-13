<?php

require_once "libs/dao.php";

function getAllClientes(){
    $sqlstr = "SELECT * from clientes;";
    $resultSet = array();           
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}

function getCountClientes(){
  $sqlstr = "SELECT count(*) as Clientes from clientes;";
  $resultSet = array();           
  $resultSet = obtenerunRegistro($sqlstr);
  return $resultSet;
}

function getclientesActivas()
{
    $sqlstr = "SELECT * from clientes where clientStatus = 'ACT';";
    return obtenerRegistros($sqlstr);
}

function getClientesPorFiltro($filtro) {
  $ffiltro = $filtro.'%';
  $sqlstr = "SELECT * from clientes where clienteId like '%s' or clienteName like '%s';";
  return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}
function getClientebyId($clienteId){
  $sqlstr = "SELECT * from clientes where clienteId = %d;";
  return obtenerUnRegistro(sprintf($sqlstr,$clienteId));
}
function addNewCliente($clienteName,$clienteGenero,$clientePhone,$clienteEmail,$clienteIdNumber,$clienteBio,$clientStatus,$catecod){
  $insSql ="INSERT INTO `clientes`( `clienteName`,  `clienteGenero`,`clientePhone`, `clienteEmail`,`clienteIdNumber`,  `clienteBio`,
  `clientStatus`,`clienteDatecrt`,`clientUserCreates`, `catecod`)
  VALUES ('%s', '%s', '%s','%s','%s','%s','%s',now(),0, %d);";

  return ejecutarNonQuery(
    sprintf(
      $insSql,$clienteName,$clienteGenero,
      $clientePhone,$clienteEmail,
      $clienteIdNumber,$clienteBio
      ,$clientStatus, $catecod
    )
  );
}
function updateCliente ($clienteName,$clienteGenero,$clientePhone,$clienteEmail,$clienteIdNumber,$clienteBio,$clientStatus, $catecod,$clienteId){
  $updsql= "UPDATE `clientes` SET `clienteName` = '%s',  `clienteGenero`= '%s',`clientePhone`= '%s', `clienteEmail`=' %s',
  `clienteIdNumber`= '%s',  `clienteBio`= '%s', `clientStatus`= '%s', `catecod` = %d
  WHERE `clienteId` = %d;";

  return ejecutarNonQuery(
    sprintf(
      $updsql,$clienteName,$clienteGenero,
      $clientePhone,$clienteEmail,
      $clienteIdNumber,$clienteBio
      ,$clientStatus,$catecod, $clienteId
    )
);
}

?>