<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
body{font-family:'Poppins',sans-serif;}
</style>
<div class="mt-4"  justify-content="center">

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success rounded-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4 shadow-sm border-0 rounded-4">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-3">
                <div>
                    <h4 class="mb-1 text-muted">Join the conversation</h4>
                </div>
                
            </div>

            @if(!$authAnswer)
                <div class="border rounded-4 p-3 bg-light">
                    <form action="{{route('answers.store',$question)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <textarea name="answer" class="form-control mb-3" placeholder="Write your answer..." rows="4" required></textarea>
                        <button type="submit" class="btn btn-primary w-100">Answer</button>
                        <label class="form-label fw-semibold">Picture</label>
                            <input id="avatar" name="image" type="file" accept="image/*" class="form-control">
                    </form>
                </div>
            @else
                <div class="alert alert-info rounded-4">
                    You have answered.
                </div>
            @endif
        </div>
    </div>

    @forelse($answers as $answer)
        <div class="card mb-3 shadow-sm rounded-4">
            <div class="card-body">
                <div class="d-flex flex-column flex-sm-row justify-content-between gap-2 mb-2">
                    <div>
                        <strong>{{ $answer->user->name }}</strong>
                        <div class="text-muted small">{{ $answer->created_at->diffForHumans() }}</div>
                    </div>
                    @if(auth()->id() == $answer->user_id)
                        <div class="d-flex gap-2">
                            <a href="{{route('editAnswer',$answer)}}" class="btn btn-sm ">Edit</a>
                            <form action="{{route('deleteAnswer',$answer)}}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm ">Delete</button>
                            </form>
                           
                        </div>
                    @endif
                </div>
                @if(!empty($answer->imagePath))
                        <div class="mb-4">
                            <p style="white-space: pre-line" class="card-text mb-3">
                                {{ $answer->answer }}
                            </p>
                            <img src="{{ Storage::url($answer->imagePath) }}"
                                 class="  d-block mx-auto" style="max-height: 400px; width: auto;"
                                 alt="Answer Image">
                        </div>
                    @else
                        <p style="white-space: pre-line" class="card-text mb-4">
                            {{ $answer->answer }}
                        </p>
                    @endif
            </div>

        </div>
    @empty
        <div class="alert alert-secondary rounded-4">
            No answer yet.
        </div>
    @endforelse

    <!-- Errors -->
    @if($errors->any())
        <div class="alert alert-danger mt-3 rounded-4 shadow-sm">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>