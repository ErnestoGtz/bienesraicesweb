-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bienesraices
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bienesraices
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bienesraices` DEFAULT CHARACTER SET utf8 ;
USE `bienesraices` ;

-- -----------------------------------------------------
-- Table `bienesraices`.`vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienesraices`.`vendedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `telefono` VARCHAR(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienesraices`.`propiedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienesraices`.`propiedades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `precio` DECIMAL(10,2) NULL,
  `imagen` VARCHAR(200) NULL,
  `descripcion` LONGTEXT NULL,
  `habitaciones` INT NULL,
  `wc` INT NULL,
  `estacionamiento` INT NULL,
  `creado` DATE NULL,
  `vendedores_id` INT NOT NULL,
  
  PRIMARY KEY (`id`),
  FOREIGN KEY (`vendedores_id`)
    REFERENCES `bienesraices`.`vendedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

insert into vendedores(nombre,apellido,telefono) values('Ernesto','Gutierrez','8711002414');
insert into vendedores(nombre,apellido,telefono) values('Victor','Hernandez','5580706040');
insert into vendedores(nombre,apellido,telefono) values('Edith','Martinez','5552908070');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
