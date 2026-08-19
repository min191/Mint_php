USE news_portal;

INSERT INTO
    users (email, password_hash, full_name, role)
VALUES
    (
        'admin@tintuc.vn',
        '$2y$10$demoAdminHash',
        'Nguyễn Quang Minh',
        'admin'
    ),
    (
        'linh@tintuc.vn',
        '$2y$10$demoAuthorHash',
        'Vũ Thùy Linh',
        'author'
    );

INSERT INTO
    categories (slug, name, description)
VALUES
    (
        'cong-nghe',
        'Công nghệ',
        'Tin về phần mềm và thiết bị số'
    ),
    (
        'giao-duc',
        'Giáo dục',
        'Thông tin học tập và đào tạo'
    ),
    (
        'the-thao',
        'Thể thao',
        'Tin thể thao trong nước và quốc tế'
    );

INSERT INTO
    tags (slug, name)
VALUES
    ('php', 'PHP'),
    ('mysql', 'MySQL'),
    ('sinh-vien', 'Sinh viên');

INSERT INTO
    articles (
        author_id,
        category_id,
        slug,
        title,
        summary,
        content,
        status,
        published_at
    )
VALUES
    (
        1,
        1,
        'php-ket-noi-mysql',
        'Kết nối PHP với MySQL an toàn',
        'Hướng dẫn sử dụng PDO và prepared statement.',
        'Nội dung minh họa kết nối cơ sở dữ liệu bằng PDO, xử lý lỗi và truy vấn có tham số.',
        'published',
        '2026-08-18 08:00:00'
    ),
    (
        2,
        2,
        'ky-nang-hoc-lap-trinh',
        'Kỹ năng học lập trình hiệu quả',
        'Các phương pháp thực hành dành cho sinh viên.',
        'Hãy chia bài toán thành phần nhỏ, kiểm thử thường xuyên và ghi chú điều đã học.',
        'published',
        '2026-08-19 09:30:00'
    ),
    (
        1,
        1,
        'mysql-index',
        'Tìm hiểu chỉ mục MySQL',
        'Bản nháp về cách chỉ mục hỗ trợ truy vấn.',
        'Chỉ mục tăng tốc độ đọc nhưng cũng có chi phí khi ghi dữ liệu.',
        'draft',
        NULL
    );

INSERT INTO
    article_tags (article_id, tag_id)
VALUES
    (1, 1),
    (1, 2),
    (2, 3),
    (3, 2);