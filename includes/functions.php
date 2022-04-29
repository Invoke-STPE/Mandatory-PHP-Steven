<?php 
// A collection of functions.
function get_user_information($userName) {
    include('mysqli_connect.php');
    $userName = prepare_string($userName);
    $sqlGetUserInfo = "SELECT * FROM `users` where userName = '" . $userName ."'";
    $result = mysqli_query($dbc, $sqlGetUserInfo);
    return mysqli_fetch_array($result);
}

function get_user_credientials($userName) {
    include('mysqli_connect.php');
    $userName = prepare_string($userName);
    $query = "SELECT userName, password FROM users where userName = '".$userName."'";

    return mysqli_query($dbc, $query);

}

function increment_user_visit($userName) {
    include('mysqli_connect.php');
    $userName = prepare_string($userName);
    $sqlUpdateVisitCount = "UPDATE users SET visitCount = visitCount + 1 WHERE userName = '".$userName."'";
    mysqli_query($dbc, $sqlUpdateVisitCount);
}

function update_user_information($userName, $fullName, $birthDate, $zodicSign, $favAnimal) {
    include('mysqli_connect.php');
    $userName = prepare_string($userName);
    $fullName = prepare_string($fullName);
    $birthDate = prepare_string($birthDate);
    $zodicSign = prepare_string($zodicSign);
    $favAnimal = prepare_string($favAnimal);

    $query = "UPDATE users SET userName = '$userName', fullName = '$fullName', birthDate = '$birthDate' , zodicSign = '$zodicSign', favAnimal = '$favAnimal' where userName = '$userName'";
    mysqli_query($dbc, $query);

    return mysqli_affected_rows($dbc);
}

function create_user($userName, $fullName, $password, $birthDate, $zodicSign, $favAnimal){
    include('includes/mysqli_connect.php');
    $userName = prepare_string($userName);
    $fullName = prepare_string($fullName);
    $password = prepare_string($password);
    $birthDate = prepare_string($birthDate);
    $zodicSign = prepare_string($zodicSign);
    $favAnimal = prepare_string($favAnimal);

    $query = "INSERT INTO users (userName, fullName, password, birthDate, zodicSign, favAnimal) VALUES ('$userName', '$fullName', '$password', '$birthDate', '$zodicSign', '$favAnimal')";
    print(mysqli_query($dbc, $query));
    
    return mysqli_affected_rows($dbc);
}


function prepare_string($str) {
    include('includes/mysqli_connect.php');
    return mysqli_real_escape_string($dbc, trim(strip_tags($str)));
}