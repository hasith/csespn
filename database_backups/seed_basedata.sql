

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

INSERT INTO `users` (`id`, `name`, `linkedin_id`, `pic_url`, `company_id`) VALUES
(1, 'Hasith Yaggahavita', 'j36gDBzREQ ', 'http://m.c.lnkd.licdn.com/mpr/mprx/0_jbmxXtdKs7vacLWn05phXrx14d-_vQMnPishXrMfFo6PEGm9lTYPEKD39Tty9TZspkuTIBIoQzlh','3');