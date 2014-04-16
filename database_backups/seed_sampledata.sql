

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



INSERT INTO `events` (`id`, `title`, `description`, `date`, `time`, `venue`, `url`) VALUES
(1, 'massa id nisl', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2013-06-03', '15:30:00', 'magnis dis parturient', 'https://www.facebook.com/OutboundZ'),
(2, 'eros elementum pellentesque quisque', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit.', '2013-10-24', '11:51:00', 'non velit donec diam', 'https://www.facebook.com/OutboundZ'),
(3, 'rutrum at lorem integer', 'Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.', '2014-03-13', '18:37:00', 'ac consequat metus sapien', 'https://www.facebook.com/OutboundZ'),
(4, 'id sapien', 'Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.', '2013-12-21', '19:46:00', 'justo etiam pretium iaculis', 'https://www.facebook.com/OutboundZ'),
(5, 'aenean sit amet justo', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam.', '2013-04-23', '17:25:00', 'dapibus duis at velit', 'https://www.facebook.com/OutboundZ'),
(6, 'at dolor', 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo.', '2015-04-07', '12:37:00', 'dui proin', 'https://www.facebook.com/OutboundZ'),
(7, 'proin leo odio', 'Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', '2013-11-09', '16:09:00', 'a nibh', 'https://www.facebook.com/OutboundZ'),
(8, 'habitasse platea dictumst', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', '2013-09-05', '11:09:00', 'eros elementum pellentesque', 'https://www.facebook.com/OutboundZ'),
(9, 'sed tincidunt eu', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2014-11-06', '18:45:00', 'eu massa donec dapibus', 'https://www.facebook.com/OutboundZ'),
(10, 'non mauris morbi non', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', '2013-07-25', '10:46:00', 'platea dictumst maecenas ut', 'https://www.facebook.com/OutboundZ'),
(11, 'sed interdum venenatis turpis', 'Sed ante.', '2014-10-27', '18:12:00', 'penatibus et magnis', 'https://www.facebook.com/OutboundZ'),
(12, 'lorem id', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', '2013-11-11', '14:21:00', 'nullam orci', 'https://www.facebook.com/OutboundZ'),
(13, 'ante ipsum primis', 'Phasellus sit amet erat. Nulla tempus.', '2014-12-21', '13:39:00', 'in purus eu magna', 'https://www.facebook.com/OutboundZ'),
(14, 'vestibulum aliquet ultrices erat', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue.', '2014-02-27', '08:00:00', 'ac neque duis', 'https://www.facebook.com/OutboundZ'),
(15, 'porta volutpat quam', 'Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '2013-08-07', '12:50:00', 'sit amet', 'https://www.facebook.com/OutboundZ'),
(16, 'nam congue risus', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', '2014-02-10', '12:39:00', 'penatibus et magnis dis', 'https://www.facebook.com/OutboundZ'),
(17, 'neque duis bibendum morbi', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '2013-10-24', '11:06:00', 'nisi volutpat eleifend', 'https://www.facebook.com/OutboundZ'),
(18, 'augue vel accumsan tellus', 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla.', '2014-04-20', '19:13:00', 'varius integer', 'https://www.facebook.com/OutboundZ'),
(19, 'enim sit amet nunc', 'Curabitur convallis.', '2013-11-09', '15:26:00', 'duis bibendum felis sed', 'https://www.facebook.com/OutboundZ'),
(20, 'duis aliquam convallis nunc', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2013-05-20', '10:53:00', 'sed justo pellentesque', 'https://www.facebook.com/OutboundZ'),
(21, 'purus eu', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2013-05-20', '16:03:00', 'justo etiam pretium iaculis', 'https://www.facebook.com/OutboundZ'),
(22, 'mi in porttitor pede', 'Nunc purus.', '2014-08-27', '15:31:00', 'blandit ultrices', 'https://www.facebook.com/OutboundZ'),
(23, 'fusce consequat nulla', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.', '2013-12-03', '18:02:00', 'vestibulum ante ipsum primis', 'https://www.facebook.com/OutboundZ'),
(24, 'dis parturient montes nascetur', 'Nullam varius. Nulla facilisi.', '2013-10-03', '11:43:00', 'enim lorem ipsum dolor', 'https://www.facebook.com/OutboundZ'),
(25, 'cubilia curae duis', 'Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '2015-03-18', '19:50:00', 'venenatis turpis enim', 'https://www.facebook.com/OutboundZ'),
(26, 'a libero', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '2013-07-18', '08:21:00', 'aenean lectus pellentesque eget', 'https://www.facebook.com/OutboundZ'),
(27, 'lorem ipsum', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.', '2014-01-20', '15:30:00', 'aliquam quis turpis eget', 'https://www.facebook.com/OutboundZ'),
(28, 'at dolor quis', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2013-05-24', '14:45:00', 'pede justo eu massa', 'https://www.facebook.com/OutboundZ'),
(29, 'scelerisque quam turpis', 'Aliquam sit amet diam in magna bibendum imperdiet.', '2013-08-06', '14:07:00', 'morbi a ipsum', 'https://www.facebook.com/OutboundZ'),
(30, 'vestibulum ante', 'Morbi porttitor lorem id ligula.', '2013-10-15', '19:47:00', 'amet nunc viverra dapibus', 'https://www.facebook.com/OutboundZ'),
(31, 'ac neque duis', 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', '2013-06-19', '11:09:00', 'suscipit a', 'https://www.facebook.com/OutboundZ'),
(32, 'nonummy integer non', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum.', '2014-08-12', '19:49:00', 'lobortis vel', 'https://www.facebook.com/OutboundZ'),
(33, 'at diam nam tristique', 'Nulla suscipit ligula in lacus.', '2015-02-28', '17:57:00', 'eu sapien cursus', 'https://www.facebook.com/OutboundZ'),
(34, 'posuere felis sed lacus', 'Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', '2014-04-20', '14:03:00', 'magna vestibulum aliquet ultrices', 'https://www.facebook.com/OutboundZ'),
(35, 'vestibulum velit id pretium', 'Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.', '2014-12-15', '17:48:00', 'ut odio cras mi', 'https://www.facebook.com/OutboundZ'),
(36, 'nisl nunc rhoncus dui', 'Nulla nisl. Nunc nisl.', '2014-01-02', '19:05:00', 'rhoncus sed', 'https://www.facebook.com/OutboundZ'),
(37, 'aenean sit', 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2013-11-30', '08:59:00', 'rhoncus sed vestibulum sit', 'https://www.facebook.com/OutboundZ'),
(38, 'habitasse platea dictumst', 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', '2013-09-23', '19:10:00', 'ultrices libero non', 'https://www.facebook.com/OutboundZ'),
(39, 'praesent lectus vestibulum', 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy.', '2014-06-27', '11:34:00', 'ultrices libero non', 'https://www.facebook.com/OutboundZ'),
(40, 'imperdiet sapien', 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.', '2014-11-07', '16:13:00', 'faucibus orci luctus', 'https://www.facebook.com/OutboundZ'),
(41, 'in est risus', 'Proin eu mi. Nulla ac enim.', '2013-12-21', '12:01:00', 'quam nec dui', 'https://www.facebook.com/OutboundZ'),
(42, 'id mauris vulputate', 'Nulla ut erat id mauris vulputate elementum. Nullam varius.', '2014-08-18', '15:57:00', 'et eros', 'https://www.facebook.com/OutboundZ'),
(43, 'vel enim', 'Suspendisse potenti. Nullam porttitor lacus at turpis.', '2013-06-08', '12:31:00', 'ut nunc', 'https://www.facebook.com/OutboundZ'),
(44, 'gravida sem praesent id', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum.', '2013-12-16', '10:25:00', 'pede lobortis', 'https://www.facebook.com/OutboundZ'),
(45, 'ligula in lacus', 'Duis at velit eu est congue elementum. In hac habitasse platea dictumst.', '2015-01-19', '15:03:00', 'facilisi cras', 'https://www.facebook.com/OutboundZ'),
(46, 'purus phasellus in', 'Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', '2015-03-21', '18:42:00', 'et ultrices posuere cubilia', 'https://www.facebook.com/OutboundZ'),
(47, 'id ligula', 'Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '2014-06-20', '11:10:00', 'duis consequat dui', 'https://www.facebook.com/OutboundZ'),
(48, 'libero ut massa', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2013-07-07', '19:48:00', 'ipsum primis in faucibus', 'https://www.facebook.com/OutboundZ'),
(49, 'neque aenean auctor', 'Phasellus in felis. Donec semper sapien a libero.', '2014-10-19', '14:15:00', 'mauris viverra', 'https://www.facebook.com/OutboundZ'),
(50, 'quis orci eget', 'Maecenas ut massa quis augue luctus tincidunt.', '2014-11-04', '14:38:00', 'rhoncus mauris enim leo', 'https://www.facebook.com/OutboundZ');