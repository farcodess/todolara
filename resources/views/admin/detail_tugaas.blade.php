<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table border="1">
        <thead>
            <th>Id</th>
            <th>Tugas</th>
            <th>Pemberi Tugas</th>
            <th>Penerima Tugas</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Waktu Dibuat</th>
            <th>Waktu Update</th>
            <th>Keterangan</th>
        </thead>
        <tbody>
            @foreach ($detailTodo as $Todo )
            <td>{{ $Todo->id }}</td>
            <td>{{ $Todo->tugas }}</td>
            <td>{{ $Todo->pemberi_tugas }}</td>
            <td>{{ $Todo->penerima_tugas }}</td>
            <td>{{ $Todo->waktu_mulai }}</td>
            <td>{{ $Todo->waktu_selesai }}</td>
            <td>{{ $Todo->created_at }}</td>
            <td>{{ $Todo->updated_at }}</td>
            <td>{{ $Todo->keterangan }}</td>
            @endforeach
        </tbody>
    </table>
</body>
</html>