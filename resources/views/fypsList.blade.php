<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeighLink Fyp</title>
</head>
<body>
    <h1>WeighLink Data</h1>
    <a href="{{ url('/fyps/create') }}">
    <button>Add new Item</button>
    </a>
    <table border="1" width="80%">
        <tr>
            <th>Fyp ID</th>
            <th>Fyp Name</th>
            <th>FYP Desc</th>
            <th>Actions</th>
        </tr>

        @foreach ($fypsList as $fyps)

        <tr>
            <td>{{ $fyps->fyp_id }}</td>
            <td>{{ $fyps->fyp_name }}</td>
            <td>{{ $fyps->fyp_desc }}</td>
            <td> Edit | Delete </td>
        </tr>

        @endforeach

    </table>
</body>
</html>
