<!DOCTYPE html>
<html>
<head>
    <title>Ajax module</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Include DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <style>
        /* Custom CSS to center content */
        body, html {
            height: 100%;
        }
        .center-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h1></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 center-content">
                <form id="item-form">
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
                <!-- Replace the table with DataTables -->
                <table id="item-list" class="table table-bordered">
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
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#item-list').DataTable();
            
            // Handle form submission using AJAX
            $('#item-form').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: '/ajax-example',
                    data: formData,
                    success: function(response) {
                        $('#title').val('');
                        let newItem = response.item;
                        $('#description').val('');
                        
                        // Add the new item to DataTable
                        $('#item-list').DataTable().row.add([
                            newItem.title,
                            newItem.description
                        ]).draw();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
