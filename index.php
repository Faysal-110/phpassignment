<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $pob = $_POST["pob"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    $parent_name = $_POST["parent_name"];
    $parent_telephone = $_POST["parent_telephone"];
    $relationship = $_POST["relationship"];

    $student_id = $_POST["student_id"];
    $faculty = $_POST["faculty"];
    $department = $_POST["department"];
    $class = $_POST["class"];
    $registration_date = $_POST["registration_date"];

    $errors = [];

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name must contain letters and spaces only.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email.";
    }

    if (!isset($_FILES["image"]) ||
        $_FILES["image"]["error"] != 0) {
        $errors[] = "Please upload a student image.";
    } else {
        $allowed = ["image/jpeg", "image/png", "image/gif"];
        $type = mime_content_type($_FILES["image"]["tmp_name"]);

        if (!in_array($type, $allowed) ||
            getimagesize($_FILES["image"]["tmp_name"]) === false) {
            $errors[] = "Only JPG, PNG and GIF images are allowed.";
        } elseif ($_FILES["image"]["size"] > 3 * 1024 * 1024) {
            $errors[] = "Image must be smaller than 3 MB.";
        }
    }

    foreach ($_POST as $key => $value) {
        if (trim($value) == "") {
            $errors[] = ucfirst($key) . " is required.";
        }
    }

    if (empty($errors)) {
        $folder = "uploads/";

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $image = uniqid() . "_" .
                 basename($_FILES["image"]["name"]);

        if (move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            $folder . $image
        )) {
            session_start();

            $_SESSION["student"] = [
                "Name" => $name,
                "Place of Birth" => $pob,
                "Date of Birth" => $dob,
                "Address" => $address,
                "Gender" => $gender,
                "Telephone" => $telephone,
                "Email" => $email,
                "Parent Name" => $parent_name,
                "Parent Telephone" => $parent_telephone,
                "Relationship" => $relationship,
                "Student ID" => $student_id,
                "Faculty" => $faculty,
                "Department" => $department,
                "Class" => $class,
                "Registration Date" => $registration_date,
                "Image" => $image
            ];

            header("Location: result.php");
            exit;
        } else {
            $errors[] = "Unable to upload image.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #eef2ff;
            font-family: Arial, sans-serif;
        }

        .container-box {
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
            font-weight: bold;
        }

        h4 {
            color: #3157d5;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 10px;
            margin-top: 25px;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px;
        }

        .btn-primary {
            background: #3157d5;
            border: none;
            padding: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="container-box">

    <h2>Student Registration Form</h2>
    <p class="text-center text-secondary">
        Jamhuuriya University of Science & Technology
    </p>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">

        <h4>1. Personal Information</h4>

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control"
                   required pattern="[A-Za-z ]+">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Place of Birth</label>
                <input type="text" name="pob"
                       class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="dob"
                       class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address"
                   class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select" required>
                    <option value="">Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Telephone</label>
                <input type="tel" name="telephone"
                       class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Student Image</label>
            <input type="file" name="image"
                   class="form-control"
                   accept=".jpg,.jpeg,.png,.gif"
                   required>
        </div>

        <h4>2. Parent Information</h4>

        <div class="mb-3">
            <label class="form-label">Parent Name</label>
            <input type="text" name="parent_name"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Telephone</label>
            <input type="tel" name="parent_telephone"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Relationship</label>
            <select name="relationship"
                    class="form-select" required>
                <option value="">Choose Relationship</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Guardian">Guardian</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <h4>3. Academic Information</h4>

        <div class="mb-3">
            <label class="form-label">Student ID</label>
            <input type="text" name="student_id"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Faculty</label>
            <input type="text" name="faculty"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Department</label>
            <input type="text" name="department"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Class</label>
            <input type="text" name="class"
                   class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Registration Date</label>
            <input type="date" name="registration_date"
                   class="form-control" required>
        </div>

        <button type="submit"
                class="btn btn-primary w-100">
            Register Student
        </button>

    </form>
</div>
</body>
</html>