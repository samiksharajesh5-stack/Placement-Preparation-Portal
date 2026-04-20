<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM companies");
?>

<table border="1">
<tr>
<th>Company Name</th>
<th>Package</th>
<th>Eligibility</th>
<th>Roles</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['company_name']}</td>
            <td>{$row['package']}</td>
            <td>{$row['eligibility']}</td>
            <td>{$row['roles']}</td>
          </tr>";
}
?>
</table>
