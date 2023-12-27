<h1>Meus Dados</h1>

<form method="POST" action="{{ route('perfil.update') }}">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
    </div>
    <div>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{ Auth::user()->password }}" required>
    </div>

    <button class="btn-salvar-alteracoes" type="submit">Salvar Alterações</button>
</form>


















<style>


    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: calc(100% - 10px);
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }

    .btn-salvar-alteracoes {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        background-color: #001A3F;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-salvar-alteracoes:hover {
        background-color: #033a88;
    }

</style>
