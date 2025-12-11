<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj stronę</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Panel Administratora</span>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-white">
                <h4 class="mb-0">Utwórz stronę</h4>
            </div>
            <div class="card-body">
                <form action="/admin/store" method="POST">
                    @csrf 
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tytuł Strony <span class="text-danger"></span></label>
                        <input type="text" name="title" class="form-control form-control-lg" placeholder="Tytuł" required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label fw-bold">Treść <span class="text-danger"></span></label>
                        <textarea id="summernote" name="content"></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/admin" class="btn btn-outline-secondary">Anuluj</a>
                        <button type="submit" class="btn btn-success px-5">Utwórz stronę</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link', 'picture']],
          ['view', ['codeview']]
        ]
      });
    </script>
</body>
</html>