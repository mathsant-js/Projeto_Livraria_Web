<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
</head>
<body>
    <!--
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fs-4 text-warning" href="#">
                <img src="../assets/icons/logo.svg" alt="Logo" width="50" height="40" class="d-inline-block align-text-top">
                Open Book
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <img src="../assets/icons/dropdownicon.svg" alt="Dropdown" width="40" height="32" class="d-inline-block align-text-top">
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Autores</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex" role="search">
                <button class="btn" type="submit">
                    <img src="../assets/icons/search.svg" alt="Search" width="40" height="24" class="d-inline-block align-text-top">
                </button> 
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </nav>
-->
<nav class="navbar navbar-expand-lg border-bottom border-warning border-4 navbar-dark bg-dark">
  <div class="container-fluid mx-5">
    <!-- Logo -->
    <a class="navbar-brand fs-4 text-warning" href="#">
        <img src="../assets/icons/logo.svg" alt="Logo" width="50" height="40" class="d-inline-block align-text-top">
            Open Book
    </a>
    <!-- Toggle -->
    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- SideBar -->
    <div class="offcanvas offcanvas-start navbar-dark bg-dark" tabindex="-1" id="offcanvasWithBothOptions" data-bs-scroll="true" aria-labelledby="offcanvasWithBothOptionsLabel">
      <div class="offcanvas-header">
        <!-- Logo -->
        <a class="navbar-brand fs-4 text-warning" href="#">
            <img src="../assets/icons/logo.svg" alt="Logo" width="50" height="40" class="d-inline-block align-text-top">
                Open Book
        </a>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body my-2">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 me-5">
          <li class="nav-item mx-2">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#">Livros</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#">Autores</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Pesquise Aqui" aria-label="Search">
          <button class="btn btn-outline-warning" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
  </div>
</nav>
</body>
</html>