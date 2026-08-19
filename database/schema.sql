CREATE DATABASE IF NOT EXISTS news_portal CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_unicode_ci;

USE news_portal;

CREATE TABLE
    users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(150) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        full_name VARCHAR(120) NOT NULL,
        role ENUM ('admin', 'editor', 'author') NOT NULL DEFAULT 'author',
        status ENUM ('active', 'locked') NOT NULL DEFAULT 'active',
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB;

CREATE TABLE
    categories (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        slug VARCHAR(100) NOT NULL UNIQUE,
        name VARCHAR(120) NOT NULL,
        description VARCHAR(500) NULL
    ) ENGINE = InnoDB;

CREATE TABLE
    articles (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        author_id INT UNSIGNED NOT NULL,
        category_id INT UNSIGNED NOT NULL,
        slug VARCHAR(180) NOT NULL UNIQUE,
        title VARCHAR(200) NOT NULL,
        summary VARCHAR(500) NOT NULL,
        content TEXT NOT NULL,
        thumbnail VARCHAR(255) NULL,
        status ENUM ('draft', 'published', 'archived') NOT NULL DEFAULT 'draft',
        published_at DATETIME NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        CONSTRAINT fk_articles_author FOREIGN KEY (author_id) REFERENCES users (id),
        CONSTRAINT fk_articles_category FOREIGN KEY (category_id) REFERENCES categories (id),
        INDEX idx_articles_status_published (status, published_at)
    ) ENGINE = InnoDB;

CREATE TABLE
    tags (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        slug VARCHAR(80) NOT NULL UNIQUE,
        name VARCHAR(80) NOT NULL UNIQUE
    ) ENGINE = InnoDB;

CREATE TABLE
    article_tags (
        article_id INT UNSIGNED NOT NULL,
        tag_id INT UNSIGNED NOT NULL,
        PRIMARY KEY (article_id, tag_id),
        CONSTRAINT fk_article_tags_article FOREIGN KEY (article_id) REFERENCES articles (id) ON DELETE CASCADE,
        CONSTRAINT fk_article_tags_tag FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE
    ) ENGINE = InnoDB;