CREATE TABLE `nw202003`.`comunicaciones` ( `cmnid` BIGINT(18) NOT NULL AUTO_INCREMENT , `clienteId` BIGINT(15) NOT NULL , 
`cmnNotas` VARCHAR(5000) NOT NULL , `cmntags` VARCHAR(255) NOT NULL , `cmnfechaing` DATETIME NOT NULL , `cmnusing` BIGINT(10) NOT NULL , 
`cmntipo` VARCHAR(45) NOT NULL , PRIMARY KEY (`cmnid`)) ENGINE = InnoDB;
ALTER TABLE `comunicaciones` 
ADD INDEX `FK_CLIENTS_CMN_idx` (`clientid` ASC),
ADD INDEX `FK_USUARIOS_CMN_idx` (`cmnusring` ASC);
;
ALTER TABLE `comunicaciones` 
ADD CONSTRAINT `FK_CLIENTS_CMN`
  FOREIGN KEY (`clientid`)
  REFERENCES `clients` (`clientid`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `FK_USUARIOS_CMN`
  FOREIGN KEY (`cmnusring`)
  REFERENCES `usuario` (`usercod`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;