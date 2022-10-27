@php ($nav = 'silsilah')
@extends('layouts.app',[
'title1' => 'Data Keluarga',
'subtitle1' => 'Silsilah Keluarga',
'sidebar_toggle' => '', //sb-sidenav-toggled
])

@section('sidebar')
@include('layouts.menu')
@stop

@section('content')
<main>
    <div class="container-fluid px-4">
        {{-- <img class="logo mrt-4" width="480" height="50" alt="Balai Rehabilitasi Tanah Merah Samarinda"
            src="{{ asset('images/header_bnntanahmerah.png') }}"> --}}

        <ol class="breadcrumb form-control mt-4">
            {{-- <li class="breadcrumb-item"><a href="{{ route('silsilah.index') }}">Data Keluarga</a></li> --}}
            <li class="breadcrumb-item active">Data Keluarga</li>
        </ol>

        @if ($alert = Session::get('msgbox'))
        <div class="alert {{ ($typebox = Session::get('typebox')) ? $typebox : '' }}">
            {{ $alert }}
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header fw-bold">
                <i class="fas fa-table me-1"></i>
                Data Keluarga
            </div>
            <div class="card-body">
                <a href="{{ route('silsilah.create') }}">
                    <button type="submit" name="btnTambah" class="button-3 px-3 py-1 btn-green">
                        <i class="fa fa-add"></i>
                    </button>
                </a>
                <table id="datatable">
                    <thead>
                        <tr>
                            <th class="center" >#</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jumlah Anak</th>
                            <th>Nama Ortu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSilsilah as $data)
                        <tr>
                            <td style="width:2%;">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $data->nama }}
                            </td>
                            <td>
                                {{ $data->kelamin }}
                            </td>
                            <td>
                                {{ $data->jml_anak }}
                            </td>
                            <td>
                                {{ $data->nama_ortu }}
                            </td>
                            <td style="width:5%">
                                <a href="{{ route('silsilah.show', $data->id) }}">
                                <button type="submit" name="btnAction" class="button-3 px-3 py-1 btn-oldblue">
                                    <i class="fa fa-eye"></i>
                                </button>
                                </a>
                            </td>
                            {{-- <td style="width:15%">
                                <div class="pt-1 ps-1 float-start">
                                    <a href="{{ route('silsilah.edit', $data->id) }}">
                                        <button type="submit" name="btnEdit" class="button-3 px-3 py-1 btn-oldblue">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="pt-1 ps-1 float-start">
                                    <form action="{{ route('silsilah.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="btnHapus" class="button-3 px-3 py-1 btn-red" 
                                        onclick="return confirm('Apakah anda yakin ingin menghapus {{ $data->nama }}?')"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>                                            
                                    </form>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@stop

@section("libraries")
<script src="{{ asset('libraries/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('js/simple-datatables@latest.js') }}"></script>
<script src="{{ asset('js/sweetalert-2.1.2.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@stop