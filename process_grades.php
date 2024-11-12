<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prelimGrade = intval($_POST['prelimGrade'] ?? 0);
    $midtermGrade = intval($_POST['midtermGrade'] ?? 0);
    $finalGrade = intval($_POST['finalGrade'] ?? 0);

    if ($prelimGrade && $midtermGrade && $finalGrade) {
        $finalGradeComputed = ($prelimGrade + $midtermGrade + $finalGrade) / 3;
        echo "Grades submitted successfully!<br>";
        echo "Prelim Grade: $prelimGrade<br>";
        echo "Midterm Grade: $midtermGrade<br>";
        echo "Final Grade: $finalGrade<br>";
        echo "Final Average: " . number_format($finalGradeComputed, 2);
    } else {
        echo "Please fill out all grade fields.";
    }
}