<form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
@csrf
    <div class="row">

        <div class="col-md-12" id="formulario">

            <div class="form-group">
                <label for="image">Escolha a imagem</label>
                <input type="file" name="images[]" multiple required>
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <label for="name">Nome do produto</label>
            <input type="text" name="name" id="name" placeholder="Nome do produto" required>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" placeholder="Descrição" required></textarea>
            <label for="price">Preço</label>
            <input type="text" name="price" id="price" placeholder="Preço" required>
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" placeholder="SKU" required>

            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id" required class="custom-select">
                <option value="" selected disabled hidden>Selecione uma categoria</option>
                <option value="1">Esportes</option>
                <option value="2">Culinária</option>
                <option value="3">Natureza</option>
                <option value="4">Cultura</option>
            </select>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary" id="submit">Enviar</button>
    </div>
</form>


<style>
    input, button, select, label{
        width: 98%;
        display: block;
        margin: 10px;
    }
    textarea{
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
