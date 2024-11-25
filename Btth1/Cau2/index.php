<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra trắc nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bài kiểm tra trắc nghiệm</h1>
        <form action="result.php" method="POST">
            <?php
            // Đọc file questions.txt và xử lý nội dung
            $filename = "questions.txt";
            if (!file_exists($filename)) {
                echo "<div class='alert alert-danger'>File questions.txt không tồn tại!</div>";
                exit;
            }

            $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $quizData = [];
            $currentQuestion = null;

            foreach ($questions as $line) {
                $line = trim($line);

                // Kiểm tra nếu là đáp án
                if (strpos($line, "Đáp án:") === 0) {
                    if ($currentQuestion) {
                        $currentQuestion['answer'] = substr($line, 7);
                        $quizData[] = $currentQuestion; // Thêm câu hỏi vào mảng
                        $currentQuestion = null; // Reset câu hỏi tạm thời
                    }
                } elseif (strpos($line, "A.") === 0 || strpos($line, "B.") === 0 || strpos($line, "C.") === 0 || strpos($line, "D.") === 0) {
                    $currentQuestion['options'][] = $line; // Thêm đáp án
                } else {
                    if ($currentQuestion) {
                        $quizData[] = $currentQuestion; // Lưu câu hỏi trước đó (nếu có)
                    }
                    $currentQuestion = ['question' => $line, 'options' => []]; // Khởi tạo câu hỏi mới
                }
            }

            // Hiển thị câu hỏi
            if (!empty($quizData)) {
                foreach ($quizData as $index => $quiz) {
                    ?>
                    <div class="card mb-4">
                        <div class="card-header"><strong>Câu <?= $index + 1 ?>:</strong> <?= htmlspecialchars($quiz['question']) ?></div>
                        <div class="card-body">
                            <?php
                            if (!empty($quiz['options'])) {
                                foreach ($quiz['options'] as $option) {
                                    $optionValue = substr($option, 0, 1); // A, B, C, D
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question<?= $index ?>" id="question<?= $index . $optionValue ?>" value="<?= $optionValue ?>" required>
                                        <label class="form-check-label" for="question<?= $index . $optionValue ?>"><?= htmlspecialchars($option) ?></label>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<div class='alert alert-warning'>Không có đáp án nào được tìm thấy cho câu hỏi này.</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='alert alert-warning'>Không có câu hỏi nào trong file questions.txt!</div>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
</body>
</html>
