<form method="POST" action="{{ route('register') }}">
    @csrf
    <h2>Sign Up</h2>

    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    @error('email')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <button type="submit">Register</button>

    @if(session('success'))
    <p class="text-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</form>
