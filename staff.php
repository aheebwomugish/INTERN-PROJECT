<?php
 include 'config.php';
$pdo = pdo_connect_mysql();
//prepare the select statement
$stmt = $pdo->prepare('SELECT * FROM staff ORDER BY fullname ASC');
$stmt->execute();
$staff = $stmt->fetchALL(PDO::FETCH_ASSOC); //fetches all the rows  an associtive array and stores them in a varible.
?>
<?php
include 'header.php';
?>
<div class="content read">
<h2> Staff list</h2>
<a href ="add_staff.php" class="create-content">Register Staff</a>
<table>
    <thead>
        <tr>
            <td>Staff Name</td>
            <td> Gender</td>
            <td>Telephone</td>
            <td>Username</td>
            <td>Usertype</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($staff as $row):?>
        <tr>
            <td><?=$row['fullname']?></td>
            <td><?=$row['gender']?></td>
            <td><?=$row['telephone']?></td>
            <td><?=$row['username']?></td>
            <td><?=$row['usertype']?></td>
            <td class="actions">
                <a href="edit_staff.php?id=<?=$row['staff_id']?>" class= "edit">Edit</a>
                <a href="delete_staff.php?id=<?$row['staff_id']?>" class= "trash">Delete</a>

               

            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
<?php
 'footer.php';
?>