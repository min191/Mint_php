<?php
$githubProfile = 'https://github.com/min191';
$personalRepository = 'https://github.com/min191/Mint_php.git';
$groupRepository = 'https://github.com/min191/final_web_php.git';
$practiceSessions = [];

for ($number = 1; $number <= 9; $number++) {
    $sessionNumber = str_pad((string) $number, 2, '0', STR_PAD_LEFT);
    $practiceSessions[] = [
        'number' => $sessionNumber,
        'title' => 'Buổi ' . $sessionNumber,
        'description' => 'Nội dung thực hành sẽ được cập nhật sau.',
        'url' => 'practice/buoi-' . $sessionNumber . '/index.php',
    ];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Danh sách bài tập thực hành môn Lập trình Web">
    <title>Bài thực hành | Lập trình Web</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <nav class="navbar container" aria-label="Điều hướng chính">
        <a class="brand" href="index.php">NQM<span>.</span></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-menu">Menu</button>
        <div class="nav-links" id="main-menu">
            <a href="index.php">Trang chủ</a>
            <a class="active" href="about.php">Bài thực hành</a>
            <a href="group.php">Giới thiệu nhóm</a>
            <a href="<?= htmlspecialchars($githubProfile) ?>" target="_blank" rel="noopener noreferrer">GitHub</a>
        </div>
    </nav>
</header>
<main>
    <section class="page-hero container">
        <p class="eyebrow">LẬP TRÌNH WEB</p>
        <h1>Bài tập từng buổi</h1>
        <p>Nơi tổng hợp nội dung thực hành từ Buổi 01 đến Buổi 09.</p>
    </section>
    <section class="section">
        <div class="container">
            <p class="eyebrow">DANH SÁCH BÀI TẬP</p>
            <h2 class="section-title">9 buổi thực hành</h2>
            <div class="card-grid three-columns practice-grid">
                <?php foreach ($practiceSessions as $session): ?>
                    <article class="card practice-card">
                        <span class="card-number"><?= htmlspecialchars($session['number']) ?></span>
                        <h3><?= htmlspecialchars($session['title']) ?></h3>
                        <p><?= htmlspecialchars($session['description']) ?></p>
                        <a class="text-link" href="<?= htmlspecialchars($session['url']) ?>">Mở bài thực hành →</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section-soft" id="repository">
        <div class="container">
            <p class="eyebrow">MÃ NGUỒN</p>
            <h2 class="section-title">Repository</h2>
            <div class="repository-list">
                <div><strong>GitHub Profile</strong><a href="<?= htmlspecialchars($githubProfile) ?>" target="_blank" rel="noopener noreferrer">github.com/min191</a></div>
                <div><strong>Repository cá nhân</strong><a href="<?= htmlspecialchars($personalRepository) ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($personalRepository) ?></a></div>
                <div><strong>Repository nhóm</strong><a href="<?= htmlspecialchars($groupRepository) ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($groupRepository) ?></a></div>
            </div>
        </div>
    </section>
</main>
<footer class="site-footer"><div class="container"><p>© <?= date('Y') ?> Nguyễn Quang Minh · Bài thực hành Lập trình Web</p></div></footer>
<script src="assets/js/main.js"></script>
</body>
</html>
