-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 07:22 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drugstore3`
--

-- --------------------------------------------------------

--
-- Table structure for table `laboratorytype_detail`
--

CREATE TABLE `laboratorytype_detail` (
  `LabCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Lab Group` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Lab_detail` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorytype_detail`
--

INSERT INTO `laboratorytype_detail` (`LabCode`, `Lab Group`, `Lab_detail`) VALUES
('LabCode', 'Lab Group', 'Lab'),
('0', 'TDM', 'รอแปลผลระดับยา'),
('1', 'General', 'Weight'),
('2', 'General', 'Height'),
('3', 'General', 'BSA'),
('4', 'General', 'Body Temperature'),
('5', 'General', 'Respiratory Rate'),
('6', 'General', 'Heart Rate'),
('7', 'General', 'Blood Pressure'),
('8', 'Blood', 'Hb'),
('9', 'Blood', 'Hct'),
('10', 'Blood', 'WBC'),
('11', 'Blood', 'Platelet'),
('12', 'Blood', 'Blast'),
('13', 'Blood', 'Band'),
('14', 'Blood', 'Neutrophil'),
('15', 'Blood', 'ANC'),
('16', 'Blood', 'Lymphocyte'),
('17', 'Blood', 'Monocyte'),
('18', 'Blood', 'Eosinophil'),
('19', 'Blood', 'Basophil'),
('20', 'Blood', 'INR'),
('21', 'Blood', 'PT'),
('22', 'Blood', 'aPTT'),
('23', 'Chemistry', 'Blood Sugar'),
('24', 'Chemistry', 'Urea Nitrogen'),
('25', 'Chemistry', 'Creatinine'),
('26', 'Chemistry', 'Uric Acid'),
('27', 'Chemistry', 'Sodium'),
('28', 'Chemistry', 'Potassium'),
('29', 'Chemistry', 'Bicarbonate'),
('30', 'Chemistry', 'Chloride'),
('31', 'Chemistry', 'Calcium'),
('32', 'Chemistry', 'Phosphorus'),
('33', 'Chemistry', 'A1C'),
('34', 'Chemistry', 'Cholesterol'),
('35', 'Chemistry', 'Total Protein'),
('36', 'Chemistry', 'Albumin'),
('37', 'Chemistry', 'Total Bilirubin'),
('38', 'Chemistry', 'Direct Bilirubin'),
('39', 'Chemistry', 'ALT (SGPT)'),
('40', 'Chemistry', 'AST (SGOT)'),
('41', 'Chemistry', 'Alkaline Phosphatase'),
('42', 'Chemistry', 'CK'),
('43', 'Chemistry', 'CK-MB'),
('44', 'Chemistry', 'Troponin T'),
('45', 'Chemistry', 'Triglyceride'),
('46', 'Chemistry', 'HDL-C'),
('47', 'Chemistry', 'LDL-C'),
('48', 'Hematology', 'Phase'),
('49', 'Hematology', 'Cycle'),
('50', 'Hematology', 'Week'),
('51', 'Asthma/COPD', 'Day Symptom'),
('52', 'Asthma/COPD', 'Night Symptom'),
('53', 'Asthma/COPD', 'Bronchodilator Use'),
('54', 'Asthma/COPD', 'AE Visit'),
('55', 'Asthma/COPD', 'Hospital Visit'),
('56', 'Asthma/COPD', 'PEFR Predict'),
('57', 'Asthma/COPD', 'PEFR'),
('58', 'Asthma/COPD', '%PEFR'),
('59', 'Asthma/COPD', 'FEV1'),
('60', 'Asthma/COPD', 'FEV1/FVC'),
('61', 'Asthma/COPD', 'PD20'),
('62', 'Asthma/COPD', 'Asthma Control'),
('63', 'Asthma/COPD', 'COPD Severity'),
('64', 'Epilepsy', 'Seizure frequency'),
('65', 'Asthma/COPD', 'Six minute walk'),
('66', 'Epilepsy', 'Clinical Response'),
('67', 'Epilepsy', 'Severity of Attack'),
('68', 'TDM', 'Phenytoin Level - Total'),
('69', 'TDM', 'Sodium Valproate Level - Total'),
('70', 'TDM', 'Phenobarbital Level'),
('71', 'TDM', 'Carbamazepine Level'),
('72', 'Asthma/COPD', 'Dyspnea score'),
('73', 'Other', 'CD4'),
('74', 'Other', 'Viral load'),
('75', 'Other', 'Pain rating scale'),
('76', 'Other', 'Other'),
('77', 'TDM', 'Amikacin Level'),
('78', 'TDM', 'Cyclosporin Level'),
('79', 'TDM', 'Digoxin Level'),
('80', 'TDM', 'Everolimus Level'),
('81', 'TDM', 'Lithium Level'),
('82', 'TDM', 'Methotrexate Level'),
('83', 'TDM', 'Phenytoin Level - Free'),
('84', 'TDM', 'Sodium Valproate Level - Free'),
('85', 'TDM', 'Tacrolimus'),
('86', 'TDM', 'Theophylline'),
('87', 'TDM', 'Vancomycin'),
('88', 'TDM', 'Diazepam'),
('89', 'TDM', 'Paracetamol'),
('90', 'MINIAQLQ', 'อาการ'),
('91', 'MINIAQLQ', 'การจำกัดในกิจกรรม'),
('92', 'MINIAQLQ', 'การแสดงอารมณ์'),
('93', 'MINIAQLQ', 'สิ่งเร้าในสภาพแวดล้อม'),
('94', 'MINIAQLQ', 'คุณภาพชีวิตโดยรวม'),
('95', 'EEG', 'EEG'),
('96', 'Imaging', 'CT brain'),
('97', 'Imaging', 'MRI brain'),
('98', 'Microbiology', 'Gram stain'),
('99', 'Microbiology', 'Culture'),
('100', 'Imaging', 'Not done'),
('101', 'Epilepsy', 'Duration of Attack'),
('102', 'TDM', 'Serum Copper'),
('103', 'TDM', 'Urine Copper'),
('104', 'TDM', 'Blood Lead'),
('105', 'Other', 'bb-HCG'),
('106', 'Chemistry', 'Creatinine Clearance'),
('107', 'Other', 'CA-125'),
('108', 'Other', 'AFP'),
('109', 'Other', 'CA19-9'),
('110', 'Other', 'CEA'),
('111', 'Other', 'SCC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
