<form method="POST" action="{{ route('login') }}">
    @csrf
    <h2>Sign In</h2>

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    @error('email')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Login</button>

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
