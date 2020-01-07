<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['except'=>'destroy']);

    }

    public function create(){

        return view('sessions.create');
    }

    public function store(Request $requset ){
        $this->validate($request, [
            'email' =>'required|emial',
            'password' => 'required|min:6',
        ]);

        if(! auth()->attempt($request->only('eamil','password'),$request->has('remember'))){
            return $this->respondError('이메일 또는 비밀번호가 맞지 않습니다.');

        };

        if(! auth()->user()->activated){
            auth()->logout();
            flash('가입 확인해 주세요.');

            return back()->withInput();


        }

        flash(auth()->user()->naem .'님 환영합니다.');

        return redirect()->intended('home');
    }

    public function destroy(){

        auth()->logout();
        flash('또 방문해 주세요.');

        return redirect('/');

    }

    protected function respondError($message)
    {
        flash()->error($message);

        return back()->withInput();
    }

}
