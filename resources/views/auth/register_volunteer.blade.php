<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Volunteer</title>
</head>
<body>
    <h1>Register as Volunteer</h1>
    <form action="{{ route('register.volunteer') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        @error('password_confirmation')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br> 

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        @error('phone')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth">
        @error('date_of_birth')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="skills">Skills:</label>
        <textarea id="skills" name="skills"></textarea>
        @error('skills')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="interests">Interests:</label>
        <textarea id="interests" name="interests"></textarea>
        @error('interests')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <button type="submit">Register as Volunteer</button>
        <x-button href="{{ url('/auth/google') }}" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-150 ease-in-out">
            Continue with Google
        </x-button>
    </form>
</body>
</html>