<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a product</title>
</head>
<body>
    <h1>Edit a product</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="POST" action="{{ route('product.update', $product) }}">
        @csrf
        @method('PUT') 

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Name" value="{{ $product->name }}">
        </div>

        <div>
            <label for="qty">Qty:</label>
            <input type="text" name="qty" placeholder="Qty" value="{{ $product->qty }}">
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" placeholder="Price" value="{{ $product->price }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" placeholder="Description" value="{{ $product->description }}">
        </div>

        <div>
            <input type="submit" value="Update Product"/>
        </div>
    </form>
</body>
</html>
