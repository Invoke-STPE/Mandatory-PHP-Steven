<?php 
// $loggedin = false;
$error = false;

// include('includes/mysqli_connect.php');
include('includes/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!empty($_POST['userName']) && !empty($_POST['password'])) {

        $givenUserName = strtolower($_POST['userName']);
        $result = get_user_credientials($_POST['userName']);
        if($result) {
            $row = mysqli_fetch_array($result);
            $storedUserName = $row['userName'];
            $storedPassword = $row['password'];

            if ( (strtolower($_POST['userName']) == strtolower($storedUserName)) && (password_verify($_POST['password'], $storedPassword)) ){

                setcookie("loggedin", true, time()+3600);
                setcookie("userName", $_POST['userName'], time()+3600 );
                increment_user_visit($storedUserName);
                header("Location: http://localhost/index.php");
                die();
            } else {
                // Wrong login credientials.
                $error = 'Dine login informationer er forkerte.!';
            }
        }
    } else {
        // Missing field.
        $error = 'Du mangler et felt.';
    }
}
if (isset($_COOKIE['loggedin'])) {
    if ($_COOKIE['loggedin'] == true) {
        header("Location: http://localhost/index.php");
        die();
    }
}
    define('TITLE', 'Login');
    include('templates\header.html');

    if ($error) {
        print '<p class="text-danger">' . $error . '</p>';
    } 
    ?>
        
    <div class="container">
    <h1 class="text-center mt-5">Mandatory User Information</h1>
        <div class="row w-100 justify-content-center">
            <div class="col-6">
                <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="userName" class="form-label">BrugerNavn</label>
                    <input type="userName" class="form-control"  name="userName">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control"  name="password">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mb-3">Log in</button>
                    <a href="register.php" class="flex-end">Or Register here </a>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php 
    include('templates/footer.html');
?>