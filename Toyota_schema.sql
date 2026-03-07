-- Schema for GadiGhar / Toyota showroom project
-- Run this in MySQL to create the required database and tables.

-- Create database (if it does not exist)
CREATE DATABASE IF NOT EXISTS `Toyota`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `Toyota`;

-- Users who sign up through the frontend
CREATE TABLE IF NOT EXISTS `Signup` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(100) NOT NULL,
  `Email` VARCHAR(191) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Service booking requests
CREATE TABLE IF NOT EXISTS `service` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(150) NOT NULL,
  `Email` VARCHAR(191) NOT NULL,
  `Mobile` VARCHAR(20) NOT NULL,
  `Address` VARCHAR(255) NOT NULL,
  `Issue` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_email` (`Email`),
  KEY `idx_mobile` (`Mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Test drive bookings
CREATE TABLE IF NOT EXISTS `testdrive` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(150) NOT NULL,
  `Email` VARCHAR(191) NOT NULL,
  `Mobile` VARCHAR(20) NOT NULL,
  `Car` VARCHAR(100) NOT NULL,
  `Date` DATE NOT NULL,
  `Location` VARCHAR(150) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_email` (`Email`),
  KEY `idx_mobile` (`Mobile`),
  KEY `idx_car` (`Car`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

