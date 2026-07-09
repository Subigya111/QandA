<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title> All posts</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    body{font-family:'Poppins',sans-serif;}
    .page-shell{background:#eef7ff;padding:1.5rem;border-radius:16px}
    .create-btn{background:#7c3aed;color:#fff;border:none;border-radius:999px;padding:.55rem 1rem}
    .post-card{height:240px;background:linear-gradient(135deg,#fff,#f4ebff);border:1px solid #e8dcff}
    .edit-btn{background:#2563eb;color:#fff;border-radius:999px}
    .delete-btn{background:#dc2626;color:#fff;border-radius:999px}
</style>

<div class="container my-5 page-shell">
            <h3 class="text-muted mb-0">All  of your interests in one place</h3>
        <div class="d-flex flex-wrap align-items-center gap-2">
            @auth
                Welcome, {{ auth()->user()->name }}
            @endauth
            @foreach($users as $user)
            @if(!empty($user->imagePath))
                            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                                <img src="{{ Storage::url($user->imagePath) }}"
                                    style="width:100%; height:170px; object-fit:cover; border-radius:12px;"
                                    alt="Question Image">
                            </div>
                            @endif
                            @endforeach
            <form method="POST" action="{{ route('showQuesForm') }}">
                @csrf
                <button type="submit" class="btn create-btn">Create question</button>
            </form>
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
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden post-card">
                    <div class="row g-0 h-100">
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="{{ route('showOneQuestion', $question) }}" class="d-block text-decoration-none text-dark">
                                    <span class="badge bg-dark mb-2">{{ $question->category }}</span>
                                    <h2 class="h4 card-title mb-2">{{ $question->question }}</h2>
                                    <p class="text-muted mb-2">{{ Str::limit($question->description, 50) }} Read More</p>
                                    <p class="text-secondary mb-2">
                                        By <strong>{{ $question->user->name }}</strong> • {{ $question->created_at->diffForHumans() }}
                                    </p>
                                    <p class="badge bg-light text-secondary">
                                        💬
                                        {{ $question->answers()->count() }}
                                    </p>
                                </a>
                                <div class="d-flex flex-wrap gap-2 align-items-center ">
                                    @if(auth()->id() == $question->user_id)
                                        <a href="{{route('editQuestion',$question)}}" class="btn btn-sm edit-btn">Edit</a>
                                        <form action="{{route('deleteQuestion',$question)}}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm delete-btn">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!empty($question->imagePath))
                            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                                <img src="{{ Storage::url($question->imagePath) }}"
                                    style="width:100%; height:170px; object-fit:cover; border-radius:12px;"
                                    alt="Question Image">
                            </div>
                        @endif
                    </div>
                </div>
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


