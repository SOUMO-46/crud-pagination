CREATE DATABASE IF NOT EXISTS `oop_crud-pagination` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `oop_crud-pagination`;

CREATE TABLE IF NOT EXISTS `city_id` (
  `c_id` int unsigned NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `uk_city_name` (`c_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(100) NOT NULL,
  `student_age` tinyint unsigned NOT NULL,
  `student_city` int unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`),
  KEY `idx_student_city` (`student_city`),
  KEY `idx_student_name` (`student_name`),
  CONSTRAINT `fk_student_city` FOREIGN KEY (`student_city`) REFERENCES `city_id` (`c_id`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `city_id` (`c_id`,`c_name`) VALUES
(1,'Kolkata'),(2,'Bangalore'),(3,'Delhi'),(4,'Mumbai'),(5,'Chennai');

INSERT INTO `student` (`student_name`,`student_age`,`student_city`) VALUES
('Soumo',25,1),('Rahul',23,2),('Amit',27,3),('Priya',22,4),('Ananya',24,5),('Rohan',26,1),('Sneha',21,3),('Arjun',28,2),('Neha',23,4),('Sayan',25,1);
-- 20 Additional Demo Students
INSERT INTO `student` (`student_name`,`student_age`,`student_city`) VALUES
('Ishita',21,1),
('Vivek',24,2),
('Moumita',22,3),
('Debjit',26,4),
('Riya',20,5),
('Abhishek',29,1),
('Puja',23,2),
('Sourav',27,3),
('Tania',22,4),
('Aditya',25,5),
('Nandini',19,1),
('Sayanika',24,2),
('Pratik',28,3),
('Ritika',21,4),
('Kunal',30,5),
('Pallavi',23,1),
('Aniket',26,2),
('Diya',20,3),
('Rakesh',27,4),
('Ayesha',22,5);
