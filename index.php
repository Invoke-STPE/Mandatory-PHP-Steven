<?php 
include('includes/functions.php');

    if (!isset($_COOKIE['loggedin'])) {
        header("Location: http://localhost/login.php");
        die();
    }

    if (isset($_COOKIE['userName'])){
       $rows = get_user_information($_COOKIE['userName']);
       $storedId = $rows['Id'];
       $storedUserName = $rows['userName'];
       $storedFullName = $rows['fullName'];
       $storedBirthDate = $rows['birthDate'];
       $storedVisitCount = $rows['visitCount'];
       $storedZodicSign = $rows['zodicSign'];
       $storedFavAnimal = $rows['favAnimal'];
    }

    include('templates/header.html');
?>
<h3 class="mt-5">Dine informationer:</h1>
<div class="container">
    <div class="mb-3">
        <label for="userName" class="form-label">Bruger Navn</label>
        <input type="text" class="form-control" name="userName" value="<?= $storedUserName?>" disabled>
    </div>
    <div class="mb-3">
        <label for="fullName" class="form-label">Fulde Navn</label>
        <input type="text" class="form-control" name="fullName" value="<?= $storedFullName?>" disabled>
    </div>
      <div class="mb-3">
        <label for="birthDate" class="form-label">Birth Date</label>
        <input type="date" class="form-control" name="birthDate" value="<?= $storedBirthDate?>" disabled >
      </div>
      <div class="mb-3">
        <label for="zodicSign" class="form-label">Stjernetegn</label>
        <select class="form-select" name="zodicSign"  aria-label="Default select example" disabled>
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
    </div>
      <div class="mb-3">
        <label for="favAnimal" class="form-label">Visit count</label>
        <input type="text" class="form-control" name="favAnimal" value="<?= $storedVisitCount?>" disabled >
      </div>
      <div class="mb-3">
        <label for="favAnimal" class="form-label">Favorite Animal </label>
        <input type="text" class="form-control" name="favAnimal" value="<?= $storedFavAnimal?>" disabled >
      </div>
      <a class="btn btn-primary" href="edit.php">Edit Information</a>
</div>

<?php include('templates/footer.html'); ?>
