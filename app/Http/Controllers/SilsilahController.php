<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Silsilah;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SilsilahController extends Controller
{
    private function getValidasi(Request $request)
    {
        $request->validate([
            'txt_nama' => 'required',
            'txt_anakke' => 'required'
        ], [
            'txt_nama.required' => 'Nama wajib diisi',
            'txt_anakke.required' => 'Anak Ke wajib diisi',
        ]);
    }
    /* #endregion */
    
    /* #region  Fitur Tampil Data */
    public function index()
    {
        $dataSilsilah = Silsilah::getDataSilsilahKeluarga();
        return view('silsilah.index', ['dataSilsilah' => $dataSilsilah]);
    }

    public function show($id)
    {
        $anak = Silsilah::getDataAnak($id);

        return view(
            'silsilah.show',
            [
                'keluarga' => Silsilah::getDataSilsilahKeluargaById($id)
            ],
            compact('anak')
        );
    }
    /* #endregion */

    /* #region  Fitur Tambah Data */
    // public function create()
    // {
    //     $orangTua = Silsilah::getDataOrangTua();
    //     return view(
    //         'silsilah.create',
    //         compact('orangTua')
    //     );
    // }

    public function createSilsilah($id, $nama, $ortuid)
    {
        $orangTua = Silsilah::getDataOrangTua();
        return view(
            'silsilah.create',
            compact('orangTua')
        )->with('id', $id)->with('ortu_nama', $nama)->with('ortu_id', $ortuid);
   
    }

    public function store(Request $request)
    {
        switch ($request->input('btnAction')) {
            case 1: //Fitur Button Simpan
                $this->getValidasi($request);
                try {
                    $this->insertSilsilah($request);
                } catch (Exception $err) {
                    return redirect(route('silsilah.show', $request->txt_ortuid))
                        ->with('msgbox', 'Terjadi masalah. Data gagal disimpan: ' . $err->getMessage())
                        ->with('typebox', 'alert-warning');
                }
                return redirect(route('silsilah.show', $request->txt_ortuid))
                    ->with('msgbox', 'Data keluarga berhasil disimpan')
                    ->with('typebox', 'alert-success');
                break;
            case 2: //Fitur Button Back
                // return redirect()->back();
                return redirect(route('silsilah.show', $request->txt_ortuid));
                break;
        }
    }

    private function insertSilsilah(Request $request)
    {
        Silsilah::create([
            'nama' => $request->txt_nama,
            'jenis_kelamin' => $request->rad_jk,
            'orangtua_id' => $request->txt_ortuid,
            'anak_ke' => $request->txt_anakke
        ]);
    }

    /* #endregion */

    /* #region  Fitur Ubah Data */
    public function editSilsilah($id, $nama, $idOrtu)
    {   
        $orangTua = Silsilah::getDataOrangTua();
        $dataKeluarga = Silsilah::getDataSilsilahById($id);
        return view('silsilah.edit', [
            'data' => $dataKeluarga
        ], compact('orangTua'))->with('id', $id)->with('ortu_nama', $nama)->with('ortu_id',$idOrtu);
    }

    public function update(Request $request, $id)
    {
        $ambilOrtuId = Silsilah::select('id')->where('id', '=', $id)->first();
        switch ($request->input('btnAction')) {
            case 1: //Fitur Button Simpan
                $this->getValidasi($request);
                try {
                    $this->updateSilsilah($request, $id);
                } catch (Exception $err) {
                    return redirect(route('silsilah.show', $request->txt_ortuid))
                        ->with('msgbox', 'Terjadi masalah. Data gagal diubah: ' . $err->getMessage())
                        ->with('typebox', 'alert-warning');
                }
                return redirect(route('silsilah.show', $request->txt_ortuid))
                    ->with('msgbox', 'Data keluarga berhasil diubah')
                    ->with('typebox', 'alert-success');
                break;
            case 2: //Fitur Button Back
                return redirect(route('silsilah.show', $request->txt_ortuid));
                break;
        }
    }

    private function updateSilsilah(Request $request, $id)
    {
        Silsilah::getDataSilsilahById($id)->update([
            'nama' => $request->txt_nama,
            'jenis_kelamin' => $request->rad_jk,
            'anak_ke' => $request->txt_anakke
        ]);
    }
    /* #endregion */

    /* #region  Fitur Hapus Data */
    public function destroy($id)
    {
        $cekKeluarga = Silsilah::getDataAnak($id);
        if (!$cekKeluarga->isEmpty()) {
            return redirect()->back()
                ->with('msgbox', 'Data tidak bisa dihapus karena sudah memiliki data anak!')
                ->with('typebox', 'alert-warning');
        }

        try {
            Silsilah::destroy($id);
        } catch (Exception $err) {
            return redirect()->back()
                ->with('msgbox', 'Terjadi masalah. Data gagal dihapus: ' . $err->getMessage())
                ->with('typebox', 'alert-warning');
        }
        return redirect()->back()
            ->with('msgbox', 'Data berhasil dihapus')
            ->with('typebox', 'alert-danger');
    }
    /* #endregion */
}
