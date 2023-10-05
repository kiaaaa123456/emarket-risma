
<table class="table table-compact table stripped" id="tbl-produk">
    <thead>
        <tr>
            <th>No.</th>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->produk_id }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormProduk" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}">
                        <i class="fas fa-edit">

                        </i>
                    </button>
                    <form method="post" action="{{ route('produk.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama_produk="{{ $p->nama_produk }}">
                            <i class="fas fa-trash">

                            </i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    