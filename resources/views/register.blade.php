<form method="POST" action="{{ route('register.store') }}">
    <x-form-errors></x-form-errors>
    <input type="text" name="name" placeholder="Name"/>
    <input type="email" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Password"/>
    <button type="submit">Register</button>
</form>