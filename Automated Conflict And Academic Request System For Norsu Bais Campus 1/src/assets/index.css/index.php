<?php
session_start();
include("../model/db.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;

        if($row['role'] == 'admin'){
            header("Location: ../public/admin/dashboard.php");
        } elseif($row['role'] == 'staff'){
            header("Location: ../public/staff/dashboard.php");
        } else {
            header("Location: ../public/residents/dashboard.php");
        }
    } else {
        echo "Invalid Login";
    }
}
include("includes/header.php");
?>

<div class="container">
    <h3>Login</h3>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>
