<?php
include "header.php";


$success_msg = '';


include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Step 2: Validate and Sanitize Input Data
    $surname = htmlspecialchars($_POST['surname']);
    $other_names = htmlspecialchars($_POST['other_names']);
    $sex = htmlspecialchars($_POST['sex']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $religion = htmlspecialchars($_POST['religion']);
    $nationality= htmlspecialchars($_POST['nationality']);
    $residential_address = htmlspecialchars($_POST['residential_address']);
    

    // Step 3: Connect to the Database
    $pdo = pdo_connect_mysql();

    // Step 4: Insert Validated Data into the Database
    $stmt = $pdo->prepare('INSERT INTO student (surname, other_names, sex, date_of_birth, phone_number, religion, nationality, residential_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$surname, $other_names, $sex, $date_of_birth, $phone_number, $religion, $nationality, $residential_address]);

    // Set success message
    $success_msg = 'Student has been added successfully!';

    // Redirect to the staff list page after registration
    //header("Location: staff_list.php");
    //exit;
}


?>
<div class="content update">
	<h2>REGISTER STUDENT</h2>
	<form action="" method="post">
		<label>Surname</label>
		<label>Other Names </label>
		<input type="text" name="surname">
		<input type="text" name="other_name">


		<label>Sex</label>
		<label>Date_of_Birth</label>
		<input type="text" name="sex">
		<input type="date" name="date_of_birth">


		<label>Phone number</label>
		<label>Religion</label>
        <input type="text" name="phone_number">
		<input type="text" name="religion">

        <label>Nationality</label>
		<label>Residential <Address></Address></label>
        <input type="text" name="nationality">
		<input type="text" name="residential address">
		
		
		<input type="submit" name="submit" value="Register">
	</form>
	<?php if($success_msg):?>
		<p><?=$success_msg?></p>
	<?php endif ?>
</div>
<?php
include "footer.php";
?>