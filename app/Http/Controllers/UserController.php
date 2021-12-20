<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    			return view('index');
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

    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password'=> Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
        $total_purchases = 0;
        foreach ($user->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        $total_amount_sold = 0;
        foreach ($user->purchases as $key =>  $purchase) {
            $total_amount_sold+=$purchase->total;
        }
        return view('admin.user.show', compact('user', 'total_purchases', 'total_amount_sold'));
    }
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        if ($user->id == 1) {
            return redirect()->route('users.index');
        }else{
            $user->update($request->all());
            $user->roles()->sync($request->get('roles'));
            return redirect()->route('users.index');
        }
    }
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return back();
        } else {
            $user->delete();
            return back();
        }
    }

}
