<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Assessment - Table Processing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            color: #555;
            margin-top: 40px;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: white;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .table-container {
            overflow-x: auto;
        }

        .table1-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .formula-info {
            background-color: #e7f3ff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Internship Assessment - Table Processing</h1>

        <h2>Table 1</h2>
        <div class="table-container table1-container">
            <table>
                <thead>
                    <tr>
                        <th>Index #</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($table1 as $cell)
                        <tr>
                            <td>{{ $cell['cell'] }}</td>
                            <td>{{ $cell['value'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2>Table 2 - Processed Results</h2>
        <div class="formula-info">
            <strong>Formulas used:</strong><br>
            • Alpha = A5 + A20<br>
            • Beta = A15 / A7<br>
            • Charlie = A13 * A12
        </div>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Alpha</strong></td>
                    <td>{{ number_format($table2['Alpha'], 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Beta</strong></td>
                    <td>{{ number_format($table2['Beta'], 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Charlie</strong></td>
                    <td>{{ number_format($table2['Charlie'], 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>