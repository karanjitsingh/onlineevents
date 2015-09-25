-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 03:48 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mechatron`
--

-- --------------------------------------------------------

--
-- Table structure for table `oe_mechatron_questions`
--

CREATE TABLE IF NOT EXISTS `oe_mechatron_questions` (
`Id` int(10) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `O1` varchar(500) NOT NULL,
  `O2` varchar(500) NOT NULL,
  `O3` varchar(500) NOT NULL,
  `O4` varchar(500) NOT NULL,
  `O5` varchar(500) NOT NULL,
  `O6` varchar(500) NOT NULL,
  `Difficulty` varchar(100) NOT NULL,
  `Image` varchar(500) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=191 ;

--
-- Dumping data for table `oe_mechatron_questions`
--

INSERT INTO `oe_mechatron_questions` (`Id`, `Question`, `O1`, `O2`, `O3`, `O4`, `O5`, `O6`, `Difficulty`, `Image`) VALUES
(1, 'In the full form of JCB, what does J, C and B stand for?', 'Bashforth', 'Joseph', 'Jacob', 'Cecyll', 'Cerill', 'Bamford', 'Easy', 'uploads/'),
(2, 'Which one of the following are not found in a Diesel engine?', 'Glowplugs', 'MPFi System', 'CRDi System', 'Sparkplugs', 'Fuel injection unit', 'Carburetor', 'Easy', 'uploads/'),
(3, 'What do ESC, EBD and ABS stand for?', 'Electronic Stability Control', 'Electronic Brake Distribution', 'Absolute Brake Sensor', 'Anti-lock Brake System', 'European Society of Cardiology', 'Embedded Systems Conference', 'Easy', 'uploads/'),
(4, 'Which of the following are the right phases in an evolution of a star?', 'White Giant', 'Red Giant', 'White Dwarf', 'Proton stars', 'Neutron stars', 'Blue Dwarf', 'Easy', 'uploads/'),
(5, 'Describe the correct three languages that are widely used in a Programmable Logic Controller [PLC]', 'Structured Text', 'HTML', 'Ladder Logic', 'Instruction list', 'FORTRAN', 'PASCAL', 'Medium', 'uploads/'),
(6, 'Which of these are the correct classification of engines based on the arrangement of cylinders?', '6-cylinder engine', 'Wankel engine', 'W-engine', 'VR engine', 'Multijet engine', 'TDi engine', 'Easy', 'uploads/'),
(7, 'Which of these elements/alloys are used to make engine pistons?', 'Al-Si alloy', 'Carbon fiber', 'Titanium', 'SG iron', 'Forged steel', 'Leaded bronze', 'Medium', 'uploads/'),
(8, 'The following is an image of a simple Lathe. Label the parts mentioned as 1, 2 and 3 respectively.', 'Tool post', 'Compound rest', 'Cross slide', 'Lead screw', '3-jaw chuck', 'Face plate', 'Easy', 'uploads/2D9321910F6259D8EDA3159E3F6F136B76831DAF_large.jpg'),
(9, 'Pick out the right grades of engine oils suitable for fuel economy savings, enhancement of engine performance and good cold start from the following', '0W-30', 'DOT 3', 'ATF-DW 1', '0W-40', '5W-4', '10W-40', 'Hard', 'uploads/'),
(10, 'What does APP, MAP and CKP sensors stand for in an engine?', 'Camshaft position sensor', 'Mass air pressure sensor', 'Manifold absolute pressure sensor', 'Crankshaft position sensor', 'Auxiliary pedal play sensor', 'Accelerator pedal position sensor', 'Easy', 'uploads/'),
(11, 'Given (A), (B) and (C) are some symbols of different types of limit switches. Match them properly. (Electronics)', 'Level actuated limit switch', 'Flow actuated limit switch', 'Pressure actuated limit switch', 'Proximity actuated limit switch', 'Temperature actuated limit switch', 'Electronically actuated limit switch', 'Easy', 'uploads/01053.png'),
(12, 'Pick out the correct 3 terms that define the performance characteristics of transducers. (Mechatronics)', 'Flexibility', 'Dead band/Time', 'Non-linearity', '', '', '', 'Easy', 'uploads/'),
(13, 'Pick out the correct 3 terms that define the performance characteristics of transducers. (Mechatronics)', 'Flexibility', 'Dead band/Time', 'Non-linearity', 'Reliability', 'Hysteresis error', 'Cost efficient', 'Medium', 'uploads/'),
(14, 'Choose the 3 right sensors that are used in accordance with temperature control systems. (Mechatronics)', 'Bimetallic strips', 'Photodiodes', 'Orifice plate', 'Thermistor', 'Piezoelectric sensor', 'Thermocouple', 'Easy', 'uploads/'),
(15, 'Select the 3 stable isotopes of Mercury. (Chemistry)', '197 Hg', '202 Hg', '212 Hg', '204 Hg', '205 Hg', '312 Hg', 'Medium', 'uploads/'),
(16, 'What is the IAU (International Astronomical Union) criterion for defining a full sized planet? (Astronomy)', 'The planet must have its own axis of revolution', 'The planet must revolve around the sun', 'The planet must assume hydrostatic equilibrium', 'The planet must have a definite path of orbit', 'There must be no other bodies of comparable size that is influenced by the gravity of the planet itself', 'The planet must be made up of minerals and rocks or dense gases', 'Hard', 'uploads/'),
(17, 'Name any 3 devices that are powered by the rotation of the crankshaft. (Automotive)', 'Supercharger', 'Turbocharger', 'Water pump', 'Camshaft', 'Ignition distributor', 'Power steering system', 'Medium', 'uploads/'),
(18, 'Mention any 3 provisions/ arrangements incorporated in a vehicle to prevent cold starts. (Automotive)', 'Compensator jet', 'Choke', 'Idling passage', 'Auxiliary pump with an acceleration jet', 'Auxiliary air bypass', 'Adjustable jet area', 'Hard', 'uploads/'),
(19, 'DNA is a __________ of two polymers (strands) of ___________ joined together by _____________ {Fill in the given blanks} (Biotechnology)', 'Double helix', 'Nucleotides', 'Hydrogen bonds', 'Ribosomes', 'Covalent bonds', 'Phosphate groups', 'Easy', 'uploads/'),
(20, 'What was the main aim for the construction of the Large Hadron Collider near Geneva, Switzerland? (Physics)', 'To prove the existance of Higgs Boson particle', 'To understand super symmetry', 'To break down sub atomic particles', 'Detection of any extra dimentions', 'To create sub atomic particles', 'Helps create nuclear fusion reactions', 'Hard', 'uploads/'),
(21, 'In the Indian flag, what do the Saffron, White and Green colors denote? (General)', 'Self-righteousness', 'Calm and quiet', 'Peace and truth', 'Strength and courage', 'Patriotism', 'Fertility and Auspiciousness', 'Easy', 'uploads/'),
(22, 'Given below is a picture of a spark plug. Mention correctly the parts labelled as 1, 2 and 3. (Automotive)', 'Centre electrode', 'Top insulator', 'Ground electrode', 'Electrode gap', 'Corrugations', 'Terminal nut', 'Medium', 'uploads/tech-plug02.jpg'),
(23, 'Which of these terms are related to steering geometry? (Automotive)', 'ABS', 'Cetane number', 'Camber', 'EGR', 'Toe-out', 'Kingpin inclination', 'Hard', 'uploads/'),
(24, 'Given below is the pin configuration of a 555 Timer IC.  Label the terminals mentioned as 1, 2 and 3 correctly. (Electronics)', 'Vcc', 'Control voltage', 'Discharge', 'Threshold', 'Reset', 'Trigger', 'Easy', 'uploads/F12QE7IH6MF005C.LARGE.jpg'),
(25, 'Given below is a sketch of a Cathode Ray Oscilloscope. Mark the parts labelled as 1, 2, 3 correctly. (Mechatronics)', 'Focusing anode', 'Fluorescent screen', 'Accelerating anode', 'X plates', 'Y plates', 'Filament', 'Medium', 'uploads/scan0021.png'),
(26, 'Given below is a figure of the assembly of a torque converter. Label the parts mentioned as 1, 2 and 3 correctly. (Automotive)', 'Flywheel', 'Stator', 'Impeller', 'Clutch disc', 'Turbine', 'Pressure plate', 'Medium', 'uploads/torque-converter-explained-500x296.jpg'),
(27, 'Which of the following are types of valves? (Mechanical)', 'Schrader valve', 'Safe stress valve', 'Butterfly valve', 'Stroke valve', 'Needle valve', 'Rocker arm', 'Medium', 'uploads/'),
(28, 'Select the following correct statements related to black holes: (Astronomy)', 'A black hole reflects all the light falling on it', 'A black hole reflect no light falling on it', 'To a distant observer, clocks near a black hole stop working', 'To a distant observer, clock slows down', 'Black holes are formed when massive stars collapse', 'Black holes are formed as a result of star collision', 'Medium', 'uploads/'),
(29, 'Which of the following are isomers of hexane? (Chemistry)', '2,3-dimethylbutane', '2-methylpentane', '3-methylbutane', '3-methylpentane', '2,2-dimethylpropane', '2-methylhexane', 'Medium', 'uploads/'),
(30, 'Choose the right statements: (Chemistry)\r\nA molecule is considered to be chiral if-', 'There is a symmetric carbon atom', 'There exists another molecule that is non-superimposable', 'There exists another molecule of varying compositions', 'There exists another molecule which is its mirror image', 'There exists another molecule of identical composition', 'There exists another molecule that is not its mirror image', 'Hard', 'uploads/'),
(31, 'Which of the following are the right characteristics of a LVDT? (Mechatronics)', 'Measures change in voltage', 'Measures displacement', 'Converts change in electrical signal to rectilinear motion', 'LVDT requires electrical contact between core and coil assembly', 'They can be operated at harsh environments under high shock', 'They can be used at cryogenic as well as high temperatures', 'Hard', 'uploads/'),
(32, 'Following are three types of sensors. Match them with their correct outputs. (Mechatronics)\r\n?	Piezoelectric sensor\r\n?	Accelerometer\r\n?	Photodiode\r\n\r\n', 'Resistance', 'Inductance', 'Capacitance', 'Voltage', 'Current', 'Reactance', 'Medium', 'uploads/'),
(33, 'Which of the following are discontinued mobile operating systems? (Technology)', 'Bada OS', 'iOS', 'Windows OS', 'Symbian OS', 'Palm OS', 'Ubuntu touch', 'Easy', 'uploads/'),
(34, 'What do the terms HSUPA, HSPA and HSDPA stand for? (Technology)', 'High Speed Upload Access', 'High Speed Packet Access', 'High Speed Downlink Access', 'High Speed Download Access', 'High Speed Uplink Access', 'High Speed Paid Access', 'Medium', 'uploads/'),
(35, 'What does FRP stand for? (Material Science)', 'Fiber', 'Refined', 'Reinforced', 'Polymer', 'Fabric', 'Polyester', 'Medium', 'uploads/'),
(36, 'Which of these are not conventional ignition components? (Automotive)', 'Contact breaker', 'Solenoid', 'Ballast Resistor', 'Inductor', 'Distributor', 'Ignition Advance', 'Hard', 'uploads/'),
(37, 'Which of the following are commonly used refrigerants? (Mechanical)', 'Carbon monoxide', 'R 22', 'Carbon tetrachloride', 'Nitrogen', 'Freon 32', 'Freon 12', 'Medium', 'uploads/'),
(38, 'In an I.C. Engine, which of these factors affect indicated power? (Mechanical)', 'Mean effective pressure', 'Number of cylinders', 'Stroke', 'Compression ratio', 'Torque', 'Valve diameter', 'Medium', 'uploads/'),
(39, 'Which of the following statements are correct? (Mechanical)', 'A good lubricating oil must be highly volatile', 'Viscosity of a good lubricant must change with temperature', 'Viscosity of a good lubricant must not vary with temperature', 'A good lubricating oil must have low volatility', 'A good lubricant must deposit minimum amount of carbon', 'A good lubricant can deposit more carbon residue', 'Hard', 'uploads/'),
(40, 'Which of these are methods of pressure welding? (Workshop)', 'Arc welding', 'Butt welding', 'Gas welding', 'Spot welding', 'Seam welding', 'Thermit welding', 'Medium', 'uploads/'),
(41, 'Which of the following statements are related to Brazing? (Workshop)', 'Useful for joining both similar and dissimilar metals', 'Useful for similar metals only', 'Alloy has higher melting point than the metal', 'Alloy has lower melting point than the metal', 'No direct melting of the base metals being joined', 'Direct melting of the base metals being joined', 'Hard', 'uploads/'),
(42, 'Which of the following factors affect the glass transition temperature of a polymer? (Chemistry)', 'Chain rigidity', 'Chain geometry', 'Hydrogen bond between polymer chains', 'High density of the polymer', 'Molecular aggregates', 'Absence of plasticizers', 'Medium', 'uploads/'),
(43, 'Which if these are part of a television set? (Electronics)', 'Tension Band', 'Ring plate', 'Envelope or Bulb', 'Bell', 'Cable Cap', 'Cover Disc', 'Medium', 'uploads/'),
(44, 'Which of these are parts of channelization in mobile communication? (Technology)\r\n', 'FDMA', 'TDMA', 'PDMA', 'SDMA', 'WDMA', 'CDMA', 'Medium', 'uploads/'),
(45, 'Which of these information are contained by a sim? (Technology)', 'PUK', 'Data number', 'Part number', 'Charging information', 'Local channel number', 'Pin code', 'Hard', 'uploads/'),
(46, 'Mention 3 rapid prototyping techniques available in industries. (Manufacturing)', 'Impact extrusion', 'Drop forging', 'Selective laser sintering', 'Fused deposition Modeling', 'Vacuum molding', 'Three dimensional printing', 'Hard', 'uploads/'),
(47, 'Which of these are limitations of Stereo-Lithography process? (Manufacturing)', 'Requires post curing', 'Does not give good surface finish', 'There is warpage and shrinkage', 'Requires support structures', 'It is not very accurate', 'No post curing is required', 'Hard', 'uploads/'),
(48, 'Which of these are types of jet engines? (Aeronautical)', 'Turbofan', 'Turboprop', 'Scramjet', 'Multi jet', 'Water jet', 'Pulse detonation', 'Medium', 'uploads/'),
(49, 'Following is a diagram of an Arduino Uno microcontroller board. Mention the parts labeled as 1, 2 and 3 correctly. (Electronics)', 'ATMega328 microcontroller', 'Serial Programmer', 'Analog In', 'Ground pins', 'Serial Out', 'Serial In', 'Medium', 'uploads/arduino_uno_2.jpg'),
(50, 'How do stealth aircrafts remain undetected from RADAR? (Aeronautical)', 'By decreasing the size of the plane', 'By using absorbent materials', 'By making use of uneven surfaces', 'By flying at very high altitudes', 'Using dielectric materials', 'By flying at very low altitudes', 'Medium', 'uploads/'),
(51, 'What catalysts are used in a catalytic converter? (Automotive)', 'Scandium', 'Strontium', 'Palladium', 'Rhodium', 'Platinum', 'Titanium', 'Easy', 'uploads/'),
(52, 'Which of these are carbon nano-structures? (Molecular Chemistry)', 'Graphenated Carbon nanotube', 'Fullerenes', 'Carbon fibers', 'Graphene', 'Graphite', 'Torus', 'Medium', 'uploads/'),
(53, 'Which of the following companies are associated with the business magnate Elon Reeve Musk? (General)', 'Amazon', 'PayPal', 'Sussex Solar', 'Solar City', 'Tesla Motors', 'Pratt & Whitney', 'Medium', 'uploads/Elon_Musk_2015.jpg'),
(54, 'Which of the following were main contributions to the world of Physics by the great scientist Albert Einstein? (General)', 'Brownian motion', 'Quantum mechanics', 'Unified field theory', 'Special theory of relativity', 'Photoelectric effect', 'Higgs Boson particle', 'Easy', 'uploads/'),
(55, 'Following is a diagram of a spur gear. Label correctly the parts mentioned as A, B and C. (Mechanical)', 'Addendum circle', 'Dedendum', 'Flank', 'Addendum', 'Face width', 'Top land', 'Easy', 'uploads/2379348_635580774262656250.jpg'),
(56, 'Following is an image of an epicyclic gear. Label the parts mentioned as 1, 2 and 3 correctly. (Mechanical)', 'Annulus', 'Pinion', 'Planetary pinion', 'Planetary carrier', 'Sun gear', 'Mitre gear', 'Easy', 'uploads/40-15.jpg'),
(57, 'Which of these are types of microphones?', 'Double plated', 'Single core', 'Flower belly', 'Dynamic', 'Condenser', 'Ribbon', 'Medium', 'uploads/'),
(58, 'Which of these are parts of a loudspeaker?', 'Dust cover', 'Spider', 'Dynamic', 'Condenser', 'Multi core', 'Voice coil', 'Easy', 'uploads/'),
(59, 'Which of these are types of a loudspeaker?\r\n', 'Moving coil', 'Electromagnetic', 'Electrostatic', 'Supersonic receiver', 'Wire headed', 'Ribbon', 'Medium', 'uploads/'),
(60, 'Which of these are types of Digital Subscriber Line?', 'ADSL', 'MDSL', 'SDSL', 'TDSL', 'PDSL', 'VDSL', 'Hard', 'uploads/'),
(61, 'Which of these statements that are associated with string theory are correct? (Physics)', 'According to string theory point-like particles can be modelled as three dimensional objects', 'According to string theory point-like particles can be modelled as one dimensional objects', 'Different elementary particles may be viewed as strings in random motion', 'One of the vibrational states gives rise to a boson', 'Different elementary particles may be viewed as vibrating strings', 'One of the vibrational states gives rise to a graviton', 'Hard', 'uploads/'),
(62, 'Which of these are types of camera tubes? (Technology)', 'VIDICON', 'IMAGE ORTHICON', 'PLUMBICON', 'ORICON', 'VIDI SERON', 'CAMERA TUNER', 'Medium', 'uploads/'),
(63, 'Which of these are styles of hearing aids? (Medical)', 'Bone conduction', 'Ear canal hold', 'Air receiver', 'Electrosonic wave generator', 'Air conduction', 'BAHA', 'Hard', 'uploads/'),
(64, 'Which of these are parts of a vapor compression refrigeration cycle? (Mechanical)', 'Pressure regulator', 'Throttle valve', 'Ozonization', 'Ionization', 'Compressor', 'Condenser', 'Medium', 'uploads/'),
(65, 'Which of the following is the unit of radioactivity? (Nuclear physics)', 'rutherford', 'curie', 'roentgen', 'becquerel', 'planck', 'amu', 'Medium', 'uploads/'),
(66, 'Which of the following is dimensionless? (Physics)', 'Relative velocity', 'Magnetic intensity', 'Relative refractive index', 'Relative density', 'Relative permittivity', 'Absolute velocity', 'Medium', 'uploads/'),
(67, 'Which of the following statements associated with the properties of gamma rays are true? (Atomic physics)', 'These are undeflected by electric or magnetic fields', 'These produce strong ionization', 'These travel with the velocity of light', 'They are deflected by electric or magnetic fields', 'These have the strongest penetrating power', 'They are not harmful to human tissues', 'Hard', 'uploads/'),
(68, 'Which of the following are the launch vehicles developed by SpaceX program? (General)\r\n', 'Falcon X', 'Falcon 1', 'Falcon 9', 'Dragon', 'Falcon heavy', 'SX-8', 'Easy', 'uploads/'),
(69, 'Which of the statements associated with isobars, isotones and isotopes correct? (Radioactivity)', 'Isotopes are atoms having same number of neutrons', 'Isotones are atoms having same number of neutrons', 'Isobars are molecules having same number of atoms and same number of electrons', 'Isotopes of an element have different number of neutrons', 'Isobars have same number of nucleons', 'Isotones are atoms with same mass number', 'Medium', 'uploads/'),
(70, 'Which of the following are the types of injection systems used in a diesel engine? (Automotive)', 'Common Rail system', 'Multi-point injection', 'Solid injection', 'Liquid injection', 'Blast injection', 'Single point injection', 'Medium', 'uploads/'),
(71, 'Which of the following are types of rear axles? (Automotive)', 'Quarter floating rear axle', 'Semi floating rear axle', 'Transverse rear axle', 'Fully floating rear axle', 'Three quarter floating rear axle', 'Non floating rear axle', 'Medium', 'uploads/'),
(72, 'Following is a simple diagram of the MacPherson strut type of suspension system. Label the parts mentioned as A, B and C correctly. (Automotive)', 'Channel connecter', 'Cross member', 'Lower wishbone arm', 'Helical spring', 'Damper', 'Strut support', 'Medium', 'uploads/mc pherson.jpg'),
(73, 'Newton per square metre is the unit of - (Elasticity)', 'Pressure', 'Thrust', 'Stress', 'Strain', 'Young?s modulus', 'Bulk modulus', 'Medium', 'uploads/'),
(74, 'Which of the following statements are correct? (Elasticity)', 'The shear modulus of a liquid is infinite', 'Bulk modulus of a perfectly rigid body is infinity', 'According to Hooke?s law, the ratio of stress and strain remains constant', 'Both (a) and (b) are correct', 'Both (c) and (d) are correct', 'Both (a) and (c) are correct', 'Hard', 'uploads/'),
(75, 'Which of the following are correct statements regarding the Woodruff type of Key? (Mechanical)', 'It is a kind of saddle key', 'It is a kind of sunk key', 'It cannot be used on tapered shafts', 'It can be used on tapered shafts', 'It does not permit axial movement between shaft and hub', 'It permits axial movement between shaft and hub', 'Hard', 'uploads/'),
(76, 'Which of these are advantages of flexible drives over rigid drives? (Mechanical)', 'They can transmit power over comparatively long distances', 'Velocity ratio is not constant', 'They can transmit power over short distances only', 'It helps in shock absorption', 'It is cheap compared to rigid drives', 'There is a loss of power resulting in low efficiency', 'Hard', 'uploads/'),
(77, 'Which of the following quantities related to a lens depend on the wavelength or wavelengths of incident light? (Optics)', 'Power', 'Focal length', 'Chromatic aberration', 'Radii of curvature', 'Pole', 'Principal axis', 'Hard', 'uploads/'),
(78, 'Given below is a standard P-V diagram for an Otto cycle engine. Label the processes mentioned as A, B and C correctly. (Thermodynamics)\r\n', 'Constant volume heat addition', 'Constant volume heat rejection', 'Isentropic compression', 'Isentropic expansion', 'Suction stroke', 'Exhaust stroke', 'Medium', 'uploads/ideal-air-standard-otto-cycle.png'),
(79, 'In the fractional distillation of crude oil, what by products are obtained at 200? ? 300? C, above 500? C and below 30? C ? (Chemistry)', 'Refinery gas', 'Petrol', 'Naphtha', 'Paraffin wax', 'Diesel oil', 'Bitumen', 'Medium', 'uploads/'),
(80, 'Which of the following elements belong to the family of Chalcogens ?  (Chemistry)', 'Oxygen', 'Lanthanum', 'Polonium', 'Tellurium', 'Radon ', 'Yttrium', 'Easy', 'uploads/'),
(81, 'Which of these are imperfections in solids? (Crystallography)', 'Schottky defect', 'Space dislocation', 'Inter-ionic defects', 'Edge dislocations', 'Ionic defect', 'Frenkel defect', 'Medium', 'uploads/'),
(82, 'Which of these are possible geometric shapes of crystal lattice? (Crystallography)', 'Trigonal', 'Cubic', 'Triclinic', 'Orthorhombohedral', 'Orthorhombic', 'Pentagonal', 'Hard', 'uploads/'),
(83, 'Which of the following statements are true regarding body centered cubic lattice? (Crystallography)', 'Atomic Radius = a / (2&#8730;2) , where a is the edge length', 'No. of atoms per unit cell = 2 atoms', 'No. of atoms per unit cell = 1 atom', 'Co-ordination no. = 12', 'Co-ordination no. = 8', 'Packing density = 0.68', 'Hard', 'uploads/'),
(84, 'What do the terms PTFE, PAN and PVC stand for? (Polymer science)\r\n', 'Polytetrafluoroethylene', 'Polyvinylchlorine', 'Polytetrafluoroethene', 'Polyacrylonitrate', 'Polyacrylonitrile', 'Polyvinylchloride', 'Hard', 'uploads/'),
(85, 'Which of the following are Analgesics? (Biochemistry)', 'Aspirin', 'Equanil', 'Ibuprofen', 'Barbituric acid', 'Naproxen', 'Luminal', 'Hard', 'uploads/'),
(86, 'Which of the following codes are SELF-COMPLEMENTING? (Digital electronics)', '8421 code', '2421 code', '84-2-1 code', 'Gray code', '5421 code', 'XS-3 code', 'Hard', 'uploads/'),
(87, 'Which of the following rules are not correct while construction of a PLC ladder logic diagram? (Control theory)', 'No vertically oriented contacts allowed', 'Vertically oriented contacts are allowed', 'A coil must be inserted at the end of a rung', 'Unlimited contacts can be allowed in a matrix', 'Flow can be in both directions', 'Flow must occur from left to right', 'Hard', 'uploads/'),
(88, 'Which of the following terms relate to the specifications of a stepper motor? (Mechatronics)', 'Slew Range', 'Slew Rate', 'Holding torque', 'Pull out Rate', 'Pull in Power', 'Pull out Power', 'Medium', 'uploads/'),
(89, 'For a system to attain thermodynamic equilibrium, what states of equilibrium must be achieved? (Thermodynamics)', 'Chemical equilibrium', 'Pressure equilibrium', 'Mechanical equilibrium', 'Electro-mechanical equilibrium', 'Electrostatic equilibrium', 'Thermal equilibrium', 'Medium', 'uploads/'),
(90, 'Which of the following are pressure thermometers? (Thermodynamics)', 'Resistance thermometer', 'Gas-filled thermometer', 'Vacuum pressure thermometer', 'Radiation pyrometer', 'Liquid thermometer', 'Vapour pressure thermometer', 'Easy', 'uploads/'),
(91, 'Which of the following are factors that affect the resistance of a conductor? (Electronics)', 'Specific resistance', 'Volume of the conductor', 'Surface area of the conductor', 'Cross sectional area of the conductor', 'Length of the conductor', 'Ductility', 'Easy', 'uploads/'),
(92, 'What do the below given circuit symbols represent? (Electronics)', 'Light emitting diode', 'Photodiode', 'NPN transistor', 'Oscilloscope', 'AC source', 'PNP transistor', 'Easy', 'uploads/symbols.png'),
(93, 'Given below is a diagram of heated Oxygen Sensor. Label the parts mentioned as A, B and C (Automotive)', 'Heater element', 'Zirconium trioxide ceramic sensing element', 'Zirconium dioxide ceramic sensing element', 'Heater contact', 'Cable connector', 'Housing', 'Hard', 'uploads/heatedo2sensor.gif'),
(94, 'What are the correct abbreviations for GPWS, CFIT and TAWS? (Aeronautical)', 'Global Positioning With Satellite view', 'Terrain Awareness Warning System', 'Topography and Altitude Warning System', 'Controlled flight into Terrain', 'Cockpit Functionality and Instrument Test', 'Ground-Proximity Warning system', 'Medium', 'uploads/'),
(95, 'Which groups do the above general formula belong to? (Organic chemistry)', 'Aldehydes', 'Carboxylic acids', 'Amines', 'Ketones', 'Alcohols', 'Alkenes', 'Easy', 'uploads/genformula.png'),
(96, 'Which of the following are parts of a Black hole? (Cosmology)', 'Event horizon', 'Wormhole', 'Schwarzschild radius', 'Acceleration disk', 'Jet stream', 'Singularity', 'Medium', 'uploads/'),
(97, 'Which of the following statements are correct? (Physics)', 'The force of kinetic friction is conservative', 'The force of kinetic friction is non-conservative', 'Impulsive forces are brought into play in collisions', 'Impulsive forces are not brought into play during collisions', 'A force which depends upon the direction of the body?s velocity is non-conservative', 'A force which depends upon the direction of the body?s velocity is conservative', 'Medium', 'uploads/'),
(98, 'You lift a suitcase from the floor and keep it on the table. The work done by you on the suitcase does not depend on- (Kinematics)', 'Your weight', 'Weight of the suitcase', 'Path taken by the suitcase', 'Height of the table', 'Your height', 'Time taken by you in doing so', 'Medium', 'uploads/'),
(99, 'A particle moves on a straight line with a uniform velocity. Its angular momentum is-  (Kinematics)', 'Is always zero', 'Is zero about a point on the straight line', 'Is not zero about a point away from the straight line', 'About any given point remains constant', 'Continuously varies', 'Depends on the size of the particle', 'Medium', 'uploads/'),
(100, 'Which of the following is correct? (Gravitation)', 'Kepler?s third law is a consequence of law of conservation of angular momentum', 'Kepler?s third law is a consequence of law of conservation of linear momentum', 'Acceleration due to gravity does not depend upon position', 'The value of g at a certain height h above the surface of the Earth is g/4. The height h is then equal to radius R of the earth', 'The gravitational force extended by the Sun on Earth is equal to the force extended by the Earth on the Sun', 'Acceleration due to gravity is highly dependent upon the position', 'Medium', 'uploads/'),
(101, 'Name the following aromatic compounds. (Organic chemistry)', 'Methyl cyclohexane', 'Benzene', 'Cumene', 'Toluene', 'Cyclohexane', 'Ethyl benzene', 'Medium', 'uploads/aromatc.png'),
(102, 'Which of these are not Android OS versions? (General)', 'Android Froyo', 'Android Cupcake', 'Android Brownie', 'Android Eclair', 'Android Jellyfoam', 'Android Honeybean', 'Easy', 'uploads/'),
(103, 'Which of the following are applications of aerogels? (Material science)\r\n', 'A chemical absorbent', 'Used as a catalytic carrier', 'Can be used as a chemical adsorbent', 'Used as a drying agent', 'Used to trap space dust particles', 'Can be used as a fuel', 'Hard', 'uploads/'),
(104, 'Which of the following are Jupiter?s moons? (Astronomy)', 'Ganymede', 'Callisto', 'Titan', 'Dia', 'Rhea', 'Enceladus', 'Easy', 'uploads/'),
(105, 'Which of the following are true regarding the properties of comets? (Astronomy)', 'Comets are basically made up of rocks and heavy gases', 'Comets are made mostly of water, carbon dioxide and ammonia gases', 'Center of the comet is known as nucleus', 'Most comets have a single Dust tail', 'Most comets have two tails', 'A comet?s center is called the core', 'Medium', 'uploads/'),
(106, 'Which of these are properties to look for in the sand during Sand Casting process? (Manufacturing)', 'Adhesion', 'Cohesiveness', 'Refractoriness', 'Surface texture', 'Grain density', 'Collapsibility', 'Medium', 'uploads/'),
(107, 'Which of the following are heating methods involved in brazing process? (Mechanical)', 'Torch brazing', 'Quenching', 'Arc welding', 'Ultraviolet brazing', 'Infrared brazing', 'Blanket brazing', 'Medium', 'uploads/'),
(108, 'Which of the following components are used in the making of a mold for casting? (Manufacturing)', 'Gates', 'Vents', 'Cores', 'Chills', 'Runners', 'Connectors', 'Medium', 'uploads/'),
(109, 'Which of the following are allowances used in pattern making process of a casting? (Manufacturing)', 'Surface allowance', 'Machining allowance', 'Draft allowance', 'Material allowance', 'Shake allowance', 'Metal allowance', 'Hard', 'uploads/'),
(110, 'Select the three ores of Gold. (Elemental Chemistry)', 'Anglesite', 'Krennerite', 'Sylvanite', 'Beryl', 'Columbite-Tantalite (ColTan)', 'Petzite', 'Hard', 'uploads/'),
(111, 'Which of these are types of Welding? (Manufacturing)', 'Thermite welding', 'Metal-Metal welding', 'Metal-inert gas welding', 'Submerged arc welding', 'Tungsten-Flux arc welding', 'Plasma arc welding', 'Medium', 'uploads/'),
(112, 'Which of the following microcontrollers belong to the same family as that of the 8051 microcontroller? (Mechatronics)', '8052 microcontroller', '89C4X microcontroller', '8048X microcontroller', '8031 microcontroller', '8053 microcontroller', '8751 microcontroller', 'Medium', 'uploads/'),
(113, 'Which of the following are not the features of the 8051 microcontroller? (Mechatronics)', '5 interrupt sources', '16 bit Program Status Word', '8 bit CPU with registers A and B', 'It has 3 register banks', 'Internal RAM of 128 bytes', '8 bit Stack Pointer', 'Hard', 'uploads/'),
(114, 'In which of the following ways can a PLC be connected to a computer? (Mechatronics)', 'HDMI cable', 'RS-232 cable', 'FR-422 cable', 'RS-422 cable', 'Ethernet cable', 'XS-233 cable', 'Hard', 'uploads/'),
(115, 'Which of the following are types of Manometers? (Mechanical)', 'Single Column manometer', 'Piezometer', 'U-tube manometer', 'Fluid pressure manometer', 'Differential manometer', 'Dual Column manometer', 'Medium', 'uploads/'),
(116, 'Which of the following are types of fluid flow? (Mechanical)', 'Laminar flow', 'Restricted flow', 'Unrestricted flow', 'Compressible flow', 'Rotational flow', 'Variational flow', 'Medium', 'uploads/'),
(117, 'Which of these are defects observed due to Casting? (Manufacturing)', 'Core shrinkage', 'Allowance defect', 'Expansion defect', 'Core shift', 'Scar', 'Cold shut', 'Medium', 'uploads/'),
(118, 'Which of these are digital noise sources that affect electronic components? (Electronic packaging)', 'E-M noise', 'Interference', 'Shot noise', 'Internal noise', 'Power supply noise', 'Reactance noise', 'Medium', 'uploads/'),
(119, 'Which of the following are methods of soldering used in industries? (Electronic packaging)', 'Thermal soldering', 'Vapor absorption soldering', 'Vapor phase soldering', 'Infrared soldering', 'Wave soldering', 'Micro-wave soldering', 'Hard', 'uploads/'),
(120, 'Which of these are types of Crystal Growth methods? (Crystallography)', 'NZ method', 'CZ method', 'Liquid encapsulated Czochralski method', 'Crystal-Crystal embedded growth', 'Wafer crystal surface growth', 'Float zone method', 'Hard', 'uploads/'),
(121, 'Which of the following are typical tasks of Computer Vision systems? (Mechatronics)', 'Image viewing', 'Image reconstruction', 'Observation', 'Object recognition', 'Object retrieval', 'Motion Analysis', 'Hard', 'uploads/'),
(122, 'Which of the following are processes involved in Image processing? (Mechatronics)\r\n', 'Edge detection', 'Thresholding', 'Region growing', 'Image storage', 'Signal conversion', 'Lighting', 'Hard', 'uploads/'),
(123, 'Following is a simple diagram of an LVDT (linear variable differential transformer). Mention the parts labelled as A, B and C correctly. (Mechatronics)', 'Inner bore', 'Primary coil', 'Ferrous core', 'Hysteresis chamber', 'Encapsulation', 'Secondary coil ', 'Hard', 'uploads/lvdt.gif'),
(124, 'Which of these processes can be used to remove powder coatings? (Manufacturing)', 'De-ionizing process', 'Acid treatment', 'Abrasive blasting', 'Benzyl alcohol treatment', 'Heat treatment', 'Methylene chloride treatment', 'Hard', 'uploads/'),
(125, 'Which of the following are types of Abrasive Blasting processes? (Manufacturing)', 'Bristle blasting', 'Pulse blasting', 'Bead blasting', 'Dry ice blasting', 'Spray blasting', 'Air blasting', 'Medium', 'uploads/'),
(126, 'Which of these are classification of signals based on their features? (Electronics)', 'Discrete time signals', 'Transverse signal', 'Intermittent signal', 'Random signal', 'Deterministic signal', 'Real signal', 'Medium', 'uploads/'),
(127, 'Which of the following terms refers to Screw thread terminology? (Mechanical)', 'Major angle', 'Thread angle', 'Helix angle', 'Thread depth', 'Pitch', 'Minor diameter', 'Medium', 'uploads/'),
(128, 'Which of the following instruments are used for linear measurements? (Instrumentation)', 'Accelerometer', 'Flex sensor', 'Telescope internal gauge', 'Vernier Calipers', 'Hemispherical gauge', 'Plug gauge', 'Easy', 'uploads/'),
(129, 'Which of the following instruments are used for linear measurements? (Instrumentation)', 'Accelerometer', 'Flex sensor', 'Telescope internal gauge', 'Vernier Calipers', 'Hemispherical gauge', 'Plug gauge', 'Easy', 'uploads/'),
(130, 'Which of the following are types of fit? (Metrology)', 'Interference fit', 'Transition fit', 'Transference fit', 'Immediate fit', 'Clearance fit', 'Improper fit', 'Medium', 'uploads/'),
(131, 'What is the use of the specific design of the combustion chamber of a diesel engine? (Automotive)', 'To provide necessary boost', 'To provide enough turbulence', 'To give necessary compression ratio', 'To provide optimum fuel consumption', 'Position for correct and optimum operation of valves and injector', 'To provide a correct path for exhaust gases to flow', 'Hard', 'uploads/'),
(132, 'The age of a man was 36 years when his son was born. The man also has a daughter who is six years older than her brother. The ratio of the present ages of the man and his daughter is at least 7:2. The present age, in years of the man cannot be________. Indicate all such values. (General Aptitude)', '39', '40', '42', '43', '45', '46', 'Hard', 'uploads/'),
(133, 'Which of these are types of lathe? (Manufacturing processes)', 'Rotary lathe', 'Centre lathe', 'Centrifugal lathe', 'Turret and Capstan lathe', 'Bench lathe', 'Vertical lathe', 'Medium', 'uploads/'),
(134, 'Which of these are types of gear finishing processes? (Mechanical)', 'Gear Surfacing', 'Gear Polishing', 'Gear Honing', 'Gear Lapping', 'Gear Buffing', 'Gear Burnishing', 'Hard', 'uploads/'),
(135, 'Which of the following are common Unconventional Machining Methods? (Manufacturing processes)', 'Electron beam machining', 'Plasma arc machining', 'Abrasive jet machining', 'Submerged arc machining', 'Shielded machining', 'Torch machining', 'Medium', 'uploads/'),
(136, '?N? is a two digit positive integer. If the number in its units digit is the square of its tens digit, then which of the following can be possible values of N? (General aptitude)', '10', '11', '24', '30', '36', '39', 'Easy', 'uploads/'),
(137, '?N? is a two digit positive integer. If the number in its units digit is the square of its tens digit, then which of the following can be possible values of N? (General aptitude)', '10', '11', '24', '30', '36', '39', 'Easy', 'uploads/'),
(138, '?N? is a two digit positive integer. If the number in its units digit is the square of its tens digit, then which of the following can be possible values of N? (General aptitude)', '10', '11', '24', '30', '36', '39', 'Easy', 'uploads/'),
(139, 'Which of the following are the correct thread profiles? (Mechanical)', 'Conical thread', 'Acme thread', 'Knuckle thread', 'Smooth thread', 'Buttress thread', 'Inclined thread', 'Medium', 'uploads/'),
(140, 'Which of the following are FPGA (Field Programmable Gate Array) market leaders? (Mechatronics)', 'Texas Instruments', 'SiliconBlue Technologies', 'National instruments ', 'Xilinx', 'Altera', 'Intel', 'Hard', 'uploads/'),
(141, 'Which of the following are defects that occur during forging? (Manufacturing processes)', 'Blow holes', 'Scar', 'Flakes', 'Hot tear', 'Die shift', 'Scale pits', 'Medium', 'uploads/'),
(142, 'Which of these are types of chemical indicators? (Chemistry)', 'Acid indicator', 'Mixed indicator', 'Neutralization indicator', 'Alkyl indicator', 'Screened indicator', 'Absorption indicator', 'Medium', 'uploads/'),
(143, 'Which of these are types of Redox Reactions? (Chemistry)', 'Disproportionation reaction', 'Kjeldahl?s reaction', 'Adsorption reaction', 'Inter-ionic redox reaction', 'Inter-molecular redox reaction', 'Intra molecular-redox reaction', 'Hard', 'uploads/'),
(144, 'Which of these are types of Nuclear reactions? (Radioactivity)', 'Nuclear expansion', 'Induced radioactivity', 'Controlled radioactivity', 'Spallation reaction', 'Chebyshev?s reaction', 'Nuclear Fusion', 'Hard', 'uploads/'),
(145, 'Which of the following are methods of expressing concentration of solution? (Chemistry)', 'Molarity ', 'Kg/l', 'Normality', 'Formality', 'Specific volume', 'Equivalent weight', 'Medium', 'uploads/'),
(146, 'Guess the names of the following logos: (General)', 'BP global', 'Anderson energy', 'Bloom energy', 'Orecon energy', 'Shell industries', 'Fair energy', 'Medium', 'uploads/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oe_mechatron_questions`
--
ALTER TABLE `oe_mechatron_questions`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oe_mechatron_questions`
--
ALTER TABLE `oe_mechatron_questions`
MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=191;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
