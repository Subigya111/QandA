<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body{font-family:'Segoe UI',sans-serif;background:linear-gradient(135deg,#fdf2f8,#eef2ff)}
        .card{border:none;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,.08)}
        .card-header{background:linear-gradient(90deg,#7c3aed,#ec4899);color:#fff;font-weight:600}
        .form-control{border-radius:10px}
        .form-check{margin-bottom:.4rem}
        .category-emoji{margin-right:.35rem}
        .btn-primary{background:linear-gradient(90deg,#8b5cf6,#ec4899);border:none;border-radius:999px}
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ask question</div>
                <div class="card-body">
                    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
                    <form method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Question</label>
                            <textarea name="question" id="question" rows="1" class="form-control" placeholder="Write your question. Keep it short" required></textarea>
                        </div>
                        <div class="mb-3">
                            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Description(optional)"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Picture</label>
                            <input id="avatar" name="image" type="file" accept="image/*" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Select a category </label>
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="tech" value="Tech" required>
                                    <label class="form-check-label" for="tech">💻Tech</label>
                                </div>
                                ||
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="life" value="Life" required>
                                    <label class="form-check-label" for="life">🌱Life</label>
                                </div>
                                ||
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="sports" value="Sports" required>
                                    <label class="form-check-label" for="sports">⚽Sports</label>
                                </div>
                                ||
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="music" value="Music" required>
                                    <label class="form-check-label" for="music">🎵Music</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Ask</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
