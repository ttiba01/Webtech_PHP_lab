<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Job Application System</title>
<style>
  body { font-family: Arial, sans-serif; max-width: 520px; margin: 40px auto; }
  h2 { text-align: center; }
  label { display: block; margin-top: 14px; font-weight: bold; }
  input[type=text], input[type=password], input[type=email], select, textarea {
      width: 100%; padding: 8px; box-sizing: border-box; margin-top: 4px;
  }
  .radio-group { margin-top: 4px; }
  .radio-group label { display: inline-block; font-weight: normal; margin-right: 16px; }
  input[type=submit] {
      margin-top: 20px; padding: 10px 24px; cursor: pointer;
  }
</style>
</head>
<body>

<h2>Online Job Application System</h2>
<h3>Job Application Form</h3>

<form action="process.php" method="POST" enctype="multipart/form-data">

    <label for="applicant_id">Applicant ID:</label>
    <input type="text" id="applicant_id" name="applicant_id">

    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email">

    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" placeholder="11 digits, e.g. 01712345678">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <label>Gender:</label>
    <div class="radio-group">
        <label><input type="radio" name="gender" value="Male"> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
    </div>

    <label for="job_position">Job Position:</label>
    <select id="job_position" name="job_position">
        <option value="">Select Job Position</option>
        <option value="Software Developer">Software Developer</option>
        <option value="Web Developer">Web Developer</option>
        <option value="Database Administrator">Database Administrator</option>
        <option value="Network Engineer">Network Engineer</option>
    </select>

    <label for="qualification">Educational Qualification:</label>
    <input type="text" id="qualification" name="qualification" placeholder="e.g. BSc in CSE">

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4"></textarea>

    <label for="cv">Upload CV/Resume (PDF, DOC, DOCX — max 2MB):</label>
    <input type="file" id="cv" name="cv">

    <input type="submit" value="Submit Application">

</form>

</body>
</html>