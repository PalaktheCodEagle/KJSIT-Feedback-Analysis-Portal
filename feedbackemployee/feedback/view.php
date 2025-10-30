<?php
$servername = "184.168.110.223";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Submission Status</title>
    <link rel="shortcut icon" href="FAVICON1.png" type="image/x-icon">
    <script src="table2excel.js"></script>
</head>

<body>
    <div class="nav">
        <nav>
            <div class="img">
                <img id="logo" src="Somaiya1.png" alt="" style="height:90px">
            </div>
            <div class="row">
                <div class="icons">
                    <img id="trust" src="Trust.png" alt="">
                </div>
            </div>
        </nav>
    </div>
    <div>
        <center>
            <h1>Feedback Submission Details</h1>
            <h2>Academic Year : 2022-2023</h2>
        </center>
    </div>
    <style>
    nav {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        align-items: center;
    }



    .row {
        display: flex;
        flex-direction: row;
        margin-right: 5px;
    }

    .row a {
        color: black;
        text-decoration: none;
        margin: 0.3rem;
    }

    .row a:hover {
        color: #b7202e;
    }

    #trust {
        height: 50px;
        width: 70px;
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    th {
        background-color: #9b2928;
        color: white;
        border: 1px solid #000000;
    }

    select {
        margin: 0.5em;
        padding: 6px 10px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    select:hover,
    select:focus {
        border-color: #5b9dd9;
        outline: none;
    }

    select option {
        background-color: #fff;
        color: #555;
    }

    select[multiple] {
        height: auto;
    }

    @media print {
        @page {
            @bottom-center {
                content: "Your custom footer text goes here";
                font-size: 10pt;
            }
        }
    }

    label {
        font-weight: bold;
    }
    </style>
    <?php
// Retrieve the data
$sql = "SELECT * FROM employee_feedback_system.view1";
$result = mysqli_query($conn, $sql);

// Count the number of rows in the result set
$num_rows = mysqli_num_rows($result);
// Display the count and the data in a table
echo "<p>Total " . mysqli_num_rows($result) . " Entries";

// Retrieve the distinct values for each column
// $sql = "SELECT DISTINCT rollno FROM employee_feedback_system.view1 ORDER BY rollno ASC";
// $result = mysqli_query($conn, $sql);
// $rollno_options = "<option value=''>All Roll numbers</option>"; // Add an option to select all rows
// while ($row = mysqli_fetch_assoc($result)) {
//     $selected = ($row["rollno"] == $_POST["rollno_filter"]) ? "selected" : ""; // Check if this option is selected
//     $rollno_options .= "<option value='" . $row["rollno"] . "' $selected>" . $row["rollno"] . "</option>";
// }

$sql = "SELECT DISTINCT employeename FROM view1 ORDER BY employeename ASC";
$result = mysqli_query($conn, $sql);
$employeename_options = "<option value=''>All employee's</option>"; // Add an option to select all rows
while ($row = mysqli_fetch_assoc($result)) {
    $selected = ($row["employeename"] == $_POST["employeename_filter"]) ? "selected" : ""; // Check if this option is selected
    $employeename_options .= "<option value='" . $row["employeename"] . "' $selected>" . $row["employeename"] . "</option>";
}

$sql = "SELECT DISTINCT email_id FROM view1 ORDER BY email_id ASC";
$result = mysqli_query($conn, $sql);
$email_id_options = "<option value=''>All Email ID</option>"; // Add an option to select all rows
while ($row = mysqli_fetch_assoc($result)) {
    $selected = ($row["email_id"] == $_POST["email_id_filter"]) ? "selected" : ""; // Check if this option is selected
    $email_id_options .= "<option value='" . $row["email_id"] . "' $selected>" . $row["email_id"] . "</option>";
}
$sql = "SELECT DISTINCT Class FROM view1 ";
$result = mysqli_query($conn, $sql);
$Class_options = "<option value=''>All Classes</option>"; // Add an option to select all rows
while ($row = mysqli_fetch_assoc($result)) {
    $selected = ($row["Class"] == $_POST["Class_filter"]) ? "selected" : ""; // Check if this option is selected
    $Class_options .= "<option value='" . $row["Class"] . "' $selected>" . $row["Class"] . "</option>";
}
$sql = "SELECT DISTINCT Division FROM view1 ORDER BY Division ASC";
$result = mysqli_query($conn, $sql);
$Division_options = "<option value=''>All Divisions</option>"; // Add an option to select all rows
while ($row = mysqli_fetch_assoc($result)) {
    $selected = ($row["Division"] == $_POST["Division_filter"]) ? "selected" : ""; // Check if this option is selected
    $Division_options .= "<option value='" . $row["Division"] . "' $selected>" . $row["Division"] . "</option>";
}
$sql = "SELECT DISTINCT Department FROM view1";
$result = mysqli_query($conn, $sql);
$Department_options = "<option value=''>All Departments</option>"; // Add an option to select all rows
while ($row = mysqli_fetch_assoc($result)) {
    $selected = ($row["Department"] == $_POST["Department_filter"]) ? "selected" : ""; // Check if this option is selected
    $Department_options .= "<option value='" . $row["Department"] . "' $selected>" . $row["Department"] . "</option>";
}
$sql = "SELECT DISTINCT academicyear FROM view1";
$result = mysqli_query($conn, $sql);
$academicyear_options = "<option value=''>All Academic Years</option>"; // Add an option to select all rows
while ($row = mysqli_fetch_assoc($result)) {
    $selected = ($row["academicyear"] == $_POST["academicyear_filter"]) ? "selected" : ""; // Check if this option is selected
    $academicyear_options .= "<option value='" . $row["academicyear"] . "' $selected>" . $row["academicyear"] . "</option>";
}
$sql = "SELECT DISTINCT feedback_topic FROM view1";
$result = mysqli_query($conn, $sql);
$feedback_topic_options = "<option value=''>All Feedback Topics</option>"; // Add an option to select all rows
while ($row = mysqli_fetch_assoc($result)) {
    $selected = ($row["feedback_topic"] == $_POST["feedback_topic_filter"]) ? "selected" : ""; // Check if this option is selected
    $feedback_topic_options .= "<option value='" . $row["feedback_topic"] . "' $selected>" . $row["feedback_topic"] . "</option>";
}

// Display the filter options as drop downs
echo "<center>";
echo "<form method='post' >";
echo "<label>Academic Year:</label>";
echo "<select name='academicyear_filter'>";
echo $academicyear_options;
echo "</select>";

echo "&nbsp;&nbsp;&nbsp;";

echo "<label>Department:</label>";
echo "<select name='Department_filter'>";
echo $Department_options;
echo "</select>";

echo "&nbsp;&nbsp;&nbsp;";

echo "<label>Class:</label>";
echo "<select name='Class_filter'>";
echo $Class_options;
echo "</select>";

echo "&nbsp;&nbsp;&nbsp;";

echo "<label>Division:</label>";
echo "<select name='Division_filter'>";
echo $Division_options;
echo "</select>";

echo "<br>";

echo "<label>Feedback Topic:</label>";
echo "<select name='feedback_topic_filter'>";
echo $feedback_topic_options;
echo "</select>";

echo "&nbsp;&nbsp;&nbsp;";

echo "<br>";

echo "<label>employee Name:</label>";
echo "<select name='employeename_filter'>";
echo $employeename_options;
echo "</select>";

echo "&nbsp;&nbsp;&nbsp;";

// echo "<label>Roll Number:</label>";
// echo "<select name='rollno_filter'>";
// echo $rollno_options;
// echo "</select>";

echo "<label>Email ID:</label>";
echo "<select name='email_id_filter'>";
echo $email_id_options;
echo "</select>";

echo "<br>";
echo "<br>";
echo "<button style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' type='button' onclick='clearFilters()'>Clear Filters</button>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' type='submit' name='submit'>Filter</button>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' class='btn btn-info' onclick='window.print()'>Download as PDF</button>";
echo "&nbsp;&nbsp;&nbsp;";
echo " <button id='downloadexcel' style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' type='button' class='btn btn-success' onclick='exportToExcel('view1')'>Download as Excel</button>";
echo "</form>";
echo "</center>";

// Process the form data and construct a new SQL query with filters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $rollno_filter = $_POST["rollno_filter"];
    $employeename_filter = $_POST["employeename_filter"];
    $email_id_filter = $_POST["email_id_filter"];
    $Class_filter = $_POST["Class_filter"];
    // $Division_filter = $_POST["Division_filter"];
    $Department_filter = $_POST["Department_filter"];
    $academicyear_filter = $_POST["academicyear_filter"];
    $feedback_topic_filter = $_POST["feedback_topic_filter"];
    $sql = "SELECT * FROM view1 WHERE employeename LIKE '%$employeename_filter%'
     AND email_id LIKE '%$email_id_filter%' AND Class LIKE '%$Class_filter%' AND Division LIKE '%$Division_filter%'
     AND Department LIKE '%$Department_filter%' AND academicyear LIKE '%$academicyear_filter%' AND feedback_topic LIKE '%$feedback_topic_filter%' ORDER BY rollno";
    $result = mysqli_query($conn, $sql);
    // Display the filtered data in a table
    echo "<table id='mytable'>";
    echo "<tr><th>Roll No.</th><th>Name</th><th>Email ID</th><th>Class</th><th>Division</th><th>Department</th><th>Academic Year</th><th>Feedback Submitted</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["rollno"] . "</td><td>" . $row["employeename"] . "</td><td>" .
            $row["email_id"] . "</td><td>" . $row["Class"] . "</td><td>" . $row["Division"] . "</td><td>" . $row["Department"] .
            "</td><td>" . $row["academicyear"] . "</td><td>" . $row["feedback_topic"] . "</td></tr>";

        // // Count the number of rows in the result set
        // $num_rows = mysqli_num_rows($result);
        // // Display the count and the data in a table
        // echo "<p>Showing " . mysqli_num_rows($result) . " of " . $num_rows . " rows</p>";
    }
    // Count the number of rows in the result set
    $num_rows = mysqli_num_rows($result);
    // Display the count and the data in a table
    echo "<p>Showing " . mysqli_num_rows($result) . " of " . $num_rows . " rows</p>";
    echo "</table>";
}

// Close the connection
mysqli_close($conn);
?>
    <script>
    document.getElementById('downloadexcel').addEventListener('click', function() {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#mytable"));
    });

    function clearFilters() {
        document.getElementsByName("rollno_filter")[0].value = "";
        document.getElementsByName("employeename_filter")[0].value = "";
        document.getElementsByName("email_id_filter")[0].value = "";
        document.getElementsByName("Class_filter")[0].value = "";
        document.getElementsByName("Division_filter")[0].value = "";
        document.getElementsByName("Department_filter")[0].value = "";
        document.getElementsByName("academicyear_filter")[0].value = "";
        document.getElementsByName("feedback_topic_filter")[0].value = "";
    }
    </script>
</body>

</html>