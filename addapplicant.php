<?php
require_once './core/dbConfig.php';
require_once './core/models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $job_title = $_POST['job_title'];
    $skills = $_POST['skills'];
    $years_of_experience = $_POST['years_of_experience'];
    $status = $_POST['status'];

    // Insert new applicant into the database
    $stmt = $pdo->prepare("INSERT INTO applicants (first_name, last_name, email, phone, address, job_title, skills, years_of_experience, status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$first_name, $last_name, $email, $phone, $address, $job_title, $skills, $years_of_experience, $status]);

    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Applicant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #ff66b2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ff66b2;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #ff66b2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #ff3385;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Applicant</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" name="job_title" id="job_title" required>
            </div>
            <div class="form-group">
                <label for="skills">Skills</label>
                <input type="text" name="skills" id="skills" required>
            </div>
            <div class="form-group">
                <label for="years_of_experience">Years of Experience</label>
                <input type="number" name="years_of_experience" id="years_of_experience" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" required>
            </div>
            <button type="submit">Add Applicant</button>
        </form>
    </div>
</body>
</html>
