--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Company'),
(2, 'Student'),
(3, 'Admin');

INSERT INTO `batches` (`id`, `display_name`, `course`, `year`) VALUES
(10, 'Batch 10', 'CSE', '2010'),
(11, 'Batch 11', 'ICE', '2011'),
(12, 'Batch 12', 'CSE', '2012'),
(13, 'Batch 13', 'CSE', '2013');


INSERT INTO `companies` (`id`, `name`, `access_level`) VALUES
(1, 'Public User', 1),
(2, 'UoM Student', 2),
(3, 'CSES Admin', 5);

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'level_1', '13'),
(2, 'level_2', '12'),
(3, 'level_3', '11'),
(4, 'level_4', '10');
