-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2023 at 02:20 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbluanvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_research`
--

CREATE TABLE `basic_research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivist` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_research`
--

INSERT INTO `basic_research` (`id`, `tittle`, `content`, `year`, `result`, `archivist`, `storage_location`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Nghiên cứu ứng dụng phần mềm mô phỏng NS3 trong đánh giá hiệu năng mạng IP thế hệ mới', 'Khuyến khích giáo viên sử dụng các công cụ mô phỏng bài giảng, để học sinh quan sát trực quan và cũng là để giải quyết vấn đề thiếu phương tiện dạy học. Và từ thực tế dạy học chuyên nghành “Quản trị mạng” tại trường.\r\nĐề tài “Mô phỏng mạng IP và làm chủ phần mềm NS-3” với mong muốn sau khi hoàn thành sẽ giúp cho công tác giảng dạy được thuận lợi hơn để truyền đạt tối đa kiến thức đến cho sinh viên chuyên nghành “Quản trị mạng” nơi em công tác', '2020-2021', 'Khá', 'Hải Đăng', '204HA11LN', '202304120513.pdf', '2023-04-11 22:05:47', '2023-04-11 22:13:32'),
(2, 'Dự đoán biển số xe, sử dụng mô hình mạng noron tích chập tiên tiến', 'Trong mạng neural, mô hình mạng neural tích chập (CNN) là 1 trong những mô hình để nhận dạng và phân loại hình ảnh. Trong đó, xác định đối tượng và nhận dạng khuôn mặt là 1 trong số những lĩnh vực mà CNN được sử dụng rộng rãi.', '2022-2023', 'Tốt', 'Hải Đăng', '204HA11LN', '202304120509.pdf', '2023-04-11 22:09:51', '2023-04-11 22:09:51'),
(3, 'Mở rộng từ điển SentiWordNet ứng dụng trong bài toán phân tích quan điểm người dùng', 'Khai phá quan điểm giúp xác định hướng quan điểm (tích cực, tiêu cực) của người dùng về một chủ đề, sản phẩm hay dịch vụ. Có một số cách tiếp cận khác nhau về khai phá quan điểm, trong đó phương pháp khai phá quan điểm dựa trên từ vựng là khá phổ biến. Độ chính xác của phương pháp khai phá quan điểm dựa trên từ vựng phụ thuộc rất nhiều vào từ điển được sử dụng, trong đó chứa các từ quan điểm về các lĩnh vực cụ thể.', '2020-2021', 'Khá', 'Hải Đăng', '204HA11LN', '202304120512.pdf', '2023-04-11 22:12:53', '2023-04-11 22:12:53'),
(4, 'Nghiên cứu và đánh giá một số công thức quan hệ xây dựng xấp xỉ mờ trực cảm', 'Trong lý thuyết tập hợp kinh điển , giá trị của một phần\r\ntử trong một tập hợp là 0 hoặc 1, tức là với một phần tử bất kỳ chỉ có hai khả năng là\r\nthuộc hoặc không thuộc tập hợp. Do đó, lý thuyết này không thể xử lý những dữ liệu\r\ncó tính không chắc chắn, không rõ ràng', '2021-2022', 'Tốt', 'Hải Đăng', '204HA11LN', '202304120555.pdf', '2023-04-11 22:54:26', '2023-04-11 22:55:02'),
(5, 'Kỹ thuật học sâu trong khử mờ ảnh chụp biển số phương tiện giao thông thu được từ các camera giám sát', 'sau khi chụp ảnh biển số, công nghệ ANPR sẽ chuyển đổi chúng thành văn bản được mã hóa, hay còn biết đến với tên gọi nhận dạng ký tự quang học (OCR). Hiện tại, công nghệ này có thể được sử dụng trên CCTV (camera giám sát), camera giao thông và camera dành riêng cho ANPR.', '2022-2023', 'Xuất Sắc', 'Hải Đăng', '204HA11LN', '202304120602.pdf', '2023-04-11 23:02:08', '2023-04-11 23:02:08'),
(6, 'Nghiên cứu kết hợp giải thuật di truyền và thuật toán tìm kiếm Tabu giải bài toán định tuyến xe và ràng buộc thời gian', 'Nghiên cứu này tập trung vào việc so sánh điều kiện cải thiện của thuật toán TABU, đồng thời kết hợp với việc thay đổi lời giải ban đầu cung cấp cho giải thuật. Nghiên cứu nhằm hoàn thiện giải thuật TABU, thuật toán gần đúng để giải bài toán lớn, được ứng dụng để giải bài toán cân bằng dây chuyền sản xuất.', '2016-2017', 'Tốt', 'Thu Hiền', '204HA11LN', '202304120605.pdf', '2023-04-11 23:05:25', '2023-04-11 23:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `basic_research_lecturers`
--

CREATE TABLE `basic_research_lecturers` (
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `basic_research_id` bigint(20) UNSIGNED NOT NULL,
  `isLeader` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_research_lecturers`
--

INSERT INTO `basic_research_lecturers` (`lecturer_id`, `basic_research_id`, `isLeader`) VALUES
(12, 2, 0),
(13, 2, 0),
(11, 2, 1),
(15, 3, 0),
(16, 3, 0),
(14, 3, 1),
(5, 1, 0),
(6, 1, 0),
(4, 1, 1),
(23, 4, 0),
(24, 4, 0),
(22, 4, 1),
(33, 5, 0),
(34, 5, 0),
(32, 5, 1),
(38, 6, 0),
(39, 6, 0),
(37, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `creative_ideas`
--

CREATE TABLE `creative_ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivist` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creative_ideas`
--

INSERT INTO `creative_ideas` (`id`, `tittle`, `content`, `lecturer_id`, `school_year`, `start_date`, `archivist`, `storage_location`, `created_at`, `updated_at`) VALUES
(1, 'Nghiên cứu về công nghệ thực tại ảo và ứng dụng.', 'Thực tại ảo (Virtual reality - VR) là thuật ngữ mô tả môi trường mô phỏng bằng máy tính, hình ảnh hiển thị trên màn hình thông qua kính nhìn ba chiều, cùng với các giác quan khác như âm thanh, xúc giác... để tạo ra một thế giới “như thật”. Thế giới “nhân tạo” này lại phản ứng, thay đổi theo ý muốn (tín hiệu vào) của người sử dụng (hành động, lời nói...).', 1, '2021-2022', '2022-12-12', 'Thu Hiền', '203HA11LN', '2023-04-11 21:25:47', '2023-04-11 21:28:16'),
(2, 'Sử dụng mã nguồn mở NukeViet và Moodle xây dựng website công nghệ thông tin.', 'NukeViet được sử dụng ở nhiều website, từ những website cá nhân cho tới những hệ thống website doanh nghiệp, nó cung cấp nhiều dịch vụ và ứng dụng nhờ khả năngtăng cường tính năng bằng cách cài thêm cácmodule, block... NukeViet có thể dễ dàng cài đặt, dễ dàng quản lý kể cả với những người mới sử dụng.', 2, '2020-2021', '2021-03-12', 'Thu Hiền', '203HA11LN', '2023-04-11 21:27:45', '2023-04-11 21:27:45'),
(3, 'Xây dựng chương trình nâng cao hiệu quả tra cứu ảnh dựa trên thông tin phản hồi của người dùng.', 'Nhiều hệ thống tra cứu ảnh hiện nay có tích hợp phản hồi liên quan để giảm khoảng trống ngữ nghĩa giữa mô tả ảnh\r\nmức thấp và ngữ nghĩa mức cao trong suy nghĩ người dùng. Từ thông tin người dùng cung cấp, một thuật toán phân lớp áp dụng lên\r\ntập huấn luyện tạo ra một bộ phân lớp được sử dụng trong pha tra cứu tiếp theo.', 3, '2022-2023', '2023-02-21', 'Thu Hiền', '203HA11LN', '2023-04-11 21:37:57', '2023-04-11 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `creative_idea_students`
--

CREATE TABLE `creative_idea_students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `creative_idea_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creative_idea_students`
--

INSERT INTO `creative_idea_students` (`student_id`, `creative_idea_id`) VALUES
(3, 2),
(4, 2),
(1, 1),
(2, 1),
(5, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dispatches`
--

CREATE TABLE `dispatches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tittle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_date` date NOT NULL,
  `published_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `archivist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispatches`
--

INSERT INTO `dispatches` (`id`, `code`, `tittle`, `content`, `type_id`, `receiver`, `signer`, `sign_date`, `issued_date`, `published_place`, `effective_date`, `expiration_date`, `archivist`, `storage_location`, `role`, `file`, `created_at`, `updated_at`) VALUES
(4, 'QĐ1/ĐHKTKTCNHN', 'Tổ chức thi Chuẩn đầu ra tiếng Anh trình độ Đại học theo quy định của Trường', 'Tổ chức thi chuẩn đầu ra cho sinh viên khoá 13 ngành công nghệ thông tin vào ngày 12/3/2023', 7, NULL, 'TS Trần Hoàng Long', '2023-03-12', '2023-03-12', 'Trường ĐH KTKT CN Hà Nội', '2023-03-12', '2023-03-20', 'Huyền Linh', '202HA11LN', 1, '202304120909.pdf', '2023-04-12 02:09:05', '2023-04-12 02:09:45'),
(5, 'CD1-DHKTKTCNHN', 'Kế hoạch tốt nghiệp các lớp Đại học khóa 12 và các lớp xét tốt nghiệp ghép', 'Công chỉ đạo về Kế hoạch tốt nghiệp các lớp Đại học khóa 12 và các lớp xét tốt nghiệp ghép, thời gian dự liến 27/5/2022', 2, NULL, 'TS Trần Đức Cân', '2022-04-12', '2022-04-12', 'Trường ĐH KTKT CN Hà Nội', '2022-04-12', '2022-05-01', 'Huyền Linh', '204HA11LN', 1, '202304120924.png', '2023-04-12 02:22:58', '2023-04-12 02:24:51'),
(6, 'CD2-DHKKTKTCNHN', 'Chỉ đạo giảng viên cho kế hoạch tổ chức chương trình gặp mặt đầu năm Xuân Quý Mão 2023', 'Chỉ đạo  tất  cả giảng viên khoa công nghệ thông tin cho kế hoạch tổ chức chương trình gặp mặt đầu năm Xuân Quý Mão 2023 tại hội trường lớn HA10-  218 Lĩnh Nam', 2, NULL, 'Trần Hoàng Long', '2023-01-28', '2023-01-28', 'Trường ĐH KTKT CN Hà Nội', '2023-01-28', '2023-01-31', 'Huyền Linh', '204HA11LN', 1, '202304120940.pdf', '2023-04-12 02:39:54', '2023-04-12 02:40:42'),
(7, 'DD1-PKT-TC DHKTKTCNHN', 'Đôn đốc sinh viên kiểm tra, đối chiếu công nợ học phí trên trang sinh viên và hoàn thành nhiệm vụ nộp học phí học kỳ II năm học 2022 – 2023', 'Còn rất nhiều sinh viên khoa công nghệ thông tin chưa nộp học phí, các giảng viên chủ nhiệm đôn đốc sinh viên kiểm tra, đối chiếu công nợ học phí trên trang sinh viên và hoàn thành nhiệm vụ nộp học phí học kỳ II năm học 2022 – 2023', 3, NULL, 'Ths Lê Mạnh Thắng', '2023-04-10', '2023-04-10', 'Phòng Chính Trị - CTSV', '2023-04-10', '2023-04-14', 'Huyền Linh', '204HA11LN', 1, '202304120952.pdf', '2023-04-12 02:51:40', '2023-04-12 06:33:04'),
(8, 'CVK1-DHKTKTCNHN', 'Công văn khẩn: mời giảng viên tham gia, dự họp giao ban, triển khai công tác tháng 04 năm 2023', 'Mời giảng viên tham gia, dự họp giao ban, triển khai công tác tháng 04 năm 2023, và kế hoạch học tập trong tháng 4', 6, NULL, 'TS Nguyễn Ngọc Khương', '2023-04-04', '2023-04-04', 'Trường ĐH KTKT CN Hà Nội', '2023-04-04', '2023-04-07', 'Huyền Linh', '204HA11LN', 1, '202304120958.pdf', '2023-04-12 02:56:47', '2023-04-12 02:58:37'),
(9, 'DD2-CTSV-DHKTKTCN', 'Đôn đốc sinh viên nộp bản chính Bằng tốt nghiệp, Học bạ THPT và giấy tờ còn thiếu đối với sinh viên đại học khóa 10 tuyển sinh năm 2017', 'Đôn đốc sinh viên khoa công nghệ thông tin  nộp bản chính Bằng tốt nghiệp, Học bạ THPT và giấy tờ còn thiếu đối với sinh viên đại học khóa 10 tuyển sinh năm 2017', 3, NULL, 'Ths Lê Mạnh Thắng', '2017-04-12', '2017-04-12', 'Phòng CTSV- DHKTKTCNHN', '2017-04-12', '2017-04-30', 'Huyền Linh', '204HA11LN', 1, '202304121007.pdf', '2023-04-12 03:07:52', '2023-04-12 06:32:51'),
(12, 'CVD -DN01-CNTT', 'Đề nghị tổ chức các lớp học lại, học cải thiện trong HK II năm học 2022 – 2023', 'Đề nghị tổ chức các lớp học lại, học cải thiện trong HK II năm học 2022 – 2023 cho sinh viên khoá 13 khoa công nghệ thông tin ,tạo điều kiện cho sinh viên ra trường đúng hạn', 4, 'ĐH KTKTCNHN', 'Ths Nguyễn Hoàng Chiến', '2023-02-03', '2023-02-03', 'Khoa CNTT UNETI', '2023-02-03', '2023-02-06', 'Huyền Linh', '204HA11LN', 2, '202304121021.pdf', '2023-04-12 03:21:03', '2023-04-12 03:21:03'),
(13, 'CVD-DN02-CNTT', 'Đề nghị  ban cán sự, BCH chi Đoàn, giáo viên chủ nhiệm và sinh viên các lớp tham gia, dự họp giao ban, triển khai công tác tháng 04 năm 2023', 'Đề nghị  ban cán sự, BCH chi Đoàn, giáo viên chủ nhiệm và sinh viên các lớp tham gia, dự họp giao ban, triển khai công tác và kế hoạch học tập  tháng 04 năm 2022, triển khai một số kế hoạch cho công tác thi cuối kỳ II', 4, 'Sinh viên,ban cán sự, BCH chi Đoàn, giáo viên chủ nhiệm,Giáo Viên chủ nhiệm,BCH chi đoàn', 'Ths Nguyễn Hoàng Chiến', '2022-03-28', '2022-03-28', 'Khoa CNTT UNETI', '2022-04-01', '2022-04-02', 'Chinh Anh', '204HA11LN', 2, '202304121047.pdf', '2023-04-12 03:47:21', '2023-04-12 03:47:21'),
(14, 'CVD-DD01-CNTT', 'Đôn đốc , sinh viên , giảng viên tham gia chống dịch Covid-19 theo chỉ đạo của Bộ Công Thương', 'Đôn đốc , sinh viên , giảng viên tham gia chống dịch Covid-19 theo chỉ đạo của Bộ Công Thương tại các điểm chốt dịch', 3, 'Sinh viên, giảng viên khoa công nghệ thông tin', 'Ths Nguyễn Hoàng Chiến', '2020-12-02', '2020-04-12', 'Khoa CNTT UNETI', '2020-12-02', '2020-12-12', 'Chinh Anh', '204HA11LN', 2, '202304121057.pdf', '2023-04-12 03:57:28', '2023-04-12 03:57:28'),
(15, 'CVD-HT01-CNTT', 'Công văn về việc báo cáo điểm danh và thực hiện khảo sát đầu khóa đối với SV khóa 16', 'Thông báo  về việc báo cáo điểm danh và thực hiện khảo sát đầu khóa đối với SV khóa 16, 100% sinh viên khoá 16 đã trúng tuyển và nhập học, sinh viên thực hiện đăng nhập để báo cáo ngay trong thời gian ca học', 5, 'Giáo viên chủ nhiệm, Sinh viên', 'Ths Cao Ngọc Ánh', '2022-09-30', '2022-09-30', 'Khoa CNTT UNETI', '2022-09-30', '2022-10-10', 'Huyền Linh', '204HA11LN', 2, '202304121329.pdf', '2023-04-12 06:29:04', '2023-04-12 07:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_types`
--

CREATE TABLE `dispatch_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispatch_types`
--

INSERT INTO `dispatch_types` (`id`, `type_code`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'CVHD', 'Công văn hướng dẫn', '2023-04-12 01:58:40', '2023-04-12 06:32:34'),
(2, 'CVCD', 'Công văn chỉ đạo', '2023-04-12 01:58:48', '2023-04-12 01:58:48'),
(3, 'CVDD', 'Công văn đôn đốc', '2023-04-12 01:59:17', '2023-04-12 01:59:17'),
(4, 'CVDN', 'Công văn đề nghị', '2023-04-12 01:59:24', '2023-04-12 01:59:24'),
(5, 'CVHT', 'Công văn hoả tốc', '2023-04-12 01:59:32', '2023-04-12 01:59:32'),
(6, 'CVK', 'Công văn khẩn', '2023-04-12 01:59:47', '2023-04-12 01:59:57'),
(7, 'CVQĐ', 'Công văn quyết định', '2023-04-12 02:00:18', '2023-04-12 02:00:18'),
(8, 'CVTT', 'Công văn thoả thuận', '2023-04-12 02:01:18', '2023-04-12 02:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'Tọa đàm “Chia sẻ kinh nghiệm, kiến thức, giáo dục giới tính và sức khoẻ sinh sản đối với Sinh viên”', '2023-04-12', '2023-04-12', '2023-04-12 06:05:26', '2023-04-12 06:06:38'),
(2, 'Sự kiện vinh danh Cán bộ lớp, sinh viên tiêu biểu có nhiều đóng góp cho phong trào sinh viên hoàn thành xuất sắc nhiệm vụ tháng 4 năm 2023', '2023-04-14', '2023-04-14', '2023-04-12 06:08:21', '2023-04-12 06:08:21'),
(3, 'Hội thảo “Đổi mới Công nghệ, Giáo dục Khoa học và Kỹ thuật trong các Trường Đại học” giữa trường Đại học Kinh tế – Kỹ thuật Công nghiệp, Việt Nam và Đại học Quốc gia Hanbat, Hàn Quốc', '2023-04-15', '2023-04-15', '2023-04-12 06:09:18', '2023-04-12 06:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `code`, `name`, `email`, `password`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '83742563', 'Đồng Diệu Ðiều', 'gv.83742563@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0334314644', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(2, '31787906', 'Lê Hà Khâm', 'gv.31787906@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0586006246', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(3, '94390766', 'Trần Quang Khuất', 'gv.94390766@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0944202234', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(4, '35030373', 'Trần Diệu Mẫu', 'gv.35030373@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0704243434', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(5, '13395533', 'Phạm Hà Gương', 'gv.13395533@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0961310431', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(6, '56540672', 'Đoàn Quang Bồ', 'gv.56540672@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0374226040', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(7, '14730785', 'Lê Tiến Huy', 'gv.14730785@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0362135564', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(8, '15286168', 'Hứa Hà Ngư', 'gv.15286168@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0783156310', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(9, '54192901', 'Trương Hà Há', 'gv.54192901@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0856330065', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(10, '41405841', 'Dương Văn Ngọ', 'gv.41405841@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0376535345', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(11, '42458443', 'Huỳnh Huy Ngưu', 'gv.42458443@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0981562003', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(12, '11568903', 'Phi Huy Viêm', 'gv.11568903@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0845653365', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(13, '62205268', 'Hứa Tiến Chử', 'gv.62205268@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0373065041', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(14, '14034420', 'Dương Nữ Tảo', 'gv.14034420@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0592264313', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(15, '31968338', 'Đỗ Văn Ðiểu', 'sv.19103100063@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0945342311', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(16, '13150355', 'Đỗ Tiến Châm', 'gv.13150355@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0916626651', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(17, '23635255', 'Đặng Văn Hình', 'gv.23635255@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0700544331', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(18, '50838105', 'Huỳnh Hà Kan', 'gv.50838105@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0813653145', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(19, '13563460', 'Trần Minh Ngô', 'gv.13563460@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0360651221', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(20, '71407046', 'Vũ Huy Tru', 'toiladuongtuan@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0331034000', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(21, '13037212', 'Bùi Minh Cáo', 'gv.13037212@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0833013606', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(22, '11023062', 'Đặng Diệu Trung', 'gv.11023062@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0394312551', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(23, '80033241', 'Dương Tiến Ủ', 'gv.80033241@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0790653322', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(24, '74589073', 'Bùi Văn Tảo', 'gv.74589073@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0565404665', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(25, '15028927', 'Phi Huy Hội', 'gv.15028927@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0825654004', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(26, '14993042', 'Trần Huy Cam', 'gv.14993042@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0865510053', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(27, '12873755', 'Hồ Tiến Chiều', 'gv.12873755@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0354054114', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(28, '10174173', 'Hồ Quang Vinh', 'gv.10174173@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0834446432', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(29, '97493770', 'Nguyễn Văn Huy', 'gv.97493770@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0565344156', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(30, '15570804', 'Hứa Nữ Ðức', 'gv.15570804@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0560526146', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(31, '75500868', 'Đặng Quang Bố', 'gv.75500868@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0900102201', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(32, '13683407', 'Đồng Tiến Ðịnh', 'gv.13683407@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0882626456', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(33, '11064875', 'Đào Tiến Trịnh', 'gv.11064875@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0395663350', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(34, '81395859', 'Lê Hà Mậu', 'gv.81395859@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0961411044', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(35, '17563796', 'Nguyễn Xuân Ðông', 'gv.17563796@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0376046641', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(36, '92419371', 'Phạm Thị Triệu', 'gv.92419371@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0560422534', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(37, '79370213', 'Bùi Quang Thềm', 'gv.79370213@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0593606344', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(38, '10473796', 'Huỳnh Tiến Mị', 'gv.10473796@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0796252140', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(39, '10940084', 'Lý Xuân Công', 'gv.10940084@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0324553600', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(40, '40847696', 'Hứa Quang Thiều', 'gv.40847696@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0816533503', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(41, '15391343', 'Trương Văn Hướng', 'gv.15391343@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0770426622', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(42, '13834602', 'Lê Minh Cáp', 'gv.13834602@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0380652643', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(43, '13863708', 'Đồng Nữ Triển', 'gv.13863708@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0980465605', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(44, '11384779', 'Dương Thị Ân', 'gv.11384779@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0704253505', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(45, '98896829', 'Dương Minh Ðặng', 'gv.98896829@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0376153462', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(46, '74983425', 'Bùi Tiến Mậu', 'gv.74983425@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0931210151', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(47, '50326800', 'Hồ Thị Khả', 'gv.50326800@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0922451415', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(48, '99797804', 'Hồ Thị Cáp', 'gv.99797804@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0821604241', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(49, '82270344', 'Phi Thị Thảo', 'gv.82270344@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0830031203', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(50, '12720555', 'Đào Minh Mạc', 'gv.12720555@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0941361244', 3, NULL, '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(51, 'tuantk', 'Tuan TK', 'admin@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0915988232', 1, 'MQvW827nArUMWIe3hTXsQX1F3LBlT5aIRx01WwBbI2kswO33bw3boj99OOf4', '2023-04-12 04:17:30', '2023-04-12 04:17:30'),
(52, 'tuangv', 'Tuan GiangVien', 'gv@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0123123432', 3, 'rkPwOsyj5Qzm6bSgd1i2kRrVvy59l00fOCD8OePMPTFamKHl08OSXZhHy7wh', '2023-04-12 04:17:30', '2023-04-12 04:17:30'),
(53, 'tuanpk', 'Tuan Pk', 'pk@uneti.edu.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0978144432', 2, 'IhJG2HMudX0O6NkgYyKCNENoQpG2s5o5uXw7akMxd5BaTP0F9GMym0O0NbYZ', '2023-04-12 04:18:41', '2023-04-12 04:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(83, '2019_08_19_000000_create_failed_jobs_table', 2),
(84, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(85, '2023_02_21_083721_create_students_table', 2),
(86, '2023_02_21_085353_create_dispatch_types_table', 2),
(87, '2023_03_07_153419_create_lecturers_table', 2),
(88, '2023_03_15_130945_create_dispatches_table', 2),
(89, '2023_03_15_142126_create_theses_table', 2),
(90, '2023_03_15_143458_create_theses_students_table', 2),
(91, '2023_03_22_132611_create_creative_ideas_table', 2),
(92, '2023_03_22_133134_create_creative_idea_students_table', 2),
(93, '2023_03_22_152443_create_student_research_table', 2),
(94, '2023_03_22_153930_create_student_research_students_table', 2),
(95, '2023_03_23_152328_create_basic_research_table', 2),
(96, '2023_03_23_154327_create_basic_research_lecturers_table', 2),
(97, '2023_04_10_025610_create_events_table', 2),
(98, '2023_04_10_201203_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `student_name`, `student_class`, `student_school_year`, `created_at`, `updated_at`) VALUES
(1, '1611209831', 'Đoàn Tiến Phó', 'DHTI16A5HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(2, '1473321154', 'Trịnh Văn Khâm', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(3, '1265156802', 'Huỳnh Tiến Vũ', 'DHTI12A5HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(4, '1666792177', 'Huỳnh Nữ Dân', 'DHTI16A3HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(5, '992995163', 'Trịnh Văn Hinh', 'DHTI9A1HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(6, '1367000296', 'Đỗ Thị Kiên', 'DHTI13A2HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(7, '820115688', 'Hồ Minh Viết', 'DHTI8A3HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(8, '1338189470', 'Bùi Diệu On', 'DHTI13A3HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(9, '1211630954', 'Nguyễn Thị Tằng', 'DHTI12A4HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(10, '914944626', 'Trương Hà Mạch', 'DHTI9A2HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(11, '970075551', 'Lý Văn Dị', 'DHTI9A3HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(12, '814703354', 'Lý Hà Xa', 'DHTI8A2HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(13, '1137546376', 'Đặng Văn Xa', 'DHTI11A4HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(14, '1516483634', 'Huỳnh Minh Ðồ', 'DHTI15A5HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(15, '1612737392', 'Phi Hà Từ', 'DHTI16A3HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(16, '1610274502', 'Bùi Huy Tô', 'DHTI16A1HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(17, '1511672274', 'Ngô Thị Thôi', 'DHTI15A1HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(18, '1161832288', 'Phạm Hà Kỷ', 'DHTI11A3HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(19, '1315913412', 'Đồng Quang Ngạc', 'DHTI13A1HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(20, '1535709425', 'Ngô Xuân Bùi', 'DHTI15A3HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(21, '1212922334', 'Phạm Minh Ủ', 'DHTI12A2HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(22, '1277021231', 'Hồ Huy Trượng', 'DHTI12A3HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(23, '1588350194', 'Dương Thị Hinh', 'DHTI15A1HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(24, '1013985094', 'Hứa Diệu Lý', 'DHTI10A4HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(25, '1314176973', 'Nguyễn Hà Kha', 'DHTI13A4HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(26, '1649511471', 'Lý Quang Sẩm', 'DHTI16A4HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(27, '1439309864', 'Vũ Hà Trang', 'DHTI14A4HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(28, '1414716872', 'Vũ Minh Lữ', 'DHTI14A4HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(29, '813107843', 'Ngô Tiến Thất', 'DHTI8A4HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(30, '731362957', 'Phi Huy Mao', 'DHTI7A3HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(31, '1014484432', 'Ngô Quang Man', 'DHTI10A3HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(32, '1548444785', 'Vũ Minh Gioãn', 'DHTI15A4HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(33, '930057410', 'Trịnh Quang Khúc', 'DHTI9A1HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(34, '1112493575', 'Đỗ Huy Hoan', 'DHTI11A1HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(35, '913210256', 'Nguyễn Thị Bia', 'DHTI9A1HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(36, '1681771112', 'Phạm Hà Nhung', 'DHTI16A4HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(37, '1639156001', 'Dương Tiến Ðịnh', 'DHTI16A1HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(38, '1193273467', 'Đỗ Nữ Tường', 'DHTI11A1HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(39, '967909796', 'Trịnh Diệu Hàn', 'DHTI9A2HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(40, '1488030963', 'Phi Quang Lương', 'DHTI14A5HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(41, '1251507195', 'Trần Minh Thể', 'DHTI12A4HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(42, '1013533139', 'Trương Minh Chu', 'DHTI10A3HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(43, '1569922429', 'Đoàn Huy Âu', 'DHTI15A5HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(44, '984097739', 'Lê Tiến Nghi', 'DHTI9A1HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(45, '1214714807', 'Đỗ Diệu Bông', 'DHTI12A1HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(46, '1615316086', 'Trương Văn Viết', 'DHTI16A1HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(47, '1136172760', 'Phạm Tiến Vô', 'DHTI11A2HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(48, '761731834', 'Đặng Diệu Danh', 'DHTI7A5HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(49, '1633719098', 'Huỳnh Xuân Bông', 'DHTI16A4HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(50, '1287865562', 'Phan Tiến Bạch', 'DHTI12A1HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(51, '1272797839', 'Vũ Văn Ðình', 'DHTI12A5HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(52, '811443976', 'Hứa Huy Cáo', 'DHTI8A2HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(53, '768784331', 'Nguyễn Tiến Hình', 'DHTI7A5HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(54, '1516152906', 'Trịnh Xuân Phó', 'DHTI15A4HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(55, '1090054907', 'Đỗ Huy Miên', 'DHTI10A1HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(56, '1539963915', 'Lê Hà Tạo', 'DHTI15A4HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(57, '840944731', 'Nguyễn Hà Nghĩa', 'DHTI8A3HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(58, '812550550', 'Nguyễn Văn Diêu', 'DHTI8A3HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(59, '1416015498', 'Lê Minh Mạch', 'DHTI14A4HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(60, '991690544', 'Dương Diệu Bà', 'DHTI9A4HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(61, '1615881268', 'Phan Thị Vòng', 'DHTI16A2HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(62, '1133522422', 'Đoàn Hà Tưởng', 'DHTI11A3HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(63, '711717660', 'Ngô Xuân Thềm', 'DHTI7A4HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(64, '1415617072', 'Đồng Tiến Công', 'DHTI14A4HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(65, '715034344', 'Hứa Quang Tưởng', 'DHTI7A3HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(66, '1620692054', 'Phan Hà Huy', 'DHTI16A5HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(67, '1522551767', 'Bùi Tiến Kiều', 'DHTI15A2HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(68, '1611921704', 'Đoàn Thị Tôn', 'DHTI16A2HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(69, '1414386321', 'Đồng Nữ Trương', 'DHTI14A5HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(70, '767914913', 'Phi Minh Nhan', 'DHTI7A5HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(71, '1410947144', 'Vũ Nữ Kiên', 'DHTI14A3HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(72, '1615281843', 'Đồng Xuân Tuân', 'DHTI16A4HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(73, '811181907', 'Đoàn Thị Hình', 'DHTI8A3HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(74, '1213248592', 'Trần Nữ Huy', 'DHTI12A4HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(75, '1626905405', 'Ngô Minh Bạc', 'DHTI16A3HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(76, '1211604631', 'Đỗ Quang Tống', 'DHTI12A3HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(77, '1541820970', 'Lý Huy Giốc', 'DHTI15A2HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(78, '951970641', 'Phạm Xuân Thạc', 'DHTI9A3HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(79, '911830731', 'Đồng Huy Chung', 'DHTI9A2HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(80, '1021596044', 'Đoàn Huy Ðồng', 'DHTI10A3HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(81, '938054256', 'Lý Văn Can', 'DHTI9A2HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(82, '1440086692', 'Đồng Hà Nhạn', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(83, '1383117028', 'Trịnh Hà Mai', 'DHTI13A5HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(84, '1413395196', 'Nguyễn Nữ Hướng', 'DHTI14A3HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(85, '919003025', 'Phi Nữ Mao', 'DHTI9A1HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(86, '1224219309', 'Hứa Quang Ðống', 'DHTI12A4HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(87, '1214348957', 'Lê Quang Sử', 'DHTI12A5HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(88, '1283932914', 'Trịnh Thị Ðường', 'DHTI12A5HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(89, '1421433120', 'Phi Tiến Ðình', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(90, '1269825813', 'Phạm Nữ Lại', 'DHTI12A4HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(91, '810529910', 'Đồng Thị Huỳnh', 'DHTI8A2HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(92, '1085513556', 'Bùi Hà Bồ', 'DHTI10A2HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(93, '812438347', 'Bùi Quang Huỳnh', 'DHTI8A2HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(94, '1310674503', 'Hồ Huy Vũ', 'DHTI13A5HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(95, '1262917745', 'Phạm Tiến Tha', 'DHTI12A2HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(96, '1430130256', 'Hứa Minh Ứng', 'DHTI14A3HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(97, '1283436246', 'Đồng Hà Tuấn', 'DHTI12A2HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(98, '710117857', 'Trương Quang Ngọc', 'DHTI7A1HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(99, '1089681850', 'Trịnh Văn Ô', 'DHTI10A5HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(100, '1046688854', 'Trần Xuân Võ', 'DHTI10A5HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(101, '1244725148', 'Hồ Minh Nan', 'DHTI12A1HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(102, '1411678382', 'Hồ Quang Ða', 'DHTI14A1HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(103, '913586479', 'Ngô Văn Ðình', 'DHTI9A3HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(104, '1010695036', 'Dương Tiến Sa', 'DHTI10A5HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(105, '1170088499', 'Đỗ Diệu Ðối', 'DHTI11A1HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(106, '1514454341', 'Trương Hà Bạc', 'DHTI15A5HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(107, '1527211014', 'Phan Quang Chiêm', 'DHTI15A3HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(108, '1315751494', 'Đặng Thị Nung', 'DHTI13A4HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(109, '1616068513', 'Vũ Quang Tha', 'DHTI16A5HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(110, '1314254699', 'Hứa Hà Lương', 'DHTI13A4HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(111, '1414334159', 'Lý Hà Sam', 'DHTI14A1HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(112, '1511805810', 'Hồ Hà Sơn', 'DHTI15A1HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(113, '1073963936', 'Ngô Thị Lô', 'DHTI10A2HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(114, '1239394605', 'Lý Nữ Mạnh', 'DHTI12A5HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(115, '1511111759', 'Trịnh Diệu Tiêu', 'DHTI15A1HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(116, '1013209845', 'Trương Diệu Khúc', 'DHTI10A3HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(117, '865798919', 'Hứa Tiến Huỳnh', 'DHTI8A4HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(118, '1312112425', 'Đào Diệu Bồ', 'DHTI13A1HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(119, '996658035', 'Vũ Hà Lại', 'DHTI9A2HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(120, '1210780786', 'Dương Tiến Ðấu', 'DHTI12A4HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(121, '1376490626', 'Đồng Huy Tượng', 'DHTI13A1HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(122, '1699033720', 'Hứa Xuân Hung', 'DHTI16A5HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(123, '1186920342', 'Dương Nữ Hoan', 'DHTI11A5HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(124, '1438075563', 'Vũ Quang Kỷ', 'DHTI14A3HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(125, '1236147351', 'Trương Văn Khiếu', 'DHTI12A1HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(126, '1512803977', 'Đỗ Huy Viêm', 'DHTI15A3HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(127, '1464811436', 'Dương Huy Cô', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(128, '930908309', 'Ngô Xuân Cổ', 'DHTI9A4HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(129, '715670026', 'Hứa Hà Thịnh', 'DHTI7A3HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(130, '1361099614', 'Trương Diệu Bình', 'DHTI13A5HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(131, '855188217', 'Dương Nữ Khâm', 'DHTI8A5HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(132, '1628311803', 'Đào Hà Khôi', 'DHTI16A5HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(133, '812322539', 'Ngô Văn Ngọ', 'DHTI8A5HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(134, '1357333410', 'Ngô Quang Cát', 'DHTI13A3HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(135, '1029384599', 'Đồng Huy Hoàng', 'DHTI10A1HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(136, '1013106649', 'Huỳnh Tiến Bồ', 'DHTI10A1HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(137, '911697320', 'Trịnh Văn Cố', 'DHTI9A2HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(138, '1514817606', 'Bùi Hà Thất', 'DHTI15A5HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(139, '1052322542', 'Vũ Thị Quốc', 'DHTI10A2HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(140, '1111562837', 'Lý Hà Hò', 'DHTI11A2HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(141, '1315369363', 'Lý Diệu Ngọ', 'DHTI13A5HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(142, '926941766', 'Đồng Văn Trưng', 'DHTI9A4HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(143, '1210812052', 'Lê Hà Thục', 'DHTI12A2HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(144, '1411815167', 'Trương Quang Từ', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(145, '1612914031', 'Dương Minh Nghi', 'DHTI16A1HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(146, '1583922393', 'Ngô Huy Giáp', 'DHTI15A5HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(147, '1619892817', 'Phan Hà Cảm', 'DHTI16A3HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(148, '812429435', 'Đỗ Huy Vệ', 'DHTI8A5HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(149, '847076547', 'Trịnh Văn Danh', 'DHTI8A4HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(150, '1040760512', 'Đặng Hà Hình', 'DHTI10A4HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(151, '1271051671', 'Đoàn Huy Vinh', 'DHTI12A3HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(152, '1611373291', 'Đoàn Quang Linh', 'DHTI16A4HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(153, '716711390', 'Hứa Nữ Khổng', 'DHTI7A4HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(154, '911927997', 'Hồ Văn Tôn Nữ', 'DHTI9A3HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(155, '1532402087', 'Đào Huy Lộ', 'DHTI15A4HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(156, '1457517803', 'Lê Văn Ân', 'DHTI14A1HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(157, '816558630', 'Bùi Huy Cả', 'DHTI8A5HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(158, '1413026843', 'Ngô Thị Căn', 'DHTI14A3HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(159, '1410989478', 'Dương Quang Hướng', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(160, '1476585313', 'Ngô Thị Ông', 'DHTI14A1HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(161, '1010876925', 'Lê Xuân Vầu', 'DHTI10A5HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(162, '1313296194', 'Đồng Nữ Kiệu', 'DHTI13A4HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(163, '1314549655', 'Lê Huy Lại', 'DHTI13A1HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(164, '1111159560', 'Trương Minh Hồ', 'DHTI11A4HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(165, '998539172', 'Đặng Xuân Tần', 'DHTI9A3HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(166, '965381174', 'Lê Hà Bàn', 'DHTI9A4HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(167, '1415851822', 'Nguyễn Hà Cổ', 'DHTI14A4HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(168, '1083073507', 'Phạm Diệu Cù', 'DHTI10A5HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(169, '1318736674', 'Ngô Quang Khương', 'DHTI13A3HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(170, '1110505863', 'Đào Hà Vương', 'DHTI11A2HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(171, '1315723183', 'Phạm Diệu Hi', 'DHTI13A1HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(172, '1311639418', 'Phạm Nữ Diệc', 'DHTI13A5HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(173, '1119447131', 'Hồ Huy Ủ', 'DHTI11A5HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(174, '1015850768', 'Nguyễn Diệu Ửng', 'DHTI10A3HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(175, '1249355444', 'Hồ Quang Giản', 'DHTI12A3HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(176, '1414070289', 'Vũ Huy Liêu', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(177, '816532690', 'Dương Minh Dân', 'DHTI8A4HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(178, '1511947836', 'Vũ Quang Mạch', 'DHTI15A4HN', '15', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(179, '1611839387', 'Ngô Tiến Phàn', 'DHTI16A3HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(180, '812890267', 'Phi Văn Thạch', 'DHTI8A3HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(181, '949825173', 'Đồng Thị Công', 'DHTI9A1HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(182, '751880274', 'Đoàn Tiến Quyến', 'DHTI7A2HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(183, '1314652367', 'Trịnh Văn Tuấn', 'DHTI13A5HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(184, '910647605', 'Đào Nữ Bà', 'DHTI9A4HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(185, '1113848368', 'Phi Văn Viết', 'DHTI11A2HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(186, '1231429578', 'Lê Huy Danh', 'DHTI12A2HN', '12', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(187, '1390503437', 'Đồng Tiến Miên', 'DHTI13A1HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(188, '789879024', 'Phan Hà Bồ', 'DHTI7A2HN', '7', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(189, '1115829150', 'Trịnh Nữ Dã', 'DHTI11A3HN', '11', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(190, '923351232', 'Đặng Hà Lộ', 'DHTI9A3HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(191, '1011705918', 'Lý Minh Ngọ', 'DHTI10A1HN', '10', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(192, '936750188', 'Dương Tiến Thi', 'DHTI9A2HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(193, '1410795423', 'Trịnh Quang Khôi', 'DHTI14A1HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(194, '1681835742', 'Trịnh Minh Nghê', 'DHTI16A2HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(195, '911655220', 'Đoàn Nữ Nữ', 'DHTI9A3HN', '9', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(196, '1414016678', 'Bùi Nữ Thiệu', 'DHTI14A2HN', '14', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(197, '1315450329', 'Bùi Diệu Ứng', 'DHTI13A4HN', '13', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(198, '842006594', 'Đỗ Tiến Lộc', 'DHTI8A4HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(199, '853703770', 'Đặng Quang Ðào', 'DHTI8A4HN', '8', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(200, '1687710418', 'Đoàn Huy Tần', 'DHTI16A2HN', '16', '2023-04-11 21:16:55', '2023-04-11 21:16:55'),
(201, '19103100068', 'Nguyễn Đức An', 'DHTI13A1HN', '13', '2023-04-12 06:39:59', '2023-04-12 06:39:59'),
(202, '19103100048', 'Đỗ Thanh Thúy', 'DHTI13A1HN', '13', '2023-04-12 06:39:59', '2023-04-12 06:39:59'),
(203, '19103100241', 'Đồng Duy Hưng', 'DHTI13A4HN', '13', '2023-04-12 06:41:49', '2023-04-12 06:41:49'),
(204, '19103100279', 'Hoàng Thị Quỳnh', 'DHTI13A4HN', '13', '2023-04-12 06:41:49', '2023-04-12 06:41:49'),
(205, '19103100153', 'Nguyễn Ngọc Hải', 'DHTI13A1HN', '13', '2023-04-12 06:44:11', '2023-04-12 06:44:11'),
(206, '19103100189', 'Vũ Thị Thu  Hương', 'DHTI13A1HN', '13', '2023-04-12 06:44:11', '2023-04-12 06:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `student_research`
--

CREATE TABLE `student_research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivist` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_research`
--

INSERT INTO `student_research` (`id`, `tittle`, `content`, `lecturer_id`, `year`, `result`, `archivist`, `storage_location`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Thuật toán tô màu đồ thị và ứng dụng trong bài toán xếp lịch thi.', 'Ứng dụng xây dựng chương trình lập lịch thi với 2 tiêu chí: phân bổ\r\nđều thời gian sao cho các môn học trong một hệ và các môn thi sử dụng chung phòng thực hành không thi trùng nhau, thời gian rải đều cho các môn trong một lớp và trong toàn thời gian.', 1, '2022-2023', 'Khá', 'Tuấn Hải', '202HA11LN', '202304120756.pdf', '2023-04-11 23:14:21', '2023-04-12 01:02:50'),
(2, 'Ứng dụng web ngữ nghĩa để xây dựng hệ thống tra cứu thông tin về nền văn hóa của dân tộc Khmer', 'hệ thống tra cứu thông tin về VHK NB nhằm hỗ trợ việc tra cứu, đáp ứng nhu cầu tìm kiếm chính xác, cung cấp những tri thức cần thiết về VHK NB góp phần thực hiện tốt công tác bảo tồn, phát huy bản sắc văn hóa dân tộc', 2, '2022-2023', 'Khá', 'Tuấn Hải', '202HA11LN', '202304120807.pdf', '2023-04-12 01:07:47', '2023-04-12 01:07:47'),
(3, 'Nghiên cứu và xây dựng bộ lọc ảnh thông qua việc phân loại ảnh kết hợp với gom cụm', 'Trong bài báo này, một cải tiến thuật toán K-Means được đề xuất nhằm phân cụm dữ\r\nliệu và áp dụng cho bài toán tìm kiếm ảnh tương tự theo nội dung. Để thực hiện được điều\r\nnày, chúng tôi sử dụng một giá trị ngưỡng đo độ tương tự giữa các đối tượng dữ liệu, ngưỡng\r\nnày được kí hiệu là 𝜃. Trên cơ sở ngưỡng 𝜃, thuật toán K-Means được cải tiến bằng cách\r\nkhông xác định trước số tâm cụm, số cụm dữ liệu tăng trưởng theo sự gia tăng của số lượng\r\nhình ảnh. Đặc trưng của hình ảnh được trích xuất dưới dạng một véc-tơ có n chiều và là dữ\r\nliệu đầu vào cho thuật toán K-Means đã được cải tiến để từ đó tìm kiếm các hình ảnh tương\r\ntự. Nhằm minh chứng cho các đề xuất, chúng tôi thực nghiệm và đánh giá kết quả trên tập dữ\r\nliệu ảnh COREL (có 1000 ảnh) đồng thời so sánh với các công trình khác đã được công bố\r\ngần đây trên cùng bộ dữ liệu. Theo như kết quả thực nghiệm, những đề xuất của chúng tôi là\r\nkhả thi và có thể ứng dụng cho các hệ thống tìm kiếm ảnh khác nhau.', 4, '2022-2023', 'Xuất Sắc', 'Tuấn Hải', '202HA11LN', '202304120811.pdf', '2023-04-12 01:11:37', '2023-04-12 01:11:37'),
(4, 'Khai phá dữ liệu xây dựng hệ thống hỗ trợ chẩn đoán y khoa.', 'Ngành y tế và giáo dục luôn là vấn đề sống còn của bất kỳ quốc gia nào trên thế giới. Trong những năm gần đây, chính phủ Việt Nam đặc biệt đầu tư cho hai ngành mũi nhọn này thông qua các chính sách, nguồn vốn dành cho trang bị hạ tầng và nghiên cứu khoa học. Trong lĩnh vực nghiên cứu khoa học, càng ngày càng có nhiều công trình khoa học về y tế. Tuy nhiên các nghiên cứu khoa học về ứng dụng công nghệ thông tin để giải quyết các bài toán về y tế là không nhiều. Do đặc điểm về vị trí địa lý của Việt Nam là một nước nhiệt đới nên có rất nhiều loại bệnh liên quan đến sốt siêu vi trong đó sốt xuất huyết là bệnh rất nguy hiểm đồng thời chưa có vaccine chủng ngừa và chưa có thuốc đặc trị, vì vậy đề tài nghiên cứu các qui luật chẩn đoán bệnh sốt xuất huyết tại Việt Nam bằng kỹ thuật khai phá dữ liệu. Dựa vào các triệu chứng lâm sàng và cận lâm sàng có thể phân lớp bệnh của bệnh nhân nhằm giúp các bác sĩ chẩn đoán và điệu trị tốt hơn cho bệnh nhân.', 32, '2022-2023', 'Tốt', 'Tuấn Hải', '202HA11LN', '202304120816.pdf', '2023-04-12 01:16:11', '2023-04-12 01:16:11'),
(5, 'Ứng dụng công nghệ phát hiện và nhận dạng khuôn mặt từ camera vào điểm danh tại trường đại học.', 'Điểm danh bằng nhận diện khuôn mặt ngày nay đã trở thành một xu thế, được ứng rộng rãi trong nhiều lĩnh vực. Công nghệ nhận diện thông minh này có khả năng xác định hoặc xác nhận nhanh chóng, chính xác, an toàn và hiệu quả. Do vậy việc ứng dụng hệ thống nhận diện bằng khuôn mặt cho trường học đang được rất nhiều nhà quản lý quan tâm. Bởi nó vô cùng tiện lợi, trong quá trình giám sát và điểm danh học sinh cho ra kết quả nhanh chóng và hiệu quả nhất.', 34, '2022-2023', 'Khá', 'Tuấn Hải', '202HA11LN', '202304120821.pdf', '2023-04-12 01:21:50', '2023-04-12 01:21:50'),
(6, 'Tìm hiểu giao thức IP Multicant và ứng dụng giao thức IP Multicant trong đào tạo điện tử.', 'Phần mở đầu\r\nChương 1: Tìm hiểu về công nghệ IP Multicast\r\nChương 2: Đào tạo điện tử dựa trên công nghệ IP Multicast\r\nChương 3: Xây dựng hệ thống đào tạo điện tử dựa trên công nghệ IP\r\nMulticast<br> Kết quả đạt được <br>Kết luận <br>Những kiến nghị nghiên cứu tiếp theo <br>Tài liệu tham khảo', 36, '2022-2023', 'Khá', 'Tuấn Hải', '202HA11LN', '202304120825.pdf', '2023-04-12 01:25:20', '2023-04-12 01:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `student_research_students`
--

CREATE TABLE `student_research_students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_research_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_research_students`
--

INSERT INTO `student_research_students` (`student_id`, `student_research_id`) VALUES
(1, 1),
(2, 1),
(11, 2),
(12, 2),
(14, 3),
(16, 3),
(26, 4),
(27, 4),
(31, 5),
(33, 5),
(39, 6),
(40, 6);

-- --------------------------------------------------------

--
-- Table structure for table `theses`
--

CREATE TABLE `theses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `archivist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theses`
--

INSERT INTO `theses` (`id`, `code`, `tittle`, `content`, `lecturer_id`, `school_year`, `start_date`, `end_date`, `archivist`, `storage_location`, `file`, `created_at`, `updated_at`) VALUES
(1, 'LV1681288289', 'Nhận Dạng Ký Tự Viết Tay Online Với Máy Học Vector Hỗ Trợ (SVM) Và Nhận Dạng Chữ Viết Tay Liền Nét', 'Mô hình Markov ẩn (HMM) và Máy học vector hỗ trợ là hai phương pháp phổ biến dùng trong các hệ thống nhận dạng. Các hệ thống này đang hứa hẹn một sự thành công trong tương lai. Trong bài luận văn này, chúng tôi giới thiệu phương pháp nhận dạng chữ viết tay liền nét sử dụng hệ thống kết hợp SVM/HMM. SVM được sử dụng cho nhận dạng ký tự với kết quả đầy hứa hẹn (93.27%). HMM được sử dụng cho nhận dạng từ với nhiều kết quả: Top(1) 30.77%, Top(3) 51.17%, Top(10) 74.92%. Chúng tôi sử dụng cơ sở dữ liệu IRONOFF để huấn luyện và kiểm tra. Bộ từ vựng được chúng tôi sử dụng cho nhận dạng từ gồm 30 từ tiếng Pháp được sử dụng trong các chi phiếu.', 1, '10', '2019-12-21', '2022-04-12', 'Chinh Anh', '204HA11LN', '202304120831.pdf', '2023-04-12 01:31:29', '2023-04-12 01:31:29'),
(2, 'LV1681288569', 'Khai Thác Tập Mục Lợi Ích Cao Bảo Toàn Tính Riêng Tư', 'Tập lợi ích cao (TLIC) là một vấn đề quan trọng trong khai phá dữ liệu, xem xét các lợi ích của các mục (chẳng hạn như lợi nhuận và lãi suất) được khám phá từ cơ sở dữ liệu (CSDL) giao dịch hỗ trợ cho việc kinh doanh của các đơn vị. Bài báo trình bày một phương pháp khai thác tập lợi ích cao có lợi nhuận âm trên CSDL phân tán dọc. Việc khai thác tập lợi ích cao đã được nghiên cứu và công bố rộng rãi trong những năm gần đây. Có nhiều thuật toán khai thác các tập lợi ích cao (TLIC) bằng cách cắt tỉa các ứng cử viên dựa trên các giá trị lợi ích và dựa trên các giá trị sử dụng có trọng số giao dịch. Các thuật toán này đều hướng tới mục đích làm giảm không gian tìm kiếm. Trong bài báo này, chúng tôi đề xuất một phương pháp khai thác tập lợi ích cao có lợi nhuận âm (TLIC-TSA) từ CSDL phân tán dọc.', 2, '11', '2020-11-22', '2021-03-10', 'Tuấn Hải', '204HA11LN', '202304120836.pdf', '2023-04-12 01:36:09', '2023-04-12 01:36:09'),
(3, 'LV1681288756', 'Theo Dõi Đối Tượng Chuyển Động Bằng Phương Pháp Lọc Tích Hợp', 'Luận văn Theo dõi đối tượng chuyển động bằng phương pháp lọc tích hợp nghiên cứu phương pháp tích hợp các bộ lọc phù hợp vào các phương pháp hiện tại để nâng cao hiệu quả của bài toán; các phương pháp xử lý ảnh và video; nghiên cứu về bài toán phát hiện chuyển động và bài toán theo vết đối tượng, các phương pháp phát hiện chuyển động và theo vết đối tượng phổ biến, phương pháp tích hợp các bộ lọc phù hợp vào các phương pháp hiện tại và đề xuất giải thuật hiệu quả.', 33, '13', '2022-12-22', '2023-04-12', 'Chinh Anh', '204HA11LN', '202304120839.pdf', '2023-04-12 01:39:16', '2023-04-12 01:39:16'),
(4, 'LV1681289116', 'ứng  dụng ETL trong kho dữ liệu ứng dụng vào hệ thống ERP', 'Theo cách truyền thống, các công cụ cho ETL chủ yếu được sử dụng để cung cấp dữ liệu đến các kho dữ liệu doanh nghiệp hỗ trợ các ứng dụng thông minh kinh doanh (BI). Những kho dữ liệu như vậy được thiết kế để đại diện cho một nguồn trung thực đáng tin cậy về tất cả những gì đang xảy ra trong một doanh nghiệp trên tất cả các hoạt động. Dữ liệu trong các kho này được cấu trúc cẩn thận với các lược đồ, siêu dữ liệu và quy tắc chặt chẽ chi phối việc xác thực dữ liệu.', 35, '12', '2021-11-22', '2022-03-12', 'Chinh Anh', '204HA11LN', '202304120845.pdf', '2023-04-12 01:45:16', '2023-04-12 01:45:16'),
(5, 'LV1681289379', 'Xây dựng ứng dụng hỗ trợ chấm công dựa trên nhận dạng khuôn mặt người – tại công ty tin học Hoài Ân', 'Ngày nay, khi công nghệ dần trở nên quen thuộc với cuộc sống hàng ngày của tất cả mọi người, không loại trừ các hoạt động vận hành thường nhật của doanh nghiệp như: chấm công, điểm danh… thì việc sử dụng phần mềm chấm công bằng khuôn mặt thay thế các thiết bị vật lý như máy vân tay, máy quét thẻ… đang dần trở thành xu hướng mới.', 36, '7', '2020-12-12', '2021-04-12', 'Chinh Anh', '204HA11LN', '202304120857.pdf', '2023-04-12 01:49:39', '2023-04-12 01:57:08'),
(6, 'LV1681289608', 'Nâng cao chất lượng phân tích trang tài liệu hỗn hợp dựa trên số chiều Fractal', 'Một trong những mục tiêu quan trọng hàng đầu của công nghệ xử lý hình ảnh hiện nay là sự thể hiện hình ảnh thế giới thực với đầy đủ tính phong phú và sống động trên máy tính. Vấn đề nan giải trong lĩnh vực này chủ yếu do yêu cầu về không gian lưu trữ thông tin vược quá khả năng của các thiết bị lưu trữ  thông thường. Có thể đơn cử một ví dụ đơn giản: 1 ảnh có chất lượng gần như ảnh chụp đòi hỏi 1 vùng nhớ 24 bit cho 1 điểm ảnh, nên để hiện ảnh đó trên một màn hình máy tính có độ phân giải tương đối cao như 1024x768 cần xấp xỉ 2.25Mb. với các ảnh \"thực\" 24 bit này, để thể hiện được một hoạt cảnh trong thời gian 10 giây đòi hỏi xấp xỉ 700Mb dữ liệu, tức là bằng sức chứa của một đĩa CD-ROM. Như vậy khó có thể đưa công nghệ multimedia lên máy PC vì nó đòi hỏi một cơ sở dữ liệu ảnh và âm thanh khổng lồ.', 37, '8', '2018-12-01', '2019-04-04', 'Chinh Anh', '204HA11LN', '202304120853.pdf', '2023-04-12 01:53:28', '2023-04-12 01:53:28'),
(7, 'LV1681289783', 'Phát triển thuật giải tìm kiếm tương tự với mô hình MapReduce', 'Mô hình Mapreduce được thiết kế dựa trên các khái niệm biến đổi của một bản đồ và thiết lập các chức năng lập trình đi theo hướng chức năng. Thư viện của thủ tục Map và thủ tục Reduce sẽ được viết bằng đa dạng các loại ngôn ngữ lập trình khác nhau. Các thủ tục này sẽ được cài đặt hoàn toàn miễn phí và Apache Hadoop là thủ tục MapReduce được sử dụng phổ biến nhất.', 41, '7', '2016-11-11', '2017-02-21', 'Chinh Anh', '202HA11LN', '202304120856.pdf', '2023-04-12 01:56:23', '2023-04-12 01:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `theses_students`
--

CREATE TABLE `theses_students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `theses_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theses_students`
--

INSERT INTO `theses_students` (`student_id`, `theses_id`) VALUES
(31, 1),
(32, 1),
(41, 2),
(42, 2),
(43, 3),
(45, 3),
(47, 4),
(48, 4),
(58, 6),
(73, 6),
(70, 7),
(129, 7),
(47, 5),
(105, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_research`
--
ALTER TABLE `basic_research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_research_lecturers`
--
ALTER TABLE `basic_research_lecturers`
  ADD KEY `basic_research_lecturers_lecturer_id_foreign` (`lecturer_id`),
  ADD KEY `basic_research_lecturers_basic_research_id_foreign` (`basic_research_id`);

--
-- Indexes for table `creative_ideas`
--
ALTER TABLE `creative_ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creative_ideas_lecturer_id_foreign` (`lecturer_id`);

--
-- Indexes for table `creative_idea_students`
--
ALTER TABLE `creative_idea_students`
  ADD KEY `creative_idea_students_student_id_foreign` (`student_id`),
  ADD KEY `creative_idea_students_creative_idea_id_foreign` (`creative_idea_id`);

--
-- Indexes for table `dispatches`
--
ALTER TABLE `dispatches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dispatches_code_unique` (`code`),
  ADD KEY `dispatches_type_id_foreign` (`type_id`);

--
-- Indexes for table `dispatch_types`
--
ALTER TABLE `dispatch_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dispatch_types_type_code_unique` (`type_code`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lecturers_code_unique` (`code`),
  ADD UNIQUE KEY `lecturers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_research`
--
ALTER TABLE `student_research`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_research_lecturer_id_foreign` (`lecturer_id`);

--
-- Indexes for table `student_research_students`
--
ALTER TABLE `student_research_students`
  ADD KEY `student_research_students_student_id_foreign` (`student_id`),
  ADD KEY `student_research_students_student_research_id_foreign` (`student_research_id`);

--
-- Indexes for table `theses`
--
ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theses_code_unique` (`code`),
  ADD KEY `theses_lecturer_id_foreign` (`lecturer_id`);

--
-- Indexes for table `theses_students`
--
ALTER TABLE `theses_students`
  ADD KEY `theses_students_student_id_foreign` (`student_id`),
  ADD KEY `theses_students_theses_id_foreign` (`theses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_research`
--
ALTER TABLE `basic_research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `creative_ideas`
--
ALTER TABLE `creative_ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dispatches`
--
ALTER TABLE `dispatches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dispatch_types`
--
ALTER TABLE `dispatch_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `student_research`
--
ALTER TABLE `student_research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theses`
--
ALTER TABLE `theses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basic_research_lecturers`
--
ALTER TABLE `basic_research_lecturers`
  ADD CONSTRAINT `basic_research_lecturers_basic_research_id_foreign` FOREIGN KEY (`basic_research_id`) REFERENCES `basic_research` (`id`),
  ADD CONSTRAINT `basic_research_lecturers_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`);

--
-- Constraints for table `creative_ideas`
--
ALTER TABLE `creative_ideas`
  ADD CONSTRAINT `creative_ideas_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`);

--
-- Constraints for table `creative_idea_students`
--
ALTER TABLE `creative_idea_students`
  ADD CONSTRAINT `creative_idea_students_creative_idea_id_foreign` FOREIGN KEY (`creative_idea_id`) REFERENCES `creative_ideas` (`id`),
  ADD CONSTRAINT `creative_idea_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `dispatches`
--
ALTER TABLE `dispatches`
  ADD CONSTRAINT `dispatches_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `dispatch_types` (`id`);

--
-- Constraints for table `student_research`
--
ALTER TABLE `student_research`
  ADD CONSTRAINT `student_research_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`);

--
-- Constraints for table `student_research_students`
--
ALTER TABLE `student_research_students`
  ADD CONSTRAINT `student_research_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_research_students_student_research_id_foreign` FOREIGN KEY (`student_research_id`) REFERENCES `student_research` (`id`);

--
-- Constraints for table `theses`
--
ALTER TABLE `theses`
  ADD CONSTRAINT `theses_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`);

--
-- Constraints for table `theses_students`
--
ALTER TABLE `theses_students`
  ADD CONSTRAINT `theses_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `theses_students_theses_id_foreign` FOREIGN KEY (`theses_id`) REFERENCES `theses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
