<table class="table table-compact table-stripped" id="data-category">
    <thead>
        <tr>
            <th>No.</th>
            <th>Menu_ID</th>
            <th>jumlah</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($stock as $key => $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->menu_id}}</td>
                <td>{{ $p->jumlah }}</td>
                <td>
                    <button class="btn btn-primary show-bs-modal" data-toggle="modal" data-target="#modalEdit"
                        data-mode="edit" data-id="{{ $p->id }}" data-menu_id="{{ $p->menu_id }}"
                        data-jumlah="{{ $p->jumlah }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form action="{{ route('stock.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data" data-menu_id="{{ $p->menu_id }}"
                            data-jumlah="{{ $p->jumlah }}"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
