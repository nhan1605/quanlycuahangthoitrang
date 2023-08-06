-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2023 lúc 11:56 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `d3nt_clothing`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `name`, `phone`) VALUES
(1, 'manhdat6112002@gmail.com', '123456789', 'Nguyễn Mạnh Đạt ', '0981486775'),
(2, 'namnv2909@gmail.com', '123456789', 'Nguyễn Văn Nam', '0338733540'),
(3, 'nhaphamxt19@gmail.com', '123456789', 'Phạm Xuân Nhã', '0345365319'),
(4, 'phamvannhan1605@gmail.com', '123456789', 'Phạm Văn Nhân', '0399944934'),
(5, 'npthaooo11@gmail.com', '123456789', 'Nguyễn Phương Thảo', '0945127856');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_name` text NOT NULL,
  `blog_img` text NOT NULL,
  `blog_content` text NOT NULL,
  `date_post` date NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_name`, `blog_img`, `blog_content`, `date_post`, `admin_id`) VALUES
(1, 'Châu Bùi thử nhiều phong cách ở tuần thời trang thế giới', 'https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-dior-paris-fashion-week.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=gCqwtkDJMpwbLZ74dA-pww', '<p>L&agrave; fashionista c&oacute; tầm ảnh hưởng tại Việt Nam,&nbsp;<a href=\"https://vnexpress.net/chu-de/chau-bui-5256\" rel=\"nofollow\">Ch&acirc;u B&ugrave;i</a>&nbsp;nhận được lời mời dự show Xu&acirc;n H&egrave; 2023 của c&aacute;c nh&agrave; mốt tại ba tuần lễ thời trang lớn nhất thế giới. C&ocirc; tới New York Fashion Week từ ng&agrave;y 11/9, dự show Tommy Hilfiger đầu ti&ecirc;n v&agrave; kết th&uacute;c h&agrave;nh tr&igrave;nh tại Paris Fashion Week với show&nbsp;<a href=\"https://vnexpress.net/nhung-thiet-ke-phong-dai-cua-louis-vuitton-4519482.html\" rel=\"nofollow\">Louis Vuitton</a>&nbsp;h&ocirc;m 4/10. Video:&nbsp;<em>Instagram Ch&acirc;u B&ugrave;i</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-tommy-1665027960.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=tPA72kCrPc7467-A5QXLqg\" /></p>\r\n\r\n<p>Người đẹp sinh năm 1997 c&oacute; &ecirc;k&iacute;p ri&ecirc;ng đi c&ugrave;ng, hỗ trợ c&ocirc; trang điểm, l&agrave;m t&oacute;c, quay phim, chụp h&igrave;nh, biến h&oacute;a theo nhiều chủ đề cho ph&ugrave; hợp với từng show.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-tommy-hilfiger-1665032191.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=sXLkLGeXMG-D9xtTy223Gg\" /></p>\r\n\r\n<p>Đến dự show Tommy Hilfiger, Ch&acirc;u B&ugrave;i chọn quần kaki v&agrave; &aacute;o len t&ocirc;ng n&acirc;u, kết hợp sơ mi trắng v&agrave; &aacute;o kho&aacute;c phao. Phong c&aacute;ch đường phố của c&ocirc; được ho&agrave;n thiện với mũ lưỡi trai, t&uacute;i da v&agrave; khuy&ecirc;n tai tr&ograve;n.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-coach-1665028267.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=QIO4_43B1T_cgBjX2S4zNA\" /></p>\r\n\r\n<p>Trong chuyến đi, Ch&acirc;u B&ugrave;i chuẩn bị chục bộ t&oacute;c giả với nhiều m&agrave;u, kiểu d&aacute;ng đa dạng, nặng tới v&agrave;i c&acirc;n. Đến dự show Coach, c&ocirc; chọn &aacute;o kho&aacute;c l&ocirc;ng cừu qu&aacute; khổ, khoe nội y m&agrave;u đen, diện quần nhung m&agrave;u t&iacute;m. Điểm nhấn của diện mạo nằm ở chiếc t&uacute;i của thương hiệu Mỹ. Để ăn &yacute; với m&agrave;u t&uacute;i, c&ocirc; chọn bộ t&oacute;c m&agrave;u đỏ cam, trang điểm tự nhi&ecirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-1-1665027958.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=BA1bEH3hgf7FW10pszQQ-g\" /></p>\r\n\r\n<p>Ở Milan Fashion Week, Ch&acirc;u B&ugrave;i chinh phục &aacute;o kho&aacute;c qu&aacute; khổ của Prada khi tới dự show của nh&agrave; mốt n&agrave;y. B&ecirc;n trong, người đẹp chọn &aacute;o ba lỗ m&agrave;u trắng - thiết kế đang g&acirc;y sốt c&oacute; gi&aacute; 995 USD, ch&acirc;n v&aacute;y midi xuy&ecirc;n thấu đ&iacute;nh hoa 3D, t&uacute;i x&aacute;ch 2.208 USD. Người đẹp trang điểm nhấn v&agrave;o mắt kh&oacute;i, ăn &yacute; bộ t&oacute;c giả kiểu pixie, ho&agrave;n thiện bằng đ&ocirc;i khuy&ecirc;n tai h&igrave;nh lưỡi lam. Diện mạo ấn tượng của Ch&acirc;u B&ugrave;i được nhiếp ảnh gia đường phố nổi tiếng của Vogue Mỹ - Phil Oh - ghi lại v&agrave; đăng tr&ecirc;n tạp ch&iacute;. Ảnh:&nbsp;<em>Vogue</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-gucci-1665027959.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2GETE1eWI7CNFOICY2RwXA\" /></p>\r\n\r\n<p>Dự show Gucci, người mẫu chọn bộ quần &aacute;o kẻ ca r&ocirc; t&ocirc;ng v&agrave;ng đen, khoe &aacute;o ngực xuy&ecirc;n thấu v&agrave; t&uacute;i của nh&agrave; mốt Italy. C&ocirc; đội t&oacute;c giả xoăn x&ugrave; m&agrave;u bạch kim gi&uacute;p gương mặt s&aacute;ng hơn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-DG-2-1665028267.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=9rKtqabF5CEFeyWwMMTLfg\" /></p>\r\n\r\n<p>L&agrave; một trong số fashionista Việt đến xem buổi tr&igrave;nh diễn của Dolce &amp; Gabbana, Ch&acirc;u B&ugrave;i diện suit in hoa đồng điệu găng tay v&agrave; băng đ&ocirc;. V&igrave; bộ c&aacute;nh c&oacute; nhiều chi tiết, c&ocirc; để kiểu t&oacute;c đu&ocirc;i ngựa buộc cao, gi&uacute;p tạo sự gọn g&agrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-dior-1665027959.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=v_VXaudQuNNWJFW358L85w\" /></p>\r\n\r\n<p>Mở đầu cho chuỗi ng&agrave;y dự Paris Fashion Week, Ch&acirc;u B&ugrave;i chinh phục giới y&ecirc;u thời trang bằng bộ c&aacute;nh kinh điển của nh&agrave; Dior. C&ocirc; kết hợp bar suit c&ugrave;ng ch&acirc;n v&aacute;y xẻ t&agrave;, sơ mi trắng, c&agrave; vạt, t&uacute;i y&ecirc;n ngựa m&agrave;u be. Trang phục vừa c&oacute; n&eacute;t nữ t&iacute;nh, vừa nam t&iacute;nh, gi&uacute;p Ch&acirc;u B&ugrave;i ghi điểm.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-dior-1-1665032262.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=y0hlZNQQE3e-LV4sp6byOg\" /></p>\r\n\r\n<p>Người đẹp cho biết ban đầu, c&ocirc; dự định diện một bộ kh&aacute;c, nhưng khi di chuyển từ Milan sang Paris, c&ocirc; bị thất lạc đồ. May mắn, c&ocirc; nhờ người quen t&igrave;m được bộ n&agrave;y thay thế. S&aacute;t giờ diễn, bộ c&aacute;nh mới được chuyển đến ph&ograve;ng c&ocirc;. Ch&acirc;u B&ugrave;i kịp phối th&ecirc;m găng tay, c&agrave; vạt v&agrave; tạo kiểu t&oacute;c.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-off-white-2-1665028268.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=CDFw-VYCHvpYNBLKHNRjsg\" /></p>\r\n\r\n<p>Từ phong c&aacute;ch qu&yacute; c&ocirc; thanh lịch ở show Dior, Ch&acirc;u B&ugrave;i chuyển sang phong c&aacute;ch th&agrave;nh thị hiện đại với &aacute;o kho&aacute;c da v&agrave; &aacute;o thun tạo điểm nhấn ở những đường n&eacute;t thể thao. Phụ kiện gồm khuy&ecirc;n tai bản lớn mang dấu mũi t&ecirc;n đặc trưng của Off-White v&agrave; bốt platform gi&uacute;p c&ocirc; th&ecirc;m s&agrave;nh điệu.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-hermes-1665028267.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=phvgm1X_WjYu_yJ-gWUtZQ\" /></p>\r\n\r\n<p>L&agrave; kh&aacute;ch mời của show Hermes, c&ocirc; tạo sự ph&aacute; c&aacute;ch khi phối t&uacute;i Kelly với bộ đồ sexy gồm &aacute;o da trễ vai crop top c&ugrave;ng ch&acirc;n v&aacute;y xếp nếp. Kiểu t&oacute;c ướt v&agrave; trang điểm t&ocirc;ng n&acirc;u trầm ăn &yacute; với trang phục.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/10/06/chau-bui-2-1665027958.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=vTz455zX7GTSiZ8d4lisSQ\" /></p>\r\n\r\n<p>Dự show Louis Vuitton tại khu&ocirc;n vi&ecirc;n của bảo t&agrave;ng Louvre, Ch&acirc;u B&ugrave;i diện bộ trang phục d&agrave;i lượt thượt gồm &aacute;o kho&aacute;c len d&agrave;y qu&aacute; khổ, kết hợp đầm maxi v&agrave; t&uacute;i m&agrave;u bạc.</p>\r\n\r\n<p>Ch&acirc;u B&ugrave;i sinh năm 1997 ở H&agrave; Nội, hiện sống v&agrave; l&agrave;m việc ở TP HCM. C&ocirc; được biết tới khi thi The Face Vietnam 2017. T&ecirc;n tuổi của người đẹp được ch&uacute; &yacute; hơn sau khi đ&oacute;ng &quot;Em chưa 18&quot;. Năm 2021,&nbsp;<em>Forbes&nbsp;</em>b&igrave;nh chọn c&ocirc; l&agrave; một trong 300 gương mặt &quot;<a href=\"https://vnexpress.net/hai-nu-doanh-nhan-viet-lot-top-guong-mat-tre-noi-bat-chau-a-4265792.html\" rel=\"dofollow\" target=\"_blank\">30 Under 30 Asia</a>&quot; (t&agrave;i năng dưới 30 tuổi ch&acirc;u &Aacute;). C&ocirc; l&agrave; fashionista Việt đầu ti&ecirc;n k&yacute; hợp đồng quảng c&aacute;o với Dior v&agrave; Louis Vuitton.</p>\r\n', '2023-01-10', 1),
(2, 'Lý do các nhà mốt xa xỉ lao vào vũ trụ ảo', 'https://i1-giaitri.vnecdn.net/2022/09/16/-7292-1663317618.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=_Kqx_t0oLwExu_IDQqYpVQ', '<p>Gucci, Burberry... gia nhập metaverse để tăng trải nghiệm, đồng thời đ&aacute;nh v&agrave;o t&acirc;m l&yacute; chuộng kỹ thuật số của nhiều người.</p>\r\n\r\n<p><em>New York Times</em>&nbsp;nhận định&nbsp;<a href=\"https://vnexpress.net/lang-mot-xoay-chuyen-trong-vu-tru-ao-nft-4428623.html\" rel=\"dofollow\">metaverse</a>&nbsp;(vũ trụ ảo) l&agrave; tương lai khiến ng&agrave;nh c&ocirc;ng nghiệp thời trang đang đ&aacute;nh cược h&agrave;ng triệu USD, trong bối cảnh h&agrave;ng triệu người d&agrave;nh thời gian để kết nối trong thế giới ảo.</p>\r\n\r\n<p><strong>C&aacute;c h&atilde;ng xa xỉ cho rằng metaverse</strong><strong>&nbsp;</strong><strong>tạo ra những trải nghiệm th&uacute; vị v&agrave; &yacute; nghĩa cho người d&ugrave;ng</strong>, thay v&igrave; chỉ xem đ&oacute; l&agrave; nơi để quảng c&aacute;o hay h&aacute;i ra tiền, theo&nbsp;<em>CNN</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Người chơi Roblox nhập vai, trải nghiệm cửa h&agrave;ng kỹ thuật số của Gucci. Video:&nbsp;<em>Peter Gasston</em></p>\r\n\r\n<p>Hồi th&aacute;ng 7, Burberry ra mắt Roblox m&ocirc; phỏng t&uacute;i Lola mang t&iacute;nh biểu tượng bằng c&aacute;c h&igrave;nh ảnh gồm m&acirc;y, nước v&agrave; những t&aacute;n l&aacute; hoang d&atilde;. Giống một đợt giảm gi&aacute; NFT th&ocirc;ng thường, nh&agrave; mốt n&agrave;y cung cấp số lượng t&uacute;i kh&ocirc;ng giới hạn với gi&aacute; 800 Robux (gần 10 USD). Trong 24 giờ, người mua c&oacute; thể đeo ch&uacute;ng ở bất cứ đ&acirc;u trong vũ trụ ảo.</p>\r\n\r\n<p>Th&aacute;ng 3 năm nay, Dolce &amp; Gabbana v&agrave; Tommy Hilfiger l&agrave; một trong số t&ecirc;n tuổi lớn tham gia Tuần lễ thời trang Metaverse đầu ti&ecirc;n, nơi kh&aacute;n giả c&oacute; thể chứng kiến c&aacute;c nh&agrave; mốt tạo ra c&aacute;c cửa h&agrave;ng trải nghiệm trong Decentraland metaverse.</p>\r\n\r\n<p>Hồi th&aacute;ng 5/2021, h&atilde;ng mốt Italy ra mắt sản phẩm Gucci Garden kết hợp tr&ograve; chơi điện tử Roblox. Người chơi nhập vai, kh&aacute;m ph&aacute; cửa h&agrave;ng kỹ thuật số của Gucci v&agrave; c&oacute; thể ướm thử c&aacute;c mẫu thiết kế. Thương hiệu cho rằng th&agrave;nh c&ocirc;ng kh&ocirc;ng nằm ở việc tăng doanh số b&aacute;n t&uacute;i x&aacute;ch, m&agrave; l&agrave; đem tới kh&ocirc;ng gian ảo được 20 triệu người d&ugrave;ng gh&eacute; thăm.</p>\r\n\r\n<p>Charles Hambro, chủ sở hữu c&ocirc;ng ty Geeiq từng gi&uacute;p Tommy Hilfiger v&agrave; Farfetch gia nhập metaverse, nhận x&eacute;t tr&ecirc;n&nbsp;<em>CNN</em>: &quot;Trước đ&acirc;y, c&aacute;c thương hiệu thời trang vốn chậm chạp với mạng x&atilde; hội. Giữa những năm 2000, c&aacute;c nh&agrave; mốt đ&atilde; bỏ qua c&aacute;c nền tảng mới như Facebook. Giờ đ&acirc;y, khi c&oacute; metaverse, họ kh&ocirc;ng muốn chậm ch&acirc;n một lần nữa&quot;.</p>\r\n\r\n<p>Metaverse c&ograve;n cho ph&eacute;p c&aacute;c nh&atilde;n tiếp cận với một thế hệ kh&aacute;ch h&agrave;ng ho&agrave;n to&agrave;n mới - những nh&acirc;n khẩu học trẻ hơn kh&aacute;ch mua đồ xa xỉ truyền thống v&agrave; c&oacute; thể chưa bao giờ tương t&aacute;c với thời trang cao cấp. Một b&aacute;o c&aacute;o của c&ocirc;ng ty tư vấn Bain cho thấy 70% c&aacute;c giao dịch mua h&agrave;ng xa xỉ bị ảnh hưởng bởi c&aacute;c tương t&aacute;c trực tuyến dưới một số h&igrave;nh thức. Người mua sắm c&oacute; &iacute;t nhất một lần tương t&aacute;c kỹ thuật số với thương hiệu hoặc sản phẩm trước khi quyết định mua.</p>\r\n\r\n<p><img alt=\"Mẫu túi Lola ảo của Burberry trên Roblox có giá 9,99 USD mỗi chiếc. Ảnh: Burberry\" src=\"https://i1-giaitri.vnecdn.net/2022/09/16/-2042-1663317618.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=BRAbtLa5z1BK6ESNXlApzQ\" /></p>\r\n\r\n<p>Mẫu t&uacute;i Lola ảo của Burberry tr&ecirc;n Roblox c&oacute; gi&aacute; 9,99 USD mỗi chiếc. Ảnh:&nbsp;<em>Burberry</em></p>\r\n\r\n<p>&quot;Hiện c&oacute; 3,2 tỷ người chơi game tr&ecirc;n to&agrave;n thế giới v&agrave; sẽ c&ograve;n tăng l&ecirc;n. Họ kh&ocirc;ng chỉ v&agrave;o những thế giới ảo để chơi. Quan trọng l&agrave; họ c&ograve;n tham gia v&agrave;o hoạt động tương t&aacute;c&quot;, Hambro n&oacute;i. Nếu c&aacute;c nh&agrave; mốt muốn mở rộng v&agrave; ph&aacute;t triển trong bối cảnh kỹ thuật số b&ugrave;ng nổ mạnh mẽ, họ phải tiếp cận được đối tượng n&agrave;y. Một nh&agrave; mốt bước v&agrave;o những kh&ocirc;ng gian ảo, họ cần phải l&agrave;m phong ph&uacute; th&ecirc;m trải nghiệm, tạo ra một kết nối thực sự với nhiều đối tượng kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Ngo&agrave;i ra, quần &aacute;o kỹ thuật số cũng được xem l&agrave; một nguồn phụ thu. D&ograve;ng NFT đầu ti&ecirc;n của Dolce &amp; Gabbana, cheo&nbsp;<em>CNN</em>, một chiếc t&uacute;i x&aacute;ch Gucci Dionysus ảo được b&aacute;n trực tuyến với gi&aacute; tương đương 4.115 USD năm ngo&aacute;i. B&ecirc;n cạnh đ&oacute;, chi ph&iacute; tạo ra một m&oacute;n đồ ảo, chẳng hạn gi&agrave;y thể thao, thấp hơn đ&aacute;ng kể so với việc sản xuất v&agrave; ph&acirc;n phối h&agrave;ng ngh&igrave;n sản phẩm thật tương đương, l&agrave; một điểm thu h&uacute;t c&aacute;c h&atilde;ng mốt.</p>\r\n\r\n<p><strong>Thế hệ trẻ rất coi trọng nhận dạng kỹ thuật số.&nbsp;</strong>Theo một nghi&ecirc;n cứu năm 2021 của&nbsp;<em>BoF</em>, khoảng 70% người ti&ecirc;u d&ugrave;ng Mỹ từ thế hệ X đến Z, coi danh t&iacute;nh kỹ thuật số của họ l&agrave; &quot;quan trọng&quot;. Ng&agrave;y c&agrave;ng nhiều người coi trọng tủ quần &aacute;o kỹ thuật số như tủ đồ thật.</p>\r\n\r\n<p>Shepperd, cựu gi&aacute;m đốc h&atilde;ng trang sức xa xỉ Boucheron, gi&aacute;m đốc thời trang to&agrave;n cầu metaverse của c&ocirc;ng ty Dubit, n&oacute;i với&nbsp;<em>CNN</em>: &quot;Hai năm trước, con g&aacute;i đỡ đầu đ&ograve;i t&ocirc;i mua một đ&ocirc;i gi&agrave;y cho h&igrave;nh đại diện. V&agrave;o thời điểm đ&oacute;, ch&uacute;ng tương đương 60 bảng. Mẹ ruột con b&eacute; đ&atilde; n&oacute;i: &#39;Kh&ocirc;ng nh&eacute;, n&oacute; c&ograve;n đắt hơn cả đ&ocirc;i gi&agrave;y con đang đi&#39;. Nhưng t&ocirc;i bắt đầu n&oacute;i chuyện với con, khiến t&ocirc;i nhận ra điều thực sự quan trọng đối với con b&eacute; l&agrave; ảnh đại diện của n&oacute; phải c&oacute; một đ&ocirc;i gi&agrave;y lấp l&aacute;nh. Đ&acirc;y l&agrave; c&aacute;ch gen Z đang h&agrave;nh xử. Vũ trụ ảo l&agrave; c&aacute;ch thức giao tiếp của họ. Họ thực sự quan t&acirc;m rất nhiều đến danh t&iacute;nh của m&igrave;nh trong metaverse&quot;.</p>\r\n\r\n<p>Theo nh&agrave; tạo mẫu người Anh Gemma Sheppard, cũng giống thời trang đời thực, thời trang kỹ thuật số ch&uacute; trọng thể hiện bản th&acirc;n v&agrave; sự s&aacute;ng tạo - điểm gần gũi v&agrave; thu h&uacute;t c&ocirc;ng d&acirc;n to&agrave;n cầu. Thế giới ảo c&ograve;n c&oacute; thể mang đến cho c&aacute;c thương hiệu cơ hội thử nghiệm c&aacute;c thiết kế trước khi đưa ch&uacute;ng v&agrave;o sản xuất. Ch&uacute;ng cũng cho ph&eacute;p người mua c&oacute; thể thoải m&aacute;i ướm thử quần &aacute;o l&ecirc;n người m&agrave; kh&ocirc;ng cần đến tận cửa h&agrave;ng.</p>\r\n\r\n<p><img alt=\"Thảm đỏ thời trang trong vũ trụ ảo. Ảnh: Gucci\" src=\"https://i1-giaitri.vnecdn.net/2022/09/16/-2255-1663317618.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=pwOSzJu70wm1vB-y8mRHKA\" /></p>\r\n\r\n<p>Thảm đỏ thời trang trong vũ trụ ảo. Ảnh:&nbsp;<em>Gucci</em></p>\r\n\r\n<p>Tương lai của thế giới kỹ thuật số nhập vai vẫn c&ograve;n nhiều suy đo&aacute;n đa chiều. Theo&nbsp;<em>Reuters</em>, ng&acirc;n h&agrave;ng đầu tư Morgan Stanley dự đo&aacute;n thời trang kỹ thuật số c&oacute; thể th&uacute;c đẩy doanh số b&aacute;n h&agrave;ng của ng&agrave;nh l&ecirc;n 50 tỷ USD v&agrave;o năm 2030. C&aacute;c thương hiệu xa xỉ l&acirc;u đời sẽ phải đối mặt với sự cạnh tranh gay gắt từ những h&atilde;ng thời trang kỹ thuật số như The Fabricant.</p>\r\n', '2023-01-11', 1),
(3, 'Xu hướng thảm đỏ 2022', 'https://i1-giaitri.vnecdn.net/2022/01/11/xu-huong-tham-do-2022.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=bAxhuijBCnBYaR3PX7VcDg', '<p>Kiểu d&aacute;ng độc đ&aacute;o, sắc m&agrave;u nổi bật... l&agrave; những xu hướng được dự b&aacute;o thống trị thảm đỏ năm nay.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/01/11/3-loewe-1641871133.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeSMa7AC7NSAeTeLWhCrGQ\" /></p>\r\n\r\n<p>Theo&nbsp;<em>Vogue</em>, đầm độc đ&aacute;o l&agrave; một trong những xu hướng nổi bật của thời trang thảm đỏ năm 2022. Nh&agrave; thiết kế Karla Welch cho rằng kh&aacute;n giả tr&ocirc;ng chờ v&agrave;o những thiết kế đặc biệt bởi thường ng&agrave;y họ đ&atilde; quen nh&igrave;n thấy c&aacute;c bộ đồ tối giản, tiện dụng tr&agrave;n ngập thị trường trong thời dịch. C&aacute;c bộ đầm dự tiệc ph&aacute; hủy cấu tr&uacute;c, cut-out, bất đối xứng của Loewe, Gucci, Rodarte... l&agrave; những v&iacute; dụ cho phong c&aacute;ch n&agrave;y. Ảnh:&nbsp;<em>Gorunway</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/01/11/6-phu-kien-doc-dao-1641871692.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=4WRKwWWdMfeOZY_gxb3yvA\" /></p>\r\n\r\n<p>Thảm đỏ năm nay cũng được dự b&aacute;o chứng kiến sự l&ecirc;n ng&ocirc;i của những phụ kiện độc lạ, giống đ&ocirc;i sandals với g&oacute;t h&igrave;nh trứng vỡ của Loewe. Với những bộ đầm tối giản tập trung khoe chất liệu cao cấp, việc tạo điểm nhấn bằng t&uacute;i x&aacute;ch, gi&agrave;y, mũ độc đ&aacute;o khiến người mặc trở n&ecirc;n thời thượng hơn. Ảnh:&nbsp;<em>Loewe</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/01/11/1-gucci-1641871124.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=EvTCwOAWyOqywhSb_hpJIw\" /></p>\r\n\r\n<p>Đầm tiệc sang trọng t&aacute;i hiện thời kỳ ho&agrave;ng kim của Hollywood được t&iacute;ch cực đẩy mạnh tr&ecirc;n s&agrave;n diễn Xu&acirc;n H&egrave; v&agrave; Pre-Fall 2022.&nbsp;<em>Vogue&nbsp;</em>nhận x&eacute;t c&aacute;c thiết kế Valentino đại diện cho vẻ quyến rũ v&agrave; sang trọng, gi&uacute;p c&aacute;c minh tinh ghi dấu ấn với khoảnh khắc thời trang kinh điển. Kristen Stewart cũng được xem l&agrave; biểu tượng của phong c&aacute;ch punk sang trọng v&agrave; kh&aacute;c biệt. Ảnh:&nbsp;<em>Gorunway</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/01/11/5-saint-laurent-1641871333.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=MMmtnskp2ZzIzTtfx5UCzw\" /></p>\r\n\r\n<p>Catsuit - bộ đồ của c&aacute;c si&ecirc;u anh h&ugrave;ng - sẽ chiếm ng&ocirc;i của đầm d&aacute;ng cape.&nbsp;<em>Vogue&nbsp;</em>cho rằng kiểu mặc &aacute;o cho&agrave;ng cape như Lady Gaga trong bộ c&aacute;nh của Gucci, Jennifer Lawrence diện v&aacute;y cape Dior đ&atilde; lỗi thời trong năm nay. Thay v&agrave;o đ&oacute;, catsuit hiện đại, năng động của Stella McCartney v&agrave; Saint Laurent mới được đ&aacute;nh gi&aacute; cao. Ảnh:&nbsp;<em>Gorunway</em></p>\r\n\r\n<p>Video Player is loading.</p>\r\n\r\n<p>Dừng</p>\r\n\r\n<p>Hiện tại&nbsp;0:05</p>\r\n\r\n<p>/</p>\r\n\r\n<p>Thời lượng&nbsp;9:28</p>\r\n\r\n<p>Đ&atilde; tải: 0%</p>\r\n\r\n<p>Tiến tr&igrave;nh: 0%</p>\r\n\r\n<p>Bỏ tắt tiếng</p>\r\n\r\n<p>To&agrave;n m&agrave;n h&igrave;nh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Show Xu&acirc;n H&egrave; 2022 của Saint Laurent. Video:&nbsp;<em>Saint Laurent</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/01/11/valentino-2-1641871171.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=uJ7BqYe7UxjkANmOL64lVg\" /></p>\r\n\r\n<p>Nếu kh&ocirc;ng t&igrave;m thấy thiết kế lạ mắt, bạn c&oacute; thể chọn một bộ c&aacute;nh m&agrave;u sắc nổi bật để ghi điểm khi l&ecirc;n thảm đỏ năm 2022, thể hiện sự t&aacute;o bạo của bản th&acirc;n. Valentino, Jacquemus... đều l&agrave; những nh&agrave; mốt mạnh về c&aacute;ch chơi m&agrave;u. Ảnh:&nbsp;<em>Gorunway</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/01/11/2-armani-1641871129.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=ATGrkFyMnQydlEsKvQAxwg\" /></p>\r\n\r\n<p>Phong c&aacute;ch cổ điển được Armani lăng x&ecirc; trở th&agrave;nh xu hướng nổi trội của thảm đỏ. Theo&nbsp;<em>Vogue</em>, c&aacute;c bộ đầm d&aacute;ng su&ocirc;ng của thập ni&ecirc;n 1920 vẫn chưa bao giờ ngừng được y&ecirc;u th&iacute;ch khi đem lại vẻ thoải m&aacute;i cho người mặc, x&oacute;a tan nỗi lo o &eacute;p ba v&ograve;ng để tạo đường cong. Ảnh:&nbsp;<em>Gorunway</em></p>\r\n\r\n<p><img alt=\"\" src=\"https://i1-giaitri.vnecdn.net/2022/01/11/valentino-4-1641871379.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=BGVkktRiWxytAvUXIdt4YQ\" /></p>\r\n\r\n<p>Trong nh&oacute;m xu hướng hot c&ograve;n c&oacute; trang phục l&ocirc;ng vũ. Tr&ecirc;n những phom d&aacute;ng v&aacute;y cơ bản, chỉ cần gắn th&ecirc;m chất liệu n&agrave;y, bạn đ&atilde; c&oacute; một thiết kế bắt mắt v&agrave; sang trọng hơn. Năm nay, đầm l&ocirc;ng vũ được nhuộm m&agrave;u ch&oacute;i hơn như v&agrave;ng, t&iacute;m, xanh neon. Ảnh:&nbsp;<em>Gorunway</em></p>\r\n', '2023-01-04', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `brand_description` text NOT NULL,
  `brand_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `brand_img`) VALUES
(1, 'Elise', '<p>Elise l&agrave; một trong những thương hiệu thời trang Việt Nam cao cấp d&agrave;nh cho nữ, chuy&ecirc;n những sản phẩm c&ocirc;ng sở, thời trang dự tiệc, dạo phố, phụ kiện thời trang&hellip; Elise sở hữu những thiết kế lu&ocirc;n bắt kịp xu hướng thời trang thế giới, vừa sang trọng, s&agrave;nh điệu, vừa hiện đại.</p>\r\n', 'elise.png'),
(2, 'Marc Fashion', '<p>Với khơi nguồn từ l&ograve;ng đam m&ecirc; thời trang, kh&aacute;t khao mang đến c&aacute;i đẹp cho tất cả phụ nữ v&agrave; hơn thế nữa l&agrave; mong muốn được g&oacute;p phần tạo dựng h&igrave;nh ảnh mới lạ cho ng&agrave;nh c&ocirc;ng nghiệp thời trang Việt Nam, MARC đ&atilde; tập trung đầu tư v&agrave;o chất lượng v&agrave; kiểu d&aacute;ng sản phẩm để thương hiệu MARC Fashion trở th&agrave;nh một c&aacute;i t&ecirc;n gần gũi hơn với kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Với phương ch&acirc;m &ldquo;BRIGHTEN YOUR DAY&rdquo;, MARC mong muốn mang lại cho kh&aacute;ch h&agrave;ng những sản phẩm tốt nhất để c&aacute;c bạn kh&ocirc;ng chỉ thể hiện c&aacute; t&iacute;nh bản th&acirc;n m&agrave; c&ograve;n lan toả nguồn năng lượng t&iacute;ch cực, mạnh mẽ đến xung quanh.</p>\r\n', 'MARCFASHION.png'),
(3, 'Owen', '', 'OWEN-Logo-PNG-1.png'),
(4, 'Eva de Eva', '<p>Eva de Eva được th&agrave;nh lập bởi Dung T&ocirc; năm 2007 ở 69 Tr&agrave;ng Thi với mục đ&iacute;ch mang lại vẻ đẹp cho phụ nữ Việt Nam những bộ trang phục văn ph&ograve;ng đẹp nhất.</p>\r\n', 'eva.webp'),
(5, 'Routine', '<p>Như &yacute; nghĩa của t&ecirc;n gọi, trang phục của Routine hướng đến việc trở th&agrave;nh th&oacute;i quen, lựa chọn h&agrave;ng ng&agrave;y cho nam giới trong mọi t&igrave;nh huống. Bởi Routine hiểu rằng, sự tự tin về phong c&aacute;ch ăn mặc sẽ l&agrave;m nền tảng, tạo động lực cổ vũ mỗi người mạnh dạn theo đuổi những điều m&igrave;nh mong muốn. Trong đ&oacute;, trang phục nam phải mang vẻ đẹp lịch l&atilde;m, hợp mốt v&agrave; tạo sự thoải m&aacute;i, quan trọng nhất l&agrave; mang đến cảm gi&aacute;c &ldquo;được l&agrave; ch&iacute;nh m&igrave;nh&rdquo; cho người mặc.</p>\r\n\r\n<p>Thời trang Routine thuyết phục kh&aacute;ch h&agrave;ng bằng từng kiểu d&aacute;ng trang phục thiết kế độc quyền, sự sắc sảo trong mỗi đường n&eacute;t cắt may, sử dụng chất liệu vải cao cấp v&agrave; lu&ocirc;n h&ograve;a điệu c&ugrave;ng xu hướng quốc tế. Đ&acirc;y l&agrave; con đường Routine theo đuổi v&agrave; hướng đến ph&aacute;t triển bền vững.</p>\r\n', 'rountine.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_discription`) VALUES
(1, 'Áo sơ mi', '<p><strong>&Aacute;o Sơ Mi&nbsp;</strong>&nbsp;l&agrave; một trong những d&ograve;ng sản phẩm b&aacute;n chạy nhất của thương hiệu thời trang cao cấp . Hầu hầu hết c&aacute;c mẫu &aacute;o sơ mi đều rất đa năng mang lại cho c&aacute;c ch&agrave;ng phong c&aacute;ch thanh lịch, đầy nam t&iacute;nh, lịch l&atilde;m, sang trọng.</p>\r\n'),
(2, 'Áo polo', '<p>Ng&agrave;y nay, &aacute;o polo l&agrave; loại trang phục phổ biến trong tủ đồ của ph&aacute;i nam. N&oacute; lu&ocirc;n l&agrave; m&oacute;n trang phục l&yacute; tưởng cho những ng&agrave;y h&egrave; oi bức nhưng b&ecirc;n cạnh đ&oacute; ch&uacute;ng ta cũng c&oacute; thể sử dụng &aacute;o polo linh hoạt v&agrave;o bất cứ m&ugrave;a n&agrave;o trong năm. Ch&iacute;nh v&igrave; vậy, &aacute;o polo hội tụ đủ những yếu tố m&agrave; mọi người cần: lịch sự, chỉn chu nhưng lại kh&ocirc;ng qu&aacute; formal.</p>\r\n'),
(3, 'Quần dài', '<p>Quần d&agrave;i chạm mắt c&aacute; ch&acirc;n. Đằng trước v&agrave; đằng sau đều c&oacute; 2 t&uacute;i. Ph&iacute;a trước c&oacute; khuy c&agrave;i c&ugrave;ng kh&oacute;a k&eacute;o. D&aacute;ng quần hơi xu&ocirc;ng v&agrave; c&oacute; độ &ocirc;m nhẹ nh&agrave;ng. Chất liệu&nbsp;Tuysi nhẹ v&agrave; tho&aacute;ng.</p>\r\n'),
(4, 'Quần short', '<p>Quần Short Phối Lơ V&ecirc; Slim-fit mới nhất &nbsp;vẫn giữ vững phong độ như c&aacute;c thiết kế quần short chất vải kaki mềm m&aacute;t trước đ&acirc;y. V&agrave; với chi tiết Lơ V&ecirc; vừa vặn, dễ chịu, th&igrave; mẫu quần short ready-to-wear n&agrave;y sẽ mang đến một c&aacute;i nh&igrave;n vừa mắt, linh hoạt cho c&aacute;c ch&agrave;ng nhất l&agrave; trong những ng&agrave;y m&ugrave;a h&egrave;.</p>\r\n'),
(5, 'Váy', '<p>V&aacute;y l&agrave; một trong những loại trang phục c&oacute; tuổi đời l&acirc;u nhất trong lịch sử lo&agrave;i người. Ở thời kỳ đầu, những chiếc v&aacute;y c&oacute; h&igrave;nh dạng l&agrave; những chiếc&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Kh%E1%BB%91\" title=\"Khố\">khố</a>&nbsp;(được l&agrave;m từ da động vật hoặc l&aacute; c&acirc;y), được quấn quanh bụng người mặc. Theo những g&igrave; được vẽ tr&ecirc;n c&aacute;c bức tranh cổ th&igrave; người ta c&ograve;n nhận ra h&igrave;nh ảnh của những người đ&agrave;n &ocirc;ng mặc v&aacute;y. Điều n&agrave;y n&oacute;i l&ecirc;n rằng trang phục n&agrave;y trước kia l&agrave; d&agrave;nh cho cả nam lẫn nữ.</p>\r\n'),
(6, 'Áo blazer, vest', '<p>L&agrave; những bộ trang phục&nbsp; thời thượng, d&agrave;nh cho c&ocirc;ng sơ hay những cuộc họp, sự kiện lớn, quan trọng. N&oacute; to&aacute;t l&ecirc;n vẻ đẹp của sự qu&yacute; ph&aacute;i v&agrave; sang trọng cho người mặc n&oacute;.</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(200) NOT NULL,
  `color_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`, `color_img`) VALUES
(1, 'Xanh ', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAABlBMVEUB/wEA/wCPxzfxAAAA6UlEQVR4nO3VsQkDQRAEQX3+SctUAnroHaqMg3Pa3Pl84CXP733+8V9OAbCquTvNFACrmrvTTAGc0jylzRQAq5q700wBnNI8pc0UAKuau9NMAbCquTvNFMApzVPaTAGwqrk7zRTAKc1T2kwBsKq5O80UAKuau9NMAZzSPKXNFACrmrvTTAGc0jylzRQAq5q700wBsKq5O80UwCnNU9pMAbCquTvNFMApzVPaTAGwqrk7zRQAq5q700wBnNI8pc0UAKuau9NMAZzSPKXNFACrmrvTTAGwqrk7zRTAKc1T2kwBsKq5O80UvOELTDgGkaZCCjsAAAAASUVORK5CYII='),
(2, 'Đỏ', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAA1BMVEX+AAAYIGMAAAAAR0lEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO8GxYgAAb0jQ/cAAAAASUVORK5CYII='),
(3, 'Trắng', 'https://thuthuatnhanh.com/wp-content/uploads/2022/05/background-trang-tinh.jpg'),
(4, 'Vàng', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAA1BMVEX/9QBwKRzPAAAAR0lEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO8GxYgAAb0jQ/cAAAAASUVORK5CYII=\r\n'),
(5, 'Đen', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJTo3RjpCFx8zQj86NygtLisBCgoKDg0OFxAQFy0dHR0tKy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tNy0tLTctLTctLS0tLSsrKys3LSstLSsrK//AABEIALEBHAMBIgACEQEDEQH/xAAXAAEBAQEAAAAAAAAAAAAAAAAAAQIH/8QAGxABAQEAAgMAAAAAAAAAAAAAAAERMbECIUH/xAAWAQEBAQAAAAAAAAAAAAAAAAABAAL/xAAZEQEBAQEBAQAAAAAAAAAAAAAAARFBITH/2gAMAwEAAhEDEQA/AOJUgGepRIrKQClAiqxkQVQ4gqJWqhFBEBDQAwACQACAJABUAAqAFSACQFCgIBVdXEUERUMiwRSrUhoNMxUCiGhoUqEDRkqgAWABAAkABABhAEtADh0gDKAEgBAVDUWgRIAalWgIpBooCkolAgVKZ9WAitKgIlFAZZAAgA4gBIAWEAM9XQRRZhAEg0FIgAMtICIAVYAKLEAaUABgAF8PwASoCKRRQgCABADQwAUAEQlRFFQBWVoCNYlRQXwAASgEyqgLAAiw8AGlLgAzooAZTqKBWgDIBFWNAgcS6agcVigMsgIpGosAVFoioYhRCFEUUgGjDjSAoBAaVFQVVoCjREASoAsIGoYcUBAMTQU1rykn2X1OOkBSsmAC60AIIoFUAFAAZUgopSiwQ2oFBp1Q0DOAAOIBDoAAQA4hFDKUWArVoAyyigdMEUCAGgIoCCKbQigtSCg0gIFqghQoBYEUb4LTQGGhFEMQBqxUASNAFiAAAEakMURVYgBkIoNaRFAgBIBAFQVECiVEAqAqK0tAIQIIDTQCNAUJAEgRThAABBTlQiiuoACQUQQUalICMpQRIVFKRUDioKMoRRJQNNIiiZqAJAAQAkCK1WgBQICmoAZ0ACIIVIVA4sUQCVFFCIqBkAOpRBYVAWpQAUAIwACAD4ABSLACqNAGK0VFBWqGABVFQSkVKKYkFRahUFioCgggcCiKokAapwFGGVpATRQEkoB4KUAKFQG4YsKozSigKzUUEYiKEJFoCmJAGoKsACiXkBrhUBkVADwFWAokhAVbFBlh/9k='),
(6, 'Tím', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxIPDxUPEhIVFRUVFRUVFRUVFRUVFRUVFRUXFhUVFRUYHSggGBolHRUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDQ0NFQ8PFS0ZFRktKy0tKy0tKy0rLSstLSstLS0tLS0tKy0tLS0tLS0rLSs3LS0tNy0tNy03LSs3LS0tLf/AABEIANgA6QMBIgACEQEDEQH/xAAXAAEBAQEAAAAAAAAAAAAAAAAAAQIG/8QAFhABAQEAAAAAAAAAAAAAAAAAAAER/8QAFgEBAQEAAAAAAAAAAAAAAAAAAAEF/8QAFREBAQAAAAAAAAAAAAAAAAAAAAH/2gAMAwEAAhEDEQA/AOrgDbaAKgBoAKCAACAKGKiwEsURBRACKgoCoAioKoAIoAgqghCgi6IqCBRQVKICooCKAgUUFQACKCYACoqIACqAAAoiI1UBFwAMAoFBICqgApRBBUBUFBIqChQKAAAsQALDAACigAiggAACLDAAICgIJgpgIKigAAEBTABCqioIAoACqlICAAoCAtAEFxFQKkKsAAAEAWoCgGAoigioAEVFQQFAQAAAKFFUBAVFBAACgCiwiIgCggqAAKoCiIKlAAwUAEKAKBgIAQABAAUAAAABUAABcSBAAoAqKghQqgAKipQFBREgAC4gAKagyoKBVwQQBRUFQSKACKkAAUFRUECigGKglRpFEUQVRFAVARQMQQBRRFQBFAEXQBAFBABUUFBBKogCooFRQBFSgCooRUVATVAQBRZRFQQUBFABFAEWoAAqmqCIFAEKACosACACaqAKyqqomiIAKCggBUAigAABUUAEUAAAABFQACKCggIoAioC1MUwEigAahAUQUUIiCiALRFARQAoABFBEVADBQAAEqgJVAEhqmggKBDUUE1UAXSgCUBQVFiAFICKAIoAIoCVYligAACLQQUABNBQAAAEqgAAIoAAAIoAUAAACgAaAEABFAAAoIoD/9k='),
(7, 'Hồng', 'data:image/jpeg;base64,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'),
(8, 'Cam', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAA1BMVEX/fwCxRWwOAAAAR0lEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO8GxYgAAb0jQ/cAAAAASUVORK5CYII='),
(9, 'Xanh Lam', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAABlBMVEVeyvBdye/4yRiYAAABRklEQVR4nO3XwVUEQQxDQcg/ae74xoHv9laFIKs1b76+gD/55jeZTHVNV6qPslB9kpXqoyxUnwQ4pB60hWQy1TWFZ9WPd6H6JAB8mPrDt5BMprqm8Kz68S5UnwQ4pB60hWQy1TWFZ9WPd6H6JAB8mPrDt5BMprqm8Kz68S5UnwQ4pB60hWQy1TUFOK0e+YVkMtU1hWfVj3chmUx1TeFZ9eNdqD4JcEg9aAvJZKprCnBaPfILyWSqawocUg/aQvVJ4Fn1412oPglwSD1oC8lkqmsKcFo98gvJZKprCgAAwD+qf0IXkslU1xTgtHrkF5LJVNcUOKQetIXqk8Cz6se7UH0S4JB60BaSyVTXFOC0euQXkslU1xQ4pB60heqTwLPqx7tQfRLgkHrQFpLJVNcU4LR65BeSyVTXFJ5VP96FZDLJZKqf7kY/bD033Y6O/C8AAAAASUVORK5CYII='),
(10, 'Be', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0HBw0HBwcNDQ8IDQcNFREWFhURExMYHSggGBoxGxMTITEhJSk3Li4uFx8zODMsNygtLisBCgoKDQ0NDg0NDysZFRkrLSs3LSs3Nzc3LS0rLS0rKysrKy0tKy0tKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKABOwMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQf/xAAXEAEBAQEAAAAAAAAAAAAAAAAAARFx/8QAFwEBAQEBAAAAAAAAAAAAAAAAAAEEA//EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ANPAYXcAAAFSKAgAKAAAQAAQAAAFABAAAAACgAAAAACgAAAgCUVQBAAAAUAAAEABQAAMAABAAUAAAEABQAAAAAQAARQUgAgmKCgAgAAAKAAACAAAAoAIAAAgqgAACAAoAAGggAAAKCKAAIAgqgAAAACAAAAAAAAAAAAoAAAAAIACgAgAAAAAAAKACAAoAIAAAAAAAAAAEAUAEAAABQAAAQAAAFABAAAAAAUAVABAAAAAEWigAgAAAKAAACAAAAoAAAIAAAgqgCAAAAoBAABA0TQUAAAAAUAEAAAAABQAQAAAFAAABAAAAAAAAAAAAUAEAAAMUAEAAUgEEAAABQgAACAAAAoAAAIACgAAAAAgAACCqEBBL1UFUAQAFAAKAIAAAUUAlAwKCAAAAoAAAIACgAGAAACAAoAAAIIqCqBogAAAKACAAAAoAAAAAAGggAKAaIAaAAKACAAAAoAAAIJioK//2Q==');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_title` varchar(200) NOT NULL,
  `comment_content` varchar(1500) NOT NULL,
  `date` date NOT NULL,
  `level_recorded` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `user_id`, `order_date`, `total_price`, `status_id`) VALUES
(3, 1, '2023-01-12', 30000, 1),
(4, 1, '2023-01-12', 300000, 1),
(5, 1, '2023-01-12', 30000, 1),
(6, 1, '2023-01-12', 30000, 1),
(7, 1, '2023-01-12', 910000, 1),
(8, 1, '2023-01-12', 170000, 1),
(9, 1, '2023-01-12', 170000, 1),
(10, 1, '2023-01-12', 400000, 1),
(11, 1, '2023-01-12', 170000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_invoice_detail`
--

CREATE TABLE `tbl_invoice_detail` (
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_invoice_detail`
--

INSERT INTO `tbl_invoice_detail` (`invoice_id`, `product_id`, `quantity`) VALUES
(3, 22, 1),
(4, 12, 1),
(5, 5, 1),
(6, 5, 1),
(7, 22, 1),
(7, 5, 2),
(7, 13, 1),
(8, 5, 1),
(9, 5, 1),
(10, 13, 1),
(11, 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `unit_in_stock` int(11) NOT NULL,
  `unit_in_order` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_description` text NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `promotion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `brand_id`, `category_id`, `unit_price`, `unit_in_stock`, `unit_in_order`, `product_img`, `product_description`, `color_id`, `size_id`, `release_date`, `promotion_id`) VALUES
(3, 'Áo sơ mi cơ bản form oversize', 1, 1, 200000, 0, 50, 'áo sơ mi cơ bản form oversize.webp', '<p>- &Aacute;o sơ mi form oversize basic thoải m&aacute;i. M&agrave;u sắc nhẹ nh&agrave;ng. C&oacute; thể mặc thường hoặc kho&aacute;c ngo&agrave;i đều được.<br />\r\n- Vải kate silk &iacute;t nhăn, chấ', 3, 3, '2022-12-15', NULL),
(5, 'Áo sơ mi cơ bản form oversize', 1, 1, 200000, 75, 1, 'áo sơ mi cơ bản form oversize.webp', '<p>- Áo sơ mi form oversize basic thoải mái. Màu sắc nhẹ nhàng. Có thể mặc thường hoặc khoác ngoài đều được.<br />\r\n- Vải kate silk ít nhăn, chấ', 3, 1, '2022-12-06', 3),
(6, 'Áo kiểu sơ mi tay dài cổ tim cột nơ', 2, 1, 250000, 100, 0, 'áo sơ mi tay dài cổ tim cột nơ.webp', '<p>- &Aacute;o sơ mi c&agrave;i c&agrave;i n&uacute;t trước, phom su&ocirc;ng rộng, nơ thắt cổ<br />\r\n- Chất voan mỏng, tho&aacute;ng m&aacute;t, c&oacute; độ rũ v&agrave; xuy&ecirc;n thấu nhẹ<br />\r\n', 1, 2, '2023-01-05', 3),
(7, 'Áo thun polo basic', 2, 2, 150000, 40, 40, 'áo thun polo basic.webp', '<p>- &Aacute;o thun polo basic<br />\r\n- Chất thun mềm, mịn, tho&aacute;ng m&aacute;t v&agrave; thoải m&aacute;i<br />\r\n- Ph&ugrave; hợp mặc v&agrave;o tất cả c&aacute;c dịp</p>\r\n', 5, 4, '2023-01-03', 3),
(8, 'Áo thun form ôm cổ polo tay ngắn', 2, 2, 140000, 50, 100, 'áo thun form ôm cổ polo tay ngắn.webp', '<p>- &Aacute;o thun form &ocirc;m cổ polo tay ngắn<br />\r\n- Chất liệu thun g&acirc;n mềm, mịn, tho&aacute;ng m&aacute;t v&agrave; thoải m&aacute;i.<br />\r\n- Ph&ugrave; hợp mặc h&agrave;ng ng&agrave;y<', 2, 4, '2023-01-01', NULL),
(9, 'Quần dài ống loe xếp li trước', 2, 3, 350000, 200, 0, 'quần dài ống loe xếp li trước.webp', '<p>- Quần d&agrave;i ống loe dằn pli giữa<br />\r\n- Chất liệu ford ch&eacute;o đứng form, cứng c&aacute;p mềm mại c&oacute; độ bền cao v&agrave; d&agrave;y dặn.<br />\r\n- Ph&ugrave; hợp mặc đi chơi, đi ', 5, 4, '2023-01-01', NULL),
(10, 'Quần dài ống rộng lưng thun', 2, 3, 300000, 100, 0, 'quần dài ống rộng lưng thun.webp', '<p>- Quần d&agrave;i ống rộng lưng thun<br />\r\n- Chất liệu kaki tho&aacute;ng m&aacute;t, mỏng nhẹ, dễ chịu, chất rũ nhẹ, c&oacute; độ bền cao<br />\r\n- Ph&ugrave; hợp mặc h&agrave;ng ng&agrave;y.</p>\r', 3, 4, '2023-01-06', NULL),
(11, 'Quần short cơ bản ben trước 2 túi', 2, 4, 260000, 100, 20, 'quần short cơ bản ben trước 2 túi.webp', '<p>- Quần short cơ bản<br />\r\n- Chất kaki mỏng, vải đứng phom<br />\r\n- Ph&ugrave; hợp mặc đi chơi,l&agrave;m, cafe cuối tuần hoặc du lịch.</p>\r\n', 1, 2, '2023-01-02', NULL),
(12, 'SƠ MI TƠ ĐEN CỔ V', 1, 1, 300000, 100, 1, 'sơ mi tơ đen cổ chữ V.jpg', '<p>Thiết kế &aacute;o sơ mi tơ đen mềm mại, sang trọng, phần cổ phối trắng thanh lịch v&agrave; l&ocirc;i cuốn. Tr&ecirc;n nền chất liệu tơ chọn lọc cao cấp, &aacute;o được nhấn nh&aacute; th&ecirc;m ', 3, 1, '2023-01-06', NULL),
(13, 'VEST ĐEN LỬNG TAY DÀI', 1, 6, 400000, 98, 1, 'vest đen lửng tay dài.jpg', '<p>Thiết kế vest đen lửng tay d&agrave;i sang trọng, tối giản m&agrave; tinh tế, thời thượng. Tr&ecirc;n nền chất liệu tuytsi chọn lọc cao cấp, &aacute;o được nhấn nh&aacute; th&ecirc;m bằng h&agrave;', 5, 3, '2023-01-08', NULL),
(14, 'VEST NÂU LOGO CỔ ĐEN', 1, 6, 600000, 0, 0, 'vest nâu logo cổ đen.jpg', '<p>Thiết kế vest n&acirc;u logo cổ đen sang trọng, tối giản m&agrave; tinh tế, thời thượng. Tr&ecirc;n nền chất liệu tuytsi chọn lọc cao cấp, &aacute;o được nhấn nh&aacute; th&ecirc;m bằng h&agrave;ng', 5, 3, '2023-01-04', NULL),
(15, 'QUẦN TRẮNG ĐAI CẠP', 1, 3, 200000, 100, 0, 'quần trắng đai cạp.jpg', '<p>Thiết kế quần trắng đai cạp ph&oacute;ng kho&aacute;ng, l&agrave;m nổi bật đ&ocirc;i ch&acirc;n cho người mặc, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng. Tr&ecirc;n nền chất liệu tuytsi chọn lọc c', 3, 1, '2023-01-07', NULL),
(16, 'QUẦN DÀI ĐEN ỐNG VẨY TÚI CHÉO', 1, 3, 200000, 100, 0, 'quần dài đen ống vẩy túi chéo.jpg', '<p>&quot;Thiết kế quần đen ph&oacute;ng kho&aacute;ng, l&agrave;m nổi bật đ&ocirc;i ch&acirc;n cho người mặc, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng. Tr&ecirc;n nền chất liệu tuytsi chọn lọc cao c', 5, 4, '2023-01-08', NULL),
(17, 'QUẦN SOOC TƠ HOA NÂU', 1, 4, 200000, 100, 0, 'quần sooc tơ hoa nâu.jpg', '<p>Thiết kế quần sooc tơ hoa n&acirc;u ph&oacute;ng kho&aacute;ng, l&agrave;m nổi bật đ&ocirc;i ch&acirc;n cho người mặc, tạo hiệu ứng tăng chiều cao. Tr&ecirc;n nền chất liệu tơ chọn lọc cao cấp, phầ', 10, 4, '2023-01-07', NULL),
(18, 'QUẦN SOOC TRẮNG TÚI SƯỜN', 1, 4, 100000, 100, 0, 'quần sooc trắng túi sườn.jpg', '<p>Thiết kế quần sooc trắng t&uacute;i sườn ph&oacute;ng kho&aacute;ng, l&agrave;m nổi bật đ&ocirc;i ch&acirc;n cho người mặc, tạo hiệu ứng tăng chiều cao. Tr&ecirc;n nền chất liệu tuytsi chọn lọc cao', 3, 5, '2023-01-03', NULL),
(19, 'ÁO SƠ MI - AR221560DT', 3, 1, 200000, 100, 0, 'Áo sơ mi - AR220791DT.jpg', '<p>&Aacute;o sơ mi d&agrave;i tay, kiểu d&aacute;ng Regular Fit dễ mặc, hợp form d&aacute;ng.<br />\r\nM&agrave;u sắc v&agrave; kiểu d&aacute;ng trẻ trung, kiểu d&aacute;ng hiện đại, dễ phối đồ.<br />\r\n', 2, 2, '2023-01-03', NULL),
(20, 'ÁO POLO - APV221133', 3, 2, 200000, 100, 0, 'Áo Polo - APV221133.jpg', '<p>Nằm trong top c&aacute;c sản phẩm &aacute;o Polo b&aacute;n chạy nhất tại OWEN hiện tại, d&ograve;ng #Polo_caf&eacute; l&agrave; sản phẩm d&agrave;nh cho m&ugrave;a h&egrave; n&agrave;y của bạn bởi', 3, 4, '2023-01-04', 4),
(21, 'QUẦN TÂY - QST220507R2', 3, 3, 500000, 100, 0, 'Quần tây - QRT23885R2-N.jpg', '<p>Chất liệu Nano mềm mại tho&aacute;ng m&aacute;t, đứng form d&aacute;ng.<br />\r\nThiết kế form slimfit thanh lịch, th&iacute;ch hợp diện mặc khi tới c&ocirc;ng sở, dự sự kiện.<br />\r\nTone m&agrave;u ', 5, 4, '2023-01-04', 3),
(22, 'QUẦN TÂY - QST220507R2-N', 3, 3, 200000, 99, 1, 'Quần tây - QRT23885R2-N.jpg', '<p>Chất liệu Nano mềm mại tho&aacute;ng m&aacute;t, đứng form d&aacute;ng.<br />\r\nThiết kế form slimfit thanh lịch, th&iacute;ch hợp diện mặc khi tới c&ocirc;ng sở, dự sự kiện.<br />\r\nTone m&agrave;u ', 5, 2, '2023-01-09', 3),
(23, 'QUẦN SHORT - SK220656', 3, 4, 150000, 100, 0, 'Quần short - SK220656.jpg', '<p>Chất liệu: 70% Polyester, 27% Rayon, 3% Spandex<br />\r\n<br />\r\nKiểu d&aacute;ng: Trendy<br />\r\n<br />\r\n&nbsp;</p>\r\n', 5, 1, '2023-01-05', 3),
(24, 'Sơ mi tay dài, Cổ nơ 22SSME020H', 4, 1, 360000, 100, 0, 'Sơ mi tay dài, Cổ nơ.webp', '<p>&Aacute;o sơ mi d&aacute;ng su&ocirc;ng, tay lửng, chi tiết cổ nơ nữ t&iacute;nh.<br />\r\nM&agrave;u: Hồng<br />\r\nChất liệu: Lụa C&aacute;t<br />\r\nHướng dẫn bảo quản, giặt l&agrave;<br />\r\nDo m&agra', 9, 2, '2023-01-03', 4),
(25, 'Áo hai dây, 22SAWE001T', 4, 2, 180000, 100, 0, 'Áo hai dây lụa cao cấp, cổ đổ, kết hợp cùng áo blazer..webp', '<p>&Aacute;o hai d&acirc;y lụa cao cấp, cổ đổ, kết hợp c&ugrave;ng &aacute;o blazer.<br />\r\nM&agrave;u sắc: Trắng<br />\r\nChất liệu: Lụa<br />\r\nHướng dẫn bảo quản, giặt l&agrave;</p>\r\n', 3, 4, '2023-01-01', NULL),
(26, 'Set áo kiểu gồm 1 sơ mi trắng cổ đức và 1 áo quây len ', 4, 1, 500000, 100, 0, 'Set áo kiểu gồm 1 sơ mi trắng cổ đức và 1 áo quây len dáng croptop trẻ trung.webp', '<p>Set &aacute;o kiểu gồm 1 sơ mi trắng cổ đức v&agrave; 1 &aacute;o qu&acirc;y len d&aacute;ng croptop trẻ trung<br />\r\nM&agrave;u sắc: Phối m&agrave;u<br />\r\nChất liệu: Len<br />\r\nHướng dẫn bảo quản', 1, 2, '2023-01-02', NULL),
(27, 'Áo blazer cổ chữ K kiểu cách', 4, 6, 600000, 50, 0, 'Áo blazer cổ chữ K kiểu cách.webp', '<p>&Aacute;o cổ chữ K kiểu c&aacute;ch, bản cổ nhỏ, phối ren kem nổi bật, c&oacute; c&uacute;c c&agrave;i th&acirc;n trước, nắp t&uacute;i.<br />\r\nM&agrave;u sắc: Đen<br />\r\nChất liệu: Tu&yacute;t si<', 1, 2, '2023-01-07', NULL),
(28, 'Áo blazer cổ bẻ dáng peplum,', 4, 6, 550000, 40, 0, 'Áo blazer cổ bẻ dáng peplum.webp', '<p>&Aacute;o blazer cổ bẻ d&aacute;ng peplum, chi tiết nắp t&uacute;i tiện dụng<br />\r\n- M&agrave;u: N&acirc;u<br />\r\n- Chất liệu: Tuyt-si<br />\r\nHướng dẫn bảo quản, giặt l&agrave;</p>\r\n', 10, 3, '2023-01-04', NULL),
(29, 'Quần suông ống rộng, phom dáng basic', 4, 1, 430000, 20, 0, 'Quần suông ống rộng, phom dáng basic.webp', '<p>Quần su&ocirc;ng, phom d&aacute;ng basic, c&oacute; kh&oacute;a k&eacute;o v&agrave; c&uacute;c c&agrave;i.<br />\r\nM&agrave;u sắc: Đen<br />\r\nChất liệu: Tu&yacute;t si<br />\r\nHướng dẫn bảo quản, gi', 10, 2, '2023-01-04', 4),
(30, 'Chân váy ngang gối, Dáng ôm', 4, 5, 330000, 60, 0, 'Chân váy ngang gối, Dáng ôm.webp', '<p>Ch&acirc;n v&aacute;y phom d&aacute;ng b&uacute;t ch&igrave;, chi tiết 2 h&agrave;ng c&uacute;c trang tr&iacute;.<br />\r\n- Chất liệu: Tu&yacute;t si<br />\r\n- M&agrave;u sắc: Đen<br />\r\nHướng dẫn bả', 5, 1, '2023-01-05', 4),
(32, 'ÁO SƠ MI NAM TAY DÀI KẺ CARO FORM LOOSE', 1, 1, 320000, 60, 0, 'ÁO SƠ MI NAM TAY DÀI KẺ CARO FORM LOOSE.jpg', '<p>Áo Sơ Mi Tay Dài Form Loose – 10F22SHL030 là dáng áo sơ mi có thân và tay áo suông, rộng nhiều tạo phong thái thoải ', 9, 1, '2023-01-02', NULL),
(33, 'ÁO SƠ MI NỮ TAY DÀI PHỐI VIỀN FORM LOOSE', 5, 1, 300000, 10, 0, 'ÁO SƠ MI NỮ TAY DÀI PHỐI VIỀN FORM LOOSE.jpg', '<p>&Aacute;o Sơ Mi Nữ Tay D&agrave;i Phối Viền Form Loose - 10F22SHLW013 được may từ chất liệu ho&agrave;n to&agrave;n tự nhi&ecirc;n n&ecirc;n rất tho&aacute;ng m&aacute;t, thấm h&uacute;t tốt v&agra', 9, 3, '2023-01-07', NULL),
(34, 'ÁO POLO NAM TAY NGẮN PHỐI MÀU CỔ FORM FITTED', 5, 2, 220000, 30, 0, 'ÁO POLO NAM TAY NGẮN PHỐI MÀU CỔ FORM FITTED.jpg', '<p>&Aacute;o Polo Nam Tay Ngắn Phối Cổ Form Fitted - 10F22POL023R1 l&agrave; item thể hiện được sự thanh lịch của c&aacute;c ch&agrave;ng trong mọi t&igrave;nh huống nhưng cũng kh&ocirc;ng k&eacute;m ', 10, 1, '2023-01-08', NULL),
(35, 'ÁO LEN DỆT KIM NỮ TAY DÀI TRƠN FORM REGULAR CROP', 5, 2, 400000, 40, 0, 'ÁO LEN DỆT KIM NỮ TAY DÀI TRƠN FORM REGULAR CROP.jpg', '<p>&Aacute;o dệt kim tay d&agrave;i dệt kiểu.Regular crop - 10F22KNIW010 l&agrave; sản phẩm best item d&agrave;nh cho những bạn nữ ưa chuộng phong c&aacute;ch trẻ trung, nữ t&iacute;nh. Với form &aacu', 3, 2, '2023-01-03', 3),
(36, 'ÁO VEST BLAZER NAM TENCEL TAY DÀI TRƠN FORM FITTED', 5, 6, 500000, 55, 0, 'ÁO VEST BLAZER NAM TENCEL TAY DÀI TRƠN FORM FITTED.jpg', '<p>&Aacute;o Vest Nam Cotton Form Fitted - 10F21VES005 l&agrave; item cho c&aacute;c ch&agrave;ng thoải m&aacute;i diện ở bất cứ đ&acirc;u đi l&agrave;m, đi chơi đều được. Bởi n&oacute; được thiết kế ', 3, 4, '2023-01-04', 3),
(37, 'ÁO VEST BLAZER NỮ TAY DÀI LINEN XẺ SAU FORM FITTED', 5, 6, 500000, 70, 0, 'ÁO VEST BLAZER NỮ TAY DÀI LINEN XẺ SAU FORM FITTED.jpg', '<p>&Aacute;o Vest Linen Form Fitted &ndash; 10S21VESW001 c&oacute; thiết kế vest 1 khuy. Đặc điểm của loại vest 1 khuy n&agrave;y ch&iacute;nh l&agrave; c&oacute; thể mang đến cảm gi&aacute;c thoải m&', 10, 2, '2023-01-02', NULL),
(38, 'QUẦN DÀI KAKI NAM DOBBY FORM SLIM CROP', 5, 3, 400000, 10, 0, 'QUẦN DÀI KAKI NAM DOBBY FORM SLIM CROP.jpg', '<p>Quần D&agrave;i Khaki Dobby Slim Crop - 10F22PCA009 được l&agrave;m với chất liệu kaki gi&uacute;p cho chất vải sờ v&agrave;o d&agrave;y dặn, c&oacute; độ bền v&agrave; giữ form tốt.</p>\r\n', 1, 4, '2023-01-10', NULL),
(39, 'QUẦN KAKI NỮ LỬNG TÚI ẨN FORM STRAIGHT CROP ', 5, 3, 310000, 50, 0, 'QUẦN KAKI NỮ LỬNG TÚI ẨN FORM STRAIGHT CROP.jpg', '<p>QUẦN KAKI NỮ LỬNG T&Uacute;I ẨN FORM STRAIGHT CROP - 10F22PCAW003 l&agrave; chiếc quần kh&ocirc;ng thể bỏ qua d&agrave;nh cho c&aacute;c n&agrave;ng c&ocirc;ng sở. Với form quần classic cộng hưởng ', 1, 3, '2023-01-04', 4),
(40, 'QUẦN SHORT NAM ỐNG RỘNG NHÃN TRANG TRÍ FORM RELAX', 5, 3, 400000, 40, 0, 'QUẦN SHORT NAM ỐNG RỘNG NHÃN TRANG TRÍ FORM RELAX.jpg', '<p>Quần Short Nam Ống Rộng Nh&atilde;n Trang Tr&iacute; Form Relax - 10S22PSH016 được l&agrave;m từ sợi b&ocirc;ng tự nhi&ecirc;n, sờ mịn tay v&agrave; mang ưu điểm vượt trội l&agrave; tho&aacute;ng m', 1, 4, '2023-01-04', 3),
(41, 'QUẦN SHORT NỮ LƯNG THUN FORM REGULAR', 5, 4, 200000, 20, 0, 'QUẦN SHORT NỮ LƯNG THUN FORM REGULAR.jpg', '<p>Quần Short Nữ Lưng Thun Cotton Form Fitted - 10S21PSHW005 đa dạng từ m&agrave;u sắc đến kiểu d&aacute;ng ph&aacute; c&aacute;ch. Thời trang mix với quần short nữ v&ocirc; c&ugrave;ng dễ mặc v&agrav', 5, 4, '2023-01-08', 4),
(42, 'Sơ mi tay dài, Cổ nơ', 4, 1, 300000, 20, 0, 'Sơ mi tay dài, Cổ nơ.webp', '<p>&Aacute;o lụa kiểu d&agrave;i tay, chi tiết cổ nơ trở th&agrave;nh điểm nhấn.<br />\r\nM&agrave;u sắc: V&agrave;ng<br />\r\nChất liệu: Viscose<br />\r\nHướng dẫn bảo quản, giặt l&agrave;<br />\r\nDo m&agra', 4, 4, '2023-01-03', 4),
(43, 'QUẦN SHORT', 3, 4, 200000, 20, 0, 'Quần short - SJ220263.jpg', '<p>Chất liệu: 70% Polyester, 27% Rayon, 3% Spandex<br />\r\n<br />\r\nKiểu d&aacute;ng: Trendy<br />\r\n<br />\r\n&nbsp;</p>\r\n', 5, 3, '2023-01-06', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_name` varchar(200) NOT NULL,
  `promotion_percent` int(11) NOT NULL,
  `promotion_content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`promotion_id`, `promotion_name`, `promotion_percent`, `promotion_content`) VALUES
(3, 'km1', 15, 'Khuyến mãi ngày tết'),
(4, 'km2', 50, 'Khuyến mãi tết nguyên đán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_size`
--

CREATE TABLE `tbl_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_describe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_describe`) VALUES
(1, 'Đang xử lý'),
(2, 'Đang giao hàng'),
(3, 'Thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `specific_location` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` text NOT NULL,
  `birthday` date NOT NULL,
  `city` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `ward` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `password`, `specific_location`, `email`, `phone`, `birthday`, `city`, `district`, `ward`) VALUES
(1, 'Nguyễn Mạnh Đạt', '1bbd886460827015e5d605ed44252251', 'Xóm 12', 'manhdat6112002@gmail.com', '0981486775', '2023-01-12', 'Tỉnh Nam Định', 'Huyện Xuân Trường', 'Xã Xuân Hồng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `tbl_comment_ibfk_2` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `tbl_invoice_ibfk_1` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_invoice_detail`
--
ALTER TABLE `tbl_invoice_detail`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `promotion_id` (`promotion_id`);

--
-- Chỉ mục cho bảng `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Chỉ mục cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `tbl_blog_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`);

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Các ràng buộc cho bảng `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_invoice_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`status_id`);

--
-- Các ràng buộc cho bảng `tbl_invoice_detail`
--
ALTER TABLE `tbl_invoice_detail`
  ADD CONSTRAINT `tbl_invoice_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `tbl_invoice_detail_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `tbl_invoice` (`invoice_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`),
  ADD CONSTRAINT `tbl_product_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `tbl_color` (`color_id`),
  ADD CONSTRAINT `tbl_product_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `tbl_size` (`size_id`),
  ADD CONSTRAINT `tbl_product_ibfk_5` FOREIGN KEY (`promotion_id`) REFERENCES `tbl_promotion` (`promotion_id`);

--
-- Các ràng buộc cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
