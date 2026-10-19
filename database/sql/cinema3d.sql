-- ============================================================
-- Proyecto: Cinema3D
-- Script de creación de la base de datos (MySQL / MariaDB - XAMPP)
-- Equivale a lo que crea "php artisan migrate" para el módulo registros.
-- ============================================================

CREATE DATABASE IF NOT EXISTS cinema3d
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE cinema3d;

-- Tabla del formulario "Registro de información personal"
DROP TABLE IF EXISTS registros;

CREATE TABLE registros (
    id               BIGINT UNSIGNED  NOT NULL AUTO_INCREMENT,
    nombres          VARCHAR(100)     NOT NULL,
    apellidos        VARCHAR(100)     NOT NULL,
    fecha_nacimiento DATE             NOT NULL,
    ninos            TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Cantidad de niños a cargo',
    madre_cabeza     VARCHAR(2)       NOT NULL COMMENT 'Sí / No',
    estudio          VARCHAR(2)       NOT NULL COMMENT '¿Realiza técnico o tecnólogo? Sí / No',
    generos          VARCHAR(255)     NULL     COMMENT 'Géneros de cine separados por coma',
    created_at       TIMESTAMP        NULL DEFAULT NULL,
    updated_at       TIMESTAMP        NULL DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de ejemplo (opcional)
INSERT INTO registros (nombres, apellidos, fecha_nacimiento, ninos, madre_cabeza, estudio, generos, created_at, updated_at) VALUES
('Laura Marcela', 'Gómez Ríos', '1998-04-12', 1, 'Sí', 'Sí', 'Drama, Romance', NOW(), NOW()),
('Andrés Felipe', 'Muñoz Castro', '2001-09-30', 0, 'No', 'Sí', 'Acción, Ciencia Ficción', NOW(), NOW());
