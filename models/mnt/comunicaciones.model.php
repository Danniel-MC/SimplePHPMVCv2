<?php
/*
CREATE TABLE `nw202003`.`comunicaciones` 
( `cmnid` BIGINT(18) NOT NULL AUTO_INCREMENT , `clienteId` BIGINT(15) NOT NULL , 
`cmnNotas` VARCHAR(5000) NOT NULL , `cmntags` VARCHAR(255) NOT NULL , `cmnfechaing` 
DATETIME NOT NULL , `cmnusing` BIGINT(10) NOT NULL , `cmntipo` VARCHAR(45) NOT NULL , 
PRIMARY KEY (`cmnid`)) ENGINE = InnoDB;
*/


function getAllcomunicaciones(){
    $sqlstr = "SELECT * from comunicaciones;";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}

function getcmnById($cmnid) {
    $sqlstr = "SELECT * from comunicaciones where cmnid = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $cmnid));
}

function getcomunicacionesPorFiltro($filtro) {
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * from comunicaciones where cmnid like '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function addNewcomunicaciones($clienteId,$cmnNotas, $cmntags,$cmnfechaing,$cmnusing,$cmntipo){
    $insSql = "INSERT INTO `comunicaciones` (`clienteId`,`cmnNotas`, `cmntags`,`cmnfechaing`,`cmnusing`,`cmntipo`)
VALUES ( '%d','%s', '%s',now(), '%s','%s', '%s');";
    return ejecutarNonQuery(
        sprintf(
            $insSql,
            $clienteId,
            $cmnNotas,
            $cmntags,
            $cmnfechaing,
            $cmnusing,
            $cmntipo
        )
    );
}

?>