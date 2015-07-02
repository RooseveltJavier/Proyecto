/*
Navicat MySQL Data Transfer

Source Server         : procesos
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : gp_casos_procesos

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-06-19 08:17:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gp_departamentos
-- ----------------------------
DROP TABLE IF EXISTS `gp_departamentos`;
CREATE TABLE `gp_departamentos` (
  `id_dep` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_depart` varchar(100) DEFAULT NULL,
  `estado_dep` set('0','1') DEFAULT '1',
  PRIMARY KEY (`id_dep`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gp_departamentos
-- ----------------------------
INSERT INTO `gp_departamentos` VALUES ('1', 'ISGTI', '1');
INSERT INTO `gp_departamentos` VALUES ('2', 'TAW', '1');
INSERT INTO `gp_departamentos` VALUES ('3', 'IA', '1');
INSERT INTO `gp_departamentos` VALUES ('4', 'ET', '1');

-- ----------------------------
-- Table structure for gp_estados
-- ----------------------------
DROP TABLE IF EXISTS `gp_estados`;
CREATE TABLE `gp_estados` (
  `id_estado` int(10) NOT NULL AUTO_INCREMENT,
  `valor` varchar(50) DEFAULT NULL,
  `status` set('0','1') DEFAULT '1',
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gp_estados
-- ----------------------------
INSERT INTO `gp_estados` VALUES ('1', 'revisado', '1');
INSERT INTO `gp_estados` VALUES ('2', 'anulado', '1');
INSERT INTO `gp_estados` VALUES ('3', 'cambio', '1');

-- ----------------------------
-- Table structure for gp_matricula
-- ----------------------------
DROP TABLE IF EXISTS `gp_matricula`;
CREATE TABLE `gp_matricula` (
  `id_m` int(10) NOT NULL AUTO_INCREMENT,
  `id_materia` varchar(10) DEFAULT NULL,
  `id_persona` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_m`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gp_matricula
-- ----------------------------

-- ----------------------------
-- Table structure for gp_periodo
-- ----------------------------
DROP TABLE IF EXISTS `gp_periodo`;
CREATE TABLE `gp_periodo` (
  `id_perido` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_periodo` date DEFAULT NULL,
  `estado_periodo` set('1','0') DEFAULT '1',
  PRIMARY KEY (`id_perido`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gp_periodo
-- ----------------------------
INSERT INTO `gp_periodo` VALUES ('1', '2013-02-01', '1');
INSERT INTO `gp_periodo` VALUES ('2', '2013-09-01', '1');
INSERT INTO `gp_periodo` VALUES ('3', '2014-02-01', '1');
INSERT INTO `gp_periodo` VALUES ('4', '2014-09-01', '1');
INSERT INTO `gp_periodo` VALUES ('5', '2015-02-01', '1');

-- ----------------------------
-- Table structure for gp_persona
-- ----------------------------
DROP TABLE IF EXISTS `gp_persona`;
CREATE TABLE `gp_persona` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usu` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `correo` varchar(500) DEFAULT NULL,
  `id_tipopersona` varchar(10) DEFAULT NULL,
  `id_departamento` varchar(10) DEFAULT NULL,
  `activo` set('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gp_persona
-- ----------------------------
INSERT INTO `gp_persona` VALUES ('1', 'Angel', 'Cuenca', 'angel', 'angel', null, null, null, '1');
INSERT INTO `gp_persona` VALUES ('2', 'Roosvelt', 'Jaramillo', 'admin', 'admin', null, null, null, '1');
INSERT INTO `gp_persona` VALUES ('3', 'Marco', 'Valarezo', 'admin', '123', null, null, null, '1');

-- ----------------------------
-- Table structure for gp_propuesta
-- ----------------------------
DROP TABLE IF EXISTS `gp_propuesta`;
CREATE TABLE `gp_propuesta` (
  `id_p` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `contenido` varchar(500) DEFAULT NULL,
  `id_periodo` varchar(10) DEFAULT NULL,
  `id_departamento` varchar(10) DEFAULT NULL,
  `id_persona` varchar(10) DEFAULT NULL,
  `fecha_sys` date DEFAULT NULL,
  `hora_sys` time DEFAULT NULL,
  `id_estado` varchar(0) DEFAULT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gp_propuesta
-- ----------------------------

-- ----------------------------
-- Table structure for gp_tipopersona
-- ----------------------------
DROP TABLE IF EXISTS `gp_tipopersona`;
CREATE TABLE `gp_tipopersona` (
  `id_typ` int(10) NOT NULL AUTO_INCREMENT,
  `typo_persona` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_typ`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gp_tipopersona
-- ----------------------------
INSERT INTO `gp_tipopersona` VALUES ('1', 'docente');
INSERT INTO `gp_tipopersona` VALUES ('2', 'estudiante');
