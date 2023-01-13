<?php 
use App\Services\Page;
Page::part("head");
?>

<noscript> <META HTTP-EQUIV="Refresh" CONTENT="0;URL=/nojs"> </noscript>
<script src="app/controllers/loginBTN.js"></script>
<form method="post" id="loginform">
  <div class="form-element">
    <label>Login</label>
    <input type="text" name="login"  />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password"  />
  </div>
  <div class="error">
  </div>
  <button type="submit">Log in</button>
</form>

<?php 
Page::part("footer");
?>