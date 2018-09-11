-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2018 at 08:27 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `planner`
--
CREATE DATABASE IF NOT EXISTS `planner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `planner`;

-- --------------------------------------------------------

--
-- Table structure for table `act`
--

CREATE TABLE IF NOT EXISTS `act` (
  `id_act` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cover_url` text NOT NULL,
  `video_url` text NOT NULL,
  PRIMARY KEY (`id_act`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `act`
--

INSERT INTO `act` (`id_act`, `name`, `description`, `cover_url`, `video_url`) VALUES
(1, 'Pearl Jam', '''They''re coming...'' Every winter the rumours abound, but now for the first time since 2000 Pearl Jam really are returning to Pinkpop. No other band has been so closely associated with the festival over the past three decades - even though they only played here twice. The first time, in 1992, was of course the Big Bang. Their debut Ten exploded, Seattle was the musical epicentre and in faraway Landgraaf Eddie Vedder climbed a camera crane while performing Porch. The Jump was seen around the world - then many more times on YouTube - and since then has been a key moment in the history of both Pearl Jam and Pinkpop. In the meantime, Vedder & co. grew from grunge phenomenon into the conscience of contemporary rock & roll. Their last recording, Lightning Bolt, is now almost five years ago and Ed is still performing solo, but the band''s legendary marathon concerts are getting rarer in Europe. This year Pearl Jam and Pinkpop finally get up close and personal again. They''re coming!', 'https://www.pinkpop.nl/2018/wp-content/uploads/2017/11/pearl-jam-980x550.jpg', 'https://www.youtube.com/embed/qM0zINtulhM'),
(2, 'Foo Fighters', '''We''ll make it up!'' - it''s been set in golden letters, cast in concrete, for three years now. Two days before the finale of Pinkpop 2015, Dave Grohl fell from a stage in Sweden and broke his leg, putting a premature end to Foo Fighters'' festival season. The sense of disappointment shook the field at Landgraaf. And understandably, as few acts are more popular on European stages than the Foos. On their ninth studio recording, Concrete And Gold (which came out last year), this musical wolf pack continue to create solid, melodic power rock with top (pop) producer Greg Kurstin at the controls, watched from the side-lines by Justin Timberlake and Paul McCartney. Dave Grohl''s appeal really is endless, and everything that pops up on his radar can be effortlessly incorporated. He played Pinkpop twice before - in 2008 and 2011 - and as long as the manic friendly giant watches where he''s putting his big feet, we can add 2018 to the list - in concrete and gold, of course!', 'https://www.pinkpop.nl/2018/wp-content/uploads/2017/11/foo-fighters-980x550.jpg', 'https://www.youtube.com/embed/TRqiFPpw2fY'),
(3, 'Bruno Mars', 'Who better to take on the musical legacy of Michael Jackson, Prince, James Brown, Bobby Brown, Boyz II Men and the young R. Kelly than Bruno Mars? The Uptown Funk star - real name Peter Gene Hernandez - is not so much an innovator as a born entertainer. In fact, you will often hear there''s no better entertainer in America right now than ''golden boy'' Bruno. Not for nothing has he already performed at the Super Bowl - twice. No one has honed the black music tradition as finely as this great showman who grew up in Hawaii, moving to LA at the age of eighteen. Now 32, this musical polymath mixes funk, pop, soul, hip hop and nineties r&b (new jack swing) effortlessly into a sparkling whole. Not only can he sing with the best of ''em, but fuelled by boundless energy he dances like a man possessed, giving even James Brown and Michael Jackson a run for their money. His recent album 24K Magic has made him a megastar. His shows go at a blistering pace and keep it real down to the tiniest detail. The best soul/r&b revue in America right now will roll across Pinkpop like a righteous thunderstorm. Bruno Mars guarantees a massive shot of adrenaline, feelgood and funk.\n\n', 'https://www.pinkpop.nl/2018/wp-content/uploads/2017/11/bruno-mars-980x550.jpg', 'https://www.youtube.com/embed/-FyjEnoIgTM'),
(4, 'Snow Patrol', 'Snow Patrol are ready to go again - which probably counts as a minor miracle. It''s now seven years since Gary Lightbody and band dropped their last LP, and for a long time it looked like Fallen Empires could be a prophetic title. Side projects, writer''s block, general (un)rest - every imaginable explanation was put out to the faithful but impatient Snow Patrol fans, but even Lightbody''s own Facebook Christmas message last year wasn''t giving much away. But a photo he posted did offer more hope: flight cases with the Snow Patrol logo and the energetic caption: ''Gearing up!'' And now they''re on the Pinkpop bill, just like in 2007 and 2009, when they closed on the Main Stage. Not to take anything away from Chasing Cars, Run, Crack The Shutters or Take Back The City, but we do have one burning question for Lightbody: is the record coming out or not? The answer seems so simple: Just Say Yes!', 'https://www.pinkpop.nl/2018/wp-content/uploads/2018/02/snow-patrol-980x550.jpg', 'https://www.youtube.com/embed/GemKqzILV4w'),
(5, 'The Script', 'Most successful Irish band since U2? It has to be The Script. With their fifth album Freedom Child, the three-piece scored their fourth number 1 hit in the UK. These Irishmen really can''t complain: they''ve sold a total of 29 million albums, and more than a million people have bought a ticket to one of their shows. The guys took a break after the success of No Sound Without Silence (2014), and it seems this did them good: Freedom Child is a marvellous album. Beautiful piano songs, great pop songs and of course that characteristic Script twist. Music to dream away to and to rock out to. Made by real enthusiasts - as frontman Danny O''Donoghue told OOR: ''Deep inside I''m just a hippy, I love music.'' Don''t we all?', 'https://www.pinkpop.nl/2018/wp-content/uploads/2018/02/the-script-980x550.jpg', 'https://www.youtube.com/embed/WIm1GgfRz6M');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `event_date` date NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `event_name`, `event_date`) VALUES
(1, 'Friday', '2018-06-15'),
(2, 'Saturday', '2018-06-16'),
(3, 'Sunday', '2018-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `id_planning` int(11) NOT NULL AUTO_INCREMENT,
  `id_act` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_stage` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  PRIMARY KEY (`id_planning`),
  KEY `id_event` (`id_event`),
  KEY `id_event_2` (`id_event`),
  KEY `id_stage` (`id_stage`),
  KEY `id_act` (`id_act`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id_planning`, `id_act`, `id_event`, `id_stage`, `time_start`, `time_end`) VALUES
(1, 1, 1, 1, '19:30:00', '20:30:00'),
(2, 2, 2, 1, '21:30:00', '00:00:00'),
(3, 3, 3, 1, '22:00:00', '23:30:00'),
(4, 4, 1, 1, '19:30:00', '20:30:00'),
(5, 5, 2, 1, '19:30:00', '20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id_stage` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_stage`),
  KEY `id_stage` (`id_stage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id_stage`, `name`, `description`) VALUES
(1, 'Mainstage', 'This is the mainstage'),
(2, 'Brightlands Stage', '...'),
(3, 'IBA Parkstad Stage', '...'),
(4, 'Stage 4', '...'),
(5, 'Garden of Love', '...');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'test', '098F6BCD4621D373CADE4E832627B4F6');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `planning_ibfk_3` FOREIGN KEY (`id_stage`) REFERENCES `stage` (`id_stage`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
