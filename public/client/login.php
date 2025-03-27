<?php
require_once(__DIR__ . "/../../configs/config.php");
require_once(__DIR__ . "/../../configs/function.php");
require_once(__DIR__ . "/../../vendor/google-api/vendor/autoload.php");
$title = 'Đăng nhập tài khoản | ' . $Database->site("TenWeb");
$META_TITLE = "5Fs Group - Đăng nhập tài khoản";
$META_IMAGE = "https://i.imgur.com/LMiRDR5.png";
$META_DESCRIPTION = "5Fs Group - Đăng nhập tài khoản";
$META_SITE = BASE_URL("Auth/DangNhap");
require_once(__DIR__ . "/../../public/client/header-home.php");
if (isset($_SESSION["account"])) {
    $row = $Database->get_row("SELECT * FROM `dangkykhoahoc` WHERE `TaiKhoan` = '" . $_SESSION["account"] . "'  ");
    if (!$row) {
        return die('<script type="text/javascript">
            setTimeout(function(){ location.href = "' . BASE_URL('Page/KhoiTaoTaiKhoan') . '" }, 0);
            </script>
            ');
    }
    return die('<script type="text/javascript">
        setTimeout(function(){ location.href = "' . BASE_URL('') . '" }, 0);
        </script>
        ');
}

// Login with Google

// $client = new Google_Client();
// $client->setClientId(GOOGLE_APP_ID);
// $client->setClientSecret(GOOGLE_APP_SECRET);
// $client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
// $client->addScope("email");
// $client->addScope("profile");


// Login with Facebook
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
<?=include_once(__DIR__ . "/../../assets/css/login.css");
?>
</style>
<div class="login-container">
    <div class="login-header">
        <a href="<?= BASE_URL("/") ?>" style="text-decoration: none; color: wheat">
            <h1 class=" header__name"><?= $Database->site("TenWeb") ?></h1>
        </a>
        <p class="login-description">
            Cùng chinh phục ngôn ngữ mới dễ dàng và hiệu quả.
        </p>
    </div>

    <div class="login-body">
        <form id="form">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <i class="fas fa-user input-icon"></i>
                <input type="text" placeholder="Tên đăng nhập" id="account" class="input-field"
                    placeholder="Nhập tên đăng nhập">
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" placeholder="Mật khẩu" id="password" class="input-field"
                    placeholder="Nhập mật khẩu" required>
                <button type="button" class="password-toggle" id="togglePassword">
                    <i class="far fa-eye"></i>
                </button>
            </div>

            <a href="#" class="forgot-password">Quên mật khẩu?</a>

            <button type="submit" id="btnLogin" class="login-btn">ĐĂNG NHẬP</button>

            <div class="signup-link">
                Chưa có tài khoản? <a href="<?= BASE_URL("Auth/DangKy") ?>">Đăng ký ngay</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    // Hiển thị/ẩn mật khẩu
    $('#togglePassword').on('click', function() {
        const passwordField = $('#password');
        const isPassword = passwordField.attr('type') === 'password';
        passwordField.attr('type', isPassword ? 'text' : 'password');
        $(this).html(isPassword ? '<i class="far fa-eye-slash"></i>' : '<i class="far fa-eye"></i>');
    });

    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
        });
    });
    $("#btnLogin").on("click", function() {
        $.ajax({
            url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
            method: "POST",
            data: {
                type: 'login',
                account: $("#account").val().trim(),
                password: $("#password").val().trim()
            },
            beforeSend: function() {
                $('#btnLogin').html('Đang xử lý').addClass("disabled");
                $('#loading_modal').addClass("loading--open");
            },
            success: function(response) {
                $("#thongbao").html(response);
                $('#btnLogin').html('Đăng nhập').removeClass("disabled");
                $('#loading_modal').removeClass("loading--open");
            }
        });
    });
});
</script>
<?php
require_once(__DIR__ . "/../../public/client/footer.php"); ?>