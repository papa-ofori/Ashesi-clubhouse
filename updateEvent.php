<?php
// Include config file
require_once 'dbconn.php';

// Define variables and initialize with empty values
$event_name = $club_name = $event_description = $event_date = $event_time = $event_venue =
    '';
$event_name_err = $club_name_err = $event_description_err = $event_date_err = $event_time_err = $event_venue_err =
    '';

// Processing form data when form is submitted
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Get hidden input value
    $id = $_POST['id'];

    // Validate event name
    $input_event_name = trim($_POST['event_name']);
    if (empty($input_event_name)) {
        $event_name_err = 'Please enter a event name.';
    } else {
        $event_name = $input_event_name;
    }

    // Validate club name
    $input_club_name = trim($_POST['club_name']);
    if (empty($input_club_name)) {
        $event_club_err = 'Please enter a club name.';
    } else {
        $club_name = $input_club_name;
    }

    // Validate event description
    $input_event_description = trim($_POST['event_description']);
    if (empty($input_event_description)) {
        $event_description_err = 'Please enter a event description.';
    } else {
        $event_description = $input_event_description;
    }

    // Validate event date
    $input_event_date = trim($_POST['event_date']);
    if (empty($input_event_date)) {
        $event_date = 'Please enter event date';
    } else {
        $event_date = $input_event_date;
    }

    // Validate event time
    $input_event_time = trim($_POST['event_time']);
    if (empty($input_event_time)) {
        $event_time = 'Please enter event time';
    } else {
        $event_time = $input_event_time;
    }

    // Validate event venue
    $input_event_venue = trim($_POST['event_venue']);
    if (empty($input_event_venue)) {
        $event_venue = 'Please enter event venue';
    } else {
        $event_venue = $input_event_venue;
    }

    // Check input errors before inserting in database
    if (
        empty($event_name_err) &&
        empty($club_name_err) &&
        empty($event_description_err) &&
        empty($event_date_err) &&
        empty($event_time_err) &&
        empty($event_venue_err)
    ) {
        // Prepare an update statement
        $sql =
            'UPDATE `events` SET `event_name`=?,`club_name`=?,`event_description`=?,`event_date`=?,`event_time`=?,`event_venue`=? WHERE `id`=?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters

            // Set parameters
            $param_event_name = $event_name;
            $param_club_name = $club_name;
            $param_event_description = $event_description;
            $param_event_date = $event_date;
            $param_event_time = $event_time;
            $param_event_venue = $event_venue;
            $param_id = $id;

            mysqli_stmt_bind_param(
                $stmt,
                'sssssss',
                $param_event_name,
                $param_club_name,
                $param_event_description,
                $param_event_date,
                $param_event_time,
                $param_event_venue,
                $param_id
            );

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header('location: viewEvent.php');
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
        $sql = 'SELECT * FROM events WHERE id = ?';
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
                    $event_name = $row['event_name'];
                    $club_name = $row['club_name'];
                    $event_description = $row['event_description'];
                    $event_date = $row['event_date'];
                    $event_time = $row['event_time'];
                    $event_venue = $row['event_venue'];
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
                            <label>Event Name</label>
                            <input type="text" name="event_name" class="form-control 
                            <?php echo !empty($event_name_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $event_name; ?>">
                            <span class="invalid-feedback"><?php echo $event_name_err; ?></span>
                        </div>

                        <!-- Edit box for club name-->
                        <div class="form-group">
                            <label>Club Name</label>
                            <input type="text" name="club_name" class="form-control 
                            <?php echo !empty($club_name_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $club_name; ?>">
                            <span class="invalid-feedback"><?php echo $club_name_err; ?></span>
                        </div>

                        <!-- Edit box for description name-->
                        <div class="form-group">
                            <label>Event Description</label>
                            <input type="text" name="event_description" class="form-control 
                            <?php echo !empty($event_description_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $event_description; ?>">
                            <span class="invalid-feedback"><?php echo $event_description_err; ?></span>
                        </div>
                        
                       <!-- Edit box for event date -->
                       <div class="form-group">
                            <label>Event Date</label>
                            <input type="date" name="event_date" class="form-control 
                            <?php echo !empty($event_date_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $event_date; ?>">
                            <span class="invalid-feedback"><?php echo $event_date_err; ?></span>
                        </div>


                             <!-- Edit box for event time-->
                             <div class="form-group">
                            <label>Event Time</label>
                            <input type="time" name="event_time" class="form-control 
                            <?php echo !empty($event_time_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $event_time; ?>">
                            <span class="invalid-feedback"><?php echo $event_time_err; ?></span>
                        </div>


                        <!-- Edit box for event venue -->
                        <div class="form-group">
                            <label>Event Venue</label>
                            <input type="text" name="event_venue" class="form-control 
                            <?php echo !empty($event_venue_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $event_venue; ?>">
                            <span class="invalid-feedback"><?php echo $event_venue_err; ?></span>
                        </div>
                        
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="viewEvent.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
