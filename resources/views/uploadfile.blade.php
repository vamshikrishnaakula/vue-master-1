<!DOCTYPE html>
<html>

<head>
    <title>File Upload</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <div class="container">
            <h1>File Upload</h1>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group">
                <label for="file">Choose a File:</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <br><br>

            Here is the table:

            <table id="csvData" class="display">
                <thead>
                    {{-- <th>Name</th>
                    <th>Fathername</th>
                    <th>phonenumber</th>
                    <th>Email</th>
                    <th>Address</th> --}}
                </thead>
                <tbody>
                    <!-- Data will be populated here -->
                </tbody>
            </table>
            <script>
                var data_2 = [];
                //document.getElementById('file')='';
                $(document).ready(function () {
                    $('#file').change(function (e) {
                        var file = e.target.files[0];
                        if (file) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var csvContent = e.target.result;
                                parseCSV(csvContent);
                            };
                            reader.readAsText(file);
                        }
                    });

                    function parseCSV(csvContent) {
                        var lines = csvContent.split('\n');
                        var skipFirstRow = true;
                        lines.forEach(function (line) {
                            if (skipFirstRow) {
                                skipFirstRow = false;
                                return;
                            }
                            var cells = line.split(',').map(function (cell) {
                                return cell.trim();
                            });

                            // Validate phone number format (using a simple regex)
                            var phoneNumber = cells[2];
                            var phoneNumberPattern = /^\d{10}$/;
                            if (!phoneNumberPattern.test(phoneNumber)) {
                               
                                return;
                                alert('Invalid phone number format: ' + phoneNumber);
                            }

                            // Validate email address format (using a simple regex)
                            var email = cells[3];
                            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                            if (!emailPattern.test(email)) {
                                alert('Invalid email address format: ' + email);
                                return;
                            }

                            if (cells.length >= 2) {
                                data_2.push(cells);
                            }
                        });
                        $('#csvData').DataTable({
                            data: data_2,
                            columns: [{
                                    title: 'Name'
                                },
                                {
                                    title: 'Fathername'
                                },
                                {
                                    title: 'phonenumber'
                                },
                                {
                                    title: 'Email'
                                },
                                {
                                    title: 'Address'
                                },
                            ]
                        });
                    }
                });
            </script>
        </div>
    </div>
</body>

</html>
