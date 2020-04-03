<style>
  .nav-item.active {
        background-color: #024f57 !important;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <div class="container">
      <a class="navbar-brand" href="#">Stock Exchange</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav  ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="account.php"><?php echo $_SESSION['email']?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="account.php"><?php echo $_SESSION['name']?></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home
            <!--<span class="sr-only">(current)</span>-->
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reg.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <script>
  $(document).ready(function() {
  $('li.active').removeClass('active');
  $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
});
</script>
</body>