<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">tiMovie</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/movies/data">Data Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/movies/create">Input Movie</a>
                </li>
            </ul>

            <form action="/" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" name="search" placeholder="Search">
                <button class="btn btn-outline-light">Search</button>
            </form>
        </div>
    </div>
</nav>