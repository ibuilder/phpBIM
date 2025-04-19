<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Login</h2>
        <form action="/auth/login" method="POST" class="mt-4">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="mt-3">
                <p>Don't have an account? <a href="/auth/register">Register here</a></p>
            </div>
        </form>
    </div>
    <script src="/js/forms.js"></script>
</body>
</html>