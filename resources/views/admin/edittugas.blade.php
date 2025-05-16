<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Tugas</title>
</head>
<body>
    <h2>Form edit tugas</h2>

  <form action="/simpanedit/{{ $tugas->id }}" method="POST">
    @csrf
    
    <table>
        <tr>
            <td>Nama Tugas</td>
            <td><input type="text" name="namaTugas" value="{{ $tugas->tugas }}"></td>
        </tr>
        {{-- <tr>
            <td>Waktu Mulai</td>
            <td><input type="date" name="waktumulai" value="{{ $tugas->waktu_mulai }}"></td>
        </tr>
        <tr>
            <td>Waktu Selesai</td>
            <td><input type="date" name="waktuselesai" value="{{ $tugas->waktu_selesai }}"></td>
        </tr> --}}
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
            <td><input type="text"  name="keterangan" value="{{ $tugas->keterangan }}"></td>
        </tr>
    </table>
    <button type="submit">Simpan Edit</button>
</form>


     </table>
    
    
</body>
</html>