  <?php

include "session.php";

?>  

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="http://localhost/dejamood/main/index.php">
      <img src="http://localhost/dejamood/main/images/nav_bar_logo.png" style="max-height: 75px" class="py-2 px-2">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
 
    </a>
    <script>document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Add a click event on each of them
$navbarBurgers.forEach( el => {
  el.addEventListener('click', () => {

    // Get the target from the "data-target" attribute
    const target = el.dataset.target;
    const $target = document.getElementById(target);

    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    el.classList.toggle('is-active');
    $target.classList.toggle('is-active');

  });
});

}); </script>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="http://localhost/dejamood/main/index.php">
        Home
      </a>

      <a class="navbar-item" href="http://localhost/dejamood/main/moodlog.php">
        Mood log
      </a>
      <a class="navbar-item" href="http://localhost/dejamood/main/chart/visualisation.php">
        Mood Summary
      </a>

      <a class="navbar-item" href="http://localhost/dejamood/main/user/account/myaccount.php">
        My Account
      </a>

</div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        
          <?php

              if($loggedin){
              echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='http://localhost/dejamood/main/user/login/logout.php'>   Log out
              </a>";
              } 
              ?>
        </div>
      </div>
    </div>
  </div>
</nav>