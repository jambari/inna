<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Scenario;
 
class ScenarioController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request,
            [
                'lintang' => 'required',
                'bujur' => 'required',
                'mag' => 'required',
                'depth' => 'required',
                'origin' => 'required'
            ], [
                'lintang.required' => 'Lintang wajib diisi',
                'bujur.required' => 'Bujur wajib diisi',
                'mag.required' => 'Magnitudo wajib diisi',
                'depth.required' => 'Kedalaman harus diisi',
                'origin.required' => 'Origin harus diisi'
            ]
        );
        $lintang = $request->input('lintang');
        $bujur = $request->input('bujur');
        $mag = $request->input('mag');
        $depth = $request->input('dept');
        $origin = $request->input('origin');
 
        $xint = (int)$lintang;
        $xfloat = (float)$lintang;
        // $xintval = intval($lintang);
        $i = str_split($lintang); // ambil angka di belakang koma
        $i = $i[2];
        $i = (int)$i;
        if ($i < 5) {
            $a = $xint; // batas lintang atas
            $b = $xint+0.5; // batas lintang bawah
        } else if ( $i >= 5 ) { //jika selisih sama dengan / lebih besar dari 5
            $a = $xint+0.5;
            $b = $xint+1.0;
        };
        //Hitung lintang input - batas bawah
        $lintang_bawah = abs($xfloat - $a);
        $lintang_atas = abs($xfloat - $b);
 
        if ($lintang_bawah > $lintang_atas) {
            $lintang = $b;
        } else {
            $lintang = $a;
        }
       
        // Perhitungan Bujur
 
        $yint = (int)$bujur;
        $yfloat = (float)$bujur;
        $j = str_split($bujur); // ambil angka di belakang koma
        $j = $j[3]; // mengambil nilai di belakang koma
        $j = (int)$j;
        if ($j < 5) {
            $c = $yint; // batas bujur atas
            $d = $yint+0.5; // batas bujur bawah
        } else if ( $j >= 5 ) { //jika selisih sama dengan / lebih besar dari 5
            $c = $yint+0.5;
            $d = $yint+1.0;
        };
        //Hitung lintang input - batas bawah
        $bujur_bawah = abs($yfloat - $c);
        $bujur_atas = abs($yfloat - $d);
 
        if ($bujur_bawah > $bujur_atas) {
            $bujur = $d;
        } else {
            $bujur = $c;
        };


        
 
        // Ambil Peta di storage
       
        $nama = $lintang.'_'.$bujur.'_'.$mag.'.gif';
        $peta = Scenario::select('nama')->where('lintang',5)->orWhere('bujur','=',94.5)->whereIn('mag',[8.0])->first();
        if (empty($peta['nama'])) {
            $pesan = 'Tidak Ada Data';
        } else {
            $pesan = 'Data Tersedia';
        };


        $data = [
            'lintang' => $lintang,
            'bujur' => $bujur,
            'peta' => $peta,
            'pesan' => $pesan
        ];
        return view('skenario', $data)->with(['success'=>'Data Tersedia']);
    }
}