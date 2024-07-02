<!DOCTYPE html>
<html>
<head>
    <title>Data Berat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Berat</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Berat (kg)</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($weight_data as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->weight }} kg</td>
                    <td>{{ $data->created_at ? $data->created_at->format('d M Y, H:i:s') : 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div>
        {{ $weight_data->links() }} <!-- Pagination links -->
    </div>
</body>
</html>
