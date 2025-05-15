<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Data Penugasan</h2>
    <a href="/TambahTugas">Tambah Tugas</a>
 {{-- {{ $dataTodos }} --}}
 

 <table border="1">
<thead>
        
    <th>Id</th>
    <th>Tugas</th>
    <th>Pemberi Tugas</th>
    <th>keterangan</th>
    <th>action</th>
</thead>
<tbody>

    @foreach ($dataTodos as $tugas )
    <tbody>

   
    <td>{{ $tugas->id }}</td>
    <td>{{ $tugas->tugas }}</td>
    <td>{{ $tugas->pemberi_tugas }}</td>
    <td>{{ $tugas->keterangan }}</td>
    <td><a href="/pengguna/{{$tugas->id}} ">detail Tugas</a>
        <a href="/pengguna/hapustodos/{{ $tugas->id }}">hapus Tugas</a></td>
    
    </tbody>
        
    @endforeach
 </table>
    
</body>
</html>