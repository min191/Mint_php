<?php
$sessionName = 'Buổi 08';
$practiceContent = 'Nội dung thực hành sẽ được cập nhật sau.';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bài thực hành 08 môn Lập trình Web">
    <title><?= htmlspecialchars($sessionName) ?> | Lập trình Web</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<header class="site-header">
    <nav class="navbar container" aria-label="Điều hướng chính">
        <a class="brand" href="../../index.php">NQM<span>.</span></a>
        <div class="nav-links session-nav">
            <a href="../../index.php">Trang chủ</a>
            <a class="active" href="../../about.php">Bài thực hành</a>
            <a href="../../group.php">Giới thiệu nhóm</a>
        </div>
    </nav>
</header>
<main>
    <section class="page-hero container">
        <p class="eyebrow">BÀI THỰC HÀNH LẬP TRÌNH WEB</p>
        <h1><?= htmlspecialchars($sessionName) ?></h1>
        <p><?= htmlspecialchars($practiceContent) ?></p>
        <div class="actions"><a class="button primary" href="../../about.php">← Quay lại danh sách bài tập</a></div>
    </section>
</main>
<footer class="site-footer"><div class="container"><p>Nguyễn Quang Minh · <?= htmlspecialchars($sessionName) ?></p></div></footer>
<script src="../../assets/js/main.js"></script>
</body>
</html>
