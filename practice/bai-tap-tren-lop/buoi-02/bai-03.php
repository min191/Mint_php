<?php
$students = [
    ['name' => 'Nguyễn Quang Minh', 'midterm' => 8, 'final' => 7.5],
    ['name' => 'Nguyễn Văn A', 'midterm' => 6, 'final' => 5.5],
    ['name' => 'Lê Hoàng B', 'midterm' => 4, 'final' => 4.5],
];

function calculateAverage(float $midterm, float $final): float
{
    return ($midterm + $final) / 2;
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bài 3 - Bảng điểm 3 sinh viên">
    <title>Bài 3: Bảng điểm sinh viên | Buổi 02</title>
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
    <main>
        <section class="page-hero container">
            <p class="eyebrow">BÀI TẬP TRÊN LỚP · BUỔI 02</p>
            <h1>Bài 3: Bảng điểm sinh viên</h1>
            <p>Tính điểm trung bình và xác định kết quả học tập của 3 sinh viên.</p>
        </section>

        <section class="section">
            <div class="container">
                <div class="table-wrapper">
                    <table class="data-table student-score-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Giữa kỳ</th>
                                <th>Cuối kỳ</th>
                                <th>Trung bình</th>
                                <th>Kết quả</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $index => $student): ?>
                                <?php
                                $average = calculateAverage($student['midterm'], $student['final']);
                                $passed = $average >= 5;
                                ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= number_format($student['midterm'], 1) ?></td>
                                    <td><?= number_format($student['final'], 1) ?></td>
                                    <td><strong><?= number_format($average, 1) ?></strong></td>
                                    <td>
                                        <span
                                            class="result-badge <?= $passed ? 'result-badge-pass' : 'result-badge-fail' ?>">
                                            <?= $passed ? 'Đạt' : 'Chưa đạt' ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="actions">
                    <a class="button secondary" href="index.php">← Quay lại bài tập Buổi 02</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <p>Nguyễn Quang Minh · Buổi 02 · Bài 03</p>
        </div>
    </footer>
    <script src="../../../main.js"></script>
</body>

</html>