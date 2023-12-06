<form method="POST" enctype="multipart/form-data" id="upload-image" action="{{route('upload.picture')}}">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="file" name="image" placeholder="Escolha a imagem" id="image">
                @error('image')
                <div class="alert alert-danger" mt-1 mb-1>
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" id="submit">Enviar</button>
            </div>
        </div>
    </div>
</form>
