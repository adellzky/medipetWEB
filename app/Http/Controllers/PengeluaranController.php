<?php

namespace App\Http\Controllers;

use App\Models\Restock;
use Illuminate\Http\Request;
use PDF;

class PengeluaranController extends Controller
{
    public function generatePDF(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $restocks = Restock::with('product');
        if ($month) {
            $restocks->whereMonth('tanggal_pembelian', $month);
        }
        if ($year) {
            $restocks->whereYear('tanggal_pembelian', $year);
        }

        $restocks = $restocks->get();

        $totalRevenue = $restocks->sum(function ($restock) {
            return $restock->product->harga * $restock->jumlah;
        });

        $totalPurchases = $restocks->count();

        // Passing data ke Blade View
        $pdf = PDF::loadView('pages.admin.laporan.pengeluaran_pdf', [
            'restocks' => $restocks,
            'month' => $month,
            'year' => $year,
            'totalRevenue' => $totalRevenue,
            'totalPurchases' => $totalPurchases,
        ]);

        return $pdf->download('laporan-pengeluaran.pdf');
    }
}
