<?php
declare(strict_types=1);

$sessionNumber = $sessionNumber ?? '00';
$sessionDirectory = __DIR__ . '/buoi-' . $sessionNumber;
$exerciseFiles = glob($sessionDirectory . '/bai-*.php') ?: [];
natsort($exerciseFiles);

$exerciseDetails = [
    '02-01' => ['Xếp loại điểm', 'Nhập điểm và xếp loại Giỏi, Khá, Trung bình hoặc Chưa đạt.'],
    '02-02' => ['Tính tiền tài liệu', 'Nhập tên tài liệu, số lượng và đơn giá để tính tổng số tiền.'],
    '02-03' => ['Bảng điểm sinh viên', 'Tính điểm trung bình và kết quả học tập của 3 sinh viên.'],
    '03-01' => ['Form liên hệ', 'Kiểm tra dữ liệu liên hệ và tải ảnh đại diện bằng PHP.'],
];

function sessionEscape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Danh sách bài tập trên lớp Buổi <?= sessionEscape($sessionNumber) ?>">
    <title>Bài tập trên lớp Buổi <?= sessionEscape($sessionNumber) ?> | Lập trình Web</title>
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
        <h1>Buổi <?= sessionEscape($sessionNumber) ?></h1>
        <p>Chọn bài tập bạn muốn xem và thực hành.</p>
    </section>
    <section class="section">
        <div class="container">
            <?php if ($exerciseFiles !== []): ?>
                <div class="card-grid three-columns practice-grid">
                    <?php foreach ($exerciseFiles as $exerciseFile):
                        $fileName = basename($exerciseFile);
                        preg_match('/bai-(\d+)\.php$/', $fileName, $matches);
                        $exerciseNumber = $matches[1] ?? '00';
                        $detailKey = $sessionNumber . '-' . $exerciseNumber;
                        $detail = $exerciseDetails[$detailKey] ?? [
                            'Bài tập ' . (int) $exerciseNumber,
                            'Nội dung thực hành của Bài ' . (int) $exerciseNumber . ' trong Buổi ' . (int) $sessionNumber . '.',
                        ];
                    ?>
                        <article class="card practice-card">
                            <span class="card-number">BÀI <?= sessionEscape($exerciseNumber) ?></span>
                            <h2><?= sessionEscape($detail[0]) ?></h2>
                            <p><?= sessionEscape($detail[1]) ?></p>
                            <a class="text-link" href="<?= sessionEscape($fileName) ?>">Mở Bài <?= (int) $exerciseNumber ?> →</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="card practice-card empty-practice-card">
                    <span class="card-number">ĐANG CẬP NHẬT</span>
                    <h2>Chưa có bài tập</h2>
                    <p>Các bài tập của Buổi <?= sessionEscape($sessionNumber) ?> sẽ được hiển thị tại đây khi được thêm vào.</p>
                </div>
            <?php endif; ?>
            <div class="actions"><a class="button secondary" href="../index.php">← Quay lại bài tập trên lớp</a></div>
        </div>
    </section>
</main>
<footer class="site-footer"><div class="container"><p>Nguyễn Quang Minh · Bài tập trên lớp Buổi <?= sessionEscape($sessionNumber) ?></p></div></footer>
<script src="../../../main.js"></script>
</body>
</html>
