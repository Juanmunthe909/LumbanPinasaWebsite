<?php

namespace App\Http\Controllers\Admin;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class KritikSaranController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $kritik = KritikSaran::join('users', 'users.id', '=', 'kritik_saran.user_id')
            ->select('kritik_saran.*', 'users.name')
            ->where('kritik_saran.kritik_saran', 'like', '%'.$request->keyword.'%')
            ->orWhere('users.name', 'like', '%'.$request->keyword.'%')
            ->orderBy('kritik_saran.created_at', 'desc')
            ->paginate(10);
            return view('pages.admin.kritik.list', compact('kritik'));
        }
        $kritik = KritikSaran::all();
        return view ('pages.admin.kritik.main', ['kritik_saran' => $kritik]);
    }

    public function destroy(KritikSaran $kritik_saran)
    {
        $kritik_saran->delete();
        return response()->json([
            'alert' => 'success',   
            'message' => 'Kritik dan Saran berhasil dihapus',
        ]);
    }
}
