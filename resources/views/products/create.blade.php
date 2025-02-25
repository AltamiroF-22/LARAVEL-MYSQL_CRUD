<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>create a product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div class="">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div class="">
            <label for="qty">Qty:</label>
            <input type="text" name="qty" placeholder="Qty">
        </div>
        <div class="">
            <label for="price">Price:</label>
            <input type="text" name="price" placeholder="Price">
        </div>
        <div class="">
            <label for="description">Description:</label>
            <input type="text" name="description" placeholder="Description">
        </div>

        <div class="">
            <input type="submit" value="Save a New Product"/>
        </div>

    </form>
</body>
</html>