<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style/login_page.css">
</head>

<body>
  <div id="login_box">
    <div id="title">
      <br>
      <h1>Power Tycoon</h1>
    </div>
    <div id="page_statut">
      <h2>Création de compte</h2>
    </div>
    <form method="post" action="register_page.php">
      <br>
      <input type="email" name="email" placeholder="Email" required><br><br>
      <input type="password" name="passwordUn" placeholder="Mot de passe" required><br><br>
      <input type="password" name="passwordDe" placeholder="Confirmation du Mot de passe" required><br><br>
      <br>
      <input type="submit" id="btn1" name="login_btn" value="Création">
    </form>
  </div>
  <script>
    // Validation des champs de mot de passe
    var passwordUn = document.getElementsByName("passwordUn")[0];
    var passwordDe = document.getElementsByName("passwordDe")[0];
    var submitBtn = document.getElementById("btn1");

    function validatePassword() {
      if (passwordUn.value != passwordDe.value) {
        passwordDe.setCustomValidity("Les mots de passe ne correspondent pas");
      } else {
        passwordDe.setCustomValidity("");
      }
    }

    passwordUn.addEventListener("change", validatePassword);
    passwordDe.addEventListener("change", validatePassword);
    submitBtn.addEventListener("click", validatePassword);
  </script>

<?php
  include 'database.php';
  global $db;

  if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['passwordUn'];

    // Vérifier si l'email existe déjà
    $q = $db->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
    $q->execute(['email' => $email]);
    $result = $q->fetch();
    $count = $result['count'];

    if ($count > 0) {
      echo "<script>document.getElementById('email')[0].setCustomValidity('Cet e-mail est déjà associé à un compte');</script>";
    } else {
      echo "<script>document.getElementById('email').setCustomValidity('Cet e-mail est déjà associé à un compte');</script>";

      $q = $db->prepare("INSERT INTO users(email, password) VALUES(:email, :password)");
      $q->execute([
        'email' => $email,
        'password' => $password
      ]);
    }
  }
  ?>
</body>

</html>