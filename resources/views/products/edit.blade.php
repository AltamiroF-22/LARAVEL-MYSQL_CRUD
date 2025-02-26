<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Edit a Product</h1>

    <div>
        @if($errors->any())
        <ul class="error-message">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="POST" action="{{ route('product.update', $product) }}">
        @csrf
        @method('PUT') 

        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Name" value="{{ $product->name }}">

        <label for="qty">Qty:</label>
        <input type="text" name="qty" placeholder="Qty" value="{{ $product->qty }}">

        <label for="price">Price:</label>
        <input type="text" name="price" placeholder="Price" value="{{ $product->price }}">

        <label for="description">Description:</label>
        <input type="text" name="description" placeholder="Description" value="{{ $product->description }}">

        <input type="submit" value="Update Product"/>
    </form>
</body>
</html>
