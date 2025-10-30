<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$rollno_filter = isset($_POST["rollno_filter"]) ? $_POST["rollno_filter"] : '';
$studentname_filter = isset($_POST["studentname_filter"]) ? $_POST["studentname_filter"] : '';
$email_id_filter = isset($_POST["email_id_filter"]) ? $_POST["email_id_filter"] : '';
$Class_filter = isset($_POST["Class_filter"]) ? $_POST["Class_filter"] : '';
$Division_filter = isset($_POST["Division_filter"]) ? $_POST["Division_filter"] : '';
$Department_filter = isset($_POST["Department_filter"]) ? $_POST["Department_filter"] : '';
$academicyear_filter = isset($_POST["academicyear_filter"]) ? $_POST["academicyear_filter"] : '';
$feedback_topic_filter = isset($_POST["feedback_topic_filter"]) ? $_POST["feedback_topic_filter"] : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Submission Status</title>
    <link rel="shortcut icon" href="FAVICON1.png" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-table2excel@1.1.1/dist/jquery.table2excel.min.js"></script>
</head>

<body>
    <div class="nav">
        <nav>
            <div class="img">
                <img id="logo" src="images/Somaiya1.png" alt="" style="height:90px">
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
            <h2>Academic Year : 2024-2025</h2>
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
    $sql1 = "SELECT * FROM student_feedback_system.view1";
    $result1 = mysqli_query($conn, $sql1);

    // Count the number of rows in the result set
    $num_rows1 = mysqli_num_rows($result1);
    echo "<p>Total Feedback Count " . $num_rows1 . " Entries</p>";

    // Retrieve distinct values for filter options
    $sql = "SELECT DISTINCT rollno FROM student_feedback_system.view1 ORDER BY rollno ASC";
    $result = mysqli_query($conn, $sql);
    $rollno_options = "<option value=''>All Roll numbers</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["rollno"] == $rollno_filter) ? "selected" : "";
        $rollno_options .= "<option value='" . $row["rollno"] . "' $selected>" . $row["rollno"] . "</option>";
    }

    $sql = "SELECT DISTINCT studentname FROM view1 ORDER BY studentname ASC";
    $result = mysqli_query($conn, $sql);
    $studentname_options = "<option value=''>All Students</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["studentname"] == $studentname_filter) ? "selected" : "";
        $studentname_options .= "<option value='" . $row["studentname"] . "' $selected>" . $row["studentname"] . "</option>";
    }

    $sql = "SELECT DISTINCT email_id FROM view1 ORDER BY email_id ASC";
    $result = mysqli_query($conn, $sql);
    $email_id_options = "<option value=''>All Email ID</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["email_id"] == $email_id_filter) ? "selected" : "";
        $email_id_options .= "<option value='" . $row["email_id"] . "' $selected>" . $row["email_id"] . "</option>";
    }

    $sql = "SELECT DISTINCT Class FROM view1";
    $result = mysqli_query($conn, $sql);
    $Class_options = "<option value=''>All Classes</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["Class"] == $Class_filter) ? "selected" : "";
        $Class_options .= "<option value='" . $row["Class"] . "' $selected>" . $row["Class"] . "</option>";
    }

    $sql = "SELECT DISTINCT Division FROM view1 ORDER BY Division ASC";
    $result = mysqli_query($conn, $sql);
    $Division_options = "<option value=''>All Divisions</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["Division"] == $Division_filter) ? "selected" : "";
        $Division_options .= "<option value='" . $row["Division"] . "' $selected>" . $row["Division"] . "</option>";
    }

    $sql = "SELECT DISTINCT Department FROM view1";
    $result = mysqli_query($conn, $sql);
    $Department_options = "<option value=''>All Departments</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["Department"] == $Department_filter) ? "selected" : "";
        $Department_options .= "<option value='" . $row["Department"] . "' $selected>" . $row["Department"] . "</option>";
    }

    $sql = "SELECT DISTINCT academicyear FROM view1";
    $result = mysqli_query($conn, $sql);
    $academicyear_options = "<option value=''>All Academic Years</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["academicyear"] == $academicyear_filter) ? "selected" : "";
        $academicyear_options .= "<option value='" . $row["academicyear"] . "' $selected>" . $row["academicyear"] . "</option>";
    }

    $sql = "SELECT DISTINCT feedback_topic FROM view1 WHERE feedback_topic IS NOT NULL ORDER BY feedback_topic ASC";
    $result = mysqli_query($conn, $sql);
    $feedback_topic_options = "<option value=''>All Feedback Topics</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row["feedback_topic"] == $feedback_topic_filter) ? "selected" : "";
        $feedback_topic_options .= "<option value='" . $row["feedback_topic"] . "' $selected>" . $row["feedback_topic"] . "</option>";
    }

    // Display the filter options as drop downs
    echo "<center>";
    echo "<form method='post'>";
    echo "<label>Academic Year:</label>";
    echo "<select name='academicyear_filter'>";
    echo $academicyear_options;
    echo "</select>";

    echo "<label>Department:</label>";
    echo "<select name='Department_filter'>";
    echo $Department_options;
    echo "</select>";

    echo "<label>Class:</label>";
    echo "<select name='Class_filter'>";
    echo $Class_options;
    echo "</select>";

    echo "<label>Division:</label>";
    echo "<select name='Division_filter'>";
    echo $Division_options;
    echo "</select>";
    
    echo "<br>";
    
    echo "<label>Student Name:</label>";
    echo "<select name='studentname_filter'>";
    echo $studentname_options;
    echo "</select>";

    echo "<label>Email ID:</label>";
    echo "<select name='email_id_filter'>";
    echo $email_id_options;
    echo "</select>";

    echo "<label>Roll No:</label>";
    echo "<select name='rollno_filter'>";
    echo $rollno_options;
    echo "</select>";
    
    echo "<br>";

    echo "<label>Feedback Topic:</label>";
    echo "<select name='feedback_topic_filter'>";
    echo $feedback_topic_options;
    echo "</select>";
    
echo "<br>";
echo "<br>";
echo "<button style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' type='button' onclick='clearFilters()'>Clear Filters</button>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<button style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' type='submit' name='submit'>Filter</button>";
echo "&nbsp;&nbsp;&nbsp;";
echo"<button style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' class='btn btn-info' onclick='window.print()'>Download as PDF</button>";
echo "&nbsp;&nbsp;&nbsp;";
echo " <button id='downloadexcel' style='background-color: #9b2928; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' type='button' class='btn btn-success' onclick='Table2Excel()'>Download as Excel</button>";
echo "</form>";
echo"</center>";

// Process the form data and construct a new SQL query with filters

    $sql = "SELECT * FROM view1 WHERE rollno LIKE '%$rollno_filter%' AND studentname LIKE '%$studentname_filter%'
        AND email_id LIKE '%$email_id_filter%' AND Class LIKE '%$Class_filter%' AND Division LIKE '%$Division_filter%' 
        AND Department LIKE '%$Department_filter%' AND academicyear LIKE '%$academicyear_filter%' AND feedback_topic LIKE '%$feedback_topic_filter%' ORDER BY rollno";
    $result = mysqli_query($conn, $sql);

    // Count the number of rows in the result set
    $num_rows = mysqli_num_rows($result);


    // Fetch counts into an associative array
    $count_sql = "
        SELECT Department, COUNT(DISTINCT studentname) AS distinct_count
        FROM view1
        WHERE feedback_topic IS NOT NULL
          AND Department IN (
            'Computer Engineering',
            'Information Technology',
            'Artificial Intelligence and Data Science',
            'Electronics and Telecommunications'
          )
        GROUP BY Department
    ";
    $count_result = mysqli_query($conn, $count_sql);
    
    $counts = [
        'Computer Engineering'                     => 0,
        'Information Technology'                   => 0,
        'Artificial Intelligence and Data Science' => 0,
        'Electronics and Telecommunications'       => 0,
    ];
    if ($count_result) {
        while ($row = mysqli_fetch_assoc($count_result)) {
            $counts[$row['Department']] = (int)$row['distinct_count'];
        }
    
        // Render transposed table
        echo "<center>";
        echo "<h3>Distinct Students by Department</h3>";
        echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse; text-align:center;'>";
        // Header row: department names
        echo "<tr>";
        foreach ($counts as $dept => $_) {
            echo "<th>" . htmlspecialchars($dept) . "</th>";
        }
        echo "</tr>";
        // Data row: counts
        echo "<tr>";
        foreach ($counts as $dept => $cnt) {
            echo "<td>{$cnt}</td>";
        }
        echo "</tr>";
        echo "</table>";
        echo "</center>";
    } else {
        echo "<p><em>Error computing counts: " . mysqli_error($conn) . "</em></p>";
    }
    
    
// Display the filtered data in a table
echo "<p>Showing " . $num_rows . " of " . $num_rows1 . " rows</p>";
    
    echo "<center><table id='mytable'>";
    echo "<tr><th>Sr. No.</th><th>Roll No.</th><th>Name</th><th>Email ID</th><th>Class</th><th>Division</th><th>Department</th><th>Academic Year</th><th>Feedback Submitted</th></tr>";
    $sr_no = 1; // Initialize serial number
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $sr_no . "</td><td>" . $row["rollno"] . "</td><td>" . $row["studentname"] . "</td><td>" .
            $row["email_id"] . "</td><td>" . $row["Class"] . "</td><td>" . $row["Division"] . "</td><td>" . $row["Department"] .
            "</td><td>" . $row["academicyear"] . "</td><td>" . $row["feedback_topic"] . "</td></tr>";
        $sr_no++; // Increment serial number for the next row
    }
    echo "</table></center>";

    // Close the connection
    mysqli_close($conn);
?>
<script>
function Table2Excel() {
    var filters = "";
    // Get the selected filter values
    var rollno_filter = document.getElementsByName("rollno_filter")[0].value;
    var studentname_filter = document.getElementsByName("studentname_filter")[0].value;
    var email_id_filter = document.getElementsByName("email_id_filter")[0].value;
    var Class_filter = document.getElementsByName("Class_filter")[0].value;
    var Division_filter = document.getElementsByName("Division_filter")[0].value;
    var Department_filter = document.getElementsByName("Department_filter")[0].value;
    var academicyear_filter = document.getElementsByName("academicyear_filter")[0].value;
    var feedback_topic_filter = document.getElementsByName("feedback_topic_filter")[0].value;
    
    // Construct a string with the selected filter values
    if (rollno_filter !== "") filters += "RollNo_" + rollno_filter + "_";
    if (studentname_filter !== "") filters += "StudentName_" + studentname_filter + "_";
    if (email_id_filter !== "") filters += "EmailID_" + email_id_filter + "_";
    if (Class_filter !== "") filters += "Class_" + Class_filter + "_";
    if (Division_filter !== "") filters += "Division_" + Division_filter + "_";
    if (Department_filter !== "") filters += "Department_" + Department_filter + "_";
    if (academicyear_filter !== "") filters += "AcademicYear_" + academicyear_filter + "_";
    if (feedback_topic_filter !== "") filters += "FeedbackTopic_" + feedback_topic_filter + "_";
    
    // Remove trailing underscoresdownloadexcel
    filters = filters.replace(/_$/, "");
    
    // Set the filename with filters
    var filename = "Student_Feedback_count";
    if (filters !== "") {
        filename += "_" + filters;
    }
    filename += ".xls";
    
    // Download Excel with the constructed filename
    $("#mytable").table2excel({
        exclude: ".excludeThisClass",
        name: "Student_Feedback_count",
        filename: filename, // Set the filename
        preserveColors: true // set to true if you want background colors and font colors preserved
    });
}



function clearFilters() {
    document.getElementsByName("rollno_filter")[0].value = "";
    document.getElementsByName("studentname_filter")[0].value = "";
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