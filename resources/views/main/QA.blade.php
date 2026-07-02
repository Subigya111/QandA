<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Question & Answer</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Ask question</div>
				<div class="card-body">
					@if(session('success'))
						<div class="alert alert-success">{{ session('success') }}</div>
					@endif

					<form method="POST" action="{{ route('questions.set') }}">
						@csrf

						<div class="mb-3">
							<label for="question" class="form-label">Question</label>
							<textarea name="question" id="question" rows="3" class="form-control" placeholder="Write your question" value="{{ old('question') }}" required></textarea>
							
							
						</div>

						<div class="mb-3">
							<label class="form-label">Category</label>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="tech" value="Tech" required>
								<label class="form-check-label" for="tech">Tech</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="life" value="Life" required>
								<label class="form-check-label" for="life">Life</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="sports" value="Sports" required>
								<label class="form-check-label" for="sports">Sports</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="music" value="Music" required>
								<label class="form-check-label" for="music">Music</label>
							</div>

							
						</div>

						<div class="d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
