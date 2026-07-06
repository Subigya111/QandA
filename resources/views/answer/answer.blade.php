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
				<div class="card-header">Answer</div>
				<div class="card-body">
					@if(session('success'))
						<div class="alert alert-success">{{ session('success') }}</div>
					@endif

						@csrf

						<div class="mb-3">
							<label for="answer" class="form-label">Answer</label>
							<textarea name="answer" id="question" rows="2" class="form-control" placeholder="Write your answer" value="{{ old('answer') }}" required></textarea>

							
							
						</div>
						
						<div class="mb-3">
              				<label class="form-label fw-semibold">Picture</label>
              				<input id="avatar" name="image" type="file" accept="image/*" class="form-control">
            			</div>							
						</div>

						<div class="d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Answer</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
