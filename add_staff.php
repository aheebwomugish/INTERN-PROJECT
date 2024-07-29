<?php
include "header.php";


$success_msg = '';


include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Step 2: Validate and Sanitize Input Data
    $full_name = htmlspecialchars($_POST['full_name']);
    $gender = htmlspecialchars($_POST['gender']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $username = htmlspecialchars($_POST['username']);
    $password = sha1($_POST['password']);
    $usertype = htmlspecialchars($_POST['usertype']);

    // Step 3: Connect to the Database
    $pdo = pdo_connect_mysql();

    // Step 4: Insert Validated Data into the Database
    $stmt = $pdo->prepare('INSERT INTO staff (fullname, gender, telephone, username, password, usertype) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$full_name, $gender, $telephone, $username, password_hash($password, PASSWORD_DEFAULT), $usertype]);

    // Set success message
    $success_msg = 'Staff has been added successfully!';

    // Redirect to the staff list page after registration
    //header("Location: staff_list.php");
    //exit;
}


?>
<div class="content update">
	<h2>REGISTER STAFF</h2>
	<form action="" method="post">
		<label>Staff Name</label>
		<label>Gender </label>
		<input type="text" name="full_name">
		<input type="text" name="gender">


		<label>Telephone</label>
		<label>Username </label>
		<input type="text" name="telephone">
		<input type="text" name="username">


		<label>Password </label>
		<label>Usertype </label>
		<input type="password" name="password">
		<select name="usertype">
			<option value="">select</option>
			<option value="admin">admin</option>
			<option value="registrar">registrar</option>
		</select>
		<input type="submit" name="submit" value="Register">
	</form>
	<?php if($success_msg):?>
		<p><?=$success_msg?></p>
	<?php endif ?>
</div>
<?php
include "footer.php";
?>