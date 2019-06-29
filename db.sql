CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
)DEFAULT CHARSET=utf8;

INSERT INTO `subjects` (`sub_name`) VALUES
('Бизнес'), 
('Технологии'), 
('Реклама т маркетинг');

CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
)DEFAULT CHARSET=utf8;

INSERT INTO `payments` (`pay_name`) VALUES
('WebMoney'),
('Яндекс.Деньги'),
('PayPal'),
('Кредитная карта');

CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `payment_id` int(10) NOT NULL,
  `mailing` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `payment_id` (`payment_id`),
  KEY `updated_at` (`updated_at`)
)DEFAULT CHARSET=utf8;

