<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usul;
use DB;

class PptStatisticsController extends Controller
{
    //
    public function index(Request $request)
    {
        $fromDate = date('2020-01-01');
        $toDate = date('2020-01-02');


        $jumlah_layanan = Usul::whereBetween('tanggal', [$fromDate, $toDate])
            ->select(
                DB::raw('count(layanan_id) as jumlah'),
                'unit_kerja.bidang as bidang',
                'layanan.nama as nama_layanan',
            )
            ->leftJoin('layanan', 'layanan.id', '=', 'usul.layanan_id')
            ->leftJoin('unit_kerja', 'unit_kerja.id', '=', 'layanan.unit_kerja_id')
            ->groupBy(
                'layanan_id',
                'layanan.nama',
                'unit_kerja.bidang',
            )
            ->orderBy('layanan_id', 'desc')
            ->get();


        $showStats = [
            'layanan' => $jumlah_layanan,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'total' => $jumlah_layanan->sum('jumlah'),
        ];


        return response()->json($showStats);
    }

    public function testGetPegawai(Request $request)
    {
        $usul = Usul::limit(1)->select('no_usul', 'id')->get();
        return $usul[0]->usulPegawai;
    }
}
