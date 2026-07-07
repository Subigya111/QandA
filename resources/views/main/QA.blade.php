<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Question & Answer</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<style>
		body {
			font-family: 'Segoe UI', sans-serif;
			background: linear-gradient(135deg, #fdf2f8, #eef2ff);
		}
		.card {
			border: none;
			border-radius: 16px;
			box-shadow: 0 10px 25px rgba(0,0,0,0.08);
		}
		.card-header {
			background: linear-gradient(90deg, #7c3aed, #ec4899);
			color: #fff;
			font-weight: 600;
		}
		.form-control {
			border-radius: 10px;
		}
		.form-check {
			padding: 0.5rem 0.75rem;
			margin-bottom: 0.4rem;
			background: #f8fafc;
			border-radius: 10px;
		}
		.category-emoji {
			margin-right: 0.35rem;
		}
		.btn-primary {
			background: linear-gradient(90deg, #8b5cf6, #ec4899);
			border: none;
			border-radius: 999px;
		}
	</style>
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

          				<form method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
						@csrf

						<div class="mb-3">
							<label for="question" class="form-label">Question</label>
							<textarea name="question" id="question" rows="2" class="form-control" placeholder="Write your question" value="{{ old('question') }}" required></textarea>

							
							
						</div>
						<div class="mb-3">
							
							<textarea name="description" id="description" rows="4" class="form-control" placeholder="Description(optional)" value="{{ old('description') }}" ></textarea>

							
							
						</div>
						<div class="mb-3">
              				<label class="form-label fw-semibold">Picture</label>
              				<input id="avatar" name="image" type="file" accept="image/*" class="form-control">
            			</div>

						<div class="mb-3">
							<label class="form-label">Category</label>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="tech" value="Tech" required>
								<label class="form-check-label" for="tech"><span class="category-emoji">💻</span>Tech</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="life" value="Life" required>
								<label class="form-check-label" for="life"><span class="category-emoji">🌱</span>Life</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="sports" value="Sports" required>
								<label class="form-check-label" for="sports"><span class="category-emoji">⚽</span>Sports</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="music" value="Music" required>
								<label class="form-check-label" for="music"><span class="category-emoji">🎵</span>Music</label>
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
