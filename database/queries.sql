USE news_portal;

-- 1. Bài đã xuất bản kèm tác giả và danh mục.
SELECT
    a.id,
    a.title,
    c.name AS category_name,
    u.full_name AS author_name,
    a.published_at
FROM
    articles a
    JOIN categories c ON c.id = a.category_id
    JOIN users u ON u.id = a.author_id
WHERE
    a.status = 'published'
ORDER BY
    a.published_at DESC;

-- 2. Tìm bài theo từ khóa trong tiêu đề.
SELECT
    id,
    title,
    summary
FROM
    articles
WHERE
    status = 'published'
    AND title LIKE '%PHP%'
ORDER BY
    published_at DESC;

-- 3. Số bài đã xuất bản từng danh mục, kể cả danh mục chưa có bài.
SELECT
    c.id,
    c.name,
    COUNT(a.id) AS published_count
FROM
    categories c
    LEFT JOIN articles a ON a.category_id = c.id
    AND a.status = 'published'
GROUP BY
    c.id,
    c.name
ORDER BY
    published_count DESC,
    c.name;

-- 4. Các thẻ của từng bài.
SELECT
    a.title,
    GROUP_CONCAT (
        t.name
        ORDER BY
            t.name SEPARATOR ', '
    ) AS tags
FROM
    articles a
    LEFT JOIN article_tags atg ON atg.article_id = a.id
    LEFT JOIN tags t ON t.id = atg.tag_id
GROUP BY
    a.id,
    a.title
ORDER BY
    a.id;