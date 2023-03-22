<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style/login_page.css">
    <link href="https://fonts.cdnfonts.com/css/halo" rel="stylesheet">
</head>

<body>
  <div id="login_box">
    <div id="title">
      <br>
      <h1>Power Tycoon</h1>
    </div>
    <div id="page_statut">
      <h2>Connection</h2>
    </div>
    <form method="post" action="login_page.php">
      <br>
      <input type="email" name="email" placeholder="Email" required><br><br>
      <input type="password" name="passwordUn" placeholder="Mot de passe" required><br><br>
      <br>
    
      <input type="submit" id="btn1" name="login_btn" value="Connection">

      <div class="ligne"><span class="ou">ou</span></div>
    </form>

    <form>
        <input type="submit" name="register_btn" value="Ouvrir un compte">
    </form>

    </form>
  </div>