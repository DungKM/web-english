<?php
require_once(__DIR__ . "/../../configs/config.php");
require_once(__DIR__ . "/../../configs/function.php");
require_once(__DIR__ . "/../../vendor/google-api/vendor/autoload.php");

$title = 'Đăng ký tài khoản | ' . $Database->site("TenWeb");
$META_TITLE = "5Fs Group - Đăng ký tài khoản";
$META_IMAGE = "https://i.imgur.com/sIxDQqF.png";
$META_DESCRIPTION = "5Fs Group - Đăng ký tài khoản";
$META_SITE = BASE_URL("Auth/DangKy");

require_once(__DIR__ . "/../../public/client/header-home.php");
if (isset($_SESSION["account"])) {
    return die('<script type="text/javascript">
        setTimeout(function(){ location.href = "' . BASE_URL('') . '" }, 0);
        </script>
        ');
}

// // Login with Google
// $client = new Google_Client();
// $client->setClientId(GOOGLE_APP_ID);
// $client->setClientSecret(GOOGLE_APP_SECRET);
// $client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
// $client->addScope("email");
// $client->addScope("profile");

// // Login with Facebook
// $fb = new Facebook\Facebook([
//     'app_id' => FACEBOOK_APP_ID,
//     'app_secret' => FACEBOOK_APP_SECRET,
//     'default_graph_version' => 'v2.5',
// ]);
// $helper = $fb->getRedirectLoginHelper();
// $permissions = ['email']; // optional
// $loginFacebookUrl = $helper->getLoginUrl(FACEBOOK_APP_CALLBACK_URL, $permissions);


?>
<style>
<?=include_once(__DIR__ . "/../../assets/css/sign_up.css");
?>
</style>
<div class="register-container">
    <div class="register-header">
        <h1>Đăng ký tài khoản mới</h1>
        <p>Bắt đầu hành trình học ngoại ngữ của bạn</p>
    </div>

    <div class="register-body">
        <form id="registerForm">
            <div class="form-group">
                <label for="fullname">Tên hiển thị</label>
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="tenHienThi" class="input-field" placeholder="Tên hiển thị" required>
            </div>

            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <i class="fas fa-user-tag input-icon"></i>
                <input type="text" id="account" class="input-field" placeholder="Chọn tên đăng nhập" required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" class="input-field" placeholder="Tạo mật khẩu" required>
                <button type="button" class="password-toggle" id="togglePassword">
                    <i class="far fa-eye"></i>
                </button>
            </div>
            <div class="terms">
                <input type="checkbox" id="agreeTerms" required>
                <label for="agreeTerms">Tôi đồng ý với <a href="#">Điều khoản dịch vụ</a> và <a href="#">Chính sách
                        bảo mật</a></label>
            </div>

            <button type="submit" class="register-btn">ĐĂNG KÝ</button>

            <div class="login-link">
                Đã có tài khoản? <a href="<?= BASE_URL("Auth/DangNhap")  ?>">Đăng nhập ngay</a>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#form").submit(function(e) {
        e.preventDefault();
    });
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="far fa-eye"></i>' :
            '<i class="far fa-eye-slash"></i>';
    });
});
$("#btnSignup").on("click", function() {
    $.ajax({
        url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
        method: "POST",
        data: {
            type: 'signup',
            account: $("#account").val().trim(),
            tenHienThi: $("#tenHienThi").val().trim(),
            password: $("#password").val().trim()
        },
        beforeSend: function() {
            $('#btnSignup').html('Đang xử lý').addClass("disabled");
            $('#loading_modal').addClass("loading--open");
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#btnSignup').html('Tạo tài khoản').removeClass("disabled");
            $('#loading_modal').removeClass("loading--open");
        }
    });
});
</script>