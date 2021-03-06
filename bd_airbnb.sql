-- MySQL Script generated by MySQL Workbench
-- sex 24 jun 2022 22:41:05 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_airbnb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_airbnb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_airbnb` DEFAULT CHARACTER SET utf8 ;
USE `bd_airbnb` ;

-- -----------------------------------------------------
-- Table `bd_airbnb`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `telefone` INT(11) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `imagem` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `telefone_UNIQUE` (`telefone` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`cartoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`cartoes` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`cartoes` (
  `idcartao` INT NOT NULL AUTO_INCREMENT,
  `usuarios_idusuarios` INT NOT NULL,
  `titular` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `codigo_seguranca` VARCHAR(45) NOT NULL,
  `data_validade` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcartao`),
  INDEX `fk_cartoes_usuarios_idx` (`usuarios_idusuarios` ASC),
  CONSTRAINT `fk_cartoes_usuarios`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `bd_airbnb`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`enderecos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`enderecos` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`enderecos` (
  `idenderecos` INT NOT NULL AUTO_INCREMENT,
  `cep` INT(8) NOT NULL,
  `rua` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `numero` INT NOT NULL,
  `complemento` VARCHAR(100) NULL,
  PRIMARY KEY (`idenderecos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`tipos` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`tipos` (
  `idtipos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipos`))
ENGINE = InnoDB;

INSERT INTO `tipos`(`nome`) 
	VALUES('Quarto'),
    ('Apartamento'),
    ('Casa'),
    ('Fazenda');

-- -----------------------------------------------------
-- Table `bd_airbnb`.`imoveis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`imoveis` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`imoveis` (
  `idimoveis` INT NOT NULL AUTO_INCREMENT,
  `capacidade` INT NOT NULL,
  `descricao` VARCHAR(105) NOT NULL,
  `preco_diaria` FLOAT NOT NULL,
  `imagem` VARCHAR(50) NULL,
  `enderecos_idenderecos` INT NOT NULL,
  `usuarios_idusuarios` INT NOT NULL,
  `tipos_idtipos` INT NOT NULL,
  `cartoes_idcartao` INT NOT NULL,
  PRIMARY KEY (`idimoveis`),
  INDEX `fk_imoveis_enderecos1_idx` (`enderecos_idenderecos` ASC),
  INDEX `fk_imoveis_usuarios1_idx` (`usuarios_idusuarios` ASC),
  INDEX `fk_imoveis_tipos1_idx` (`tipos_idtipos` ASC),
  INDEX `fk_imoveis_cartoes1_idx` (`cartoes_idcartao` ASC),
  CONSTRAINT `fk_imoveis_enderecos1`
    FOREIGN KEY (`enderecos_idenderecos`)
    REFERENCES `bd_airbnb`.`enderecos` (`idenderecos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imoveis_usuarios1`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `bd_airbnb`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imoveis_tipos1`
    FOREIGN KEY (`tipos_idtipos`)
    REFERENCES `bd_airbnb`.`tipos` (`idtipos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imoveis_cartoes1`
    FOREIGN KEY (`cartoes_idcartao`)
    REFERENCES `bd_airbnb`.`cartoes` (`idcartao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`anuncios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`anuncios` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`anuncios` (
  `idanuncios` INT NOT NULL AUTO_INCREMENT,
  `imoveis_idimoveis` INT NOT NULL,
  `preco` FLOAT NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `dataTermino` DATE NOT NULL,
  `cartoes_idcartao` INT NOT NULL,
  PRIMARY KEY (`idanuncios`),
  INDEX `fk_anuncios_imoveis1_idx` (`imoveis_idimoveis` ASC),
  INDEX `fk_anuncios_cartoes1_idx` (`cartoes_idcartao` ASC),
  CONSTRAINT `fk_anuncios_imoveis1`
    FOREIGN KEY (`imoveis_idimoveis`)
    REFERENCES `bd_airbnb`.`imoveis` (`idimoveis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_anuncios_cartoes1`
    FOREIGN KEY (`cartoes_idcartao`)
    REFERENCES `bd_airbnb`.`cartoes` (`idcartao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`periodos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`periodos` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`periodos` (
  `idperiodos` INT NOT NULL AUTO_INCREMENT,
  `imoveis_idimoveis` INT NOT NULL,
  `inicio` DATE NOT NULL,
  `fim` DATE NOT NULL,
  `emUso` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idperiodos`),
  INDEX `fk_periodos_imoveis1_idx` (`imoveis_idimoveis` ASC),
  CONSTRAINT `fk_periodos_imoveis1`
    FOREIGN KEY (`imoveis_idimoveis`)
    REFERENCES `bd_airbnb`.`imoveis` (`idimoveis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`comentarios` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`comentarios` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `usuarios_idusuarios` INT NOT NULL,
  `imoveis_idimoveis` INT NOT NULL,
  `texto` VARCHAR(200) NOT NULL,
  `data_postagem` DATE NOT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_comentarios_usuarios1_idx` (`usuarios_idusuarios` ASC),
  INDEX `fk_comentarios_imoveis1_idx` (`imoveis_idimoveis` ASC),
  CONSTRAINT `fk_comentarios_usuarios1`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `bd_airbnb`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_imoveis1`
    FOREIGN KEY (`imoveis_idimoveis`)
    REFERENCES `bd_airbnb`.`imoveis` (`idimoveis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`alugueis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`alugueis` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`alugueis` (
  `idalugueis` INT NOT NULL AUTO_INCREMENT,
  `checked` TINYINT(1) NOT NULL,
  `cancelado` TINYINT(1) NOT NULL,
  `imoveis_idimoveis` INT NOT NULL,
  `periodos_idperiodos` INT NOT NULL,
  `locatario` INT NOT NULL,
  `cartao` INT NOT NULL,
  PRIMARY KEY (`idalugueis`),
  INDEX `fk_alugueis_imoveis1_idx` (`imoveis_idimoveis` ASC),
  INDEX `fk_alugueis_periodos1_idx` (`periodos_idperiodos` ASC),
  INDEX `fk_alugueis_usuarios1_idx` (`locatario` ASC),
  INDEX `fk_alugueis_cartoes1_idx` (`cartao` ASC),
  CONSTRAINT `fk_alugueis_imoveis1`
    FOREIGN KEY (`imoveis_idimoveis`)
    REFERENCES `bd_airbnb`.`imoveis` (`idimoveis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alugueis_periodos1`
    FOREIGN KEY (`periodos_idperiodos`)
    REFERENCES `bd_airbnb`.`periodos` (`idperiodos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alugueis_usuarios1`
    FOREIGN KEY (`locatario`)
    REFERENCES `bd_airbnb`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alugueis_cartoes1`
    FOREIGN KEY (`cartao`)
    REFERENCES `bd_airbnb`.`cartoes` (`idcartao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_airbnb`.`caracteristicas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`caracteristicas` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`caracteristicas` (
  `idcaracteristicas` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcaracteristicas`))
ENGINE = InnoDB;

INSERT INTO `caracteristicas`(`nome`) 
	VALUES('Cozinha'),
	('Jacuzzi'),
	('Refrigerador'),
	('Camera de seguran??a'),
	('Wifi'),
	('Garagem'),
	('Alarme de inc??ndio');

-- -----------------------------------------------------
-- Table `bd_airbnb`.`imoveis_has_caracteristicas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_airbnb`.`imoveis_has_caracteristicas` ;

CREATE TABLE IF NOT EXISTS `bd_airbnb`.`imoveis_has_caracteristicas` (
  `imoveis_idimoveis` INT NOT NULL,
  `caracteristicas_idcaracteristicas` INT NOT NULL,
  PRIMARY KEY (`imoveis_idimoveis`, `caracteristicas_idcaracteristicas`),
  INDEX `fk_imoveis_has_caracteristicas_caracteristicas1_idx` (`caracteristicas_idcaracteristicas` ASC),
  INDEX `fk_imoveis_has_caracteristicas_imoveis1_idx` (`imoveis_idimoveis` ASC),
  CONSTRAINT `fk_imoveis_has_caracteristicas_imoveis1`
    FOREIGN KEY (`imoveis_idimoveis`)
    REFERENCES `bd_airbnb`.`imoveis` (`idimoveis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imoveis_has_caracteristicas_caracteristicas1`
    FOREIGN KEY (`caracteristicas_idcaracteristicas`)
    REFERENCES `bd_airbnb`.`caracteristicas` (`idcaracteristicas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
