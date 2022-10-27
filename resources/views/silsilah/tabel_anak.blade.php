<div class="card mb-4 mt-2">
    <div class="card-header fw-bold">
        <i class="fas fa-table me-1"></i>
        Anak Keluarga
    </div>
    <div class="card-body">
        <table id="datatable">
            <thead>
                <tr>
                    <th class="center">Anak Ke</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anak as $anak)
                <tr>
                    <td style="width:2%;">
                        {{ $anak->anak_ke }}
                    </td>
                    <td>
                        {{ $anak->nama }}
                    </td>
                    <td>
                        {{ ($anak->jenis_kelamin=="P")? "Perempuan" : "Laki-laki" }}
                    </td>
                    <td style="width:20%">
                        <div class="pt-1 ps-1 float-start">
                            <a href="{{ route('createSilsilah', ['id' => $anak->id, 'nama' => $anak->nama, 'ortuid' => $keluarga[0]->id]) }}">
                                <button type="submit" name="btnTambah" class="button-3 px-3 py-1 btn-green">
                                    <i class="fa fa-add"></i>
                                </button>
                            </a>
                        </div>
                        <div class="pt-1 ps-1 float-start">
                            <a href="{{ route('editSilsilah', ['id' => $anak->id, 'nama' => $keluarga[0]->nama, 'ortuid' => $keluarga[0]->id]) }}">
                                <button type="submit" name="btnEdit" class="button-3 px-3 py-1 btn-oldblue">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </div>
                        <div class="pt-1 ps-1 float-start">
                            <form action="{{ route('silsilah.destroy', $anak->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btnHapus" class="button-3 px-3 py-1 btn-red" 
                                onclick="return confirm('Apakah anda yakin ingin menghapus {{ $anak->nama }}?')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>                                            
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr style="background-color: #e9ecef;">
                    <td colspan="4">
                        Keterangan: <br>
                        <i class="fas fa-add"></i> Tambah Silsilah Pada Anak;<br>
                        <i class="fas fa-edit"></i> Ubah Data Anak; <br>
                        <i class="fas fa-trash"></i> Hapus Data Anak; 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    
    