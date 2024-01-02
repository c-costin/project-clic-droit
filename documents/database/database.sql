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
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `worksite_id` INT UNSIGNED NOT NULL,
  `service_id`  INT UNSIGNED NOT NULL,
  `january`         VARCHAR(42) NOT NULL,
  `february`         VARCHAR(42) NOT NULL,
  `march`         VARCHAR(42) NOT NULL,
  `april`         VARCHAR(42) NOT NULL,
  `may`         VARCHAR(42) NOT NULL,
  `june`         VARCHAR(42) NOT NULL,
  `july`         VARCHAR(42) NOT NULL,
  `august`         VARCHAR(42) NOT NULL,
  `september`         VARCHAR(42) NOT NULL,
  `october`         VARCHAR(42) NOT NULL,
  `november`         VARCHAR(42) NOT NULL,
  `december`         VARCHAR(42) NOT NULL,
  `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_worksite_idx` (`worksite_id` ASC),
  INDEX `fk_service_idx` (`service_id` ASC),
  CONSTRAINT `service_worksite_idfk1` FOREIGN KEY (`worksite_id`) REFERENCES `worksite` (`id`) ON DELETE CASCADE,
  CONSTRAINT `service_worksite_idfk2` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE
);

INSERT INTO `worksite` (`name`) VALUES ('AM PRODUCTION (AMP0301)');
INSERT INTO `worksite` (`name`) VALUES ('ADOMOS (ADM0101)');
INSERT INTO `service` (`name`) VALUES ('Vitrerie');
INSERT INTO `service` (`name`) VALUES ('Remise en état mensuelle');
INSERT INTO `service_worksite` (`worksite_id`, `service_id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES (1, 1, '21.67', '21.67', '21.67', '21.67', '21.67', '21.67', '21.67', '21.67', '21.67', '21.67', '21.67', '21.67');
INSERT INTO `service_worksite` (`worksite_id`, `service_id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES (1, 2, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3');
INSERT INTO `service_worksite` (`worksite_id`, `service_id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES (2, 1, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3');
INSERT INTO `service_worksite` (`worksite_id`, `service_id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES (2, 2, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3');