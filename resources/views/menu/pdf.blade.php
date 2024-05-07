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
    <table class="table table-compact table-striped" id="data-menu" cellspacing="0">
        <thead>
            <tr>
                <th class="text-right">No</th>
                <th class="text-right">Name</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Image</th>
                <th class="text-right">Jenis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td class="text-right">{{ $p->nama }}</td>
                    <td class="text-right">{{ $p->harga }}</td>
                    <td class="text-right">{{ $p->image }}</td>
                    <td class="text-right">{{ $p->jenis->nama_jenis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
