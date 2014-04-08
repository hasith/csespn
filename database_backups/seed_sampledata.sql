

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `linkedin_id`, `pic_url`, `company_id`, `profile_url`) VALUES
(22, 'Supun Nakandala', '0I2andtpA7', 'http://m.c.lnkd.licdn.com/mpr/mprx/0_RSNOt_wXpvHGdz6AM2BDt34vYKg7WK9AME8TthWzT9Wxnq3lBwk-p8jRKgjKoBcjVmnhgbBssJ2A', 1, 'http://www.linkedin.com/pub/supun-nakandala/58/210/36');

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `batch`, `linkedin_id`, `gpa`, `description`) VALUES
(1, 2, '0I2andtpA7', '0.0', 'I am a third year undergraduate from the Department of Computer Science & Engineering, University of Moratuwa. My goal is to develop knowledge and competence in the field of information technology, share my knowledge and to provide the leadership.');


--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`) VALUES
(1, 'Java');


--
-- Dumping data for table `endorsements`
--

INSERT INTO `endorsements` (`id`, `technology_id`, `student_id`, `count`) VALUES
(199, 24, 1, 1),
(200, 25, 1, 1),
(201, 26, 1, 1),
(202, 27, 1, 1),
(203, 28, 1, 1),
(204, 29, 1, 1),
(205, 30, 1, 1),
(206, 31, 1, 1),
(207, 32, 1, 1),
(208, 33, 1, 1),
(209, 34, 1, 1),
(210, 35, 1, 1),
(211, 36, 1, 1),
(212, 37, 1, 1),
(213, 38, 1, 1),
(214, 39, 1, 1),
(215, 40, 1, 1),
(216, 41, 1, 1),
(217, 42, 1, 1),
(218, 43, 1, 1),
(219, 44, 1, 1),
(220, 45, 1, 1),
(221, 24, 1, 1),
(222, 25, 1, 1),
(223, 26, 1, 1),
(224, 27, 1, 1),
(225, 28, 1, 1),
(226, 29, 1, 1),
(227, 30, 1, 1),
(228, 31, 1, 1),
(229, 32, 1, 1),
(230, 33, 1, 1),
(231, 34, 1, 1),
(232, 35, 1, 1),
(233, 36, 1, 1),
(234, 37, 1, 1),
(235, 38, 1, 1),
(236, 39, 1, 1),
(237, 40, 1, 1),
(238, 41, 1, 1),
(239, 42, 1, 1),
(240, 43, 1, 1),
(241, 44, 1, 1),
(242, 45, 1, 1);




INSERT INTO `technologies` (`id`, `name`) VALUES
(24, 'Software Development'),
(25, 'Team Leadership'),
(26, 'Systems Engineering'),
(27, 'Java'),
(28, 'JavaScript'),
(29, 'jQuery'),
(30, 'C++ Language'),
(31, 'Web Applications'),
(32, 'ASP.NET'),
(33, 'ASP.NET MVC'),
(34, 'C++'),
(35, 'C'),
(36, 'Software Engineering'),
(37, 'Eclipse'),
(38, 'Programming'),
(39, 'NetBeans'),
(40, 'MySQL'),
(41, 'SQL'),
(42, 'OOP'),
(43, 'C#'),
(44, 'JSP'),
(45, 'Android Development');

