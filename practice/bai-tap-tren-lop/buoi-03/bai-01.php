<?php
declare(strict_types=1);
$values = ['full_name' => '', 'email' => '', 'subject' => 'Hỗ trợ kỹ thuật', 'message' => ''];
$errors = [];
$successMessage = '';
$allowedSubjects = ['Hỗ trợ kỹ thuật', 'Tư vấn dịch vụ', 'Góp ý', 'Khác'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (array_keys($values) as $field)
        $values[$field] = trim((string) ($_POST[$field] ?? ''));
    if ($values['full_name'] === '')
        $errors['full_name'] = 'Vui lòng nhập họ tên.';
    if ($values['email'] === '')
        $errors['email'] = 'Vui lòng nhập email.';
    elseif (!filter_var($values['email'], FILTER_VALIDATE_EMAIL))
        $errors['email'] = 'Email không đúng định dạng.';
    $length = function_exists('mb_strlen') ? mb_strlen($values['message'], 'UTF-8') : strlen($values['message']);
    if ($values['message'] === '')
        $errors['message'] = 'Vui lòng nhập nội dung.';
    elseif ($length < 10 || $length > 500)
        $errors['message'] = 'Nội dung phải từ 10 đến 500 ký tự.';
    if (!in_array($values['subject'], $allowedSubjects, true))
        $values['subject'] = $allowedSubjects[0];
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['avatar']['error'] !== UPLOAD_ERR_OK)
            $errors['avatar'] = 'Không thể tải ảnh lên. Vui lòng thử lại.';
        elseif ($_FILES['avatar']['size'] > 2 * 1024 * 1024)
            $errors['avatar'] = 'Ảnh không được lớn hơn 2 MB.';
        else {
            $info = @getimagesize($_FILES['avatar']['tmp_name']);
            if ($info === false || !in_array($info['mime'], ['image/jpeg', 'image/png', 'image/gif', 'image/webp'], true))
                $errors['avatar'] = 'Chỉ chấp nhận ảnh JPG, PNG, GIF hoặc WEBP.';
        }
    }
    if ($errors === []) {
        $successMessage = 'Gửi liên hệ thành công! Cảm ơn bạn đã để lại thông tin.';
        $values = ['full_name' => '', 'email' => '', 'subject' => $allowedSubjects[0], 'message' => ''];
    }
}
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bài 1 buổi 03 - Form liên hệ và kiểm tra dữ liệu bằng PHP">
    <title>Bài 1: Form liên hệ | Buổi 03</title>
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <header class="site-header">
        <nav class="navbar container" aria-label="Điều hướng chính">
            <a class="brand" href="../../../index.php">NQM<span>.</span></a>
            <div class="nav-links session-nav">
                <a href="../../../index.php">Trang chủ</a>
                <a class="active" href="../../../about.php">Bài thực hành</a>
                <a href="../../../group.php">Giới thiệu nhóm</a>
            </div>
        </nav>
    </header>
    <main class="contact-page">
        <section class="page-hero container contact-hero">
            <p class="eyebrow">BÀI TẬP TRÊN LỚP · BUỔI 03 · BÀI 01</p>
            <h1>Form liên hệ</h1>
            <p>Nhập đầy đủ thông tin bên dưới để gửi yêu cầu liên hệ.</p>
        </section>
        <section class="section contact-section">
            <div class="container contact-container">
                <div class="contact-card">
                    <?php if ($successMessage !== ''): ?>
                        <div class="form-alert form-alert-success" role="status"><?= e($successMessage) ?></div>
                    <?php elseif ($errors !== []): ?>
                        <div class="form-alert form-alert-error" role="alert">Thông tin chưa hợp lệ. Vui lòng kiểm tra các
                            mục bên dưới.</div><?php endif; ?>
                    <form method="post" enctype="multipart/form-data" novalidate>
                        <div class="form-group"><label for="full_name">Họ tên <span>*</span></label><input
                                id="full_name" name="full_name" type="text" value="<?= e($values['full_name']) ?>"
                                class="<?= isset($errors['full_name']) ? 'is-invalid' : '' ?>" autocomplete="name"
                                required><?php if (isset($errors['full_name'])): ?>
                                <p class="field-error"><?= e($errors['full_name']) ?></p><?php endif; ?>
                        </div>
                        <div class="form-group"><label for="email">Email <span>*</span></label><input id="email"
                                name="email" type="email" value="<?= e($values['email']) ?>"
                                class="<?= isset($errors['email']) ? 'is-invalid' : '' ?>" autocomplete="email"
                                required><?php if (isset($errors['email'])): ?>
                                <p class="field-error"><?= e($errors['email']) ?></p><?php endif; ?>
                        </div>
                        <div class="form-group"><label for="subject">Chủ đề</label><select id="subject"
                                name="subject"><?php foreach ($allowedSubjects as $subject): ?>
                                    <option value="<?= e($subject) ?>" <?= $values['subject'] === $subject ? 'selected' : '' ?>><?= e($subject) ?></option><?php endforeach; ?>
                            </select></div>
                        <div class="form-group"><label for="avatar">Ảnh đại diện</label><input id="avatar" name="avatar"
                                type="file" accept="image/jpeg,image/png,image/gif,image/webp"
                                class="file-input <?= isset($errors['avatar']) ? 'is-invalid' : '' ?>">
                            <p class="field-hint">JPG, PNG, GIF hoặc WEBP · tối đa 2 MB.</p>
                            <?php if (isset($errors['avatar'])): ?>
                                <p class="field-error"><?= e($errors['avatar']) ?></p><?php endif; ?>
                        </div>
                        <div class="form-group"><label for="message">Nội dung <span>*</span></label><textarea
                                id="message" name="message" rows="6" maxlength="500"
                                class="<?= isset($errors['message']) ? 'is-invalid' : '' ?>"
                                placeholder="Nhập nội dung liên hệ..." required><?= e($values['message']) ?></textarea>
                            <div class="message-meta"><?php if (isset($errors['message'])): ?>
                                    <p class="field-error"><?= e($errors['message']) ?></p><?php else: ?>
                                    <p class="field-hint">Từ 10 đến 500 ký tự.</p><?php endif; ?><span
                                    id="characterCount">0/500</span>
                            </div>
                        </div>
                        <button class="button primary submit-button" type="submit">Gửi liên hệ</button>
                    </form>
                </div>
                <div class="actions"><a class="button secondary" href="index.php">← Quay lại Buổi 03</a></div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>Nguyễn Quang Minh · Buổi 03 · Bài 01</p>
        </div>
    </footer>
    <script>const message = document.getElementById('message'), counter = document.getElementById('characterCount'); function updateCount() { counter.textContent = `${message.value.length}/500` } message.addEventListener('input', updateCount); updateCount();</script>
</body>

</html>