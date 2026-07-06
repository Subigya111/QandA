<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h1 class="text-center mb-5">All Questions</h1>

            @forelse($questions as $question)
                <div class="card shadow-sm mb-4">

                    @if($question->imagePath)
                        <img src="{{ Storage::url($question->imagePath) }}"
                             class="card-img-top"
                             alt="{{ $question->question }}">
                    @endif

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary">
                                {{ $question->category }}
                            </span>

                            <small class="text-muted">
                                {{ $question->created_at->format('M d, Y') }}
                            </small>
                        </div>

                        <h3 class="card-title">
                            {{ $question->question }}
                        </h3>

                        @if($question->description)
                            <p class="card-text">
                                {{ $question->description }}
                            </p>
                        @endif


                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Posted by <strong>{{ $question->user->name }}</strong>
                            </small>

                        </div>

                    </div>
                    <hr>
                    @include('answer.answer')
                </div>


            @empty
                <div class="alert alert-info text-center">
                    No questions available.
                </div>
            @endforelse

        </div>
    </div>
</div>