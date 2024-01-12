<strong>Imagens existentes:</strong>
@if($product->photos->isNotEmpty())
    <div class="container-imagem-mini">
    @foreach($product->photos as $photo)

            <?php
            $string = $photo->path;
            $remove = 6;
            $inicio = 0;
            $novoPath = substr($string, $inicio + $remove);
            ?>

            <form method="POST" action="{{ route('photo.destroy', ['photo' => $photo->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="imagem-mini">
                    <img src="{{ url('storage'.$novoPath) }}" alt="{{$photo->name}}" class="img-miniaturas">
                    <button onclick="return confirm('Excluir esta imagem?')" type="submit" class="botao-excluir">del
                    </button>
                </div>
            </form>
    @endforeach
        </div>
@endif


<form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12" id="formulario">

            <!-- Escolher novas imagens -->
            <div class="col-md-12">
                <label for="new_images">Adicionar novas imagens</label>
                <input type="file" name="new_images[]" multiple>
            </div>


        </div>
        <div class="col-md-12">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" required>{{ $product->description }}</textarea>
            <label for="price">Preço</label>
            <input type="text" name="price" id="price" value="{{ $product->price }}" required>
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" value="{{ $product->sku }}" required>
            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id" required class="custom-select">
                <option value="" selected disabled hidden>Selecione uma categoria</option>
                <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Esportes</option>
                <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Culinária</option>
                <option value="3" {{ $product->category_id == 3 ? 'selected' : '' }}>Natureza</option>
                <option value="4" {{ $product->category_id == 4 ? 'selected' : '' }}>Cultura</option>
            </select>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary" id="submit">Salvar mudanças</button>
    </div>
</form>


<style>

    .botao-excluir {
        position: relative;
        text-decoration: none;
        color: white;
        background-color: red;
        border: none;
        border-radius: 50px;
        margin-left: -35px;
        margin-top: 3px;
        padding: 8px 5px 8px 5px;
        max-height: 32px;
    }

    .botao-excluir:hover {
        text-decoration: none;
        background-color: #9f0404;
        color: white;
    }

    .container-imagem-mini {
        display: flex;
        overflow-x: auto;
    }

    .imagem-mini {
        display: flex;
        overflow-x: auto;
    }

    .img-miniaturas {
        width: 140px;
        height: auto;
    }

    input, button, select, label {
        width: 98%;
        display: block;
        margin: 10px;
    }

    textarea {
        width: 98%;
        height: 200px;
        display: block;
        margin: 10px;
        resize: none;
    }

    .custom-select {
        position: relative;
    }
</style>


