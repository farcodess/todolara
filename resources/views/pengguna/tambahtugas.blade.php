<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Tugas</title>
</head>
<body>
    <h2>Form Tambah Tugas</h2>
    <form action="/simpantugas" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nama Tugas</td>
            <td><input type="text" name="namaTugas"></td>
        </tr>
        <tr>
            <td>Waktu Mulai</td>
            <td><input type="date" name="waktumulai"></td>
        </tr>
        <tr>
            <td>Waktu Selesai</td>
            <td><input type="date" name="waktuselesai"></td>
        </tr>
        <tr>
        <td>Tugas Dari</td>
        <td>
           <select name="tugasdari">
                @foreach ($databos as $bos )
                <option value="{{ $bos->id }}">{{ $bos->nama }}</option>
                    
                @endforeach
            </select>
         </td>
        </tr>
        <tr>
        <td>Tugas Untuk</td>
        <td>
          <select name="tugasuntuk">
                @foreach ($datapegawai as $pegawai )
                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                    
                @endforeach
            </select>
        </td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><input type="text" name="keterangan"></td>
        </tr>
        <tr>
            <td><input type="submit" name="simpan"></td>
        </tr>
    </form>
     </table>
    
</body>
</html>