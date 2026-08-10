<?php
$group = ['name' => 'Nhóm 5', 'course' => 'Lập trình Web', 'lecturer' => 'Trần Thị Thu Phương', 'repository' => 'https://github.com/min191/final_web_php.git'];
$members = [
    ['student_id' => '223001787', 'name' => 'Tạ Đức Sơn', 'initials' => 'TĐS'],
    ['student_id' => '222001474', 'name' => 'Nguyễn Quang Minh', 'initials' => 'NQM'],
    ['student_id' => '223001753', 'name' => 'Vũ Thùy Linh', 'initials' => 'VTL'],
    ['student_id' => '222001519', 'name' => 'Đỗ Quốc Vượng', 'initials' => 'ĐQV'],
];
$features = ['Trang chủ', 'Danh sách tin tức', 'Tin tức theo danh mục', 'Chi tiết bài viết', 'Tìm kiếm bài viết', 'Quản lý danh mục', 'Quản lý bài viết', 'Quản lý người dùng', 'Đăng nhập', 'Phân quyền quản trị viên', 'Upload hình ảnh', 'Responsive'];
$technologies = ['PHP', 'MySQL', 'HTML5', 'CSS3', 'JavaScript'];
$githubProfile = 'https://github.com/min191';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Thông tin nhóm và đề tài Website Tin Tức">
    <title>Giới thiệu nhóm | Website Tin Tức</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <nav class="navbar container" aria-label="Điều hướng chính"><a class="brand"
                href="index.php">NQM<span>.</span></a><button class="menu-toggle" type="button" aria-expanded="false"
                aria-controls="main-menu">Menu</button>
            <div class="nav-links" id="main-menu"><a href="index.php">Trang chủ</a><a href="about.php">Bài thực
                    hành</a><a class="active" href="group.php">Giới thiệu nhóm</a><a
                    href="<?= htmlspecialchars($githubProfile) ?>" target="_blank" rel="noopener noreferrer">GitHub</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="page-hero container">
            <p class="eyebrow">BÀI TẬP NHÓM</p>
            <h1><?= htmlspecialchars($group['name']) ?></h1>
            <p>Học phần <?= htmlspecialchars($group['course']) ?></p>
        </section>
        <section class="section">
            <div class="container group-overview">
                <article>
                    <p class="eyebrow">GIỚI THIỆU NHÓM</p>
                    <h2 class="section-title">Thông tin chung</h2>
                    <p>Nhóm đang xây dựng đề tài thực hành trong học phần Lập trình Web, tập trung áp dụng kiến thức
                        PHP, MySQL và kỹ thuật xây dựng giao diện responsive.</p>
                </article>
                <aside class="card">
                    <dl class="details">
                        <div>
                            <dt>Tên nhóm</dt>
                            <dd><?= htmlspecialchars($group['name']) ?></dd>
                        </div>
                        <div>
                            <dt>Môn học</dt>
                            <dd><?= htmlspecialchars($group['course']) ?></dd>
                        </div>
                        <div>
                            <dt>Giảng viên</dt>
                            <dd><?= $group['lecturer'] ? htmlspecialchars($group['lecturer']) : 'Chưa cập nhật' ?></dd>
                        </div>
                        <div>
                            <dt>Repository nhóm</dt>
                            <dd><a href="<?= htmlspecialchars($group['repository']) ?>" target="_blank" rel="noopener noreferrer">Xem repository nhóm</a>
                            </dd>
                        </div>
                    </dl>
                </aside>
            </div>
        </section>
        <section class="section section-soft">
            <div class="container">
                <p class="eyebrow">THÀNH VIÊN</p>
                <h2 class="section-title">Đội ngũ</h2>
                <div class="member-list"><?php foreach ($members as $member): ?>
                        <div class="member-card">
                            <div class="small-avatar" aria-hidden="true"><?= htmlspecialchars($member['initials']) ?></div>
                            <div>
                                <h3><?= htmlspecialchars($member['name']) ?></h3>
                                <p>Mã sinh viên: <?= htmlspecialchars($member['student_id']) ?></p>
                            </div>
                        </div><?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <p class="eyebrow">ĐỀ TÀI DỰ KIẾN</p>
                <h2 class="section-title">Website Tin Tức</h2>
                <p class="lead narrow">Xây dựng website tin tức cho phép người dùng xem bài viết theo danh mục và hỗ trợ
                    quản trị viên quản lý nội dung.</p>
                <div class="topic-layout">
                    <article class="card">
                        <h3>Chức năng dự kiến</h3>
                        <ul class="feature-grid"><?php foreach ($features as $feature): ?>
                                <li><?= htmlspecialchars($feature) ?></li><?php endforeach; ?>
                        </ul>
                    </article>
                    <aside class="card">
                        <h3>Công nghệ</h3>
                        <div class="tag-list large-tags">
                            <?php foreach ($technologies as $technology): ?><span><?= htmlspecialchars($technology) ?></span><?php endforeach; ?>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>© <?= date('Y') ?> Nhóm 5 · Lập trình Web</p>
        </div>
    </footer>
    <script src="assets/js/main.js"></script>
</body>

</html>
