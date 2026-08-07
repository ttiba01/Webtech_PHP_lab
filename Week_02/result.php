<?php

$applicant_id  = $_GET["id"] ?? "";
$name          = $_GET["name"] ?? "";
$email         = $_GET["email"] ?? "";
$phone         = $_GET["phone"] ?? "";
$gender        = $_GET["gender"] ?? "";
$job_position  = $_GET["job_position"] ?? "";
$qualification = $_GET["qualification"] ?? "";
$address       = $_GET["address"] ?? "";
$cv            = $_GET["cv"] ?? "";
$request_id   = $_REQUEST["id"] ?? "";
$request_name = $_REQUEST["name"] ?? "";

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Application Successful</title>
<style>
  body { font-family: Arial, sans-serif; max-width: 480px; margin: 40px auto; }
  h2 { color: #1e2822; }
  .box { background: #eafaf1; border: 1px solid #27ae60; padding: 16px; border-radius: 4px; }
  p { margin: 6px 0; }
  a { display: inline-block; margin-top: 20px; }
</style>
</head>
<body>

  <h2>==============================</h2>
  <h2> APPLICATION SUCCESSFUL </h2>
  <h2>==============================</h2>
  <p><strong>Applicant ID:</strong> <?php echo e($applicant_id); ?></p>
  <p><strong>Name:</strong> <?php echo e($name); ?></p>
  <p><strong>Email:</strong> <?php echo e($email); ?></p>
  <p><strong>Phone:</strong> <?php echo e($phone); ?></p>
  <p><strong>Gender:</strong> <?php echo e($gender); ?></p>
  <p><strong>Job Position:</strong> <?php echo e($job_position); ?></p>
  <p><strong>Qualification:</strong> <?php echo e($qualification); ?></p>
  <p><strong>Address:</strong> <?php echo e($address); ?></p>
  <p><strong>Uploaded CV:</strong> <?php echo e($cv); ?></p>
  <p>Application submitted successfully.</p>

<a href="index.php">Submit Another Application</a>

</body>
</html>