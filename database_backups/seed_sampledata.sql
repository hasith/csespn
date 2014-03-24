
--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`id`, `name`) VALUES
(1, '99XTechnology');


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `display_name`, `email`, `role`, `org`) VALUES
(1, 'Supun Nakandala', '99XTechnology', 'supun.nakandala@gmail.com', 1, 1);
INSERT INTO `users` (`id`, `name`, `display_name`, `email`, `role`, `org`) VALUES
(2, 'Hasith Yaggahavita', 'MIT', 'hasith@gmail.com', 1, 1);

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `image_path`, `description`, `pending_internship`, `pending_graduation`, `gpa`, `course`, `linkedin_url`) VALUES
(1, 1, 'img5.jpg', 'Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.', 1, 0, 4.1, 'CSE', 'http://www.google.lk'),
(2, 1, 'img5.jpg', 'Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.', 1, 1, 2.3, 'ICE', 'http://www.google.lk');



--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`) VALUES
(1, 'Java');


--
-- Dumping data for table `endorsements`
--

INSERT INTO `endorsements` (`endorser`, `endorsee`, `technology`) VALUES
(1, 1, 1);

