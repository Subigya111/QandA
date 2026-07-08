<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>{{ $question->question }}</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    body, .container, .card, .btn, .badge, .text-muted, .card-title, .card-text { font-family:'Poppins',sans-serif; }

</style>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <p class="text-muted mb-0">By: <strong>{{ $question->user->name }} </strong></p> ||
                        <small class="text-muted">
                            {{ $question->created_at->diffForHumans() }}
                        </small>
                    </div>

                    <h2 class="card-title mb-2">{{ $question->question }}</h2>
                    <span class="badge bg-dark mb-2">{{ $question->category }}</span>
                    @if(!empty($question->imagePath))
                        <div class="mb-4">
                            <p style="white-space: pre-line" class="card-text mb-3">
                                {{ $question->description }}
                            </p>
                            <img src="{{ Storage::url($question->imagePath) }}"
                                 class="rounded-4 border shadow-sm d-block mx-auto"
                                 alt="Question Image">
                        </div>
                    @else
                        <p style="white-space: pre-line" class="card-text mb-4">
                            {{ $question->description }}
                        </p>
                    @endif

                   
                    <div class="d-flex flex-wrap gap-2 align-items-center post-actions">
                         <a href="{{ route('showAllQuestion') }}" class="btn btn-secondary btn-sm">
                        ← Back
                    </a>
                                    @if(auth()->id() == $question->user_id)
                                        <a href="{{route('editQuestion',$question)}}" class="btn btn-sm ">Edit</a>
                                        <form action="{{route('deleteQuestion',$question)}}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm ">Delete</button>
                                        </form>
                                    @endif
                    </div>
                </div>
            </div>

            <div class="mt-4">
                @include('answer.answer')
            </div>
        </div>
    </div>
</div>