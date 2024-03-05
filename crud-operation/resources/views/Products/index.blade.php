<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        nav a:hover {
            background-color: #555;
        }
        .container {
            display: flex;
            justify-content: space-between;
         
       margin-top: 1rem;
        }

        .add-product-btn {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            align-items: flex-end;
            text-decoration: none;
            margin: 1rem;
        }


        .add-product-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<nav>
    <a href="/">Products</a>
  
</nav>
<div class="container">
<a href="product/creates" class="add-product-btn">Add Product</a>

</div>

<div>
    <h1>Student List</h1>
 
        @if(count($raviRecords) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($raviRecords as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->address }}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ $record->updated_at }}</td>
                    <td>
                        <!-- Edit and Delete buttons -->
                        <form action="{{ route('product.edit', $record->id) }}" method="GET">
                              @csrf
                        <button type="submit"  class="btn btn-dark btn-small">Edit</button>
                     </form>

                     
                        <form method="POST"  class="d-inline"  action="product/{{$record->id}}/destroy" id="deleteForm" >
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger delete-product"  style="background-color: red; border: none; margin-top: .4rem; padding: .4rem; border-radius: 2rem;" data-id="{{ $record->id }}" onclick="return confirm('Are you sure you want to delete this data?')">
                            Delete
                        </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No data available.</p>
        @endif
        </tbody>
    </table>
</div>

</body>



<script>
    function confirmDelete() {
        var confirmDelete = confirm("Are you sure you want to delete this data?");
        if (confirmDelete) {
            document.getElementById('deleteForm').submit();
        }return false; 
    }
</script>

</html>



