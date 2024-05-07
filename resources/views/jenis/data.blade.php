<table class="table table-compact table-stripped" id="data-jenis">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Jenis</th>
            <th>Kategori Id</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($jenis as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_jenis }}</td>
                <td>{{ $p->kategori->nama ?? '' }}</td>
                <td>
                    <button class="btn btn-primary show-bs-modal" data-toggle="modal" data-target="#modalEdit"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama_jenis ="{{ $p->nama_jenis }}"
                        data-kategori_id ="{{ $p->kategori_id }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form action="{{ route('jenis.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data"
                            data-nama_jenis ="{{ $p->nama_jenis }}" data-kategori_id ="{{ $p->kategori_id }}"><i
                                class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
