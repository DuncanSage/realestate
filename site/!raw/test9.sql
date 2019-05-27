-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 06:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dsage_property`
--

CREATE TABLE `dsage_property` (
  `id` int(11) NOT NULL,
  `salesrepid` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('rent','sale','auction') NOT NULL,
  `type` enum('Acreage','Apartment','House','Townhouse','Unit','vacant Land','Villa') NOT NULL,
  `thumbnail` varchar(30) NOT NULL,
  `size` decimal(6,0) DEFAULT NULL,
  `price` decimal(7,0) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `barthroom` int(11) DEFAULT NULL,
  `garages` int(11) DEFAULT NULL,
  `highlights` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `postcode` char(4) NOT NULL,
  `state` enum('NSW','QLD','SA','TAS','VIC','WA','ACT','NT') NOT NULL,
  `city` varchar(50) NOT NULL,
  `suburb` varchar(50) DEFAULT NULL,
  `streetname` varchar(50) NOT NULL,
  `streetnumber` smallint(6) NOT NULL,
  `addresstype` varchar(50) DEFAULT NULL,
  `addressid` varchar(20) DEFAULT NULL,
  `listdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsage_property`
--

INSERT INTO `dsage_property` (`id`, `salesrepid`, `active`, `featured`, `status`, `type`, `thumbnail`, `size`, `price`, `bedrooms`, `barthroom`, `garages`, `highlights`, `description`, `postcode`, `state`, `city`, `suburb`, `streetname`, `streetnumber`, `addresstype`, `addressid`, `listdate`) VALUES
(7, 1, 1, 1, 'sale', 'Townhouse', '1/small/1.jpg', '558', '375000', 4, 2, 2, 'Air Conditioning, Built in Robes, Dishwasher, Ensuite, Floorboards, Rumpus Room', 'Perfect positioning with great street appeal 180 Turf Street is a large four bedroom double storey home which has seen a major renovation completed with a high standard finish.  Upstairs welcomes you with gorgeous polished floor boards which compliments an open plan living area that flows through to the front patio and the brand new Hamptons style kitchen which includes upmarket appliances and designer lights. Also consist of four large bedrooms, main bathroom and a spacious sun-room with natural lighting. The hidden surprise is down stairs with ample living space perfect for the extended family, laundry, drive through garage and the perfect man cove.  Centrally located in Grafton and within walking and driving distance to the Grafton race track, sporting fields, GDSC, ten pin bowling, pubs, clubs and our fully air conditioned shopping centre. It is rare for such a large renovated family home to hit the market in the Clarence Valley along with motivated vendors who want to move on in the next stage of their lives.', '2460', 'NSW', 'Grafton', '', 'Turf Street', 180, NULL, NULL, '2019-05-10 02:42:55'),
(8, 1, 1, 0, 'sale', 'Townhouse', '2/small/2.jpg', '673', '327000', 3, 2, 3, 'Built in Robes, Dishwasher, Hot Water Solar, Reverse Cycle Air Con, Rumpus Room, Security System, Tinted Windows, Solar hot water, Solar power', 'A HOME WITH ALL THE FINER TOUCHES\r\nTwo storey brick townhouse conveniently located in one of Grafton\'s most sought-after family areas Westlawn, within walking distance to Grafton Race Track, 9 hole golf course, local swimming pool, Westlawn Primary School and only minutes from the Grafton Base Hospital, local hotels, GDSC and all amenities.\r\n\r\nThe open plan kitchen/living/dining area includes a reverse cycle air-conditioner, tinted windows, ceiling fan, ample space for comfort and provides access to a long balcony that can be enjoyed all year round. Not only does this home have two large bedrooms with built-ins and a great size bathroom upstairs, it also has a third bedroom/office down stairs with a second bathroom for the extended family. A large rumpus room is located downstairs with its own kitchenette for entertaining, teenager or parents retreat.\r\n\r\nA remote-control garage with internal access to the home comfortably fits a large vehicle with enough space left for further storage. A lock up garden shed is located at the rear and enough space to store a boat, second car, caravan or another carport with side access.', '2460', 'NSW', 'Grafton', NULL, 'Gosford Close', 15, 'Unit', '2', '2019-05-10 03:32:00'),
(11, 1, 1, 1, 'rent', 'Townhouse', '11/small/1.jpg', NULL, '430', 4, 1, 1, 'Air Conditioning, Built in Robes, Fire Place, Floorboards, Ceiling fans', 'Family home in sought after Dovedale\r\nLocated in the lovely Dovedale - only one block away from the Clarence River, this four bedroom home is sure to accommodate all of the family\'s wants and needs.\r\n\r\nThis well presented property boasts a large open dining and lounge area providing plenty of room to move, with a fireplace for those chilly nights and air-conditioning to cater for the warmer months. The home features polished floorboards and numerous fans throughout.\r\n\r\nThe downstairs laundry also has the added benefit of an extra shower and toilet. The nicely sized fully fenced yard will ensure there is a safe place for the kids to play.\r\n\r\nPets will be considered upon application.\r\n\r\nPlease contact us to arrange an inspection 5678 567 567', '2460', 'NSW', 'Grafton', 'Dovedale', 'Fry Street', 12, NULL, NULL, '2019-05-22 03:26:55'),
(12, 1, 1, 0, 'sale', 'Townhouse', '12/small/12.jpg', '288', '210000', 2, 1, 1, 'Air Conditioning', 'PRIME LOCATION - INVESTMENT OPPORTUNITY\r\nAn appealing 2 bedroom home has seen recent renovations that will be sure to spark interest in first home buyers and keen investors growing their portfolio, with a possible $320-$330 per week rental return.\r\n\r\nFeaturing open plan living with a new kitchen and spacious living and dining that has new flooring and internal paint throughout this home is not one to skip past.\r\n The two large bedrooms feature new carpet, fresh paint, large modern fans and new blinds with nothing left to do but move your bed in. The master bedroom has room to add a walk in robe or maybe even an en-suite.\r\n For the keen renovators there is room left to add your very own touches to this home, while down stairs will keep the teenagers and builders busy with an over sized work shop perfect for building, fixing cars and motor bikes, storing a boat and comes with a new electric roller door.\r\n\r\nThe position of this home is perfect being minutes away from South Grafton CBD, Pubs and clubs, sporting fields, Public schools, public transport and South Grafton District Golf Club. Friday night meals are sorted with the respected 4.1/5 Star food option across the road, if you are a schnitzel person there is no need to look at the menu because the Royal Hotel in South Grafton has the best in town.', '2460', 'NSW', 'Grafton', 'South Grafton', 'Ryan Street', 169, NULL, NULL, '2019-05-22 03:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `dsage_propertyimages`
--

CREATE TABLE `dsage_propertyimages` (
  `id` int(11) NOT NULL,
  `propertyid` int(11) NOT NULL,
  `imagepath` longtext NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsage_propertyimages`
--

INSERT INTO `dsage_propertyimages` (`id`, `propertyid`, `imagepath`, `name`) VALUES
(1, 7, 'properties/1/1.jpg', NULL),
(2, 8, 'properties/2/2.jpg', NULL),
(22, 12, 'properties/12/1.jpg', NULL),
(23, 12, 'properties/12/2.jpg', NULL),
(24, 12, 'properties/12/3.jpg', NULL),
(25, 12, 'properties/12/4.jpg', NULL),
(26, 12, 'properties/12/5.jpg', NULL),
(27, 12, 'properties/12/6.jpg', NULL),
(28, 12, 'properties/12/7.jpg', NULL),
(29, 12, 'properties/12/8.jpg', NULL),
(30, 12, 'properties/12/9.jpg', NULL),
(31, 12, 'properties/12/10.jpg', NULL),
(32, 12, 'properties/12/11.jpg', NULL),
(33, 12, 'properties/12/12.jpg', NULL),
(34, 12, 'properties/12/13.jpg', NULL),
(35, 12, 'properties/12/14.jpg', NULL),
(36, 12, 'properties/12/15.jpg', NULL),
(37, 11, 'properties/11/1.jpg', NULL),
(38, 11, 'properties/11/2.jpg', NULL),
(39, 11, 'properties/11/3.jpg', NULL),
(40, 11, 'properties/11/4.jpg', NULL),
(41, 11, 'properties/11/5.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsage_team`
--

CREATE TABLE `dsage_team` (
  `lname` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `id` int(11) NOT NULL,
  `fname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `role` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `workphone` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `mobilephone` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `homephone` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE latin1_general_ci,
  `profilepic` varchar(10) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dsage_team`
--

INSERT INTO `dsage_team` (`lname`, `id`, `fname`, `title`, `role`, `workphone`, `mobilephone`, `homephone`, `email`, `description`, `profilepic`) VALUES
('Whaites', 1, 'Allison', 'Mrs', 'Sales Agent / Property Manager', '02 6642 8554', '0487 289 471', '', 'info@fngrafton.com.au', 'Allison is a local Licensed Real Estate Professional, who specialises in office management, Property Sales, both residential and rural, property management and Fair Trading compliance. With many years experience in the local Grafton market and also out of area, allows her to have a well-rounded picture of all facets of the local and national real estate industry.\r\n\r\nAll of this experience ensures that Allison achieves the highest quality of service and with her in-depth knowledge and passion for the real estate industry you know you\'\'ll be in the right hands from day one.\r\n\r\nBeing a long time Grafton local and having raised her children in the area, Allison enjoys being part of the wider community by fundraising, being involved in charity events, supporting local businesses via social media and hosting free real estate information sessions. She loves the industry\'\'s dynamic nature and is determined to excel and reach her real estate goals.\r\n\r\nAllison also enjoys interacting with people, with clients valuing her friendly and supportive nature as well as her drive to deliver the best results possible.', '1.jpg'),
('Sage', 2, 'Duncan', 'Mr', NULL, '02 6642 8554', NULL, NULL, 'duncansage.ccv@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `bedrooms` int(2) DEFAULT NULL,
  `bathrooms` int(2) DEFAULT NULL,
  `carport` int(2) DEFAULT NULL,
  `garage` int(4) DEFAULT NULL,
  `morerooms` varchar(250) DEFAULT NULL,
  `listdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(250) NOT NULL,
  `price` int(8) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `repid` int(11) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `otherimages` varchar(500) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `notes` varchar(500) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `size`, `bedrooms`, `bathrooms`, `carport`, `garage`, `morerooms`, `listdate`, `location`, `price`, `description`, `repid`, `image1`, `otherimages`, `clientid`, `active`, `notes`, `featured`) VALUES
(1, 'townhouse', 153, 2, 2, 0, 2, NULL, '2019-03-07 12:28:15', '2 Arafura Street Lake Cathie NSW 2445', 595000, 'This immaculate home with ducted air throughout is all you could wish for in a relaxed living lifestyle in popular award winning Over 50\'s Village. This home is situated in one of the best positions in the whole village as it is literally only a 2 minute stroll to magnificent Club House, swimming pool, gymnasium, bowling green and tennis court.', 1, '1.jpg', NULL, 1, 1, NULL, 1),
(2, 'townhouse', 0, 3, 1, 0, 2, '', '2019-03-07 12:28:15', '8 Melaleuca Avenue Lake Cathie NSW 2445', 489000, 'This very neat brick and tile home would have to be one of the best buys in the area. Offering 3 bedrooms all with built-ins, comfortable air conditioned lounge with timber floors, separate dining room, timber kitchen with walk-in pantry. The bathroom has bath plus shower and separate toilet. There is a large enclosed patio/barbeque area out back, a double auto garage and to save on power solar panels plus solar hot water.', 2, '2.jpg', '', 2, 1, '', 1),
(6, 'test3', 153, 4, 3, 0, 4, NULL, '2019-03-13 11:32:54', '', 1, '', 1, '', NULL, 0, 1, NULL, 1),
(7, 'test4', 400, 4, 3, 0, 4, NULL, '2019-03-13 11:32:54', '', 489000, '', 2, '', NULL, 0, 1, NULL, 1),
(8, 'test3', 153, 4, 3, 0, 4, NULL, '2019-03-13 11:32:54', '12345', 1, 'test', 1, 'testimage', NULL, 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesrep`
--

CREATE TABLE `salesrep` (
  `id` int(11) NOT NULL,
  `title` enum('Mr','Ms','Mrs','Mx') NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesrep`
--

INSERT INTO `salesrep` (`id`, `title`, `firstname`, `lastname`) VALUES
(1, 'Mr', 'Tony', 'Holand'),
(2, 'Mrs', 'Deb', 'Finland'),
(3, 'Mr', 'John', 'Smith'),
(4, 'Ms', 'Rachel', 'Scott'),
(5, 'Mx', 'Max', 'Lovegate'),
(6, 'Ms', 'Emily', 'Moss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dsage_property`
--
ALTER TABLE `dsage_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsage_propertyimages`
--
ALTER TABLE `dsage_propertyimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propertyid` (`propertyid`);

--
-- Indexes for table `dsage_team`
--
ALTER TABLE `dsage_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `repid` (`repid`);

--
-- Indexes for table `salesrep`
--
ALTER TABLE `salesrep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dsage_property`
--
ALTER TABLE `dsage_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dsage_propertyimages`
--
ALTER TABLE `dsage_propertyimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `dsage_team`
--
ALTER TABLE `dsage_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salesrep`
--
ALTER TABLE `salesrep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dsage_propertyimages`
--
ALTER TABLE `dsage_propertyimages`
  ADD CONSTRAINT `dsage_propertyimages_ibfk_1` FOREIGN KEY (`propertyid`) REFERENCES `dsage_property` (`id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`repid`) REFERENCES `salesrep` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
