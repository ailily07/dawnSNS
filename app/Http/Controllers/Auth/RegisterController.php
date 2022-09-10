<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //デフォルトで入力されていたメソッド
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        //POST送信の場合
        if($request->isMethod('post')){
            $data = $request->input();

            $validate = Validator::make(
                //①値の配列
                $data,
                //②バリデーションルールの配列
                [
                    'username' => 'required|min:4|max:12',
                    'mail' => 'required|email|min:4|unique:users',
                    'password' => 'required|string|min:4|max:12|unique:users|confirmed',
                ],
                //③エラーメッセージの配列
                [
                    'username.required' => '必須項目です',
                    'username.min' => '4文字以上で入力してください',
                    'username.max' => '12文字以下で入力してください',
                    'mail.required' => '必須項目です',
                    'mail.mail' => 'メールアドレスではありません',
                    'mail.min' => '4文字以上で入力してください',
                    'mail.unique' => 'このアドレスは使用できません',
                    'password.required' => '必須項目です',
                    'password.string' => '英数字で入力してください',
                    'password.min' => '4文字以上で入力してください',
                    'password.max' => '12文字以下で入力してください',
                    'password.unique' => 'このパスワードは使用できません',
                    'password.confirmed' => 'パスワードが一致しません',
                ]
            );
            //バリデーションが失敗した場合
            if ($validate->fails()) {
                return redirect('/register')
                ->withErrors($validate)
                ->withInput();
            }

            session()->put('username', $data['username']);

            $this->create($data);
            return redirect('added');
        }
        //POST送信ではない場合
        return view('auth.register');
    }

    /**
     *登録完了ページ用
     *@param  array  $data
     */
        public function added(){
        $username = session()->get('username');
        return view('auth.added', ['username' => $username]);
    }

}
