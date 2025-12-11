<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }} - Systemy internetowe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #93e0c4ff; }
        .page-content img { max-width: 100%; height: auto; }
        .hero-section {
            background: (#13c61cff 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        .footer { background: linear-gradient(135deg, #667eea 0%, #13c61cff 100%); color: #ccc; padding: 3rem 0; margin-top: 3rem; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">

        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Serwisy internetowe zaliczenie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @foreach($menu as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $item->slug == $page->slug ? 'active' : '' }}" 
                               href="/{{ $item->slug }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <a class="btn btn-outline-dark btn-sm" href="/admin">Panel administratora</a>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">{{ $page->title }}</h1>
            <p class="lead">Proszę o zaliczenie przedmiotu, bardzo pięknie dziękuje!</p>
        </div>
    </header>

    <div class="container flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5 page-content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center">
    <footer class="bg-light text-black mt-8 py-4">
        <div class="container">
            <p class="mb-0">Tymoteusz Trębacz - Serwisy internetowe - Zaliczenie - Grudzień 2025</p> 
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>