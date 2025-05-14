<h1>{{ Auth::user()->name }}!</h1>
<form method="POST" action="{{ route('logout') }}">
    <button type="submit">Logout</button>
</form>

<table border="1" cellpadding="10">
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        @endforelse
    </tbody>
</table>