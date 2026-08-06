<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

$applicant_id  = trim($_POST["applicant_id"] ?? "");
$name          = trim($_POST["name"] ?? "");
$email         = trim($_POST["email"] ?? "");
$phone         = trim($_POST["phone"] ?? "");
$password      = $_POST["password"] ?? "";
$gender        = $_POST["gender"] ?? "";
$job_position  = $_POST["job_position"] ?? "";
$qualification = trim($_POST["qualification"] ?? "");
$address       = trim($_POST["address"] ?? "");


if (empty($applicant_id)) {
    $errors[] = "Applicant ID is required.";
}

if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

if (empty($phone)) {
    $errors[] = "Phone number is required.";
} elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
    $errors[] = "Phone number must contain exactly 11 digits.";
}

if (empty($password)) {
    $errors[] = "Password is required.";
} elseif (strlen($password) < 6) {
    $errors[] = "Password must contain at least 6 characters.";
}

if (empty($gender)) {
    $errors[] = "Please select your gender.";
}

if (empty($job_position)) {
    $errors[] = "Please select a job position.";
}

if (empty($qualification)) {
    $errors[] = "Qualification is required.";
}

if (empty($address)) {
    $errors[] = "Address is required.";
}


$cv_new_filename = "";

if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] === UPLOAD_ERR_NO_FILE) {

    $errors[] = "Please upload your CV.";

} elseif ($_FILES["cv"]["error"] !== UPLOAD_ERR_OK) {

    $errors[] = "There was an error uploading the CV.";

} else {

    $cv_name = $_FILES["cv"]["name"];
    $cv_size = $_FILES["cv"]["size"];
    $cv_tmp  = $_FILES["cv"]["tmp_name"];

    $allowed_extensions = ["pdf", "doc", "docx"];
    $extension = strtolower(pathinfo($cv_name, PATHINFO_EXTENSION));

    if (!in_array($extension, $allowed_extensions)) {
        $errors[] = "CV must be a PDF, DOC, or DOCX file.";
    }

    if ($cv_size > 2 * 1024 * 1024) {
        $errors[] = "CV file size must not exceed 2 MB.";
    }
}


if (count($errors) > 0) {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Application Failed</title>
    <style>
      body { font-family: Arial, sans-serif; max-width: 480px; margin: 40px auto; }
      h2 { color: #c0392b; }
      .error { color: #c0392b; margin: 4px 0; }
      a { display: inline-block; margin-top: 20px; }
    </style>
    </head>
    <body>
      <h2>Application Failed!</h2>
      <?php foreach ($errors as $error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
      <?php endforeach; ?>
      <a href="index.php">Go Back</a>
    </body>
    </html>
    <?php
    exit();

} else {

    $upload_folder = __DIR__ . "/uploads/";
    if (!is_dir($upload_folder)) {
        mkdir($upload_folder, 0755, true);
    }

    $cv_new_filename = time() . "_" . basename($_FILES["cv"]["name"]);
    $destination = $upload_folder . $cv_new_filename;

    move_uploaded_file($_FILES["cv"]["tmp_name"], $destination);

    $query = http_build_query([
        "id"            => $applicant_id,
        "name"          => $name,
        "email"         => $email,
        "phone"         => $phone,
        "gender"        => $gender,
        "job_position"  => $job_position,
        "qualification" => $qualification,
        "address"       => $address,
        "cv"            => $cv_new_filename,
    ]);

    header("Location: result.php?" . $query);
    exit();
}