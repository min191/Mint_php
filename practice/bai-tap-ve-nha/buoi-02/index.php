<?php
session_start();

function determineArticleType(int $wordCount): string
{
    if ($wordCount < 300) {
        return 'Tin ngắn';
    }
    if ($wordCount <= 800) {
        return 'Bài tiêu chuẩn';
    }
    return 'Bài chuyên sâu';
}

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if (!isset($_SESSION['homework_b2_articles'])) {
    $_SESSION['homework_b2_articles'] = [];
}

$articles = &$_SESSION['homework_b2_articles'];
$errors = [];
$formData = [
    'title' => '',
    'category' => '',
    'author' => '',
    'word_count' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'add';

    if ($action === 'clear') {
        $articles = [];
        header('Location: index.php');
        exit;
    }

    $formData = [
        'title' => trim($_POST['title'] ?? ''),
        'category' => trim($_POST['category'] ?? ''),
        'author' => trim($_POST['author'] ?? ''),
        'word_count' => trim($_POST['word_count'] ?? ''),
    ];

    $allowedCategories = ['Công nghệ', 'Giáo dục', 'Thể thao', 'Đời sống'];

    if ($formData['title'] === '') {
        $errors[] = 'Vui lòng nhập tiêu đề bài viết.';
    }
    if (!in_array($formData['category'], $allowedCategories, true)) {
        $errors[] = 'Vui lòng chọn danh mục hợp lệ.';
    }
    if ($formData['author'] === '') {
        $errors[] = 'Vui lòng nhập tên tác giả.';
    }
    if (filter_var($formData['word_count'], FILTER_VALIDATE_INT) === false || (int) $formData['word_count'] <= 0) {
        $errors[] = 'Số từ phải là một số nguyên lớn hơn 0.';
    }

    if ($errors === []) {
        $wordCount = (int) $formData['word_count'];
        $articles[] = [
            'title' => $formData['title'],
            'category' => $formData['category'],
            'author' => $formData['author'],
            'word_count' => $wordCount,
            'type' => determineArticleType($wordCount),
        ];
        header('Location: index.php?added=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bài tập về nhà Buổi 02 - Quản lý bài viết tin tức">
    <title>Bài tập về nhà Buổi 02 | Lập trình Web</title>
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
        <p class="eyebrow">BÀI TẬP VỀ NHÀ · BUỔI 02</p>
        <h1>Quản lý bài viết tin tức</h1>
        <p>Nhập thông tin bài viết, phân loại theo độ dài và hiển thị danh sách bằng PHP.</p>
    </section>

    <section class="section">
        <div class="container exercise-layout">
            <article class="card exercise-card">
                <h2>Thêm bài viết</h2>

                <?php if ($errors !== []): ?>
                    <div class="result-message result-error" role="alert">
                        <ul class="message-list">
                            <?php foreach ($errors as $error): ?>
                                <li><?= escape($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php elseif (isset($_GET['added'])): ?>
                    <div class="result-message result-success" role="status">Đã thêm bài viết thành công.</div>
                <?php endif; ?>

                <form method="post" action="index.php">
                    <input type="hidden" name="action" value="add">

                    <label class="form-label" for="title">Tiêu đề</label>
                    <input class="form-input" id="title" name="title" type="text"
                        value="<?= escape($formData['title']) ?>" placeholder="Nhập tiêu đề bài viết" required>

                    <label class="form-label form-label-spaced" for="category">Danh mục</label>
                    <select class="form-input" id="category" name="category" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach (['Công nghệ', 'Giáo dục', 'Thể thao', 'Đời sống'] as $category): ?>
                            <option value="<?= escape($category) ?>" <?= $formData['category'] === $category ? 'selected' : '' ?>>
                                <?= escape($category) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label class="form-label form-label-spaced" for="author">Tác giả</label>
                    <input class="form-input" id="author" name="author" type="text"
                        value="<?= escape($formData['author']) ?>" placeholder="Nhập tên tác giả" required>

                    <label class="form-label form-label-spaced" for="word_count">Số từ</label>
                    <input class="form-input" id="word_count" name="word_count" type="number" min="1"
                        value="<?= escape($formData['word_count']) ?>" placeholder="Ví dụ: 500" required>

                    <button class="button primary form-submit" type="submit">Thêm bài viết</button>
                </form>
            </article>

            <aside class="card">
                <h2>Quy tắc phân loại</h2>
                <ul class="classification-list">
                    <li><strong>Dưới 300 từ:</strong> Tin ngắn</li>
                    <li><strong>Từ 300 đến 800 từ:</strong> Bài tiêu chuẩn</li>
                    <li><strong>Trên 800 từ:</strong> Bài chuyên sâu</li>
                </ul>
                <p>Dữ liệu được lưu tạm trong phiên làm việc để có thể thêm nhiều bài và duyệt bằng vòng lặp.</p>
            </aside>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <div class="section-heading-row">
                <div>
                    <p class="eyebrow">KẾT QUẢ</p>
                    <h2 class="section-title">Danh sách bài viết</h2>
                </div>
                <?php if ($articles !== []): ?>
                    <form method="post" action="index.php">
                        <input type="hidden" name="action" value="clear">
                        <button class="button secondary button-reset" type="submit">Xóa danh sách</button>
                    </form>
                <?php endif; ?>
            </div>

            <?php if ($articles === []): ?>
                <div class="empty-state light-empty-state">Chưa có bài viết. Hãy nhập dữ liệu ở biểu mẫu phía trên.</div>
            <?php else: ?>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Tác giả</th>
                                <th>Số từ</th>
                                <th>Phân loại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $index => $article): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= escape($article['title']) ?></td>
                                    <td><?= escape($article['category']) ?></td>
                                    <td><?= escape($article['author']) ?></td>
                                    <td><?= number_format($article['word_count'], 0, ',', '.') ?></td>
                                    <td><span class="status-badge"><?= escape($article['type']) ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <div class="actions"><a class="button secondary" href="../index.php">← Quay lại bài tập về nhà</a></div>
        </div>
    </section>
</main>
<footer class="site-footer"><div class="container"><p>Nguyễn Quang Minh · Bài tập về nhà Buổi 02</p></div></footer>
<script src="../../../main.js"></script>
</body>
</html>
