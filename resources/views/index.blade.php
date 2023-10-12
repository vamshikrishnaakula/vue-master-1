<!DOCTYPE html>
<html>

<head>
    <title>CRUD Example</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery and DataTables CSS/JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h1>Items</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 center-content">
                <form method="POST" action="/items">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Item</button>
                </form>
            </div>
            <div class="col-12 col-md-6 order-md-1">
                <h2>Item List:</h2>
                <table id="itemTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function () {
                        $('#itemTable').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>
