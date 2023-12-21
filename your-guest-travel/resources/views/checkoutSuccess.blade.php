<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout Success</title>
</head>
<body>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
</body>
</html>
