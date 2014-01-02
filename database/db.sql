-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 02, 2014 at 03:27 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `ajax`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `c_id` int(3) NOT NULL,
  `c_name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `c_materialid` int(6) NOT NULL,
  `c_materialname` varchar(150) collate utf8_unicode_ci NOT NULL,
  `c_price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` VALUES (1, 'วัสดุสำนักงาน', 101001, 'กระดาษกาวน้ำตาล 2 นิ้ว', 20);
INSERT INTO `category` VALUES (2, 'วัสดุสำนักงาน', 101002, 'กระดาษกาวย่น 2 นิ้ว', 40);
INSERT INTO `category` VALUES (3, 'วัสดุสำนักงาน', 101003, 'กระดาษกาวย่น 1 นิ้ว', 25);
INSERT INTO `category` VALUES (1, 'วัสดุคอมพิวเตอร์', 102001, 'กล่องใส่แผ่นCDแบบหนาจุ2แผ่น', 5);
INSERT INTO `category` VALUES (4, 'วัสดุสำนักงาน', 101004, 'กระดาษการ์ดสี A3', 850);
INSERT INTO `category` VALUES (2, 'วัสดุคอมพิวเตอร์', 102002, 'กล่องใส่แผ่นCDแบบหนาจุ1แผ่น', 6);
INSERT INTO `category` VALUES (3, 'วัสดุคอมพิวเตอร์', 102003, 'ม้วนล้าง VDO', 180);
INSERT INTO `category` VALUES (5, 'วัสดุสำนักงาน', 101005, 'กระดาษการ์ดสี F4', 100);
INSERT INTO `category` VALUES (6, 'วัสดุสำนักงาน', 101006, 'กระดาษการ์ดสี A4/120g', 75);
INSERT INTO `category` VALUES (4, 'วัสดุคอมพิวเตอร์', 102004, 'ม้วนล้างม้วน Mini DV', 450);
INSERT INTO `category` VALUES (7, 'วัสดุสำนักงาน', 101007, 'กระดาษการ์ดขาว A3/180g', 150);
INSERT INTO `category` VALUES (5, 'วัสดุคอมพิวเตอร์', 102005, 'ซองพลาสติกใสใส่แผ่น CD', 1);
INSERT INTO `category` VALUES (8, 'วัสดุสำนักงาน', 101008, 'กระดาษการ์ดหอม A4/180g', 85);
INSERT INTO `category` VALUES (9, 'วัสดุสำนักงาน', 101009, 'กระดาษการ์ดสีไลโทน A3', 250);
INSERT INTO `category` VALUES (10, 'วัสดุสำนักงาน', 101010, 'กระดาษต่อเนื่อง', 560);
INSERT INTO `category` VALUES (11, 'วัสดุสำนักงาน', 101011, 'กระดาษคาร์บอน', 120);
INSERT INTO `category` VALUES (6, 'วัสดุคอมพิวเตอร์', 102006, 'คีมเข้าสายLANกับปลั๊ก', 750);
INSERT INTO `category` VALUES (12, 'วัสดุสำนักงาน', 101012, 'กระดาษบวกเลข', 70);
INSERT INTO `category` VALUES (7, 'วัสดุคอมพิวเตอร์', 102007, 'แผ่นน้ำยาล้าง CD', 220);
INSERT INTO `category` VALUES (13, 'วัสดุสำนักงาน', 101013, 'กระดาษแบงค์สี F14/50g', 95);
INSERT INTO `category` VALUES (8, 'วัสดุคอมพิวเตอร์', 102008, 'ผ้าหมึก Epson', 95);
INSERT INTO `category` VALUES (14, 'วัสดุสำนักงาน', 101014, 'กระดาษถ่ายเอกสารสี A4/80g', 180);
INSERT INTO `category` VALUES (9, 'วัสดุคอมพิวเตอร์', 102009, 'แผ่นดิสก์ 3.5”', 165);
INSERT INTO `category` VALUES (10, 'วัสดุคอมพิวเตอร์', 102010, 'แผ่น CD-RW', 31);
INSERT INTO `category` VALUES (15, 'วัสดุสำนักงาน', 101015, 'กระดาษปรู๊สสร้างแบบ', 3);
INSERT INTO `category` VALUES (11, 'วัสดุคอมพิวเตอร์', 102011, 'สาย LAN', 3850);
INSERT INTO `category` VALUES (16, 'วัสดุสำนักงาน', 101016, 'กระดาษโฟโต้ A3 จุ 10 แผ่น', 600);
INSERT INTO `category` VALUES (12, 'วัสดุคอมพิวเตอร์', 102012, 'หมึก HP C4936A เบอร์18 สี', 750);
INSERT INTO `category` VALUES (13, 'วัสดุคอมพิวเตอร์', 102013, 'หมึก HP C4938A เบอร์18 สี', 650);
INSERT INTO `category` VALUES (17, 'วัสดุสำนักงาน', 101017, 'กระดาษโฟโต้ A4 แบบด้าน', 12.5);
INSERT INTO `category` VALUES (18, 'วัสดุสำนักงาน', 101018, 'กระดาษถ่ายเอกสาร F14', 120);
INSERT INTO `category` VALUES (19, 'วัสดุสำนักงาน', 101019, 'กระดาษถ่ายเอกสาร A3/70g,500', 185);
INSERT INTO `category` VALUES (20, 'วัสดุสำนักงาน', 101020, 'กระดาษสีแข็ง 1 หน้าเดียว', 10);
INSERT INTO `category` VALUES (21, 'วัสดุสำนักงาน', 101021, 'กระดาษสีบาง หน้าเดียว', 3);
INSERT INTO `category` VALUES (14, 'วัสดุคอมพิวเตอร์', 102014, 'หมึก HP C4939A เบอร์18 สีเหลือง', 650);
INSERT INTO `category` VALUES (22, 'วัสดุสำนักงาน', 101022, 'กระดาษอาร์ตขาว A3/190g', 5);
INSERT INTO `category` VALUES (15, 'วัสดุคอมพิวเตอร์', 102015, 'หมึก HP  Q7553A', 2890);
INSERT INTO `category` VALUES (23, 'วัสดุสำนักงาน', 101023, 'กระดาษอาร์ตขาว A3/180g', 5);
INSERT INTO `category` VALUES (16, 'วัสดุคอมพิวเตอร์', 102016, 'หมึก Laser HP-c4096a', 3380);
INSERT INTO `category` VALUES (24, 'วัสดุสำนักงาน', 101024, 'กระดาษเครื่องบันทึกเงินสด', 270);
INSERT INTO `category` VALUES (17, 'วัสดุคอมพิวเตอร์', 102017, 'หมึก Laser HP-Q2612A', 2650);
INSERT INTO `category` VALUES (25, 'วัสดุสำนักงาน', 101025, 'กระดาษอิงค์เจ็ท A4/100g', 240);
INSERT INTO `category` VALUES (18, 'วัสดุคอมพิวเตอร์', 102018, 'หมึก Laser HP-Q2610A', 3950);
INSERT INTO `category` VALUES (19, 'วัสดุคอมพิวเตอร์', 102019, 'หมึก Laser HP-c4127x', 4050);
INSERT INTO `category` VALUES (26, 'วัสดุสำนักงาน', 101026, 'กระเป๋าผ้า CITCOMS', 40);
INSERT INTO `category` VALUES (20, 'วัสดุคอมพิวเตอร์', 102020, 'หมึกHP -51645', 1170);
INSERT INTO `category` VALUES (27, 'วัสดุสำนักงาน', 101027, 'กาวยูฮู', 65);
INSERT INTO `category` VALUES (21, 'วัสดุคอมพิวเตอร์', 102021, 'หมึกHP C4182X', 8500);
INSERT INTO `category` VALUES (28, 'วัสดุสำนักงาน', 101028, 'กล่องใส่เอกสาร 2 ช่อง', 100);
INSERT INTO `category` VALUES (22, 'วัสดุคอมพิวเตอร์', 102022, 'หมวกคลุมหัวRJ-45', 8);
INSERT INTO `category` VALUES (29, 'วัสดุสำนักงาน', 101029, 'กระดาษ Post it', 25);
INSERT INTO `category` VALUES (30, 'วัสดุสำนักงาน', 101030, 'กรรไกร', 65);
INSERT INTO `category` VALUES (31, 'วัสดุสำนักงาน', 101031, 'เครื่องเหลาดินสอ', 350);
INSERT INTO `category` VALUES (32, 'วัสดุสำนักงาน', 101032, 'มาสเตอร์เครื่องอัดสำเนา A3(ริโก้)', 3103);
INSERT INTO `category` VALUES (33, 'วัสดุสำนักงาน', 101033, 'มาสเตอร์เครื่องอัดสำเนา A3(ริโซ่)', 3250);
INSERT INTO `category` VALUES (34, 'วัสดุสำนักงาน', 101034, 'ขี้ผึ้งนับกระดาษ', 30);
INSERT INTO `category` VALUES (35, 'วัสดุสำนักงาน', 101035, 'คัตเตอร์แสตนเลสเล็ก', 35);
INSERT INTO `category` VALUES (23, 'วัสดุคอมพิวเตอร์', 102023, 'หัวRJ-45ตัวเมีย', 145);
INSERT INTO `category` VALUES (24, 'วัสดุคอมพิวเตอร์', 102024, 'หัวRJ-45ตัวผู้', 8);
INSERT INTO `category` VALUES (36, 'วัสดุสำนักงาน', 101036, 'คลิปขาว 3 นิ้ว', 90);
INSERT INTO `category` VALUES (25, 'วัสดุคอมพิวเตอร์', 102025, 'อุปกรณ์รับสัญญาณ', 1470);
INSERT INTO `category` VALUES (37, 'วัสดุสำนักงาน', 101037, 'เชือกขาวพัสดุ 30 เส้น', 12);
INSERT INTO `category` VALUES (26, 'วัสดุคอมพิวเตอร์', 102026, 'Card Land', 650);
INSERT INTO `category` VALUES (38, 'วัสดุสำนักงาน', 101038, 'ซองขาวพับ 4 ครุฑ', 1);
INSERT INTO `category` VALUES (27, 'วัสดุคอมพิวเตอร์', 102027, 'หมึก HP Inkjet No21', 670);
INSERT INTO `category` VALUES (39, 'วัสดุสำนักงาน', 101039, 'ซองน้ำตาลขยายข้าง F4', 3.2);
INSERT INTO `category` VALUES (40, 'วัสดุสำนักงาน', 101040, 'ซองน้ำตาล A4', 1.5);
INSERT INTO `category` VALUES (28, 'วัสดุคอมพิวเตอร์', 102028, 'หมึก HP Inkjet No22', 750);
INSERT INTO `category` VALUES (41, 'วัสดุสำนักงาน', 101041, 'ซองน้ำตาล A4 ขยายข้าง', 3);
INSERT INTO `category` VALUES (29, 'วัสดุคอมพิวเตอร์', 102029, 'หมึก HP C4937A เบอร์ 18 สีฟ้า', 650);
INSERT INTO `category` VALUES (42, 'วัสดุสำนักงาน', 101042, 'ซองน้ำตาล 8 x 9', 1);
INSERT INTO `category` VALUES (30, 'วัสดุคอมพิวเตอร์', 102030, 'เทป Digital Data Storage', 350);
INSERT INTO `category` VALUES (43, 'วัสดุสำนักงาน', 101043, 'ด้ายเย็บสันหนังสือ', 15);
INSERT INTO `category` VALUES (1, 'วัสดุงานบ้านงานครัว', 103001, 'กระดาษทิชชูม้วนเล็ก', 40);
INSERT INTO `category` VALUES (44, 'วัสดุสำนักงาน', 101044, 'ตรายางวันที่', 195);
INSERT INTO `category` VALUES (45, 'วัสดุสำนักงาน', 101045, 'ตะแกงใส่เอกสาร 2 ชั้น', 120);
INSERT INTO `category` VALUES (2, 'วัสดุงานบ้านงานครัว', 103002, 'กระดาษ JRT', 900);
INSERT INTO `category` VALUES (3, 'วัสดุงานบ้านงานครัว', 103003, 'กาวดักแมลงวัน', 75);
INSERT INTO `category` VALUES (4, 'วัสดุงานบ้านงานครัว', 103004, 'แก้วกรวยกระดาษ', 990);
INSERT INTO `category` VALUES (46, 'วัสดุสำนักงาน', 101046, 'เทปลบคำผิดเครื่องพิมพ์ดีดไฟฟ้า', 40);
INSERT INTO `category` VALUES (5, 'วัสดุงานบ้านงานครัว', 103005, 'เชือกฟาง', 30);
INSERT INTO `category` VALUES (47, 'วัสดุสำนักงาน', 101047, 'ที่ดึงลวดเย็บกระดาษ(ที่ถอนลวด)', 60);
INSERT INTO `category` VALUES (6, 'วัสดุงานบ้านงานครัว', 103006, 'ตะไคร้หอมไล่ยุง', 25);
INSERT INTO `category` VALUES (7, 'วัสดุงานบ้านงานครัว', 103007, 'ถุงขยะสีขาว', 40);
INSERT INTO `category` VALUES (48, 'วัสดุสำนักงาน', 101048, 'ที่รันนิ่งนัมเบอร์', 750);
INSERT INTO `category` VALUES (8, 'วัสดุงานบ้านงานครัว', 103008, 'น้ำหอมปรับอากาศ', 450);
INSERT INTO `category` VALUES (49, 'วัสดุสำนักงาน', 101049, 'ทะเบียนหนังสือส่งA4', 75);
INSERT INTO `category` VALUES (9, 'วัสดุงานบ้านงานครัว', 103009, 'น้ำยาล้างจาน', 178);
INSERT INTO `category` VALUES (50, 'วัสดุสำนักงาน', 101050, 'ที่เจาะกระดาษใส่แฟ้ม', 85);
INSERT INTO `category` VALUES (51, 'วัสดุสำนักงาน', 101051, 'น้ำยาลบคำผิด', 65);
INSERT INTO `category` VALUES (10, 'วัสดุงานบ้านงานครัว', 103010, 'ไม้กวาดทางมะพร้าว', 40);
INSERT INTO `category` VALUES (52, 'วัสดุสำนักงาน', 101052, 'ใบมีดคัตเตอร์เล็ก A-10', 10);
INSERT INTO `category` VALUES (11, 'วัสดุงานบ้านงานครัว', 103011, 'มูลี่', 265);
INSERT INTO `category` VALUES (53, 'วัสดุสำนักงาน', 101053, 'ใบมีดคัตเตอร์ใหญ่ L-150', 20);
INSERT INTO `category` VALUES (12, 'วัสดุงานบ้านงานครัว', 103012, 'ลังพลาสติก', 190);
INSERT INTO `category` VALUES (54, 'วัสดุสำนักงาน', 101054, 'ใบมีดคัตเตอร์เฉียง 30 องศา', 15);
INSERT INTO `category` VALUES (13, 'วัสดุงานบ้านงานครัว', 103013, 'ลังคว่ำแก้วพลาสติก', 55);
INSERT INTO `category` VALUES (14, 'วัสดุงานบ้านงานครัว', 103014, 'สเปรย์น้ำหอมปรับอากาศ', 450);
INSERT INTO `category` VALUES (55, 'วัสดุสำนักงาน', 101055, 'ใบมีดตัดกระดาษ', 0);
INSERT INTO `category` VALUES (15, 'วัสดุงานบ้านงานครัว', 103015, 'สเปรย์ปรับอากาศ', 75);
INSERT INTO `category` VALUES (56, 'วัสดุสำนักงาน', 101056, 'ปากกาเน้นข้อความ', 0);
INSERT INTO `category` VALUES (16, 'วัสดุงานบ้านงานครัว', 103016, 'ยาเบื่อหนู', 15);
INSERT INTO `category` VALUES (57, 'วัสดุสำนักงาน', 101057, 'ปากกาเขียนแผ่นใสชนิดลบได้', 140);
INSERT INTO `category` VALUES (58, 'วัสดุสำนักงาน', 101058, 'ปากกาเคมี2หัว', 10);
INSERT INTO `category` VALUES (59, 'วัสดุสำนักงาน', 101059, 'ปากกา Gangy Paint Maker', 50);
INSERT INTO `category` VALUES (60, 'วัสดุสำนักงาน', 101060, 'ปากกาไวท์บอร์ด', 16.25);
INSERT INTO `category` VALUES (1, 'วัสดุโฆษณาและเผยแพร่', 104001, 'พลาสติกลูกฟู', 200);
INSERT INTO `category` VALUES (2, 'วัสดุโฆษณาและเผยแพร่', 104002, 'โฟม 0.5 นิ้ว', 15);
INSERT INTO `category` VALUES (61, 'วัสดุสำนักงาน', 101061, 'แปลงลบกระดานไวท์บอร์ด', 15);
INSERT INTO `category` VALUES (3, 'วัสดุโฆษณาและเผยแพร่', 104003, 'เข็มตัดสติ๊กเกอร์', 1350);
INSERT INTO `category` VALUES (62, 'วัสดุสำนักงาน', 101062, 'ปากกาเขียนแผ่นCD', 18);
INSERT INTO `category` VALUES (4, 'วัสดุโฆษณาและเผยแพร่', 104004, 'สติ๊กเกอร์บาร์โค้ด', 1);
INSERT INTO `category` VALUES (63, 'วัสดุสำนักงาน', 101063, 'ผงหมึกเครื่องถ่ายเอกสารริโก้', 4300);
INSERT INTO `category` VALUES (5, 'วัสดุโฆษณาและเผยแพร่', 104005, 'ม้วนเทปคาสเซท 90 นาที', 20);
INSERT INTO `category` VALUES (6, 'วัสดุโฆษณาและเผยแพร่', 104006, 'ม้วน VDO โซนี่ 120 นาที', 75);
INSERT INTO `category` VALUES (64, 'วัสดุสำนักงาน', 101064, 'ผ้าหมึกเครื่องคำนวณ', 75);
INSERT INTO `category` VALUES (7, 'วัสดุโฆษณาและเผยแพร่', 104007, 'ม้วน Mini DVD', 150);
INSERT INTO `category` VALUES (65, 'วัสดุสำนักงาน', 101065, 'แผ่นใสชนิดเขียนได้', 180);
INSERT INTO `category` VALUES (8, 'วัสดุโฆษณาและเผยแพร่', 104008, 'สติ๊กเกอร์ PVC (ทอง,เงิน,สี,ใส)', 10);
INSERT INTO `category` VALUES (66, 'วัสดุสำนักงาน', 101066, 'แผ่นใสชนิดถ่ายเอกสาร 3 M', 420);
INSERT INTO `category` VALUES (67, 'วัสดุสำนักงาน', 101067, 'พลาสติกคั่นแฟ้ม Index', 85);
INSERT INTO `category` VALUES (1, 'วัสดุการเกษตร', 105001, 'ยาฆ่าหญ้าน้ำ(ราวด์อัพ)', 450);
INSERT INTO `category` VALUES (68, 'วัสดุสำนักงาน', 101068, 'พลาสติกเคลือบบัตร A3', 950);
INSERT INTO `category` VALUES (2, 'วัสดุการเกษตร', 105002, 'ยาฆ่าหญ้าแบบผง', 180);
INSERT INTO `category` VALUES (69, 'วัสดุสำนักงาน', 101069, 'พลาสติกเคลือบบัตร A4', 480);
INSERT INTO `category` VALUES (70, 'วัสดุสำนักงาน', 101070, 'แฟ้มคำกล่าว', 300);
INSERT INTO `category` VALUES (1, 'วัสดุก่อสร้าง', 106001, 'น๊อตเกลียวปล่อย', 180);
INSERT INTO `category` VALUES (71, 'วัสดุสำนักงาน', 101071, 'แฟ้มกระดาษพร้อมไส้', 18);
INSERT INTO `category` VALUES (2, 'วัสดุก่อสร้าง', 106002, 'ท่อ4หุน', 48);
INSERT INTO `category` VALUES (72, 'วัสดุสำนักงาน', 101072, 'แฟ้มกระดาษA4(พร้อมไส้)', 5);
INSERT INTO `category` VALUES (3, 'วัสดุก่อสร้าง', 106003, 'เทปอลูมิเนียม2นิ้ว', 220);
INSERT INTO `category` VALUES (73, 'วัสดุสำนักงาน', 101073, 'แฟ้มกระดาษอ่อน F14', 5);
INSERT INTO `category` VALUES (4, 'วัสดุก่อสร้าง', 106004, 'สายคล้องตู้สลิงพร้อมกุญแจ', 65);
INSERT INTO `category` VALUES (74, 'วัสดุสำนักงาน', 101074, 'แฟ้มดำสันหนา 4 นิ้ว', 70);
INSERT INTO `category` VALUES (5, 'วัสดุก่อสร้าง', 106005, 'เหล็กรุปตัวL', 140);
INSERT INTO `category` VALUES (75, 'วัสดุสำนักงาน', 101075, 'แฟ้มดำA5', 32);
INSERT INTO `category` VALUES (76, 'วัสดุสำนักงาน', 101076, 'แฟ้มดำ สันห่วง 1 นิ้ว', 60);
INSERT INTO `category` VALUES (1, 'วัสดุไฟฟ้าและวิทยุ', 107001, 'กระบอกไฟฉายพร้อมถ่าน', 135);
INSERT INTO `category` VALUES (77, 'วัสดุสำนักงาน', 101077, 'แฟ้มพลาสติกแบบสอดF14', 6);
INSERT INTO `category` VALUES (2, 'วัสดุไฟฟ้าและวิทยุ', 107002, 'รางเดินสายโทรศัพท์ T-1', 25);
INSERT INTO `category` VALUES (78, 'วัสดุสำนักงาน', 101078, 'แฟ้มพลาสติกแบบผูกเชือก', 15);
INSERT INTO `category` VALUES (3, 'วัสดุไฟฟ้าและวิทยุ', 107003, 'คอไมค์', 90);
INSERT INTO `category` VALUES (79, 'วัสดุสำนักงาน', 101079, 'แฟ้มปกแข็งเบอร์ 111', 65);
INSERT INTO `category` VALUES (80, 'วัสดุสำนักงาน', 101080, 'แฟ้มประชาสัมพันธ์ CITCOMS', 14);
INSERT INTO `category` VALUES (81, 'วัสดุสำนักงาน', 101081, 'มาสเตอร์ริโซ่กราฟ', 2950);
INSERT INTO `category` VALUES (4, 'วัสดุไฟฟ้าและวิทยุ', 107004, 'สายรัดสายไฟเส้นเล็ก6นิ้ว', 40);
INSERT INTO `category` VALUES (82, 'วัสดุสำนักงาน', 101082, 'แม็คเย็บกระดาษใหญ่เบอร์10', 65);
INSERT INTO `category` VALUES (5, 'วัสดุไฟฟ้าและวิทยุ', 107005, 'หลอดไฟ 230 V 1000 W', 2400);
INSERT INTO `category` VALUES (83, 'วัสดุสำนักงาน', 101083, 'ไม้บรรทัดเหล็ก 24 นิ้ว', 180);
INSERT INTO `category` VALUES (84, 'วัสดุสำนักงาน', 101084, 'ไม้บรรทัดพลาสติก', 5);
INSERT INTO `category` VALUES (85, 'วัสดุสำนักงาน', 101085, 'เยื่อกาว1นิ้ว', 30);
INSERT INTO `category` VALUES (86, 'วัสดุสำนักงาน', 101086, 'เยื่อกาว 0.5 นิ้ว', 20);
INSERT INTO `category` VALUES (87, 'วัสดุสำนักงาน', 101087, 'ยางลบดินสอ', 5);
INSERT INTO `category` VALUES (88, 'วัสดุสำนักงาน', 101088, 'ลวดเสียบกระดาษ', 8);
INSERT INTO `category` VALUES (89, 'วัสดุสำนักงาน', 101089, 'แล็คซีน 2 นิ้ว', 45);
INSERT INTO `category` VALUES (90, 'วัสดุสำนักงาน', 101090, 'ลูกแม็คเย็บกระดาษ เบอร์3', 10);
INSERT INTO `category` VALUES (91, 'วัสดุสำนักงาน', 101091, 'ลูกแม็คเย็บกระดาษ เบอร์10', 6.87);
INSERT INTO `category` VALUES (92, 'วัสดุสำนักงาน', 101092, 'ลูกแม็คเย็บกระดาษ เบอร์1213', 70);
INSERT INTO `category` VALUES (6, 'วัสดุไฟฟ้าและวิทยุ', 107006, 'หลอด SEL220V', 30);
INSERT INTO `category` VALUES (93, 'วัสดุสำนักงาน', 101093, 'ลูกแม็คเย็บกระดาษ เบอร์ 9/10', 60);
INSERT INTO `category` VALUES (7, 'วัสดุไฟฟ้าและวิทยุ', 107007, 'ถ่านAAอัลคาไลน์', 45);
INSERT INTO `category` VALUES (8, 'วัสดุไฟฟ้าและวิทยุ', 107008, 'ถ่านAAAอัลคาไลน์', 38);
INSERT INTO `category` VALUES (94, 'วัสดุสำนักงาน', 101094, 'ลูกแม็คยิงเบอร์', 28);
INSERT INTO `category` VALUES (9, 'วัสดุไฟฟ้าและวิทยุ', 107009, 'ถ่าน 9V', 30);
INSERT INTO `category` VALUES (95, 'วัสดุสำนักงาน', 101095, 'ลูกแม็คเย็บเบอร์ 26/8', 95);
INSERT INTO `category` VALUES (96, 'วัสดุสำนักงาน', 101096, 'ลูกแม็คเย็บเบอร์ 26/6(35)', 95);
INSERT INTO `category` VALUES (1, 'วัสดุเชื้อเพลิงและหล่อลื่น', 108001, 'น้ำมันเครื่อง4จังหวะ', 95);
INSERT INTO `category` VALUES (97, 'วัสดุสำนักงาน', 101097, 'ลูกกลิ้งรีดกระดาษ', 180);
INSERT INTO `category` VALUES (98, 'วัสดุสำนักงาน', 101098, 'สก๊อตเทปใส 1.5 นิ้ว', 20);
INSERT INTO `category` VALUES (2, 'วัสดุเชื้อเพลิงและหล่อลื่น', 108002, 'น้ำมันไฮโดรลิก', 370);
INSERT INTO `category` VALUES (99, 'วัสดุสำนักงาน', 101099, 'สก๊อตเทปใส 1 นิ้ว', 35);
INSERT INTO `category` VALUES (100, 'วัสดุสำนักงาน', 101100, 'สก๊อตเทปใส 0.5 นิ้ว', 12);
INSERT INTO `category` VALUES (101, 'วัสดุสำนักงาน', 101101, 'สมุดคู่มือเบิกจ่ายในราชการ', 35);
INSERT INTO `category` VALUES (102, 'วัสดุสำนักงาน', 101102, 'สมุดบัญชีมุมมัน3ช่อง', 110);
INSERT INTO `category` VALUES (1, 'วัสดุพาหนะและขนส่ง', 109001, 'น้ำกลั่น', 8);
INSERT INTO `category` VALUES (103, 'วัสดุสำนักงาน', 101103, 'สมุดบัญชีมุมมัน 5/100', 95);
INSERT INTO `category` VALUES (104, 'วัสดุสำนักงาน', 101104, 'สมุดโน๊ต CITCOMS', 5);
INSERT INTO `category` VALUES (1, 'วัสดุวิทยาศาสตร์และการแพทย์', 110001, 'เจลล้างมือฆ่าเชื้อโรคแบบแห้ง', 250);
INSERT INTO `category` VALUES (105, 'วัสดุสำนักงาน', 101105, 'สายคล้องคอ', 40);
INSERT INTO `category` VALUES (106, 'วัสดุสำนักงาน', 101106, 'หมึกเครื่องพิมพ์ดีดไฟฟ้า', 175);
INSERT INTO `category` VALUES (2, 'วัสดุวิทยาศาสตร์และการแพทย์', 110002, 'แอลกอฮอล์', 48);
INSERT INTO `category` VALUES (107, 'วัสดุสำนักงาน', 101107, 'หมึกเครื่องอัดสำเนาสีดำ', 642);
INSERT INTO `category` VALUES (108, 'วัสดุสำนักงาน', 101108, 'ฟิล์มแฟกส์', 950);
INSERT INTO `category` VALUES (127, 'วัสดุสำนักงาน', 101127, 'ซองสีขนาด 5X7', 2);
INSERT INTO `category` VALUES (126, 'วัสดุสำนักงาน', 101126, 'สติ๊กเกอร์ลาเบล', 35);
INSERT INTO `category` VALUES (109, 'วัสดุสำนักงาน', 101109, 'หมึก Fax CANNON', 3450);
INSERT INTO `category` VALUES (125, 'วัสดุสำนักงาน', 101125, 'แฟ้มสันรูด', 15);
INSERT INTO `category` VALUES (110, 'วัสดุสำนักงาน', 101110, 'หมึกสำหรับเครื่องพิมพ์บัตร', 3000);
INSERT INTO `category` VALUES (124, 'วัสดุสำนักงาน', 101124, 'อากรแสตมป์ดวงละ 1 บาท', 1);
INSERT INTO `category` VALUES (123, 'วัสดุสำนักงาน', 101123, 'อากรแสตมป์ดวงละ 5 บาท', 5);
INSERT INTO `category` VALUES (111, 'วัสดุสำนักงาน', 101111, 'หมึกถ่ายเอกสาร Cannon', 680);
INSERT INTO `category` VALUES (122, 'วัสดุสำนักงาน', 101122, 'อากรแสตมป์ดวงละ 20 บาท', 20);
INSERT INTO `category` VALUES (121, 'วัสดุสำนักงาน', 101121, 'หมุดติดบอร์ด', 85);
INSERT INTO `category` VALUES (120, 'วัสดุสำนักงาน', 101120, 'ห่วงเข้าเล่ม 21 ห่วง 8 มิล', 4);
INSERT INTO `category` VALUES (119, 'วัสดุสำนักงาน', 101119, 'คลิปดำเบอร์ 112', 25);
INSERT INTO `category` VALUES (112, 'วัสดุสำนักงาน', 101112, 'หมึกถ่ายเอกสาร RICOH 450', 2100);
INSERT INTO `category` VALUES (118, 'วัสดุสำนักงาน', 101118, 'คลิปดำเบอร์ 111', 25);
INSERT INTO `category` VALUES (117, 'วัสดุสำนักงาน', 101117, 'คลิปดำเบอร์ 110', 35);
INSERT INTO `category` VALUES (113, 'วัสดุสำนักงาน', 101113, 'หมึกพิมพ์แบบ TTR Ribbon', 267);
INSERT INTO `category` VALUES (116, 'วัสดุสำนักงาน', 101116, 'คลิปดำเบอร์ 109', 60);
INSERT INTO `category` VALUES (114, 'วัสดุสำนักงาน', 101114, 'หมึกเติมแท่นประทับตรา', 15);
INSERT INTO `category` VALUES (115, 'วัสดุสำนักงาน', 101115, 'คลิปดำเบอร์ 108', 70);

-- --------------------------------------------------------

-- 
-- Table structure for table `test`
-- 

CREATE TABLE `test` (
  `no` int(11) NOT NULL auto_increment,
  `id` varchar(25) collate utf8_unicode_ci NOT NULL,
  `name` varchar(25) collate utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=208 ;

-- 
-- Dumping data for table `test`
-- 

INSERT INTO `test` VALUES (207, '101046/04', 'กระดาษกาวย่น 2 นิ้ว', 2, 0, 0);
INSERT INTO `test` VALUES (203, '112005/03', 'กล่องใส่แผ่น CD แบบหนาจุ ', 3, 0, 0);
INSERT INTO `test` VALUES (201, '112010/02', 'ม้วนล้าง VDO', 1, 0, 0);
INSERT INTO `test` VALUES (202, '112010/02', 'ม้วนล้าง VDO', 10, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `password` char(64) character set utf8 collate utf8_unicode_ci NOT NULL,
  `salt` char(16) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gender` varchar(6) character set utf8 collate utf8_unicode_ci NOT NULL,
  `department` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL,
  `position` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (4, 'kongpasom', '301f64593ee7c728b94705fc06649d764612643e178b77ec666056ee8d477982', '1e967bfc4aa2b3b8', 'kongpasom@hotmail.com', 'Chakkrit', 'Termritthikun', 'male', 'Lab', 'Programming', 850091023, 0);
