<?php

namespace App\Http\Controllers\Admin;
use Backpack\CRUD\app\Http\Controllers\CrudController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Requests\SkenarioCrudRequest as StoreRequest;
// use App\Http\Requests\SkenarioCrudRequest as UpdateRequest;
Use App\Models\Skenario;
Use App\Models\Arrival;

class SkenarioCrudController extends CrudController
{

    public function simulasi (Request $request) {

    	$this->validate($request,
            [
                'lintang' => 'required|numeric',
                'bujur' => 'required|numeric',
                'mag' => 'required|numeric',
                'depth' => 'required|numeric',
                'origin' => 'required|date_format:H:m:i'
            ], [
                'lintang.required' => 'Lintang wajib diisi',
                'bujur.required' => 'Bujur wajib diisi',
                'mag.required' => 'Magnitudo wajib diisi',
                'depth.required' => 'Kedalaman harus diisi',
                'origin.required' => 'Origin harus diisi'
            ]
        );
        $lintang = $request->input('lintang'); //ambil nilai lintang dari input
        $bujur = $request->input('bujur'); //ambil nilai bujur dari input
        $mag = $request->input('mag'); //ambil nilai magnitudo dari input
        $depth = $request->input('dept'); //ambil nilai kedalaman dari input
        $origin = $request->input('origin'); //ambil nilai origin time dari input



 
        $xint = (int)$lintang;
        $xfloat = (float)$lintang;
        // $xintval = intval($lintang);
        $i = str_split($lintang); //buat lintang jadi array

        // //kalau user input lintang negatif
        // if ($i[0] === '-' ) {
        // 	$i = $i[3]; // ambil angka di belakang koma
        // } else {
        // 	$i = $i[2]; // ambil angka di belakang koma
        // }

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
        //kondisional kalau user memasukan input dengan belakang koma berupa angka 0 (nol)
        if (strlen($lintang) < 3) {
        	$nama = $lintang.'.0'.'_'.$bujur.'_'.$mag.'.gif';
        	$pdf = $lintang.'.0'.'_'.$bujur.'_'.$mag.'.pdf';
        } else {
        	$nama = $lintang.'_'.$bujur.'_'.$mag.'.gif';
        	$pdf = $lintang.'_'.$bujur.'_'.$mag.'.pdf';
        }

        $event = SKenario::where([
        	['lintang', '=', $lintang],
        	['bujur', '=', $bujur],
        	['mag', '=', $mag]
        ])->first();
        $arrivals = Arrival::where([
        	['lintang', '=', 3.0],
        	['bujur', '=', 95.5],
        	['mag', '=', 8.0]
        ])->get();

        //kondisional apakah simulasi yang dicari ada atau tidak
        if ($event) {
        	return redirect()->back()->with('alert', 'Simulasi tidak dtemukan!');
        } else {

        	$data = [
            'lintang' => $lintang,
            'bujur' => $bujur,
            'mag'	=> $mag,
            'depth' => $depth,
            'origin' => $origin
            // 'pesan' => $pesan
        ];
        	return view('skenarios.skenario')->with(compact('lintang',
        		'bujur',
        		'mag',
        		'depth',
        		'origin',
        		'pdf',
        		'nama',
        		'arrivals'));
        }
    }
}
