<?php
require("master.php");

class loginLayout extends masterLayout
{
  function main()
  {
?>
    <div class="container" style="max-width: var(--breakpoint-md);">
      <div class="card">
        <h4 class="card-header">Login</h4>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="inputEmail_">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="inputEmail_">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 cold-form-label" for="inputPassword4">Password</label>
            <div class="col-md-9">
              <input type="password" class="form-control" id="inputPassword4">
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="c99">
              <label class="custom-control-label" for="c99">
                Remember me
              </label>
            </div>
          </div>
          <div class="form-group">Don't have an account yet? <a href="#">Sign in</a> </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </div>
      </div>
    </div>

<?php
  }
}
?>