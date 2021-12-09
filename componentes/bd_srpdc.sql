-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 05:14 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_srpdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `aforo`
--

CREATE TABLE `aforo` (
  `id_aforo` int(11) NOT NULL,
  `semaforo` varchar(20) NOT NULL,
  `a_general` int(11) NOT NULL,
  `a_administrativo` int(11) NOT NULL,
  `a_docentes` int(11) NOT NULL,
  `a_estudiantes` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `observaciones` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aforo`
--

INSERT INTO `aforo` (`id_aforo`, `semaforo`, `a_general`, `a_administrativo`, `a_docentes`, `a_estudiantes`, `estado`, `observaciones`) VALUES
(1, 'Verde', 500, 200, 100, 200, 'Activado', 'Ninguna'),
(9, 'Amarrillo', 520, 100, 10, 10, 'Desactivado', 'jhgh');

-- --------------------------------------------------------

--
-- Table structure for table `historial_alumnos`
--

CREATE TABLE `historial_alumnos` (
  `id_hist` int(11) NOT NULL,
  `matricula_alum` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `nivel_educativo` varchar(30) NOT NULL,
  `carrera` varchar(200) NOT NULL,
  `grado` varchar(10) NOT NULL,
  `grupo` varchar(10) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_escaneo` datetime NOT NULL,
  `temperatura` varchar(10) NOT NULL,
  `p1` varchar(10) NOT NULL,
  `p2` varchar(10) NOT NULL,
  `p3` varchar(10) NOT NULL,
  `p4` varchar(10) NOT NULL,
  `acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial_alumnos`
--

INSERT INTO `historial_alumnos` (`id_hist`, `matricula_alum`, `nombre`, `nivel_educativo`, `carrera`, `grado`, `grupo`, `fecha_registro`, `fecha_escaneo`, `temperatura`, `p1`, `p2`, `p3`, `p4`, `acceso`) VALUES
(1, 'TI2018S026', 'KENDY RODRIGUEZ SANCHEZ', 'LICENCIATURA', 'INGENIERÍA EN ENTORNOS VIRTUALES Y NEGOCIOS DIGITALES', '10MO', '10A', '2021-12-01 23:04:22', '2021-12-01 23:07:34', '32.5', 'NO', 'NO', 'NO', 'NO', 1),
(2, 'TI2018S030', 'JAIRO ELISUR CHAVARRIA SANTIAGO', 'LICENCIATURA', 'INGENIERÍA EN ENTORNOS VIRTUALES Y NEGOCIOS DIGITALES', '10MO', '10A', '2021-12-01 23:03:06', '2021-12-01 23:07:43', '36.5', 'NO', 'NO', 'NO', 'NO', 1),
(3, 'TI2018S032', 'BRANDON DANIEL DURAN HERNANDEZ', 'LICENCIATURA', 'INGENIERÍA EN ENTORNOS VIRTUALES Y NEGOCIOS DIGITALES', '7MO', '7A', '2021-12-01 23:02:48', '2021-12-01 23:07:54', '32.5', 'NO', 'NO', 'NO', 'NO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `historial_users`
--

CREATE TABLE `historial_users` (
  `id_hist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_escaneo` datetime NOT NULL,
  `temperatura` varchar(10) NOT NULL,
  `p1` varchar(10) NOT NULL,
  `p2` varchar(10) NOT NULL,
  `p3` varchar(10) NOT NULL,
  `p4` varchar(10) NOT NULL,
  `acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial_users`
--

INSERT INTO `historial_users` (`id_hist`, `id_usuario`, `fecha_registro`, `fecha_escaneo`, `temperatura`, `p1`, `p2`, `p3`, `p4`, `acceso`) VALUES
(1, 1, '2021-12-01 23:00:01', '2021-12-01 23:06:20', '36.5', 'NO', 'NO', 'NO', 'NO', 1),
(2, 2, '2021-12-01 23:00:44', '2021-12-01 23:06:37', '36.2', 'SI', 'NO', 'NO', 'NO', 0),
(3, 3, '2021-12-01 23:01:10', '2021-12-01 23:06:56', '34.5', 'SI', 'NO', 'NO', 'NO', 0),
(4, 4, '2021-12-01 23:01:25', '2021-12-01 23:07:07', '36.5', 'NO', 'NO', 'NO', 'NO', 1),
(5, 5, '2021-12-01 23:01:44', '2021-12-01 23:07:21', '36.3', 'NO', 'NO', 'NO', 'NO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `modulo` varchar(40) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `modulo`, `url`, `icon`, `estado`) VALUES
(1, 'Formulario de Sanidad', 'contestar_form.php', 'fas fa-align-left', 'Activado'),
(2, 'Mi Histórico', 'mi_historico.php', 'fas fa-book', 'Activado'),
(3, 'Recuperación de QR', 'recuperar_qr.php', 'fas fa-qrcode', 'Activado'),
(4, 'Aforo Actual', 'aforo_actual.php', 'fas fa-table', 'Activado'),
(5, 'Histórico', 'historico.php', 'fas fa-table', 'Activado'),
(6, 'Usuarios', 'usuarios.php', 'fas fa-users', 'Activado'),
(7, 'Gestión de Roles', 'gestion_roles.php', 'fas fa-users-cog', 'Activado'),
(8, 'Gestión de Aforo', 'gestion_aforo.php', 'fas fa-traffic-light', 'Activado'),
(9, 'Lector de QR', 'lector.php', 'fas fa-qrcode', 'Activado'),
(10, 'Preguntas de Sanidad', 'preguntas.php', 'fas fa-align-left', 'Desactivado'),
(11, 'Bitácora', 'bitacora.php', 'fas fa-book', 'Activado');

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `estado`, `descripcion`) VALUES
(1, '¿Tienes fiebre o temperatura?', 'Activado', 'pregunta1'),
(2, '¿Tienes Tos?', 'Activado', 'pregunta2'),
(3, '¿Tienes dolor de cabeza?', 'Activado', 'pregunta3'),
(4, '¿Has estado en contacto con alguien con COVID-19?', 'Activado', 'pregunta4');

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `id_qr` int(11) NOT NULL,
  `qr` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `valido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr`
--

INSERT INTO `qr` (`id_qr`, `qr`, `fecha`, `hora`, `estado`, `usuario`, `valido`) VALUES
(1, 'SUPER ADMIN||1||2021-12-01||23:00:01||NO||NO||NO||NO||1', '2021-12-01', '23:00:01', 0, '1', 1),
(2, 'ROL SIN PERMISOS||2||2021-12-01||23:00:44||SI||NO||NO||NO||0', '2021-12-01', '23:00:44', 0, '2', 0),
(3, 'Docentes||3||2021-12-01||23:01:10||SI||NO||NO||NO||0', '2021-12-01', '23:01:10', 0, '3', 0),
(4, 'Docentes||4||2021-12-01||23:01:25||NO||NO||NO||NO||1', '2021-12-01', '23:01:25', 0, '4', 1),
(5, 'Administrativos||5||2021-12-01||23:01:44||NO||NO||NO||NO||1', '2021-12-01', '23:01:44', 0, '5', 1),
(6, 'Estudiante||TI2018S032||BRANDON DANIEL DURAN HERNANDEZ||LICENCIATURA||INGENIERÍA EN ENTORNOS VIRTUALES Y NEGOCIOS DIGITALES||7MO||7A||2021-12-01||23:02:48||NO||NO||NO||NO||1', '2021-12-01', '23:02:48', 0, 'TI2018S032', 1),
(7, 'Estudiante||TI2018S030||JAIRO ELISUR CHAVARRIA SANTIAGO||LICENCIATURA||INGENIERÍA EN ENTORNOS VIRTUALES Y NEGOCIOS DIGITALES||10MO||10A||2021-12-01||23:03:06||NO||NO||NO||NO||1', '2021-12-01', '23:03:06', 0, 'TI2018S030', 1),
(8, 'Estudiante||TI2018S026||KENDY RODRIGUEZ SANCHEZ||LICENCIATURA||INGENIERÍA EN ENTORNOS VIRTUALES Y NEGOCIOS DIGITALES||10MO||10A||2021-12-01||23:04:22||NO||NO||NO||NO||1', '2021-12-01', '23:04:22', 0, 'TI2018S026', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rel_roles_modulos`
--

CREATE TABLE `rel_roles_modulos` (
  `id_relacion` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `editar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rel_roles_modulos`
--

INSERT INTO `rel_roles_modulos` (`id_relacion`, `id_rol`, `id_modulo`, `editar`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 2, 1, 1),
(13, 2, 2, 1),
(14, 2, 3, 1),
(15, 2, 4, 0),
(16, 2, 5, 0),
(17, 2, 6, 0),
(18, 2, 7, 0),
(19, 2, 8, 0),
(20, 2, 9, 0),
(21, 2, 10, 0),
(22, 2, 11, 0),
(34, 6, 1, 1),
(35, 6, 2, 1),
(36, 6, 3, 1),
(37, 6, 4, 1),
(38, 6, 5, 1),
(39, 6, 6, 0),
(40, 6, 7, 0),
(41, 6, 8, 1),
(42, 6, 9, 1),
(98, 5, 1, 1),
(99, 5, 2, 1),
(100, 5, 3, 1),
(101, 5, 4, 1),
(102, 5, 5, 0),
(136, 8, 1, 1),
(137, 8, 2, 1),
(138, 8, 3, 1),
(139, 8, 4, 0),
(140, 8, 5, 0),
(141, 8, 6, 1),
(142, 8, 7, 0),
(143, 8, 8, 1),
(144, 8, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `observaciones` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `estado`, `observaciones`) VALUES
(1, 'SUPER ADMIN', 'Activado', 'Ninguna'),
(2, 'ROL SIN PERMISOS', 'Activado', 'ROL DE USUARIO SIN PERMISOS'),
(5, 'Docentes', 'Activado', 'Rol de Docentes'),
(6, 'Administrativos', 'Activado', 'Rol de Administrativos'),
(8, 'rolactualizado', 'Desactivado', 'rolactualizadp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_registro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `Modulo` varchar(100) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id_registro`, `id_usuario`, `Modulo`, `accion`, `fecha`) VALUES
(3, 1, 'Roles', 'Insert', '2021-11-30 01:26:45'),
(4, 1, 'Usuarios', 'Insert', '2021-11-30 01:27:17'),
(5, 1, 'Roles', 'Insert', '2021-11-30 01:29:29'),
(6, 1, 'Roles', 'Delete', '2021-11-30 01:35:36'),
(7, 1, 'Roles', 'Delete', '2021-11-30 01:36:41'),
(8, 1, 'Roles', 'Delete', '2021-11-30 01:38:46'),
(9, 1, 'Roles', 'Insert', '2021-11-30 01:38:56'),
(10, 1, 'Preguntas', 'Delete', '2021-11-30 01:46:14'),
(11, 1, 'Preguntas', 'Insert', '2021-11-30 01:47:59'),
(12, 1, 'Roles', 'Delete', '2021-12-01 22:53:55'),
(13, 1, 'Roles', 'Insert', '2021-12-01 22:54:23'),
(14, 1, 'Usuarios', 'Insert', '2021-12-01 22:55:02'),
(15, 1, 'Usuarios', 'Insert', '2021-12-01 22:55:23'),
(16, 1, 'Roles', 'Insert', '2021-12-01 22:56:23'),
(17, 1, 'Usuarios', 'Insert', '2021-12-01 22:56:49'),
(18, 1, 'Aforo', 'Insert', '2021-12-06 00:10:31'),
(19, 1, 'Aforo', 'update', '2021-12-06 00:10:49'),
(20, 1, 'Aforo', 'update', '2021-12-06 00:11:04'),
(21, 1, 'Aforo', 'update', '2021-12-06 00:11:16'),
(22, 1, 'Aforo', 'Delete', '2021-12-06 00:17:51'),
(23, 1, 'Aforo', 'update', '2021-12-06 00:18:11'),
(24, 1, 'Aforo', 'Insert', '2021-12-06 00:19:53'),
(25, 1, 'Aforo', 'Delete', '2021-12-06 00:20:06'),
(26, 1, 'Aforo', 'Insert', '2021-12-06 00:22:09'),
(27, 1, 'Aforo', 'Delete', '2021-12-06 00:31:01'),
(28, 1, 'Aforo', 'update', '2021-12-06 00:46:42'),
(29, 1, 'Aforo', 'Insert', '2021-12-06 00:47:03'),
(30, 1, 'Aforo', 'update', '2021-12-06 00:53:40'),
(31, 1, 'Aforo', 'update', '2021-12-06 00:53:46'),
(32, 1, 'Roles', 'Delete', '2021-12-07 00:46:29'),
(33, 1, 'Roles', 'Insert', '2021-12-07 21:49:25'),
(34, 1, 'Roles', 'Delete', '2021-12-07 22:18:01'),
(35, 1, 'Roles', 'Insert', '2021-12-07 22:18:20'),
(36, 1, 'Roles', 'Update', '2021-12-08 01:13:28'),
(37, 1, 'Roles', 'Update', '2021-12-08 01:14:33'),
(38, 1, 'Roles', 'Update', '2021-12-08 01:14:45'),
(39, 1, 'Roles', 'Update', '2021-12-08 01:17:06'),
(40, 1, 'Roles', 'Update', '2021-12-08 01:17:23'),
(41, 1, 'Roles', 'Update', '2021-12-08 01:17:40'),
(42, 1, 'Roles', 'Update', '2021-12-08 01:31:44'),
(43, 1, 'Roles', 'Update', '2021-12-08 01:32:35'),
(44, 1, 'Roles', 'Update', '2021-12-08 01:34:54'),
(45, 1, 'Roles', 'Update', '2021-12-08 01:35:06'),
(46, 1, 'Roles', 'Update', '2021-12-08 01:40:13'),
(47, 1, 'Roles', 'Update', '2021-12-08 01:40:22'),
(48, 1, 'Roles', 'Update', '2021-12-08 15:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `observaciones` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `telefono`, `correo`, `password`, `id_rol`, `estado`, `observaciones`) VALUES
(1, 'Marillyn Cordova Evangelio', '734152525', 'nani@gmail.com', '123', 1, 'Activado', 'Ninguna'),
(2, 'JAIRO ELISUR CHAVARRIA SANTIAGO', '7341598583', 'elisur1998@gmail.com', '123', 2, 'Activado', 'Ninguna'),
(3, 'Benjamin Manjarrez Brito', '7341598583', 'benja@gmail.com', '123', 5, 'Activado', 'Ninguna'),
(4, 'Irma Aandrade Aguado', '7341598583', 'irma@gmail.com', '123', 5, 'Activado', 'Ninguna'),
(5, 'Rosa Rios Gomez', '7341598583', 'rosa@gmail.com', '123', 6, 'Activado', 'Ninguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aforo`
--
ALTER TABLE `aforo`
  ADD PRIMARY KEY (`id_aforo`);

--
-- Indexes for table `historial_alumnos`
--
ALTER TABLE `historial_alumnos`
  ADD PRIMARY KEY (`id_hist`);

--
-- Indexes for table `historial_users`
--
ALTER TABLE `historial_users`
  ADD PRIMARY KEY (`id_hist`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indexes for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id_qr`);

--
-- Indexes for table `rel_roles_modulos`
--
ALTER TABLE `rel_roles_modulos`
  ADD PRIMARY KEY (`id_relacion`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aforo`
--
ALTER TABLE `aforo`
  MODIFY `id_aforo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `historial_alumnos`
--
ALTER TABLE `historial_alumnos`
  MODIFY `id_hist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `historial_users`
--
ALTER TABLE `historial_users`
  MODIFY `id_hist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `id_qr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rel_roles_modulos`
--
ALTER TABLE `rel_roles_modulos`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historial_users`
--
ALTER TABLE `historial_users`
  ADD CONSTRAINT `historial_users_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `rel_roles_modulos`
--
ALTER TABLE `rel_roles_modulos`
  ADD CONSTRAINT `rel_roles_modulos_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`),
  ADD CONSTRAINT `rel_roles_modulos_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
