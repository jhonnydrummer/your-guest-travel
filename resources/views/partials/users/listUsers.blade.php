<?php
use App\Models\User;
    $users = User::all();

?>

<table class="table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Adm</th>
    </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form method="POST" action="{{ route('users.promoteAdmin', ['id' => $user->id]) }}">
                    @csrf
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheck{{$user->id}}"
                               name="promover" onchange="this.form.submit()" {{ $user->is_admin ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheck{{$user->id}}"></label>
                    </div>
                </form>
            </td>


            <td>
                <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Deseja realmente excluir {{$user->name}}?')" type="submit" class="btn_excluir">Excluir</button>
                </form>

            </td>
        </tr>
    @endforeach

    </tbody>

</table>

<style>
    th{
        text-align: center;
    }
    tr:nth-child(even) {
        background:lightgray;
    }
</style>


