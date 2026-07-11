<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Edit Answer</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    body{font-family:'Poppins',sans-serif;}
    .card{border:none;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,.08)}
    .card-header{background:linear-gradient(90deg,#7c3aed,#ec4899);color:#fff;font-weight:600}
    .form-control{border-radius:10px}
    .btn-primary{background:linear-gradient(90deg,#8b5cf6,#ec4899);border:none;border-radius:999px}
</style>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Answer</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success rounded-4">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger rounded-4">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-4 p-3 bg-white rounded-4 border">
                        <p class="mb-1 text-secondary small">Editing answer for question</p>
                        <h5 class="mb-3">{{ $answer->question->question }}</h5>
                        <a href="{{ route('showOneQuestion',['question'=>$answer->question_id,'comments'=>'open']) }}" class="btn btn-outline-primary btn-sm">View question</a>
                    </div>

                    <form method="POST" action="{{ route('updateAnswer', $answer) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="answer" class="form-label fw-semibold">Answer</label>
                            <textarea name="answer" id="answer" rows="4" class="form-control" placeholder="Write your answer" required>{{ $answer->answer }}</textarea>
                        </div>

                        @if($answer->imagePath)
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Current image</label>
                                <img src="{{ Storage::url($answer->imagePath) }}" class="  d-block mx-auto" alt="Current answer image" style="max-height: 300px; width: auto;">
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Update Image</label>
                            <small class="text-muted d-block mt-1">Leave empty to keep the current image</small>
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
</body>

