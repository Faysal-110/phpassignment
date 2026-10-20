<?php
session_start();

if (!isset($_SESSION["student"])) {
    header("Location: index.php");
    exit;
}

$student = $_SESSION["student"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Information</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #eef2ff;
            font-family: Arial, sans-serif;
        }

        .result-box {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 25px #0001;
        }

        h2 {
            color: #243b80;
            text-align: center;
            margin-bottom: 25px;
        }

        th {
            width: 35%;
            background: #e8efff !important;
        }

        .student-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 12px;
        }
    </style>
</head>

<body>
<div class="result-box">

    <h2>Student Registration Details</h2>

    <div class="text-center mb-4">
        <img
            src="uploads/<?= htmlspecialchars($student['Image']) ?>"
            class="student-image"
            alt="Student Image">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Information</th>
                    <th>Details</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($student as $key => $value): ?>
                <?php if ($key != "Image"): ?>
                <tr>
                    <th><?= htmlspecialchars($key) ?></th>
                    <td><?= htmlspecialchars($value) ?></td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="index.php" class="btn btn-primary">
        Back to Form
    </a>

    <button onclick="window.print()"
            class="btn btn-secondary">
        Print
    </button>

</div>
</body>
</html>