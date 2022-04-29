<?php
    define('TITLE', 'Register');
    include('templates/header.html');
    print '<h2 class="mt-5">Register as an user </h2>';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!empty($_POST['userName']) &&
         !empty($_POST['fullName']) &&
         !empty($_POST['password']) &&
         !empty($_POST['birthDate']) &&
         !empty($_POST['zodicSign']) &&
         !empty($_POST['favAnimal'])){

            $affectedRows = create_user($_POST['userName'], $_POST['fullName'], $_POST['password'], $_POST['birthDate'], $_POST['zodicSign'], $_POST['favAnimal']);
            if($affectedRows == 1){
                header("Location: http://localhost/mandatory/index.php");
                die();
            } else {
                print '<p class="text-danger"> En fejl opstod under bruger oprettelsen.  </p>'; 
            }
        } else {
            print '<p class="text-danger"> Kontroller dine inputs!</p>';
        }
    }
?>

<form action="register.php" method="post">
  <div class="mb-3">
    <label for="userName" class="form-label">Email address</label>
    <input type="text" class="form-control" name="userName" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="fullName" class="form-label">Fulde Navn</label>
    <input type="text" class="form-control" name="fullName">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" >
  </div>
  <div class="mb-3">
    <label for="birthDate" class="form-label">Birth Date</label>
    <input type="date" class="form-control" name="birthDate" >
  </div>
  <select class="form-select" name="zodicSign"  aria-label="Default select example">
  <option selected>Vælg dit stjernetegn</option>
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
    <input type="text" class="form-control" name="favAnimal" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>