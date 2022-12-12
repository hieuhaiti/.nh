-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 09:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humg_course4u`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(200) DEFAULT NULL,
  `blog_content` text DEFAULT NULL,
  `blog_background` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_content`, `blog_background`, `user_id`, `created_date`) VALUES
(5, NULL, 'aaa', NULL, 3, '2022-12-01 13:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(5, 'Design'),
(1, 'Development'),
(2, 'Finance & Accounting'),
(3, 'IT & Software'),
(4, 'Office Productivity');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `chapter_title` varchar(200) DEFAULT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `chapter_title`, `course_id`) VALUES
(1, 'Day 1 - Beginner - Working with Variables', 1),
(2, 'Day 2 - Beginner - Understanding Data Types', 1),
(3, 'Day 3 - Beginner - Control Flow and Logical', 1),
(4, 'Day 4 - Beginner - Randomisation and Python Lists', 1),
(5, 'Day 5 - Beginner - Python Loops', 1),
(6, 'Day 6 - Beginner - Python Functions & Karel', 1),
(7, 'Day 7 - Beginner - Hangman', 1),
(8, 'Day 8 - Beginner - Function Parameters', 1),
(9, 'Day 1 - Beginner - Working with Variables', 2),
(10, 'Day 2 - Beginner - Understanding Data Types', 2),
(11, 'Day 4 - Beginner - Randomisation and Python Lists', 2),
(12, 'Day 5 - Beginner - Python Loops', 2),
(13, 'Day 1 - Beginner - Working with Variables', 3),
(14, 'Day 3 - Beginner - Control Flow and Logical', 3),
(15, 'Day 3 - Beginner - Control Flow and Logical', 3),
(16, 'Day 5 - Beginner - Python Loops', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(150) DEFAULT NULL,
  `course_title` varchar(200) DEFAULT NULL,
  `course_target` text DEFAULT NULL,
  `course_description` longtext DEFAULT NULL,
  `course_img` varchar(100) DEFAULT NULL,
  `start_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `language_id` char(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_title`, `course_target`, `course_description`, `course_img`, `start_date`, `updated_date`, `language_id`, `user_id`, `sub_topic_id`) VALUES
(1, '100 Days of Code: The Complete Python Pro Bootcamp for 2023', 'Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!', '<ul><li>You will master the Python programming language by building 100 unique projects over 100 days.</li><li>You will learn automation, game, app and web development, data science and machine learning all using Python.</li><li>You will be able to program in Python professionally</li><li>You will learn Selenium, Beautiful Soup, Request, Flask, Pandas, NumPy, Scikit Learn, Plotly, and Matplotlib.</li><li>Create a portfolio of 100 Python projects to apply for developer jobs</li><li>Be able to build fully fledged websites and web apps with Python</li><li>Be able to use Python for data science and machine learning</li><li>Build games like Blackjack, Pong and Snake using Python</li><li>Build GUIs and Desktop applications with Python</li></ul>', '<p>Welcome to the 100 Days of Code - The Complete Python Pro Bootcamp,<strong> the only course you need</strong> to learn to code with Python. With over 500,000 <strong>5 STAR reviews</strong> and a 4.8 average, my courses are some of the HIGHEST&nbsp;RATED courses in the history of Udemy!&nbsp;&nbsp;</p><p><strong>100 days, 1 hour per day, learn to build 1 project per day, this is how you master Python.</strong></p><p>At 60+ hours, this Python course is without a doubt the <strong>most comprehensive </strong>Python course available anywhere online. Even if you have <strong>zero</strong> programming experience, this course will take you from <strong>beginner to professional</strong>. Here\'s why:</p><ul><li>The course is taught by the <strong>lead instructor</strong> at the App Brewery, London\'s <strong>best in-person programming Bootcamp</strong>.</li><li>The course has been updated to be <strong>2023 ready </strong>and you\'ll be learning the latest tools and technologies used at large companies such as Apple, Google and Netflix.</li><li>This course doesn\'t cut any corners, there are beautiful <strong>animated explanation videos</strong> and tens of <strong>real-world projects</strong> which you will get to build. e.g. Tinder auto swiper, Snake game, Blog Website, LinkedIn Auto Submit Job Application</li><li>The curriculum was developed over a period of<strong> 2 years</strong>, with comprehensive student testing and feedback.</li><li>We\'ve taught over 600,000 students how to code and many have gone on to <strong>change their lives </strong>by becoming professional developers or starting their own tech startup.</li><li>You\'ll save yourself <strong>over $12,000 </strong>by enrolling, and still get access to the same teaching materials and learn from the same instructor and curriculum as our in-person programming Bootcamp.</li><li>The course is <strong>constantly updated</strong> with new content, with new projects and modules determined by students - that\'s you!</li></ul>', '05122022151853Angela Yu.jpg', '2022-12-03 19:14:34', '2022-12-05 21:18:53', 'ENG', 5, 8),
(2, 'The Web Developer Bootcamp 2022', 'COMPLETELY REDONE - The only course you need to learn web development - HTML, CSS, JS, Node, and More!', '<ul><li>The ins and outs of HTML5, CSS3, and Modern JavaScript for 2021</li><li>Make REAL web applications using cutting-edge technologies</li><li>Create responsive, accessible, and beautiful layouts</li></ul>', '<p><br><strong>COMPLETELY REDONE WITH OVER 500 BRAND NEW&nbsp;VIDEOS!</strong></p><p>Hi! Welcome to the brand new version of The Web Developer Bootcamp, Udemy\'s most popular web development course.&nbsp; This course was just completely overhauled to prepare students for the 2022 job market, with over 60 hours of brand new content. This is the <strong>only course you need to learn web development. </strong>There are a lot of options for online developer training, but this course is without a doubt the most comprehensive and effective on the market.&nbsp; Here\'s why:</p><ul><li>This is the only Udemy course taught by a professional bootcamp instructor with a track record of success.</li><li><strong>94% of my in-person bootcamp students go on to get full-time developer jobs</strong>. Most of them are complete beginners when I start working with them.</li><li>The previous 2 bootcamp programs that I taught cost <strong>$14,000 and $21,000</strong>.&nbsp; This course is just as comprehensive but with brand new content for a fraction of the price.</li><li>Everything I cover is up-to-date and relevant to 2022\'s developer job market.<strong> This course does not cut any corners. I just spent 8 months redoing this behemoth of a course!</strong></li><li>We build 13+ projects, including a <strong>gigantic production application </strong>called YelpCamp. No other course walks you through the creation of such a substantial application.</li><li>The course is <strong>constantly updated</strong> with new content, projects, and modules.&nbsp; Think of it as a subscription to a never-ending supply of developer training.</li><li>You get to meet my cats and chickens!</li></ul><p>When you\'re learning to program you often have to sacrifice learning the exciting and current technologies in favor of the \"beginner friendly\" classes.&nbsp; With this course, you get the best of both worlds.&nbsp; This is a course designed for the complete beginner, yet it covers some of the most exciting and relevant topics in the industry.</p>', '03122022161215web 2022.jpg', '2022-12-03 22:12:15', '2022-12-03 22:38:11', 'ENG', 5, 1),
(3, 'An Entire MBA in 1 Course:Award Winning Business School Prof', 'Everything You Need to Know About Business from Start-up to IPO', '<ul><li>Over 400,000 students in 195 countries!</li><li>Superb reviews!</li><li>Free 384 page book version of this course included!</li><li>Take your career to the next level!</li><li>Launch a company from scratch.</li><li>Get any job the easy way.</li><li>Get many customers by using the best networking tool!</li><li>Raise a lot of money quickly.</li><li>Create financial models from scratch (the Professor makes it so easy to understand).</li><li>Analyze company financials with ease!</li><li>Understand how investment banking firms work and what they can do to help your business.</li><li>Understand how management consulting firms work and when you need to hire them.</li><li>Understand how macro economics and micro economics works.</li><li>Understand what is venture capital and how to partner with the top venture capital firms to take your company to the next level.</li></ul>', '<p><strong>FREE 384 PAGE MBA BOOK INCLUDED.</strong> In order to further improve the student experience, there is a free download at the end of every section of this course (contains every slide &amp; entire easy to read comprehensive scripts of all 49 lectures &amp; &gt;100 helpful internet links + more) keeping the course up to date, even easier to understand &amp; even more fun and engaging! **</p><p><strong>Are you ready to take your career to the next level? In this course, you will learn everything you need to know about business….from starting a company to taking it public. This course covers all of the important topics you will learn from getting an MBA from a top school + real life practical business concepts that will help make you more successful!</strong></p><p><strong>This course is taught by an award winning MBA professor with significant real world experience working at Goldman Sachs as well as in the venture capital, hedge fund and consulting industries (he has founded several companies and sits on several boards). Many business concepts are simply common sense.</strong> This course will focus on business concepts that you need to know that might not be common sense. This course makes the general business, accounting and finance process very easy to understand! The professor of this course is also the author of \"<i>101 Crucial Lessons They Don\'t Teach You in Business School</i>,\" which Forbes magazine recently called \"<i>1 of 6 books that all entrepreneurs need to read right now</i>.\"<br>&nbsp;</p><p>The contents of this course are all based on my work experience at several firms, including Goldman Sachs, the consulting industry at Accenture, a few companies I have started, the hedge fund industry where I worked at Citadel and also in the venture capital sector (the firm I founded had a venture capital investment in Facebook).I included helpful practical business concepts I learned while I did an MBA at Columbia University and a Bachelor of Commerce degree at McGill University. Think of this course as a “greatest hits” business summaries from my MBA, undergraduate business degree, work experience in consulting, equities, hedge funds, venture capital and starting my own companies.</p><p>I have minimized “boring theoretical concepts” in this course in order to keep it as close to reality as possible. The concepts of this course have been taught by me in many classes at several universities, where the student feedback has been universally and incredibly positive (please see my LinkedIn profile for student reviews / feedback on my teaching style/effectiveness - thank you. Also please see reviews of my books in Amazon and here in Udemy on my teaching - particularly in my Udemy course on \"<i>101 Crucial Lessons They Don\'t Teach You in Business School</i>\").<br><br>An Entire MBA&nbsp;In&nbsp;1 Course&nbsp;®&nbsp;&nbsp;is a registered&nbsp;trademark of Haroun Education Ventures, Inc. The contents of the course are&nbsp;copyright © 2017 Haroun Education Ventures, Inc.</p>', '03122022161708Chris-Harouns-Udemy-MBA-Course.png', '2022-12-03 22:17:08', '2022-12-03 22:38:24', 'FR', 5, 72),
(4, 'CCNA 2020 200-125 Video Boot Camp With Chris Bryant', 'Join The 90,000+ Students Who Are Learning Real-World Skills AND Earning Their CCNA!', '<p>Join The 90,000+ Students Who Are Learning Real-World Skills AND Earning Their CCNA!</p><p>No course details available</p>', '<p><strong>My CCNA&nbsp;Video Boot Camp is totally refreshed for the latest version of the exam, and every video in this course (and all my courses) is fully downloadable, which allows you to study any time, anywhere -- on YOUR&nbsp;schedule.</strong></p><p><strong>That includes my famous subnetting material and my BGP material -- and I\'ll make BGP clearer for you than any other instructor or course in the world.&nbsp;&nbsp;You have my guarantee on that.</strong></p><p>Sign up now and earn the two most important Cisco certifications there are for one low price -- and join over 90,000&nbsp;students in preparing for success in the exam room and in real-world networking.</p><p>You receive immediate, full access to all 27+ hours of the course, and you can stream them or download them anytime you like.</p><p>From my unbeatable, trick-free methods of teaching you how to perform binary, hex, and decimal conversions all the way through tough OSPF and EIGRP configs, you\'ll see it all right here on LIVE Cisco routers and switches - and you can watch every single session as often as you like.</p><p>Thanks for making The Bryant Advantage part of your CCNA success story! Let\'s get started on your CCNA!&nbsp;</p><p>Chris Bryant</p><p>CCIE #12933</p><p>\"The Computer Certification Bulldog\"</p>', '03122022162515002AFAFSU.jpg', '2022-12-03 22:25:15', '2022-12-03 22:38:41', 'VIE', 5, 48),
(5, 'Excel Deep Dive: Pivot Tables Workshop', 'Excel data mastery is possible! Learn how to use pivot tables in excel and learn how to use pivot tables to get a raise', '<ul><li>Master Excel Pivot Tables</li><li>Learn to Harness these skills to get a raise</li><li>Solve World Hunger</li></ul>', '<p><strong>Master Excel Pivot Tables and save the world!</strong></p><p>This course discusses one of the most powerful tools of the Office Ninja\'s arsenal, Excel Pivot Tables and how to use pivot tables. It\'s potential for analyzing and summarizing data is legnendary, but few have mastered its intricacies. Through a series of easy to follow lessons on how to use pivot table in excel, you will be introduced to the concepts, techniques and powerful features of this mysterious excel tool, and can follow along with each step with the included sample file.</p><ul><li>We will cover:</li><li>Pivot Table Concepts</li><li>Creating A Pivot Table</li><li>Modifying Pivot Table Elements</li><li>Filtering Extraneous Data (the Slicer tool)</li><li>Creating Multiple Pivot Tables</li><li>Creating Pivot Charts</li><li>Advanced Analysis Techniques</li></ul><p>Learn how to use pivot table in excel today.</p>', '03122022162724maxresdefault.jpg', '2022-12-03 22:27:24', '2022-12-03 22:38:57', 'ENG', 5, 1),
(6, 'User Experience (UX): The Ultimate Guide to Usability and UX', 'Get a job in UX and build your user research and UX design skills with this hands-on user experience training course.', '<ul><li>Bake UX into your workflow by following a proven, user centred design framework.</li><li>Plan field visits and user interviews to uncover user needs.</li><li>Moderate a usability test and prioritise the observations.</li><li>Create personas, user stories, red routes and user journey maps.</li><li>Uncover and describe users’ mental models.</li><li>Choose appropriate schemes for classifying and organising information.</li></ul>', '<p><i>2022 Edition.</i></p><p>You\'ve just landed on Udemy\'s highest rated course on user experience (UX). Thousands of user researchers and&nbsp;designers have used this course to kick-start their career in UX. You can do it, too.</p><p><strong>Gain hands-on practice in all the key areas of UX </strong>— from interviewing your users through to prototyping and usability testing your designs.</p><p><strong>Build a UX portfolio to boost your job prospects</strong> as you complete five real-world sample projects.</p><p><strong>Gain industry-recognised certification</strong> by preparing for the BCS Foundation Certificate in User Experience.</p><p>UX Mastery reviewed dozens of online courses in UX, but they gave just one course 10/10: <strong>this one</strong>.</p><p><strong>Build Your UX Portfolio As You Work Through 5 User Research and Design Projects.</strong></p><p>The sample projects in the course include:</p><ul><li>Find my pet: a product that allows people to track down wayward pets who have got lost.</li><li>Tomorrow’s shopping cart: a device that lets customers find any product in a supermarket.</li><li>Gift Giver, a gift recommendation system based on an extremely accurate product recommendation technology.</li><li>The Citizen Journalist: a system that will allow ordinary people to film events, take photographs, write a story and create a crowdsourced, online newspaper.</li><li>The Digital Postcard, an app that will allow users to create and send their own postcard, either by using a photograph they have taken on their phone, or by selecting a professionally taken image of a local beauty spot.</li></ul>', '03122022162949images.png', '2022-12-03 22:29:49', '2022-12-03 22:39:09', 'FR', 5, 157),
(7, 'Statistics - Data Analysis in SPSS: Inferential Statistics', 'Increase Your Data Analytic Skills – Highly Valued And Sought After By Employers', '<ul><li>In this course, you will gain proficiency in how to analyze a number of statistical procedures in SPSS.</li><li>You will learn how to interpret the output of a number of different statistical tests</li><li>Learn how to write the results of statistical analyses using APA format</li></ul>', '<p><strong>November, 2019.&nbsp;</strong></p><p><strong>Join more than 1,000 students&nbsp;and get&nbsp;instant&nbsp;access to&nbsp;this&nbsp;best-selling&nbsp;content -&nbsp;enroll&nbsp;today!</strong></p><p><strong>Get marketable and highly sought after skills in this course that will substantially increase your knowledge of data analytics, with a focus in the area of significance testing, an important tool for A/B testing and product assessment.</strong></p><p><strong>Many tests covered, including three different t tests, two ANOVAs, post hoc tests, chi-square tests (great for A/B testing), correlation, and regression. Database management also covered!</strong></p><p><strong>Two in-depth examples provided of each test for additional practice.</strong></p><p>This course is great for professionals, as it provides step by step instruction of tests with clear and accurate explanations. Get ahead of the competition and make these tests&nbsp;important&nbsp;parts&nbsp;of your data analytic toolkit!</p><p>Students will also have the tools needed to succeed in their statistics and experimental design courses.<br>&nbsp;</p><p>Data Analytics is an rapidly growing area in high demand (e.g., McKinsey)<br>&nbsp;</p><p>Statistics play a key role in the process of making sound business decisions that will generate higher profits. Without statistics, it\'s difficult to determine what your target audience wants and needs.&nbsp;</p><p>&nbsp; Inferential statistics, in particular, help you understand a population\'s needs better so that you can provide attractive products and services.&nbsp;</p><p>&nbsp; This course is designed for business professionals who want to know how to analyze data. You\'ll learn how to use IBM SPSS to draw accurate conclusions on your research and make decisions that will benefit your customers and your bottom line.</p><p>&nbsp;<strong>Use Tests in SPSS to Correctly Analyze Inferential Statistics</strong>&nbsp;</p><ul><li>Use the One Sample t Test to Draw Conclusions about a Population</li><li>Understand ANOVA and the Chi Square</li><li>Master Correlation and Regression</li><li>Learn Data Management Techniques</li></ul>', '03122022163415248e3fdc958c3297ff67a87276e7c63c.jpg', '2022-12-03 22:34:15', NULL, 'ENG', 6, 10),
(8, 'How to Read Financial Statements: Build Financial Literacy', 'Read financial statements and speak the language of business without the drudgery of a traditional accounting course', '<ul><li>Explain how the balance sheet, income statement, and statement of cash flows are used, what they measure, and why we need three statements.</li><li>Differentiate between income and cash flow</li><li>Explain what is the balance sheet equation and why the balance sheet equation is the foundational model for accrual accounting/double entry accounting</li><li>Define what are assets, liabilities, and equity and how assets, liabilities, and equity relate</li><li>Explain how the statement of cash flows and income statement link into the balance sheet</li><li>Explain how accounts work like buckets</li></ul>', '<p>\"<strong>The number one problem in today\'s generation and economy is the lack of financial literacy</strong>\" - Alan Greenspan, Chairman of the U. S. Federal Reserve 1987 to 2006</p><p>If you are in business, you need to speak the language. No matter if you’re in sales, marketing, manufacturing, purchasing, accounting, or finance, you need to speak the language of business. Perhaps you own a small business or are an entrepreneur starting a business… or you need a better job and are thinking about going to business school… or you provide legal and consulting services to businesses. You’ll be more credible, make better decisions, and enjoy more success if you speak the language of business.</p><p><strong>The Importance of Financial Statements in Today’s World</strong></p><p>The language of business is encapsulated in financial statements. Financial statements provide a scorecard for how a business is doing. Over a series of years, it provides a map of the business’s performance. Managers judge the success of their business with financial statements. Investors make intelligent investing decisions with financial statements. In addition, people in the business world are being held more accountable for their financial statement practices since Enron and WorldCom. They need to know what goes into financial statements.</p><p><strong>Learn to Read Financial Statements, Not Prepare Them.</strong></p><p>Just as you don’t need to understand how to make a car in order to drive one, <strong>you don’t have to understand bookkeeping to read financial statements</strong>. I\'ve prepared a course that eliminates the bookkeeping drudgery and concentrates on the end product of accounting, how to read financial statements, not how to prepare them.</p><p>Like climbing a spiral staircase, I will teach you how to read three real company’s financial statements (Whole Foods, Sherwin Williams, and Facebook), starting with the simple and progressing to the complex, interspersing the statements with key accounting terms and concepts to help you build expertise.</p><p>Sounds good? Here is exactly what we will cover:</p><ul><li><strong>Read Financial Statements</strong>. What is a balance sheet, income statement and statement of cash flows and how each is different</li><li><strong>Quick Look: Read Financial Statements of Whole Foods</strong>. What are the major line items on Whole Foods’ balance sheet, income statement and statement of cash flows</li><li><strong>Where the numbers come from: Accrual Accounting Basics</strong>. What are some basic accounting concepts, why we can’t measure profits with cash, and why we need a separate statement for income and cash flow</li><li><strong>Deep Dive: Read Financial Statements of Sherwin Williams</strong>. What each line item means on Sherwin Williams’ balance sheet, income statement and statement of cash flows</li><li><strong>Test What you have learned: Facebook Case Study</strong>. A 28-question quiz about Facebook’s balance sheet, income statement and statement of cash flows with feedback</li><li><strong>What the Financial Statements Tell You Through Ratios</strong>. How to interpret a company’s performance with four ratios: return on equity, profit margin, asset turnover, and financial leverage. How to compute these ratios for Sherwin Williams and dig into their annual report for insight. How to compare financial statements among four different industries (distribution, manufacturing, service, and financial service)</li></ul>', '03122022163639The-Accounting-Equation.jpg', '2022-12-03 22:36:39', NULL, 'JP', 6, 123),
(9, 'Learn Ethical Hacking From Scratch', 'Become an ethical hacker that can hack computer systems like black hat hackers and secure them like security experts.', '<ul><li>135+ ethical hacking &amp; security videos.</li><li>Start from 0 up to a high-intermediate level.</li><li>Learn ethical hacking, its fields &amp; the different types of hackers.</li><li>Install a hacking lab &amp; needed software (on Windows, OS X and Linux).</li><li>Hack &amp; secure both WiFi &amp; wired networks.</li><li>Understand how websites work, how to discover &amp; exploit web application vulnerabilities to hack websites.</li><li>Use 30+ hacking tools such as Metasploit, Aircrack-ng, SQLmap.....etc.</li><li>Discover vulnerabilities &amp; exploit them to hack into servers.</li></ul>', '<p>Welcome this comprehensive Ethical Hacking course! This course assumes&nbsp;you have <strong>NO&nbsp;prior knowledge</strong> and by the end of it you\'ll be able to&nbsp;<strong>hack systems like black-hat hackers</strong> and <strong>secure them like security experts!</strong></p><p>This&nbsp;course is&nbsp;highly <strong>practical</strong> but it won\'t neglect the theory; we\'ll start with ethical hacking basics, breakdown the different penetration testing fields and install the needed software (on Windows, Linux and Mac OS X), then we\'ll dive and start hacking straight away. You\'ll <strong>learn everything by example</strong>, by analysing and exploiting different systems such as networks, servers, clients, websites .....etc. We\'ll never have any boring dry theoretical lectures.</p><p>The course is divided into a number of sections, each section covers a penetration testing / hacking field, in each of these sections you\'ll first learn how the target system works, the weaknesses of this system, and how to <strong>practically</strong> exploit theses weaknesses to hack this system.</p><p>By the end of the course you will have a strong foundation in most hacking or penetration testing fields and you\'ll also learn how to <strong>detect, prevent and secure</strong> systems and yourself from&nbsp;the discussed attacks.&nbsp;</p><p>&nbsp;</p><p>The course is divided into four main sections:&nbsp; &nbsp;</p><p><strong>1.&nbsp;Network Hacking</strong><i> -&nbsp;</i>This section will teach you how to test the security of both wired &amp; wireless networks. First, you will learn network basics, how they work, and how devices communicate with each other. Then it will branch into three sub sections:&nbsp; &nbsp;</p><p>Pre-connection<strong> </strong>attacks:<i>&nbsp;</i>in this subsection you\'ll learn a number of attacks that can be executed without connecting to the target network and without the need to know the network password; you\'ll learn how to&nbsp;<strong>gather&nbsp;information</strong>&nbsp;about the networks around you, discover connected devices, and control connections (<strong>deny/allow devices from connecting to networks</strong>).</p><p>Gaining Access: Now that you gathered information about&nbsp;the networks around you, in this subsection you will learn how to <strong>crack</strong> the key and get the password to your target network whether it uses<strong> WEP, WPA </strong>or even<strong> WPA2</strong>.</p><p>Post Connection attacks: Now that you have the key, you can connect to the target network, in this subsection you will learn a number of<strong>&nbsp;powerful techniques</strong>&nbsp;that allow you to gather comprehensive information about the connected devices, <strong>see anything they do on the internet</strong> (such as login information, <strong>passwords</strong>, visited urls, images, videos ....etc), redirect requests, <strong>inject evil code</strong> in loaded pages and much more! All of these attacks work against both wireless and wired networks. You will also learn how to&nbsp;<strong>create a fake WiFi network,</strong>&nbsp;attract users to connect to it and use all of the above techniques against the connected clients.</p>', '03122022164051ethical-thumb.jpg', '2022-12-03 22:40:51', NULL, 'VIE', 6, 1),
(10, 'Microsoft Windows Server 2016 Training for Beginners', 'Install Windows Server 2016, Build a Windows Domain, Domain Controller, Learn DHCP, Install Windows 10, and much more...', '<ul><li>Install and configure Windows Server 2016</li><li>Build a Windows Domain</li><li>Configure your Windows Server 2016 OS to act as a DHCP server</li><li>Install, configure and deploy the Domain Name System (DNS) role on your Windows Server Operating System</li><li>Install and Configure multiple Domain Controllers (DCs)</li><li>(bonus) Install Windows 10 and join a workstation to your new Windows Domain</li><li>Manage Windows 10 Workstations from your Windows Server Domain Controller</li><li>Create users, groups and OUs with Active Directory Users &amp; Computers</li><li>Create and Understand Group Policy Objects (GPOs) with Group Policy Management</li><li>Learn to write Powershell scripts for your</li></ul>', '<p><strong>Join the other 20,000+&nbsp;successful students who have already taken this course!</strong></p><p>If you want to learn how to administrate the Windows Server operating system quickly and easily,&nbsp;<i>this is the course you have been looking for!</i></p><p>I have designed this course to give you a solid foundation&nbsp;with Microsoft\'s&nbsp;Windows Server 2016 which is the latest Windows Server operating system available (released Oct 2016).</p><p>This course is great for anyone who is looking to advance (or begin) their&nbsp;career in Information&nbsp;Technology!</p><p>In this course, you will get hands-on experience while completing the following projects:</p><ul><li>Installing / configuring Windows Server 2016</li><li>Build a Windows Domain</li><li>Configure&nbsp;your Windows Server 2016 OS&nbsp;to act as a&nbsp;DHCP server</li><li>Install,&nbsp;configure and deploy&nbsp;the Domain Name System (DNS) role on your Windows Server</li><li>Install and Configure a Domain Controller&nbsp;(DC)</li><li>(bonus)&nbsp;Install Windows 10 and join a workstation to your new Windows Domain</li><li>Manage Windows 10 Workstations from your Windows Server Domain Controller</li><li>Create users, groups and OUs&nbsp;with&nbsp;Active Directory Users &amp;&nbsp;Computers</li><li>Create and Understand&nbsp;Group Policy Objects (GPOs) with Group Policy Management</li><li>Learn to write Powershell scripts for your Windows Server like a true Information Technology Pro!</li><li>Create a Windows Server Update Services (WSUS) Server and Approve and Deploy Updates to your Domain Servers and Computers</li><li>Install and manage Windows Server 2016 Core Edition</li><li>Make your Windows Server 2016 OS act as a Router</li><li>Learn how to use Active Directory Sites and Services</li><li>...and MUCH&nbsp;more!</li></ul>', '03122022164244maxresdefault (1).jpg', '2022-12-03 22:42:44', NULL, 'FR', 6, 35),
(11, 'Advanced Object Oriented Analysis of Hard Problems using UML', 'Take your software and business analysis skills to completely new levels with advanced UML conceptual modelling.', '<ul><li>Know how to create a conceptual model of any system</li><li>Know in which situations conceptual modelling is efficient and when and how to apply it successfully</li><li>Be able to interpret and construct common and advanced conceptual models using UML</li><li>Know how business process- and conceptual modelling best is performed in conjunction and how they relate to each other</li><li>Acquire knowledge faster</li><li>Communicate more clearly and eliminate misunderstandings</li></ul>', '<p>Learn how I have <strong>helped international&nbsp;businesses as well as my own startups</strong> for soon&nbsp;20 years to reshape blurry, vague and often contradicting ideas into crystal clear businesses, products, and software systems! <strong>Getting your concepts straight and visualised for scrutiny, early on</strong>, in any development effort is often what makes the difference between success and failure.</p><p>In this course you will learn <strong>everything of value </strong>about the special technique of object-oriented&nbsp;<strong>conceptual modelling</strong>&nbsp;that I have successfully employed in hundreds of workshops with business and software people, always with great success. In conjunction of being one of the <strong>most essential activities</strong> in the&nbsp;first steps in any<strong> software analysis and design&nbsp;endeavour</strong>, conceptual modelling&nbsp;could also be used on&nbsp;an everyday basis as a means of <strong>communicating more clear</strong>, <strong>acquiring knowledge faster</strong>&nbsp;and <strong>catalyst creative thinking</strong>.</p><p>The conceptual modelling technique&nbsp;using UML (Unified Modelling Lanugage),&nbsp;also called <strong>domain modelling</strong> or <strong>concept mapping,</strong>&nbsp;taught in this course gives you a very thorough understanding on the foundations of <strong>object-oriented class modelling</strong>. I have for &nbsp;20 years professionally developed object-oriented systems and for more than 5 years I worked in a small team together with some of the founding \"fathers\" (including Ivar Jacobson) of UML and Object Oriented Design (OOD), where we developed tools for Software Architects and Analysts.</p><p>Concept mapping <strong>will propel your success rate in delivering value</strong> and getting rid of the most crucial waste; <strong>the waste of doing the wrong things, in the wrong order for the wrong reason</strong>.</p>', '03122022164802maxresdefault (2).jpg', '2022-12-03 22:48:02', NULL, 'ENG', 7, 86),
(12, 'Legal English', 'Legal language and communication skills', '<ul><li>improve core skills like reading comprehension, logical thinking in a legal context and particular wording as well as written legal communication</li><li>understand and work with international contracts beyond the understanding of technical terms</li></ul>', '<p>Legal English is a field of the English language which deals with <strong>law related issues and how to communicate them properly</strong>.</p><p>This video course includes the three different aspects of legal English:</p><ul><li>General English skills</li><li>Specific law and legal skills</li><li>Communication skills</li></ul><p>Lecturer Tim Aghotor guides you through different definitions and explains the following aspects in depth:</p><ul><li>Common law</li><li>The English legal system</li><li>The court system</li></ul><p>You will be able to improve <strong>core skills</strong> like reading comprehension, logical thinking in a legal context and particular wording as well as written legal communication.</p>', '03122022164951giammarco-zeH-ljawHtg-unsplash-2048x1365.jpg', '2022-12-03 22:49:51', NULL, 'ENG', 7, 128),
(13, 'Character Art School: Complete Character Drawing', 'Learn How to Draw Characters Professionally, in the Ultimate Drawing Course - For Games, Manga, Animation and Comics', '<ul><li>How to Draw Characters Well</li><li>How to Draw Out of Your Head Fast</li><li>How to Draw in 3D</li><li>How to Draw Faces, Bodies and Hands</li><li>How to Draw Professionally</li><li>How to Draw Characters for Games, Films, Animation, Manga, Comics and More</li><li>Draw with Pencils and Paper OR Digital Art Tools</li><li>Utilize the included 7GB of Free Art Resources</li></ul>', '<p>Are you here to learn to draw characters professionally? Struggling with other courses where the instructors drone on and on? Do you need someone to teach you discipline, commitment and how to reach your art goals? You\'ve come to the right place. Enrol now, or read on to discover why this is <i>absolutely </i>the course for you.</p><p>&nbsp;</p><p><strong>What exactly is Character Art School?</strong></p><p>Character Art School is a character drawing course where you learn how to draw professional characters <i>in any style</i> for books, games, animation, manga, comics and more. I’ve hand-crafted&nbsp;the The Complete Character Drawing&nbsp;course to be the only course you really need to learn all the core fundamentals, and advanced techniques to drawing and sketching characters well.<br><br>If you’re an absolute beginner or you’re already at an intermediate level, the course will advance your current drawing ability to a professional level. The course is a comprehensive 10 module guided video course, where the only limit to your progression is your determination and engagement in the rewarding assignments.</p><p>Whether you want to draw characters, design characters, create concept art characters for films and games, illustrations, comics, manga, Disney style or other styles,<strong> this is&nbsp;</strong><i><strong>the</strong></i><strong>&nbsp;course you need to get you there.</strong></p><p>I’ll teach you to draw characters without<i>&nbsp;fear</i>, and I’ll teach you to draw characters&nbsp;<i>well</i> - that\'s my promise to you!</p><p>&nbsp;</p><p><strong>Finally, Learn Character Drawing Well</strong></p><p>Whether you’re a complete beginner, or intermediate at character drawing, you’ll learn things you never knew you never knew. Seriously. Inspired by masters and built on the theory of giants, Character Art School is one of, if not&nbsp;<i><strong>the&nbsp;most&nbsp;</strong></i><strong>comprehensive character drawing course out there</strong>. I’m so convinced of this, I’ll give you a no-questions asked refund if you’re not satisfied.</p><p>&nbsp;</p><p><strong>Clear, Easy to Understand Lessons (Scott\'s No Fluff Promise!)</strong></p><p>Crystal clear in fact. Learning character drawing and how to draw people effectively means having information presented&nbsp;in a logical and coherent way. The Character Art School Course is modular by design, easy to grasp, and allows you to learn in a well paced, structured way. Engage in the course chronologically, then revise each module at your leisure. Grasp concepts, such as how to draw lips, eyes, faces, and more, faster than you ever have before – there’s no fluff here.</p>', '03122022165123maxresdefault (3).jpg', '2022-12-03 22:51:23', NULL, 'VIE', 7, 104),
(14, 'Certified Kubernetes Administrator (CKA) with Practice Tests', 'Prepare for the Certified Kubernetes Administrators Certification with live practice tests right in your browser - CKA', '<ul><li>How to Administer a Kubernetes Cluster</li><li>How to Design a Kubernetes Cluster</li><li>How to Build a Kubernetes Cluster from scratch - \"The Hard Way\"</li><li>How to Test a Kubernetes Cluster end-to-end</li><li>How to Troubleshoot a Kubernetes Cluster</li><li>How to Secure a Kubernetes Cluster</li><li>How to Configure Storage on a Kubernetes Cluster</li><li>How to Configure Network on a Kubernetes Cluster</li></ul>', '<p>Kubernetes is one of the highest trending technology in Cloud Computing as of today. Kubernetes had the fastest growth in job searches, over 173% from a year before as reported recently by a survey conducted by Indeed.</p><p>Learn, practice, and get certified on Kubernetes with <strong>hands-on labs right in your browser</strong>.</p><p><i>\"I have compared this to other courses at Udemy and Linux Academy. All have the strengths and gaps, so far this is a winner!\"</i> -&nbsp; Thomas Trauss, Student</p><p>Learning&nbsp;<strong>Kubernetes</strong>&nbsp;is essential for any DevOps professional. DevOps engineers are always in demand. Currently, the average Silicon Valley salary for a DevOps engineer is 20% higher than what a software engineer makes. <strong>DevOps engineers make an average of $140,000 to $200,000 annually.&nbsp;</strong>And One of the most in-demand skills is&nbsp;<strong>Kubernetes Administration.</strong></p><p>Kubernetes is an open-source system for automating deployment, scaling, and management of containerized applications. It was originally designed by Google and is now maintained by the Cloud Native Computing Foundation.<br>&nbsp;</p><p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Simplify Complex Technology</strong></p><p><strong>Kubernetes</strong>&nbsp;is at the cutting-edge of application deployment. To elevate your DevOps career, learn how to effectively deploy applications on Kubernetes.</p><p>This course helps you gain the knowledge required to design and deploy cloud-native applications on a <strong>Kubernetes </strong>cluster.&nbsp; A series of well-designed lectures with animation and illustrations help you understand complex concepts easily.</p>', '03122022165248maxresdefault (4).jpg', '2022-12-03 22:52:48', NULL, 'JP', 7, 1),
(15, 'Thousands Dollars Saving on Taxes Today - USA Focused Course', '(US Focused Course) Taxes can be Saved only through learning the Tax Law. 1000s of Pages of Tax Code Simplified', '<ul><li>Use Child Care to reduce your Tax Bill</li><li>Use your Educational cost to reduce your tax bill</li><li>Use your investment in Alternative Energy to reduce your tax bill</li><li>Use Children College Cost to reduce your tax bill</li><li>Many other Laws to reduce tax bills</li><li>Students will have a better understanding of Tax code and Tax credits</li><li>Students will be able to learn the Tax code &amp; Reduce taxes legally.</li><li>Students will be able to Reduce Tax bill &amp; Enjoy Life to the full</li></ul>', '<p><strong>Hear why this is one of the TOP-NOTCH Tax Saving Course&nbsp;on Udemy:</strong></p><p>I learned a lot of cool things about taxes with this course. Some of it I already know about but the stuff I didn\'t know is really helpful.</p><p><strong>-Wendy Aston</strong></p><p>Awesome course</p><p><strong>-Steve</strong></p><p><i><strong>TOP-NOTCH</strong>&nbsp;<strong>Instructor</strong></i></p><p>I currently have <strong>64&nbsp;Courses</strong> with <strong>17280+ Minutes</strong> of Content&nbsp;(<strong>286&nbsp;hours in total</strong>) with <strong>60,000+ Satisfied&nbsp;Students </strong>enrolled.&nbsp;That’s <strong>11+&nbsp;days</strong>&nbsp;of learning material!</p><p><strong>Tax Saving Course Details:</strong></p><p><i><strong>1000+&nbsp;Satisfied Students and Counting.</strong></i></p><p><i>29 skill Packed Lectures.</i></p><p><i>Now&nbsp;Tax Dollars stay in your pocket.</i></p><p><i>With 30 days refund guarantee.</i></p><p>US Focused Course</p><p><strong>This Course Covers US Tax Laws only.</strong></p><p><strong>Do you know you are paying far higher taxes.</strong></p><p>Why?</p><p>Because you don\'t&nbsp;know how to apply for&nbsp;<strong>Tax Credits.</strong></p><p><strong>What is Tax Credits?</strong></p><p>All Tax Laws mentions Points to Reduce Taxes on Certain Disclosures.</p><p>As the Tax Law contains Thousands of Pages therefore the Regular Citizen Doesn\'t know about them &amp; Therefore Cannot claim them (Due to No Knowledge).</p><p><i>This Tax Saving Course comes with a 30 day money back guarantee.</i></p>', '03122022165416Saving-Money-versus-Investing-Money-Portfolio-58a76d173df78c345be4211c.jpg', '2022-12-03 22:54:16', NULL, 'FR', 7, 139),
(17, 'Complete C# Unity Game Developer 2D', 'Learn Unity in C# & Code Your First Five 2D Video Games for Web, Mac & PC. The Tutorials Cover Tilemap', '<ul><li>Learn C#, a powerful modern language, from scratch. No prior programming experience is necessary.</li><li>Become excellent at using the Unity game engine.</li><li>Build a solid foundation for game design and game development that will help you build your own games.</li><li>Learn how object oriented programming works in practice.</li><li>Create playable game projects - good for your portfolio, or just for your own sense of achievement.</li><li>Transfer your knowledge from this course to .NET, other languages, and more.</li><li>Develop highly transferable coding problem solving skills.</li><li>Be part of an amazing and supportive community of people similar to you.</li></ul>', '<p><strong>The course has recently been remastered in Unity 2021.1.</strong></p><p>This course started as a <strong>runaway&nbsp;success on Kickstarter</strong> and has gone on to become the most popular and most watched&nbsp;Unity game development course on Udemy<strong>. </strong>The course has full&nbsp;<strong>English closed-captions throughout</strong>.</p><p>Learn how to create video games using Unity, the world-leading&nbsp;free-to-use game development tool. <strong>We start super simple </strong>so you need no prior experience of&nbsp;Unity or&nbsp;coding! With our online tutorials, you\'ll be amazed what you can achieve right from the first moment you start the course.&nbsp;</p><p>Benefit from our <strong>world-class support </strong>from both other students, and the GameDevtv team who are regularly engaged in the&nbsp;forums and Q&amp;A section. Go on to build several games including:</p><p>Snow Boarder: A simple <strong>Side-Scrolling jumping game </strong>using Unity\'s sprite shape tool</p><p>Laser Defender:&nbsp;A <strong>Top-Down Space Shooter </strong>with enemies to shoot and dodge;</p><p>TileVania: A fast-paced classic <strong>Side-Scrolling&nbsp;Platformer </strong>using Unity\'s Tilemap tool;</p><p>Quiz Master: A <strong>Quiz Game </strong>that focuses on learning how to set up user interface in Unity.</p><p>Prefer to start with 3D&nbsp;games? Check-out our sister course, the Complete C# Unity Developer 3D. Already have some Unity knowledge, and want something more challenging? Check-out our epic RPG Core Combat Creator. More interested in creating 3D models from scratch? Start with our <i>Complete Blender Creator</i> course. <strong>Our green leaf logo is a symbol of passion and quality.</strong></p><p>You will have access to a course forum where you can discuss topics on a course-wide basis, or down to the individual video. Get plugged into our communities of amazing developers on Facebook (nearly 20k), in our own TA-curated Community (17k views/day), and our student chat group (10k live at any one time). Check out our reviews to see how people love this feature.&nbsp;</p><p>The course is <strong>project-based</strong> as we believe this is the best way to learn Unity and C#. You will not just be learning dry programming concepts, but applying them immediately to real indie games as you go. All the project files will be included, as well as additional references and resources - you\'ll never get stuck. There are talking-head videos, powerful diagrams, quality screencasts and more.&nbsp;</p><p>Oh, and it\'s just <strong>bigger and better </strong>than other Unity courses you will find online. See the course&nbsp;length and the reviews.&nbsp;</p><p>For each demo game you build you will follow this process...&nbsp;</p><p>Be challenged to build the entire game yourself.</p><p>Be shown step-by step how to build it.</p><p>Be challenged to apply, and re-apply your knowledge regularly.</p>', '03122022165900download.png', '2022-12-03 22:59:00', NULL, 'VIE', 8, 5),
(18, 'The Complete Cryptocurrency Course: More than 5 Courses in 1', 'Learn everything you need to know about cryptocurrency and blockchain, including investing, mining and much more!', '<ul><li>Upon completion of this course, students will be able to invest, mine, trade and thoroughly understand cryptocurrencies</li><li>Understand what makes a great cryptocurrency as a great long term investment</li><li>Understand what are the biggest mistakes new investors make in cryptocurrencies?</li><li>Know how to watch out for scams and managing risk</li><li>Learn tools to be able to identify the next great cryptocurrency (what to look for &amp; watch out for)</li></ul>', '<p><strong>24&nbsp;Hour Comprehensive&nbsp;COMPLETE Cryptocurrency Course!&nbsp;I guarantee that this is THE&nbsp;most thorough&nbsp;cryptocurrency&nbsp;course&nbsp;available ANYWHERE on the market -&nbsp;&nbsp;or your money back&nbsp;(30 day money back guarantee).&nbsp;This course and the many exercises in this course are for beginner&nbsp;or advanced users in any country!</strong><br><strong>&gt;140,000 students have taken this course.</strong></p><p>By an Award Winning MBA professor who is a top selling online business teacher,&nbsp;top selling author, former Goldman Sachs employee, Columbia MBA (finance major)&nbsp;and&nbsp;venture capitalist who has invested in and sat on the boards of&nbsp;cryptocurrency companies since 2013 and a hedge fund industry veteran and founder. He is also the author of the #1 best selling business course on Udemy.&nbsp;</p><p><strong>THIS COMPLETE CRYPTOCURRENCY&nbsp;COURSE is 5+ courses in 1!&nbsp; &nbsp; &nbsp;</strong></p><p><strong>Cryptocurrency&nbsp;Investing</strong></p><p><strong>Cryptocurrency Mining</strong></p><p><strong>Cryptocurrency Wallets&nbsp;</strong></p><p><strong>Cryptocurrency Exchanges</strong></p><p><strong>Blockchain</strong></p><p><strong>Creating a Diversified Portfolio &amp; Much More!</strong></p><p>Also included in this course is a very comprehensive Excel spreadsheet that contains more than 30 Cryptocurrency exercises to help you learn everything you need to know about cryptocurrencies (whether you are a beginner or an advanced user). No prior cryptocurrency or&nbsp;finance or accounting or tech or&nbsp;Excel experience is required&nbsp;to take this course.&nbsp;</p>', '03122022170022maxresdefault (5).jpg', '2022-12-03 23:00:22', NULL, 'JP', 8, 1);
INSERT INTO `course` (`course_id`, `course_name`, `course_title`, `course_target`, `course_description`, `course_img`, `start_date`, `updated_date`, `language_id`, `user_id`, `sub_topic_id`) VALUES
(19, 'Illustrator 2022 MasterClass', 'Master Adobe Illustrator with this in-depth training for all levels.', '<ul><li>Designing logos</li><li>Creating vector illustrations</li><li>Turning photographs into vector artwork</li><li>Vectorizing and colorizing traced hand drawings</li><li>Preparing graphics for web and print</li><li>Designing infographics</li><li>Working with type in creative ways</li><li>Mastering advanced Illustrator tools and techniques</li><li>Learn useful keyboard shortcuts and best practices</li><li>Practice everything you learn with provided Exercise Files</li></ul>', '<p><strong>Udemy’s best-selling Illustrator course</strong> – by one of the Top 10 Adobe Instructors in the world – teaches you to use this industry-leading vector graphic application as a creative professional. The whole course content, including examples, techniques, exercises and quizzes have been carefully selected and refined to offer the most efficient and enjoyable way to master Adobe Illustrator.</p><p>This course has been purposely designed for users of all experiences, from complete beginners to existing Illustrator users, who want to take their skills to the next level. Being able to confidently work in Illustrator is an essential skill for any Graphic Designer or Illustrator, but it is an equally useful tool for Product Designers, Fashion Designers, UI/UX designers and various other areas within and outside of the creative industry.<br>&nbsp;</p><p><i>“The course has great content, well explained and having you feeling confident with the software at the end.”</i><br><i>James Pope</i><br>&nbsp;</p><p><strong>More about Adobe Illustrator:</strong></p><p>Illustrator is the industry-standard vector graphics application that lets you create logos, icons, sketches, typography and complex illustrations for print, web, interactive, video and mobile devices.</p><p>Its time saving features allow users to create work quickly and efficiently at the highest professional standard. &nbsp;</p>', '03122022170236Illustrator-2022-MasterClass-H.jpg', '2022-12-03 23:02:36', NULL, 'VIE', 8, 163),
(20, 'Excel Essentials for the Real World (Complete Excel Course)', 'Microsoft Excel Beginner to Professional. Includes Pivot Tables, Power Query, NEW Formulas... (Excel 365, 2019 & 2016)', '<ul><li>Master the ESSENTIAL Excel formulas and features to accelerate your career</li><li>Learn Excel from scratch or fill in the gaps to become immediately confident</li><li>Learn to use Pivot Tables, Pivot Charts, Slicers and Time Lines for Interactive Excel Reports</li><li>Hacks and hidden Excel features from a Microsoft MVP with 15+ years of Experience</li><li>Explore the potential of Power Query. You\'ll be surprised at what you achieve with a bit of Power Query knowledge.</li><li>Get lifetime access to a proven and state-of-the-art Excel course including challenges, quizzes &amp; exercises</li><li>Learn what\'s new in Excel for Microsoft 365 and how these changes impact the way you use Excel</li><li>Updated to include the new FILTER, XLOOKUP, SORT &amp; UNIQUE functions</li></ul>', '<p><strong>Looking to learn Microsoft Excel and improve your data analysis skills but don\'t know where to start?</strong></p><p><strong>OR, you\'ve been using Microsoft Excel for a while but don\'t feel 100% confident?</strong></p><p>There is so much information out there. What do you need to succeed at work?</p><p>I’ve picked out the <strong>Excel Essential skills a Data Analyst needs </strong>and packaged them in a structured course.</p><p>In fact, I collected the most common Excel problems faced by my clients. I added in my 15+ years\' experience in finance and project management. I included all the hidden tips and tricks I came to learn as an Excel MVP and put it ALL in THIS course. I also made sure it covers the absolute Excel beginners.</p><p>These <strong>practical, real-world examples</strong> help you understand the full potential of each feature. You\'ll learn how to use Excel for quick and <strong>painless data analysis</strong>.</p><p>There are many helpful and time-saving Excel formulas and features. We tend to forget what these are if we don\'t use them. This <strong>Microsoft Excel Essentials Course</strong> will give you the practice you need to be able to apply the best solution for the task at hand. This way you can <strong>do more in less time</strong>.</p><p>________________________________________________</p><p><strong>WHY&nbsp;TAKE&nbsp;THIS&nbsp;SPECIFIC&nbsp;EXCEL COURSE?</strong></p><p>Yes. There are many Microsoft Excel courses out there teaching you the important Excel functions and features you need to master.</p><p><strong>BUT, can you apply what you learnt to your own files?</strong></p><p><strong>Do you get enough practice and challenges to remember all the new information?</strong></p><p>This course will get you confident and comfortable designing simple to complex spreadsheets.&nbsp; You\'ll go beyond Excel basics. As you go through the course, you\'ll be able to apply what you learnt immediately to your job.</p><p>You\'ll master new formulas and find better ways to setup your existing spreadsheets. Management loves efficiency.</p><p>In this course you\'ll solve dozens of practical real-world examples. They\'ll help you think outside the box so you can work smarter not harder.</p>', '03122022170441maxresdefault (6).jpg', '2022-12-03 23:04:41', NULL, 'FR', 8, 89);

-- --------------------------------------------------------

--
-- Table structure for table `course_rate`
--

CREATE TABLE `course_rate` (
  `course_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_rate`
--

INSERT INTO `course_rate` (`course_id`, `content`, `rate`, `created_date`, `user_id`) VALUES
(1, 'TUyet', 5, '2022-12-06 19:49:20', 1),
(1, NULL, 4, '2022-12-06 20:53:55', 3),
(1, NULL, 2, '2022-12-06 20:54:03', 4),
(11, NULL, 5, '2022-12-06 21:08:08', 2),
(11, 'WOW', 3, '2022-12-06 20:57:28', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `course_id` int(11) NOT NULL,
  `process` float(3,1) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`course_id`, `process`, `user_id`) VALUES
(1, 0.8, 1),
(1, 0.5, 4),
(3, 0.3, 1),
(4, 0.0, 1),
(9, 0.0, 1),
(10, 0.0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` char(10) NOT NULL,
  `language_name` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`) VALUES
('VIE', ' Vietnamese'),
('ENG', 'English'),
('FR', 'French'),
('JP', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lecture_id` int(11) NOT NULL,
  `lecture_title` varchar(200) DEFAULT NULL,
  `lecture_duration` float(4,2) DEFAULT NULL,
  `lecture_video` varchar(150) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `assignment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lecture_id`, `lecture_title`, `lecture_duration`, `lecture_video`, `chapter_id`, `assignment`) VALUES
(1, 'About the instructor', 3.35, '04122022204143START HERE.mp4', 1, 'https://leetcode.com/problems/minimum-average-difference/'),
(2, 'Goals: what we will make by the end of the day', 14.59, '04122022204232[Interactive Coding Exercise] Love Calculator.mp4', 1, 'https://leetcode.com/problems/minimum-average-difference/'),
(3, '[Interactive Coding Exercise] Variables', 14.59, '05122022101124[Interactive Coding Exercise] Love Calculator.mp4', 2, 'https://leetcode.com/problems/minimum-average-difference/'),
(4, 'Multiple return values', 1.19, '05122022101213Share and Show off your Project!.mp4', 3, 'https://leetcode.com/problems/minimum-average-difference/'),
(5, '2. Goals: what we will make by the end of the day', 7.75, '05122022101357[Interactive Coding Exercise] BMI 2.0.mp4', 9, 'https://leetcode.com/problems/minimum-average-difference/'),
(6, 'Multiple return values', 7.75, '05122022101409[Interactive Coding Exercise] BMI 2.0.mp4', 9, 'https://leetcode.com/problems/minimum-average-difference/'),
(7, '1. About the instructor 2989', 3.35, '05122022101428START HERE.mp4', 10, 'https://leetcode.com/problems/minimum-average-difference/'),
(8, '1. About the instructor', 7.75, '05122022101513[Interactive Coding Exercise] BMI 2.0.mp4', 13, 'https://leetcode.com/problems/minimum-average-difference/'),
(9, 'Multiple return values', 14.59, '05122022101535[Interactive Coding Exercise] Love Calculator.mp4', 13, 'https://leetcode.com/problems/minimum-average-difference/');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_comment`
--

CREATE TABLE `lecture_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `parent_comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `lecture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'STUDENT'),
(2, 'TEACHER');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Web Development', 1),
(2, 'Data Science', 1),
(3, 'Mobile Development', 1),
(4, 'Programming Languages', 1),
(5, 'Game Development', 1),
(6, 'Cryptocurrency & Blockchain', 2),
(7, 'Accounting & Bookeeping', 2),
(8, 'Other Finance & Accounting', 2),
(9, 'Operating Systems & Severs', 3),
(10, 'IT Certifications', 3),
(11, 'Hardware', 3),
(12, 'Other IT & Software', 3),
(13, 'Microsoft', 4),
(14, 'Apple', 4),
(15, 'Google', 4),
(16, 'Other Office Productivity', 4),
(17, 'Web Design', 5),
(18, 'Graphic Design & Illustration', 5),
(19, 'Design Tools', 5),
(20, 'Other Design', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_topic`
--

CREATE TABLE `subcategory_topic` (
  `sub_topic_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory_topic`
--

INSERT INTO `subcategory_topic` (`sub_topic_id`, `subcategory_id`, `topic_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(14, 2, 13),
(15, 2, 14),
(16, 2, 15),
(17, 2, 16),
(18, 3, 17),
(19, 3, 18),
(20, 3, 19),
(21, 3, 20),
(22, 3, 21),
(23, 3, 22),
(24, 3, 23),
(25, 3, 24),
(26, 3, 25),
(33, 4, 1),
(31, 4, 2),
(28, 4, 9),
(29, 4, 31),
(30, 4, 33),
(36, 4, 47),
(35, 4, 48),
(34, 4, 49),
(32, 4, 51),
(40, 5, 33),
(41, 5, 51),
(37, 5, 53),
(38, 5, 54),
(39, 5, 55),
(42, 5, 61),
(43, 5, 62),
(44, 5, 63),
(45, 6, 64),
(46, 6, 65),
(47, 6, 66),
(48, 6, 67),
(50, 6, 68),
(51, 6, 69),
(52, 6, 70),
(53, 6, 71),
(54, 7, 91),
(55, 7, 92),
(56, 7, 93),
(57, 7, 94),
(58, 7, 95),
(59, 7, 96),
(60, 7, 97),
(61, 7, 98),
(62, 8, 66),
(63, 8, 71),
(71, 8, 91),
(68, 8, 93),
(64, 8, 151),
(65, 8, 152),
(66, 8, 153),
(67, 8, 154),
(72, 9, 72),
(77, 9, 73),
(79, 9, 74),
(74, 9, 176),
(75, 9, 177),
(76, 9, 178),
(73, 9, 179),
(78, 9, 180),
(102, 9, 255),
(84, 10, 75),
(87, 10, 76),
(86, 10, 77),
(80, 10, 202),
(81, 10, 203),
(82, 10, 204),
(83, 10, 205),
(85, 10, 206),
(90, 11, 79),
(88, 11, 215),
(89, 11, 216),
(91, 11, 217),
(92, 11, 218),
(93, 11, 219),
(94, 11, 220),
(95, 11, 221),
(97, 12, 9),
(98, 12, 10),
(100, 12, 80),
(103, 12, 81),
(96, 12, 252),
(99, 12, 253),
(101, 12, 254),
(104, 12, 256),
(111, 13, 11),
(107, 13, 84),
(105, 13, 272),
(106, 13, 273),
(108, 13, 274),
(109, 13, 275),
(110, 13, 276),
(112, 13, 277),
(113, 14, 278),
(114, 14, 279),
(115, 14, 280),
(116, 14, 281),
(118, 14, 282),
(121, 14, 283),
(117, 14, 441),
(120, 14, 442),
(122, 15, 82),
(126, 15, 83),
(123, 15, 299),
(124, 15, 300),
(125, 15, 301),
(127, 15, 302),
(128, 15, 303),
(129, 15, 304),
(132, 16, 9),
(133, 16, 84),
(138, 16, 85),
(130, 16, 322),
(131, 16, 323),
(134, 16, 325),
(135, 16, 326),
(136, 16, 327),
(139, 16, 328),
(142, 17, 3),
(145, 17, 338),
(140, 17, 367),
(141, 17, 368),
(143, 17, 369),
(144, 17, 370),
(146, 17, 371),
(147, 17, 372),
(154, 18, 89),
(148, 18, 337),
(149, 18, 338),
(150, 18, 339),
(151, 18, 340),
(153, 18, 341),
(155, 18, 342),
(156, 18, 343),
(159, 19, 86),
(160, 19, 87),
(158, 19, 328),
(157, 19, 338),
(162, 19, 339),
(161, 19, 403),
(163, 19, 404),
(164, 19, 405),
(166, 20, 79),
(172, 20, 88),
(169, 20, 89),
(168, 20, 340),
(165, 20, 436),
(167, 20, 437),
(170, 20, 438),
(171, 20, 439),
(173, 20, 440);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`) VALUES
(62, '2D Game Development'),
(90, '3D Game Development'),
(91, 'Accounting'),
(178, 'Active Directory'),
(339, 'Adobe Illustrator'),
(403, 'Adobe Premiere'),
(372, 'Adobe XD'),
(216, 'Adruno'),
(87, 'After Effects'),
(254, 'Algorithms'),
(75, 'Amazon AWS'),
(19, 'Android Development'),
(4, 'Angular'),
(280, 'Apple Keynote'),
(281, 'Apple Products Basics'),
(13, 'Artificial Intelligence'),
(328, 'AutoCAD'),
(202, 'AWS Certification'),
(205, 'AWS Certified Cloud Practitioner'),
(204, 'AWS Certified Solutions Architect-Associate'),
(67, 'Binance'),
(68, 'Bitcoin'),
(65, 'Blockchain'),
(92, 'Bookkeeping'),
(48, 'C (programming language)'),
(33, 'C#'),
(51, 'C++'),
(341, 'Canva'),
(221, 'Cell Phone Repair'),
(436, 'Character Design'),
(206, 'Cisco CCNA'),
(439, 'Comic Book Creation'),
(77, 'CompTIA Security+'),
(326, 'Computer Skills'),
(85, 'Construcion Estimation'),
(64, 'Cryptocurrency'),
(3, 'CSS'),
(22, 'Dart (programming language)'),
(11, 'Data Analysis'),
(70, 'Day Trading'),
(12, 'Deep Learning'),
(343, 'Design Theoy'),
(252, 'DevOps'),
(405, 'Digital Art'),
(89, 'Digital Painting'),
(8, 'Django'),
(80, 'Docker'),
(340, 'Drawing'),
(79, 'Electronics'),
(220, 'Embedded C'),
(218, 'Embedded Systems'),
(272, 'Excel'),
(274, 'Excel Formulas and Functions'),
(273, 'Excel VBA'),
(93, 'Finance Fundamentals'),
(154, 'Financial Planning'),
(55, 'Game Development Fundamentals'),
(440, 'Geometric Dimensioning and Tolerancing (GD&T)'),
(49, 'Go (programming language)'),
(302, 'Google Apps Script'),
(301, 'Google Data Studio'),
(303, 'Google Docs'),
(83, 'Google Drive'),
(17, 'Google Flutter'),
(300, 'Google Looker'),
(82, 'Google Sheets'),
(304, 'Google Slides'),
(299, 'Google Workspace (G Suite)'),
(337, 'Graphic Design'),
(370, 'HTML'),
(7, 'HTML5'),
(95, 'IFRS'),
(278, 'iMovie'),
(342, 'InDesign'),
(152, 'Insurance'),
(18, 'iOS Development'),
(31, 'Java'),
(1, 'JavaScript'),
(23, 'Kotlin'),
(253, 'Kubernetes'),
(72, 'Linux'),
(179, 'Linux Administration'),
(180, 'Linux Command Line'),
(279, 'Mac Basics'),
(442, 'Mac Pages'),
(10, 'Machine Learning'),
(441, 'macOS'),
(69, 'Metaverse'),
(217, 'Microcontroller'),
(81, 'Microservices'),
(76, 'Microsoft AZ-900'),
(203, 'Microsoft Certification'),
(275, 'Microsoft Office'),
(283, 'Microsoft Office 365'),
(324, 'Microsoft Power'),
(84, 'Microsoft Power BI'),
(277, 'Microsoft Word'),
(367, 'Mobile App Design'),
(25, 'Mobile App Development'),
(63, 'Mobile Game Development'),
(16, 'Natural Language Processing'),
(66, 'NFT (Non-Fungible Tokens)'),
(6, 'Node.Js'),
(282, 'Number For Mac'),
(437, 'PCB Design'),
(151, 'Personal Fince'),
(88, 'Perspective Drawing'),
(338, 'Photoshop'),
(215, 'PLC'),
(276, 'PowerPoint'),
(73, 'PowerShell'),
(86, 'Procreate Digital Illustrator App'),
(325, 'Programming Fundamentals'),
(9, 'Python'),
(327, 'Python Scripting'),
(94, 'QuickBooks Online'),
(14, 'R (programming language)'),
(2, 'React'),
(21, 'React Native'),
(78, 'REspberry'),
(219, 'REspberry Pi'),
(96, 'SAP FICO'),
(323, 'ServiceNow'),
(177, 'Shell Scripting'),
(404, 'SOLIDWORKS'),
(47, 'Spring Framework'),
(256, 'SQL'),
(15, 'Statistics'),
(71, 'Stock Trading'),
(20, 'Swift'),
(24, 'SwiftUI'),
(438, 'System Design Interview'),
(98, 'TallyPrime (Tally.ERP)'),
(153, 'Technical Analysis (finance)'),
(255, 'Terraform'),
(5, 'TypeScript'),
(322, 'Typing'),
(97, 'Uniform CPA Examination'),
(53, 'Unity'),
(54, 'Unreal Engine'),
(61, 'Unreal Engine Blueprints'),
(369, 'User Interface'),
(74, 'VMware Vsphere'),
(371, 'Web Development'),
(176, 'Windows Sever'),
(368, 'WordPress');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `real_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` char(12) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `role_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `real_name`, `password`, `email`, `phone_number`, `avatar`, `role_id`) VALUES
(1, 'Nguyễn Thái Châu', 'chauden11', 'chaunguyenit999@gmail.com', '0988891325', '05122022171856chau.jpg', 1),
(2, 'Hà Trung Hiếu', 'hieu123', 'hieu2k3@gmail.com', '123456789', NULL, 1),
(3, 'Chu Tiến Sơn', 'son123', 'son2k3@gmail.com', '868666888', NULL, 1),
(4, 'Nguyễn Sỹ Long', 'longdz123', 'longns2003@gmail.com', '978158939', NULL, 1),
(5, 'Nguyễn Hoàng Long', 'longnh84', 'longnh84@gmail.com', '0916666384', '0512202217302605122022145755ths.nguyenhoanglong.jpg', 2),
(6, 'Lê Hồng Anh', 'honganhhumg', 'honganhhumg@gmail.com', '0868668868', NULL, 2),
(7, 'Hoàng Anh Đức', 'hoanganhduchumg', 'hoanganhduchumg@gmail.com', '09886554953', NULL, 2),
(8, 'Lê Văn Hưng', 'levanhunghumg', 'levanhunghumg@gmail.com', '0858585558', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sub_topic_id` (`sub_topic_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `course_rate`
--
ALTER TABLE `course_rate`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`),
  ADD UNIQUE KEY `language_name` (`language_name`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lecture_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `lecture_comment`
--
ALTER TABLE `lecture_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `lecture_id` (`lecture_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent_comment_id` (`parent_comment_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD UNIQUE KEY `subcategory_name` (`subcategory_name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `subcategory_topic`
--
ALTER TABLE `subcategory_topic`
  ADD PRIMARY KEY (`sub_topic_id`),
  ADD UNIQUE KEY `SUBCATEGORY_TOPIC_index_0` (`subcategory_id`,`topic_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `topic_name` (`topic_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lecture_comment`
--
ALTER TABLE `lecture_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subcategory_topic`
--
ALTER TABLE `subcategory_topic`
  MODIFY `sub_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`sub_topic_id`) REFERENCES `subcategory_topic` (`sub_topic_id`),
  ADD CONSTRAINT `course_ibfk_4` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`);

--
-- Constraints for table `course_rate`
--
ALTER TABLE `course_rate`
  ADD CONSTRAINT `course_rate_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_rate_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_student_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`);

--
-- Constraints for table `lecture_comment`
--
ALTER TABLE `lecture_comment`
  ADD CONSTRAINT `lecture_comment_ibfk_1` FOREIGN KEY (`lecture_id`) REFERENCES `lecture` (`lecture_id`),
  ADD CONSTRAINT `lecture_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `lecture_comment_ibfk_3` FOREIGN KEY (`parent_comment_id`) REFERENCES `lecture_comment` (`comment_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `subcategory_topic`
--
ALTER TABLE `subcategory_topic`
  ADD CONSTRAINT `subcategory_topic_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `subcategory_topic_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
