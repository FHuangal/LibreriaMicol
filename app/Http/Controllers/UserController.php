<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
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
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->rol = $request->rol;
            $user->password = Hash::make($request['password']);
            $user->save();
            DB::commit();
            return redirect()->route('users.index')->with('Usuariog','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('users.create')->with('Usuariog','error');
        }
            
    }
    public function show(User $user)
    {
        
    }

    public function edit($id)
    {
        $usuario=User::find($id);
        return view('admin.user.edit', compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $usuario=User::find($id);
            if ($usuario->rol == "administrador") {
                DB::commit();
                return redirect()->route('users.index')->with('Usuarioe','error');
            }else{
                $usuario->update($request->all());
                DB::commit();
                return redirect()->route('users.index')->with('Usuarioe','ok');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('users.edit')->with('Usuarioe','error');
        }
        
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $usuario=User::find($id);
            if ($usuario->rol == "administrador") {
                return back()->with('Usuariod','error');
            } else {
                DB::commit();
                $usuario->delete();
                return back()->with('Usuariod','ok');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return back()->with('Usuariod','error');
        }
        
    }

}
