
CREATE TABLE `nw202003`.`clientes` ( `clienteId` BIGINT(15) NULL AUTO_INCREMENT ,
 `clienteName` VARCHAR(128) NOT NULL , `clienteGenero` VARCHAR(3) NOT NULL , 
 `clientePhone` VARCHAR(255) NOT NULL , `clienteEmail` VARCHAR(255) NOT NULL , 
 `clienteIdNumber` VARCHAR(45) NOT NULL , `clienteBio` VARCHAR(5000) NOT NULL ,
  `clientStatus` CHAR(3) NOT NULL , `clienteDatecrt` DATETIME NOT NULL ,
   `clientUserCreates` BIGINT(10) NOT NULL , PRIMARY KEY (`clienteId`))
    ENGINE = InnoDB;

INSERT INTO `clientes` (`clienteId`, `clienteName`, `clienteGenero`, `clientePhone`, `clienteEmail`, `clienteIdNumber`, `clienteBio`, `clientStatus`, `clienteDatecrt`, `clientUserCreates`) VALUES (NULL, 'Danniel Enrique Mc. Carthy Navarro', 'M', '99999999', 'enriquenavarro315@gmail.com', '1503199802658', 'Estudiante UNIAH CSC', 'ACT', '2020-10-27 14:32:20', '1');