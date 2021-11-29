<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ashesi Clubs and Society</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="event.css">

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">

                <!--nav logo-left-side-->
                <img src="logo.png" alt="ashesi logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- nav logo right side-->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Clubs.html">Clubs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="event.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sign-up.html">Sign up</a>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    
</body>
</html>

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
<h2 class="textEvent">Events Calender</h2>  
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
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['event_name'] . '</td>';
                                echo '<td>' . $row['club_name'] . '</td>';
                                echo '<td>' .
                                    $row['event_description'] .
                                    '</td>';
                                echo '<td>' . $row['event_date'] . '</td>';
                                echo '<td>' . $row['event_time'] . '</td>';
                                echo '<td>' . $row['event_venue'] . '</td>';

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
    <!-- footer  -->
    <footer class="page-footer">
            <div class="container">
                <div class="row">

                    <!-- footer left-side-->
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h6 class="text-uppercase font-weight-bold">Additional Information</h6>
                        <p>Did not find  any club of your interest? Do you have a suggestion for a club that you think would be popular? To start your own group, contact the Student Life Engagement Committee.</p>
                        <p>Our clubs are a melting pot of diversity, leadership, and entrepreneurship.</p>
                    </div>

                    <!-- right-side -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <p>(E) info@ashesi.edu.gh
                            <br/>1 University Avenue, Berekuso, E/R

                            <br/>+233 55 174 7839</p>
                    </div>
                    <div>

        </footer>
        </div>
</body>

</html>