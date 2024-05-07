@extends('layout')

@push('style')
@endpush

@section('content')
    <!-- Default box -->
    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title"> Jenis </h3>

            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormJenis">
                Tambah Jenis
            </button>
            <div class="mt-3">
                <a href="{{ route('export-jenis') }}" class="btn btn-primary">Export Data</a>
                @include('jenis.data')
            </div>
        </div>
        <!-- /.card-body -->
     
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('jenis.form')
    @include('jenis.edit')
    </section>
    <!-- /.content -->
@endsection

@push('script')
    <!-- Ensure jQuery is included before these scripts -->

    <script>
        $(document).ready(function() {
            // Alert fade out
            $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
                $('.alert-success').slideUp(500);
            });

            // Delete data confirmation
            $('.delete-data').on('click', function(e) {
                e.preventDefault();
                const data = $(this).closest('tr').find('td:eq(1)').text();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(e.target).closest('form').submit();
                    } else {
                        Swal.close();
                    }
                });
            });
        });

        // Edit data modal setup
        // Assuming you're using jQuery
        $(document).ready(function() {
            $('#modalEdit').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('id');
                let nama = button.data('nama');
                console.log("nama jenis : " + nama) // Populate the form fields
                $('#nama_edit').val(nama);

                // Set the form action dynamically
                $('.form-edit').attr('action', `/jenis/${id}`);
            });
        });
    </script>
@endpush
