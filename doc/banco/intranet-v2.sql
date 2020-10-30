CREATE DATABASE  IF NOT EXISTS `intranet_corporativa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `intranet_corporativa`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: intranet_corporativa
-- ------------------------------------------------------
-- Server version	5.7.28-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `cod_banner` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `caminho` varchar(200) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `responsavel` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `data_insercao` datetime NOT NULL,
  PRIMARY KEY (`cod_banner`),
  KEY `responsavel` (`responsavel`),
  KEY `autor` (`autor`),
  CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`responsavel`) REFERENCES `funcionario` (`cod_funcionario`),
  CONSTRAINT `banner_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'20201022144614_trello-logo-blue.png','../banners/20201022144614_trello-logo-blue.png',93760,1,6,'teste','2020-10-22 14:46:14'),(2,'20201022145030_part1.png','../includes/anexos/banners/20201022145030_part1.png',114910,1,11,'Teste','2020-10-22 14:50:30');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `cod_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nomenclatura` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Gerente'),(2,'Presidente'),(3,'Conselheiro fiscal'),(4,'Conselheiro administrativo'),(5,'Secretario geral'),(6,'Assessores'),(7,'Estagiário'),(8,'Funcionário'),(9,'Assessor de Planejamento'),(10,'Teste');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunicado_cip`
--

DROP TABLE IF EXISTS `comunicado_cip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comunicado_cip` (
  `cod_comunicado` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `remetentes` text NOT NULL,
  `responsavel` int(11) NOT NULL,
  `data_emissao` datetime NOT NULL,
  `autor` int(11) NOT NULL,
  PRIMARY KEY (`cod_comunicado`),
  KEY `responsavel` (`responsavel`),
  KEY `autor` (`autor`),
  CONSTRAINT `comunicado_cip_ibfk_1` FOREIGN KEY (`responsavel`) REFERENCES `funcionario` (`cod_funcionario`),
  CONSTRAINT `comunicado_cip_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunicado_cip`
--

LOCK TABLES `comunicado_cip` WRITE;
/*!40000 ALTER TABLE `comunicado_cip` DISABLE KEYS */;
/*!40000 ALTER TABLE `comunicado_cip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controle_acesso`
--

DROP TABLE IF EXISTS `controle_acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controle_acesso` (
  `cod_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` int(11) DEFAULT NULL,
  `acesso` datetime NOT NULL,
  PRIMARY KEY (`cod_acesso`),
  KEY `funcionario` (`funcionario`),
  CONSTRAINT `controle_acesso_ibfk_1` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controle_acesso`
--

LOCK TABLES `controle_acesso` WRITE;
/*!40000 ALTER TABLE `controle_acesso` DISABLE KEYS */;
/*!40000 ALTER TABLE `controle_acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `cod_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `caminho` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tamanho` int(11) NOT NULL,
  `responsavel` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `comentario` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `setor` int(11) NOT NULL,
  PRIMARY KEY (`cod_documento`),
  KEY `responsavel` (`responsavel`),
  KEY `autor` (`autor`),
  KEY `documento_fk_idx` (`setor`),
  CONSTRAINT `documento_fk` FOREIGN KEY (`setor`) REFERENCES `setor` (`cod_setor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`responsavel`) REFERENCES `funcionario` (`cod_funcionario`),
  CONSTRAINT `documento_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (1,'20200928144543_Declaracao Concedente Trabalho Remoto.pdf','../documentos/20200928144543_Declaracao Concedente Trabalho Remoto.pdf',54585,1,6,'Anexos tem tamanho inferior a 7',1);
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto` (
  `cod_foto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `caminho` varchar(200) NOT NULL,
  `tamanho` int(11) DEFAULT NULL,
  `funcionario` int(11) NOT NULL,
  PRIMARY KEY (`cod_foto`),
  KEY `funcionario` (`funcionario`),
  CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` VALUES (1,'gti_leandro.jpg','http://localhost/poticorp/Sistema-Corporativo/src/img/colaboradores/gti_leandro.jpg',22,7),(7,'Erica.JPG','../img/colaboradores/20200730225105_Erica.JPG',3528,25),(12,'Erica.JPG','../img/colaboradores/20200731003049_Erica.JPG',3528,30),(13,'2020-05-23.jpg','../img/colaboradores/20200731011255_2020-05-23.jpg',8589,32),(14,'20200803224558_IMG_3374.jpg','../img/colaboradores/20200803224558_IMG_3374.jpg',0,33);
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `cod_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `ramal` varchar(10) DEFAULT NULL,
  `senha` varchar(150) NOT NULL,
  `login` varchar(200) NOT NULL,
  `permissao` varchar(20) NOT NULL,
  `cargo` int(11) DEFAULT NULL,
  `setor` int(11) DEFAULT NULL,
  `foto` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_funcionario`),
  KEY `cargo` (`cargo`),
  KEY `setor` (`setor`),
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`cod_cargo`),
  CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`setor`) REFERENCES `setor` (`cod_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'Fernanda Guilherme dos Santos','(84)987428975','fernanda.guilherme@potigas.com.br','1998-12-23','2404','123','fernanda.guilherme','99',7,1,NULL),(2,'Ana Marília Pitanga Torres','84 90000-0000','ana.marilia@potigas.com.br','1971-10-10','2501','123','ana.marilia','0',7,3,NULL),(4,'Crécio Fagner Cândido Bispo','84 90000-0000','crecio.fagner@potigas.com.br','1971-10-10','2502','123','crecio.fagner','0',8,6,NULL),(6,'Iericê Duarte Cabral Filho','84 90000-0000','ierice.duarte@potigas.com.br','1971-10-10','2402','123','ierice.duarte','99',8,1,NULL),(7,'Leandro Pontes Medeiros','84 90000-0000','leandro.medeiros@potigas.com.br','1971-10-10','2403','123','leandro.medeiros','99',8,1,1),(8,'Maxwell Souza Correia','84 90000-0000','maxwell.correia@potigas.com.br','1971-10-10','2405','123','maxwell.correia','99',8,1,NULL),(9,'Washington Wagner David Cruz','84 90000-0000','wagner.cruz@potigas.com','1971-10-10','2400','123','wagner.cruz','99',7,1,NULL),(10,'Aluisio Azevedo Neto','84 90000-0000','aluisio.azevedo@potigas.com.br','1971-10-10','2300','123','aluisio.azevedo','0',1,4,NULL),(11,'Fábio Ronaldo Barbosa Vilar de Queiroz','84 90000-0000','fabio.ronaldo@potigas.com.br','1971-10-10','2300','123','fabio.ronaldo','99',1,1,NULL),(12,'Francisco Antônio Xavier da Silva','84 90000-0000','francisco.silva@potigas.com.br','1971-10-10','2300','123','francisco.silva','0',3,3,NULL),(13,'Luiz Felipe Cardoso da Silva Lima','84 90000-0000','luiz.felipe@potigas.com.br','1971-10-10','2300','123','luiz.felipe','0',6,6,NULL),(25,'Ã‰rica Pelicano Ribeiro','8498888-8888','erica@potigas.com.br','1982-06-30','0008','123','erica.pelicano','',6,4,NULL),(30,'Ã‰rica Pelicano Ribeiro','8498888-8888','erica@potigas.com.br','2020-07-30','0008','123','erica.pelicano','',9,6,NULL),(31,'Fernanda Guilherme dos Santos ','84987428975','fernanda.guilherme@potigas.com.br','1998-12-23','2404','guiga','fernanda.guilherme','1234',9,1,NULL),(32,'Fernanda Guilherme dos Santos ','84987428975','fernanda.guilherme@potigas.com.br','1998-12-23','2404','guiga','fernanda.guilherme','1234',9,4,NULL),(33,'teste','8498888-8888','luan@gmail.com','2020-08-20','2404','123','teste','',9,2,NULL);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacao`
--

DROP TABLE IF EXISTS `publicacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacao` (
  `cod_publicacao` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `texto` text CHARACTER SET latin1 NOT NULL,
  `data_publicacao` datetime NOT NULL,
  `comentario` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `responsavel` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`cod_publicacao`),
  KEY `responsavel` (`responsavel`),
  KEY `autor` (`autor`),
  CONSTRAINT `publicacao_ibfk_1` FOREIGN KEY (`responsavel`) REFERENCES `funcionario` (`cod_funcionario`),
  CONSTRAINT `publicacao_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacao`
--

LOCK TABLES `publicacao` WRITE;
/*!40000 ALTER TABLE `publicacao` DISABLE KEYS */;
INSERT INTO `publicacao` VALUES (1,'Primeiro Comunicado','<p>Um conteÃºdo bem massa e bem importante para testar nossa <strong>nova intranet</strong> corporativa.</p>','2020-09-18 00:00:00','',1,1,1),(2,'Segundo Comunicado','<p>Um conteudo pra teste parte 2</p>','2020-09-18 00:00:00','sem comentÃ¡rios',1,2,2),(3,'Colaboradores participam de treinamento do SEI','<p>Um grupo de colaboradores da PotigÃ¡s participou durante 4 dias do treinamento presencial para a ferramenta de controle de processos SEI (Sistema EletrÃ´nico de InformaÃ§Ãµes), da Coordenadoria de OperaÃ§Ãµes de Tecnologia da InformaÃ§Ã£o e ComunicaÃ§Ã£o (COTIC), setor ligado Ã  Secretaria de AdministraÃ§Ã£o do Estado.</p><p>O curso apresentou as principais funcionalidades do SEI, utilizado na AdministraÃ§Ã£o PÃºblica Estadual para aprimorar a gestÃ£o documental e facilitar o acesso de servidores e cidadÃ£os Ã s informaÃ§Ãµes institucionais, propiciando celeridade, seguranÃ§a e economicidade. O objetivo do curso era capacitar as pessoas que atuam na gestÃ£o de documentos para utilizar o SEI e usufruir dos seus benefÃ­cios no dia a dia de trabalho. Os colaboradores participantes foram indicados pelos gestores por jÃ¡ atuarem com processos.</p><p>O treinamento, ministrado pela pela ComissÃ£o de Treinamento do SEI (SEAD - COTIC), foi importante para o momento em que a PotigÃ¡s, atravÃ©s da GerÃªncia de SeguranÃ§a Meio Ambiente e SaÃºde (GSMS), vem desenvolvendo o mapeamento e revisÃ£o dos processos nas Ã¡reas comercial, tÃ©cnica e de operaÃ§Ã£o e manutenÃ§Ã£o, visando otimizar prazos, reduzir os custos, melhorar controles com indicadores, reduzindo gargalos e aumentando a qualidade das entregas realizadas por cada Ã¡rea.</p><p>O curso teve carga horÃ¡ria de 8hrs, divididas em 4 dias (dois por semana) e aconteceu no LaboratÃ³rio de InformÃ¡tica da Escola de Governo, no Centro Administrativo do Estado.</p>','2020-10-27 00:00:00','Publicar no dia 01 de novembro.',1,31,1);
/*!40000 ALTER TABLE `publicacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `cod_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `observacoes` text CHARACTER SET latin1,
  `descricao` text CHARACTER SET latin1 NOT NULL,
  `comentario` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `solicitante` int(11) NOT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `Assunto` varchar(200) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`cod_reserva`),
  KEY `solicitante` (`solicitante`),
  KEY `reserva_ibfk_1` (`responsavel`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`responsavel`) REFERENCES `funcionario` (`cod_funcionario`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`solicitante`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,'2021-02-05 00:00:00','2021-02-06 00:00:00',NULL,'Rolezinho','Levar paredÃµes de som.',1,NULL,'ReuniÃ£o geral da direx','Aguardando avaliação'),(2,'2021-01-04 00:00:00','2021-01-13 00:00:00',NULL,'Reserva de espaÃ§o para distribuiÃ§Ã£o de vacinas contra covid 19','Levar projetor',1,NULL,'DistribuiÃ§Ã£o de vacinas','3'),(3,'2021-02-02 00:00:00','2021-02-02 00:00:00',NULL,'Rolezinho','',1,NULL,'ReuniÃ£o geral da direx','Aguardando avaliaÃ§Ã£o');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala` (
  `cod_sala` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `especificacoes` text NOT NULL,
  `status_funcionamento` int(11) NOT NULL,
  PRIMARY KEY (`cod_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'Audiovisual1','Sala com projetor',1),(2,'Audiovisual1','Sala com projetor',1);
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `cod_setor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) CHARACTER SET latin1 NOT NULL,
  `sigla` varchar(45) CHARACTER SET latin1 NOT NULL,
  `gerente` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_setor`),
  KEY `gerente_idx` (`gerente`),
  CONSTRAINT `gerente` FOREIGN KEY (`gerente`) REFERENCES `funcionario` (`cod_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (1,'Gerência de tecnologia da informação','GTI',NULL),(2,'Gerência de recursos humanos','GRH',NULL),(3,'Gerência financeira','GFIN',NULL),(4,'Gerência de operção e manutenção','GO&M',NULL),(5,'Gerência técnica','GTEC',NULL),(6,'Gerência de contabilidade','GCON',NULL),(7,'Diretoria geral','Direx',4),(8,'Setor de teste','ST',31);
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'intranet_corporativa'
--

--
-- Dumping routines for database 'intranet_corporativa'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-30 11:11:42
