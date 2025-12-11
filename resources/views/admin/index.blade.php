<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel Administratora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light"> 

   <nav class="navbar navbar-light bg-white mb-5 shadow">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Panel Administratora</span>
        <a href="/" class="btn btn-outline-dark btn-sm">Wróć do strony głównej</a>
    </div>
</nav>

    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Lista Stron</h4>
                
                <a href="/admin/create" class="btn btn-success">
                    Dodaj nową stronę
                </a>
            </div>
            <div class="card-body">
                
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 50px;">ID</th>
                            <th>Tytuł strony</th>
                            <th>Link do strony</th>
                            <th style="width: 200px;">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td class="fw-bold">{{ $page->title }}</td>
                            <td>
                                <a href="/{{ $page->slug }}" target="_blank" class="text-decoration-none">
                                    /{{ $page->slug }} <small class="text-muted">↗</small>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/admin/edit/{{ $page->id }}" class="btn btn-primary btn-sm">
                                        Edytuj
                                    </a>

                                    <form action="/admin/delete/{{ $page->id }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć stronę?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($pages->isEmpty())
                    <div class="text-center py-5">
                        <h5 class="text-muted mb-3">Brak stron w bazie danych.</h5>
                        <a href="/admin/create" class="btn btn-primary">Dodaj pierwszą stronę</a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Gotowe!',
                text: '{{ session('success') }}', 
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if($errors->any())
             Swal.fire({
                icon: 'error',
                title: 'Wystąpił błąd',
                html: '<ul style="text-align: left;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
            });
        @endif
    </script>

</body>
</html>