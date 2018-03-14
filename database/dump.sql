-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gerirminhaclinica
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gerirminhaclinica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gerirminhaclinica` DEFAULT CHARACTER SET utf8 ;
USE `gerirminhaclinica` ;

-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`estado` (
  `codEstado` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`codEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`cidade` (
  `codCidade` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `codEstado` INT NOT NULL,
  PRIMARY KEY (`codCidade`),
  INDEX `fk_cidade_estado_idx` (`codEstado` ASC),
  CONSTRAINT `fk_cidade_estado`
    FOREIGN KEY (`codEstado`)
    REFERENCES `gerirminhaclinica`.`estado` (`codEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`empresa` (
  `codEmpresa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `cnpj` VARCHAR(45) NOT NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(10) NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(10) NOT NULL,
  `logo` TEXT NULL,
  `status` INT NOT NULL DEFAULT 1,
  `complemento` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `codCidade` INT NOT NULL,
  PRIMARY KEY (`codEmpresa`),
  INDEX `fk_empresa_cidade1_idx` (`codCidade` ASC),
  CONSTRAINT `fk_empresa_cidade1`
    FOREIGN KEY (`codCidade`)
    REFERENCES `gerirminhaclinica`.`cidade` (`codCidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`plano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`plano` (
  `codPlano` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `valor` DOUBLE NOT NULL,
  `status` INT NOT NULL DEFAULT 1,
  `codEmpresa` INT NOT NULL,
  PRIMARY KEY (`codPlano`),
  INDEX `fk_plano_empresa1_idx` (`codEmpresa` ASC),
  CONSTRAINT `fk_plano_empresa1`
    FOREIGN KEY (`codEmpresa`)
    REFERENCES `gerirminhaclinica`.`empresa` (`codEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`cliente` (
  `codCliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(10) NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(10) NOT NULL,
  `complemento` VARCHAR(255) NULL,
  `telefone` VARCHAR(17) NULL,
  `celular` VARCHAR(17) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `rg` VARCHAR(45) NULL,
  `profissao` VARCHAR(45) NULL,
  `nacionalidade` VARCHAR(45) NOT NULL,
  `nascimento` DATE NOT NULL,
  `nome_pai` VARCHAR(255) NULL,
  `nome_mae` VARCHAR(255) NULL,
  `escolaridade` VARCHAR(45) NULL,
  `codEmpresa` INT NOT NULL,
  PRIMARY KEY (`codCliente`),
  INDEX `fk_cliente_empresa1_idx` (`codEmpresa` ASC),
  CONSTRAINT `fk_cliente_empresa1`
    FOREIGN KEY (`codEmpresa`)
    REFERENCES `gerirminhaclinica`.`empresa` (`codEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`funcionario` (
  `codFuncionario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(17) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `salario` DOUBLE NOT NULL,
  `codEmpresa` INT NOT NULL,
  `codCidade` INT NOT NULL,
  PRIMARY KEY (`codFuncionario`),
  INDEX `fk_funcionario_empresa1_idx` (`codEmpresa` ASC),
  INDEX `fk_funcionario_cidade1_idx` (`codCidade` ASC),
  CONSTRAINT `fk_funcionario_empresa1`
    FOREIGN KEY (`codEmpresa`)
    REFERENCES `gerirminhaclinica`.`empresa` (`codEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_cidade1`
    FOREIGN KEY (`codCidade`)
    REFERENCES `gerirminhaclinica`.`cidade` (`codCidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`contrato` (
  `codContrato` INT NOT NULL AUTO_INCREMENT,
  `cliente_codCliente` INT NOT NULL,
  `plano_codPlano` INT NOT NULL,
  `dataInicio` DATE NOT NULL,
  `dataFinal` DATE NOT NULL,
  `status` INT NOT NULL DEFAULT 1,
  `obs` TEXT NULL,
  `codFuncionario` INT NOT NULL,
  PRIMARY KEY (`codContrato`),
  INDEX `fk_contrato_cliente1_idx` (`cliente_codCliente` ASC),
  INDEX `fk_contrato_plano1_idx` (`plano_codPlano` ASC),
  INDEX `fk_contrato_funcionario1_idx` (`codFuncionario` ASC),
  CONSTRAINT `fk_contrato_cliente1`
    FOREIGN KEY (`cliente_codCliente`)
    REFERENCES `gerirminhaclinica`.`cliente` (`codCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_plano1`
    FOREIGN KEY (`plano_codPlano`)
    REFERENCES `gerirminhaclinica`.`plano` (`codPlano`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_funcionario1`
    FOREIGN KEY (`codFuncionario`)
    REFERENCES `gerirminhaclinica`.`funcionario` (`codFuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`especializacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`especializacao` (
  `codEspecializacao` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codEspecializacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`colaborador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`colaborador` (
  `codColaborador` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(17) NOT NULL,
  `celular` VARCHAR(17) NOT NULL,
  `status` INT NOT NULL DEFAULT 1,
  `codEspecializacao` INT NOT NULL,
  `formaPagto` INT NOT NULL,
  `valor` DOUBLE NOT NULL,
  PRIMARY KEY (`codColaborador`),
  INDEX `fk_colaborador_especializacao1_idx` (`codEspecializacao` ASC),
  CONSTRAINT `fk_colaborador_especializacao1`
    FOREIGN KEY (`codEspecializacao`)
    REFERENCES `gerirminhaclinica`.`especializacao` (`codEspecializacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`dependente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`dependente` (
  `codDependente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `parentesco` VARCHAR(45) NOT NULL,
  `rg` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `nascimento` DATE NOT NULL,
  `escolaridade` VARCHAR(45) NOT NULL,
  `codContrato` INT NOT NULL,
  PRIMARY KEY (`codDependente`),
  INDEX `fk_dependente_contrato1_idx` (`codContrato` ASC),
  CONSTRAINT `fk_dependente_contrato1`
    FOREIGN KEY (`codContrato`)
    REFERENCES `gerirminhaclinica`.`contrato` (`codContrato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`servico` (
  `codServico` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `status` INT NOT NULL,
  `codEspecializacao` INT NOT NULL,
  PRIMARY KEY (`codServico`),
  INDEX `fk_servico_especializacao1_idx` (`codEspecializacao` ASC),
  CONSTRAINT `fk_servico_especializacao1`
    FOREIGN KEY (`codEspecializacao`)
    REFERENCES `gerirminhaclinica`.`especializacao` (`codEspecializacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`plano_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`plano_servico` (
  `codPlano` INT NOT NULL,
  `codServico` INT NOT NULL,
  `valor` DOUBLE NULL,
  `tempo_estimado` DOUBLE NOT NULL,
  PRIMARY KEY (`codPlano`, `codServico`),
  INDEX `fk_plano_has_servico_servico1_idx` (`codServico` ASC),
  INDEX `fk_plano_has_servico_plano1_idx` (`codPlano` ASC),
  CONSTRAINT `fk_plano_has_servico_plano1`
    FOREIGN KEY (`codPlano`)
    REFERENCES `gerirminhaclinica`.`plano` (`codPlano`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plano_has_servico_servico1`
    FOREIGN KEY (`codServico`)
    REFERENCES `gerirminhaclinica`.`servico` (`codServico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`consulta` (
  `codConsulta` INT NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL,
  `codEmpresa` INT NOT NULL,
  `codColaborador` INT NOT NULL,
  `codPlano` INT NOT NULL,
  `codServico` INT NOT NULL,
  `codFuncionario` INT NOT NULL,
  `codDependente` INT NOT NULL,
  `status` INT NULL,
  `observacao` TEXT NULL,
  PRIMARY KEY (`codConsulta`),
  INDEX `fk_consulta_empresa1_idx` (`codEmpresa` ASC),
  INDEX `fk_consulta_colaborador1_idx` (`codColaborador` ASC),
  INDEX `fk_consulta_plano_servico1_idx` (`codPlano` ASC, `codServico` ASC),
  INDEX `fk_consulta_funcionario1_idx` (`codFuncionario` ASC),
  INDEX `fk_consulta_dependente1_idx` (`codDependente` ASC),
  CONSTRAINT `fk_consulta_empresa1`
    FOREIGN KEY (`codEmpresa`)
    REFERENCES `gerirminhaclinica`.`empresa` (`codEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_colaborador1`
    FOREIGN KEY (`codColaborador`)
    REFERENCES `gerirminhaclinica`.`colaborador` (`codColaborador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_plano_servico1`
    FOREIGN KEY (`codPlano` , `codServico`)
    REFERENCES `gerirminhaclinica`.`plano_servico` (`codPlano` , `codServico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_funcionario1`
    FOREIGN KEY (`codFuncionario`)
    REFERENCES `gerirminhaclinica`.`funcionario` (`codFuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_dependente1`
    FOREIGN KEY (`codDependente`)
    REFERENCES `gerirminhaclinica`.`dependente` (`codDependente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerirminhaclinica`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerirminhaclinica`.`usuario` (
  `codUsuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `status` INT NOT NULL,
  `empresa_codEmpresa` INT NOT NULL,
  PRIMARY KEY (`codUsuario`),
  INDEX `fk_usuario_empresa1_idx` (`empresa_codEmpresa` ASC),
  CONSTRAINT `fk_usuario_empresa1`
    FOREIGN KEY (`empresa_codEmpresa`)
    REFERENCES `gerirminhaclinica`.`empresa` (`codEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
