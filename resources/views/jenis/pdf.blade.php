<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            width: 100vw;
            font-family: sans-serif;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table class="table table-compact table-stripped" id="data-category" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Jenis</th>
                <th>Kategori Id</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($jenis as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->nama_jenis }}</td>
                    <td>{{ $p->kategori->nama ?? '' }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
