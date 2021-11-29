<?php
require_once 'dbconn.php';

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = $conn->query(
        "SELECT * FROM 'registered_students_details' WHERE 'student_id' LIKE '%" .
            $search .
            "%'
    "
    );
    $rows = $query->num_rows;

    if ($rows > 0) {
        while ($fetch = $query->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['fname'] . '</td>';
            echo '<td>' . $row['lname'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['student_id'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td>' . $row['class'] . '</td>';
            echo '<td>' . $row['club_name'] . '</td>';

            echo ' </tr> ';
        }
    } else {
        echo "
            <tr>
                <td colspan='5'><center>No Search Found!</center></td>
            </tr>
        ";
    }
}
?> 
