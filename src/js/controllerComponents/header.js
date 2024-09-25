class Header extends HTMLElement {
    connectedCallBack() {
        this.innerHTML = `
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
        `;
    }
}

customElements.define('navbar-header', Header);