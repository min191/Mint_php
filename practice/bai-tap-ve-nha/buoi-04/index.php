<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Bài tập về nhà Buổi 04</title>
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <header class="site-header">
        <nav class="navbar container"><a class="brand" href="../../../index.php">NQM<span>.</span></a>
            <div class="nav-links session-nav"><a href="../../../index.php">Trang chủ</a><a class="active"
                    href="../../../about.php">Bài thực hành</a><a href="../../../group.php">Giới thiệu nhóm</a></div>
        </nav>
    </header>
    <main>
        <section class="page-hero container">
            <p class="eyebrow">BÀI TẬP VỀ NHÀ · BUỔI 04</p>
            <h1>CSDL Website Tin Tức</h1>
            <p>ERD cá nhân, schema, dữ liệu mẫu tiếng Việt và các truy vấn SQL kiểm thử.</p>
        </section>
        <section class="section">
            <div class="container">
                <div class="card-grid three-columns practice-grid">
                    <article class="card"><span class="card-number">01</span>
                        <h2>ERD cá nhân</h2>
                        <p>Phần quản lý bài viết gồm tác giả, danh mục, bài viết, thẻ và bảng liên kết bài viết-thẻ.</p>
                        <a class="text-link" href="../../bai-tap-tren-lop/buoi-04/bai-01.php">Xem ERD →</a>
                    </article>
                    <article class="card"><span class="card-number">02</span>
                        <h2>Schema & Seed</h2>
                        <p>DDL MySQL có PK, FK, UNIQUE, InnoDB và utf8mb4; dữ liệu mẫu hoàn toàn bằng tiếng Việt.</p><a
                            class="text-link" href="../../../database/schema.sql">Mở schema.sql →</a><br><a
                            class="text-link" href="../../../database/seed.sql">Mở seed.sql →</a>
                    </article>
                    <article class="card"><span class="card-number">03</span>
                        <h2>Truy vấn</h2>
                        <p>4 truy vấn gồm JOIN, WHERE, LEFT JOIN, GROUP BY và GROUP_CONCAT.</p><a class="text-link"
                            href="../../../database/queries.sql">Mở queries.sql →</a>
                    </article>
                </div>
                <div class="card">
                    <h2>Ba truy vấn bắt buộc</h2>
                    <ol>
                        <li>Liệt kê bài đã xuất bản kèm tác giả và danh mục bằng hai <code>JOIN</code>.</li>
                        <li>Tìm bài đã xuất bản có tiêu đề chứa từ khóa “PHP” bằng <code>WHERE</code>.</li>
                        <li>Đếm số bài đã xuất bản theo danh mục bằng <code>LEFT JOIN</code> và <code>GROUP BY</code>,
                            vẫn giữ danh mục chưa có bài.</li>
                    </ol>
                    <p>Đã bổ sung truy vấn thứ tư để gom danh sách thẻ của từng bài.</p>
                </div>
                <div class="actions"><a class="button secondary" href="../index.php">← Quay lại bài tập về nhà</a></div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>Nguyễn Quang Minh · Bài tập về nhà Buổi 04</p>
        </div>
    </footer>
</body>

</html>