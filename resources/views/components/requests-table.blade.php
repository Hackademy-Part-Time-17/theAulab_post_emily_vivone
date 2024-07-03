<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($role)
                        @case('Amministratore')
                            <form action="{{ route('admin.setAdmin', $user) }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit" class=" btn btn-info text-white">Attiva {{ $role }}</button>
                            </form>
                            @break
                        @case('Revisore')
                            <form action="{{ route('admin.setRevisor', $user) }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit" class=" btn btn-info text-white">Attiva {{ $role }}</button>
                            </form>
                            @break
                        @case('Redattore')
                            <form action="{{ route('admin.setWriter', $user) }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit" class=" btn btn-info text-white">Attiva {{ $role }}</button>
                            </form>
                            @break
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
</table>