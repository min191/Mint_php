<?php
$documentName = '';
$quantityInput = '';
$unitPriceInput = '';
$totalAmount = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documentName = trim($_POST['document_name'] ?? '');
    $quantityInput = trim($_POST['quantity'] ?? '');
    $unitPriceInput = trim($_POST['unit_price'] ?? '');
    $normalizedUnitPrice = str_replace(',', '.', $unitPriceInput);

    if ($documentName === '') {
        $error = 'Vui lòng nhập tên tài liệu.';
    } elseif (filter_var($quantityInput, FILTER_VALIDATE_INT) === false || (int) $quantityInput <= 0) {
        $error = 'Số lượng phải là một số nguyên lớn hơn 0.';
    } elseif (!is_numeric($normalizedUnitPrice) || (float) $normalizedUnitPrice < 0) {
        $error = 'Đơn giá phải là một số không âm.';
    } else {
        $quantity = (int) $quantityInput;
        $unitPrice = (float) $normalizedUnitPrice;
        $totalAmount = $quantity * $unitPrice;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bài 2 - Tính tiền tài liệu">
    <title>Bài 2: Tính tiền tài liệu | Buổi 02</title>
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
            <h1>Bài 2: Tính tiền tài liệu</h1>
            <p>Nhập thông tin tài liệu để tính số tiền cần thanh toán.</p>
        </section>
        <section class="section">
            <div class="container exercise-layout">
                <article class="card exercise-card">
                    <h2>Thông tin tài liệu</h2>
                    <form method="post" action="">
                        <label class="form-label" for="document_name">Tên tài liệu</label>
                        <input class="form-input" id="document_name" name="document_name" type="text"
                            value="<?= htmlspecialchars($documentName) ?>" placeholder="Ví dụ: Giáo trình PHP" required>

                        <label class="form-label form-label-spaced" for="quantity">Số lượng</label>
                        <input class="form-input" id="quantity" name="quantity" type="number" min="1" step="1"
                            value="<?= htmlspecialchars($quantityInput) ?>" placeholder="Ví dụ: 2" required>

                        <label class="form-label form-label-spaced" for="unit_price">Đơn giá (VNĐ)</label>
                        <input class="form-input" id="unit_price" name="unit_price" type="number" min="0" step="any"
                            value="<?= htmlspecialchars($unitPriceInput) ?>" placeholder="Ví dụ: 50000" required>

                        <button class="button primary form-submit" type="submit">Tính tiền</button>
                    </form>

                    <?php if ($error !== null): ?>
                        <div class="result-message result-error" role="alert">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php elseif ($totalAmount !== null): ?>
                        <div class="result-message result-success document-result" role="status">
                            <span>Tên tài liệu</span>
                            <strong><?= htmlspecialchars($documentName) ?></strong>
                            <span>Số tiền</span>
                            <strong><?= number_format($totalAmount, 0, ',', '.') ?> VNĐ</strong>
                        </div>
                    <?php endif; ?>
                </article>

                <aside class="card">
                    <h2>Công thức</h2>
                    <p><strong>Số tiền = Số lượng × Đơn giá</strong></p>
                    <p>Kết quả được định dạng theo đơn vị tiền Việt Nam.</p>
                </aside>
            </div>
            <div class="container actions">
                <a class="button secondary" href="index.php">← Quay lại bài tập Buổi 02</a>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>Nguyễn Quang Minh · Buổi 02 · Bài 02</p>
        </div>
    </footer>
    <script src="../../../main.js"></script>
</body>

</html>