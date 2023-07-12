-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 03:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `aheading` varchar(30) NOT NULL,
  `abio` varchar(500) NOT NULL,
  `aimage` varchar(100) NOT NULL DEFAULT 'avtar.png',
  `addedby` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `password`, `aname`, `aheading`, `abio`, `aimage`, `addedby`) VALUES
(1, '09:21 11-07-2023', 'Kashyap', 'Ritesh@7034', 'kashyap Roy', 'php developer', 'I am a skilled and passionate PHP developer with over fresher in the field. Throughout my career, I have worked on various projects, ranging from small-scale websites to complex web applications. My expertise lies in building robust and scalable solutions using PHP frameworks such as Laravel and CodeIgniter. I have a strong understanding of object-oriented programming principles and design patterns, allowing me to write clean and maintainable code. I am proficient in HTML, CSS, JavaScript,', '1.0x0.jpg', 'Vishal'),
(2, 'July-11-23 11:23:53', 'Chandan', 'ck123', 'roy', '', '', 'avtar.png', 'Kashyap'),
(3, 'July-11-23 11:24:26', 'Rakesh', 'Rakesh@2002', 'oberoy', '', '', 'avtar.png', 'Kashyap'),
(4, 'July-11-23 20:22:43', 'Shubham', '1234', 'Singh', '', '', 'avtar.png', 'Kashyap'),
(5, 'July-12-23 07:35:28', 'Gulshan', '12345', 'Chhotu', '', '', 'avtar.png', 'Kashyap');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'Technology', 'Vikash', 'July-11-23 09:16:46'),
(2, 'Tutorial', 'Vikash', 'July-11-23 09:17:36'),
(3, 'Camera', 'Vikash', 'July-11-23 09:17:57'),
(4, 'Nature', 'Vikash', 'July-11-23 09:18:03'),
(5, 'Train', 'Vikash', 'July-11-23 09:18:12'),
(6, 'Hotel', 'Vikash', 'July-11-23 09:18:19'),
(7, 'Mountain', 'Vikash', 'July-11-23 09:18:27'),
(8, 'Web Developer', 'Vikash', 'July-11-23 09:18:50'),
(9, 'shopping', 'Vikash', 'July-11-23 09:19:19'),
(10, 'Friends', 'Vikash', 'July-11-23 09:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approveby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `post_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approveby`, `status`, `post_id`) VALUES
(1, 'July-11-23 11:40:56', 'Rupali Sinha', 'riteshkumar7871@gmail.com', 'hlo', 'kashyap Roy', 'on', 9),
(2, 'July-11-23 12:01:21', 'Gautam kumar', 'gautamkr91027@gmail.com', 'Look Fantastic #Biharibau #Muzaffarpursmartcity', 'kashyap Roy', 'on', 9),
(3, 'July-12-23 08:59:49', 'Rahul', 'rahul78@gmail.com', 'This post is helpful for me. when I created a account.', 'kashyap Roy', 'on', 5),
(4, 'July-12-23 11:44:22', 'Sonu Kumar', 'sonu@gmail.com', 'Miss uh', 'kashyap Roy', 'on', 9),
(5, 'July-12-23 18:53:02', 'Vikash', 'riteshkumar7@gmail.com', 'This Blog is helpful to create an account.', 'kashyap Roy', 'on', 8);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(1, 'July-11-23 09:38:27', 'HTML Tutorial', 'Tutorial', 'Kashyap', 'html.jpg', 'HTML (Hypertext Markup Language) is a standard markup language used for creating web pages and web applications. It provides a structure and semantic meaning to the content displayed on a web page. HTML documents consist of a series of elements or tags, which are enclosed in angle brackets (\"< >\").\r\n\r\nThe fundamental building block of an HTML document is the `<!DOCTYPE html>` declaration, which informs the browser that the document follows the HTML5 standard. The structure of an HTML document typically includes the `<html>`, `<head>`, and `<body>` tags.\r\n\r\nHTML tags are used to mark up the content and structure of a web page. Tags are classified into two types: paired tags and self-closing tags. Paired tags consist of an opening tag and a closing tag, while self-closing tags do not require a closing tag. For example, the `<p>` tag represents a paragraph and requires a closing `</p>` tag, whereas the `<br>` tag represents a line break and is self-closing.\r\n\r\nHTML tags can have attributes that provide additional information or modify their behavior. Attributes are placed within the opening tag of an element. For instance, the `<a>` tag is used for creating links and requires an `href` attribute specifying the URL of the linked resource.\r\n\r\nHTML offers a wide range of tags to structure content. Headings are marked up using `<h1>` to `<h6>` tags, with `<h1>` being the highest level and `<h6>` being the lowest. Paragraphs are marked up with the `<p>` tag, while lists can be created using `<ul>` (unordered list) and `<ol>` (ordered list) tags, with individual list items marked up using the `<li>` tag.\r\n\r\nImages are displayed using the `<img>` tag, which requires the `src` attribute specifying the image URL and the `alt` attribute providing alternative text for accessibility purposes. Tables can be created with the `<table>`, `<tr>`, `<th>`, and `<td>` tags, representing the table, table rows, table headers, and table cells, respectively.\r\n\r\nHTML also includes semantic tags introduced in HTML5, such as `<header>`, `<nav>`, `<article>`, `<section>`, and `<footer>`. These tags provide meaning to different parts of a web page, improving accessibility and search engine optimization.\r\n\r\n'),
(2, 'July-11-23 09:39:28', 'CSS Tutorial', 'Tutorial', 'Kashyap', 'css.jpg', 'CSS (Cascading Style Sheets) is used in conjunction with HTML to style and format the appearance of elements. CSS allows you to control colors, fonts, layout, and other visual aspects of a web page. Styles can be applied using inline styles directly within HTML tags, embedded stylesheets within the <style> tag in the <head> section, or external CSS files linked to the HTML document.'),
(3, 'July-11-23 09:41:19', 'PHP Tutorial', 'Tutorial', 'Kashyap', 'php.jpg', ' PHP is a powerful and widely-used server-side scripting language for web development. Its integration with HTML, extensive database support, file handling capabilities, and the availability of frameworks make it a popular choice for building dynamic and interactive web applications. The continuous evolution of PHP ensures that it remains a relevant and valuable tool for developers worldwide.'),
(4, 'July-11-23 09:44:43', 'PYTHON ', 'Tutorial', 'Kashyap', 'python.png', 'Python is a high-level, interpreted programming language known for its simplicity, readability, and versatility. It was created by Guido van Rossum and first released in 1991. Python emphasizes code readability, making it easy to understand and write, which has contributed to its widespread adoption in various domains, including web development, data analysis, scientific computing, artificial intelligence, and more.\r\n\r\n\r\n'),
(5, 'July-11-23 09:50:54', 'How To Create Facebook Account.', 'Technology', 'Kashyap', 'facebook.png', '1. Open a web browser and go to the Facebook website.\r\n2. Click on the \"Create New Account\" button.\r\n3. Enter your name, email or phone number, password, date of birth, and gender in the provided fields.\r\n4. Review the Facebook Terms and Data Policy, and click on the \"Sign Up\" button.\r\n5. Complete the security check by solving the captcha or following any additional instructions.\r\n6. Optionally, you can add a profile picture to personalize your account.\r\n7. Verify your email address or phone number by following the instructions sent by Facebook.\r\n8. Once verified, you can start connecting with friends, joining groups, and sharing content on Facebook.\r\n\r\n\r\n'),
(6, 'July-11-23 09:53:53', 'How To Create Gmail Account.', 'Technology', 'Kashyap', 'Email.jpg', '1. Open your preferred web browser and go to the Gmail homepage (www.gmail.com).<br>2. Click on the \"Create account\" or \"Sign up\" button.<br>3. Fill in the required information, including your first and last name, desired email address, password, and phone number.<br>4. Choose a unique email address that is not already taken by another user.\r\n5. Create a strong password that includes a combination of letters, numbers, and symbols to ensure account security.\r\n6. Enter your phone number, which will be used for account verification and account recovery purposes.<br>7. Provide any additional requested information, such as your birthdate and gender.<br>8. Agree to the terms of service and privacy policy, then click on the \"Next\" or \"Create account\" button to complete the process.\r\n'),
(7, 'July-11-23 10:03:15', 'How To Create Whatsapp Account.', 'Technology', 'Kashyap', 'whatsapp.jpg', 'To create a WhatsApp account, follow these steps:<br>1.Open the play store & search whatsapp.<br>2.Then Install the Whatsapp.<br>3.After Installation,then creat an account.<br><br>4.Enter your phone number in the provided field and tap on \"Next.\"<br>5.WhatsApp will send a verification code to the entered phone number via SMS. Enter the verification code when prompted.<br>6.After Verification,You can chat us.\r\n'),
(8, 'July-11-23 10:06:17', 'How To Create Instagram Account.', 'Technology', 'Kashyap', 'Instagram.jpg', 'Download the Instagram app store.<br>Open the app and tap on \"Sign Up\" to create a new account.<br>Enter your email address or phone number and tap \"Next.\"<br>Create a unique username and password for your Instagram account.<br>Complete the account setup by adding a profile picture, providing some basic information, and optionally connecting your account to your Facebook profile.'),
(9, 'July-11-23 10:34:32', 'Friend', 'Friends', 'Kashyap', 'IMG_20220713_220448_104.jpg', 'They may cover various topics of interest, such as travel, food, technology, fashion, or personal development.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign_Relation` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
