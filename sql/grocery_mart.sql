-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 11:56 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`) VALUES
(1, 'Bisk Farm', 'Bakery products, including biscuits, cakes, cookies, rusks, extruded snacks, filled wafers, baked Savouries, Danishes, Pastries, Breads and other Confectionery items'),
(2, 'Haldiram\'s', 'Traditional namkeens, western snacks, Indian sweets, cookies, sherbets, papads and pickles'),
(3, 'Amul', 'Amul Milk Powder, Amul Ghee, Amul spray, Amul Cheese, Amul Chocolates, Amul Shrikhand, Amul Ice cream, Nutramul, Amul Milk and Amulya');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `subid` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `subid`, `description`, `image`) VALUES
(1, 'Beans, Brinjals &amp; Okra', 6, 'Beans, Brinjals &amp; Okra', 'brinjals.png'),
(2, 'Cabbage &amp; Cauliflower', 6, 'Cabbage &amp; Cauliflower', 'Cauliflower.png'),
(3, 'Cucumber &amp; Capsicum', 6, 'Cucumber &amp; Capsicum', 'capsicum.png'),
(4, 'Gourd, Pumpkin, Drumstick', 6, 'Gourd, Pumpkin, Drumstick', 'gourd.png'),
(5, 'Leafy Vegetables', 6, 'Leafy Vegetables', 'coriender.png'),
(6, 'Potato, Onion &amp; Tomato', 6, 'Potato, Onion &amp; Tomato', 'potato.png'),
(7, 'Root Vegetables', 6, 'Root Vegetables', 'carrot.png'),
(8, 'Others', 6, 'Other vegetables', 'corn.png');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `districtid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `districtid`) VALUES
(1, 'Durgapur', '4'),
(4, 'Asansol', '4'),
(5, 'Andal', '4');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `stateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `stateid`) VALUES
(3, 'muzaffarpur', 2),
(4, 'Paschim Bardhaman', 1),
(5, 'Bankura', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `rate` text NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `prodid`, `storeid`, `rate`, `stock`) VALUES
(3, 4, 3, '13', 20),
(4, 4, 1, '12', 0),
(5, 6, 2, '34', 20),
(9, 6, 1, '36', 10),
(10, 5, 1, '39', 30),
(11, 3, 1, '11', 50),
(12, 3, 2, '12', 50),
(13, 9, 1, '8', 40),
(14, 12, 1, '28', 30),
(15, 12, 3, '25', 20),
(16, 12, 4, '28', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `brandid` text NOT NULL,
  `catagoryid` text NOT NULL,
  `subid` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `mrp` int(11) NOT NULL,
  `unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `brandid`, `catagoryid`, `subid`, `image`, `description`, `mrp`, `unit`) VALUES
(3, 'New Potato', '0', '6', 6, 'potato.png', 'New potatoes are freshly picked from the best of farms and as the name suggests they are a new crop. Because of this, they have a thinner skin or peel on top, which makes it ideal for cooking with the peel on. These potatoes also have lower moisture and a waxy texture.', 12, 'kg'),
(4, 'Baby Potato', '0', '6', 6, 'babypotato.png', 'These small baby potatoes are a sweeter variety than normal ones and come with a creamy off white interior. Baby potato is a starchy vegetable that adds thickness to recipes and blends well with other vegetables.', 14, 'kg'),
(5, 'Carrot - Red', '0', '7', 6, 'carrot.png', 'Considered sweeter than other carrots, Red Carrots contain more of a pigment called lycopene which is also present in tomatoes. A popular sweet-tasting root vegetable, carrots are narrow and cone shaped. They have thick, fleshy, deeply colored root, which grows underground, and feathery green leaves that emerge above the ground. While these greens are fresh tasting and slightly bitter, the carrot roots are crunchy textured with a sweet and minty aromatic taste. Fresho brings you the flavour and richness of the finest red, crispy and juicy carrots.', 40, 'kg'),
(6, 'Beetroot', '0', '7', 6, 'beet.png', 'These edible ruby red roots are smooth and bulbous and have the highest sugar content than any other vegetable.', 35, 'kg'),
(9, 'Cabbage Small / Bandhacopi', '0', '2', 6, 'cabbage.png', 'With a texture of crispness and juiciness the moment you take the first bite, cabbages are sweet and grassy flavoured with dense and smooth leafy layers.', 9, 'kg'),
(12, 'Bottle Gourd / Lauki', '0', '4', 6, 'gourd.png', 'Considered sweeter than other carrots, Red Carrots contain more of a pigment called lycopene which is also present in tomatoes. A popular sweet-tasting root vegetable, carrots are narrow and cone shaped. They have thick, fleshy, deeply colored root, which grows underground, and feathery green leaves that emerge above the ground. While these greens are fresh tasting and slightly bitter, the carrot roots are crunchy textured with a sweet and minty aromatic taste. Fresho brings you the flavour and richness of the finest red, crispy and juicy carrots.', 29, 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'West Bengal'),
(2, 'Bihar');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `storemanagerid` text NOT NULL,
  `productcat` text NOT NULL,
  `streetid` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `storemanagerid`, `productcat`, `streetid`, `image`) VALUES
(1, 'Raju Vegetable Store', 'M/6, Bidhan Park, sec-1, Fuljhore', '2', 'Vegetable and Fruits', '1', 'shop1.jpg'),
(2, 'Chitra Vegetable Store (Dhopir Dokan)', 'Bidhan Park, sec-2, Durgapur', '', 'Vegetable and Fruits', '1', 'shop2.jpg'),
(3, 'Pal Grocery Store', 'Fuljhore more, Durgapur', '2', 'Hoursehold Items', '1', 'shop2.jpg'),
(4, 'Singh Variety Store', 'Steel Park More, Durgapur, West Bengal', '2', 'Vegetable and Fruits', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `storemanager`
--

CREATE TABLE `storemanager` (
  `uid` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `verified` int(1) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storemanager`
--

INSERT INTO `storemanager` (`uid`, `user`, `pass`, `email`, `mobile`, `verified`, `token`) VALUES
(2, 'SAIKAT ADHURYA', '202cb962ac59075b964b07152d234b70', 'sakatadhuryabirds@gmail.com', '9093222034', 1, '1ee737747fdddcfcc7289082816b5fc102827b224fe349e2c19940e940b023b5ec99da0a158ab8fdc17a5641b405f98fcac1');

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

CREATE TABLE `street` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cityid` text NOT NULL,
  `zipcode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `street`
--

INSERT INTO `street` (`id`, `name`, `cityid`, `zipcode`) VALUES
(1, 'Fuljhore', '1', 713206),
(2, 'MAMC', '1', 713210),
(3, 'City Center', '1', 713216),
(4, 'Sagar Bhanga', '1', 713211);

-- --------------------------------------------------------

--
-- Table structure for table `subcatagory`
--

CREATE TABLE `subcatagory` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `supid` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcatagory`
--

INSERT INTO `subcatagory` (`id`, `name`, `supid`, `description`, `image`) VALUES
(6, 'Vegetables', 5, 'Potato, Tomato, Onion, Peas, Beans etc.', 'veg.png'),
(7, 'Fruits', 5, 'Banana, Apple, Orange, Pineapple, Grapes', 'fruit.png');

-- --------------------------------------------------------

--
-- Table structure for table `supercatagory`
--

CREATE TABLE `supercatagory` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supercatagory`
--

INSERT INTO `supercatagory` (`id`, `name`, `description`, `image`) VALUES
(5, 'Vegetable and Fruits', 'Vegetables, Fruits', 'vegfruits.png'),
(6, 'Personal Care', 'Bath &amp; Body, Hair Cure, Skin Care,Cosmetics, Health Care', 'personalcare.png'),
(7, 'Hoursehold Items', 'Laundry Detergents, Dishwashes, Cleaners, Cleaning Tools &amp; Brushes, Pooja Needs, Home &amp; Car Freshners.', 'household.png'),
(8, 'Home &amp; Kitchen', 'Storage &amp; Containers, Kitchen Tools &amp; Accessories, Dining &amp; Serving, Bags &amp; Travel Accessories, Bathroom Essentials, Cleaning Equipment, Electrical Goods &amp; Accessories, Stationery &amp; Magazines, Gas Stoves', 'homeandkitchen.png'),
(9, 'Biscuits, Snacks &amp; Chocolates', 'Chocolates &amp; Candies, Biscuits &amp; Cookies, Namkeen &amp; Snacks, Chips &amp; Crisps, Sweets, New Launches, Biscuits &amp; Chocolates Offers', 'biscuitandchocolates.png'),
(10, 'Beverages', 'New Launches, Best Offers, Cold Drinks, Juices &amp; Drinks, Tea &amp; Coffee, Health &amp; Energy Drinks, Water &amp; Soda, Milk Drinks', 'beverages.png'),
(11, 'Breakfast &amp; Dairy', 'Breakfast &amp; Dairy Best Offers, Milk &amp; Milk Products, Bread &amp; Eggs, Paneer &amp; Curd, Butter &amp; Cheese, Breakfast Cereal &amp; Mixes, Jams, Honey &amp; Spreads', 'breakfastanddairy.png'),
(12, 'Noodles, Sauces &amp; Instant Food', 'Noodles &amp; Sauces Best Offers, Noodles &amp; Vermicelli, Sauces &amp; Ketchups, Jams, Honey &amp; Spreads, Pasta &amp; Soups, Ready Made Meals &amp; Mixes, Pickles &amp; Chutneys, Canned &amp; Frozen Food, Baking &amp; Dessert Items, Chyawanprash &amp; Health Foods', 'noodles.png'),
(13, 'Furnishing &amp; Home Needs', 'Bed Linen, Bath Linen &amp; Towels, Furniture &amp; Storage, Curtains, Cushions &amp; Accessories, Decor, Gardening &amp; Festivities, Mats &amp; Carpets', 'furniture.png'),
(14, 'Fresh &amp; Frozen Food', 'Ready to Cook/ Ready to Eat, Frozen &amp; Canned Food', 'canned.png'),
(15, 'Grocery &amp; Staples', 'Pulses, Atta &amp; Other Flours, Rice &amp; Other Grains, Dry Fruits &amp; Nuts, Edible Oils, Ghee &amp; Vanaspati, Spices, Salt &amp; Sugar, Organic Staples, Vegetables, Fruits', 'general.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transactionid` text NOT NULL,
  `storeid` text NOT NULL,
  `userid` text NOT NULL,
  `productid` text NOT NULL,
  `quantity` text NOT NULL,
  `total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'kg'),
(2, 'packet'),
(3, 'dozen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` text NOT NULL,
  `verified` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`, `pass`, `email`, `mobile`, `verified`, `token`) VALUES
(1, 'SAIKAT ADHURYA', '202cb962ac59075b964b07152d234b70', 'sakatadhuryabirds@gmail.com', '9093222034', 0, 'b8806c2018bd992d47b29c0109b6fcadf3c681e60145900115b0c97413934b024e7a27bb3a088cfc92a9e9f9b3e960ca3739');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storemanager`
--
ALTER TABLE `storemanager`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcatagory`
--
ALTER TABLE `subcatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supercatagory`
--
ALTER TABLE `supercatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `storemanager`
--
ALTER TABLE `storemanager`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcatagory`
--
ALTER TABLE `subcatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supercatagory`
--
ALTER TABLE `supercatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
