CREATE TABLE `crid`.`contactus` 
  ( 
     `id`      INT(11) NOT NULL auto_increment, 
     `name`    VARCHAR(255) NOT NULL, 
     `email`   VARCHAR(255) NOT NULL, 
     `subject` TINYTEXT NOT NULL, 
     `meggage` LONGTEXT NOT NULL, 
     `seen`    INT(1) NOT NULL DEFAULT '0', 
     PRIMARY KEY (`id`) 
  ) 
engine = innodb; 