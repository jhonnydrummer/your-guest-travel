<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();


$userId = $user->id;
?>

<div>
    <form method="POST" action="{{ route('users.autoDestroy', ['user' => $user->id]) }}">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Tem certeza {{$user->name}} que quer deletar tua conta? Se deletar não poderá mais recuperar.')"
                type="submit" name="download_pdf" class="btn-excluir-conta">Deletar Conta</button>
    </form>
</div>


<style>
    .btn-excluir-conta{
        width: 150px;
        height: 40px;
        background-color: #9daec9;
        color: black;
        border: none;
        border-radius: 5px;
        float: right;
    }

    .btn-excluir-conta:hover{
        background-color: darkred;
        color: white;
    }
</style>
