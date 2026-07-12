<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title> Edit Question</title>
@include('layouts.navbar');
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    body{font-family:'Poppins',sans-serif;}
    .card{border:none;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,.08)}
    .card-header{background:linear-gradient(90deg,#7c3aed,#ec4899);color:#fff;font-weight:600}
    .form-control{border-radius:10px}
    .form-check{margin-bottom:.4rem}
    .category-emoji{margin-right:.35rem}
    .btn-primary{background:linear-gradient(90deg,#8b5cf6,#ec4899);border:none;border-radius:999px}
</style>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Question</div>
                <div class="card-body">
                    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
                    @if($errors->any())
                        <div class="alert alert-danger rounded-4">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('updateQuestion', $question) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="question" class="form-label fw-semibold">Question</label>
                            <textarea name="question" id="question" rows="1" class="form-control" placeholder="Enter your question" required>{{  $question->question }}</textarea>
                        </div>
                        <div class="mb-3">
                            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Add more details (optional)">{{  $question->description }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Select a category</label>
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="tech" value="Tech" required {{  $question->category == 'Tech' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tech">💻Tech</label>
                                </div>
                                ||
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="life" value="Life" {{  $question->category == 'Life' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="life">🌱Life</label>
                                </div>
                                ||</span>
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="sports" value="Sports" {{  $question->category == 'Sports' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sports">⚽Sports</label>
                                </div>
                                ||
                                <div class="form-check d-inline-flex align-items-center m-0">
                                    <input class="form-check-input me-1" type="radio" name="category" id="music" value="Music" {{  $question->category == 'Music' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="music">🎵Music</label>
                                </div>
                            </div>
                        </div>
                            @if($question->imagePath)
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Current image</label>
                                <div>
                                    <img src="{{ Storage::url($question->imagePath) }}" class="rounded-4 border  d-block mx-auto" alt="Current question image" style="max-height: 300px; width: auto;">
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Update Image</label>
                            <small class="text-muted d-block mt-1">Leave empty to keep current image</small>
                            <input id="image" name="image" type="file" accept="image/*" class="form-control">
                        </div>
                        

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

