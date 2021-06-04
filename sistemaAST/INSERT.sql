-- Insert administrador
INSERT INTO `pessoa` (`id`, `nome`, `genero`, `dataNascimento`, `cpf`, `telefone`, `cidade`, `estado`, `endereco`, `numero`, `email`, `cep`, `senha`, `tipoPessoa`, `dataAdmissao`, `dataDemissao`, `status`) 
VALUES (NULL, '', '', NULL, '', '', '', '', NULL, NULL, 'admin', NULL, 'admin', 'FN', current_timestamp(), NULL, '1');
-- Insert Salas 
INSERT INTO `sala` (`id`, `numeroSala`, `qtdAluno`, `status`) VALUES ('1', '1', '10', '1'); -- Sala de Violão
INSERT INTO `sala` (`id`, `numeroSala`, `qtdAluno`, `status`) VALUES ('2', '2', '4', '1');  -- Sala de Guitarra
INSERT INTO `sala` (`id`, `numeroSala`, `qtdAluno`, `status`) VALUES ('3', '3', '8', '1'); -- Sala de Baixo
INSERT INTO `sala` (`id`, `numeroSala`, `qtdAluno`, `status`) VALUES ('4', '4', '6', '1'); -- Sala de Violino
INSERT INTO `sala` (`id`, `numeroSala`, `qtdAluno`, `status`) VALUES ('5', '5', '2', '1'); -- Sala de Bateria
INSERT INTO `sala` (`id`, `numeroSala`, `qtdAluno`, `status`) VALUES ('6', '6', '12', '1');  -- Sala de Ukulele

-- Insert Cursos
INSERT INTO `curso` (`id`, `nome`, `duracao`, `turno`, `qtdInstrumento`, `instrumento`, `status`) 
VALUES (1, 'violao 1', '12meses', 'tarde', 10, '1', 1), (2, 'violao 2', '12meses', 'noite', 10, '1', 1), -- Curso de Violão tarde e noite
(3, 'guitarra 1', '24meses', 'tarde', 4, '2', 1), (4, 'guitarra 2', '24meses', 'noite', 4, '2', 1), -- Curso de Guitarra tarde e noite
(5, 'baixo 1', '12meses', 'tarde', 8, '3', 1), (6, 'baixo 2', '12meses', 'noite', 8, '3', 1), -- Curso de Baixo tarde e noite
(7, 'violino 1', '18meses', 'tarde', 6, '6', 1), (8, 'violino 2', '18meses', 'noite', 6, '6', 1), -- Curso de Violino tarde e noite
(9, 'bateria 1', '18meses', 'tarde', 2, '4', 1), (10, 'bateria 2', '18meses', 'noite', 2, '4', 1), -- Curso de Bateria tarde e noite
(11, 'ukulele 1', '6meses', 'tarde', 12, '5', 1), (12, 'ukulele 2', '6meses', 'noite', 12, '5', 1); -- Curso de Ukulele tarde e noite

-- Insert Turmas
INSERT INTO `turma`(`id`, `diaSemana`, `horario`, `qtdAluno`, `idsala`, `idcurso`, `status`) 
-- Curso de Violão
VALUES (1,'segunda','14:00', 10 ,1,1,1), (2,'segunda','18:00', 10 ,1,2,1),
       (3,'terca','14:00', 10 ,1,1,1), (4,'terca','18:00', 10 ,1,2,1),
	   (5,'quarta','14:00', 10 ,1,1,1), (6,'quarta','18:00', 10 ,1,2,1),
	   (7,'quinta','14:00', 10 ,1,1,1), (8,'quinta','18:00', 10 ,1,2,1),
	   (9,'sexta','14:00', 10 ,1,1,1), (10,'sexta','18:00', 10 ,1,2,1),
-- Curso de Guitarra   
	   (11,'segunda','15:00', 4 ,2,3,1), (12,'segunda','19:00', 4 ,2,4,1),
       (13,'terca','15:00', 4 ,2,3,1), (14,'terca','19:00', 4 ,2,4,1),
	   (15,'quarta','15:00', 4 ,2,3,1), (16,'quarta','19:00', 4 ,2,4,1),
	   (17,'quinta','15:00', 4 ,2,3,1), (18,'quinta','19:00', 4 ,2,4,1),
	   (19,'sexta','15:00', 4 ,2,3,1), (20,'sexta','19:00', 4 ,2,4,1),
-- Curso de Baixo	   
	   (21,'segunda','16:00', 8 ,3,5,1), (22,'segunda','20:00', 8 ,3,6,1),
       (23,'terca','16:00', 8 ,3,5,1), (24,'terca','20:00', 8 ,3,6,1),
	   (25,'quarta','16:00', 8 ,3,5,1), (26,'quarta','20:00', 8 ,3,6,1),
	   (27,'quinta','16:00', 8 ,3,5,1), (28,'quinta','20:00', 8 ,3,6,1),
	   (29,'sexta','16:00', 8 ,3,5,1), (30,'sexta','20:00', 8 ,3,6,1),
-- Curso de Violino	   
	   (31,'segunda','13:30', 6 ,4,7,1), (32,'segunda','18:30', 6 ,4,8,1),
       (33,'terca','13:30', 6 ,4,7,1), (34,'terca','18:30', 6 ,4,8,1),
	   (35,'quarta','13:30', 6 ,4,7,1), (36,'quarta','18:30', 6 ,4,8,1),
	   (37,'quinta','13:30', 6 ,4,7,1), (38,'quinta','18:30', 6 ,4,8,1),
	   (39,'sexta','13:30', 6 ,4,7,1), (40,'sexta','18:30', 6 ,4,8,1),
-- Curso de Bateria	   
	   (41,'segunda','15:30', 2 ,5,9,1), (42,'segunda','19:30', 2 ,5,10,1),
       (43,'terca','15:30', 2 ,5,9,1), (44,'terca','19:30', 2 ,5,10,1),
	   (45,'quarta','15:30', 2 ,5,9,1), (46,'quarta','19:30', 2 ,5,10,1),
	   (47,'quinta','15:30', 2 ,5,9,1), (48,'quinta','19:30', 2 ,5,10,1),
	   (49,'sexta','15:30', 2 ,5,9,1), (50,'sexta','19:30', 2 ,5,10,1),
-- Curso de Ukulele	   
	   (51,'segunda','14:30', 12 ,6,11,1), (52,'segunda','19:30', 12 ,6,12,1),
       (53,'terca','14:30', 12 ,6,11,1), (54,'terca','19:30', 12 ,6,12,1),
	   (55,'quarta','14:30', 12 ,6,11,1), (56,'quarta','19:30', 12 ,6,12,1),
	   (57,'quinta','14:30', 12 ,6,11,1), (58,'quinta','19:30', 12 ,6,12,1),
	   (59,'sexta','14:30', 12 ,6,11,1), (60,'sexta','19:30', 12 ,6,12,1);
	   



-- Sala 1 - Violão               --  Curso Violão   1 - id = 1             --  Curso Violino 1 - id = 7                  
-- Sala 2 - Guitarra             --  Curso Violão   2 - id = 2             --  Curso Violino 2 - id = 8              
-- Sala 3 - Baixo                --  Curso Guitarra 1 - id = 3             --  Curso Bateria 1 - id = 9             
-- Sala 4 - Violino              --  Curso Guitarra 2 - id = 4             --  Curso Bateria 2 - id = 10             
-- Sala 5 - Bateria              --  Curso Baixo    1 - id = 5             --  Curso Ukulele 1 - id = 11             
-- Sala 6 - Ukulele              --  Curso Baixo    2 - id = 6             --  Curso Ukulele 2 - id = 12             

-- Turmas de Violão - Seg a sex 14:00 e 18:00
-- Turmas de Guitarra - Seg a sex 15:00 e 19:00
-- Turmas de Baixo - Seg a sex 16:00 e 20:00
-- Turmas de Violino - Seg a sex 13:30 e 18:30
-- Turmas de Bateria - Seg a sex 15:30 e 15:30
-- Turmas de Ukulele - Seg a sex 14:30 e 19:30