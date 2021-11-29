<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            color:rgb(104,7,7)
        }
        table tr td{
            color:rgb(104,7,7)
        }

        table tr td:last-child{
            width: 70px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="row event align-items-center justify-content-center"> </div>
</nav>
<h2 class="textEvent">Events</h2>  
                    </div>
                    <?php
                    // Include config file
                    require_once 'dbconn.php';

                    // Attempt select query execution
                    $sql = 'SELECT * FROM events';
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Event Name</th>';
                            echo '<th>Club Name</th>';
                            echo '<th>Event discription</th>';
                            echo '<th>Date</th>';
                            echo '<th>Time</th>';
                            echo '<th>Venue</th>';
                            echo '<th>Action</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['event_id'] . '</td>';
                                echo '<td>' . $row['event_name'] . '</td>';
                                echo '<td>' . $row['club_name'] . '</td>';
                                echo '<td>' .
                                    $row['event_description'] .
                                    '</td>';
                                echo '<td>' . $row['event_date'] . '</td>';
                                echo '<td>' . $row['event_time'] . '</td>';
                                echo '<td>' . $row['event_venue'] . '</td>';

                                echo '<td>';

                                echo '<a href="update.php?id=' .
                                    $row['event_id'] .
                                    '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' .
                                    $row['event_id'] .
                                    '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo 'Oops! Something went wrong. Please try again later.';
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    
</body>

</html>