-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 15 Mar 2010 om 18:08
-- Serverversie: 5.1.37
-- PHP-Versie: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `threadsv2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `th_clients`
--

CREATE TABLE `th_clients` (
  `client_id` bigint(6) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_lastName` varchar(255) NOT NULL,
  `client_birthDay` varchar(255) NOT NULL,
  `client_gender` varchar(255) NOT NULL,
  `client_function` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_tel` varchar(255) NOT NULL,
  `client_mob` varchar(255) NOT NULL,
  `client_web` varchar(255) NOT NULL,
  `client_street` varchar(255) NOT NULL,
  `client_zip` varchar(255) NOT NULL,
  `client_location` varchar(255) NOT NULL,
  `client_state` varchar(255) NOT NULL,
  `client_country` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `th_clients`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `th_todo`
--

CREATE TABLE `th_todo` (
  `todo_id` bigint(6) unsigned NOT NULL AUTO_INCREMENT,
  `todo_text` varchar(255) NOT NULL,
  `todo_userId` bigint(6) NOT NULL,
  `todo_done` bigint(1) NOT NULL,
  `todo_date` date NOT NULL,
  PRIMARY KEY (`todo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `th_todo`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `th_users`
--

CREATE TABLE `th_users` (
  `user_id` bigint(6) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_lastName` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_permission` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `th_users`
--

INSERT INTO `th_users` VALUES(1, 'Foo', 'Bar', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@demo.test', 1);
