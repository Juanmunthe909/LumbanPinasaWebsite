<?php

namespace App\Http\Controllers\Web;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class KritikSaranController extends Controller
{
    public function index()
    {
        $kritik = KritikSaran::all();
        return view ('pages.web.kritik.main', ['kritik_saran' => $kritik]);
    }

    public function create()
    {
        return view ('pages.web.kritik.input', ['kritik' => new KritikSaran]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kritik_saran' => 'required|max:8000',
        ]);


        $kritik = new KritikSaran;
        $kritik->user_id = Auth::user()->id;
        $kritik->kritik_saran = $request->kritik_saran;
        $kritik->save();

        return redirect('kritik-saran')->with('status', 'Kritik&Saran berhasil di Kirim');
    }
}
