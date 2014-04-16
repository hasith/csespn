--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Company'),
(2, 'Student'),
(3, 'Admin');


INSERT INTO `csespn`.`batches` (`id`, `display_name`, `year`) VALUES
(1, 'Batch 10', 2010),
(2, 'Batch 11', 2011),
(3, 'Batch 12', 2012),
(4, 'Batch 13', 2013);


INSERT INTO `companies` (`id`, `name`, `partner_type`) VALUES
(1, 'UoM Students', 'Basic'),
(2, 'UoM Lecturers', 'Premium'),
(3, 'Unknown', 'Basic');

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'level_1', '4'),
(2, 'level_2', '3'),
(3, 'level_3', '2'),
(4, 'level_4', '1');