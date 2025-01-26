<?php 
if (isset($_SESSION['admin_id']) && strlen($_SESSION['admin_id']) != 0) {
    $login_logout = '/logout';
    $text = 'Log out';
    $button_color = 'text-danger';
} else {
  $login_logout = '/login';
  $text = 'Log in';
  $button_color = '';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href=<?=$_SERVER['DOCUMENT_ROOT']."/public/css/main.css"?> />
  </head>
  <body class="d-flex flex-column min-vh-100">
    <header>
      <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href='/'>Book management</a>
          <form class="d-flex" role="search" action="">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
          <a class="d-flex <?=$button_color?>" href="<?=$login_logout?>"><?=$text?></a>
        </div>
      </nav>
    </header>