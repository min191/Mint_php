<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Thông tin nhóm và đề tài Website Tin Tức">
    <title>Giới thiệu nhóm | Website Tin Tức</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="site-header">
        <nav class="navbar container" aria-label="Điều hướng chính"><a class="brand"
                href="index.php">NQM<span>.</span></a><button class="menu-toggle" type="button" aria-expanded="false"
                aria-controls="main-menu">Menu</button>
            <div class="nav-links" id="main-menu"><a href="index.php">Trang chủ</a><a href="about.php">Bài thực
                    hành</a><a class="active" href="group.php">Giới thiệu nhóm</a><a href="https://github.com/min191"
                    target="_blank" rel="noopener noreferrer">GitHub</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="page-hero container">
            <p class="eyebrow">BÀI TẬP NHÓM</p>
            <h1>Nhóm 5</h1>
            <p>Học phần Lập trình Web</p>
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
                            <dd>Nhóm 5</dd>
                        </div>
                        <div>
                            <dt>Môn học</dt>
                            <dd>Lập trình Web</dd>
                        </div>
                        <div>
                            <dt>Giảng viên</dt>
                            <dd>Trần Thị Thu Phương</dd>
                        </div>
                        <div>
                            <dt>Repository nhóm</dt>
                            <dd><a href="https://github.com/min191/final_web_php.git" target="_blank"
                                    rel="noopener noreferrer">Xem repository nhóm</a>
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
                <div class="member-list">
                    <div class="member-card">
                        <div class="small-avatar" aria-hidden="true">TĐS</div>
                        <div>
                            <h3>Tạ Đức Sơn</h3>
                            <p>Mã sinh viên: 223001787</p>
                        </div>
                    </div>
                    <div class="member-card">
                        <div class="small-avatar" aria-hidden="true">NQM</div>
                        <div>
                            <h3>Nguyễn Quang Minh</h3>
                            <p>Mã sinh viên: 222001474</p>
                        </div>
                    </div>
                    <div class="member-card">
                        <div class="small-avatar" aria-hidden="true">VTL</div>
                        <div>
                            <h3>Vũ Thùy Linh</h3>
                            <p>Mã sinh viên: 223001753</p>
                        </div>
                    </div>
                    <div class="member-card">
                        <div class="small-avatar" aria-hidden="true">ĐQV</div>
                        <div>
                            <h3>Đỗ Quốc Vượng</h3>
                            <p>Mã sinh viên: 222001519</p>
                        </div>
                    </div>
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
                        <ul class="feature-grid">
                            <li>Trang chủ</li>
                            <li>Danh sách tin tức</li>
                            <li>Tin tức theo danh mục</li>
                            <li>Chi tiết bài viết</li>
                            <li>Tìm kiếm bài viết</li>
                            <li>Quản lý danh mục</li>
                            <li>Quản lý bài viết</li>
                            <li>Quản lý người dùng</li>
                            <li>Đăng nhập</li>
                            <li>Phân quyền quản trị viên</li>
                            <li>Upload hình ảnh</li>
                            <li>Responsive</li>
                        </ul>
                    </article>
                    <aside class="card">
                        <h3>Công nghệ</h3>
                        <div class="tag-list large-tags">
                            <span>PHP</span><span>MySQL</span><span>HTML5</span><span>CSS3</span><span>JavaScript</span>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p> Nguyễn Quang Minh · Bài thực hành Lập trình Web</p>
        </div>
    </footer>
    <script src="assets/js/main.js"></script>
</body>

</html>