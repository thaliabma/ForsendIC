<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Ichtrojan\Otp\Models\Otp;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    function create(Request $request) {
        $request->validade([
            'email' => 'required|email'
        ]);

        $aluno = new Aluno();
        $aluno->email = $request->email;

        $otp = Otp::generate($request->email, 6, 15);

        $aluno->otp = Hash::make($otp->token);
        $save = $aluno->save();

        if ($save) {
            return redirect()->view('insertOtp')->with(['email' => $request->email, 'otp' => $otp]);
        }
            else return redirect()->back()->with('fail', 'Something went wrong');
    }
}
