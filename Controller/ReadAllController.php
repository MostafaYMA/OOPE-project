<?php
require_once 'Model/ReadClass.php';
$read = new ReadClass();
$result = $read->readAll();
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead>";
    echo "<tr>";
     echo "<th>ID</th>";
    echo "<th>AdminID</th>";
    echo "<th>Name</th>";
    echo "<th>Address</th>";
    echo "<th>Phase</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['AdminID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Phase'] . "</td>";
        echo "<td>";
        echo "<a href='View/read.php?id=" . $row['ID'] . "' title='View Record' data-toggle='tooltip'>
							<span class='glyphicon glyphicon-eye-open'></span>
						  </a>";
        echo "<a href='View/update.php?id=" . $row['ID'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
        echo "<a href='View/delete.php?id=" . $row['ID'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    // Free result set
    mysqli_free_result($result);
} else {
    echo "<p class='lead'><em>No records were found.</em></p>";
}
?>