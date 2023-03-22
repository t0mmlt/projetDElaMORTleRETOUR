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
  
  
  <?php
  include 'database.php';
  global $db;

  if(isset($_POST['email']) && isset($_POST['passwordUn']) && isset($_POST['passwordDe'])){
      $email = $_POST['email'];
      $passwordUn = $_POST['passwordUn'];

      if ($passwordUn == $_POST['passwordDe']) {
          $password = password_hash($passwordUn, PASSWORD_DEFAULT);
          $q = $db->prepare("INSERT INTO users(email, password) VALUES(:email, :password)");
          $q->execute([
              'email' => $email,
              'password' => $password
          ]);
          echo "Compte créé avec succès.";
      } else {
          echo "Les mots de passe ne correspondent pas.";
      }
  }
  ?>
</body>
</html>