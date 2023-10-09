<style>
  .content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 60vh;
  }
</style>

<!-- LE FORMULAIRE DE LOGIN -->
<form method="post" class="border-green login" id="loginForm">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>
  <input type="submit" value="Login" id="loginSubmit">
  <p class="error"
    style="color:black;text-align: center;font-size: 15px;background: #ff000077;padding:0.6rem;display: none;"></p>
</form>

<script>
  // Ajout de l'event submit sur le formulaire
  $('#loginForm').submit(function (e) {
    // On empêche le comportement par défaut du formulaire
    e.preventDefault();
    // On envoie la requête ajax
    request(
      "<?php echo WEBROOT . "src/app/vue/Account/ajax.php" ?>",
      "check",
      "Utilisateurs",
      {
        username: $('#username').val(),
        password: $('#password').val()
      },
      function (success, response) {
        if (success) {
          // On redirige vers la page d'accueil
          window.location.href = "<?php echo WEBROOT . "Redacteur" ?>";
        } else {
          // On affiche l'erreur
          $('.error').html(response.responseText);
        }
      }
    )
  })
</script>