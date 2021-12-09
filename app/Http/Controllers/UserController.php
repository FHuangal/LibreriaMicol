<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
    	$data=request()->validate([
    		'name'=>'required',
    		'password'=>'required'
    	],
    	[
    		'name.required'=>'Ingrese Ususario',
    		'password.required'=>'Ingrese Contraseña',
    	]);
    	if (Auth::attempt($data)) {
    		$con='OK';
    	}
    	$name=$request->get('name');
    	$query=User::where('name','=',$name)->get();
    	if($query->count()!=0)
    	{
    		$hashp=$query[0]->password;
    		$password=$request->get('password');
    		if(password_verify($password,$hashp))
    		{
    			return view('/inicio');
    		}
    		else
    		{
    			return back()->withErrors(['password'=>'Contraseña no válida'])->withInput([request('password')]);
    		}
    	}
    	else
    	{
    		return back()->withErrors(['name'=>'Usuario no válido'])->withInput([request('name')]);
    	}
    }
}
