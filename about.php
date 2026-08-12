<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Danh sách bài tập thực hành môn Lập trình Web">
    <title>Bài thực hành | Lập trình Web</title>
    <link rel="stylesheet" href="style.css">
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
                <a href="https://github.com/min191" target="_blank" rel="noopener noreferrer">GitHub</a>
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
                <h2 class="section-title">Bài tập theo hình thức</h2>
                <div class="card-grid three-columns practice-grid">
                    <article class="card practice-card">
                        <span class="card-number">01</span>
                        <h3>Bài tập trên lớp</h3>
                        <p>Danh sách bài thực hành được thực hiện trong từng buổi học.</p>
                        <a class="text-link" href="practice/bai-tap-tren-lop/index.php">Xem bài tập trên lớp →</a>
                    </article>
                    <article class="card practice-card">
                        <span class="card-number">02</span>
                        <h3>Bài tập về nhà</h3>
                        <p>Danh sách bài tập về nhà của học phần Lập trình Web.</p>
                        <a class="text-link" href="practice/bai-tap-ve-nha/index.php">Xem bài tập về nhà →</a>
                    </article>
                </div>
            </div>
        </section>
        <section class="section section-soft" id="repository">
            <div class="container">
                <p class="eyebrow">MÃ NGUỒN</p>
                <h2 class="section-title">Repository</h2>
                <div class="repository-list">
                    <div><strong>GitHub Profile</strong><a href="https://github.com/min191" target="_blank"
                            rel="noopener noreferrer">github.com/min191</a></div>
                    <div><strong>Repository cá nhân</strong><a href="https://github.com/min191/Mint_php.git"
                            target="_blank" rel="noopener noreferrer">https://github.com/min191/Mint_php.git</a></div>
                    <div><strong>Repository nhóm</strong><a href="https://github.com/min191/final_web_php.git"
                            target="_blank" rel="noopener noreferrer">https://github.com/min191/final_web_php.git</a>
                    </div>
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