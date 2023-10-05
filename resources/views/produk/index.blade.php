@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produk</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="Collapse" tittle="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="Collapse" tittle="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                @foreach ($errors->all() as $errors)
                <li>{{ $errors }}</li>
                @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormProduk">
         Tambah Produk
        </button>
        @include('produk.data')
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
    @include('produk.from')
</section>

@endsection

@push('script')
    <script>
    //    $('.alert-success').fadeTo(2000,500)_slideUp(500, function()){
    //         $('.alert-success').slideUp(540)
    //    }

       //initialization
       $(function(){
        // $('#tbl-produk').DataTable()
   

    //trigger action delete
        $('.delete-data').click(function(e){
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(2)').text()
            Swal.fire({
                title: 'Data akan hilang',
                text: 'Apakah penghapusan data ${data} akan dilanjutkan?',
                icon: 'warning!',
                showDenyButton: true,
                confirmButtonText: 'Ya',
                desyButtonText: 'Tidak',
                focusConfirm: false
            })
            .then((result) => {
                if(result.isConfirmed) $(e.target).closest('form').submit()
                else swal.close()
            })
        })
    //end delete

        //modal formInput 
        $('#modalFormProduk').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nama_produk = btn.data('nama_produk')
        const id = btn.data('id')
        const modal = $(this)
        if(mode === 'edit'){
            modal.find('.modal-title').text('Edit Data Produk')
            modal.find('#nama_produk').val(nama_produk)
            modal.find('.modal-body form').attr('action','{{ url('produk')}}/' + id)
            modal.find('#method').html('@method("PATCH")')
        }else{
            modal.find('.modal-title').text('Input Data Produk')
            modal.find('#nama_produk').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action','{{ url('produk') }}')
        }
  })
  //
})
    </script>
@endpush