<!DOCTYPE html>
<html lang="vi">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width,initial-scale=1">
     <title>ERD Website Tin Tức | Buổi 04</title>
     <link rel="stylesheet" href="../../../style.css">
</head>

<body>
     <header class="site-header">
          <nav class="navbar container"><a class="brand" href="../../../index.php">NQM<span>.</span></a>
               <div class="nav-links session-nav"><a href="../../../index.php">Trang chủ</a><a class="active"
                         href="../../../about.php">Bài thực hành</a><a href="../../../group.php">Giới thiệu nhóm</a>
               </div>
          </nav>
     </header>
     <main>
          <section class="page-hero container">
               <p class="eyebrow">BÀI TRÊN LỚP · BUỔI 04</p>
               <h1>ERD Website Tin Tức</h1>
               <p>Thiết kế cơ sở dữ liệu phục vụ đăng bài, phân loại và gắn thẻ nội dung.</p>
          </section>
          <section class="section">
               <div class="container">
                    <h2 class="section-title">5 bảng chính</h2>
                    <div class="card-grid three-columns practice-grid">
                         <article class="card">
                              <h3>users</h3>
                              <p><strong>PK:</strong> id</p>
                              <p>email (UNIQUE), password_hash, full_name, role, status, created_at</p>
                         </article>
                         <article class="card">
                              <h3>categories</h3>
                              <p><strong>PK:</strong> id</p>
                              <p>slug (UNIQUE), name, description</p>
                         </article>
                         <article class="card">
                              <h3>articles</h3>
                              <p><strong>PK:</strong> id<br><strong>FK:</strong> author_id, category_id</p>
                              <p>slug (UNIQUE), title, summary, content, thumbnail, status, published_at</p>
                         </article>
                         <article class="card">
                              <h3>tags</h3>
                              <p><strong>PK:</strong> id</p>
                              <p>slug (UNIQUE), name (UNIQUE)</p>
                         </article>
                         <article class="card">
                              <h3>article_tags</h3>
                              <p><strong>PK/FK:</strong> article_id + tag_id</p>
                              <p>Bảng trung gian biểu diễn quan hệ nhiều-nhiều.</p>
                         </article>
                    </div>
               </div>
          </section>
          <section class="section section-soft">
               <div class="container">
                    <h2 class="section-title">Quan hệ và ràng buộc</h2>
                    <div class="card">
                         <pre>users 1 --- N articles N --- 1 categories
                     |
                article_tags
                     |
                   tags</pre>
                         <ul>
                              <li>Email và các slug không được trùng.</li>
                              <li>Mỗi bài phải có tác giả và danh mục tồn tại.</li>
                              <li>Cặp <code>(article_id, tag_id)</code> là duy nhất.</li>
                              <li>Không lưu <code>word_count</code>, <code>reading_time</code>,
                                   <code>article_count</code> vì có thể tính được.</li>
                         </ul>
                    </div>
                    <div class="actions"><a class="button primary" href="../../bai-tap-ve-nha/buoi-04/index.php">Xem bài
                              về nhà →</a><a class="button secondary" href="index.php">← Quay lại</a></div>
               </div>
          </section>
     </main>
     <footer class="site-footer">
          <div class="container">
               <p>Nguyễn Quang Minh · Buổi 04</p>
          </div>
     </footer>
</body>

</html>