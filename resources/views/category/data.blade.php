<table class="table table-compact table-stripped" id="data-category">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Category</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama }}</td>
                <td>
                    <button class="btn btn-primary show-bs-modal" data-toggle="modal" data-target="#modalEdit"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}">
                        <i class="bi bi-pencil-fill"></i></button>
                    <form action="{{ route('category.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data" data-nama="{{ $p->nama }}"><i
                                class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
