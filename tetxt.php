<?php
// Initialize variables
$firstName = $lastName = $age = $gender = $course = $email = '';
$prelimGrade = $midtermGrade = $finalGrade = '';
$finalGradeComputed = 0;
$showGradesForm = false;
$showGradeSummary = false;
$passFail = '';

// Form Processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize student information
    if (isset($_POST['firstName'])) {
        $firstName = htmlspecialchars(trim($_POST['firstName'] ?? ''));
        $lastName = htmlspecialchars(trim($_POST['lastName'] ?? ''));
        $age = intval($_POST['age'] ?? '');
        $gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
        $course = htmlspecialchars(trim($_POST['course'] ?? ''));
        $email = htmlspecialchars(trim($_POST['email'] ?? ''));

        // Show grades form if student data is present
        if (!empty($firstName) && !empty($lastName) && !empty($age) && !empty($gender) && !empty($course) && !empty($email)) {
            $showGradesForm = true;
        }
    }

    // If the grades form is submitted, calculate the final grade
    if (isset($_POST['prelimGrade']) && isset($_POST['midtermGrade']) && isset($_POST['finalGrade'])) {
        $prelimGrade = isset($_POST['prelimGrade']) ? intval($_POST['prelimGrade']) : '';
        $midtermGrade = isset($_POST['midtermGrade']) ? intval($_POST['midtermGrade']) : '';
        $finalGrade = isset($_POST['finalGrade']) ? intval($_POST['finalGrade']) : '';

        // Calculate final grade if all grades are provided
        if ($prelimGrade && $midtermGrade && $finalGrade) {
            $finalGradeComputed = ($prelimGrade + $midtermGrade + $finalGrade) / 3;
        }

        // Set pass/fail message based on the computed grade
        $passFail = $finalGradeComputed >= 75 ? 'Passed' : 'Failed';

        // Set flag to show grade summary
        $showGradeSummary = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
        }

        /* Container for report card */
        .report-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        /* Title and header styles */
        .report-card h3 {
            text-align: center;
            color: #333;
        }

        .report-card p {
            font-size: 16px;
        }

        /* Table for grades */
        .grades-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .grades-table th, .grades-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .grades-table th {
            background-color: #f8f9fa;
            color: #333;
        }

        .grades-table td {
            font-size: 16px;
            color: #555;
        }

        /* Status Styling */
        .status {
            font-weight: bold;
            font-size: 18px;
        }

        .status.passed {
            color: green;
        }

        .status.failed {
            color: red;
        }

        /* Button styling */
        .btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
        }

    </style>
</head>
<body>

<div class="container mt-5">
    <!-- Part 1: Student Information -->
    <form id="studentForm" method="POST" action="" class="mb-4">
        <h3>Student Information</h3>

        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" required>
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <div class="gender-group">
                <input type="radio" id="male" name="gender" value="Male" <?php echo $gender == 'Male' ? 'checked' : ''; ?>>
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="Female" <?php echo $gender == 'Female' ? 'checked' : ''; ?>>
                <label for="female">Female</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select class="form-select" id="course" name="course" required>
                <option value="BSIT" <?php echo $course == 'BSIT' ? 'selected' : ''; ?>>BSIT</option>
                <option value="BSBA" <?php echo $course == 'BSBA' ? 'selected' : ''; ?>>BSBA</option>
                <option value="HRM" <?php echo $course == 'HRM' ? 'selected' : ''; ?>>HRM</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Student Information</button>
    </form>

    <!-- Part 2: Grades Entry -->
    <div id="gradesFormContainer" style="display: <?php echo $showGradesForm ? 'block' : 'none'; ?>;">
        <form id="gradesForm" method="POST" class="mb-4">
            <h3>Grades Entry for <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?></h3>

            <input type="hidden" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">
            <input type="hidden" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">
            <input type="hidden" name="age" value="<?php echo htmlspecialchars($age); ?>">
            <input type="hidden" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
            <input type="hidden" name="course" value="<?php echo htmlspecialchars($course); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <div class="mb-3">
                <label for="prelimGrade" class="form-label">Prelim Grade</label>
                <input type="number" class="form-control" id="prelimGrade" name="prelimGrade" value="<?php echo htmlspecialchars($prelimGrade); ?>" required min="0" max="100">
            </div>

            <div class="mb-3">
                <label for="midtermGrade" class="form-label">Midterm Grade</label>
                <input type="number" class="form-control" id="midtermGrade" name="midtermGrade" value="<?php echo htmlspecialchars($midtermGrade); ?>" required min="0" max="100">
            </div>

            <div class="mb-3">
                <label for="finalGrade" class="form-label">Final Grade</label>
                <input type="number" class="form-control" id="finalGrade" name="finalGrade" value="<?php echo htmlspecialchars($finalGrade); ?>" required min="0" max="100">
            </div>

            <button type="submit" class="btn btn-primary">Submit Grades</button>
        </form>
    </div>

    <!-- Part 3: Grade Summary (Computed Final Grade) -->
    <div id="gradeSummary" class="report-card" style="display: <?php echo $showGradeSummary ? 'block' : 'none'; ?>;">
        <h3>Student Report Card</h3>

        <!-- Student Information Section -->
        <p><strong>Student Name:</strong> <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
        <p><strong>Course:</strong> <?php echo htmlspecialchars($course); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>

        <!-- Grades Table -->
        <table class="grades-table">
            <thead>
                <tr>
                    <th>Prelim Grade</th>
                    <th>Midterm Grade</th>
                    <th>Final Grade</th>
                    <th>Average</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($prelimGrade); ?></td>
                    <td><?php echo htmlspecialchars($midtermGrade); ?></td>
                    <td><?php echo htmlspecialchars($finalGrade); ?></td>
                    <td><?php echo number_format($finalGradeComputed, 2); ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Pass/Fail Status -->
        <p class="status <?php echo $finalGradeComputed >= 75 ? 'passed' : 'failed'; ?>">
            Status: <?php echo $passFail; ?>
        </p>

    </div>
</div>

</body>
</html>
