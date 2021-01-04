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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'20201022144614_trello-logo-blue.png','../banners/20201022144614_trello-logo-blue.png',93760,1,6,'teste','2020-10-22 14:46:14'),(2,'20201022145030_part1.png','../includes/anexos/banners/20201022145030_part1.png',114910,1,11,'Teste','2020-10-22 14:50:30'),(3,'20201211132514_photo5176924631527958806.jpg','../includes/anexos/banners/20201211132514_photo5176924631527958806.jpg',68384,1,2,'','2020-12-11 13:25:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` VALUES (1,'gti_leandro.jpg','http://localhost/poticorp/Sistema-Corporativo/src/img/colaboradores/gti_leandro.jpg',22,7),(7,'Erica.JPG','../img/colaboradores/20200730225105_Erica.JPG',3528,25),(12,'Erica.JPG','../img/colaboradores/20200731003049_Erica.JPG',3528,30),(13,'2020-05-23.jpg','../img/colaboradores/20200731011255_2020-05-23.jpg',8589,32),(14,'20200803224558_IMG_3374.jpg','../img/colaboradores/20200803224558_IMG_3374.jpg',0,33),(15,'20201103134922_icons8-new-post-52.png','../img/colaboradores/20201103134922_icons8-new-post-52.png',1457,36);
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
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'Fernanda Guilherme dos Santos','(84)987428975','fernanda.guilherme@potigas.com.br','2010-07-29','2404','111','fernanda.guilherme','99',7,1,NULL),(2,'Ana Marília Pitanga Torres','84 90000-0000','ana.marilia@potigas.com.br','1971-10-10','2501','123','ana.marilia','0',7,3,NULL),(4,'Crécio Fagner Cândido Bispo','84 90000-0000','crecio.fagner@potigas.com.br','1971-10-10','2502','123','crecio.fagner','0',8,6,NULL),(6,'Iericê Duarte Cabral Filho','84 90000-0000','ierice.duarte@potigas.com.br','2010-12-16','2402','123','ierice.duarte','99',8,1,NULL),(7,'Leandro Pontes Medeiros','84 90000-0000','leandro.medeiros@potigas.com.br','2010-03-04','2403','123','leandro.medeiros','99',8,1,1),(8,'Maxwell Souza Correia','84 90000-0000','maxwell.correia@potigas.com.br','1971-10-10','2405','123','maxwell.correia','99',8,1,NULL),(9,'Washington Wagner David Cruz','84 90000-0000','wagner.cruz@potigas.com','2010-09-07','2400','123','wagner.cruz','99',7,1,NULL),(10,'Aluisio Azevedo Neto','84 90000-0000','aluisio.azevedo@potigas.com.br','2011-01-17','2300','123','aluisio.azevedo','0',1,4,NULL),(11,'Fábio Ronaldo Barbosa Vilar de Queiroz','84 90000-0000','fabio.ronaldo@potigas.com.br','2010-12-06','2300','123','fabio.ronaldo','99',1,1,NULL),(12,'Francisco Antônio Xavier da Silva','84 90000-0000','francisco.silva@potigas.com.br','2010-04-11','2300','123','francisco.silva','0',3,3,NULL),(13,'Luiz Felipe Cardoso da Silva Lima','84 90000-0000','luiz.felipe@potigas.com.br','2010-04-08','2300','123','luiz.felipe','0',6,6,NULL),(25,'Ã‰rica Pelicano Ribeiro','8498888-8888','erica@potigas.com.br','2010-09-23','0008','123','erica.pelicano','',6,4,NULL),(30,'Ã‰rica Pelicano Ribeiro','8498888-8888','erica@potigas.com.br','2020-07-30','0008','123','erica.pelicano','',9,6,NULL),(31,'Fernanda Guilherme dos Santos ','84987428975','fernanda.guilherme@potigas.com.br','2010-07-05','2404','guiga','fernanda.guilherme','1234',9,1,NULL),(32,'Fernanda Guilherme dos Santos ','84987428975','fernanda.guilherme@potigas.com.br','2010-03-11','2404','guiga','fernanda.guilherme','1234',9,4,NULL),(33,'teste','8498888-8888','luan@gmail.com','2010-08-04','2404','123','teste','',9,2,NULL),(36,'Fernanda Guilherme dos Santos','84987428975','eufernandagui154@hotmail.com','2020-11-02','2404','123','fernanda.guilherme','',4,4,NULL),(37,'Fernanda Guilherme dos Santos','84987428975','eufernandagui154@gmail.com','2010-06-02','2404','123','fernanda.guilherme','',3,4,NULL),(38,'Teste validaÃ§Ã£o','84987428975','eufernandagui154@hotmail.com','2010-11-30','0008','123','fernanda.guilherme','1',10,8,NULL),(39,'Teste validaÃ§Ã£o','84987428975','eufernandagui154@hotmail.com','2010-06-09','0024','1234','fernanda.guilherme','1',10,8,NULL),(40,'Fábio Ronaldo Barbosa Vilar de Queiroz','','fabio.ronaldo@potigas.com.br','2010-01-14','2400','potigas','fabio.ronaldo','0',NULL,NULL,NULL),(41,'Maxwell Souza Correia','','maxwell.correia@potigas.com.br','2010-02-04','2401','externo','maxwell.correia','0',NULL,NULL,NULL),(42,'Alan Souza de Oliveira','','alan.souza@potigas.com.br','2010-09-24','219','AlSo123','alan.souza','0',NULL,NULL,NULL),(43,'Aluisio Azevedo Neto','','aluisioazevedo@potigas.com.br','2010-03-04','3200','alu333','aluisio','0',NULL,NULL,NULL),(44,'Anderson Teodosio Costa','','andersoncosta@potigas.com.br','2010-09-07','3201','clara','anderson','0',NULL,NULL,NULL),(45,'Antônio Manoel Carrilho Mattos','','carrilho@potigas.com.br','2011-01-17','215','diego1','carrilho','0',NULL,NULL,NULL),(46,'Antônio Saldanha Filho','','antoniosaldanha@potigas.com.br','2010-02-25','5000','sal06','saldanha','0',NULL,NULL,NULL),(47,'Amaro José do Nascimento Júnior','','amarojose@potigas.com.br','2010-04-11','218','aj12','amarojose','0',NULL,NULL,NULL),(48,'Breno Ataíde Martins','','brenoataide@potigas.com.br','2010-04-08','3203','BrAt1234','breno','0',NULL,NULL,NULL),(49,'Deyvison Cordeiro de Mendonça','','deyvison@potigas.com.br','2010-01-01','3102','9823433','deyvison','0',NULL,NULL,NULL),(50,'Érica Pelicano Ribeiro','','erica@potigas.com.br','2011-06-13','2302','1111','erica','0',NULL,NULL,NULL),(51,'Eudes Bezerra da Cunha','','eudes@potigas.com.br','2010-01-01','3302','1111','eudes.bezerra','0',NULL,NULL,NULL),(52,'Fernando Jorge Albuquerque','','fernandojorge@potigas.com.br','2010-05-26','217','1111','fernando','0',NULL,NULL,NULL),(53,'Fernando Sérgio Bezerra','','fernandosergio@potigas.com.br','2010-06-03','3101','FeSe1234','fernandosergio','0',NULL,NULL,NULL),(54,'Fernanda Caroline Diniz de Medeiros','','fernandacaroline@potigas.com.br','2010-12-30','2201','1111','fernanda','0',NULL,NULL,NULL),(55,'Franciney Batista de Souza','','francineybatista@potigas.com.br','2010-09-12','3300','FrBa1234','franciney.batista','0',NULL,NULL,NULL),(56,'Hugo César da Rocha Ribeiro','','hugo@potigas.com.br','2010-05-31','2301','Poti5030','hugo','0',NULL,NULL,NULL),(57,'Iericê Duarte Cabral Filho','','ierice.duarte@potigas.com.br','2010-03-03','2402','110378','ierice.duarte','0',NULL,NULL,NULL),(58,'Igor Felipe dos Santos','3217-3680','igor@potigas.com.br','2010-05-15','1401','040882','igor','0',NULL,NULL,NULL),(59,'Ilo Sá Ibiapina Neto','','ilo@potigas.com.br','2010-02-23','3301','431397','ilo','0',NULL,NULL,NULL),(60,'Ivomar de Lima Godeiro','','ivomarlima@potigas.com.br','2010-06-02','2100','Malves141008','ivomarlima','0',NULL,NULL,NULL),(61,'Jairo César Dourado Pinto','','jairo@potigas.com.br','2010-11-30','2500','JaCe1234','jairo','0',NULL,NULL,NULL),(62,'José Augusto Dantas de Rezende','','joseaugusto@potigas.com.br','2010-06-09','3100','1111','jose','0',NULL,NULL,NULL),(63,'José Vilemain Andrade Silveira Filho','','josevilemain@potigas.com.br','2010-01-14','5001','1111','josevilemain','0',NULL,NULL,NULL),(64,'Josimar Pereira de Sousa','','josimarpereira@potigas.com.br','2010-06-26','3303','JoPe1234','josimar.pereira','0',NULL,NULL,NULL),(65,'Jucimeire Ferreira de Paiva','','jucimeire.estagiario@potigas.com.br','2010-09-24','273','1111','jucimeire','0',NULL,NULL,NULL),(66,'Luciana Melo da Fonseca','','lucianamelo@potigas.com.br','2010-02-25','2501','1111','luciana','0',NULL,NULL,NULL),(67,'Saulo Nazareno de Mesquita Carvalho','','saulo.carvalho@potigas.com.br','1980-09-20','214','1111','saulo','0',NULL,NULL,NULL),(68,'Raphael Araújo de Holanda','','raphaelholanda@potigas.com.br','2010-01-01','3401','RaHo1234','raphael','0',NULL,NULL,NULL),(69,'Ramid Risério M. de Medeiros','','ramid@potigas.com.br','2010-05-26','244','268500','ramid','0',NULL,NULL,NULL),(70,'Rebeca Ferreira de Moraes','3314-4378','rebeca@potigas.com.br','2011-12-09','','1525','rebeca','0',NULL,NULL,NULL),(71,'Ricardo Wagner Guilhermino Pereira','','rwagner@potigas.com.br','2010-12-30','2300','RiWa1234','ricardo.wagner','0',NULL,NULL,NULL),(72,'Thiago André do Nascimento Fernandes','','thiago@potigas.com.br','2010-05-31','3400','ThAn1234','thiago','0',NULL,NULL,NULL),(73,'Tuanny da Silva Barbosa','','tuannysilva@potigas.com.br','2010-03-03','3202','1111','tuanny','0',NULL,NULL,NULL),(74,'Vinicius de Albuquerque Lopes Machado','','viniciusmachado@potigas.com.br','2011-06-27','3204','ViMa1234','vinicius','0',NULL,NULL,NULL),(75,'Vinicius Dutra Gomes Pinheiro','','vinicius@potigas.com.br','2010-02-23','3103','ViDu1234','viniciusdutra','0',NULL,NULL,NULL),(76,'Kamilla Vanessa Renovato de Lima','','kamilla.asg@potigas.com.br','2011-03-18','213','1111','kamilla','0',NULL,NULL,NULL),(77,'Shirley Duarte de Mendonça','','shirleyduarte@potigas.com.br','2011-04-07','172','1111','shirleyduarte','0',NULL,NULL,NULL),(78,'Priscila Cristine Andrade de Sousa','','priscila.estagiario@potigas.com.br','1990-12-09','273','pc12','priscilacristine','0',NULL,NULL,NULL),(79,'Magno Estefano de Carvalho Lima ','','magnolima@potigas.com.br','2011-06-27','169','176688','magnolima','0',NULL,NULL,NULL),(80,'Thiago de Castro Barbosa','','thiagobarbosa@potigas.com.br','2011-03-18','169','4321potigas','thiagobarbosa','0',NULL,NULL,NULL),(81,'Planet Solution','84 3344-3670','atendimento@planetsolution.net','2011-04-07','','planet','planetsolution','0',NULL,NULL,NULL),(82,'Fernanda Clara Araújo Costa Melo','','fernanda.talimpo@potigas.com.br','1970-01-01','211','fc12','fernandaclara','0',NULL,NULL,NULL),(83,'Fábio Ronaldo Barbosa Vilar de Queiroz','','fabio.ronaldo@potigas.com.br',NULL,'2400','potigas','fabio.ronaldo','0',NULL,NULL,NULL),(84,'Maxwell Souza Correia','','maxwell.correia@potigas.com.br',NULL,'2401','externo','maxwell.correia','0',NULL,NULL,NULL),(85,'Alan Souza de Oliveira','','alan.souza@potigas.com.br','2012-09-18','219','AlSo123','alan.souza','0',NULL,NULL,NULL),(86,'Aluisio Azevedo Neto','','aluisioazevedo@potigas.com.br','2012-09-09','3200','alu333','aluisio','0',NULL,NULL,NULL),(87,'Anderson Teodosio Costa','','andersoncosta@potigas.com.br','2012-02-08','3201','clara','anderson','0',NULL,NULL,NULL),(88,'Antônio Manoel Carrilho Mattos','','carrilho@potigas.com.br','2012-01-23','215','diego1','carrilho','0',NULL,NULL,NULL),(89,'Antônio Saldanha Filho','','antoniosaldanha@potigas.com.br','2012-07-19','5000','sal06','saldanha','0',NULL,NULL,NULL),(90,'Amaro José do Nascimento Júnior','','amarojose@potigas.com.br','2012-01-10','218','aj12','amarojose','0',NULL,NULL,NULL),(91,'Breno Ataíde Martins','','brenoataide@potigas.com.br','2012-05-17','3203','BrAt1234','breno','0',NULL,NULL,NULL),(92,'Deyvison Cordeiro de Mendonça','','deyvison@potigas.com.br','2012-11-09','3102','9823433','deyvison','0',NULL,NULL,NULL),(93,'Érica Pelicano Ribeiro','','erica@potigas.com.br','2012-12-12','2302','1111','erica','0',NULL,NULL,NULL),(94,'Eudes Bezerra da Cunha','','eudes@potigas.com.br','2012-04-27','3302','1111','eudes.bezerra','0',NULL,NULL,NULL),(95,'Fernando Jorge Albuquerque','','fernandojorge@potigas.com.br','2012-05-07','217','1111','fernando','0',NULL,NULL,NULL),(96,'Fernando Sérgio Bezerra','','fernandosergio@potigas.com.br',NULL,'3101','FeSe1234','fernandosergio','0',NULL,NULL,NULL),(97,'Fernanda Caroline Diniz de Medeiros','','fernandacaroline@potigas.com.br','2012-08-10','2201','1111','fernanda','0',NULL,NULL,NULL),(98,'Franciney Batista de Souza','','francineybatista@potigas.com.br','2012-09-04','3300','FrBa1234','franciney.batista','0',NULL,NULL,NULL),(99,'Hugo César da Rocha Ribeiro','','hugo@potigas.com.br','1965-10-05','2301','Poti5030','hugo','0',NULL,NULL,NULL),(100,'Iericê Duarte Cabral Filho','','ierice.duarte@potigas.com.br','1991-09-18','2402','110378','ierice.duarte','0',NULL,NULL,NULL),(101,'Igor Felipe dos Santos','3217-3680','igor@potigas.com.br','2012-07-11','1401','040882','igor','0',NULL,NULL,NULL),(102,'Ilo Sá Ibiapina Neto','','ilo@potigas.com.br','1986-10-17','3301','431397','ilo','0',NULL,NULL,NULL),(103,'Ivomar de Lima Godeiro','','ivomarlima@potigas.com.br','2012-11-17','2100','Malves141008','ivomarlima','0',NULL,NULL,NULL),(104,'Jairo César Dourado Pinto','','jairo@potigas.com.br','2012-08-01','2500','JaCe1234','jairo','0',NULL,NULL,NULL),(105,'José Augusto Dantas de Rezende','','joseaugusto@potigas.com.br','1978-10-23','3100','1111','jose','0',NULL,NULL,NULL),(106,'José Vilemain Andrade Silveira Filho','','josevilemain@potigas.com.br','1970-01-01','5001','1111','josevilemain','0',NULL,NULL,NULL),(107,'Josimar Pereira de Sousa','','josimarpereira@potigas.com.br','2012-11-03','3303','JoPe1234','josimar.pereira','0',NULL,NULL,NULL),(108,'Jucimeire Ferreira de Paiva','','jucimeire.estagiario@potigas.com.br','2013-03-11','273','1111','jucimeire','0',NULL,NULL,NULL),(109,'Luciana Melo da Fonseca','','lucianamelo@potigas.com.br','2013-05-13','2501','1111','luciana','0',NULL,NULL,NULL),(110,'Saulo Nazareno de Mesquita Carvalho','','saulo.carvalho@potigas.com.br','2013-02-04','214','1111','saulo','0',NULL,NULL,NULL),(111,'Raphael Araújo de Holanda','','raphaelholanda@potigas.com.br','2013-03-12','3401','RaHo1234','raphael','0',NULL,NULL,NULL),(112,'Ramid Risério M. de Medeiros','','ramid@potigas.com.br',NULL,'244','268500','ramid','0',NULL,NULL,NULL),(113,'Rebeca Ferreira de Moraes','3314-4378','rebeca@potigas.com.br','2012-12-01','','1525','rebeca','0',NULL,NULL,NULL),(114,'Ricardo Wagner Guilhermino Pereira','','rwagner@potigas.com.br',NULL,'2300','RiWa1234','ricardo.wagner','0',NULL,NULL,NULL),(115,'Thiago André do Nascimento Fernandes','','thiago@potigas.com.br','2013-01-27','3400','ThAn1234','thiago','0',NULL,NULL,NULL),(116,'Tuanny da Silva Barbosa','','tuannysilva@potigas.com.br','2013-06-05','3202','1111','tuanny','0',NULL,NULL,NULL),(117,'Vinicius de Albuquerque Lopes Machado','','viniciusmachado@potigas.com.br','1983-08-20','3204','ViMa1234','vinicius','0',NULL,NULL,NULL),(118,'Vinicius Dutra Gomes Pinheiro','','vinicius@potigas.com.br','2013-02-28','3103','ViDu1234','viniciusdutra','0',NULL,NULL,NULL),(119,'Kamilla Vanessa Renovato de Lima','','kamilla.asg@potigas.com.br','1989-06-21','213','1111','kamilla','0',NULL,NULL,NULL),(120,'Shirley Duarte de Mendonça','','shirleyduarte@potigas.com.br',NULL,'172','1111','shirleyduarte','0',NULL,NULL,NULL),(121,'Priscila Cristine Andrade de Sousa','','priscila.estagiario@potigas.com.br','2012-08-08','273','pc12','priscilacristine','0',NULL,NULL,NULL),(122,'Magno Estefano de Carvalho Lima ','','magnolima@potigas.com.br','2013-06-23','169','176688','magnolima','0',NULL,NULL,NULL),(123,'Thiago de Castro Barbosa','','thiagobarbosa@potigas.com.br','2013-08-01','169','4321potigas','thiagobarbosa','0',NULL,NULL,NULL),(124,'Planet Solution','84 3344-3670','atendimento@planetsolution.net','1988-06-30','','planet','planetsolution','0',NULL,NULL,NULL),(125,'Fernanda Clara Araújo Costa Melo','','fernanda.talimpo@potigas.com.br','1985-02-15','211','fc12','fernandaclara','0',NULL,NULL,NULL),(126,'Diretoria Executiva','','diretoria@potigas.com.br','1970-01-01','','DiEx12345','diretoria','0',NULL,NULL,NULL),(127,'Ana Claudia de Melo Caldas Batista','','anaclaudia.estagiario@potigas.com.br','1970-01-01','245','ac12','anaclaudia','0',NULL,NULL,NULL),(128,'Cheyanne Mirelly Ferreira','','cheyanne.estagiario@potigas.com.br','2013-07-28','289','4321','cheyannemirelly','0',NULL,NULL,NULL),(129,'Andréia Cabral de Almeida','','andreia.aprendiz@potigas.com.br',NULL,'171','ac12','andreiacabral','0',NULL,NULL,NULL),(130,'Alaise Liberato Teixeira','','alaise.aprendiz@potigas.com.br','2013-02-15','273','1234','alaise.liberato','0',NULL,NULL,NULL),(131,'Esley Henri Gama de Lima','','esley.estagiario@potigas.com.br','2013-05-07','289','EsHe123','esley.henri','0',NULL,NULL,NULL),(132,'Hugo Jackson de Oliveira Moura','','hugo.aprendiz@potigas.com.br','2013-05-07','136','hugo','hugojackson','0',NULL,NULL,NULL),(133,'Ingrid Rayane Pereira do Nascimento Martins','','ingrid.aprendiz@potigas.com.br','1984-09-01','220','5016','ingridrayane','0',NULL,NULL,NULL),(134,'Ítalo Brito Amaro da Silva','','italo.aprendiz@potigas.com.br','2013-02-02','293','ib12','italobrito','0',NULL,NULL,NULL),(135,'Kamyla Cardoso Rodrigues','3643-1161','kamyla.aprendiz@potigas.com.br','1987-09-11','272','kc12','kamylacardoso','0',NULL,NULL,NULL),(136,'Thanise Fernandes Ribeiro Alves','','thanise.aprendiz@potigas.com.br','1991-08-17','271','nadona','thanisefernandes','0',NULL,NULL,NULL),(137,'Perla Bezerra Ribeiro','','perla.aprendiz@potigas.com.br','1987-12-15','287','pb12','perlabezerra','0',NULL,NULL,NULL),(138,'Marize Queiroz Pereira','','marizequeiroz@potigas.com.br','1995-04-14','281','4321potigas','marizequeiroz','0',NULL,NULL,NULL),(139,'Elizabeth Cristina da SIlva Grangeiro','3314-4378','elizabeth.estagiario@potigas.com.br','1987-08-03','','ec12','elizabethcristina','0',NULL,NULL,NULL),(140,'Fernando Dinoá Medeiros Filho','','dinoa@potigas.com.br','1990-10-04','214','1234','dinoa','0',NULL,NULL,NULL),(141,'Verônica Rodrigues Alves','8732-6343','veronica.estagiario@potigas.com.br','1972-03-20','219','vr12','veronicarodrigues','0',NULL,NULL,NULL),(142,'Daniela Cíntia Maia','3314-4378','danielamaia@vipetro.com.br','1988-06-11','','4321potigas','danielamaia','0',NULL,NULL,NULL),(143,'Karla Angélica Olinto da Silva','3219-2709','karla.ruicadete@potigas.com.br','1986-04-04','251','ka12','karlaangelica','0',NULL,NULL,NULL),(144,'Gaudêncio Jerônimo de Souza Neto ','','gaudencioneto@potigas.com.br','1996-03-26','182','poti4321','gaudencioneto','0',NULL,NULL,NULL),(145,'Patricia Reis Batista','','patricia.talimpo@potigas.com.br','1981-06-19','213','poti4321','patriciabatista','0',NULL,NULL,NULL),(146,'Wagner Pignataro Lima','9660-2402','wagner.vipetro@potigas.com.br','1989-09-26','271','4321potigas','wagner.pignataro','0',NULL,NULL,NULL),(147,'CIA Macaíba','','rwagner@potigas.com.br','1984-03-08','','1111','ciamacaiba','0',NULL,NULL,NULL),(148,'Felype Joseh de Souza Lima Alves e Silva','','felype.estagiario@potigas.com.br','1947-10-26','171','fj12','felypejoseh','0',NULL,NULL,NULL),(149,'Raul Kleber Gomes de Souza','','raul.kleber@potigas.com.br','1978-11-15','172','rakl123','raul.kleber','0',NULL,NULL,NULL),(150,'Carla Richelle de Freitas Brandão ','','carla.ruicadete@potigas.com.br','1983-11-11','251','cr123','carlarichelle','0',NULL,NULL,NULL),(151,'Antônio José da Costa','','antonio.jose@potigas.com.br','1987-10-08','3104','AnJo1234','antonio.jose','0',NULL,NULL,NULL),(152,'Arthur Felix Coelho Azevedo','','arthur.felix@potigas.com.br','1988-12-26','3105','arfe123','arthur.felix','0',NULL,NULL,NULL),(153,'Edaniela Galvão Ramalho','','edaniela.galvao@potigas.com.br','1993-06-24','2200','Dani1981','edaniela.galvao','0',NULL,NULL,NULL),(154,'João Cabral de Macedo','','joao.cabral@potigas.com.br','1988-06-17','2103','jc2701','joao.cabral','0',NULL,NULL,NULL),(155,'João Solon de Medeiros Júnior','','joao.solon@potigas.com.br','2012-09-09','2303','casa2703','joao.solon','0',NULL,NULL,NULL),(156,'Leonardo dos Santos Araújo','','leonardo.santos@potigas.com.br','1955-10-06','242','54321','leonardo.santos','0',NULL,NULL,NULL),(157,'Dayvson Nazaré da Silva','','dayvson.estagiario@potigas.com.br','1991-03-19','273','DaNa123','dayvson.nazare','0',NULL,NULL,NULL),(158,'Angelica Maria Constantino de Moura','3202-4659','angelica.estagiario@potigas.com.br',NULL,'220','1234','angelica.maria','0',NULL,NULL,NULL),(159,'Jancicleide Soares Gonçalves','3662-2057','jancicleide.estagiario@potigas.com.br','1982-04-14','257','JaSo123','jancicleide.soares','0',NULL,NULL,NULL),(160,'Crécio Fagner Cândido Bispo','3322-5534','crecio.fagner@potigas.com.br','1987-11-23','2502','Cle5ner6','crecio.fagner','0',NULL,NULL,NULL),(161,'Rodrigo Medeiros Vaz de Oliveira','3217-2293','rodrigo.medeiros@potigas.com.br','1993-12-02','290','RoMe123','rodrigo.medeiros','0',NULL,NULL,NULL),(162,'Arthur Dantas da Silva','3214-6969','arthur.dantas@potigas.com.br','1995-12-09','3207','ArDa123','arthur.dantas','0',NULL,NULL,NULL),(163,'Juliana Claudia Sousa Câmara de Lima','3234-6650','juliana.claudia@potigas.com.br','1987-03-23','3307','JuCl1234','juliana.claudia','0',NULL,NULL,NULL),(164,'Central Telefônica - PABX','98818-0093','ti@potigas.com.br','1995-01-23','','1111','pabx','0',NULL,NULL,NULL),(165,'Telefones Setoriais','3314-4378','mossoro@potigas.com.br','1992-09-22','5005','1111','gmos_vivo','0',NULL,NULL,NULL),(166,'Thaise Albano Nobrega','','thaise.aprendiz@potigas.com.br','1981-09-10','293','8833','thaise.albano','0',NULL,NULL,NULL),(167,'Pedro Paulo Ferreira de Araújo','','pedro.aprendiz@potigas.com.br','1976-03-06','','1234','pedro.paulo','0',NULL,NULL,NULL),(168,'Herica Daniel de Freitas','','herica.aprendiz@potigas.com.br','1989-07-29','','teste','herica.freitas','0',NULL,NULL,NULL),(169,'Luiz Henrique Lima da Silva','3343-0725','luiz.aprendiz@potigas.com.br','1985-01-05','','LuHe123','luiz.henrique','0',NULL,NULL,NULL),(170,'Jane Cristina de Oliveira Santos','98783-7294','rwagner@potigas.com.br','1985-06-05','4000','JaOl1234','jane.oliveira','0',NULL,NULL,NULL),(171,'Urraca Miramuri de Figueiredo Mendes','','urraca.miramuri@potigas.com.br','1983-07-06','183','UrMi123','urraca.miramuri','0',NULL,NULL,NULL),(172,'Thiciana Hipólito Rocha de Miranda Sales','','thiciana@vipetro.com.br','1978-02-25','','ThHi123','thiciana.hipolito','0',NULL,NULL,NULL),(173,'Cleonaldo Peixoto Galdino','','cleonaldo.estagiario@potigas.com.br','1987-11-08','273','ClPe123','cleonaldo.peixoto','0',NULL,NULL,NULL),(174,'Emmanuelle dos Santos Avelino Gomes','99140-5838','emmanuelle.santos@potigas.com.br','1970-01-01','2503','Manu0915','emmanuelle.santos','0',NULL,NULL,NULL),(175,'Rafael Alves da Rocha','','rafael.alves@potigas.com.br','1985-04-03','289','RaAl1234','rafael.alves','0',NULL,NULL,NULL),(176,'Rafael Beserra Nelson','','rafael.beserra@potigas.com.br','1992-12-01','290','poti158','rafael.beserra','0',NULL,NULL,NULL),(177,'Luana Wanessa Coutinho Gomes','','luana.estagiario@potigas.com.br','1993-12-05','287','poti4321','luana.wanessa','0',NULL,NULL,NULL),(178,'Antonio Francisco de Paula Neto','','antonio.francisco@potigas.com.br','1975-09-26','2104','1234569','antonio.francisco','0',NULL,NULL,NULL),(179,'Aline Polliana Lobato Ribeiro Teixeira Lima','','aline.polliana@potigas.com.br','1969-07-02','2304','OKB6315','aline.polliana','0',NULL,NULL,NULL),(180,'Mara Rochele de Lemos Câmara','','mara.rochele@potigas.com.br','1977-11-08','281','MaRo123','mara.rochele','0',NULL,NULL,NULL),(181,'Hylane Januário Sousa','','hylane.estagiario@potigas.com.br','1978-05-01','219','HyJa123','hylane.januario','0',NULL,NULL,NULL),(182,'Fernanda Cristina Martins Taveira','','fernanda.estagiario@potigas.com.br','1991-03-03','261','poti4321','fernanda.cristina','0',NULL,NULL,NULL),(183,'Érika Aiany de Souza Alves','3202-4659','erika.estagiario@potigas.com.br',NULL,'220','poti4321','erika.aiany','0',NULL,NULL,NULL),(184,'Sarah Martins dos Reis','3207-3153','sarah@vipetro.com.br','1972-06-14','','SaMa123','sarah.martins','0',NULL,NULL,NULL),(185,'Francisco Isaltino Guedes do Rêgo','','isaltinoguedes@potigas.com.br','1994-10-26','214','rego47','isaltino.guedes','0',NULL,NULL,NULL),(186,'Karina Silveira Silva','','karina.silveira@potigas.com.br','1980-08-29','253','poti4321','karina.silveira','0',NULL,NULL,NULL),(187,'Francisca Rosianne de Moura Xavier','','francisca.rosianne@potigas.com.br','1996-05-02','2101','R01022013','francisca.rosianne','0',NULL,NULL,NULL),(188,'Manoel Francisco de Oliveira Neto','','manoel.francisco@potigas.com.br','1982-10-17','3306','Asd14789','manoel.francisco','0',NULL,NULL,NULL),(189,'Jadson Anderson Medeiros da Silva','','jadson.anderson@potigas.com.br','1981-03-18','3401','adm300112','jadson.anderson','0',NULL,NULL,NULL),(190,'Fabio Antonio Correia Filgueira Filho','','fabio.estagiario@potigas.com.br','1970-01-01','221','fabio123','fabio.antonio','0',NULL,NULL,NULL),(191,'Raissa Cortez Teixeira de Carvalho','','raissa.cortez@potigas.com.br','1970-01-01','283','c0rt3z','raissa.cortez','0',NULL,NULL,NULL),(192,'Cheyanne Mirelly Ferreira','','cheyanne.estagiario@potigas.com.br','1954-10-27','289','1234','cheyanne.mirelly','0',NULL,NULL,NULL),(193,'Taismar Zanini','','tzanini@potigas.com.br','1994-10-23','215','TaZa123','taismar.zanini','0',NULL,NULL,NULL),(194,'Vanessa Lais de Souza Pacheco','','vanessa.estagiario@potigas.com.br','1983-12-28','171','VaLa123','vanessa.lais','0',NULL,NULL,NULL),(195,'Maria Gorete Pereira da Silva','','gorete.estagiario@potigas.com.br','1976-03-06','293','MaGo1234','maria.gorete','0',NULL,NULL,NULL),(196,'Hugo Werner Fortunato Dantas','','hugo.werner@potigas.com.br','1989-11-09','281','fortunato69','hugo.werner','0',NULL,NULL,NULL),(197,'Henrique Augusto de Sousa Conrado Pontes','','henrique.estagiario@potigas.com.br','1994-09-19','221','cnhf0212','henrique.augusto','0',NULL,NULL,NULL),(198,'Raimunda Castro de Melo Neta','','raimunda.aprendiz@potigas.com.br','1994-03-04','261','raimundacastro','raimunda.castro','0',NULL,NULL,NULL),(199,'Waldjandry Cassia Oliveira de Brito','','waldjandry.oliveira@potigas.com.br','1995-05-13','1301','WaOl1234','waldjandry.oliveira','0',NULL,NULL,NULL),(200,'Marta Oliveira Nóbrega','','marta.oliveira@potigas.com.br','1986-08-02','273','mn23*poti','marta.oliveira','0',NULL,NULL,NULL),(201,'Guilherme Rodrigues Silva','','guilherme.rodrigues@potigas.com.br','1976-01-31','293','GuRo123','guilherme.rodrigues','0',NULL,NULL,NULL),(202,'Rosineide Maria Bezerra','','rosineide.maria@potigas.com.br','1983-04-10','257','RoMa123','rosineide.maria','0',NULL,NULL,NULL),(203,'Paulo Sérgio de Sá Campos','','paulo.camposl@potigas.com.br','1996-01-22','217','Jonas123','paulo.campos2','0',NULL,NULL,NULL),(204,'Micaedla Lucena Barbosa da Silva','3334-0112','micaedla.silva@potigas.com.br','1988-02-21','5003','italo87143898','micaedla.silva','0',NULL,NULL,NULL),(205,'Luis Arthur Almeida de Assis','','luis.assis@potigas.com.br','1996-05-06','3206','LuAs1234','luis.assis','0',NULL,NULL,NULL),(206,'Leandro Pontes Medeiros','','leandro.medeiros@potigas.com.br','1994-03-29','2403','LeMe2016','leandro.medeiros','0',NULL,NULL,NULL),(207,'Kleber Mozart Medeiros da Silva','98758-7111','kleber.silva@potigas.com.br','1991-04-23','3205','KlSi1234','kleber.silva','0',NULL,NULL,NULL),(208,'Francisco Antônio Xavier da Silva','','francisco.silva@potigas.com.br','1997-09-13','2102','Ver10100','francisco.silva','0',NULL,NULL,NULL),(209,'Fernanda Georgia Lima de Araújo','3218-2756','fernanda.lima@potigas.com.br','1995-10-21','3305','FeLi1234','fernanda.lima','0',NULL,NULL,NULL),(210,'Telefone Setorial (Juliana)','','comercial@potigas.com.br','2000-11-24','','TeSe1234','telefone.setorial.02','0',NULL,NULL,NULL),(211,'Victor Emanuel Albuquerque Arraes','99616-0828','victor.arraes@potigas.com.br','2000-05-23','1201','ViAr1234','victor.arraes','0',NULL,NULL,NULL),(212,'Lanyelle Freitas de Oliveira','','lanyelle.freitas@potigas.com.br','1991-12-06','','LaFr1234','lanyelle.freitas','0',NULL,NULL,NULL),(213,'Jefferson Targino da Silva','','jefferson.targino@potigas.com.br','1995-07-04','220','JeTa1234','jefferson.targino','0',NULL,NULL,NULL),(214,'Carlos Alberto Borges Trindade Santos','','carlos.santos@potigas.com.br','1996-09-16','214','CaSa1234','carlos.santos','0',NULL,NULL,NULL),(215,'Evaldo de Lima Rebouças','','evaldo.reboucas@potigas.com.br','1994-10-19','232','nayara98','evaldo.reboucas','0',NULL,NULL,NULL),(216,'Marcello Rocha Lopes','','marcello.rocha@potigas.com.br','1984-09-05','232','MaRo1234','marcello.rocha','0',NULL,NULL,NULL),(217,'Wilbert de Souza Queiroz','','wilbert.queiroz@potigas.com.br','1996-07-18','2202','Leleca3004','wilbert.queiroz','0',NULL,NULL,NULL),(218,'Fernanda Louise Araujo de Morais','','fernanda.louise@potigas.com.br','1970-01-01','261','mzb0812','fernanda.louise','0',NULL,NULL,NULL),(219,'Flávio Victor Argandoña Ponce','','flavio.ponce@potigas.com.br','1998-02-23','1202','FlPo1234','flavio.ponce','0',NULL,NULL,NULL),(220,'Raymond Victor Holanda Veras','','raymond.veras@potigas.com.br','1974-10-30','293','RaVe1234','raymond.veras','0',NULL,NULL,NULL),(221,'Anna Caroline Queiroga de Souza','','anna.caroline@potigas.com.br','1992-10-11','3304','aPaR1215','anna.caroline','0',NULL,NULL,NULL),(222,'Samara Bezerra de Moura','','samara.bezerra@potigas.com.br','1986-07-26','289','SaBe1234','samara.bezerra','0',NULL,NULL,NULL),(223,'Mariana Vannucci Vasconcellos','98853-9193','mariana.vannucci@potigas.com.br','1995-03-15','253','MaVa1234','mariana.vannucci','0',NULL,NULL,NULL),(224,'Georgia Luana dos Santos Nery','99999-9812','georgia.nery@potigas.com.br','1997-06-11','219','Jornal08','georgia.nery','0',NULL,NULL,NULL),(225,'Telefone Setorial (Josimar)','','comercial@potigas.com.br','1997-08-24','','TeSe01','telefone.setorial.01','0',NULL,NULL,NULL),(226,'Telefone Setorial (Eudes)','','comercial@potigas.com.br','1996-01-20','','TeSe12','telefone.setorial.03','0',NULL,NULL,NULL),(227,'José Ricardo Ferreira Bezerra','','ricardo.bezerra@potigas.com.br','1996-03-02','215','fB016004','ricardo.bezerra','0',NULL,NULL,NULL),(228,'Francisco Leôncio de Souza Junior','','leoncio.souza@potigas.com.br','1979-06-23','221','LeSo231094','leoncio.souza','0',NULL,NULL,NULL),(229,'Geraldo Gabi de Miranda Júnior','','geraldo.miranda@potigas.com.br','1995-09-13','287','GeMi1234','geraldo.miranda','0',NULL,NULL,NULL),(230,'Paulo Sérgio de Sá Campos','','paulo.campos@potigas.com.br','1997-07-04','215','PScd4589','paulo.campos','0',NULL,NULL,NULL),(231,'Joseanny Soares Reges','','joseanny.reges@potigas.com.br','1997-08-04','221','JoRe1234','joseanny.reges','0',NULL,NULL,NULL),(232,'Artur Cavalcanti de Lima Bernardino','','artur.cavalcanti@potigas.com.br','1998-05-01','221','ArCa1234','artur.cavalcanti','0',NULL,NULL,NULL),(233,'Ana Marília Pitanga Torres','','marilia.torres@potigas.com.br','1998-03-31','293','MaTo2121','marilia.torres','0',NULL,NULL,NULL),(234,'Yolanda Aquidauana de Lima Nóbrega','','yolanda.aquidauana@potigas.com.br','1994-11-01','273','YoAq1234','yolanda.aquidauana','0',NULL,NULL,NULL),(235,'João Paulo da Silva','','joao.paulo@potigas.com.br','1995-06-20','284','JoPa4321','joao.paulo','0',NULL,NULL,NULL),(236,'Milley God Serrano Maia','98723-5761','milley.god@potigas.com.br','1999-01-17','1200','MiGo1234','milley.god','0',NULL,NULL,NULL),(237,'Sandra da Costa Ribeiro Dantas','','sandra.costa@potigas.com.br','2001-01-01','1402','Scrd1104','sandra.costa','0',NULL,NULL,NULL),(238,'Antônia Larissa Pereira Barbosa','','larissa.barbosa@potigas.com.br','1996-04-06','271','LaBa1234','larissa.barbosa','0',NULL,NULL,NULL),(239,'Flávia Talita Lucena das Chagas Monteiro','','talita.lucena@potigas.com.br','1986-08-28','1101','Daniel14','talita.lucena','0',NULL,NULL,NULL),(240,'Thayse Kharoline de Assunção Hunka','','thayse.assuncao@potigas.com.br','1989-02-16','273','ThAs1234','thayse.assuncao','0',NULL,NULL,NULL),(241,'Paulo Gabriel Negreiros de Almeida','','gabriel.negreiros@potigas.com.br','1986-05-26','220','Biel1234','gabriel.negreiros','0',NULL,NULL,NULL),(242,'Jefferson Honorato Torres','','jefferson.torres@potigas.com.br','1978-05-12','261','JeTo8855','jefferson.torres','0',NULL,NULL,NULL),(243,'Filipe Lopes Leocadio','','filipe.lopes@potigas.com.br','1971-12-28','257','FiLo1234','filipe.lopes','0',NULL,NULL,NULL),(244,'João Daniel Guimarães de Oliveira','3345-7847','joao.daniel@potigas.com.br','1950-10-15','257','JoDa1234','joao.daniel','0',NULL,NULL,NULL),(245,'Eunízio Permínio Leite Filho','','eunizio.leite@potigas.com.br','1969-05-15','225','EuLe1234','eunizio.leite','0',NULL,NULL,NULL),(246,'Edna Barreto das Neves','','edna.barreto@potigas.com.br','1962-01-06','257','EdBa1234','edna.barreto','0',NULL,NULL,NULL),(247,'Maria Priscylla Costa de Souza Padilha','','priscylla.costa@potigas.com.br','1986-12-02','','PrCo1234','priscylla.costa','0',NULL,NULL,NULL),(248,'Camila Diógenes de Mendonça','','camila.diogenes@potigas.com.br','1996-10-02','221','CaDi1234','camila.diogenes','0',NULL,NULL,NULL),(249,'Mariângela Costa Souza dos Santos','','mariangela.costa@potigas.com.br','1997-12-22','221','MaCo1234','mariangela.costa','0',NULL,NULL,NULL),(250,'Juliete de Araújo Gomes','','juliete.gomes@potigas.com.br','1997-07-17','257','JuGo1234','juliete.gomes','0',NULL,NULL,NULL),(251,'Janeheyry Almeida de Lima Oliveira','','janeheyry.almeida@potigas.com.br','1987-05-04','220','JaAl1234','janeheyry.almeida','0',NULL,NULL,NULL),(252,'Eri Lucas Bispo Pereira','','eri.lucas@potigas.com.br','1998-06-08','289','ErLu159753','eri.lucas','0',NULL,NULL,NULL),(253,'Recepção','3204-8500','ti@potigas.com.br','1991-01-12','4000','Poti1234','recepcao','0',NULL,NULL,NULL),(254,'Simonica Ravely Dantas de Oliveira','','simonica.oliveira@potigas.com.br','1998-02-05','281','SiOl90','simonica.oliveira','0',NULL,NULL,NULL),(255,'Eliana de Menezes Bandeira','','eliana.bandeira@potigas.com.br','1999-06-15','2000','Eb290897','eliana.bandeira','0',NULL,NULL,NULL),(256,'Karina Santos da Silva','','karina.santos@potigas.com.br','1997-11-13','293','19030905','karina.santos','0',NULL,NULL,NULL),(257,'Mariana de Oliveira Vogado Vargas','','mariana.vogado@potigas.com.br','1998-12-23','221','MaVo1234','mariana.vogado','0',NULL,NULL,NULL),(258,'Naiara Bezerra da Silva','','naiara.bezerra@potigas.com.br','1998-09-06','287','Pablorudah21','naiara.bezerra','0',NULL,NULL,NULL),(259,'Halanna Beatriz Pinheiro Rebouças','98747-4794','rwagner@potigas.com.br','1997-05-13','211','HaBe1234','halanna.beatriz','0',NULL,NULL,NULL),(260,'Fledcia de Paiva Nonato','3314-4378','fledcia.paiva@potigas.com.br','1972-10-20','','FlPa1234','fledcia.paiva','0',NULL,NULL,NULL),(261,'Ewerton Victor Pinheiro da Silva','','ewerton.victor@potigas.com.br','1996-08-22','1203','EwVi1234','ewerton.victor','0',NULL,NULL,NULL),(262,'Yure de França Santiago','','yure.santiago@potigas.com.br','1983-04-25','257','live.yes.012','yure.santiago','0',NULL,NULL,NULL),(263,'José Alves Terceiro Neto','98148-9674','jose.alves@potigas.com.br','1990-12-12','221','JoAl1234','jose.alves','0',NULL,NULL,NULL),(264,'Matheus Siqueira de Araujo','','matheus.siqueira@potigas.com.br',NULL,'2404','MaSi1234','matheus.siqueira','0',NULL,NULL,NULL),(265,'Bruna Rafaela Matias','','bruna.matias@potigas.com.br',NULL,'2203','BrMa1234','bruna.matias','0',NULL,NULL,NULL),(266,'Daniele Nunes Ramos','','daniele.nunes@potigas.com.br',NULL,'287','DaNu1234','daniele.nunes','0',NULL,NULL,NULL),(267,'João Victor Alves Pinto Bezerra','','joao.victor@potigas.com.br',NULL,'266','JoVi1234','joao.victor','0',NULL,NULL,NULL),(268,'Ana Alice Oliveira Nicacio','','ana.alice@potigas.com.br',NULL,'240','AlAn1234','ana.alice','0',NULL,NULL,NULL),(269,'Thainar Alves Duarte','','thainar.duarte@potigas.com.br',NULL,'3308','ThDu1234','thainar.duarte','0',NULL,NULL,NULL),(270,'Rayssa Karoline Dias de Aquino','','rayssa.dias@potigas.com.br',NULL,'273','RaDi1234','rayssa.dias','0',NULL,NULL,NULL),(271,'Laidia Mitse Feitosa de Lima','','laidia.lima@potigas.com.br',NULL,'3308','LaLi1234','laidia.lima','0',NULL,NULL,NULL),(272,'Fred Azevedo (teste)','','fred.azevedo@teste.com.br',NULL,'','123456','fred.azevedo','0',NULL,NULL,NULL),(273,'Lucas Martiliano Silva de Souza','','lucas.souza@potigas.com.br',NULL,'2305','LuSo1234','lucas.souza','0',NULL,NULL,NULL),(274,'Welson Dantas da Silva','','welson.dantas@potigas.com.br',NULL,'2504','WeDa1234','welson.dantas','0',NULL,NULL,NULL),(275,'Helder Fábio Soares De Macedo','','helder.macedo@potigas.com.br',NULL,'242','32051217','helder.macedo','0',NULL,NULL,NULL),(276,'Marina Melo Alves Siqueira','','marina.siqueira@potigas.com.br',NULL,'1001','MaSi1234','marina.siqueira','0',NULL,NULL,NULL),(277,'Cristiane Kelly Macedo da Silva Oliveira','','cristiane.macedo@potigas.com.br',NULL,'1100','CrMa1234','cristiane.macedo','0',NULL,NULL,NULL),(278,'Larissa Dantas Gentile','','larissa.dgentile@potigas.com.br',NULL,'1000','PippoG7#','larissa.dgentile','0',NULL,NULL,NULL),(279,'Enilce Dias Leão Barbalho','','enilce.barbalho@potigas.com.br',NULL,'1002','EnBa1510!','enilce.barbalho','0',NULL,NULL,NULL),(280,'Emile Yasser Safieh','','emile.safieh@potigas.com.br',NULL,'1400','EmSa1234','emile.safieh','0',NULL,NULL,NULL),(281,'Maria Cecília Bussoni','','cecilia.bussoni@potigas.com.br',NULL,'1003','cecilia','cecilia.bussoni','0',NULL,NULL,NULL),(282,'Sérgio Henrique Guimarães de Paula','','sergio.henrique@potigas.com.br',NULL,'3000','funedE#10','sergio.henrique','0',NULL,NULL,NULL),(283,'Thais Salamoni Bastos','','thais.bastos@potigas.com.br',NULL,'3208','ThBa1234','thais.bastos','0',NULL,NULL,NULL),(284,'Hanna Stefanny Alves de Paiva','99940-4622','hanna.paiva@potigas.com.br',NULL,'5002','HaPa1234','hanna.paiva','0',NULL,NULL,NULL),(285,'Mateus Vinicius Pereira da Silva','3065-7384','mateus.silva@potigas.com.br',NULL,'5002','MaSi1234','mateus.silva','0',NULL,NULL,NULL),(286,'Railza Alves do Nascimento','','railza.nascimento@potigas.com.br',NULL,'2105','RaNa1234','railza.nascimento ','0',NULL,NULL,NULL),(287,'Priscila Jesuino Dantas','','priscila.jesuino@potigas.com.br',NULL,'2306','PrJe1234','priscila.jesuino','0',NULL,NULL,NULL),(288,'Raquel de Araújo Lourenço','','raquel.lourenco@potigas.com.br',NULL,'2305','RaLo1234','raquel.lourenco','0',NULL,NULL,NULL),(289,'Louise Lira Lopes','','louise.lira@potigas.com.br',NULL,'1102','LoLi1234','louise.lira','0',NULL,NULL,NULL),(290,'Marília Nayara Santos Silva','','marilia.silva@potigas.com.br',NULL,'2203','MaSi1234','marilia.silva','0',NULL,NULL,NULL),(291,'Washington Wagner David Cruz','','wagner.cruz@potigas.com',NULL,'2404','WaCr1234','wagner.cruz','0',NULL,NULL,NULL),(292,'Fernanda Guilherme dos Santos','','fernanda.guilherme@potigas.com.br',NULL,'2404','cabeloloco154','fernanda.guilherme','0',NULL,NULL,NULL),(293,'Luiz Felipe Cardoso da Silva Lima','','luiz.felipe@potigas.com.br',NULL,'1203','LuFe1234','luiz.felipe','0',NULL,NULL,NULL),(294,'Jéssica Maria da Silva','','jessica.maria@potigas.com.br',NULL,'2504','JeMa1234','jessica.maria','0',NULL,NULL,NULL),(295,'Luis Gustavo Alves Smith','','gustavo.smith@potigas.com.br',NULL,'1200','GuSmith20!','gustavo.smith','0',NULL,NULL,NULL),(296,'Pedro Henrique Galvão Pinto','','pedro.galvao@potigas.com.br',NULL,'3402','PeGa1234','pedro.galvao','0',NULL,NULL,NULL),(297,'Wellenilson Câmara da Costa Ripardo','99944-1791','wellenilson.costa@potigas.com.br',NULL,'2504','WeCo1234','wellenilson.costa','0',NULL,NULL,NULL),(298,'Cynthia Kérzia Costa de Araújo Tavares','','cynthia.talimpo@potigas.com.br',NULL,'1301','CyTa1234#!','cynthia.talimpo','0',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacao`
--

LOCK TABLES `publicacao` WRITE;
/*!40000 ALTER TABLE `publicacao` DISABLE KEYS */;
INSERT INTO `publicacao` VALUES (1,'Primeiro Comunicado','<p>Um conteÃºdo bem massa e bem importante para testar nossa <strong>nova intranet</strong> corporativa.</p>','2020-09-18 00:00:00','',1,1,1),(2,'Segundo Comunicado','<p>Um conteudo pra teste parte 2</p>','2020-09-18 00:00:00','sem comentÃ¡rios',1,2,2),(3,'Colaboradores participam de treinamento do SEI','<p>Um grupo de colaboradores da PotigÃ¡s participou durante 4 dias do treinamento presencial para a ferramenta de controle de processos SEI (Sistema EletrÃ´nico de InformaÃ§Ãµes), da Coordenadoria de OperaÃ§Ãµes de Tecnologia da InformaÃ§Ã£o e ComunicaÃ§Ã£o (COTIC), setor ligado Ã  Secretaria de AdministraÃ§Ã£o do Estado.</p><p>O curso apresentou as principais funcionalidades do SEI, utilizado na AdministraÃ§Ã£o PÃºblica Estadual para aprimorar a gestÃ£o documental e facilitar o acesso de servidores e cidadÃ£os Ã s informaÃ§Ãµes institucionais, propiciando celeridade, seguranÃ§a e economicidade. O objetivo do curso era capacitar as pessoas que atuam na gestÃ£o de documentos para utilizar o SEI e usufruir dos seus benefÃ­cios no dia a dia de trabalho. Os colaboradores participantes foram indicados pelos gestores por jÃ¡ atuarem com processos.</p><p>O treinamento, ministrado pela pela ComissÃ£o de Treinamento do SEI (SEAD - COTIC), foi importante para o momento em que a PotigÃ¡s, atravÃ©s da GerÃªncia de SeguranÃ§a Meio Ambiente e SaÃºde (GSMS), vem desenvolvendo o mapeamento e revisÃ£o dos processos nas Ã¡reas comercial, tÃ©cnica e de operaÃ§Ã£o e manutenÃ§Ã£o, visando otimizar prazos, reduzir os custos, melhorar controles com indicadores, reduzindo gargalos e aumentando a qualidade das entregas realizadas por cada Ã¡rea.</p><p>O curso teve carga horÃ¡ria de 8hrs, divididas em 4 dias (dois por semana) e aconteceu no LaboratÃ³rio de InformÃ¡tica da Escola de Governo, no Centro Administrativo do Estado.</p>','2020-10-27 00:00:00','Publicar no dia 01 de novembro.',1,31,1),(4,'Comunicado de Chico','<h1><strong>T&iacute;tulo</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><em><strong>Capitulo 1</strong></em></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>item 1\r\n	<ol>\r\n		<li>item x</li>\r\n	</ol>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n','2020-11-02 00:00:00','',1,1,1),(5,'Uma curva no tempo','<p><s>Comunicado de teste 1234</s></p>\r\n\r\n<p><s><img alt=\"\" src=\"/ckfinder/userfiles/images/oie_transparent%20(6).png\" style=\"height:862px; width:704px\" /></s></p>\r\n','2020-11-06 00:00:00','aaaaaaaaaaaaaaa',1,4,1),(6,'Feliz Natal!','<p><img alt=\"\" src=\"/ckfinder/userfiles/images/20201223103212_WhatsApp%20Image%202020-12-22%20at%2017_04_39.jpg\" style=\"height:1200px; width:675px\" /></p>\r\n','2020-12-30 00:00:00','',1,153,1);
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
  `solicitante` int(11) NOT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `Assunto` varchar(200) NOT NULL,
  `status` varchar(25) NOT NULL,
  `sala` int(11) NOT NULL,
  PRIMARY KEY (`cod_reserva`),
  KEY `solicitante` (`solicitante`),
  KEY `reserva_ibfk_1` (`responsavel`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`responsavel`) REFERENCES `funcionario` (`cod_funcionario`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`solicitante`) REFERENCES `funcionario` (`cod_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,'2021-02-05 00:00:00','2021-02-06 00:00:00',NULL,'Rolezinho',1,NULL,'ReuniÃ£o geral da direx','Aguardando avaliação',0),(2,'2021-01-04 00:00:00','2021-01-13 00:00:00',NULL,'Reserva de espaÃ§o para distribuiÃ§Ã£o de vacinas contra covid 19',1,NULL,'DistribuiÃ§Ã£o de vacinas','3',0),(3,'2021-02-02 00:00:00','2021-02-02 00:00:00',NULL,'Rolezinho',1,NULL,'ReuniÃ£o geral da direx','Aguardando avaliaÃ§Ã£o',0),(4,'2020-11-30 00:00:00','2020-12-01 00:00:00',NULL,'Rolezinho',1,NULL,'Teste Assunto','Aguardando avaliaÃ§Ã£o',0);
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

-- Dump completed on 2021-01-04  8:09:45
