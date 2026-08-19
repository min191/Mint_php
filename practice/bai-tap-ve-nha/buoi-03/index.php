<?php
declare(strict_types=1);
const CATEGORIES = ['Công nghệ', 'Giáo dục', 'Thể thao', 'Đời sống'];
function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function normalizeText(string $value): string
{
    $value = trim($value);
    return preg_replace('/\s+/u', ' ', $value) ?? $value;
}
function textLength(string $value): int
{
    return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
}
function articleType(int $count): string
{
    return $count < 300 ? 'Tin ngắn' : ($count <= 800 ? 'Bài tiêu chuẩn' : 'Bài chuyên sâu');
}

$formData = ['title' => '', 'category' => '', 'author' => '', 'word_count' => ''];
$errors = [];
$submittedArticle = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = [
        'title' => normalizeText((string) ($_POST['title'] ?? '')),
        'category' => normalizeText((string) ($_POST['category'] ?? '')),
        'author' => normalizeText((string) ($_POST['author'] ?? '')),
        'word_count' => trim((string) ($_POST['word_count'] ?? '')),
    ];
    $length = textLength($formData['title']);
    if ($formData['title'] === '')
        $errors['title'] = 'Vui lòng nhập tiêu đề bài viết.';
    elseif ($length < 5 || $length > 150)
        $errors['title'] = 'Tiêu đề phải từ 5 đến 150 ký tự.';
    if ($formData['category'] === '')
        $errors['category'] = 'Vui lòng chọn danh mục.';
    elseif (!in_array($formData['category'], CATEGORIES, true))
        $errors['category'] = 'Danh mục không hợp lệ.';
    $length = textLength($formData['author']);
    if ($formData['author'] === '')
        $errors['author'] = 'Vui lòng nhập tên tác giả.';
    elseif ($length < 2 || $length > 80)
        $errors['author'] = 'Tên tác giả phải từ 2 đến 80 ký tự.';
    elseif (!preg_match("/^[\p{L}\s'.-]+$/u", $formData['author']))
        $errors['author'] = 'Tên tác giả chứa ký tự không hợp lệ.';
    $wordCount = filter_var($formData['word_count'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 10000]]);
    if ($formData['word_count'] === '')
        $errors['word_count'] = 'Vui lòng nhập số từ.';
    elseif ($wordCount === false)
        $errors['word_count'] = 'Số từ phải là số nguyên từ 1 đến 10.000.';
    if ($errors === []) {
        $submittedArticle = ['title' => $formData['title'], 'category' => $formData['category'], 'author' => $formData['author'], 'word_count' => (int) $wordCount, 'type' => articleType((int) $wordCount)];
        $formData = ['title' => '', 'category' => '', 'author' => '', 'word_count' => ''];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="Bài tập về nhà Buổi 03 - Kiểm tra form phía server và chống XSS">
    <title>Bài tập về nhà Buổi 03 | Lập trình Web</title>
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <header class="site-header">
        <nav class="navbar container" aria-label="Điều hướng chính"><a class="brand"
                href="../../../index.php">NQM<span>.</span></a>
            <div class="nav-links session-nav"><a href="../../../index.php">Trang chủ</a><a class="active"
                    href="../../../about.php">Bài thực hành</a><a href="../../../group.php">Giới thiệu nhóm</a></div>
        </nav>
    </header>
    <main>
        <section class="page-hero container">
            <p class="eyebrow">BÀI TẬP VỀ NHÀ · BUỔI 03</p>
            <h1>Kiểm tra dữ liệu bài viết</h1>
            <p>Kiểm tra dữ liệu phía server, chuẩn hóa đầu vào và mã hóa đầu ra an toàn.</p>
        </section>
        <section class="section">
            <div class="container exercise-layout">
                <article class="card exercise-card">
                    <h2>Thông tin bài viết</h2>
                    <?php if ($errors !== []): ?>
                        <div class="result-message result-error" role="alert">Dữ liệu chưa hợp lệ. Vui lòng kiểm tra các
                            trường được đánh dấu.</div><?php endif; ?>
                    <?php if ($submittedArticle !== null): ?>
                        <div class="result-message result-success" role="status">Dữ liệu hợp lệ và đã được xử lý thành công.
                        </div><?php endif; ?>
                    <form method="post" action="index.php" novalidate>
                        <label class="form-label" for="title">Tiêu đề <span class="required-mark">*</span></label><input
                            class="form-input <?= isset($errors['title']) ? 'input-invalid' : '' ?>" id="title"
                            name="title" maxlength="150" value="<?= h($formData['title']) ?>"
                            required><?php if (isset($errors['title'])): ?>
                            <p class="field-error"><?= h($errors['title']) ?></p><?php endif; ?>
                        <label class="form-label form-label-spaced" for="category">Danh mục <span
                                class="required-mark">*</span></label><select
                            class="form-input <?= isset($errors['category']) ? 'input-invalid' : '' ?>" id="category"
                            name="category" required>
                            <option value="">-- Chọn danh mục --</option><?php foreach (CATEGORIES as $category): ?>
                                <option value="<?= h($category) ?>" <?= $formData['category'] === $category ? 'selected' : '' ?>><?= h($category) ?></option><?php endforeach; ?>
                        </select><?php if (isset($errors['category'])): ?>
                            <p class="field-error"><?= h($errors['category']) ?></p><?php endif; ?>
                        <label class="form-label form-label-spaced" for="author">Tác giả <span
                                class="required-mark">*</span></label><input
                            class="form-input <?= isset($errors['author']) ? 'input-invalid' : '' ?>" id="author"
                            name="author" maxlength="80" value="<?= h($formData['author']) ?>"
                            required><?php if (isset($errors['author'])): ?>
                            <p class="field-error"><?= h($errors['author']) ?></p><?php endif; ?>
                        <label class="form-label form-label-spaced" for="word_count">Số từ <span
                                class="required-mark">*</span></label><input
                            class="form-input <?= isset($errors['word_count']) ? 'input-invalid' : '' ?>"
                            id="word_count" name="word_count" type="number" min="1" max="10000"
                            value="<?= h($formData['word_count']) ?>"
                            required><?php if (isset($errors['word_count'])): ?>
                            <p class="field-error"><?= h($errors['word_count']) ?></p><?php endif; ?>
                        <button class="button primary form-submit" type="submit">Kiểm tra và gửi</button>
                    </form>
                </article>
                <aside class="card">
                    <h2>Quy tắc kiểm tra</h2>
                    <ul class="classification-list">
                        <li><strong>Tiêu đề:</strong> 5–150 ký tự.</li>
                        <li><strong>Danh mục:</strong> thuộc danh sách cho phép.</li>
                        <li><strong>Tác giả:</strong> 2–80 ký tự, chỉ chứa ký tự tên hợp lệ.</li>
                        <li><strong>Số từ:</strong> số nguyên từ 1–10.000.</li>
                    </ul>
                    <p>Dữ liệu được loại bỏ khoảng trắng thừa trước khi xử lý và mã hóa bằng
                        <code>htmlspecialchars()</code> trước khi hiển thị.</p>
                </aside>
            </div>
        </section>
        <?php if ($submittedArticle !== null): ?>
            <section class="section section-soft">
                <div class="container">
                    <p class="eyebrow">DỮ LIỆU ĐÃ CHUẨN HÓA</p>
                    <h2 class="section-title">Kết quả xử lý</h2>
                    <div class="table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Danh mục</th>
                                    <th>Tác giả</th>
                                    <th>Số từ</th>
                                    <th>Phân loại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= h($submittedArticle['title']) ?></td>
                                    <td><?= h($submittedArticle['category']) ?></td>
                                    <td><?= h($submittedArticle['author']) ?></td>
                                    <td><?= number_format($submittedArticle['word_count'], 0, ',', '.') ?></td>
                                    <td><span class="status-badge"><?= h($submittedArticle['type']) ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section><?php endif; ?>
        <div class="container">
            <div class="actions"><a class="button secondary" href="../index.php">← Quay lại bài tập về nhà</a></div>
        </div>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>Nguyễn Quang Minh · Bài tập về nhà Buổi 03</p>
        </div>
    </footer>
    <script src="../../../main.js"></script>
</body>

</html>
