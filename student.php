<?php
 include 'config.php';
$pdo = pdo_connect_mysql();
//prepare the select statement
$stmt = $pdo->prepare('SELECT * FROM student ORDER BY surname ASC');
$stmt->execute();
$student = $stmt->fetchALL(PDO::FETCH_ASSOC); //fetches all the rows  an associtive array and stores them in a varible.
?>
<?php
include 'header.php';
?>
<div class="content read">
<h2> Student list</h2>
<a href ="add_student.php" class="create-content">Register Student</a>
<table>
    <thead>
        <tr>
            <td>Surname</td>
            <td>Othernames</td>
            <td>Sex</td>
            <td>Date of Birth</td>
            <td>Phone Number</td>
            <td>Religion</td>
            <td>Nationality</td>
            <td>Residential Address</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($student as $row):?>
        <tr>
            <td><?=$row['surname']?></td>
            <td><?=$row['other_names']?></td>
            <td><?=$row['sex']?></td>
            <td><?=$row['date_of_birth']?></td>
            <td><?=$row['phone_number']?></td>
            <td><?=$row['religion']?></td>
            <td><?=$row['nationality']?></td>
            <td><?=$row['residential_address']?></td>
           
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
<?php
 'footer.php';
?>