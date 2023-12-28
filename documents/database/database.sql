DROP TABLE IF EXISTS `worksite` ;

CREATE TABLE IF NOT EXISTS `worksite` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(42) NOT NULL,
  `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `service` ;

CREATE TABLE IF NOT EXISTS `service` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`         VARCHAR(42) NOT NULL,
  `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `service_worksite` ;

CREATE TABLE IF NOT EXISTS `service_worksite` (
  `worksite_id` INT UNSIGNED NOT NULL,
  `service_id`  INT UNSIGNED NOT NULL,
  `value`         VARCHAR(42) NOT NULL,
  `month`         VARCHAR(42) NOT NULL,
  `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME NULL,
  PRIMARY KEY (`worksite_id`, `service_id`),
  INDEX `fk_worksite_idx` (`worksite_id` ASC),
  INDEX `fk_service_idx` (`service_id` ASC),
  CONSTRAINT `service_worksite_ibfk_2` FOREIGN KEY (`worksite_id`) REFERENCES `worksite` (`id`) ON DELETE CASCADE,
  CONSTRAINT `service_worksite_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE
);

INSERT INTO `worksite` (`name`) VALUES ('AM PRODUCTION (AMP0301)');
INSERT INTO `worksite` (`name`) VALUES ('ADOMOS (ADM0101)');

INSERT INTO `service` (`name`) VALUES ('Vitrerie');
INSERT INTO `service` (`name`) VALUES ('Remise en état mensuelle');
