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


INSERT INTO `companies` (`id`, `name`, `access_level`) VALUES
(1, 'Public User', 1),
(2, 'UoM Student', 2),
(3, 'CSES Admin', 5);
