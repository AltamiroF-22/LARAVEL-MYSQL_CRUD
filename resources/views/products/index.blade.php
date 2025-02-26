<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007bff;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 10px auto;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            text-align: center;
            max-width: 600px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 1rem;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .edit-btn, .delete-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        .edit-btn {
            background-color: #28a745;  /* Verde */
            color: white;
        }

        .edit-btn:hover {
            background-color: #218838;  /* Verde escuro */
        }

        .delete-btn {
            background-color: #6f42c1;  /* Roxo */
            color: white;
        }

        .delete-btn:hover {
            background-color: #5a32a3;  /* Roxo escuro */
        }

        /* Responsividade */
        @media screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .success-message {
                font-size: 14px;
            }

            .edit-btn, .delete-btn {
                padding: 6px 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Product List</h1>

    <div>
        @if(session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->qty }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->description }}</td>
                <td class="actions">
                    <a href="{{ route('product.edit', ['product' => $product]) }}" class="edit-btn">Edit</a>
                    
                    <!-- Delete -->
                    <form method="POST" action="{{ route('product.destroy', $product) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
