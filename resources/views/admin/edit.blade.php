<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edycja Strony</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Panel Administratora</span>
            <a href="/" class="btn btn-light btn-sm">Zobacz Stronę</a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-white">
                <h4 class="mb-0">Edytuj stronę: {{ $page->title }}</h4>
            </div>
            <div class="card-body">
                <form action="/admin/update/{{ $page->id }}" method="POST">
                    @csrf 
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tytuł Strony</label>
                        <input type="text" name="title" class="form-control form-control-lg" value="{{ $page->title }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Treść</label>
                        <textarea id="summernote" name="content">{{ $page->content }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/admin" class="btn btn-outline-secondary">Anuluj</a>
                        <button type="submit" class="btn btn-success px-5">Zapisz zmiany</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
    <script>
      $('#summernote').summernote({
        placeholder: '...',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
    <script>

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukces!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if($errors->any())
             Swal.fire({
                icon: 'error',
                title: 'Ups...',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
            });
        @endif
    </script>
</body>
</html>