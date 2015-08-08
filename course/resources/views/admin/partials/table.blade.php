<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Accion</th>
    </tr>
    @foreach($users as $user)
        <tr id="u-{{ $user->id }}">
            <td>{{ $user->id }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->type_user }}</td>
            <td>
                <a href="{{ route('admin.users.edit', [$user->id]) }}">Editar</a>
                <a href="#!" class="btn-delete" data-row="{{ $user->id }}">Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>