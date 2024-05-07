<table class="table table-compact table-striped" id="data-menu">
    <thead>
        <tr>
            <th class="text-right">ID</th>
            <th class="text-right">Tanggal</th>
            <th class="text-right">Jam mulai</th>
            <th class="text-right">Jam selesai</th>
            <th class="text-right">Nama pemesanan</th>
            <th class="text-right">Jumlah pelanggan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['menu'] as $p)
        <tr>
            <td>{{ $i = !isset($i) ? $i = 1 : ++$i }}</td>
            <td class="text-right">{{ $p->nama }}</td>
            <td class="text-right">{{ $p->harga }}</td>
            <td class="text-right">{{ $p->image }}</td>
            <td class="text-right">{{ $p->deskripsi }}</td>
            <td class="text-right">
            <button 
            class="btn" 
            data-toggle="modal" 
            data-target="#modalEdit" 
            data-mode="edit" 
            data-id="{{ $p->id }}" 
            data-nama="{{ $p->nama }}"
            data-harga="{{ $p->harga }}"
            data-image="{{ $p->image }}"
            data-deskripsi="{{ $p->deskripsi }}">
             <i class="fas fa-edit"></i>
            </button>
             <i class="fas fa-edit"></i>
              </button>
                <form method="post" action="{{ route('menu.destroy', $p->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-data" data-nama="{{ $p->nama}}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>