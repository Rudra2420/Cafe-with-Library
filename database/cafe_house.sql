-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 07:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(15) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `bcat_id` int(15) DEFAULT NULL,
  `bauth_name` varchar(30) NOT NULL,
  `book_img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `bcat_id`, `bauth_name`, `book_img`) VALUES
(101, 'Deliverance', 5, 'James Dickey', 'assets/img/books/anatomy-melancholy.jpg'),
(102, 'Light in August', 5, 'William Faulkne', 'assets/img/books/light-in-august.jpeg'),
(103, 'Ulysses', 5, 'James Joyce', 'assets/img/books/ulysses.jpeg'),
(104, 'The Sound and the Fu', 5, 'William Faulkne', 'assets/img/books/sound-and-fury.jpeg'),
(105, 'The Wings of the Dov', 5, 'Henry James', 'assets/img/books/wings-of-the-dove.jpeg'),
(106, 'The Secret Agent', 5, 'Joseph Conrad', 'assets/img/books/secret-agent.jpeg'),
(107, 'Frotiers Peace Treat', 1, 'Vincent van Gog', 'assets/img/books/frotiers-peace-treaties.jpg'),
(108, 'Georg Baselitz', 1, 'Georg Baselitz', 'assets/img/books/georg-baselitz.jpg'),
(109, 'Paul Klee', 1, 'Paul Klee', 'assets/img/books/paul-klee.jpg'),
(110, 'Henry Moore', 1, 'David Sylvester', 'assets/img/books/henry-moore.jpg'),
(111, 'Leonardo da Vinci', 1, 'Leonardo da Vin', 'assets/img/books/leonardo-Vinci.jpg'),
(112, 'The Adventures of Hu', 2, 'Mark Twain', 'assets/img/books/huckleberry-finn.jpg'),
(113, 'Pride and Prejudice', 2, 'Jane Austen', 'assets/img/books/pride-prejudice.jpg'),
(114, 'El ingenioso hidalgo', 2, 'Miguel de Cerva', 'assets/img/books/mancha.jpg'),
(115, 'Alice in Wonderland', 2, 'Lewis Carroll', 'assets/img/books/lewis-carroll.jpg'),
(116, 'A Christmas Carol', 2, 'Charles Dickens', 'assets/img/books/christmas-carol.jpg'),
(117, 'Life and adventures ', 2, 'Daniel Defoe', 'assets/img/books/life-and-adventures.jpg'),
(118, 'Celsi De medicina li', 3, 'Aulus Cornelius', 'assets/img/books/medicina.jpg'),
(119, 'Anatomy, descriptive', 3, 'Henry Gray', 'assets/img/books/surgical.jpg'),
(120, 'Arrowsmith', 3, 'Sinclair Lewis', 'assets/img/books/arrowsmith.jpg'),
(121, 'Journey to the end o', 3, 'Louis-Ferdinand', 'assets/img/books/journey-end-night.jpg'),
(122, 'The anatomy of melan', 3, 'Robert Burton', 'assets/img/books/anatomy-melancholy.jpg'),
(123, 'The Return of Sherlo', 4, 'Arthur Conan Do', 'assets/img/books/return-sherlock-holmes.jpg'),
(124, 'The Adventures of Sh', 4, 'Arthur Conan Do', 'assets/img/books/adventures-sherlock-holmes.jpg'),
(125, 'The Memoirs of Sherl', 4, 'Arthur Conan Do', 'assets/img/books/memoirs-sherlock-holmes.jpg'),
(126, 'Tales', 4, 'Edgar Allan Poe', 'assets/img/books/tales.jpg'),
(127, 'The Invisible Man', 4, 'H. G. Wells', 'assets/img/books/invisible-Man.jpg'),
(128, 'Strange case of Dr. ', 4, 'Robert Louis St', 'assets/img/books/strange-case.jpg'),
(129, 'The A B C Murders', 4, 'Agatha Christie', 'assets/img/books/murders.jpg'),
(130, 'The nature of things', 6, 'Titus Lucretius', 'assets/img/books/nature-things.jpg'),
(131, 'Les oeuvres morales ', 6, 'Plutarch', 'assets/img/books/plutarch.jpg'),
(132, 'On the origin of spe', 6, 'Charles Darwin', 'assets/img/books/charles-darwin.jpg'),
(133, 'The tour of the worl', 6, 'Jules Verne', 'assets/img/books/eighty-days.jpg'),
(134, 'Brave new world', 6, 'Aldous Huxley', 'assets/img/books/aldous-huxley.jpg'),
(135, 'Leonardo da Vinci', 6, 'Leonardo da Vin', 'assets/img/books/leonardo-vinci.jpg'),
(136, 'The Waste Lands', 7, 'Stephen King', 'assets/img/books/waste-lands.jpg'),
(137, 'Dark Justice', 7, 'Jack Higgins', 'assets/img/books/dark-justice.jpg'),
(138, 'Red rabbit', 7, 'Tom Clancy', 'assets/img/books/red-rabbit.jpg'),
(139, 'Misery', 7, 'Stephen King', 'assets/img/books/misery.jpg'),
(140, 'Duma Key', 7, 'Stephen King', 'assets/img/books/duma-key.jpg'),
(141, 'The Wrecker', 7, 'Clive Cussler', 'assets/img/books/wrecker.jpg'),
(142, 'Skeleton Crew', 7, 'Stephen King', 'assets/img/books/Skeleton Crew.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `bcat_id` int(15) NOT NULL,
  `bcat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`bcat_id`, `bcat_name`) VALUES
(1, 'Art'),
(2, 'History'),
(3, 'Medicine'),
(4, 'Mystery'),
(5, 'Novel'),
(6, 'Science'),
(7, 'Thrillers');

-- --------------------------------------------------------

--
-- Table structure for table `cafe_admin`
--

CREATE TABLE `cafe_admin` (
  `adm_email` varchar(30) NOT NULL,
  `adm_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafe_admin`
--

INSERT INTO `cafe_admin` (`adm_email`, `adm_pwd`) VALUES
('owner@gmail.com', 'owner121555');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(50) NOT NULL,
  `fitem_id` int(15) NOT NULL,
  `cust_id` int(6) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `fitem_id`, `cust_id`, `qty`, `total_price`) VALUES
(40, 132, 36, 2, '450'),
(44, 125, 37, 1, '425'),
(45, 128, 37, 2, '990');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(6) NOT NULL,
  `cust_name` varchar(20) NOT NULL,
  `cust_mob` varchar(13) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_mob`, `cust_email`, `cust_pwd`) VALUES
(36, 'Harsh Doshi', '8460221102', 'harshdoshi626@gmail.com', '$2y$10$wO1YR1lJRsenBZajnFq9xedPlCQGIs/UJuLNd3760DpZVPhIT3zeK'),
(37, 'Rudra Patel', '6541238970', 'rudrap55@gmail.com', '$2y$10$hjtx3Qy1O373cAX.1ikbFOHkF4LOO0XepXJc8SUHR/621OElP4Zma');

-- --------------------------------------------------------

--
-- Table structure for table `cust_subs_ord`
--

CREATE TABLE `cust_subs_ord` (
  `subs_ord_id` int(15) NOT NULL,
  `subs_id` int(15) NOT NULL,
  `cust_id` int(6) NOT NULL,
  `subs_ord_date` date NOT NULL,
  `cust_subs_epr_date` date NOT NULL,
  `subs_ord_amt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_subs_ord`
--

INSERT INTO `cust_subs_ord` (`subs_ord_id`, `subs_id`, `cust_id`, `subs_ord_date`, `cust_subs_epr_date`, `subs_ord_amt`) VALUES
(18, 2, 37, '2020-12-05', '2021-06-05', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `fcat_id` int(15) NOT NULL,
  `fcat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`fcat_id`, `fcat_name`) VALUES
(1, 'coffees'),
(2, 'Low-Cal Salads'),
(3, 'Starters'),
(4, 'Sandwiches'),
(5, 'Pizzas & Pastas'),
(6, 'Desserts'),
(7, 'Fresh Juices');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `fitem_id` int(15) NOT NULL,
  `fitem_name` varchar(50) NOT NULL,
  `fitem_price` varchar(20) NOT NULL,
  `fitem_img` longtext NOT NULL,
  `fcat_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`fitem_id`, `fitem_name`, `fitem_price`, `fitem_img`, `fcat_id`) VALUES
(101, 'Cappuccino', '225', 'assets/img/food-items/cappuccino.jpg', 1),
(102, 'Black', '225', 'assets/img/food-items/black.jpg', 1),
(103, 'Chana-Salad', '175', 'assets/img/food-items/chana-salad.jpg', 2),
(104, 'Vegi-Cheese-Toast', '250', 'assets/img/food-items/vegi-cheese-toast.jpg', 3),
(105, 'Americano', '200', 'assets/img/food-items/americano.jpg', 1),
(106, 'Cortado', '215', 'assets/img/food-items/cortado.jpg', 1),
(107, 'Doppio', '275', 'assets/img/food-items/doppio.jpg', 1),
(108, 'Espresso', '150', 'assets/img/food-items/espresso.jpg', 1),
(109, 'Latte', '290', 'assets/img/food-items/latte.jpg', 1),
(110, 'Red-Eye', '300', 'assets/img/food-items/red-eye.jpg', 1),
(111, 'Fattoush-Salad', '300', 'assets/img/food-items/fattoush.png', 2),
(112, 'Greek Salad', '300', 'assets/img/food-items/greek-salad.jpg', 2),
(113, 'Moroccan-Couscous Salad', '300', 'assets/img/food-items/moroccan-couscous salad.png', 2),
(114, 'Pear-Spinach-Beetroot Salad', '300', 'assets/img/food-items/pear-spinach-beetroot salad.png', 2),
(115, 'Apple-Spinach Salad', '250', 'assets/img/food-items/apple-spinach salad.png', 2),
(116, 'Pita bread hummus', '275', 'assets/img/food-items/pita-bread-hummus.jpeg', 3),
(117, 'Bruschetta', '295', 'assets/img/food-items/bruschetta.jpg', 3),
(118, 'Tossed Potato Wedges', '275', 'assets/img/food-items/tossed-potato-wedges.jpeg', 3),
(119, 'Lebanese Platter', '425', 'assets/img/food-items/lebanese-platter.jpeg', 3),
(120, 'Chilli-Paneer', '325', 'assets/img/food-items/chilli-paneer.jpeg', 3),
(121, 'Toasted Sandwich', '325', 'assets/img/food-items/toasted-sandwich.jpeg', 4),
(122, 'Crunchy-Lebanese Sandwich', '325', 'assets/img/food-items/crunchy-lebanese-sandwich.jpeg', 4),
(123, 'Club Sandwich', '330', 'assets/img/food-items/club-sandwich.jpeg', 4),
(124, 'Greek Salad Sandwich', '395', 'assets/img/food-items/greek-salad-sandwich.jpeg', 4),
(125, 'Cafe House Pizza', '425', 'assets/img/food-items/cafe-house-pizza.jpeg', 5),
(126, 'Garden Pesto', '430', 'assets/img/food-items/garden-pesto.jpeg', 5),
(127, 'Goat-Cheese Pizza', '500', 'assets/img/food-items/goat-cheese-pizza.jpeg', 5),
(128, 'Lazy Lunch Pasta', '495', 'assets/img/food-items/lazy-lunch-pasta.jpeg', 5),
(129, 'Penne AllArrabbiata', '425', 'assets/img/food-items/penne-arrabbiata.jpeg', 5),
(131, 'Tuscany Pizza', '450', 'assets/img/food-items/tuscany-pizza.jpeg', 5),
(132, 'Affogato', '225', 'assets/img/food-items/affogato.jpeg', 6),
(133, 'Banoffee Pie', '315', 'assets/img/food-items/banoffee-pie.jpeg', 6),
(134, 'Caramelized Bananas ', '225', 'assets/img/food-items/caramelized-bananas.jpeg', 6),
(135, 'Brownie', '275', 'assets/img/food-items/brownie.jpeg', 6),
(136, 'Carrot ', '245', 'assets/img/food-items/carrot.jpeg', 7),
(137, 'Coconut-water', '145', 'assets/img/food-items/coconut-water.jpeg', 7),
(138, 'Mango', '275', 'assets/img/food-items/mango.jpeg', 7),
(139, 'Pineapple', '210', 'assets/img/food-items/pineapple.jpeg', 7),
(140, 'Pomegranate', '315', 'assets/img/food-items/pomegranate.jpeg', 7),
(141, 'Sweet lime', '210', 'assets/img/food-items/sweet-lime.jpeg', 7),
(142, 'Watermelon', '275', 'assets/img/food-items/watermelon.jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `lib_subscription`
--

CREATE TABLE `lib_subscription` (
  `subs_id` int(15) NOT NULL,
  `subs_plan_name` varchar(100) NOT NULL,
  `subs_validity` varchar(30) NOT NULL,
  `no_of_book` int(15) NOT NULL,
  `subs_amt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_subscription`
--

INSERT INTO `lib_subscription` (`subs_id`, `subs_plan_name`, `subs_validity`, `no_of_book`, `subs_amt`) VALUES
(1, 'For Busy Reader', '3 Months', 3, '1000'),
(2, 'For Regular Reader', '6 Months', 5, '1500'),
(3, 'For Avid Reader', '12 Months', 7, '3000');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(15) NOT NULL,
  `offer_name` varchar(100) NOT NULL,
  `offer_category` varchar(30) NOT NULL,
  `offer_code` varchar(20) NOT NULL,
  `offer_desc` varchar(255) NOT NULL,
  `min_ord_amt` varchar(20) NOT NULL,
  `disc_per` int(10) NOT NULL,
  `offer_expr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `offer_name`, `offer_category`, `offer_code`, `offer_desc`, `min_ord_amt`, `disc_per`, `offer_expr_date`) VALUES
(1, '5% Off On Your Order', 'Cafe Offer', 'CAFE555', 'You can apply this offer on 250 or above order', '250', 5, '2020-12-31'),
(2, '5% Off On Your Subscription', 'Library Offer', 'LIB555', 'You can apply this offer only on 3 months subscription plan', '1000', 5, '2020-12-31'),
(3, '10% Off On Your Order', 'Cafe Offer', 'CAFE10', 'You can apply this offer on 500 or above orders', '500', 10, '2020-12-31'),
(4, '10% Off On Your Subscription', 'Library Offer', 'LIB10', 'You can apply this offer only on 3 months subscription plan', '1500', 10, '2020-12-31'),
(5, '15% Off On Your Order', 'Cafe Offer', 'CAFE15', 'You can apply this offer on 1500 or above orders', '1500', 15, '2020-12-31'),
(6, '15% Of On Your Subscription', 'Library Offer', 'LIB15', 'You can apply this offer only on 12 months subscription plan', '3000', 15, '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(15) NOT NULL,
  `cust_id` int(6) NOT NULL,
  `ord_date` date NOT NULL,
  `cart_id` int(50) NOT NULL,
  `grand_total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `cust_id`, `ord_date`, `cart_id`, `grand_total`) VALUES
(1, 36, '2020-12-04', 40, '225'),
(2, 37, '2020-12-06', 44, '1415');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tbl`
--

CREATE TABLE `reservation_tbl` (
  `rev_id` int(15) NOT NULL,
  `cust_id` int(6) NOT NULL,
  `rev_date` date NOT NULL,
  `capacity` int(10) NOT NULL,
  `token_amt` varchar(20) NOT NULL,
  `rev_status` varchar(20) NOT NULL,
  `rev_time` time NOT NULL,
  `cust_ph` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation_tbl`
--

INSERT INTO `reservation_tbl` (`rev_id`, `cust_id`, `rev_date`, `capacity`, `token_amt`, `rev_status`, `rev_time`, `cust_ph`) VALUES
(7, 36, '2020-12-06', 3, '300', 'Confirmed', '21:00:00', '8460221102'),
(8, 37, '2020-12-24', 6, '300', 'pending', '18:00:00', '6541237890'),
(9, 37, '2020-12-31', 2, '300', 'confirmed', '20:13:00', '8794562130'),
(10, 37, '2020-12-21', 3, '300', 'pending', '20:13:00', '8794562130');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `stf_id` int(6) NOT NULL,
  `stf_name` varchar(20) NOT NULL,
  `stf_mob` varchar(13) NOT NULL,
  `stf_email` varchar(30) NOT NULL,
  `stf_pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`stf_id`, `stf_name`, `stf_mob`, `stf_email`, `stf_pwd`) VALUES
(2, 'rajveer rana', '635410778', 'rajveer@gmail.com', ''),
(3, 'shivang', '6353831888', 'shivang@gmail.com', 'shivang75'),
(10, 'rudra', '1234567890', 'rudra@gmail.com', 'rudra'),
(11, 'harsh', '7891234660', 'harsh@gmail.com', 'harsh'),
(12, 'sid', '7895462130', 'sid123@gmail.com', 'sid123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`bcat_id`);

--
-- Indexes for table `cafe_admin`
--
ALTER TABLE `cafe_admin`
  ADD PRIMARY KEY (`adm_email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `foreign key` (`cust_id`),
  ADD KEY `reference key` (`fitem_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `cust_subs_ord`
--
ALTER TABLE `cust_subs_ord`
  ADD PRIMARY KEY (`subs_ord_id`),
  ADD KEY `subsid foreign key` (`subs_id`),
  ADD KEY `custid foreign key` (`cust_id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`fcat_id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`fitem_id`),
  ADD KEY `foregin key` (`fcat_id`);

--
-- Indexes for table `lib_subscription`
--
ALTER TABLE `lib_subscription`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `references` (`cust_id`),
  ADD KEY `foreign key` (`cart_id`);

--
-- Indexes for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `references customer` (`cust_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `bcat_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cust_subs_ord`
--
ALTER TABLE `cust_subs_ord`
  MODIFY `subs_ord_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `fcat_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `fitem_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `lib_subscription`
--
ALTER TABLE `lib_subscription`
  MODIFY `subs_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  MODIFY `rev_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `stf_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
