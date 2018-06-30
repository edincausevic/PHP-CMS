-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 11:18 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'JavaScript'),
(3, 'PHP'),
(20, 'JAVA'),
(24, 'Html');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(6, 7, 'Elena', 'elena@email.com', 'Awesome!!!', 'approved', '2018-06-27'),
(7, 7, 'Mrki', 'mrki@email.com', 'Great tut! THX!!!', 'approved', '2018-06-29'),
(10, 8, 'Edin Causevic', '', 'Thx for this tutorial.', 'approved', '2018-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(12) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(7, 'JavaScript', 'Learn JS ', 'Edin Causevic', '2018-06-30', 'Learn-Javascript.jpg', 'Morbi commodo orci lacus, consequat tincidunt enim interdum eget. Nam dapibus, urna ut molestie mattis, urna nisi vulputate massa, eu aliquam risus nibh et velit. Suspendisse at urna leo. Nunc pharetra eros a magna accumsan, id ultricies erat euismod. Nullam ultricies convallis metus a facilisis. Ut et ornare nisi, eget lobortis metus. Integer sollicitudin laoreet molestie. Fusce viverra metus at lorem semper viverra. Morbi auctor id nulla non tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin convallis blandit fringilla. Quisque scelerisque bibendum vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris sit amet fermentum ipsum. Donec ultricies sed dui sed aliquet.', 'js, javascript, learn js, edin causevic', 8, 'published'),
(8, 'Bootstrap', 'SASS/SCSS tuts ', 'Jon Doe', '2030-06-18', 'sass_0.png', 'Sass is completely compatible with all versions of CSS. We take this compatibility seriously, so that you can seamlessly use any available CSS libraries.', 'html, css, sass, scss, tuts, tutorials, sass/scss tuts , mrki mrkic, html & css', 4, 'published'),
(11, 'PHP', 'PHP Tutorial', 'Rik Doe', '2030-06-18', 'download.jpg', 'In eu rhoncus nulla. Donec eget est a eros malesuada imperdiet id tempus mauris. Suspendisse tellus velit, consectetur eget rhoncus vitae, tincidunt nec felis. Donec sit amet odio tempor, cursus arcu eu, rhoncus sapien. In hac habitasse platea dictumst. Phasellus hendrerit erat quis sapien sagittis, imperdiet fermentum tellus faucibus. Morbi arcu ipsum, varius vel erat eget, hendrerit egestas nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis nibh ac ante congue ultricies. Fusce rutrum vestibulum nibh ac mollis. Curabitur nunc odio, scelerisque sed nunc sed, pulvinar scelerisque nisl. Sed egestas odio sit amet leo mollis, quis varius ex facilisis. Nam cursus, tellus nec accumsan fermentum, urna ante pharetra felis, ac auctor lacus erat id lacus. Aliquam fringilla ipsum hendrerit nisl posuere gravida.', 'php, tut, tutorial, php tutorial, rik doe, php', 1, 'published'),
(12, 'JAVA', 'Learn JAVA in 30 days', 'Don Doe', '2018-06-30', 'admin-java_logo.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis leo semper, lobortis ante a, blandit arcu. Fusce hendrerit ipsum sed diam dignissim consectetur posuere id justo. Aliquam eleifend eros non neque malesuada, et auctor risus fermentum. Morbi at diam viverra, fermentum eros in, lacinia sapien. Fusce non commodo neque, at laoreet mauris. Proin facilisis massa sit amet porttitor interdum. Pellentesque tempor libero nibh, non bibendum ipsum ultricies ac. Quisque blandit, eros eu faucibus volutpat, dolor mi vulputate urna, vitae lacinia urna nisi eget lorem. Sed nisl nisi, lacinia nec scelerisque vitae, mattis id arcu. Sed at suscipit sem.\r\n\r\nMorbi sit amet dictum ex. Suspendisse potenti. Aenean elementum eros ut diam rutrum condimentum. Mauris euismod, nulla quis convallis pulvinar, ante velit maximus lacus, et iaculis dui arcu nec erat. Mauris molestie, quam a efficitur pulvinar, tortor metus ullamcorper justo, ut scelerisque elit est ut turpis. Fusce sit amet luctus lacus, a fringilla nulla. Aenean convallis erat neque, quis laoreet purus feugiat vel.', 'java, learn, tutorial, learn java in 30 days, don doe, java', 1, 'published'),
(14, 'Bootstrap', 'Learn HTML in 10 days', 'Edin Causevic', '2030-06-18', 'html-tags.png', 'In ipsum neque, ultrices at sapien eu, posuere tristique risus. Aliquam erat volutpat. Cras nec ipsum nulla. Donec odio ante, congue vel sagittis eu, placerat et orci. Curabitur placerat quam sit amet mauris auctor, sed pulvinar est commodo. In elementum eros dolor, nec bibendum nibh sodales blandit. Vivamus facilisis at lectus vitae vestibulum. Integer ut metus in mauris aliquet sollicitudin. Donec eget ornare purus. Fusce sollicitudin auctor hendrerit.', 'learn, html, , learn html in 10 days, edin causevic, html & css', 1, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) VALUES
(1, 'Ric', 'onomatopeja', 'Richardo', 'Suvarge', 'riceswave@email.com', '', 'subscriber', ''),
(5, 'edo', 'onomatopeja124', 'Edin', 'Causevic', 'edin@email.com', '', 'subscriber', ''),
(11, 'admin', 'admin', 'admin', 'admin', 'admin@email.com', '', 'admin', ''),
(12, 'edoad', 'rice', 'Richardo', 'Roco', 'ricardeo@email.com', '', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
