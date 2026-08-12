<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio sinh viên Công nghệ thông tin Nguyễn Quang Minh">
    <title>Nguyễn Quang Minh | Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="site-header">
        <nav class="navbar container" aria-label="Điều hướng chính">
            <a class="brand" href="index.php">NQM<span>.</span></a>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-menu">Menu</button>
            <div class="nav-links" id="main-menu">
                <a class="active" href="index.php">Trang chủ</a>
                <a href="about.php">Bài thực hành</a>
                <a href="group.php">Giới thiệu nhóm</a>
                <a href="https://github.com/min191" target="_blank" rel="noopener noreferrer">GitHub</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero container">
            <div class="hero-copy">
                <p class="eyebrow">PORTFOLIO · LẬP TRÌNH WEB</p>
                <h1>Xin chào, mình là<br><span>Nguyễn Quang Minh</span></h1>
                <p class="lead">Sinh viên Công nghệ thông tin theo định hướng Web Development, yêu thích việc xây dựng
                    những sản phẩm web rõ ràng, hữu ích và thân thiện với người dùng.</p>
                <div class="actions">
                    <a class="button primary" href="about.php">Xem bài thực hành</a>
                    <a class="button secondary" href="group.php">Xem thông tin nhóm</a>
                </div>
            </div>
            <aside class="profile-card hero-card">
                <div class="avatar" aria-hidden="true">NQM</div>
                <p class="status"><span></span> Sẵn sàng học hỏi</p>
                <h2>Web Developer</h2>
                <p class="technology-list">PHP · MySQL · JavaScript</p>
                <div class="mini-stats">
                    <div><strong>9</strong><span>Buổi thực hành</span></div>
                    <div><strong>2</strong><span>Hình thức bài tập</span></div>
                </div>
            </aside>
        </section>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">KHÁM PHÁ</p>
                    <h2 class="section-title">Nội dung chính</h2>
                    <p>Truy cập nhanh bài tập cá nhân, thông tin nhóm và mã nguồn dự án.</p>
                </div>
                <div class="card-grid three-columns home-card-grid">
                    <article class="card home-card"><span class="card-number">01</span>
                        <h3>Bài thực hành</h3>
                        <p>Bài tập trên lớp và bài tập về nhà được sắp xếp theo từng buổi học.</p><a class="text-link"
                            href="about.php">Xem danh sách →</a>
                    </article>
                    <article class="card home-card"><span class="card-number">02</span>
                        <h3>Thông tin nhóm</h3>
                        <p>Giới thiệu nhóm và đề tài Website Tin Tức dự kiến.</p><a class="text-link"
                            href="group.php">Xem chi tiết →</a>
                    </article>
                    <article class="card home-card"><span class="card-number">03</span>
                        <h3>GitHub</h3>
                        <p>Theo dõi các repository và quá trình học tập của mình.</p><a class="text-link"
                            href="https://github.com/min191" target="_blank" rel="noopener noreferrer">Mở
                            GitHub →</a>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p> Nguyễn Quang Minh · Bài thực hành Lập trình Web</p>
        </div>
    </footer>
    <script src="main.js"></script>
</body>

</html>
