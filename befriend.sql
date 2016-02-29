-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg70.eigbox.net
-- Generation Time: Feb 29, 2016 at 11:26 AM
-- Server version: 5.5.43
-- PHP Version: 4.4.9
-- 
-- Database: `befriend`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES ('test@test.com', '123');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `imageurl` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login` (`user_login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (5, 'test', 'password', 'shahid', 'baig', 'Male', '3/1/2007', 'test123', 'images/users/Penguin.jpg');
