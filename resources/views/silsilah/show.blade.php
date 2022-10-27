@php ($nav = 'silsilah')
@extends('layouts.app',[
'title1' => 'Detail Keluarga',
'subtitle1' => 'Silsilah Keluarga',
'sidebar_toggle' => '', //sb-sidenav-toggled
])

@section('sidebar')
@include('layouts.menu')
@stop

@section('content')
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb form-control mt-4">
            <li class="breadcrumb-item"><a href="{{ route('silsilah.index') }}">Data Keluarga</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
        @if ($alert = Session::get('msgbox'))
        <div class="alert {{ ($typebox = Session::get('typebox')) ? $typebox : '' }}">
            {{ $alert }}
        </div>
        @endif
        
        <div class="form-control p-3">
            <h2 class="mb-4 text-uppercase" style="text-align: center ">Data Keluarga {{ $keluarga[0]->nama }}</h2>
            <div class="card-body pb-5">
                <div>
                    <label>Nama</label>
                    <input name="txt_nama" type="" placeholder="" value="{{ $keluarga[0]->nama }}" class="form-control" disabled>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label>Kelamin</label>
                            <div class="form-control" style="background-color: #e9ecef;opacity: 1;">
                            <input type="radio" id="option1" name="jk" value="0" class="form-check-input me-lg-1"  
                            disabled {{ ($keluarga[0]->jenis_kelamin=="L")? "checked" : "" }} >  
                                        Laki-laki
                            <input type="radio" id="option2" name="jk" value="1" class="form-check-input me-lg-1 ms-lg-4" 
                            disabled {{ ($keluarga[0]->jenis_kelamin=="P")? "checked" : "" }} >  
                                Perempuan
                            </div>
                        </div>
                        <div>
                            <label>Jumlah Anak</label>
                            <input name="txt_jmlanak" type="" placeholder="" value="{{ $keluarga[0]->jml_anak }}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col">
                        <div>
                            <label>Nama Orang Tua</label>
                            <input name="txt_ortu" type="" placeholder="" value="{{ $keluarga[0]->nama_ortu }}" class="form-control" disabled>
                        </div>
                        <div>
                            <label>Anak Ke</label>
                            <input name="txt_anakke" type="" placeholder="" value="{{ $keluarga[0]->anak_ke }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('createSilsilah', ['id' => $keluarga[0]->id, 'nama' => $keluarga[0]->nama, 'ortuid' => $keluarga[0]->id]) }}">
                <button type="submit" name="btnTambah" class="button-3 px-3 py-1 btn-green">
                    <i class="fa fa-add"></i> Tambah Silsilah
                </button>
            </a>
            @include('silsilah.tabel_anak')
            
        </div>
    </div>
</main>
@stop

@section("libraries")
<script src="{{ asset('libraries/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('js/simple-datatables@latest.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/sweetalert-2.1.2.min.js') }}"></script>
@stop
