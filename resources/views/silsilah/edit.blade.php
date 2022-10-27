@php ($nav = 'silsilah')
@extends('layouts.app',[
'title1' => 'Ubah Keluarga',
'subtitle1' => 'Data Keluarga',
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
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Detail</a></li>
            <li class="breadcrumb-item active">Ubah</li>
        </ol>

        @if ($alert = Session::get('msgbox'))
        <div class="alert {{ ($typebox = Session::get('typebox')) ? $typebox : '' }}">
            {{ $alert }}
        </div>
        @endif
        
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <i class="fas fa-table me-1"></i>
                Ubah Keluarga
            </div>
            <h2 class="mb-4 text-uppercase" style="text-align: center ">Data Keluarga {{ $ortu_nama }}</h2>
            <form method="POST" enctype="multipart/form-data" action="{{ route('silsilah.update',$data->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-body pb-5">
                    <div>
                        <label>Nama</label>
                        <input name="txt_id" type="hidden" placeholder="" value="{{ $id  }}">
                        <input name="txt_ortuid" type="hidden" placeholder="" value="{{ $ortu_id  }}">
                        <input name="txt_nama" type="" placeholder="" value="{{ $data->nama }}" 
                        class="form-control @error('txt_nama') is-invalid @enderror">
                        @error('txt_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label>Kelamin</label>
                                <div class="form-control">
                                <input type="radio" id="option1" name="rad_jk" value="L" class="form-check-input me-lg-1"  
                                {{ $data->jenis_kelamin=="L" ? "checked" :"" }} >  
                                            Laki-laki
                                <input type="radio" id="option2" name="rad_jk" value="P" class="form-check-input me-lg-1 ms-lg-4" 
                                {{ $data->jenis_kelamin=="P" ? "checked" :"" }} >  
                                    Perempuan
                                </div>
                            </div>
                        </div>
    
                        <div class="col">
                            <div>
                                <label>Anak Ke</label>
                                <input name="txt_anakke" type="" placeholder="" value="{{ $data->anak_ke }}"
                                class="form-control @error('txt_anakke') is-invalid @enderror">
                                @error('txt_anakke')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer pt-2" style="text-align: right">
                    <button type="submit" name="btnAction" value ="1" class="button-3 py-1 btn-green">Simpan</button>
                    <button type="submit" name="btnAction" value ="2" class="button-3 py-1">Batal</button>
                </div>
            </form>
        </div>
    </div>
</main>
@stop

@section("libraries")
<script src="{{ asset('libraries/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('js/simple-datatables@latest.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stop