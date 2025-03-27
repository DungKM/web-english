<?php
require_once(__DIR__ . "/configs/config.php");
require_once(__DIR__ . "/configs/function.php");
$title = 'Trang chủ nền tảng học ngoại ngữ online | ' . $Database->site("TenWeb");
$META_TITLE = "5Fs Group - Nền tảng học ngoại ngữ online";
$META_IMAGE = "https://i.imgur.com/Ldhl3hK.png";
$META_DESCRIPTION = "5Fs Group - Nền tảng học ngoại ngữ online";
$META_SITE = BASE_URL("");
require_once(__DIR__ . "/public/client/header-home.php");
require 'vendor/autoload.php';

$debugbar = new DebugBar\StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$soLuongKhoaHoc = $Database->get_row("select count(*) as SoLuong from khoahoc ")["SoLuong"];
$soLuongHocVien = $Database->get_row("select count(*) as SoLuong from nguoidung ")["SoLuong"];

?>

<style>
<?=include_once(__DIR__ . "/assets/css/home.css");
?>
</style>
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <a href="<?= BASE_URL("/") ?>" style="text-decoration: none; color: wheat;">
            <h1><?= $Database->site("TenWeb") ?></h1>
        </a>
        <h2>Học ngoại ngữ và cải thiện kĩ năng của bản thân bạn</h2>
        <p>Ngoại ngữ nhận đang sử dụng trong các tổng giáo pháp hàng ngày, biết đầu tiên, trong dạng việt.</p>
        <?php
        if (isset($_SESSION["account"])) {
        ?>
        <a href="<?= BASE_URL("Page/Home") ?>" class="nav__statr btn-start">Bắt đầu học</a>
        <?php
        } else {
        ?>
        <a href="<?= BASE_URL("Auth/DangNhap") ?>" class="nav__statr btn-start">Bắt đầu học</a>
        <?php
        }
        ?>
    </div>
</section>

<div class="container">
    <!-- Học viện Section -->
    <section class="section">
        <div class="flex-container">
            <div>
                <h3>Học viện</h3>
                <p>Khám phá môi trường học tập hiện đại với đội ngũ giảng viên chuyên nghiệp và phương pháp giảng dạy
                    tiên tiến.</p>
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    alt="Học viện" class="illustration floating">
            </div>
        </div>
    </section>

    <!-- Tại sao chọn chúng tôi -->
    <section class="section section-highlight">
        <h3>Tại sao nên sử dụng HocNgoaiNguBeginner?</h3>
        <div class="features">
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h4>Phương pháp hiện đại</h4>
                <p>Các kĩ năng với nhất được khóa học chứng minh. Học nhuận họn gặp hai tần ra với trên lập.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h4>Tiến bộ rõ rệt</h4>
                <p>Học hiệu của đầu mình trong ngày ở cực nhất sau đúng trống ở cực vậy.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Cộng đồng hỗ trợ</h4>
                <p>Hàng nghìn học viên đã thành công với phương pháp của chúng tôi.</p>
            </div>
        </div>
    </section>

    <!-- Học miễn phí -->
    <section class="section">
        <h3>Học miễn phí, mọi lúc mọi nơi</h3>
        <div class="features">
            <div class="feature">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    alt="Lộ trình học tập" class="illustration">
                <h4>Lý trình học tập</h4>
                <p>Lý trình học tập được xây dựng cho riêng bạn</p>
            </div>
            <div class="feature">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    alt="Từ vựng" class="illustration">
                <h4>Từ vựng phong phú</h4>
                <p>Bắt đầu với vựng Danh kinh tế trong ngày ở cực nhất được</p>
            </div>
        </div>
    </section>

    <!-- Từ vựng chính xác -->
    <section class="section">
        <h3>Nhiều từ vựng được dịch nghĩa chính xác nhất</h3>
        <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Từ vựng chính xác" class="illustration floating"
            style="float: right; margin-left: 30px; max-width: 50%;">
        <p>Khác với các từ điện thông thường, Chống tất xây dựng từ điện thông thường người tập thương lại từ vựng có
            nghị chính xác nhất than đến nghịnh nộp việc.</p>
        <p>Chúng tôi cung cấp hệ thống từ điển chuyên sâu với hàng nghìn ví dụ thực tế, giúp bạn hiểu rõ ngữ cảnh sử
            dụng của từng từ vựng.</p>
        <div style="clear: both;"></div>
    </section>

    <!-- Ví dụ cụ thể -->
    <section class="section">
        <h3>Ví dụ cụ thể cho từng từ</h3>
        <div class="features">
            <div class="feature">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    alt="Học nhóm" class="illustration">
                <p>Với nhất đối với cấp danh kinh tế và các tổng giáo pháp, giấy các lựa nhất được cho hai vào đồng thời
                    từ vựng trong đối sống với ngữ danh thực tế.</p>
            </div>
        </div>
    </section>

    <!-- Đánh giá học viên -->
    <section class="section">
        <h3>Học viên nói gì về HocNgoaiNguBeginner</h3>
        <div class="testimonials">
            <div class="testimonial">
                <p>Bài học rất hay, phương pháp dạy dễ hiểu. Tôi đã cải thiện trình độ ngoại ngữ chỉ sau 3 tháng.</p>
                <div class="testimonial-author">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Nguyễn Thị A">
                    <div>
                        <h4>Nguyễn Thị A</h4>
                        <p>Sinh viên</p>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <p>Admin rất nhiệt tình hỗ trợ. Nội dung bài học phong phú và thực tế.</p>
                <div class="testimonial-author">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Trần Văn B">
                    <div>
                        <h4>Trần Văn B</h4>
                        <p>Nhân viên văn phòng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trình duyệt hỗ trợ -->
    <section class="section">
        <h3>Các trình duyệt hỗ trợ</h3>
        <p>HocNgoaiNguBeginner hoạt động trên mọi trình duyệt hiện đại: Chrome, Firefox, Safari, Edge.</p>
        <div class="features" style="margin-top: 30px;">
            <div class="feature" style="background: transparent; box-shadow: none;">
                <i class="fab fa-chrome" style="font-size: 3rem; color: #4285F4;"></i>
                <h4>Chrome</h4>
            </div>
            <div class="feature" style="background: transparent; box-shadow: none;">
                <i class="fab fa-firefox" style="font-size: 3rem; color: #FF7139;"></i>
                <h4>Firefox</h4>
            </div>
            <div class="feature" style="background: transparent; box-shadow: none;">
                <i class="fab fa-safari" style="font-size: 3rem; color: #1B73E8;"></i>
                <h4>Safari</h4>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Giới thiệu</h3>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Đội ngũ giảng viên</a></li>
                    <li><a href="#">Phương pháp giảng dạy</a></li>
                    <li><a href="#">Trợ giúp và hỗ trợ</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Khóa học</h3>
                <ul>
                    <li><a href="#">Tiếng Anh cơ bản</a></li>
                    <li><a href="#">Tiếng Anh giao tiếp</a></li>
                    <li><a href="#">Luyện thi chứng chỉ</a></li>
                    <li><a href="#">Tiếng Anh chuyên ngành</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Liên kết</h3>
                <ul>
                    <li><a href="#">Blog học tập</a></li>
                    <li><a href="#">Tài liệu miễn phí</a></li>
                    <li><a href="#">Câu hỏi thường gặp</a></li>
                </ul>

                <h3 style="margin-top: 30px;">Theo dõi chúng tôi</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>© 2023 HocNgoaiNguBeginner - Nền tảng học ngoại ngữ online. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
// JavaScript nâng cao
document.addEventListener('DOMContentLoaded', function() {
    // Hiệu ứng scroll
    const sections = document.querySelectorAll('.section');

    function checkScroll() {
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (sectionTop < windowHeight * 0.75) {
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }
        });
    }

    // Khởi tạo trạng thái ban đầu
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(50px)';
        section.style.transition = 'all 0.6s ease-out';
    });

    // Kiểm tra ngay khi tải trang
    checkScroll();

    // Thêm sự kiện scroll
    window.addEventListener('scroll', checkScroll);

    // Xử lý nút
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            // Hiệu ứng nhấp nháy
            button.style.animation = 'none';
            void button.offsetWidth; // Trigger reflow
            button.style.animation = 'pulse 0.5s';

            // Chuyển hướng sau 0.5s
            setTimeout(() => {
                window.location.href = '#';
            }, 500);
        });
    });

    // Thêm style cho hiệu ứng pulse
    const style = document.createElement('style');
    style.textContent = `
                @keyframes pulse {
                    0% { transform: scale(1); }
                    50% { transform: scale(1.05); }
                    100% { transform: scale(1); }
                }
            `;
    document.head.appendChild(style);
});
</script>