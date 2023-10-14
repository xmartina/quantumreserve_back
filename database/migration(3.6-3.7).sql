INSERT INTO `tbl_settings` (`type`, `value`, `updatedDtm`) VALUES
('prompt_payment_account', '0', '2020-11-09 09:09:51'),
('require_phone_for_signup', '0', '2021-01-04 12:17:23');

ALTER TABLE tbl_users
ADD `verification_url` varchar(128) DEFAULT NULL,