<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login() {
        if(!session('identity')) {
            return view('user.login');
        }
        return redirect()->action([UserController::class, 'dashboard']);
        
    }
    public function register() {
        if(!session('identity')) {
            return view('user.register');
        }
        return redirect()->action([UserController::class, 'dashboard']);
        
    }
    public function index() {
        return view('index');
    }
    public function loger(Request $request) {
        $user = DB::table('users')->where('email', '=', $request->input('email'))->first();
        if($user) {
            $auth = password_verify($request->input('password'), $user->password);
            if($auth) { 
                session(['identity' => $user]);
                return redirect()->action([UserController::class, 'dashboard']); 
            } 
            else { 
                return redirect()->action([UserController::class, 'login']); 
            }
        }
    }
    public function dashboard () {
        if(!session('identity')) {
            return redirect()->action([UserController::class, 'login']);
        }
        $user = session('identity');
        $contacts = DB::table('contacs')->where('made_by', '=', $user->id)->get();
        return view('user.dashboard', ['contacts' => $contacts]);
    }

    public function make(Request $request) {

        $password_hash = password_hash($request->input('password'), PASSWORD_BCRYPT);
        $users = DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password_hash
        ]);
        return redirect()->action([UserController::class, 'index']);
    }

    public function edit($id){
        $contact = DB::table('contacs')->where('id','=',  $id)->first();
        if($contact->made_by == session('identity')->id) {
            return view('user.edit', ['contact' => $contact]);
        }
        return action([UserController::class, 'dashboard']);
    }

    public function logout(){
        session()->forget('identity');
        return redirect()->action([UserController::class, 'login']);
    }

    public function update(Request $request) {
        $res = DB::table('contacs')->where('id', $request->input('id'))->update([
            'contact_name' => $request->input('name'),
            'contact_last_name' => $request->input('last-name'),
            'contact_phone' => $request->input('phone')
        ]);
        return redirect()->action([UserController::class, 'dashboard'])->with('msg' , 'The contact info was successfully updated');
    }

    public function delete ($id) {
        DB::table('contacs')->where('id', $id)->delete();
        return redirect()->action([UserController::class, 'dashboard'])->with('msg', 'The contact was deleted');
    }

    public function createContact(Request $request) {
        DB::table('contacs')->insert([
            'contact_name' => $request->input('name'),
            'contact_last_name' => $request->input('last-name'),
            'contact_phone' => $request->input('phone'),
            'made_by' => session('identity')->id
        ]);
        return redirect()->action([UserController::class, 'dashboard']);
    }
}
