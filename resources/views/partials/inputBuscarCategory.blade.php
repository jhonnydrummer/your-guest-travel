<?php
use App\Models\Category;
$categories = Category::all();
$selectedCategoryId = request()->input('category_id');
?>

@if(auth()->check())
    <div>

        <form action="{{ route('category.show') }}" method="GET">
            @csrf
            <label class="label-category-input">
                <select name="category_id" class="my-select">
                    <option value="">Pesquisar por categorias</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->input('category_id') == $category->id ? 'selected' : '' }} >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <button type="submit" class="btn-Buscar">Filtrar</button>
        </form>

    </div>
@endif

<style>
    .label-category-input{
        margin-top: 5vh;
    }
    .my-select{
        height: 40px;
        width: 30vw;
        border: 1px solid #adadad;
    }
    .btn-Buscar{
        height: 40px;
        background-color: #0B5ED7;
        border: none;
        border-radius: 5px;
        color: white;
    }

    .btn-Buscar:hover{
        background-color: #0648a8;
    }
</style>
