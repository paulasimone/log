CREATE TABLE `log`.`users` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`name` VARCHAR(300) NOT NULL , 
	`email` VARCHAR(500) NOT NULL , 
	`birthday` DATE NOT NULL , 
	`gender` VARCHAR(10) NOT NULL , 
	PRIMARY KEY (`id`)) ENGINE = InnoDB;