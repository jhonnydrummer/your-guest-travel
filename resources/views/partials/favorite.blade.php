<head>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>favourites</title>
</head>

<form action="{{ route('favorites.toggle', ['product' => $product->id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-favorite">
        @if($product->isFavoritedByUser(auth()->user()))
            <i class="fas fa-heart" style="color: red;"></i>
        @else
            <i class="far fa-heart" style="color: white;"></i>
        @endif
    </button>
</form>



