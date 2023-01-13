<?php 
use App\Services\Page;
Page::part("head");
?>

<noscript> <META HTTP-EQUIV="Refresh" CONTENT="0;URL=/nojs"> </noscript>
<form method="post" action="/auth/register">
  <div class="form-element">
    <label>Login</label>
    <input type="text" name="username" required />
    <?php if($_GET['login1'] == "nul") Page::errors("Login is not unique!"); ?>
    <?php if($_GET['login2'] == "min6") Page::errors("Minimum 6 symbols!"); ?>
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" required />
    <?php if($_GET['pass1'] == "min6") Page::errors("Minimum 6 symbols!"); ?>
    <?php if($_GET['pass2'] == "ns") Page::errors("Must be both latin letters and numbers!"); ?>
  </div>
  <div class="form-element">
    <label>Confirm password</label>
    <input type="password" name="confirm_password" required />
    <?php if($_GET['pass3'] == "not") Page::errors("Passwords must match!"); ?>
  </div>
  <div class="form-element">
    <label>Email</label>
    <input type="email" name="email" required />
    <?php if($_GET['email2'] == "not") Page::errors("Email does not match the format!"); ?>
    <?php if($_GET['email1'] == "nul") Page::errors("Email is not unique!"); ?>
  </div>
  <div class="form-element">
    <label>Name</label>
    <input type="text" name="full_name" required />
    <?php if($_GET['name1'] == "min2") Page::errors("Minimum 2 symbols!"); ?>
    <?php if($_GET['name2'] == "not") Page::errors("Name must contain only letters!"); ?>
  </div>
  <button type="submit" name="register" value="register">Register</button>
</form>

<?php 
Page::part("footer");
?>