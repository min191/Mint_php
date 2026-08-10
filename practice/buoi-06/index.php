<?php
$sessionName = 'Buổi 06';
$practiceContent = 'Nội dung thực hành sẽ được cập nhật sau.';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bài thực hành 06 môn Lập trình Web">
    <title><?= htmlspecialchars($sessionName) ?> | Lập trình Web</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
<header class="site-header">
    <nav class="navbar container" aria-label="Điều hướng chính">
        <a class="brand" href="../../index.html">NQM<span>.</span></a>
        <div class="nav-links session-nav">
            <a href="../../index.html">Trang chủ</a>
            <a class="active" href="../../about.html">Bài thực hành</a>
            <a href="../../group.html">Giới thiệu nhóm</a>
        </div>
    </nav>
</header>
<main>
    <section class="page-hero container">
        <p class="eyebrow">BÀI THỰC HÀNH LẬP TRÌNH WEB</p>
        <h1><?= htmlspecialchars($sessionName) ?></h1>
        <p><?= htmlspecialchars($practiceContent) ?></p>
        <div class="actions"><a class="button primary" href="../../about.html">← Quay lại danh sách bài tập</a></div>
    </section>
</main>
<footer class="site-footer"><div class="container"><p>Nguyễn Quang Minh · <?= htmlspecialchars($sessionName) ?></p></div></footer>
<script src="../../assets/js/main.js"></script>
</body>
</html>
