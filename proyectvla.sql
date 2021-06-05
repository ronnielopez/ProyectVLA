/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : proyectvla

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 04/06/2021 21:27:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cursos
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos`  (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechaInicio` date NULL DEFAULT NULL,
  `fechaFin` date NULL DEFAULT NULL,
  PRIMARY KEY (`idCurso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES (1, 'ingles', '0000-00-00', '2021-06-30');
INSERT INTO `cursos` VALUES (3, 'Cisco', '2021-05-03', '2021-06-26');
INSERT INTO `cursos` VALUES (4, 'Portugues', '2021-05-07', '0000-00-00');
INSERT INTO `cursos` VALUES (6, 'SQL', '2021-05-21', '2021-06-25');
INSERT INTO `cursos` VALUES (7, 'Python', '2021-05-03', '2021-06-26');

-- ----------------------------
-- Table structure for estudiante
-- ----------------------------
DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante`  (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` enum('Masculino','Femenino') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pais` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idCurso` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`) USING BTREE,
  INDEX `curso`(`idCurso`) USING BTREE,
  CONSTRAINT `curso` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estudiante
-- ----------------------------
INSERT INTO `estudiante` VALUES (1, 'Carlos', 'Aguinaga', 'Masculino', 'Nicaragua', 3);
INSERT INTO `estudiante` VALUES (2, 'Elizabeth', 'Medina', 'Masculino', 'Nicaragua', 1);
INSERT INTO `estudiante` VALUES (3, 'Ericka', 'Montoya', 'Femenino', 'Costa Rica', 4);
INSERT INTO `estudiante` VALUES (4, 'Luis', 'Pérez', 'Masculino', 'Costa Rica', 6);
INSERT INTO `estudiante` VALUES (5, 'Margarita', 'Molina', 'Femenino', 'El\r\nSalvador', 3);
INSERT INTO `estudiante` VALUES (6, 'Felipe', 'Lanzas', 'Masculino', 'Honduras', 4);
INSERT INTO `estudiante` VALUES (7, 'Maria', 'Lopez', 'Femenino', 'Costa Rica', 7);
INSERT INTO `estudiante` VALUES (8, 'Fernando', 'Olivares', 'Masculino', 'El\r\nSalvador', 3);
INSERT INTO `estudiante` VALUES (9, 'Juan', 'Lopez', 'Masculino', 'Nicaragua', 3);
INSERT INTO `estudiante` VALUES (10, 'Marcelo', 'Fernandez', '', 'Costa Rica', 6);

SET FOREIGN_KEY_CHECKS = 1;
