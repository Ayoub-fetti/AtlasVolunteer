<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Organization</title>
</head>
<body>
    <h1>Register as Organization</h1>
    <form action="{{ route('register.organization') }}" method="POST">
        @csrf
        <label for="organization_name">Organization Name:</label>
        <input type="text" id="organization_name" name="organization_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="website">Website:</label>
        <input type="url" id="website" name="website"><br><br>

        <button type="submit">Register as Organization</button>
    </form>
</body>
</html>