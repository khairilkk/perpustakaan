<h1>Data Buku</h1>

<a href="/buku/create">Tambah Buku</a>

<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Stok</th>
    </tr>

    @foreach($buku as $item)
    <tr>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->penulis }}</td>
        <td>{{ $item->stok }}</td>
    </tr>
    @endforeach
</table>