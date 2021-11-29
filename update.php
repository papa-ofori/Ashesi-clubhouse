<?php
// Include config file
require_once 'dbconn.php';

// Define variables and initialize with empty values
$fname = $lname = $email = $student_id = $gender = $class = $club_name = '';
$fname_err = $lname_err = $email_err = $student_id_err = $gender_err = $class_err = $club_name_err =
    '';

// Processing form data when form is submitted
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Get hidden input value
    $id = $_POST['id'];

    // Validate firstname
    $input_fname = trim($_POST['fname']);
    if (empty($input_fname)) {
        $name_err = 'Please enter a first name.';
    } elseif (
        !filter_var($input_fname, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/^[a-zA-Z\s]+$/'],
        ])
    ) {
        $fname_err = 'Please enter a first valid name.';
    } else {
        $fname = $input_fname;
    }

    // Validate lastname
    $input_lname = trim($_POST['lname']);
    if (empty($input_lname)) {
        $lname_err = 'Please enter a last name.';
    } elseif (
        !filter_var($input_lname, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/^[a-zA-Z\s]+$/'],
        ])
    ) {
        $lname_err = 'Please enter a valid last name.';
    } else {
        $lname = $input_lname;
    }

    // Validate address address
    $input_email = trim($_POST['email']);
    if (empty($input_email)) {
        $address_err = 'Please enter an email address.';
    } else {
        $email = $input_email;
    }

    // Validate student id
    $input_student_id = trim($_POST['student_id']);
    if (empty($input_student_id)) {
        $salary_err = 'Please enter the Student Id.';
    } elseif (!ctype_digit($input_student_id)) {
        $student_id_err = 'Please enter a positive integer value.';
    } else {
        $student_id = $input_student_id;
    }

    // Validate gender
    $input_gender = trim($_POST['gender']);
    if (empty($input_gender)) {
        $gender_err = 'Please select your gender.';
    } else {
        $gender = $input_gender;
    }

    // Validate class
    $input_class = trim($_POST['class']);
    if (empty($input_fname)) {
        $class_err = 'Please select your class!';
    } else {
        $class = $input_class;
    }

    // Validate club name
    $input_club_name = trim($_POST['club_name']);
    if (empty($input_club_name)) {
        $club_name_err = 'Please select a club!';
    } else {
        $club_name = $input_club_name;
    }

    // Check input errors before inserting in database
    if (
        empty($fname_err) &&
        empty($lname_err) &&
        empty($email_err) &&
        empty($student_id_err) &&
        empty($gender_err) &&
        empty($class_err) &&
        empty($club_name_err)
    ) {
        // Prepare an update statement
        $sql =
            'UPDATE `registered_students_details` SET `fname`=?,`lname`=?,`email`=?,`student_id`=?,`gender`=?,`class`=?,`club_name`=? WHERE `id`=?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters

            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_student_id = $student_id;
            $param_gender = $gender;
            $param_class = $class;
            $param_club_name = $club_name;
            $param_id = $id;

            mysqli_stmt_bind_param(
                $stmt,
                'sssisssi',
                $param_fname,
                $param_lname,
                $param_email,
                $param_student_id,
                $param_gender,
                $param_class,
                $param_club_name,
                $param_id
            );

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header('location: view.php');
                exit();
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Get URL parameter
        $id = trim($_GET['id']);

        // Prepare a select statement
        $sql = 'SELECT * FROM registered_students_details WHERE id = ?';
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'i', $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                     contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $student_id = $row['student_id'];
                    $gender = $row['gender'];
                    $class = $row['class'];
                    $club_name = $row['club_name'];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header('location: error.php');
                    exit();
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header('location: error.php');
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update student registration table.</p>
                    <form action="" method="POST">
                        <div class="form-group">


                    <input type="hidden" name="id" value="<?php echo $_GET[
                        'id'
                    ]; ?>">
                        <!-- Edit box for first name-->
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control 
                            <?php echo !empty($fname_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $fname; ?>">
                            <span class="invalid-feedback"><?php echo $fname_err; ?></span>
                        </div>

                        <!-- Edit box for last name-->
                        <div class="form-group">
                            <label>last Name</label>
                            <input type="text" name="lname" class="form-control 
                            <?php echo !empty($lname_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $lname; ?>">
                            <span class="invalid-feedback"><?php echo $lname_err; ?></span>
                        </div>

                        <!-- Edit box for email last name-->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control 
                            <?php echo !empty($email_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        
                        <!-- Edit Student ID -->
                        <div class="form-group">
                            <label>Student ID</label>
                            <input type="number" name="student_id" class="form-control
                             <?php echo !empty($student_id_err)
                                 ? 'is-invalid'
                                 : ''; ?>" value="<?php echo $student_id; ?>">
                            <span class="invalid-feedback"><?php echo $student_id_err; ?></span>
                        </div>


                        <!-- Edit gender -->
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" required>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                             <?php echo !empty($gender_err)
                                 ? 'is-invalid'
                                 : ''; ?>
                            <span class="invalid-feedback"><?php echo $gender_err; ?></span>
                        </div>


                        <!-- Edit box for class-->
                        <div class="form-group">
                            <label>Select your class</label>
                            <select name="class" id="class">
                                <option value = "2022">2022</option>
                                <option value = "2023">2023</option>
                                <option value = "2024">2024</option>
                                <option value = "2025">2025</option>
                            </select>
                            <?php echo !empty($class_err)
                                ? 'is-invalid'
                                : ''; ?>
                            <span class="invalid-feedback"><?php echo $class_err; ?></span>
                        </div>


                         <!-- Edit box for club name-->
                         <div class="form-group">
                            <label>Select your class</label>
                            <select name="club_name" id="club_name">
                                <option value="J force">J force</option>
                                <option value="Ashesi Leo Club">Ashesi Leo Club</option>
                                <option value="Kingdom Christian Fellowship">Kingdom Christian Fellowship</option>
                                <option value="Ashesi coral">Ashesi Coral</option>
                                <option value="Investment Club">Investment Club</option>
                                <option value="Real Estate">Real Estate</option>
                                <option value="Morden Un">Morden Un</option>
                                <option value="Ashesi Sign Language">Ashesi Sign Language</option> 
                                <option value="Cyber Geeks">Cyber Geeks</option> 
                            </select>
                            <?php echo !empty($club_name_err)
                                ? 'is-invalid'
                                : ''; ?>
                            <span class="invalid-feedback"><?php echo $club_name_err; ?></span>
                        </div>

               


                        
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
