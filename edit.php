<?php 
include('includes/functions.php');

    if (!isset($_COOKIE['loggedin'])) {
        header("Location: http://localhost/mandatory/login.php");
        die();
    }

    if (isset($_COOKIE['userName'])){
       $row = get_user_information($_COOKIE['userName']);
       $storedId = $row['Id'];
       $storedUserName = $row['userName'];
       $storedFullName = $row['fullName'];
       $storedBirthDate = $row['birthDate'];
       $storedZodicSign = $row['zodicSign'];
       $storedFavAnimal = $row['favAnimal'];
    }


    // Change user information
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!empty($_POST['userName']) &&
         !empty($_POST['fullName']) &&
         !empty($_POST['birthDate']) &&
         !empty($_POST['zodicSign']) &&
         !empty($_POST['favAnimal'])){
            
            $affectedRows = update_user_information($_POST['userName'], $_POST['fullName'],  $_POST['birthDate'], $_POST['zodicSign'], $_POST['favAnimal']);
            if($affectedRows == 1){
                header("Location: http://localhost/mandatory/index.php");
                die();
            } else {
                print '<p class="text-danger"> En fejl opstod<br>' . mysqli_error($affectedRows) . '</p><p>The query being run was: ' . '</p>'; 
            }

        } else {
            print '<p class="text-danger"> Kontroller dine inputs!</p>';
        }
    }

    include('templates/header.html');
?>
<h3>Dine informationer:</h1>
<div class="container">
    <form action="edit.php" method="post">
        <div class="mb-3">
            <label for="userName" class="form-label">Email address</label>
            <input type="text" class="form-control" name="userName" value="<?= $storedUserName?>" >
          </div>
        <div class="mb-3">
            <label for="fullName" class="form-label">Fulde Navn</label>
            <input type="text" class="form-control" name="fullName" value="<?= $storedFullName?>" >
          </div>
          <div class="mb-3">
            <label for="birthDate" class="form-label">Birth Date</label>
            <input type="date" class="form-control" name="birthDate" value="<?= $storedBirthDate?>"  >
          </div>
          <label for="zodicSign" class="form-label">stjernetegn</label>
          <select class="form-select" name="zodicSign" >
          <option selected value="<?= $storedZodicSign?>"><?= $storedZodicSign?></option>
          <option value="vædder">Vædder</option>
          <option value="tyr">Tyr</option>
          <option value="tvilling">Tvilling</option>
          <option value="krebs">Krebs</option>
          <option value="Løve">Løve</option>
          <option value="jomfrue">Jomfrue</option>
          <option value="Vægt">Vægt</option>
          <option value="skorpien">Skorpien</option>
          <option value="skytte">Skytte</option>
          <option value="stenbuk">Stenbuk</option>
          <option value="vandmand">Vandbuk</option>
          <option value="fisk">Fisk</option>
        </select>
          <div class="mb-3">
            <label for="favAnimal" class="form-label">Favorite Animal </label>
            <input type="text" class="form-control" name="favAnimal" value="<?= $storedFavAnimal?>"  >
          </div>
          <button type="submit" class="btn btn-primary">Save Information</a>
    </form>
</div>

<?php include('templates/footer.html'); ?>
