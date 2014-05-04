

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `linkedin_id`, `pic_url`, `company_id`, `profile_url`) VALUES
(22, 'Supun Nakandala', '0I2andtpA7', 'http://m.c.lnkd.licdn.com/mpr/mprx/0_RSNOt_wXpvHGdz6AM2BDt34vYKg7WK9AME8TthWzT9Wxnq3lBwk-p8jRKgjKoBcjVmnhgbBssJ2A', 1, 'http://www.linkedin.com/pub/supun-nakandala/58/210/36');

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `batch`, `linkedin_id`, `profile_url`, `oauth_token`, `oauth_token_secret`, `gpa`, `description`) VALUES
(1, 2, '0I2andtpA7', 'http://www.linkedin.com/pub/supun-nakandala/58/210/36', '35d96ddb-dd9b-4961-8a12-b59462dafb5e', '9f383855-0a0f-40a7-8f29-321a99f65509', '0.0', 'I am a third year undergraduate from the Department of Computer Science & Engineering, University of Moratuwa. My goal is to develop knowledge and competence in the field of information technology, share my knowledge and to provide the leadership.');


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

INSERT INTO `events` (`id`, `title`, `description`, `date`, `date_confirmed`, `time`, `venue`, `url`) VALUES
(1, 'Welcome & Inauguration', 'The new batch entering CSE is welcomed to the department by the senior batch. The staff is introduced and the honor code pledge is taken. There is a guest speaker who address the new coming batch at the event.', '2014-07-22', 0, '13:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(2, 'Outboundz Event', 'The outboundz event serves as a platform for the fresh batch of 125 undergraduates to socialize with the rest of the CSE and is a much awaited event in the CSE calendar. Here they are introduced into the CSE family of academic staff, alumni, undergraduates and the industry personnel and will take part in team building events.', '2014-12-19', 1, '15:00:00', 'UoM Grounds', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(3, 'Hit the Grounds', 'CSE hosts its annual cricket tournament "Hit the Grounds". About 25 industry teams along with about 8 undergraduate teams fought out for the trophy last year.', '2014-06-21', 0, '09:00:00', 'UoM Grounds', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(4, 'Drama Fest', '10 dramas of William Shakespeare were acted by students.And awards were give to the winners of each catogary', '2014-12-04', 1, '17:00:00', 'Civil Auditorium', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(5, 'Worm Games', 'Worm robot racing competition organized as a part of CS1962.', '2014-01-21', 1, '18:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(6, 'MoFA', 'Mora Film Awards, held with the participation of notable figures in the film industry, in order to award the best production award to the documentaries produced as part of DE2370', '2014-10-03', 1, '18:00:00', 'Civil Auditorium', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(7, 'Elegance', 'A dining etiquette workshop organized under "CS2963 - Presentation Skills"', '2014-04-23', 1, '15:00:00', 'Galadari Hotel, Colombo', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(8, 'Expressions', 'Series of talent shows held by participants to mark the culmination of all material covered in "CS2963 - Presentation Skills"', '2014-09-19', 0, '12:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(9, 'CSE Symposium', NULL, '2014-07-30', 0, '08:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(10, 'CS&ES Conference', NULL, '2014-12-20', 0, '11:00:00', 'Park Street Mews', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(11, 'CS&ES Achiever Awards', 'Main event of the year conducted alongside with the AGM.', '2014-08-04', 0, '08:00:00', 'Park Street Mews', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(12, 'Career Fair', 'Official careers fair of CSE', '2014-01-30', 1, '08:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(13, 'Flares de Flairs', 'Talent show for CSE undergraduates https://www.facebook.com/FlaresdeFlairs', '2014-03-07', 1, '16:00:00', 'Civil Auditorium', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(14, 'Interns Day', 'Interns Day event series for the undergraduates in their third year of study who are due to commence industrial training towards the latter part of the year.Each company did a brief presentation on their history, products, processes, working environment and most importantly the benefits for the undergraduates of the internship program they offer.https://drive.google.com/file/d/0B1ND7M3X2GhuekZtb1JWZVM2bHRPc2pMYktqX0FIVDF5RkZZ/edit?usp=sharing', '2014-08-11', 0, '08:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(15, 'IDEA Challenge', 'Online course for school students about android app development. Organized with the help of IESL http://www.idea2013.info/ https://drive.google.com/file/d/0B1ND7M3X2GhucXZNNTdNZWdYT2swdWNEOWJOM1VEVWhSclJv/edit?usp=sharing', '2014-10-15', 1, '11:00:00', 'Techno Exhibition (BMICH)', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(16, 'Robo Games', 'Robot Competition for school students and undergraduates organized with the help of IESL http://www.ieslrobogames.info/', '2014-11-05', 0, '08:00:00', 'Techno Exhibition (BMICH)', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(17, 'Dhamma Sermon', NULL, '2014-11-07', 0, '16:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(18, 'CSE Outreach', 'IT awareness seminar series for school students https://www.facebook.com/cseoutreach', '2014-03-05', 1, '16:00:00', 'Rural Schools', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(19, 'Variete', 'show waith various singging items. https://www.facebook.com/catchsudheera/media_set?set=a.3503408184576.286909.1252867147&type=1&l=3526e44d0c', '2014-04-04', 1, '08:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(20, 'Farenheit 12', 'Award Ceremony for high achivers at the first semester exam.', '2014-06-09', 1, '10:00:00', 'Civil Auditorium', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(21, 'Google Developer Group Meetup', 'The first session was conducted by the newly appointed Google Student Ambassadors, the second\nwas about Meteor JS which was done by Arunoda Susiripala, the System Architect at Freelancer. The third was on Google MapMaker by the Google MapMaker team who showed how to edit, add new places, roads.\nhttps://drive.google.com/file/d/0B1ND7M3X2GhucXZNNTdNZWdYT2swdWNEOWJOM1VEVWhSclJv/edit?usp=sharing', '2014-02-18', 1, '09:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(22, 'GSoC Meetup', 'http://digit.lk/event/gsoc-sri-lanka-meetup-2013/', '2014-10-07', 0, '11:00:00', 'CSE Seminar Room', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety'),
(23, 'GSoC Mentoring Program', 'Mentor UoM students to make them ready for GSoC 2014.\nhttps://www.facebook.com/UoMGSoC2014Mentoring', '2014-03-04', 1, '15:00:00', 'CSE Advanced Lab', 'https://www.facebook.com/ComputerScienceAndEngineeringSociety');

INSERT INTO `companies` (`id`, `name`, `access_level`) VALUES
(4, 'WSO2', 4),
(5, '99X Technology Ltd', 4),
(6, 'Dinota Information Technologies (Pvt) Ltd', 4),
(7, 'IronOne Technologies (Pvt) Ltd', 4),
(8, 'DMS Electronics (PVT) LTD', 4),
(9, 'hSenid Mobile Solutions (Pvt) Ltd', 4),
(10, 'MillenniumIT Software (Pvt) Ltd', 3),
(11, 'Sutra Technologies', 3),
(12, 'SimCentric Technologies (Pvt) Ltd', 3),
(13, 'TechCert', 3),
(14, 'Leapset (Pvt.) Ltd.', 3),
(15, 'Ellipsis (Pvt) Ltd', 3),
(16, 'THINKCube (NEW)', 3),
(17, 'IFS', 3),
(18, 'AtLink Communications (Pvt) Ltd.', 3),
(19, '3D Incorporated', 3),
(20, 'Virtusa (Pvt) Ltd', 3),
(21, 'CodeGen International (Pvt) Ltd', 3),
(22, 'Axienta (PVT) Ltd', 3),
(23, 'Wavenet', 3),
(24, 'Zone24x7 (Private) Limited', 3),
(25, 'Zaizi Asia (Pvt) Ltd', 3),
(26, 'Mazarin Pvt Limited', 3),
(27, 'OrangeHRM', 3),
(28, 'Embla Software Innovation (pvt) Ltd', 3),
(29, 'Creo 360 Pvt. Ltd.', 3),
(30, 'Direct Technologies (Pvt) Ltd', 3),
(31, 'AdroitLogic Lanka (Pvt) Ltd.', 3),
(32, 'Fortunaglobal Private Limited', 3),
(33, 'Atrenta Lanka (Pvt.) Ltd', 3),
(34, 'CodeConnexion PVT LTD', 3);

INSERT INTO `sponsorships` (`id`, `event_id`, `name`, `amount`, `description`, `taken_by`) VALUES
(1, 1, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', NULL),
(2, 1, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 19),
(3, 1, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 33),
(4, 2, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 6),
(5, 2, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', NULL),
(6, 2, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', NULL),
(7, 3, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 22),
(8, 3, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 13),
(9, 3, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 6),
(10, 4, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 19),
(11, 4, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', NULL),
(12, 4, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 7),
(13, 5, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 9),
(14, 5, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 14),
(15, 5, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 9),
(16, 6, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 27),
(17, 6, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 15),
(18, 6, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 13),
(19, 7, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', NULL),
(20, 7, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', NULL),
(21, 7, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', NULL),
(22, 8, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 8),
(23, 8, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 30),
(24, 8, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 11),
(25, 9, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 7),
(26, 9, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 23),
(27, 9, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 9),
(28, 10, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 9),
(29, 10, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 31),
(30, 10, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 15),
(31, 11, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', NULL),
(32, 11, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 31),
(33, 11, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 14),
(34, 12, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 26),
(35, 12, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', NULL),
(36, 12, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 24),
(37, 13, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 32),
(38, 13, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 33),
(39, 13, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 14),
(40, 14, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 8),
(41, 14, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 30),
(42, 14, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', NULL),
(43, 15, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 11),
(44, 15, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 12),
(45, 15, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 22),
(46, 16, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 6),
(47, 16, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 21),
(48, 16, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 22),
(49, 18, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 6),
(50, 18, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 19),
(51, 18, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 28),
(52, 19, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 5),
(53, 19, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 7),
(54, 19, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', NULL),
(55, 20, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', NULL),
(56, 20, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 26),
(57, 20, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 14),
(58, 21, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 21),
(59, 21, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', NULL),
(60, 21, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', NULL),
(61, 22, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 23),
(62, 22, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', 33),
(63, 22, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 11),
(64, 23, 'Gold Sponsorship', '200000.00', 'CSE department web site will recognize them as a sponsor for the event. T-shirt designed for the event will bear the logo of the sponsor. Official Facebook page and the official project banners will display the logo of the sponsor and recognize them as a sponsor. An exhibition stall to promote their company/products. Display 10 promotional banners of the company around university premises. Distribute promotional handouts. The opportunity for a 5 minutes speech at the event to promote the company.', 15),
(65, 23, 'Silver Sponsorship', '100000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display 6 promotional banners of the company around university premises. Distribute promotional materials.', NULL),
(66, 23, 'Bronze Sponsorship', '50000.00', 'CSE department web site will recognize them as a sponsor for the event. CSE Resurgenz official Facebook page and the official project banners will display the logo of the sponsor and recognize them a sponsor. Display a promotional banner of the company around University Premises. Distribute promotional materials.', 31);



INSERT INTO `sessions` 
(`id`,
`title`,
`description`,
`date`,
`start_time`,
`duration`,
`resp_name`,
`resp_contact`,
`org_id`) VALUES
(1,'brand new session for asp.net','on you would like to carryout to CSE syudents. We will get back to you regarding the posson you would like to carryout to CSE syudents. We will get back to you regarding the poss',NULL,'7:30 am',133,'wsfsf','13331',5),
(2,'Has a session you would like to carryout to CS','Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.','2014-04-20 00:00:00','7:00 am',NULL,NULL,NULL,5),
(3,'ws02 a session you would like to carryout to CS','Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.',NULL,'7:00 am',NULL,NULL,NULL,4),
(4,'new e a session you would like to carryout to CS','Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.','2014-05-14 00:00:00','7:00 am',NULL,NULL,NULL,NULL),
(5,'11new e a session you would like to carryout to CS','Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.',NULL,'7:00 am',NULL,NULL,NULL,NULL),
(6,'bbbbose a session you would like to carryout to CS','Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possib',NULL,'7:00 am',NULL,NULL,NULL,NULL),
(7,'Test  a session you would like to carryout to CS','Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible daPropose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible daPropose a session you would like t','2014-04-06 00:00:00','8:00 am',150,'Udith','9489028490',NULL),
(8,'new new session you would like to carryout to CS','Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.','2014-04-28 00:00:00','8:00 am',124,NULL,NULL,NULL),
(9,'Session for testing the functionality','session you would like to carryout to CSE syudents. We will get back to you regarding the possible session you would like to carryout to CSE syudents. We will get back to you regarding the possible','2014-06-07 00:00:00','8:30 am',120,'Hasith','0714819556',11);

INSERT INTO `research` (`id`, `title`, `author_id`, `lead_id`, `company_id`, `time`, `description`, `category`, `published`) VALUES
(1, 'Hotel Managment System', 22, 22, 10, 120, 'Manages hotel Bla bla', 3, '2014-04-22 11:11:55'),
(2, 'Car reservation system', 22, 22, 11, 150, 'A hotel is an establishment that provides lodging paid on a short-term basis. The provision of basic accommodation, in times past, consisting only of a room with a bed, a cupboard, a small table and a washstand has largely been replaced by rooms with modern facilities, including en-suite bathrooms and air conditioning or climate control. Additional common features found in hotel rooms are a telephone, an alarm clock, a television, a safe, a mini-bar with snack foods and drinks, and facilities for making tea and coffee. Luxury features include bathrobes and slippers, a pillow menu, twin-sink vanities, and jacuzzi bathtubs. Larger hotels may provide additional guest facilities such as a swimming pool, fitness center, business center, childcare, conference facilities and social function services.', 3, '2014-04-22 11:11:55'),
(3, 'Test Project', 22, 22, 12, 50, 'desc', 3, '2014-04-22 11:11:55'),
(4, 'Test2', 22, 22, 20, 56, 'test', 4, '2014-04-22 11:11:55'),
(5, 'Test3', 22, 22, 21, 25, 'desc', 4, '2014-04-22 11:11:55');

INSERT INTO `research_tech__map` (`research_id`, `technology_id`) VALUES
(1, 1),
(1, 40),
(2, 1),
(2, 30),
(2, 40),
(3, 28),
(4, 28),
(5, 40);