<?php
include 'config.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = pdo_connect_mysql();
$fullname = isset($_GET['fullname']) ? $_GET['fullname'] : null;

if ($fullname) {
    try {
        // Delete the staff member based on fullname
        $stmt = $pdo->prepare('DELETE FROM staff WHERE fullname = ?');
        if ($stmt->execute([$fullname])) {
            header('Location: staff.php');
            exit; // Ensure script stops after redirection
        } else {
            exit('Failed to delete staff member.');
        }
    } catch (PDOException $e) {
        exit('Database error: ' . $e->getMessage());
    }
} else {
    exit('No fullname specified!');
}
?>
