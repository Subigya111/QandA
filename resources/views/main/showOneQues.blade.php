<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <p class="text-muted mb-0">By: <strong>{{ $question->user->name }} </strong></p> ||
                            <small class="text-muted">
                                {{ $question->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>

                    <h2 class="card-title mb-2">{{ $question->question }}</h2>
                    <div class="mb-2">
                        <span class="badge bg-primary rounded-pill">{{ $question->category }}</span>
                    </div>
                    <p style="white-space: pre-line" class="card-text mb-4">
                        {{ $question->description }}
                    </p>
                    

                   

                    @if(!empty($question->imagePath))
                        <div class="text-center mb-4">
                            <img src="{{ Storage::url($question->imagePath) }}"
                                 class="img-fluid rounded-4 border shadow-sm"
                                 style="max-width: 100%; max-height: 500px; width: auto; object-fit: contain;"
                                 alt="Question Image">
                        </div>
                    @endif

                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                        ← Back
                    </a>
                </div>
            </div>

            <div class="mt-4">
                @include('answer.answer')
            </div>
        </div>
    </div>
</div>