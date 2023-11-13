<?php

require_once 'config.php';

abstract class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL['HOST']  .';dbname='. MYSQL['DB'] .';charset=utf8', MYSQL['USER'], MYSQL['PASS']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->deploy();
        }

        function deploy() {
          $yV = '$yV';
          $sG4HbTDACZfxhrAWLP7a9ewE8Nt3ImhUxymQaMFNt8b2p1bB = '$sG4HbTDACZfxhrAWLP7a9ewE8Nt3ImhUxymQaMFNt8b2p1bB';
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql =<<<END
                -- phpMyAdmin SQL Dump
                -- version 5.2.1
                -- https://www.phpmyadmin.net/
                --
                -- Servidor: 127.0.0.1
                -- Tiempo de generación: 07-10-2023 a las 00:44:39
                -- Versión del servidor: 10.4.28-MariaDB
                -- Versión de PHP: 8.2.4
                
                SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
                START TRANSACTION;
                SET time_zone = "+00:00";
                
                
                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8mb4 */;
                
                --
                -- Base de datos: `e-comerce`
                --
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `categoria_producto`
                --
                
                CREATE TABLE `categoria_producto` (
                  `id_categoria` int(11) NOT NULL,
                  `nombre_categoria` varchar(30) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=eucjpms COLLATE=eucjpms_bin;
                
                --
                -- Volcado de datos para la tabla `categoria_producto`
                --
                
                INSERT INTO `categoria_producto` (`id_categoria`, `nombre_categoria`) VALUES
                (1, 'Remeras'),
                (2, 'Pantalones'),
                (4, 'Buzos');
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `productos`
                --
                
                CREATE TABLE `productos` (
                  `id_producto` int(11) NOT NULL,
                  `categoria` int(11) NOT NULL,
                  `descripcion` varchar(45) NOT NULL,
                  `talla` varchar(5) NOT NULL,
                  `precio` int(11) NOT NULL,
                  `nombre` varchar(20) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=eucjpms COLLATE=eucjpms_bin;
                
                --
                -- Volcado de datos para la tabla `productos`
                --
                
                INSERT INTO `productos` (`id_producto`, `categoria`, `descripcion`, `talla`, `precio`, `nombre`) VALUES
                (4, 2, 'asdasdas', 'M', 5000, 'nombre producto'),
                (5, 1, 'ytutu', 'L', 4000, 'nombre producto'),
                (6, 1, 'tyuytu', 'XL', 3000, 'nombre producto'),
                (7, 1, 'ytutu', 'L', 5000, 'nombre producto'),
                (8, 1, 'tyuytu', 'XL', 3000, 'nombre producto');
                
                --
                -- Índices para tablas volcadas
                --
                
                --
                -- Indices de la tabla `categoria_producto`
                --
                ALTER TABLE `categoria_producto`
                  ADD PRIMARY KEY (`id_categoria`);
                
                --
                -- Indices de la tabla `productos`
                --
                ALTER TABLE `productos`
                  ADD PRIMARY KEY (`id_producto`),
                  ADD KEY `categoria_fk` (`categoria`);
                
                --
                -- AUTO_INCREMENT de las tablas volcadas
                --
                
                --
                -- AUTO_INCREMENT de la tabla `categoria_producto`
                --
                ALTER TABLE `categoria_producto`
                  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
                
                --
                -- AUTO_INCREMENT de la tabla `productos`
                --
                ALTER TABLE `productos`
                  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
                
                --
                -- Restricciones para tablas volcadas
                --
                
                --
                -- Filtros para la tabla `productos`
                --
                ALTER TABLE `productos`
                  ADD CONSTRAINT `categoria_fk` FOREIGN KEY (`categoria`) REFERENCES `categoria_producto` (`id_categoria`);
                COMMIT;
                
                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
                
                END;
                $this->db->query($sql);
            }
            
        }
    }