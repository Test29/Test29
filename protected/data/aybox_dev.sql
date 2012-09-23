SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `aybox`.`picture`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`picture` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `url` VARCHAR(90) NULL ,
  `date_add` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aybox`.`school`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`school` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(90) NOT NULL ,
  `date_add` DATETIME NOT NULL ,
  `date_update` DATETIME NULL ,
  `description` TEXT NULL ,
  `picture_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_school_picture1` (`picture_id` ASC) ,
  CONSTRAINT `fk_school_picture1`
    FOREIGN KEY (`picture_id` )
    REFERENCES `aybox`.`picture` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aybox`.`promotion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`promotion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(90) NOT NULL ,
  `year` YEAR NULL ,
  `date_add` DATETIME NOT NULL ,
  `date_update` DATETIME NULL ,
  `school_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_promotion_school` (`school_id` ASC) ,
  CONSTRAINT `fk_promotion_school`
    FOREIGN KEY (`school_id` )
    REFERENCES `aybox`.`school` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aybox`.`student`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`student` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NULL ,
  `password` VARCHAR(90) NULL ,
  `dob` DATE NULL ,
  `email` VARCHAR(90) NULL ,
  `date_add` DATETIME NOT NULL ,
  `gender` enum('female','male') NOT NULL ,
  `status` enum('single','couple','no') NOT NULL DEFAULT 'no' ,
  `right` enum('admin','responsable','student') NOT NULL DEFAULT 'student' ,
  `promotion_id` INT NOT NULL ,
  `profil_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_student_promotion1` (`promotion_id` ASC) ,
  INDEX `fk_student_picture1` (`profil_id` ASC) ,
  CONSTRAINT `fk_student_promotion1`
    FOREIGN KEY (`promotion_id` )
    REFERENCES `aybox`.`promotion` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_picture1`
    FOREIGN KEY (`profil_id` )
    REFERENCES `aybox`.`picture` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aybox`.`article`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`article` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(90) NULL ,
  `content` TEXT NULL ,
  `date_add` DATETIME NOT NULL ,
  `date_update` DATETIME NULL ,
  `student_id` INT NOT NULL ,
  `picture_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_article_student1` (`student_id` ASC) ,
  INDEX `fk_article_picture1` (`picture_id` ASC) ,
  CONSTRAINT `fk_article_student1`
    FOREIGN KEY (`student_id` )
    REFERENCES `aybox`.`student` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_article_picture1`
    FOREIGN KEY (`picture_id` )
    REFERENCES `aybox`.`picture` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aybox`.`message`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`message` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `content` TEXT NOT NULL ,
  `date_send` DATETIME NOT NULL ,
  `date_read` DATETIME NULL ,
  `read` enum('yes','no') NOT NULL DEFAULT 'no' ,
  `student_id_receive` INT NOT NULL ,
  `student_id_send` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_message_student1` (`student_id_receive` ASC) ,
  INDEX `fk_message_student2` (`student_id_send` ASC) ,
  CONSTRAINT `fk_message_student1`
    FOREIGN KEY (`student_id_receive` )
    REFERENCES `aybox`.`student` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_message_student2`
    FOREIGN KEY (`student_id_send` )
    REFERENCES `aybox`.`student` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aybox`.`link_promotion_picture`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`link_promotion_picture` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `picture_id` INT NOT NULL ,
  `promotion_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_link_promotion_picture_picture1` (`picture_id` ASC) ,
  INDEX `fk_link_promotion_picture_promotion1` (`promotion_id` ASC) ,
  CONSTRAINT `fk_link_promotion_picture_picture1`
    FOREIGN KEY (`picture_id` )
    REFERENCES `aybox`.`picture` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_link_promotion_picture_promotion1`
    FOREIGN KEY (`promotion_id` )
    REFERENCES `aybox`.`promotion` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aybox`.`comments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `aybox`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `content` VARCHAR(180) NOT NULL ,
  `date_add` DATETIME NULL ,
  `student_id` INT NOT NULL ,
  `article_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_comments_student1` (`student_id` ASC) ,
  INDEX `fk_comments_article1` (`article_id` ASC) ,
  CONSTRAINT `fk_comments_student1`
    FOREIGN KEY (`student_id` )
    REFERENCES `aybox`.`student` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comments_article1`
    FOREIGN KEY (`article_id` )
    REFERENCES `aybox`.`article` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
