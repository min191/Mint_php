<?php
$sessionNumber = '02';
require dirname(__DIR__) . '/_session-index.php';
__halt_compiler();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Danh sách bài tập trên lớp Buổi 02">
    <title>Bài tập trên lớp Buổi 02 | Lập trình Web</title>
    <link rel="stylesheet" href="../../../style.css">
</head>
<body>
<header class="site-header">
    <nav class="navbar container" aria-label="Điều hướng chính">
        <a class="brand" href="../../../index.php">NQM<span>.</span></a>
        <div class="nav-links session-nav">
            <a href="../../../index.php">Trang chủ</a>
            <a class="active" href="../../../about.php">Bài thực hành</a>
            <a href="../../../group.php">Giới thiệu nhóm</a>
        </div>
    </nav>
</header>
<main>
    <section class="page-hero container">
        <p class="eyebrow">BÀI TẬP TRÊN LỚP</p>
        <h1>Buổi 02</h1>
        <p>Chọn bài tập bạn muốn xem và thực hành.</p>
    </section>
    <section class="section">
        <div class="container">
            <div class="card-grid three-columns practice-grid">
                <article class="card practice-card">
                    <span class="card-number">BÀI 01</span>
                    <h2>Xếp loại điểm</h2>
                    <p>Nhập điểm và xếp loại Giỏi, Khá, Trung bình hoặc Chưa đạt.</p>
                    <a class="text-link" href="bai-01.php">Mở Bài 1 →</a>
                </article>
                <article class="card practice-card">
                    <span class="card-number">BÀI 02</span>
                    <h2>Tính tiền tài liệu</h2>
                    <p>Nhập tên tài liệu, số lượng và đơn giá để tính tổng số tiền.</p>
                    <a class="text-link" href="bai-02.php">Mở Bài 2 →</a>
                </article>
                <article class="card practice-card">
                    <span class="card-number">BÀI 03</span>
                    <h2>Bảng điểm sinh viên</h2>
                    <p>Tính điểm trung bình và kết quả học tập của 3 sinh viên.</p>
                    <a class="text-link" href="bai-03.php">Mở Bài 3 →</a>
                </article>
            </div>
            <div class="actions">
                <a class="button secondary" href="../index.php">← Quay lại bài tập trên lớp</a>
            </div>
        </div>
    </section>
</main>
<footer class="site-footer"><div class="container"><p>Nguyễn Quang Minh · Bài tập trên lớp Buổi 02</p></div></footer>
<script src="../../../main.js"></script>
</body>
</html>
