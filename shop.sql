-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 11:55 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `email` varchar(225) NOT NULL,
  `pword` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL,
  `adress1` varchar(225) NOT NULL,
  `adress2` varchar(225) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_keywords` text NOT NULL,
  `blog_description` text NOT NULL,
  `headline` varchar(255) NOT NULL,
  `blog_content` text NOT NULL,
  `date_published` int(11) NOT NULL,
  `author` varchar(65) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_url`, `blog_title`, `blog_keywords`, `blog_description`, `headline`, `blog_content`, `date_published`, `author`, `picture`) VALUES
(1, 'Html-51-Relaesed', 'Html 5.1 Relaesed', 'html, development', 'Html 5.1 Relaesed', '', '<p>\r\n\r\n</p><h2>Abstract</h2><div><p>This specification defines the 5th major version, first minor revision of the core language of the World Wide Web: the Hypertext Markup Language (HTML). In this version, new features continue to be introduced to help Web application authors, new elements continue to be introduced based on research into prevailing authoring practices, and special attention continues to be given to defining clear conformance criteria for user agents in an effort to improve interoperability.</p></div><h2>Status of this document</h2><div><p><em>This section describes the status of this document at the time of its publication. Other documents may supersede this document. A list of current W3C publications and the latest revision of this technical report can be found in the <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.w3.org/TR/\">W3C technical reports index</a> at <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.w3.org/TR/\">https://www.w3.org/TR/</a>.</em></p><p>Errata for this document are <a target=\"_blank\" rel=\"nofollow\" href=\"https://github.com/w3c/html/issues\">recorded as issues</a>. The <a target=\"_blank\" rel=\"nofollow\" href=\"https://w3c.github.io/html/\">latest HTML editors\' draft</a> shows the current proposed resolution of errata <i>in situ</i>.</p><p>All interested parties are invited to provide implementation and bug reports and other comments through the Working Group\'s <a target=\"_blank\" rel=\"nofollow\" href=\"https://github.com/w3c/html\">Issue tracker</a>. These will generally be considered in the development of HTML 5.2.</p><p>The <a target=\"_blank\" rel=\"nofollow\" href=\"https://w3c.github.io/test-results/html51/implementation-report.html\">implementation report</a> produced for this version demonstrates that in almost every case changes are matched by interoperable implementation.</p><p>The Working Group aims to produce an HTML 5.2 Recommendation in late 2017 that would obsolete this Recommendation.</p><p>This document was published by the <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.w3.org/WebPlatform/WG/\">Web Platform Working Group</a> as a Recommendation. Feedback and comments on this specification are welcome. Please use <a target=\"_blank\" rel=\"nofollow\" href=\"https://github.com/w3c/html/issues\">Github issues</a>. Historical discussions can be found in the <a target=\"_blank\" rel=\"nofollow\" href=\"https://lists.w3.org/Archives/Public/public-html/\">public-html@w3.org archives</a>.</p></div>\r\n\r\n<br><p></p>', 1506834000, 'Developer', '21727988_1426405214095947_5656239064154726379_n.jpg'),
(2, 'Lets-Play', 'Let\'s Play', 'play, blog', 'Let\'s Play', '', '<p>\r\n\r\nA <b>Let\'s Play</b> (commonly referred to as an <b>LP</b>) is a style of video series documenting the playthrough of a <a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Video_game\">video game</a>, usually including commentary by the <a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Gamer\">gamer</a>.<a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Let\'s_Play#cite_note-1\">[1]</a> A Let\'s Play differs from a <a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Video_game_walkthrough\">video game walkthrough</a> or <a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Strategy_guide\">strategy guide</a> by focusing on an individual\'s subjective experience with the game, often with humorous, irreverent, or critical commentary from the gamer, rather than being an objective source of information on how to progress through the game.<a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Let\'s_Play#cite_note-2\">[2]</a> While Let\'s Plays and <a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Live_media\">live streaming</a> of game playthroughs are related, Let\'s Plays tend to be curated experiences that include editing and scripted narration, while streaming is an unedited experience performed on the fly.<a target=\"_blank\" rel=\"nofollow\" href=\"https://en.wikipedia.org/wiki/Let\'s_Play#cite_note-3\">[3]</a>\r\n\r\n<br></p>', 1509080400, 'Eslam', '1-600x3001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(120) NOT NULL,
  `cat_desc` text NOT NULL,
  `img` varchar(225) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arrange` int(11) NOT NULL,
  `type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_title`, `cat_desc`, `img`, `date`, `arrange`, `type`) VALUES
(1, 'Barware', 'Barware', '', '2017-09-18 11:22:35', 1, 'men'),
(2, 'Flowers', 'Flowers', '', '2017-09-18 11:22:35', 2, 'men'),
(3, 'Gift Baskets', 'Gift Baskets', '', '2017-09-18 11:22:35', 3, 'men'),
(4, 'Gourmet Foods ', 'Gourmet Foods ', '', '2017-09-18 11:22:35', 4, 'men'),
(5, 'Host & Hostess Gifts', 'Host & Hostess Gifts', '', '2017-09-18 11:22:35', 5, 'men'),
(6, 'Jewelry', 'Jewelry', '', '2017-09-18 11:23:40', 6, 'men'),
(7, 'Kitchenware', 'Kitchenware', '', '2017-09-18 11:23:40', 7, 'men'),
(8, 'Personalized Gifts', 'Personalized Gifts', '', '2017-09-18 11:23:40', 8, 'men'),
(9, 'Barware', 'Barware', '', '2017-09-18 11:22:35', 1, 'women');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('g3vj2jjik8g5b1lpanqvs607dlkcm0fm', '::1', 1509341173, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334313137323b),
('1v7seek0npev1ob6pn5uhb30c0bd7b56', '::1', 1509341175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334313137353b),
('v0kk48gso5l1cjnl2br4sq84sr572o96', '::1', 1509341200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334313230303b),
('joh0dtkf93t1la8mj8k5hq84caupt9bu', '::1', 1509341203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334313230333b),
('gm5v5h7v80dpg2enmkcudao35oof9g6h', '::1', 1509341531, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334313533313b),
('53bb5lfnhdbbdks7b5175bh795247o6l', '::1', 1509342170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334313930363b),
('v2q961nmvj618dmko5vevun2bsfa5ohf', '::1', 1509342456, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334323232393b6974656d7c733a39323a223c64697620636c6173733d22616c65727420616c6572742d64616e67657222207374796c653d22636f6c6f723a236630302220726f6c653d22616c657274223e43617274204669656c642049732052657175697265643c2f6469763e223b5f5f63695f766172737c613a313a7b733a343a226974656d223b733a333a226f6c64223b7d),
('c5glsvkpo188hrppbt4ji5l8libc074s', '::1', 1509343770, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334333438313b),
('3u1arrmj9u3t6mn8q7shvbhkilk2alb4', '::1', 1509343858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334333832313b),
('7i3hra052okv3nbv39bckg568a0i601l', '::1', 1509344288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334343236353b),
('as12hv4755e0i2p57ju39jkrl8gchc23', '::1', 1509347048, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334363736313b),
('mmid6bt3k7dt32uphqfda2n1sfr29lcm', '::1', 1509347387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334373038373b),
('4kqmgol7q7lln2j79t65g61ini5t9655', '::1', 1509347704, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334373430373b),
('6vo2ekfnkn8k5qa69daouclmv1vau5e7', '::1', 1509347905, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334373734303b),
('rbd0oavthfb7evfgop5a4sbdnisurj63', '::1', 1509348412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334383133353b),
('4fouif9cvuepo3vtgqqe4dccntqk0pqu', '::1', 1509348747, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334383436393b),
('5n112qgal0d5uh6kv1jdm1vvdqapbhc5', '::1', 1509349128, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334383930323b),
('j347ns5hnpangv3febpmcm1haqit4nlm', '::1', 1509349252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334393233383b),
('smff3hevhpnv09fg9spmns3ipsffgf06', '::1', 1509349937, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393334393736313b),
('h03dj6pnn1ofglh4b8pdhdi83ct8kl2n', '::1', 1509487731, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393438373435313b69735f61646d696e7c733a313a2231223b757365725f69647c733a313a2231223b),
('ch030h86h51d46qls8u06mk44vppaul8', '::1', 1509488295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393438383236363b69735f61646d696e7c733a313a2231223b),
('cmvli0bhkk4d792r2qmkak9cki7fl0kh', '::1', 1509489142, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393438393134323b),
('fqbvhjr24k47fj2fqeh6kg9j896che5s', '::1', 1509564677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393536343433303b),
('pt4gf20rjve4o664dbit9j3vhaf5d7cm', '::1', 1509564654, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393536343532343b69735f61646d696e7c733a313a2231223b),
('itkcjdjl3lclfcpt46h0c8j09jcb0o7n', '::1', 1509565505, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393536353436303b69735f61646d696e7c733a313a2231223b),
('canvn6o31qlqifsd4vjb1pleu0r1idck', '::1', 1509567429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393536373431383b69735f61646d696e7c733a313a2231223b),
('v7dk83ee5vibos67tae3oi7jt7hmh02g', '::1', 1509690986, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393639303733303b),
('tmlt52v2eomsg9015isd010f44ncio4v', '::1', 1509705511, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393730353530393b),
('qnfkc7lb1li9n26uc5duudqc6rca8m7l', '::1', 1509706472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393730363436353b),
('kq10idoukm1leab9pidffhblf1sttbuv', '::1', 1509707482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393730373233383b),
('pcb8353rhdp267dj21qrgs4235dc86os', '::1', 1509707797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393730373630303b),
('sbbdufl9ef98i8i3spn7vgaj8q1ucoqs', '::1', 1509707994, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393730373938393b),
('r41fgvn5d3gbe5pcc56b3gaqq50f0hnk', '::1', 1509709547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393730393238363b),
('k2ss69cf4fuagle0853vp88n7m8tklav', '::1', 1509709961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393730393831333b),
('ae9kdbir41dsti57d7u7d9bqume6e9rj', '::1', 1509710539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731303339323b),
('olpdhgjtc5aa949bjvb8cf54l9sjhdot', '::1', 1509711191, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731303839313b),
('26tftsb1813ub41fffoda7h038i85269', '::1', 1509711320, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731313139333b),
('k6lh9jcem7l0vqql0ri8onq30ujsmc2a', '::1', 1509711502, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731313334303b),
('k6qqegqd3jpqfrrd7hqqdt6fnc13kedo', '::1', 1509711523, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731313530393b),
('mffhu6rhfuqm995p7u6epg3dv7c153ml', '::1', 1509713858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731333631393b),
('3jftc8824q7vdstt4q5hebdukn9h31ag', '::1', 1509714217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731333932353b),
('36sav9ggrdqtf1nk6oemqctj52mrocvu', '::1', 1509714705, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731343530313b),
('f07ob19gm81f3v2m0knk1sp02a31fumf', '::1', 1509715552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393731353331333b757365725f69647c733a313a2231223b),
('ne4oh2dg8oai377mrhb938d6lr7b2itu', '::1', 1509844194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393834333936323b),
('enekone7j7fj8lgtcmotm2oajtq5q1om', '::1', 1509844538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393834343236343b),
('ncm7695kcf2sn2l4d6a38ljr9pukav02', '::1', 1509844914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393834343635313b),
('kv8ich8oddvnir4osdvon0srtll09051', '::1', 1509845094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393834343938323b),
('imc3bukenaisp15ukm1h4cmdtlpm0kor', '::1', 1509870673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393837303637313b),
('nop97fgljb3ua2r7ppoak24rsoauhmvr', '::1', 1509870715, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393837303731353b),
('f3bfb55d49ab21f86a48840de15486df329e86b2', '::1', 1510097163, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303039373136323b),
('fb08cf1c707b762de17920d7472db0a867c9f869', '::1', 1510219894, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303231393839323b),
('vg8kl97heaansrt2g8kgjibe61qdu8md', '::1', 1511214858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313231343835363b);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `opened` int(1) NOT NULL,
  `code` varchar(120) NOT NULL,
  `urgent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `date_created`, `sent_to`, `sent_by`, `subject`, `message`, `opened`, `code`, `urgent`) VALUES
(1, 1508488939, 0, 1, 'PHP DEVELOPER', 'Hello Dear,\r\nI Hope Your Fine', 1, 'GkRGkg', 0),
(2, 1508488939, 0, 3, 'Android Developer', 'Hello From Another Side', 1, 'o6LHcN', 0),
(3, 1507501248, 1, 0, 'Wordpress Developer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<small></small><br></p>', 1, 'l6o0Uq', 0),
(4, 1508528225, 0, 1, 'First Try', 'First Try', 0, 'nQf7Sf', 0),
(5, 1508528265, 0, 1, 'Second Try', 'Second Try With Urgent', 1, 'OXiFp1', 1),
(6, 1508553693, 0, 1, 'Working!', 'Yeah.. its working', 1, 'aNmUhH', 0),
(8, 1508556680, 1, 0, 'Working!', 'Second Attempt<small></small><br><br>\r\n            -----------------------------------------------------<br>\r\n            Original Message Is Shown Below: \r\n            <br><br>\r\n            Yeah.. its working', 1, '8XFxGy', 0),
(10, 1508612021, 0, 1, 'Working!', 'sdfsdfsdf\r\n            ---------------------------------\r\n            Second Attempt\r\n            \r\n            \r\n            -----------------------------------------------------\r\n            \r\n            Original Message Is Shown Below: \r\n            \r\n            \r\n            \r\n            Yeah.. its working', 1, 'CXVh4V', 0),
(11, 1508612123, 1, 0, 'Working!', 'What?<br><br>\r\n            -----------------------------------------------------<br>\r\n            Original Message Is Shown Below: \r\n            <br><br>\r\n            sdfsdfsdf\r\n            ---------------------------------\r\n            Second Attempt\r\n            \r\n            \r\n            -----------------------------------------------------\r\n            \r\n            Original Message Is Shown Below: \r\n            \r\n            \r\n            \r\n            Yeah.. its working', 1, 'WrQBcR', 0),
(12, 1508612154, 0, 1, 'Working!', 'sorry in mass wrong\r\n            ---------------------------------\r\n            What?\r\n            \r\n            \r\n            -----------------------------------------------------\r\n            \r\n            Original Message Is Shown Below: \r\n            \r\n            \r\n            \r\n            sdfsdfsdf\r\n            ---------------------------------\r\n            Second Attempt\r\n            \r\n            \r\n            -----------------------------------------------------\r\n            \r\n            Original Message Is Shown Below: \r\n            \r\n            \r\n            \r\n            Yeah.. its working', 1, 'n4E3Rn', 0),
(13, 1508612214, 1, 0, 'Working!', 'Don\'t Worry :D<br><br>\r\n            -----------------------------------------------------<br>\r\n            Original Message Is Shown Below: \r\n            <br><br>\r\n            sorry in mass wrong\r\n            ---------------------------------\r\n            What?\r\n            \r\n            \r\n            -----------------------------------------------------\r\n            \r\n            Original Message Is Shown Below: \r\n            \r\n            \r\n            \r\n            sdfsdfsdf\r\n            ---------------------------------\r\n            Second Attempt\r\n            \r\n            \r\n            -----------------------------------------------------\r\n            \r\n            Original Message Is Shown Below: \r\n            \r\n            \r\n            \r\n            Yeah.. its working', 1, 'HhDBJJ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `homepage_blocks`
--

CREATE TABLE `homepage_blocks` (
  `id` int(11) NOT NULL,
  `block_title` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_blocks`
--

INSERT INTO `homepage_blocks` (`id`, `block_title`, `priority`) VALUES
(3, 'The New Block', 1),
(4, 'Second Block', 2),
(5, 'Third Block', 3),
(6, 'Fourth Block', 4),
(7, 'Five Block', 5);

-- --------------------------------------------------------

--
-- Table structure for table `homepage_offers`
--

CREATE TABLE `homepage_offers` (
  `id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_offers`
--

INSERT INTO `homepage_offers` (`id`, `block_id`, `item_id`) VALUES
(3, 3, 4),
(4, 3, 5),
(5, 3, 6),
(6, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `item_stores`
--

CREATE TABLE `item_stores` (
  `id` int(11) NOT NULL,
  `title_item` varchar(225) NOT NULL,
  `url_item` varchar(225) NOT NULL,
  `price_item` decimal(7,0) NOT NULL,
  `describtion_item` text NOT NULL,
  `big_img` varchar(225) NOT NULL,
  `small_img` varchar(225) NOT NULL,
  `was_price` decimal(7,0) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stores`
--

INSERT INTO `item_stores` (`id`, `title_item`, `url_item`, `price_item`, `describtion_item`, `big_img`, `small_img`, `was_price`, `status`) VALUES
(3, 'Fender American Deluxe Dimension Bass V in Root Beer', 'Fender-American-Deluxe-Dimension-Bass-V-in-Root-Beer', '1440', 'The Fender American Deluxe Dimension Bass V in Root Beer is a spectacular guitar.  This guitar features a stunning rosewood fretboard and a spectacular basswood body. The guitar has 24 frets which makes it perfect for soft rock. Invented in 1969, this flagship Fender guitar has been rocking the world since before Moses parted the red sea! The Fender American Deluxe Dimension Bass V in Root Beer made its first appearance during The Isle of Wight Festival when Steve Vai took to the stage and made the audience run for the hills with a rendition of Wake Me Up Before You Go-Go.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '4.jpg', '4.jpg', '0', 1),
(4, 'Fender American Deluxe Dimension Bass IV HH RW in Violin Burst', 'Fender-American-Deluxe-Dimension-Bass-IV-HH-RW-in-Violin-Burst', '1529', 'The Fender American Deluxe Dimension Bass IV HH RW in Violin Burst is a full sounding guitar.  This guitar features a stunning rosewood fretboard and a rocker\'s basswood body. The guitar has 24 frets which makes it perfect for soft rock. Invented in 1900, this flagship Fender guitar has been rocking the world since before New Kids On The Block changed their name to The Beatles! The Fender American Deluxe Dimension Bass IV HH RW in Violin Burst made its first appearance during Live AID when BB King took to the stage and left the audience begging for more with a rendition of Stairway to Heaven.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '5.jpg', '5.jpg', '0', 1),
(5, 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', 'Fender-American-Deluxe-Strat-Plus-HSS-in-Metallic-3-Tone-Sunburst', '1419', 'The Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst is a special guitar.  This guitar features a stunning maple fretboard and a full sounding high grade alder body body. The guitar has 22 frets which makes it perfect for cheesy 80s rock music. Invented in 1914, this flagship Fender guitar has been rocking the world since before The Dead Sea was just sick! The Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst made its first appearance during Live AID when Angus Young took to the stage and made the audience ecstatic with a rendition of I\'m a Barbie Girl In A Barbie World.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '6.jpg', '6.jpg', '0', 1),
(6, 'Fender Jimi Hendrix Strat in Black', 'Fender-Jimi-Hendrix-Strat-in-Black', '649', 'The Fender Jimi Hendrix Strat in Black is a shredder\'s guitar.  This guitar features a stunning maple fretboard and a very interesting basswood body. The guitar has 24 frets which makes it perfect for blues. Invented in 1916, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender Jimi Hendrix Strat in Black made its first appearance during Top Of The Pops when Eric Clapton took to the stage and blew the roof off with a rendition of I\'ll do it but only if Frank says \'it\'s okay\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '7.jpg', '7.jpg', '0', 1),
(7, 'Fender CD-60 Acoustic Guitar Starter Pack in Natural', 'Fender-CD-60-Acoustic-Guitar-Starter-Pack-in-Natural', '139', 'The Fender CD-60 Acoustic Guitar Starter Pack in Natural is a rocker\'s guitar.  This guitar features a high grade rosewood fretboard and a rocker\'s basswood body. The guitar has 22 frets which makes it perfect for soft rock. Invented in 1902, this flagship Fender guitar has been rocking the world since before The Dead Sea was just sick! The Fender CD-60 Acoustic Guitar Starter Pack in Natural made its first appearance during Live AID when Chuck Berry took to the stage and left the audience begging for more with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '8.jpg', '8.jpg', '0', 1),
(8, 'Fender Japan FSR Classic 69 Telecaster Pink Paisley', 'Fender-Japan-FSR-Classic-69-Telecaster-Pink-Paisley', '901', 'The Fender Japan FSR Classic 69 Telecaster Pink Paisley is a full sounding guitar.  This guitar features a high grade rosewood fretboard and a very interesting high grade alder body body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1919, this flagship Fender guitar has been rocking the world since before high button shoes were in style! The Fender Japan FSR Classic 69 Telecaster Pink Paisley made its first appearance during The Ed Sullivan Show when BB King took to the stage and shocked the audience into a state of paralysis with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '9.jpg', '9.jpg', '0', 1),
(9, 'Fender Japan FSR Classic 69 Telecaster in Blue Flower', 'Fender-Japan-FSR-Classic-69-Telecaster-in-Blue-Flower', '901', 'The Fender Japan FSR Classic 69 Telecaster in Blue Flower is a shredder\'s guitar.  This guitar features a high grade rosewood fretboard and a special high grade alder body body. The guitar has 24 frets which makes it perfect for heavy rock. Invented in 1991, this flagship Fender guitar has been rocking the world since before all social security numbers had two digits! The Fender Japan FSR Classic 69 Telecaster in Blue Flower made its first appearance during Woodstock when Jimmy Page took to the stage and make the entire audience weep with a rendition of Wake Me Up Before You Go-Go.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '10.jpg', '10.jpg', '0', 1),
(10, 'Fender FSR USA Pro Stratocaster HSS in Black', 'Fender-FSR-USA-Pro-Stratocaster-HSS-in-Black', '863', 'The Fender FSR USA Pro Stratocaster HSS in Black is a rare guitar.  This guitar features a stunning rosewood fretboard and a high value guitar at a low end price high grade alder body body. The guitar has 24 frets which makes it perfect for cheesy 80s rock music. Invented in 1923, this flagship Fender guitar has been rocking the world since before rainbows were only available in black and white! The Fender FSR USA Pro Stratocaster HSS in Black made its first appearance during Glasonbury when Brian May took to the stage and made the audience ecstatic with a rendition of Donald Where\'s Yur Troosers.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '11.jpg', '11.jpg', '0', 1),
(11, 'Fender FSR Deluxe Telecaster in Butterscotch Blonde', 'Fender-FSR-Deluxe-Telecaster-in-Butterscotch-Blonde', '507', 'The Fender FSR Deluxe Telecaster in Butterscotch Blonde is a special guitar.  This guitar features a stunning rosewood fretboard and a rocker\'s basswood body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1966, this flagship Fender guitar has been rocking the world since before a t-rex was a legitimate family pet! The Fender FSR Deluxe Telecaster in Butterscotch Blonde made its first appearance during Live AID when BB King took to the stage and bored the crowd to tears with a rendition of Wake Me Up Before You Go-Go.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '12.jpg', '12.jpg', '0', 1),
(12, 'Fender FSR American Vintage 70s Strat in Black', 'Fender-FSR-American-Vintage-70s-Strat-in-Black', '749', 'The Fender FSR American Vintage 70s Strat in Black is a spectacular guitar.  This guitar features a high grade maple fretboard and a rocker\'s high grade alder body body. The guitar has 22 frets which makes it perfect for country. Invented in 1908, this flagship Fender guitar has been rocking the world since before Yoda\'s parents was holding interviews for the position of \'baby sitter\'! The Fender FSR American Vintage 70s Strat in Black made its first appearance during Glasonbury when Joe Satriani took to the stage and cleared the floor with a rendition of You\'re A Naughy One, Saucy Jack.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '13.jpg', '13.jpg', '0', 1),
(13, 'Fender Coronado Guitar in 3 Colour Sunburst', 'Fender-Coronado-Guitar-in-3-Colour-Sunburst', '499', 'The Fender Coronado Guitar in 3 Colour Sunburst is a shredder\'s guitar.  This guitar features a stunning rosewood fretboard and a rocker\'s high grade alder body body. The guitar has 22 frets which makes it perfect for soft rock. Invented in 1975, this flagship Fender guitar has been rocking the world since before New Kids On The Block changed their name to The Beatles! The Fender Coronado Guitar in 3 Colour Sunburst made its first appearance during The Isle of Wight Festival when Angus Young took to the stage and cleared the floor with a rendition of I\'m a Barbie Girl In A Barbie World.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '14.jpg', '14.jpg', '0', 1),
(14, 'Fender FSR USA Pro Stratocaster HSS in Olympic White', 'Fender-FSR-USA-Pro-Stratocaster-HSS-in-Olympic-White', '863', 'The Fender FSR USA Pro Stratocaster HSS in Olympic White is a very interesting guitar.  This guitar features a stunning rosewood fretboard and a very interesting basswood body. The guitar has 24 frets which makes it perfect for blues. Invented in 1989, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender FSR USA Pro Stratocaster HSS in Olympic White made its first appearance during Woodstock when BB King took to the stage and left the audience begging for more with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '15.jpg', '15.jpg', '0', 1),
(15, 'Fender FSR Stratocaster in Black with Maple Neck', 'Fender-FSR-Stratocaster-in-Black-with-Maple-Neck', '584', 'The Fender FSR Stratocaster in Black with Maple Neck is a special guitar.  This guitar features a high grade maple fretboard and a rare basswood body. The guitar has 22 frets which makes it perfect for country. Invented in 1955, this flagship Fender guitar has been rocking the world since before rainbows were only available in black and white! The Fender FSR Stratocaster in Black with Maple Neck made its first appearance during The Isle of Wight Festival when Angus Young took to the stage and bored the crowd to tears with a rendition of I\'ll do it but only if Frank says \'it\'s okay\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '16.jpg', '16.jpg', '0', 1),
(16, 'Fender Steve Harris P Bass in West Ham Colours', 'Fender-Steve-Harris-P-Bass-in-West-Ham-Colours', '699', 'The Fender Steve Harris P Bass in West Ham Colours is a shredder\'s guitar.  This guitar features a stunning rosewood fretboard and a full sounding high grade alder body body. The guitar has 22 frets which makes it perfect for rock. Invented in 1990, this flagship Fender guitar has been rocking the world since before Yoda\'s parents was holding interviews for the position of \'baby sitter\'! The Fender Steve Harris P Bass in West Ham Colours made its first appearance during Live AID when BB King took to the stage and cleared the floor with a rendition of Wake Me Up Before You Go-Go.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '17.jpg', '17.jpg', '0', 1),
(17, 'Fender MA1 3/4 Size Steel String Acoustic Guitar', 'Fender-MA1-34-Size-Steel-String-Acoustic-Guitar', '115', 'The Fender MA1 3/4 Size Steel String Acoustic Guitar is a special guitar.  This guitar features a high grade maple fretboard and a rocker\'s basswood body. The guitar has 24 frets which makes it perfect for country. Invented in 1919, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender MA1 3/4 Size Steel String Acoustic Guitar made its first appearance during Top Of The Pops when Chuck Berry took to the stage and made the audience run for the hills with a rendition of Donald Where\'s Yur Troosers.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '18.jpg', '18.jpg', '0', 1),
(18, 'Fender FSR Classic Series 60s Stratocaster in Lilac', 'Fender-FSR-Classic-Series-60s-Stratocaster-in-Lilac', '449', 'The Fender FSR Classic Series 60s Stratocaster in Lilac is a rare guitar.  This guitar features a high grade maple fretboard and a spectacular basswood body. The guitar has 22 frets which makes it perfect for cheesy 80s rock music. Invented in 1924, this flagship Fender guitar has been rocking the world since before rainbows were only available in black and white! The Fender FSR Classic Series 60s Stratocaster in Lilac made its first appearance during Guitar Fest when Brian May took to the stage and blew the roof off with a rendition of Donald Where\'s Yur Troosers.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '19.jpg', '19.jpg', '0', 1),
(19, 'Fender Deluxe Lone Star Stratocaster Guitar in Black', 'Fender-Deluxe-Lone-Star-Stratocaster-Guitar-in-Black', '499', 'The Fender Deluxe Lone Star Stratocaster Guitar in Black is a spectacular guitar.  This guitar features a stunning rosewood fretboard and a shredder\'s high grade alder body body. The guitar has 22 frets which makes it perfect for blues. Invented in 1954, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender Deluxe Lone Star Stratocaster Guitar in Black made its first appearance during Live AID when Brian May took to the stage and made the audience ecstatic with a rendition of I\'ll do it but only if Frank says \'it\'s okay\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '20.jpg', '20.jpg', '0', 1),
(20, 'Fender American Deluxe Dimension Bass IV in Root Beer', 'Fender-American-Deluxe-Dimension-Bass-IV-in-Root-Beer', '799', 'The Fender American Deluxe Dimension Bass IV in Root Beer is a spectacular guitar.  This guitar features a stunning maple fretboard and a high value guitar at a low end price basswood body. The guitar has 24 frets which makes it perfect for heavy rock. Invented in 1935, this flagship Fender guitar has been rocking the world since before all social security numbers had two digits! The Fender American Deluxe Dimension Bass IV in Root Beer made its first appearance during Blue Peter when Jimi Hendrix took to the stage and made the audience ecstatic with a rendition of Tie Me Kangeroo Down.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '21.jpg', '21.jpg', '0', 1),
(21, 'Fender Classic 70s Strat in Black', 'Fender-Classic-70s-Strat-in-Black', '529', 'The Fender Classic 70s Strat in Black is a spectacular guitar.  This guitar features a stunning maple fretboard and a rocker\'s high grade alder body body. The guitar has 24 frets which makes it perfect for rock. Invented in 1929, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender Classic 70s Strat in Black made its first appearance during Guitar Fest when BB King took to the stage and cleared the floor with a rendition of Donald Where\'s Yur Troosers.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '22.jpg', '22.jpg', '0', 1),
(22, 'Fender FSR Classic Player 60s Strat Vegas Gold', 'Fender-FSR-Classic-Player-60s-Strat-Vegas-Gold', '599', 'The Fender FSR Classic Player 60s Strat Vegas Gold is a spectacular guitar.  This guitar features a stunning maple fretboard and a special basswood body. The guitar has 24 frets which makes it perfect for rock. Invented in 1952, this flagship Fender guitar has been rocking the world since before Yoda\'s parents was holding interviews for the position of \'baby sitter\'! The Fender FSR Classic Player 60s Strat Vegas Gold made its first appearance during Top Of The Pops when Nigel Tuffnel took to the stage and left the audience begging for more with a rendition of Wake Me Up Before You Go-Go.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '23.jpg', '23.jpg', '0', 1);
INSERT INTO `item_stores` (`id`, `title_item`, `url_item`, `price_item`, `describtion_item`, `big_img`, `small_img`, `was_price`, `status`) VALUES
(23, 'Fender American Standard HH Telecaster in Ocean Blue Metallic', 'Fender-American-Standard-HH-Telecaster-in-Ocean-Blue-Metallic', '949', 'The Fender American Standard HH Telecaster in Ocean Blue Metallic is a rare guitar.  This guitar features a high grade maple fretboard and a high value guitar at a low end price basswood body. The guitar has 24 frets which makes it perfect for heavy rock. Invented in 1969, this flagship Fender guitar has been rocking the world since before a t-rex was a legitimate family pet! The Fender American Standard HH Telecaster in Ocean Blue Metallic made its first appearance during The Isle of Wight Festival when Jimmy Page took to the stage and left the audience begging for more with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '24.jpg', '24.jpg', '0', 1),
(24, 'Fender American Deluxe Dimension Bass V HH Black', 'Fender-American-Deluxe-Dimension-Bass-V-HH-Black', '999', 'The Fender American Deluxe Dimension Bass V HH Black is a rare guitar.  This guitar features a high grade maple fretboard and a full sounding high grade alder body body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1994, this flagship Fender guitar has been rocking the world since before The Dead Sea was just sick! The Fender American Deluxe Dimension Bass V HH Black made its first appearance during Guitar Fest when Steve Vai took to the stage and left the audience begging for more with a rendition of You\'re A Naughy One, Saucy Jack.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '25.jpg', '25.jpg', '0', 1),
(25, 'Fender American Deluxe Strat Plus HSS in Metallic Black', 'Fender-American-Deluxe-Strat-Plus-HSS-in-Metallic-Black', '999', 'The Fender American Deluxe Strat Plus HSS in Metallic Black is a special guitar.  This guitar features a high grade rosewood fretboard and a high value guitar at a low end price basswood body. The guitar has 24 frets which makes it perfect for blues. Invented in 1913, this flagship Fender guitar has been rocking the world since before the days when Burger King was still a prince! The Fender American Deluxe Strat Plus HSS in Metallic Black made its first appearance during Blue Peter when Steve Vai took to the stage and left the audience begging for more with a rendition of The Camptown Lady.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '26.jpg', '26.jpg', '0', 1),
(26, 'Fender Sonoran 3/4 Mini Acoustic Guitar with bag', 'Fender-Sonoran-34-Mini-Acoustic-Guitar-with-bag', '118', 'The Fender Sonoran 3/4 Mini Acoustic Guitar with bag is a full sounding guitar.  This guitar features a stunning maple fretboard and a rocker\'s high grade alder body body. The guitar has 24 frets which makes it perfect for cheesy 80s rock music. Invented in 1930, this flagship Fender guitar has been rocking the world since before Chuck Norris was a white belt! The Fender Sonoran 3/4 Mini Acoustic Guitar with bag made its first appearance during The Isle of Wight Festival when Angus Young took to the stage and cleared the floor with a rendition of Tie Me Kangeroo Down.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '27.jpg', '27.jpg', '0', 1),
(27, 'Fender CD-60CE Cutaway Electro Acoustic Guitar in Black', 'Fender-CD-60CE-Cutaway-Electro-Acoustic-Guitar-in-Black', '187', 'The Fender CD-60CE Cutaway Electro Acoustic Guitar in Black is a rocker\'s guitar.  This guitar features a stunning rosewood fretboard and a spectacular high grade alder body body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1915, this flagship Fender guitar has been rocking the world since before the days when Burger King was still a prince! The Fender CD-60CE Cutaway Electro Acoustic Guitar in Black made its first appearance during The Ed Sullivan Show when Elvis Costello took to the stage and made the audience run for the hills with a rendition of Wake Me Up Before You Go-Go.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '28.jpg', '28.jpg', '0', 1),
(28, 'Fender FSR Classic Series 50s Stratocaster in Jetstream Blue', 'Fender-FSR-Classic-Series-50s-Stratocaster-in-Jetstream-Blue', '449', 'The Fender FSR Classic Series 50s Stratocaster in Jetstream Blue is a high value guitar at a low end price guitar.  This guitar features a high grade rosewood fretboard and a rare high grade alder body body. The guitar has 24 frets which makes it perfect for country. Invented in 1935, this flagship Fender guitar has been rocking the world since before rainbows were only available in black and white! The Fender FSR Classic Series 50s Stratocaster in Jetstream Blue made its first appearance during Blue Peter when Elvis Costello took to the stage and bored the crowd to tears with a rendition of <i>\'That stomach pain you got ain\'t no indigestion.  That\'s the blues</i>\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '29.jpg', '29.jpg', '0', 1),
(29, 'Fender CD-140SCE Electro Acoustic Guitar in Satin Black', 'Fender-CD-140SCE-Electro-Acoustic-Guitar-in-Satin-Black', '225', 'The Fender CD-140SCE Electro Acoustic Guitar in Satin Black is a rare guitar.  This guitar features a high grade maple fretboard and a very interesting high grade alder body body. The guitar has 24 frets which makes it perfect for blues. Invented in 1957, this flagship Fender guitar has been rocking the world since before rainbows were only available in black and white! The Fender CD-140SCE Electro Acoustic Guitar in Satin Black made its first appearance during Glasonbury when BB King took to the stage and shocked the audience into a state of paralysis with a rendition of Donald Where\'s Yur Troosers.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '30.jpg', '30.jpg', '0', 1),
(30, 'Fender CD-140SCE Electro Acoustic Guitar in Satin Natural', 'Fender-CD-140SCE-Electro-Acoustic-Guitar-in-Satin-Natural', '225', 'The Fender CD-140SCE Electro Acoustic Guitar in Satin Natural is a special guitar.  This guitar features a stunning maple fretboard and a very interesting high grade alder body body. The guitar has 24 frets which makes it perfect for soft rock. Invented in 1902, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender CD-140SCE Electro Acoustic Guitar in Satin Natural made its first appearance during Blue Peter when Nigel Tuffnel took to the stage and blew the roof off with a rendition of <i>\'That stomach pain you got ain\'t no indigestion.  That\'s the blues</i>\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '31.jpg', '31.jpg', '0', 1),
(31, 'Fender CD-140S Natural Solid Top Acoustic Guitar', 'Fender-CD-140S-Natural-Solid-Top-Acoustic-Guitar', '196', 'The Fender CD-140S Natural Solid Top Acoustic Guitar is a rare guitar.  This guitar features a high grade rosewood fretboard and a rare high grade alder body body. The guitar has 22 frets which makes it perfect for soft rock. Invented in 1929, this flagship Fender guitar has been rocking the world since before Chuck Norris was a white belt! The Fender CD-140S Natural Solid Top Acoustic Guitar made its first appearance during Top Of The Pops when Brian May took to the stage and blew the roof off with a rendition of The Camptown Lady.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '32.jpg', '32.jpg', '0', 1),
(32, 'Squier Vintage Modified Bass VI in 3 Colour Sunburst', 'Squier-Vintage-Modified-Bass-VI-in-3-Colour-Sunburst', '360', 'The Squier Vintage Modified Bass VI in 3 Colour Sunburst is a rare guitar.  This guitar features a high grade maple fretboard and a full sounding high grade alder body body. The guitar has 24 frets which makes it perfect for rock. Invented in 1968, this flagship Fender guitar has been rocking the world since before Yoda\'s parents was holding interviews for the position of \'baby sitter\'! The Squier Vintage Modified Bass VI in 3 Colour Sunburst made its first appearance during Live AID when Brian May took to the stage and made the audience run for the hills with a rendition of Somebody Up There Likes Me.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '33.jpg', '33.jpg', '0', 1),
(33, 'Fender CD-60 Acoustic Guitar Starter Pack in Sunburst', 'Fender-CD-60-Acoustic-Guitar-Starter-Pack-in-Sunburst', '139', 'The Fender CD-60 Acoustic Guitar Starter Pack in Sunburst is a special guitar.  This guitar features a stunning maple fretboard and a rare basswood body. The guitar has 24 frets which makes it perfect for cheesy 80s rock music. Invented in 1925, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender CD-60 Acoustic Guitar Starter Pack in Sunburst made its first appearance during The Isle of Wight Festival when BB King took to the stage and made the audience ecstatic with a rendition of <i>\'That stomach pain you got ain\'t no indigestion.  That\'s the blues</i>\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '34.jpg', '34.jpg', '0', 1),
(34, 'Fender Modern Player Telecaster Plus in Honey Burst ', 'Fender-Modern-Player-Telecaster-Plus-in-Honey-Burst', '379', 'The Fender Modern Player Telecaster Plus in Honey Burst  is a spectacular guitar.  This guitar features a high grade rosewood fretboard and a high value guitar at a low end price high grade alder body body. The guitar has 24 frets which makes it perfect for country. Invented in 1972, this flagship Fender guitar has been rocking the world since before the days when Burger King was still a prince! The Fender Modern Player Telecaster Plus in Honey Burst  made its first appearance during Glasonbury when Elvis Costello took to the stage and make the entire audience weep with a rendition of Tie Me Kangeroo Down.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '35.jpg', '35.jpg', '0', 1),
(35, 'Squier Mini Strat in Red', 'Squier-Mini-Strat-in-Red', '105', 'The Squier Mini Strat in Red is a rocker\'s guitar.  This guitar features a stunning rosewood fretboard and a rare high grade alder body body. The guitar has 22 frets which makes it perfect for cheesy 80s rock music. Invented in 1963, this flagship Fender guitar has been rocking the world since before New Kids On The Block changed their name to The Beatles! The Squier Mini Strat in Red made its first appearance during Glasonbury when Angus Young took to the stage and made the audience run for the hills with a rendition of Somebody Up There Likes Me.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '36.jpg', '36.jpg', '0', 1),
(36, 'Fender Classic Player Baja Tele in Blonde with Maple Neck', 'Fender-Classic-Player-Baja-Tele-in-Blonde-with-Maple-Neck', '690', 'The Fender Classic Player Baja Tele in Blonde with Maple Neck is a full sounding guitar.  This guitar features a high grade maple fretboard and a high value guitar at a low end price high grade alder body body. The guitar has 22 frets which makes it perfect for rock. Invented in 1970, this flagship Fender guitar has been rocking the world since before rainbows were only available in black and white! The Fender Classic Player Baja Tele in Blonde with Maple Neck made its first appearance during Top Of The Pops when Brian May took to the stage and made the audience ecstatic with a rendition of The Camptown Lady.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '37.jpg', '37.jpg', '0', 1),
(37, 'Fender Special Run Stratocaster HSS in Candy Red Burst', 'Fender-Special-Run-Stratocaster-HSS-in-Candy-Red-Burst', '527', 'The Fender Special Run Stratocaster HSS in Candy Red Burst is a special guitar.  This guitar features a stunning maple fretboard and a very interesting high grade alder body body. The guitar has 22 frets which makes it perfect for soft rock. Invented in 1904, this flagship Fender guitar has been rocking the world since before The Dead Sea was just sick! The Fender Special Run Stratocaster HSS in Candy Red Burst made its first appearance during Wembley Stadium when Chuck Berry took to the stage and left the audience begging for more with a rendition of Donald Where\'s Yur Troosers.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '38.jpg', '38.jpg', '0', 1),
(38, 'Fender Japan FSR Texas Special Classic 68 Strat 3 Tone Sunburst', 'Fender-Japan-FSR-Texas-Special-Classic-68-Strat-3-Tone-Sunburst', '699', 'The Fender Japan FSR Texas Special Classic 68 Strat 3 Tone Sunburst is a special guitar.  This guitar features a high grade maple fretboard and a rocker\'s basswood body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1952, this flagship Fender guitar has been rocking the world since before New Kids On The Block changed their name to The Beatles! The Fender Japan FSR Texas Special Classic 68 Strat 3 Tone Sunburst made its first appearance during Live AID when Chuck Berry took to the stage and left the audience begging for more with a rendition of I\'ll do it but only if Frank says \'it\'s okay\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '39.jpg', '39.jpg', '0', 1),
(39, 'Fender American Standard Offset Telecaster in 2 Tone Sunburst', 'Fender-American-Standard-Offset-Telecaster-in-2-Tone-Sunburst', '1016', 'The Fender American Standard Offset Telecaster in 2 Tone Sunburst is a very interesting guitar.  This guitar features a stunning rosewood fretboard and a shredder\'s basswood body. The guitar has 22 frets which makes it perfect for country. Invented in 1998, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender American Standard Offset Telecaster in 2 Tone Sunburst made its first appearance during Woodstock when Elvis Costello took to the stage and bored the crowd to tears with a rendition of I\'ll do it but only if Frank says \'it\'s okay\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '40.jpg', '40.jpg', '0', 1),
(40, 'Fender American Special Tele RW in 3 Colour Sunburst', 'Fender-American-Special-Tele-RW-in-3-Colour-Sunburst', '776', 'The Fender American Special Tele RW in 3 Colour Sunburst is a rocker\'s guitar.  This guitar features a stunning maple fretboard and a spectacular high grade alder body body. The guitar has 22 frets which makes it perfect for cheesy 80s rock music. Invented in 1931, this flagship Fender guitar has been rocking the world since before The Dead Sea was just sick! The Fender American Special Tele RW in 3 Colour Sunburst made its first appearance during Wembley Stadium when Eric Clapton took to the stage and make the entire audience weep with a rendition of <i>\'That stomach pain you got ain\'t no indigestion.  That\'s the blues</i>\'.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '41.jpg', '41.jpg', '0', 1),
(41, 'Fender Paramount PM3 000 Cutaway - Standard Natural', 'Fender-Paramount-PM3-000-Cutaway-Standard-Natural', '499', 'The Fender Paramount PM3 000 Cutaway - Standard Natural is a special guitar.  This guitar features a stunning maple fretboard and a high value guitar at a low end price basswood body. The guitar has 22 frets which makes it perfect for soft rock. Invented in 1943, this flagship Fender guitar has been rocking the world since before Chuck Norris was a white belt! The Fender Paramount PM3 000 Cutaway - Standard Natural made its first appearance during Woodstock when Joe Satriani took to the stage and blew the roof off with a rendition of Stairway to Heaven.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '42.jpg', '42.jpg', '0', 1),
(42, 'Fender American Elite Strat HSS Shawbucker MN in Mystic Black', 'Fender-American-Elite-Strat-HSS-Shawbucker-MN-in-Mystic-Black', '1333', 'The Fender American Elite Strat HSS Shawbucker MN in Mystic Black is a spectacular guitar.  This guitar features a stunning rosewood fretboard and a high value guitar at a low end price basswood body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1969, this flagship Fender guitar has been rocking the world since before all social security numbers had two digits! The Fender American Elite Strat HSS Shawbucker MN in Mystic Black made its first appearance during The Ed Sullivan Show when Steve Vai took to the stage and made the audience ecstatic with a rendition of I\'m a Barbie Girl In A Barbie World.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '43.jpg', '43.jpg', '0', 1);
INSERT INTO `item_stores` (`id`, `title_item`, `url_item`, `price_item`, `describtion_item`, `big_img`, `small_img`, `was_price`, `status`) VALUES
(43, 'Fender Jimi Hendrix Strat in Olympic White', 'Fender-Jimi-Hendrix-Strat-in-Olympic-White', '680', 'The Fender Jimi Hendrix Strat in Olympic White is a rare guitar.  This guitar features a stunning rosewood fretboard and a shredder\'s high grade alder body body. The guitar has 24 frets which makes it perfect for soft rock. Invented in 1985, this flagship Fender guitar has been rocking the world since before Moses parted the red sea! The Fender Jimi Hendrix Strat in Olympic White made its first appearance during Woodstock when Jimi Hendrix took to the stage and make the entire audience weep with a rendition of Stairway to Heaven.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '44.jpg', '44.jpg', '0', 1),
(44, 'Fender CD-140S Satin Natural Solid Top Acoustic Guitar', 'Fender-CD-140S-Satin-Natural-Solid-Top-Acoustic-Guitar', '168', 'The Fender CD-140S Satin Natural Solid Top Acoustic Guitar is a rare guitar.  This guitar features a high grade rosewood fretboard and a rocker\'s high grade alder body body. The guitar has 24 frets which makes it perfect for heavy rock. Invented in 1996, this flagship Fender guitar has been rocking the world since before the amount of RAM that your computer has was measured in Roman numerals! The Fender CD-140S Satin Natural Solid Top Acoustic Guitar made its first appearance during Top Of The Pops when Nigel Tuffnel took to the stage and bored the crowd to tears with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '45.jpg', '45.jpg', '0', 1),
(45, 'Fender American Special Strat in Olympic White', 'Fender-American-Special-Strat-in-Olympic-White', '776', 'The Fender American Special Strat in Olympic White is a high value guitar at a low end price guitar.  This guitar features a high grade maple fretboard and a rocker\'s basswood body. The guitar has 24 frets which makes it perfect for rock. Invented in 1912, this flagship Fender guitar has been rocking the world since before a t-rex was a legitimate family pet! The Fender American Special Strat in Olympic White made its first appearance during Glasonbury when Eric Clapton took to the stage and made the audience run for the hills with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '46.jpg', '46.jpg', '0', 1),
(46, 'Fender CD140S All Mahogany Acoustic Guitar', 'Fender-CD140S-All-Mahogany-Acoustic-Guitar', '225', 'The Fender CD140S All Mahogany Acoustic Guitar is a rocker\'s guitar.  This guitar features a high grade rosewood fretboard and a high value guitar at a low end price basswood body. The guitar has 24 frets which makes it perfect for heavy rock. Invented in 1921, this flagship Fender guitar has been rocking the world since before The Dead Sea was just sick! The Fender CD140S All Mahogany Acoustic Guitar made its first appearance during The Ed Sullivan Show when Joe Satriani took to the stage and blew the roof off with a rendition of Tie Me Kangeroo Down.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '47.jpg', '47.jpg', '0', 1),
(47, 'Fender Coronado Guitar in Candy Apple Red', 'Fender-Coronado-Guitar-in-Candy-Apple-Red', '499', 'The Fender Coronado Guitar in Candy Apple Red is a full sounding guitar.  This guitar features a high grade rosewood fretboard and a spectacular basswood body. The guitar has 24 frets which makes it perfect for cheesy 80s rock music. Invented in 1969, this flagship Fender guitar has been rocking the world since before Chuck Norris was a white belt! The Fender Coronado Guitar in Candy Apple Red made its first appearance during The Isle of Wight Festival when Steve Vai took to the stage and blew the roof off with a rendition of Somebody Up There Likes Me.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '48.jpg', '48.jpg', '0', 1),
(48, 'Squier Vintage Modified Jazz Bass V 5 String in Natural ', 'Squier-Vintage-Modified-Jazz-Bass-V-5-String-in-Natural', '340', 'The Squier Vintage Modified Jazz Bass V 5 String in Natural  is a high value guitar at a low end price guitar.  This guitar features a stunning maple fretboard and a spectacular basswood body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1972, this flagship Fender guitar has been rocking the world since before The Dead Sea was just sick! The Squier Vintage Modified Jazz Bass V 5 String in Natural  made its first appearance during Top Of The Pops when Joe Satriani took to the stage and bored the crowd to tears with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '49.jpg', '49.jpg', '0', 1),
(49, 'Squier Vintage Modified Jazz Bass 70s in Natural', 'Squier-Vintage-Modified-Jazz-Bass-70s-in-Natural', '297', 'The Squier Vintage Modified Jazz Bass 70s in Natural is a full sounding guitar.  This guitar features a stunning rosewood fretboard and a rare high grade alder body body. The guitar has 22 frets which makes it perfect for heavy rock. Invented in 1956, this flagship Fender guitar has been rocking the world since before Chuck Norris was a white belt! The Squier Vintage Modified Jazz Bass 70s in Natural made its first appearance during Guitar Fest when Jimi Hendrix took to the stage and made the audience ecstatic with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '50.jpg', '50.jpg', '0', 1),
(50, 'Squier Vintage Modified Jaguar in Olympic White', 'Squier-Vintage-Modified-Jaguar-in-Olympic-White', '316', 'The Squier Vintage Modified Jaguar in Olympic White is a shredder\'s guitar.  This guitar features a high grade rosewood fretboard and a shredder\'s basswood body. The guitar has 22 frets which makes it perfect for blues. Invented in 1920, this flagship Fender guitar has been rocking the world since before New Kids On The Block changed their name to The Beatles! The Squier Vintage Modified Jaguar in Olympic White made its first appearance during The Ed Sullivan Show when Chuck Berry took to the stage and shocked the audience into a state of paralysis with a rendition of I\'m a lumberjack and I\'m okay.\n    \nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id nisi rutrum, volutpat justo ut, hendrerit diam. Aenean consectetur dictum dignissim. Nullam dignissim, libero a fringilla tempor, ex nulla efficitur libero, nec blandit leo lacus sed libero. Ut volutpat tortor aliquet congue tristique. Suspendisse dictum augue quis ante vulputate pulvinar. Quisque nec mi non nisl consequat blandit vel sit amet nisi. Ut non quam faucibus, ullamcorper lacus non, pulvinar diam. Pellentesque posuere nisl ac imperdiet dignissim.\n\nDonec eu diam sit amet velit tempor congue eu malesuada metus. Curabitur a dui vel purus posuere aliquam sed a velit. Aliquam quis tellus eget quam semper tempus. Aliquam urna velit, mattis id ultricies id, malesuada ut neque. Donec in est tellus. In congue mi at mi ornare sollicitudin. Phasellus risus leo, imperdiet non eros ut, suscipit malesuada massa. \n\n\nSed vel vestibulum mauris, sit amet vestibulum metus. Etiam sed urna ultricies, rhoncus risus vitae, mattis turpis. Cras tortor magna, commodo ac mi quis, bibendum efficitur neque. Duis eu justo ut tortor finibus mollis ut in mauris. Aliquam nisi nunc, viverra in est vitae, ornare tincidunt nulla. Morbi pharetra at purus at sollicitudin. Nunc sit amet faucibus metus. Praesent viverra tellus at urna cursus, id mattis felis rutrum. Pellentesque velit magna, blandit ac maximus non, molestie sit amet metus. Vivamus justo risus, euismod in dapibus a, vehicula et purus. Pellentesque suscipit non quam nec imperdiet. Sed pellentesque nec augue a varius. Ut ullamcorper, erat ac rutrum viverra, massa dolor sollicitudin diam, a suscipit tellus odio ac purus. Aenean sit amet ornare tortor.\n    ', '51.jpg', '51.jpg', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_cookie`
--

CREATE TABLE `site_cookie` (
  `id` int(11) NOT NULL,
  `cookie_code` varchar(120) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expiry_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stores_category`
--

CREATE TABLE `stores_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(225) NOT NULL,
  `cat_url` varchar(255) NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `posted_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores_category`
--

INSERT INTO `stores_category` (`id`, `cat_name`, `cat_url`, `cat_parent_id`, `priority`, `posted_info`) VALUES
(1, 'Clothes', 'Clothes', 0, 3, ''),
(2, 'Babies World', 'Babies-World', 3, 2, ''),
(3, 'Mobiles&Tablets', 'MobilesTablets', 0, 1, ''),
(4, 'Samsung Note 8', 'Samsung-Note-8', 3, 1, ''),
(5, 'Samsung ', 'Samsung', 0, 2, ''),
(6, 'Samsung Note J7', 'Samsung-Note-J7', 3, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `store_accounts`
--

CREATE TABLE `store_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `fistname` varchar(120) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `company` varchar(120) NOT NULL,
  `address` varchar(225) NOT NULL,
  `address2` varchar(225) NOT NULL,
  `town` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `post_code` varchar(15) NOT NULL,
  `telnum` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `date_mode` int(11) NOT NULL,
  `pword` varchar(225) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_accounts`
--

INSERT INTO `store_accounts` (`id`, `username`, `fistname`, `lastname`, `company`, `address`, `address2`, `town`, `country`, `post_code`, `telnum`, `email`, `date_mode`, `pword`, `status`, `last_login`) VALUES
(1, 'eslam', 'eslam', 'elbadry', 'unitscope', 'egypt', 'madiaa', 'egypt', 'cairo', '12035', '01152945713', 'eslam@123.com', 1503117216, '$2y$12$T0JlsFRMxnBuKY/Qy6TN2e2u1UyiBlC4z6djmmfl9be76z1mqv4JG', 0, 1509715552),
(3, 'admin', 'admin', 'admin', 'emicads', 'maadi', 'helwan', 'egypt', 'cairo', '12345', '01152945713', 'eslam@123.com', 1505557315, NULL, 0, 0),
(4, 'john', 'marwa', 'ahmed', '', '', '', '', '', '', '', 'john.smith@yahoo.com', 0, '$2y$12$PNjSfxebqebgcEcsb681o.i/kWo5awSTPJH.sejyXEQ7jiyshe0p6', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_basket`
--

CREATE TABLE `store_basket` (
  `id` int(11) NOT NULL,
  `session_id` varchar(32) NOT NULL,
  `item_title` varchar(250) NOT NULL,
  `price` decimal(7,0) NOT NULL,
  `tax` decimal(7,0) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_color` varchar(70) NOT NULL,
  `item_size` varchar(70) NOT NULL,
  `date_added` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `ip_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_basket`
--

INSERT INTO `store_basket` (`id`, `session_id`, `item_title`, `price`, `tax`, `item_id`, `item_qty`, `item_color`, `item_size`, `date_added`, `shopper_id`, `ip_address`) VALUES
(1, 'r8i44hfq3mbqbbis04o6nfbqg8e9ta7n', '', '8630', '0', 10, 10, '', '10', 1509009429, 1, 0),
(2, 'r8i44hfq3mbqbbis04o6nfbqg8e9ta7n', '', '8630', '0', 10, 10, '', '10', 1509009463, 1, 0),
(3, '2tlsp3qanccc3d53b6c32msc3g2tpvth', 'Fender FSR USA Pro Stratocaster HSS in Black', '12945', '0', 10, 15, '', '30', 1509009515, 1, 0),
(4, '2tlsp3qanccc3d53b6c32msc3g2tpvth', 'Fender FSR USA Pro Stratocaster HSS in Black', '10356', '0', 10, 12, 'GREEN', '20', 1509009807, 1, 0),
(5, '820o3rrrpe04bf5pk4q4o93ft20auar4', 'Fender Coronado Guitar in 3 Colour Sunburst', '4990', '0', 13, 10, 'Blue', 'Medium', 1509143379, 0, 0),
(6, '53bb5lfnhdbbdks7b5175bh795247o6l', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 5, '', '', 1509342167, 0, 0),
(7, 'c5glsvkpo188hrppbt4ji5l8libc074s', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 2, '', '', 1509343481, 0, 0),
(8, '3u1arrmj9u3t6mn8q7shvbhkilk2alb4', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 32, '', '', 1509343832, 0, 0),
(9, '7i3hra052okv3nbv39bckg568a0i601l', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 34, '', '', 1509344271, 0, 0),
(10, 'as12hv4755e0i2p57ju39jkrl8gchc23', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 43, '', '', 1509346764, 0, 0),
(11, 'mmid6bt3k7dt32uphqfda2n1sfr29lcm', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 4, '', '', 1509347091, 0, 0),
(12, '4kqmgol7q7lln2j79t65g61ini5t9655', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 43, '', '', 1509347515, 0, 0),
(13, '6vo2ekfnkn8k5qa69daouclmv1vau5e7', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 3, '', '', 1509347839, 0, 0),
(14, 'rbd0oavthfb7evfgop5a4sbdnisurj63', 'Fender Jimi Hendrix Strat in Black', '649', '0', 6, 43, '', '', 1509348141, 0, 0),
(15, '4fouif9cvuepo3vtgqqe4dccntqk0pqu', 'Fender Jimi Hendrix Strat in Black', '649', '0', 6, 23, '', '', 1509348553, 0, 0),
(16, '5n112qgal0d5uh6kv1jdm1vvdqapbhc5', 'Fender Jimi Hendrix Strat in Black', '649', '0', 6, 23, '', '', 1509348954, 0, 0),
(17, '5n112qgal0d5uh6kv1jdm1vvdqapbhc5', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 43, '', '', 1509349127, 0, 0),
(18, 'j347ns5hnpangv3febpmcm1haqit4nlm', 'Fender Jimi Hendrix Strat in Black', '649', '0', 6, 1, '', '', 1509349244, 0, 0),
(19, 'j347ns5hnpangv3febpmcm1haqit4nlm', 'Fender American Deluxe Dimension Bass IV HH RW in Violin Burst', '1529', '0', 4, 1, 'yellow', '', 1509349252, 0, 0),
(20, 'smff3hevhpnv09fg9spmns3ipsffgf06', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 4, '', '', 1509349768, 0, 0),
(21, 'v7dk83ee5vibos67tae3oi7jt7hmh02g', 'Fender Japan FSR Classic 69 Telecaster Pink Paisley', '901', '0', 8, 2, '', '', 1509690769, 0, 0),
(22, 'v7dk83ee5vibos67tae3oi7jt7hmh02g', 'Fender American Deluxe Dimension Bass IV HH RW in Violin Burst', '1529', '0', 4, 4, 'yellow', '', 1509690986, 0, 0),
(23, 'qnfkc7lb1li9n26uc5duudqc6rca8m7l', 'Fender American Deluxe Dimension Bass IV HH RW in Violin Burst', '1529', '0', 4, 2, 'yellow', '', 1509706471, 0, 0),
(24, 'kq10idoukm1leab9pidffhblf1sttbuv', 'Fender American Deluxe Dimension Bass IV HH RW in Violin Burst', '1529', '0', 4, 1, 'yellow', '', 1509707246, 0, 0),
(25, 'olpdhgjtc5aa949bjvb8cf54l9sjhdot', 'Fender American Deluxe Dimension Bass IV HH RW in Violin Burst', '1529', '0', 4, 1, 'yellow', '', 1509710903, 0, 0),
(26, '26tftsb1813ub41fffoda7h038i85269', 'Fender Jimi Hendrix Strat in Black', '649', '0', 6, 2, '', '', 1509711201, 0, 0),
(28, 'k6lh9jcem7l0vqql0ri8onq30ujsmc2a', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 3, '', '', 1509711344, 0, 0),
(29, 'k6lh9jcem7l0vqql0ri8onq30ujsmc2a', 'Fender CD-60 Acoustic Guitar Starter Pack in Natural', '139', '0', 7, 5, '', '', 1509711476, 0, 0),
(30, 'k6lh9jcem7l0vqql0ri8onq30ujsmc2a', 'Fender Jimi Hendrix Strat in Black', '649', '0', 6, 2, '', '', 1509711498, 0, 0),
(31, 'k6qqegqd3jpqfrrd7hqqdt6fnc13kedo', 'Fender CD-60 Acoustic Guitar Starter Pack in Natural', '139', '0', 7, 6, '', '', 1509711520, 0, 0),
(32, '3jftc8824q7vdstt4q5hebdukn9h31ag', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 32, '', '', 1509713986, 0, 0),
(33, '3jftc8824q7vdstt4q5hebdukn9h31ag', 'Fender FSR USA Pro Stratocaster HSS in Black', '863', '0', 10, 2, 'BLUE', '20', 1509714201, 0, 0),
(34, '36sav9ggrdqtf1nk6oemqctj52mrocvu', 'Fender CD-60 Acoustic Guitar Starter Pack in Natural', '139', '0', 7, 3, '', '', 1509714508, 0, 0),
(35, 'f07ob19gm81f3v2m0knk1sp02a31fumf', 'Fender American Deluxe Strat Plus HSS in Metallic 3 Tone Sunburst', '1419', '0', 5, 4, '', '', 1509715316, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_cat_assign`
--

CREATE TABLE `store_cat_assign` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_cat_assign`
--

INSERT INTO `store_cat_assign` (`id`, `id_cat`, `id_item`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 2, 19),
(20, 2, 20),
(21, 2, 21),
(22, 2, 22),
(23, 2, 23),
(24, 2, 24),
(25, 2, 25),
(26, 2, 26),
(27, 2, 27),
(28, 2, 28),
(29, 2, 29),
(30, 2, 30),
(31, 2, 31),
(32, 2, 32),
(33, 2, 33),
(34, 2, 34),
(35, 2, 35),
(36, 2, 36),
(37, 2, 37),
(38, 2, 38),
(39, 2, 39),
(40, 2, 40),
(41, 2, 41),
(42, 2, 42),
(43, 2, 43),
(44, 2, 44),
(45, 2, 45),
(46, 2, 46),
(47, 2, 47),
(48, 2, 48),
(49, 2, 49),
(50, 2, 50),
(51, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `store_item_colors`
--

CREATE TABLE `store_item_colors` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `color` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_colors`
--

INSERT INTO `store_item_colors` (`id`, `item_id`, `color`) VALUES
(5, 4, 'yellow'),
(12, 9, 'medium'),
(18, 13, 'Red'),
(19, 13, 'Blue'),
(20, 14, 'red'),
(21, 14, 'green'),
(22, 10, 'RED'),
(23, 10, 'GREEN'),
(24, 10, 'YELLOE'),
(25, 10, 'BLUE');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_sizes`
--

CREATE TABLE `store_item_sizes` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `size` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_sizes`
--

INSERT INTO `store_item_sizes` (`id`, `item_id`, `size`) VALUES
(5, 13, 'Large'),
(6, 13, 'Medium'),
(7, 13, 'Samll'),
(8, 12, '20'),
(9, 12, '30'),
(10, 10, '10'),
(11, 10, '20'),
(12, 10, '30');

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE `webpages` (
  `id` int(11) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_keywords` text NOT NULL,
  `page_description` text NOT NULL,
  `headline` varchar(255) NOT NULL,
  `page_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webpages`
--

INSERT INTO `webpages` (`id`, `page_url`, `page_title`, `page_keywords`, `page_description`, `headline`, `page_content`) VALUES
(1, '', 'Home Page', 'home', 'Hoem Page', '', '<p><b>Content Of The Main Page Is Called The Main Page...</b></p>'),
(2, 'contactus', 'contact us', 'about_us, bio', 'This Page To Know What I am', 'About Us', '<p>Hello From Another Side</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_blocks`
--
ALTER TABLE `homepage_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_offers`
--
ALTER TABLE `homepage_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_stores`
--
ALTER TABLE `item_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_cookie`
--
ALTER TABLE `site_cookie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores_category`
--
ALTER TABLE `stores_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_accounts`
--
ALTER TABLE `store_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_basket`
--
ALTER TABLE `store_basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_cat_assign`
--
ALTER TABLE `store_cat_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_colors`
--
ALTER TABLE `store_item_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webpages`
--
ALTER TABLE `webpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `homepage_blocks`
--
ALTER TABLE `homepage_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `homepage_offers`
--
ALTER TABLE `homepage_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_stores`
--
ALTER TABLE `item_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `site_cookie`
--
ALTER TABLE `site_cookie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stores_category`
--
ALTER TABLE `stores_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `store_accounts`
--
ALTER TABLE `store_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `store_basket`
--
ALTER TABLE `store_basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `store_cat_assign`
--
ALTER TABLE `store_cat_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `store_item_colors`
--
ALTER TABLE `store_item_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `webpages`
--
ALTER TABLE `webpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
