<?php
$sessionName = 'Buổi 02';
$scoreInput = '';
$classification = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $scoreInput = trim($_POST['score'] ?? '');
    $normalizedScore = str_replace(',', '.', $scoreInput);

    if ($scoreInput === '' || !is_numeric($normalizedScore)) {
        $error = 'Vui lòng nhập điểm hợp lệ.';
    } else {
        $score = (float) $normalizedScore;

        if ($score < 0 || $score > 10) {
            $error = 'Điểm phải nằm trong khoảng từ 0 đến 10.';
        } elseif ($score >= 8) {
            $classification = 'Giỏi';
        } elseif ($score >= 6.5) {
            $classification = 'Khá';
        } elseif ($score >= 5) {
            $classification = 'Trung bình';
        } else {
            $classification = 'Chưa đạt';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bài thực hành 02 môn Lập trình Web">
    <title><?= htmlspecialchars($sessionName) ?> | Lập trình Web</title>
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
            <p class="eyebrow">BÀI TẬP TRÊN LỚP · BUỔI 02</p>
            <h1>Bài 1: Xếp loại điểm</h1>
            <p>Nhập điểm để xem kết quả xếp loại.</p>
        </section>
        <section class="section">
            <div class="container exercise-layout">
                <article class="card exercise-card">
                    <h2>Nhập điểm</h2>
                    <form method="post" action="">
                        <label class="form-label" for="score">Điểm (từ 0 đến 10)</label>
                        <input class="form-input" id="score" name="score" type="text" inputmode="decimal"
                            placeholder="Ví dụ: 7.5" value="<?= htmlspecialchars($scoreInput) ?>" required>
                        <button class="button primary form-submit" type="submit">Xếp loại</button>
                    </form>

                    <?php if ($error !== null): ?>
                        <div class="result-message result-error" role="alert">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php elseif ($classification !== null): ?>
                        <div class="result-message result-success" role="status">
                            Điểm <strong><?= htmlspecialchars((string) $score) ?></strong> được xếp loại
                            <strong><?= htmlspecialchars($classification) ?></strong>.
                        </div>
                    <?php endif; ?>
                </article>

                <aside class="card">
                    <h2>Quy tắc xếp loại</h2>
                    <ul class="classification-list">
                        <li><strong>Từ 8 trở lên:</strong> Giỏi</li>
                        <li><strong>Từ 6.5 đến dưới 8:</strong> Khá</li>
                        <li><strong>Từ 5 đến dưới 6.5:</strong> Trung bình</li>
                        <li><strong>Dưới 5:</strong> Chưa đạt</li>
                    </ul>
                </aside>
            </div>
            <div class="container actions">
                <a class="button secondary" href="index.php">← Quay lại bài tập Buổi 02</a>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>Nguyễn Quang Minh · <?= htmlspecialchars($sessionName) ?></p>
        </div>
    </footer>
    <script src="../../../main.js"></script>
</body>

</html>