<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table tr th, table tr td {
        border: 1px solid black;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>NIP</th>
            <th>Hak Akses</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nip }}</td>
                <td>{{ ucfirst($user->role) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>