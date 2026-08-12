<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Danh sách bài tập trên lớp môn Lập trình Web">
    <title>Bài tập trên lớp | Lập trình Web</title>
    <link rel="stylesheet" href="../../style.css">
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
        <p class="eyebrow">BÀI TẬP TRÊN LỚP</p>
        <h1>Danh sách từng buổi</h1>
        <p>Các bài thực hành được thực hiện trong giờ học.</p>
    </section>
    <section class="section">
        <div class="container">
            <div class="card-grid three-columns practice-grid">
                <?php for ($session = 1; $session <= 9; $session++): $number = str_pad((string) $session, 2, '0', STR_PAD_LEFT); ?>
                    <article class="card practice-card">
                        <span class="card-number"><?= $number ?></span>
                        <h3>Buổi <?= $number ?></h3>
                        <p>Nội dung thực hành sẽ được cập nhật sau.</p>
                        <a class="text-link" href="buoi-<?= $number ?>/index.php">Mở bài trên lớp →</a>
                    </article>
                <?php endfor; ?>
            </div>
            <div class="actions"><a class="button secondary" href="../../about.php">← Quay lại các loại bài tập</a></div>
        </div>
    </section>
</main>
<footer class="site-footer"><div class="container"><p>Nguyễn Quang Minh · Bài tập trên lớp</p></div></footer>
<script src="../../main.js"></script>
</body>
</html>
