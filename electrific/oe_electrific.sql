-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2015 at 02:01 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oe_electrific`
--

-- --------------------------------------------------------

--
-- Table structure for table `all`
--

CREATE TABLE IF NOT EXISTS `all` (
  `Sr_No` int(11) NOT NULL AUTO_INCREMENT,
  `question_no` int(11) NOT NULL,
  `question` varchar(3000) NOT NULL,
  `subgroup` varchar(3000) NOT NULL,
  `answer` varchar(3000) NOT NULL,
  `file` varchar(3000) NOT NULL,
  PRIMARY KEY (`Sr_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

CREATE TABLE IF NOT EXISTS `quest` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `question_no` int(11) NOT NULL,
  `subgroup` varchar(3000) NOT NULL,
  `question` varchar(3000) NOT NULL,
  `answer` varchar(3000) NOT NULL,
  `file` varchar(3000) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`sr_no`, `question_no`, `subgroup`, `question`, `answer`, `file`) VALUES
(2, 1, 'A', ' Find the voltage across the 5 ohm resistors.', '', 'uploads/Untitled_picture.jpg'),
(3, 1, 'B', ' Find the voltage at the output of the Opamp in volts. 	', '', 'uploads/Untitled_picture1.jpg'),
(5, 1, 'C', ' If the current passing through the 8 ohm resistor is I, find the value of 4I. ', '', 'uploads/Untitled_picture2.jpg'),
(6, 1, 'D', 'Circuit shown below has been in steady state when switch S is opened, the current I is given by 10 exp(___ t)', '', 'uploads/Network-Analysis-1-Q.jpg'),
(7, 1, 'E', 'A Coulomb is that charge which placed in Vacuum from an equal and similar charge at a distance of one metre repels it with a force of A*10^9 Newton. Find A.', '', 'uploads/'),
(8, 2, 'A', 'Find i(t) when VS (t) = 100 sin(2510 t).   i(t)= _____ sin(2510t)', '', 'uploads/Circuit-Theory-Page-11-Q.jpg'),
(9, 2, 'B', 'In a RLC series circuit consisting VR = 3 V, VC = 8 V and VL = 4 V, Find the value of source excitation voltage.', '', 'uploads/'),
(10, 2, 'C', 'The current in a circuit follows the relation i = 50sinÏ‰t. If frequency is 25 Hz, how long(in ms) will it take for the current to rise to 50 A?', '', 'uploads/'),
(12, 2, 'D', 'In a pure parallel LC circuit under resonance condition, current drawn from main supply is', '', 'uploads/Circuit-Theory-Page-13-Q.jpg'),
(14, 2, 'E', 'A circuit with a resistor, inductor and capacitor in series is resonant of f0 Hz. If all the component values are now doubled the new resonant frequency becomes __f0', '', 'uploads/'),
(31, 1, 'E', 'A Coulomb is that charge which placed in Vacuum from an equal and similar charge at a distance of one metre repels it with a force of A*10^9 Newton. Find A.', '', 'uploads/'),
(32, 2, 'B', 'In a RLC series circuit consisting VR = 3 V, VC = 8 V and VL = 4 V, Find the value of source excitation voltage .', '', 'uploads/'),
(33, 2, 'C', 'The current in a circuit follows the relation i = 50sinÏ‰t. If frequency is 25 Hz, how long(in ms) will it take for the current to rise to 50 A ?', '', 'uploads/'),
(34, 2, 'E', 'A circuit with a resistor, inductor and capacitor in series is resonant of f0 Hz. If all the component values are now doubled the new resonant frequency becomes __f0 ', '', 'uploads/'),
(35, 3, 'A', 'What is the current (in mA) throughÂ R2?Â  	 	', '', 'uploads/mcq9_1024_1.jpg'),
(36, 3, 'B', 'What is the voltage drop (in mV) acrossÂ R3?', '', 'uploads/mcq9_1016_1.jpg'),
(37, 3, 'C', 'Using the mesh current method, find the branch current ,Â IR1(in mA).', '', 'uploads/mcq9_1016_1.jpg'),
(38, 3, 'C', 'Using the mesh current method, find the branch current ,Â IR1(in mA).', '', 'uploads/mcq9_1016_1.jpg'),
(39, 3, 'D', 'What is the bandwidth of the circuit ? (rounded off to nearest integer)', '', 'uploads/Untitled_picture_converted.jpg'),
(40, 3, 'E', 'How much current will flow in a 100 Hz series RLC circuit if Vs  = 20V, Rt = 66ohms and  Xt  =47 ohms in mA?', '', 'uploads/'),
(41, 4, 'A', 'Find the current through the 2 ohm resistor.', '', 'uploads/Untitled_picture4.jpg'),
(42, 4, 'B', 'Find the value of current through 40 ohm resistor in Amperes.', '', 'uploads/Untitled_picture5.jpg'),
(43, 4, 'C', 'Find the sum of currents I1, I2 and I3.', '', 'uploads/Untitled_picture6_converted.jpg'),
(44, 4, 'D', ' By means of superposition theorem , find the current which flows through R2.(Rounded off to the nearest integer)', '', 'uploads/Untitled_picture7_converted.jpg'),
(45, 4, 'E', 'The force between two charges is 60 Newton. If the distance between them is doubled, find the new force.', '', 'uploads/'),
(46, 5, 'A', ' The value of x(2t+3) at t=-2 is', '', 'uploads/Untitled_picture8_converted.jpg'),
(47, 5, 'B', ' The value of x(t/2-1) at t = -2 is', '', 'uploads/Untitled_picture8_converted.jpg'),
(48, 5, 'B', 'The value of x(t/2-1) at t = -2 is', '', 'uploads/1.jpg'),
(49, 5, 'C', ' The value of x(3t-1) at t =- 2 is', '', 'uploads/2.jpg'),
(50, 5, 'D', 'The value of x(t/2+3) at t = 2 is', '', 'uploads/3.jpg'),
(51, 5, 'E', ' The value of x(4t-3) at t = 2 is', '', 'uploads/4.jpg'),
(52, 3, 'C', 'Using the mesh current method, find the branch current IR1(in mA).', '', 'uploads/132`.jpg'),
(55, 6, 'A', 'Find whether the discrete-time signal x (n) = (-1)^n is periodic or not. If non-periodic, enter the value 0 and if periodic enter the value of fundamental period .', '', 'uploads/'),
(56, 6, 'B', 'Find the time period of the continuous time signal , x(t) = sin(pi*t/3) + cos(pi*t/4).', '', 'uploads/'),
(57, 6, 'C', ' Find the period of the discrete time signal , x[n] = cos(pi*n) * sin[pi/4 *n].', '', 'uploads/'),
(58, 6, 'D', ' If the period of the signal below is of the form n*pi , find n. Given x(t) = cos3  (4t).', '', 'uploads/'),
(59, 6, 'E', ' A continuous time periodic signal x(t) having  a period 4 is convolved with itself . Find the time period of the resulting signal.', '', 'uploads/'),
(60, 7, 'A', ' Calculate the resistance of a wire of 100m having a uniform cross-section of 0.1 mm^2 ,if the wire is made of Manganin having a resistivity of 50*10^-8 ohm-m.', '', 'uploads/'),
(62, 7, 'B', 'If the wire is nce would indrawn out to three times its original length , its resistacrease by ____ times.', '', 'uploads/'),
(64, 7, 'C', ' An electric lamp consumes 100 watts of power. If the supply voltage is 220V, determine the resistance of the filament.', '', 'uploads/'),
(65, 7, 'D', ' The demand for the lightning of a small village is 50A at 200V. This is supplied from a dynamo at a distant station, the generated voltage being 220V. Find the energy consumed in 10 hours in the village in kWh.', '', 'uploads/'),
(66, 7, 'E', 'A capacitor of capacitance 1mF is charged to 10kV and then discharged through a wire. Find the heat produced in Joules.', '', 'uploads/'),
(67, 8, 'A', 'Fill in the blank: f(W,X,Y,Z) = min(1,3,5,7,8,12,14) f= (not W)(Z) + (____)(not Y)(not Z)+(W)(X)(not Z)', '', 'uploads/'),
(68, 8, 'A', 'Fill in the blank: f(W,X,Y,Z) = min(1,3,5,7,8,12,14)       f= (not W)(Z) + (____)(not Y)(not Z)+(W)(X)(not Z)', '', 'uploads/'),
(69, 8, 'B', ' Before an SOP implementation the expression X = AB((not C)D + EF) 	would require how many gates?', '', 'uploads/'),
(70, 8, 'C', 'Convert 25.625 in base 10  to octal.', '', 'uploads/'),
(71, 8, 'D', 'Convert ABCD (base16) to octal.', '', 'uploads/'),
(72, 8, 'E', ' Ones complement of 235(base 10) is (base 10). ', '', 'uploads/'),
(73, 9, 'A', 'If the input is 0 find the value of Q.', '', 'uploads/Untitled_picture10.jpg'),
(74, 9, 'B', 'If the signal given as input to the 4 to 2 decoder is {0,1,0,0} 	 and the output Is A and B. Find the value of A+ B.', '', 'uploads/'),
(75, 9, 'c', 'If the signal given as input to a 4 to 1 MUX is {X,0,Y,1} having the select lines as  P and Q , the output obtained is Z = (not Q) + PQ. Find the value of Y.', '', 'uploads/'),
(76, 9, 'D', 'There are two AND gates which are given the inputs as 0 and 1. The outputs of these gates is given as input to an adder which is then fed to an  	Inverter . Find the final output given out by inverter.', '', 'uploads/'),
(77, 9, 'E', 'A hollow Sphere is charged to 12micro Coulomb of charge. If the potential at the surface of the Sphere is A*10^4.Find A.', '', 'uploads/'),
(78, 10, 'A', 'A certain transformer has 400 turns in the primary winding and 2,000 turns in the secondary winding. The turns ratio is.', '', 'uploads/'),
(79, 10, 'B', 'The field of a 6-pole d.c. generator each having 500 turns, are connected in series. When the field is excited , there is a magnetic flux of 0.02 Wb/pole . If the field current is opened in 0.02 second and the residual magnetisation is 0.002 Wb/pole , calculate the average voltage which is induced across the terminals in volts.', '', 'uploads/'),
(80, 10, 'C', 'If a 3-input NOR gate has eight input possibilities, how many of those possibilities will result in a HIGH output?', '', 'uploads/'),
(81, 10, 'D', 'If a 3-input OR gate has eight input possibilities, how many of those possibilities will result in a HIGH output?', '', 'uploads/'),
(82, 10, 'E', 'How many input combinations would a truth table have for a six-input AND gate?', '', 'uploads/'),
(83, 11, 'A', 'Find the Cost of running a 2KW Heater for 10 Hours at 50 paise/KWH in Rupees.', '', 'uploads/'),
(84, 11, 'B', 'The Demand for lighting a small village is 50A at 200V.This is supplied from a dynamo at a distant station, the generated voltage being 220V.Find the number of KWH wasted in the loads in the same time.  ', '', 'uploads/'),
(85, 11, 'C', 'Two heaters A and B are in parallel across supply voltage V. Heater A produces 500KCAL in 20 minutes and B produces 1000KCAL in 10 minutes. Resistance of A is 10 ohms while that of B is 2.5 ohms. Find the heat produced in 5 minutes in KCAL.', '', 'uploads/'),
(86, 11, 'D', 'An Electric Kettle was marked 500W, 230-V and was found to take 15 minutes to bring 1kg of water at 15degrees C TO Boiling Point. Determine the Heat Efficiency of the Kettle in percentage. (Given specific heat of water =1, Boiling temp=100 degrees).', '', 'uploads/'),
(87, 11, 'E', 'How many entries would a truth table for a four-input NAND gate have?', '', 'uploads/'),
(88, 12, 'A', 'The per unit impedance of a transmission line on a 50 MVA, 132 kV base is 0.5. The per unit impedance on 100 MVA base will be .', '', 'uploads/'),
(89, 12, 'B', '2. The surge impedance of a 3-phase, 132 kV transmission is 750 Î©. The SIL is ____ MW. (rounded off to nearest integer).', '', 'uploads/'),
(90, 12, 'C', ' The magnitude of open circuit and short circuit impedance of a transmission line are 120 ohm and 30 ohm respectively. The characteristic impedance of line is ____ ohm.', '', 'uploads/'),
(91, 12, 'D', 'A generating station has a maximum demand of 25 MW, load factor of 60 %, a plant capacity factor of 50 % and a plant use factor of 72 % the maximum energy that could be produced daily is  _____MWh/day.', '', 'uploads/'),
(92, 12, 'E', ' Find the steady state power limit of a system consisting of a generator of 0.5 per unit reactance connected to an infinite bus through a series of reactance of 1 pu. The terminal voltage of the generator held at 1.2 pu and the voltage of the infinite bus 1 pu.(rounded off to the nearest integer).', '', 'uploads/'),
(93, 23, 'rt', 'qw', 'gg', 'uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `trial`
--

CREATE TABLE IF NOT EXISTS `trial` (
  `Sr No.` int(11) NOT NULL AUTO_INCREMENT,
  `Question_No` int(11) NOT NULL,
  `Question` varchar(3000) NOT NULL,
  `Answer` varchar(3000) NOT NULL,
  `File` varchar(3000) NOT NULL,
  PRIMARY KEY (`Sr No.`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `question` int(3) NOT NULL,
  `subquestion` char(3) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `question`, `subquestion`, `status`) VALUES
('shashankjha1994', '', 1, 'a', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
