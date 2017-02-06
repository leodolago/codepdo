CREATE DATABASE projetopdo;

CREATE TABLE `projetopdo`.`alunos`(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`nome` VARCHAR (255),
`nota` INT
);

CREATE TABLE `projetopdo`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `projetopdo`.`usuarios` (`usuario`,`senha`) VALUES ('admin','admin');


INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Luiz','10');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Luiza','5');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Livia','6');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Lucas','9');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Artur','9');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Leonardo','2');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Eder','7');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Monica','6');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Marcos','5');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Paola','2');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Paulo','8');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Joao','5');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Stefany','7');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Pedro','8');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Daniel','9');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Denis','10');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Flavia','4');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Josue','7');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Ana Lucia','8');
INSERT INTO `projetopdo`.`alunos` (`nome`,`nota`) VALUES ('Marta','6');
