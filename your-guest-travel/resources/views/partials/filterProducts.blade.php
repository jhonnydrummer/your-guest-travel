

    <?php
    use App\Models\Product;
    use App\Models\Category;
    $products = Product::with('category')->paginate(10);
    $categories = Category::all();
    ?>


    <div class="container">
        <div class="products">
            @include('partials.productsList')
        </div>
    </div>

