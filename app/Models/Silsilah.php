<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Silsilah extends Model
{
    use HasFactory;

    protected $table = 'silsilah';
    public $timestamps = false;
    protected $fillable = [
    	'nama','jenis_kelamin','orangtua_id','anak_ke'
    ];

    public static function getDataSilsilahKeluarga(){
        $query = "SELECT anak.id ,anak.nama, IF(anak.jenis_kelamin = 'L','Laki-Laki','Perempuan') as kelamin, 
                  orangtua.nama as nama_ortu, anak.anak_ke,
                  (SELECT COUNT(orangtua_id) FROM silsilah WHERE orangtua_id = anak.id) as jml_anak
                  FROM silsilah anak LEFT JOIN silsilah AS orangtua ON orangtua.id IN (anak.orangtua_id)
                  WHERE anak.id in (SELECT DISTINCT orangtua_id FROM silsilah)";
        return DB::select($query);
    }

    public static function getDataSilsilahKeluargaById($id){
        $query = "SELECT anak.id ,anak.nama, anak.jenis_kelamin, orangtua.nama as nama_ortu, anak.anak_ke,
                  (SELECT COUNT(orangtua_id) FROM silsilah WHERE orangtua_id = anak.id) as jml_anak
                  FROM silsilah anak LEFT JOIN silsilah AS orangtua ON orangtua.id IN (anak.orangtua_id)
                  WHERE anak.id in (SELECT DISTINCT orangtua_id FROM silsilah) AND anak.id = '$id'";
        return DB::select($query);
        
    }

    public static function getDataAnak($id){
        $value = Silsilah::select('id','nama','jenis_kelamin','anak_ke');
        $value->where('orangtua_id', '=', $id);
        return $value->get();
    }

    public static function getDataOrangTua(){
        $value = Silsilah::select('id','nama');
        return $value->get();
    }

    public static function getDataSilsilahById($id)
    {
        $value = Silsilah::select('id', 'nama','jenis_kelamin','orangtua_id','anak_ke')->where('id',$id);
        return $value->first();
    }
}

