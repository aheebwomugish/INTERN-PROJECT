<?php
include 'config.php';
$pdo = pdo_connect_mysql();
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Fetch the staff member details
    $stmt = $pdo->prepare('SELECT * FROM staff WHERE staff_id = ?');
    $stmt->execute([$id]);
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$staff) {
        exit('Staff member not found!');
    }

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $telephone = $_POST['telephone'];
        $username = $_POST['username'];
        $usertype = $_POST['usertype'];

        // Update the staff member details
        $stmt = $pdo->prepare('UPDATE staff SET fullname = ?, gender = ?, telephone = ?, username = ?, usertype = ? WHERE id = ?');
        $stmt->execute([$fullname, $gender, $telephone, $username, $usertype, $id]);

        header('Location: staff.php');
    }
} else {
    exit('No ID specified!');
}
?>
<?php
 include 'header.php' 
 ?>
<div class="content update">
    <h2>Update Staff</h2>
<form method="post">
    <label for="fullname">Full Name</label>
    <input type="text" name="fullname" value="<?=$staff['fullname']?>" id="fullname" required>
    <label for="gender">Gender</label>
    <input type="text" name="gender" value="<?=$staff['gender']?>" id="gender" required>
    <label for="telephone">Telephone</label>
    <input type="text" name="telephone" value="<?=$staff['telephone']?>" id="telephone" required>
    <label for="username">Username</label>
    <input type="text" name="username" value="<?=$staff['username']?>" id="username" required>
    <label for="usertype">Usertype</label>
    <input type="text" name="usertype" value="<?=$staff['usertype']?>" id="usertype" required>
    <input type="submit" name="submit" value="Update">
</form>
</div>
<?php
 include 'footer.php' 
 ?>
   
