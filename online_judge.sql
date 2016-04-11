-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2016 at 10:50 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_judge`
--

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `problemId` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `testfile` varchar(255) NOT NULL,
  `timelimit` varchar(255) NOT NULL,
  `memory` varchar(255) NOT NULL,
  `problemCode` varchar(1024) NOT NULL,
  `input` longtext NOT NULL,
  `output` longtext NOT NULL,
  `explanation` longtext NOT NULL,
  `problem_stmt` longtext NOT NULL,
  `title_of_problem` varchar(1024) NOT NULL,
  `score` int(11) NOT NULL,
  `Sha1` varchar(50) NOT NULL,
  `Permissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`problemId`, `author`, `testfile`, `timelimit`, `memory`, `problemCode`, `input`, `output`, `explanation`, `problem_stmt`, `title_of_problem`, `score`, `Sha1`, `Permissions`) VALUES
(1, 'Aakash Rana', '', '1 sec', '256kb', 'LBL', 'The first line contains T, the number of test cases. The next T lines contain a single number N, the \r\n\r\nnumber of light bulbs.', 'Find the distance you need to travel.', 'Constraints\r\n\r\n1<=T<=10\r\n\r\n1 <= N <= 10^5\r\n\r\nSample Input\r\n\r\n2\r\n\r\n3\r\n\r\n4\r\n\r\nSample Output\r\n\r\n5\r\n\r\n9\r\n\r\nExplanation\r\n\r\nIn the first test case, you are at bulb number 1 initially. You go to bulb number 3 and turn it on. \r\n\r\nThen, you come back to bulb number 1 to turn it on. Then, you go to bulb number 2, and turn it \r\n\r\non. You have to travel 5 unit of distance for this.\r\n\r\nIn the second test case, you are at bulb number 1 initially. You go to bulb number 4 and turn it on. \r\n\r\nThen, you come back to bulb number 1 to turn it on. Then, you go to bulb number 3, and turn it on \r\n\r\nand then to bulb number 2. You have to travel 9 unit of distance for this.', 'There are N light bulbs in a straight line numbered from 1 to N. You are standing at light bulb\r\n\r\nnumbered 1. All bulbs are initially off. Now, you want to brighten the room. You go to the highest \r\n\r\nnumbered off light bulb and turn it on. Then you walk back to lowest numbered off bulb and turn it \r\n\r\non. Again you walk to the highest numbered light bulb which is off and turn it on. You repeat this \r\n\r\nprocess until all light bulbs are on. The distance between consecutive light bulbs is 1 unit. Find the \r\n\r\ndistance you need to walk.', 'Light Bulbs', 100, '', 0),
(2, 'Sriyansh', '', '1 sec', '256kb', 'DAD', 'First line T, the number of testcases. Each testcase consists of M, N and K in one line.', 'For each testcase, print required probability in scientific notation as defined follows: \r\n\r\nOutput should be of the form "x y" where x is a floating point integer less than 10 and greater than \r\n\r\nor equal to 1and y is a integer. This notation is equivalent to x * 10-y. x should be rounded and \r\n\r\noutput till 3 decimal digits. \r\n\r\nHowever, if probability is 0, output "0.000 0".', 'Examples: If output is supposed to be 0.0034567, output should be "3.457 3". \r\n\r\nIf output is supposed to be 0.3034567, output should be "3.034 1".\r\n\r\nConstraints \r\n\r\n1 <= T <= 10 \r\n\r\n1 <= N, M <= 50 \r\n\r\n1 <= K <= 10000\r\n\r\nSample Input\r\n\r\n2\r\n\r\n1 5 2\r\n\r\n2 3 2\r\n\r\nSample Output\r\n\r\n2.000 1\r\n\r\n1.111 1', 'Dude rolls a N faced die M times. He adds all the numbers he gets on all throws. What is the \r\n\r\nprobability that he has a sum of K.\r\n\r\nA N faced die has all numbers from 1 to N written on it and each has equal probability of arriving \r\n\r\nwhen dice is thrown.', 'Dude and Dice', 100, '', 0),
(3, 'Aakash Rana', '', '1sec', '256Kb', 'IC', 'The first line contains two integers, n and m (1<=n,m<=500) — the number of rows and columns in \r\n\r\nthe cave description.\r\n\r\nEach of the next n lines describes the initial state of the level of the cave, each line consists \r\n\r\nof m characters "." (that is, intact ice) and "X" (cracked ice).\r\n\r\nThe next line contains two integers, r1 and c1 (1<=r[1]<=n,1<=c[1]<=m) — your initial coordinates. It is \r\n\r\nguaranteed that the description of the cave contains character ''X'' in cell (r[1],c[1]), that is, the ice on \r\n\r\nthe starting cell is initially cracked.\r\n\r\nThe next line contains two integers r2 and c2 (1<=r[2]<=n,1<=c[2]<=m) — the coordinates of the cell \r\n\r\nthrough which you need to fall. The final cell may coincide with the starting one.', 'If you can reach the destination, print ''YES'', otherwise print ''NO''.', 'Sample Input\r\n\r\n4 6\r\n\r\nX…XX\r\n\r\n…XX.\r\n\r\n.X..X.\r\n\r\n……\r\n\r\n1 6\r\n\r\n2 2\r\n\r\nSample Output\r\n\r\nYES', 'You play a computer game. Your character stands on some level of a multilevel ice cave. In order \r\n\r\nto move on forward, you need to descend one level lower and the only way to do this is to fall \r\n\r\nthrough the ice. The level of the cave where you are is a rectangular square grid of n rows \r\n\r\nand m columns. Each cell consists either from intact or from cracked ice. From each cell you can \r\n\r\nmove to cells that are side-adjacent with yours (due to some limitations of the game engine you \r\n\r\ncannot make jumps on the same place, i.e. jump from a cell to itself). If you move to the cell with \r\n\r\ncracked ice, then your character falls down through it and if you move to the cell with intact ice, \r\n\r\nthen the ice on this cell becomes cracked.\r\n\r\nLet''s number the rows with integers from 1 to n from top to bottom and the columns with integers \r\n\r\nfrom 1 to m from left to right. Let''s denote a cell on the intersection of the r-th row and the c-th \r\n\r\ncolumn as (r,c).\r\n\r\nYou are staying in the cell (r[1],c[1]) and this cell is cracked because you''ve just fallen here from a \r\n\r\nhigher level. You need to fall down through the cell (r[2],c[2]) since the exit to the next level is there. \r\n\r\nCan you do this?', 'Ice Cave', 100, '', 0),
(4, 'Rajan', '', '1sec', '256kb', 'DAM', 'Input starts with one line containing T, the number of test cases.\r\n\r\nFor each test case, only one line is given which represents N.', 'Print minimum possible sum and matrix.', 'Sample Input\r\n\r\n1\r\n\r\n3\r\n\r\nSample output\r\n\r\n5\r\n\r\n1 1 1 1 1\r\n\r\n2 2 2 2 2\r\n\r\n2 2 2 3 3\r\n\r\n4 4 4 4 4\r\n\r\n(Clearly, this is not valid output, just for reference )\r\n\r\nInput Output \r\n\r\n1     1\r\n\r\n2     7\r\n\r\n3     22\r\n\r\n4     50\r\n\r\n5     95\r\n\r\n6     161\r\n\r\n7     252\r\n\r\n8     372\r\n\r\n9     525\r\n\r\n10    715 \r\n', 'Dude has to travel 20 hours long journey in train to reach at Chennai. So he decided to annoy his \r\n\r\nteam mates.\r\n\r\nHe Made N x N Matrix and asked his team mates Kala and Aakash to fill this matrix with below \r\n\r\nconstraints.\r\n\r\n1. Use numbers from 1 to N and each no. must present at least once.\r\n\r\n2.   The frequency of all numbers must be distinct and odd.\r\n\r\n3.   All the same numbers must be contiguous in sequence. (Think like snake in Matrix )\r\n\r\n4.  Sum of all N*N elements must be minimum possible.\r\n\r\nExample : Here green sequence is valid while red is not. See Figure in pdf', 'Dude and Matrix', 100, '', 0),
(5, 'Dude', '', '1sec', '256kb', 'DAA', 'The only line contains two integers n,?k (1??', 'Print the only integer a — the remainder after dividing the value of the sum by the value 109?+?7.\r\n', 'Sample test(s)\r\n\r\ni/p: 4 1\r\n\r\no/p: 10\r\n\r\ni/p: 4 2\r\n\r\no/p: 30\r\n\r\ni/p: 4 3\r\n\r\no/p: 100\r\n\r\ni/p: 4 0\r\n\r\no/p: 4', 'Please Read the pdf for this question', 'Dude and sums', 100, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `subId` int(11) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `timestamp` int(40) NOT NULL,
  `verdict` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `problemId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`subId`, `fileName`, `userId`, `timestamp`, `verdict`, `language`, `problemId`) VALUES
(63, 'Swastik_TEAM11455859826', 'Swastik_TEAM', 1455859826, 'Y', '.cpp', '1'),
(64, 'Milan_TEAM11455860114', 'Milan_TEAM', 1455860114, 'Y', '.cpp', '1'),
(65, 'Gurvinder_TEAM11455860366', 'Gurvinder_TEAM', 1455860366, 'Y', '.cpp', '1'),
(66, 'Jinay_TEAM11455860419', 'Jinay_TEAM', 1455860419, 'Y', '.c', '1'),
(67, 'Swastik_TEAM11455860442', 'Swastik_TEAM', 1455860442, 'N', '.c', '1'),
(68, 'Rishikesh_TEAM11455860469', 'Rishikesh_TEAM', 1455860469, 'Y', '.cpp', '1'),
(69, 'Aanghi_TEAM11455860516', 'Aanghi_TEAM', 1455860516, 'Y', '.cpp', '1'),
(70, 'Swastik_TEAM11455860642', 'Swastik_TEAM', 1455860642, 'N', '.cpp', '1'),
(71, 'Meet_TEAM11455860870', 'Meet_TEAM', 1455860870, 'Y', '.cpp', '1'),
(72, 'Aradhya_TEAM11455861174', 'Aradhya_TEAM', 1455861174, 'N', '.cpp', '1'),
(73, 'Sohail_TEAM11455861546', 'Sohail_TEAM', 1455861546, 'Y', '.cpp', '1'),
(74, 'Aradhya_TEAM51455861983', 'Aradhya_TEAM', 1455861983, 'Y', '.cpp', '5'),
(75, 'Milan_TEAM11455862533', 'Milan_TEAM', 1455862533, 'Y', '.cpp', '1'),
(76, 'Aradhya_TEAM11455862542', 'Aradhya_TEAM', 1455862542, 'Y', '.cpp', '1'),
(77, 'Priyank_TEAM11455862839', 'Priyank_TEAM', 1455862839, 'Y', '.c', '1'),
(78, 'Meet_TEAM51455863156', 'Meet_TEAM', 1455863156, 'N', '.cpp', '5'),
(79, 'Meet_TEAM51455863362', 'Meet_TEAM', 1455863362, 'Y', '.cpp', '5'),
(81, 'Gulshan_TEAM11455863500', 'Gulshan_TEAM', 1455863500, 'Y', '.cpp', '1'),
(82, 'Sohail_TEAM11455863589', 'Sohail_TEAM', 1455863589, 'N', '.cpp', '1'),
(83, 'Meet_TEAM51455863668', 'Meet_TEAM', 1455863668, 'N', '.cpp', '5'),
(84, 'Sohail_TEAM11455863709', 'Sohail_TEAM', 1455863709, 'N', '.cpp', '1'),
(85, 'Rishikesh_TEAM51455863725', 'Rishikesh_TEAM', 1455863725, 'Y', '.cpp', '5'),
(86, 'Meet_TEAM51455864015', 'Meet_TEAM', 1455864015, 'N', '.cpp', '5'),
(87, 'Meet_TEAM51455864324', 'Meet_TEAM', 1455864324, 'Y', '.cpp', '5'),
(88, 'Gurvinder_TEAM21455864345', 'Gurvinder_TEAM', 1455864345, 'Y', '.cpp', '2'),
(89, 'Aanghi_TEAM41455864658', 'Aanghi_TEAM', 1455864658, 'N', '.cpp', '4'),
(90, 'Gurvinder_TEAM41455865116', 'Gurvinder_TEAM', 1455865116, 'Y', '.cpp', '4'),
(91, 'Swastik_TEAM21455865468', 'Swastik_TEAM', 1455865468, 'Y', '.cpp', '2'),
(92, 'Aanghi_TEAM41455865903', 'Aanghi_TEAM', 1455865903, 'N', '.cpp', '4'),
(93, 'Aanghi_TEAM41455866134', 'Aanghi_TEAM', 1455866134, 'N', '.cpp', '4'),
(94, 'Milan_TEAM11455866201', 'Milan_TEAM', 1455866201, 'N', '.c', '1'),
(95, 'Milan_TEAM51455866334', 'Milan_TEAM', 1455866334, 'Y', '.cpp', '5'),
(96, 'Jinay_TEAM31455866515', 'Jinay_TEAM', 1455866515, 'Y', '.cpp', '3'),
(97, 'Gulshan_TEAM41455866545', 'Gulshan_TEAM', 1455866545, 'Y', '.c', '4'),
(98, 'Milan_TEAM21455866818', 'Milan_TEAM', 1455866818, 'Y', '.cpp', '2'),
(99, 'Jinay_TEAM51455867145', 'Jinay_TEAM', 1455867145, 'Y', '.cpp', '5'),
(100, 'Gurvinder_TEAM31455867318', 'Gurvinder_TEAM', 1455867318, 'Y', '.cpp', '3'),
(101, 'Gulshan_TEAM31455868385', 'Gulshan_TEAM', 1455868385, 'Y', '.c', '3'),
(102, 'admin11456120552', 'admin', 1456120552, 'N', '.cpp', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `loggedIn` varchar(255) NOT NULL DEFAULT 'N',
  `Ip` varchar(255) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `current_score` int(11) NOT NULL DEFAULT '0',
  `total_time` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `pass`, `loggedIn`, `Ip`, `year`, `current_score`, `total_time`) VALUES
('7', 'Aanghi_TEAM', 'dsauhua', 'Y', '172.16.2.61', 2, 100, 0),
('0', 'admin', 'admin', 'Y', '::1', 3, 0, 0),
('10', 'Aradhya_TEAM', 'aasdas', 'Y', '172.16.2.75', 2, 200, 0),
('11', 'Gulshan_TEAM', 'hgytr', 'Y', '172.16.2.68', 3, 200, 0),
('1', 'Gurvinder_TEAM', 'fwfces', 'Y', '172.16.2.69', 3, 500, 0),
('5', 'Jinay_TEAM', 'sadasd', 'Y', '172.16.2.54', 2, 300, 0),
('8', 'Meet_TEAM', 'dsdsud', 'N', '', 2, 200, 0),
('2', 'Milan_TEAM', 'swecfeg', 'Y', '172.16.2.81', 2, 300, 0),
('9', 'Priyank_TEAM', 'dada', 'Y', '172.16.2.115', 2, 100, 0),
('6', 'Rishikesh_TEAM', 'fefeew', 'Y', '172.16.2.57', 2, 200, 0),
('3', 'Sohail_TEAM', 'afewewc', 'Y', '::1', 2, 100, 0),
('4', 'Swastik_TEAM', 'mkjjh', 'Y', '172.16.2.78', 3, 550, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`problemId`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`subId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `problemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
