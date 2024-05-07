@extends('layout')

@push('style')
@endpush



@section('content')
    <!-- Default box -->
    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title">transaksi</h3>
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
            <ul class='menu-container'>
                <div>
                    <ul>
                        @foreach ($jenis as $j)
                            <li>
                                <h3>{{ $j->nama_jenis }}</h3>
                                <ul class="menu-item">

                                    @foreach ($j->menu as $m)
                                        <li data-harga="{{ $m->harga_id }}" data-id="{{ $m->id }}">
                                            {{ $m->nama }}
                                        </li>
                                    @endforeach
                                </ul>
                        @endforeach
                    </ul>
                </div>
            </ul>
            <div class="item content"></div>
            <h3>order</h3>
            <ul class="ordered-list">

            </ul>
            total bayar :<h2 id="total">0</h2>
            <button id="btn-bayar">Bayar</button>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
    @endsection
    @push('script')
        <script>
            $(function() {
                //inisialisasi
                const orderedlist = []
                let total = 0

                const sum = () => {
                    return orderedlist.reduce((accumulator, object) => {
                        return accumulator + (object.harga * object.qty)
                    }, 0)
                }

                const changeQty = (el, inc) => {
                    const id = $(el).closest('li')[0].dataset.id;
                    const index = orderedlist.findIndex(list => list.id = id)
                    orderedlist[index].qty += orderedlist[index].qty == 1 && inc - 1 ? 0 : inc

                    const txt_subtotal = $(el).closest('li').find('.subtotal')[0]
                    const txt_qty = $(el).closest('li').find('.qty-item')[0]
                    txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
                    txt_subtotal.innerHTML = orderedlist[index].harga * orderedlist[index].qty;

                    $('#total').html(sum())
                }

                $(".menu-item li").click(function() {
                    //mengambil data 
                    const menu_clicked = $(this).text();
                    const data = $(this)[0].dataset;
                    const harga = parseFloat(data.harga);
                    const id = parseInt(data.id)
                    console.error(data)
                    if (orderedlist.every(list => list.id !== id)) {
                        let dataN = {
                            'id': id,
                            'menu': menu_clicked,
                            'harga': harga,
                            'qty': 1
                        }
                        orderedlist.push(dataN);
                        let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`
                        listOrder += 'sub Total : Rp. ' + harga
                        listOrder +=
                            `<button class='remove-item'>hapus</button> <button class="btn-dec">-</button>`
                        listOrder += ` <input class = "qty-item" type="number" value="1" style="width:200px" readonly>
                <button class="btn-inc" > + </button><h2><spam class="subtotal">${harga*1} </span> </li>`
                        $('.ordered-list').append(listOrder)
                    }
                    $('#total').html(sum())
                })

                $('.ordered-list').on('click', '.btn-dec', function() {
                    changeQty(this, -1)
                })
                $('.ordered-list').on('click', '.btn-inc', function() {
                    changeQty(this, 1)
                })

                $('.ordered-list').on('click', '.remove-item', function() {
                    const item = $(this).closest('li')[0];
                    let index = orderedlist.findIndex(list => list, id = parseInt(item.dataset.id))
                    $(item).remove();
                    delete orderedlist[index]
                    $('#total').html(sum())
                })

                $('#btn-bayar').on('click', function() {
                    $.ajax({
                        url: "{{ route('transaksi.store') }}",
                        method: "post",
                        header: {
                            'content-type': 'application/json'
                        },
                        data: {
                            "_token": "{{ csrf_token() }}",
                            orderedList: orderedlist,
                            total: total
                        },
                        success: function(data) {
                            console.log(data)
                        },
                        error: (e) => {
                            console.log(e)
                        }
                    })
                })
            })
        </script>
    @endpush

    @push('style')
        <style>
            .menu-container {
                list-style-type: none;
            }

            .menu-container li {
                margin-bottom: 20px;
            }

            .menu-container li h3 {
                text-transform: uppercase;
                font-weight: bold;
                font-size: 18px;
                background-color: rgb(146, 204, 255);
                padding: 5px 15px;
                /*margin-bottom: 10px;*/
            }

            .menu-item {
                display: flex;
                list-style-type: none;
                gap: 1em;
                margin: 10px 20px;
            }

            .menu-item li {
                background-color: rgb(174, 174, 174);
                padding: 10px 20px;
            }
        </style>
    @endpush
