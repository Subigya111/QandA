<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-5" style="background: #eef7ff; padding: 1.5rem; border-radius: 16px;">
    <header class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="mb-1">All Posts</h1>
            <p class="text-muted mb-0">Browse all posts.</p>
        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success rounded-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @guest
        <div class="alert alert-info rounded-4 shadow-sm">
            You are not logged in. <a href="{{ route('login') }}">Login</a> to read the full post.
        </div>
    @endguest

    <div class="row g-4">
        @forelse($questions as $question)
            <div class="col-12">
                <a href="{{route('showOneQuestion',$question)}}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden" style="height: 230px; background: linear-gradient(135deg, #ffffff, #f3ebff); border: 1px solid #e8dcff;">
                        <div class="row g-0 h-100">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <span class="badge bg-primary">{{ $question->category }}</span>

                                    <h2 class="h4 card-title mt-2">
                                        {{ $question->question }}
                                    </h2>

                                    <p class="text-muted">
                                        {{ Str::limit($question->description, 10) }}Read More
                                    </p>

                                    <p class="mb-0">
                                        By : <strong>{{ $question->user->name ?? 'Unknown' }}</strong>
                                    </p>

                                    <p class="text-secondary">
                                        {{ $question->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            @if(!empty($question->imagePath))
                            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                                <img src="{{ Storage::url($question->imagePath) }}" 
                                style="width:100%; height:170px;
                                object-fit:cover; border-radius:12px;"
                                alt="Question Image">
                            </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info rounded-4 shadow-sm">
                    No questions available.
                </div>
            </div>
        @endforelse
    </div>
</div>


