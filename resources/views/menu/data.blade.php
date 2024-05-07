<table class="table table-compact table-striped" id="data-menu">
    <thead>
        <tr>
            <th class="text-right">ID</th>
            <th class="text-right">Name</th>
            <th class="text-right">Harga</th>
            <th class="text-right">Image</th>
            <th class="text-right">Jenis</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td class="text-right">{{ $p->nama }}</td>
                <td class="text-right">{{ $p->harga_id }}</td>
                <td class="text-right">{{ $p->image }}</td>
                <td class="text-right">{{ $p->jenis->nama_jenis }}</td>
                <td class="text-right">
                    <button class="btn bg-primary" data-toggle="modal" data-target="#modalEdit" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama="{{ $p->nama }}" data-harga="{{ $p->harga }}"
                        data-image="{{ $p->image }}" data-deskripsi="{{ $p->deskripsi }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form method="post" action="{{ route('menu.destroy', $p->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn bg-danger delete-data" data-nama="{{ $p->nama }}">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
