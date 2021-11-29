<?php
if (isset($_POST['register'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // getting user input and validating
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $student_id = validate($_POST['student_id']);
    $gender = validate($_POST['gender']);
    $class = validate($_POST['class']);
    $club_name = validate($_POST['club_name']);

    //print_r($_POST);
} ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>   
<body>
<?php
require 'database_credentials.php';
// connect to database
$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

//checking if a student has alreeady rigestered and inserting user input to database
$check_email = mysqli_query(
    $conn,
    "SELECT  * FROM registered_students_details where student_id = '$student_id'  AND club_name = '$club_name'   AND email = '$email'"
);
// var_dump($check_email);
if (mysqli_num_rows($check_email) > 0) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('You are already a member of $club_name');
    window.location.href='Clubs.html';
    </script>";
} else {
    $sql = "INSERT INTO registered_students_details(fname, lname, email, student_id, gender, class, club_name) Values('$fname','$lname','$email','$student_id','$gender','$class','$club_name')";
    $results = mysqli_query($conn, $sql);
    if ($results) {
        echo "<script LANGUAGE='JavaScript'>
        window.alert('You have successfully signed up to $club_name');
        window.location.href='Clubs.html';
        </script>";
    }
}
?>
 
 
    
</body>
</html>