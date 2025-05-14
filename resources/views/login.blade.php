<form method="POST" action="{{ route('login.attempt') }}">
    @csrf
    <x-form-errors></x-form-errors>
    <input type="email" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Password"/>
    <label>
        <input type="checkbox" name="remember">Remember Me
    </label>
    <button type="submit">Submit</button>
</form>