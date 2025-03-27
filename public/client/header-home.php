<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <title>
        <?= $title; ?>
    </title>
    <meta name="robots" content="index,follow" />
    <meta name="description" content="<?= $Database->site('MoTa'); ?>">
    <meta name="keywords" content="<?= $Database->site('TuKhoa'); ?>">
    <!-- Open Graph data -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="<?= isset($META_TITLE) ? $META_TITLE : $Database->site('TenWeb'); ?>">
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?= isset($META_SITE) ? $META_SITE :  BASE_URL(''); ?>">
    <meta property="og:image" content="<?= isset($META_IMAGE) ? $META_IMAGE :  $Database->site('Thumbnail'); ?>">
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta property="og:description"
        content="<?= isset($META_DESCRIPTION) ? $META_DESCRIPTION :  $Database->site('MoTa'); ?>">
    <meta property="og:site_name" content="<?= $Database->site('TenWeb'); ?>">
    <meta property="article:section" content="<?= $Database->site('MoTa'); ?>">
    <meta property="article:tag" content="<?= $Database->site('TuKhoa'); ?>">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="<?= isset($META_IMAGE) ? $META_IMAGE : $Database->site('Thumbnail'); ?>">
    <meta name="twitter:site" content="<?= isset($META_SITE) ? $META_SITE :  BASE_URL(''); ?>">
    <meta name="twitter:title" content="<?= isset($META_TITLE) ? $META_TITLE :  $Database->site('TenWeb'); ?>">
    <meta name="twitter:description"
        content="<?= isset($META_DESCRIPTION) ? $META_DESCRIPTION :  $Database->site('MoTa'); ?>">
    <meta name="twitter:creator" content="<?= $Database->site('Author'); ?>">
    <meta name="twitter:image:src" content="<?= isset($META_IMAGE) ? $META_IMAGE :   $Database->site('Thumbnail'); ?>">

    <link rel="icon" href="<?= $Database->site('LinkIcon'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="main">
        <!-- <div id="thongbao"></div> -->
        <!-- <div class="loading" id="loading_modal">
            <div class="loading__wrap-img">
                <img src="<?= BASE_URL("/") ?>/assets/img/Loading.gif" alt="" class="loading__img">
            </div>
        </div> -->
        <?php
        if (isset($_SESSION["account"])) {
            checkAccountExist();
            updateCapDo();
        }
        ?>