<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        //dd($request);
        //$users = User::where('name', 'LIKE', "%{$request->name}%")->toSql();
        //$users = User::where('name', 'LIKE', "%{$request->search}%")->get();

        $search = $request->search;
        //$users = User::where(function ($query) use ($search) {
        $users = $this->model
                        ->getUsers(
                            //search: $request->get('search', '')
                            search: $request->search ?? ''
                        );
        
        //dd($users);
 //       return view('users.index', [
 //           'users' => $users]
 //       );

        return view('users.index', 
            compact('users')
        );

    }

    public function show($id)
    {
        //$user = User::where('id', $id)->first();

        if(!$user = User::find($id)) {
            //return redirect()->back();
            return redirect()->route('users.index');
        }

        //dd($user);
        //dd('users.show', $id);

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        //dd('cadastrando o usuário');
        //dd($request->all());

        /*
        // ALTERNATIVA 1

        $user = new User;
        //$user->name = $request->get('name', 'dfds');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        */

        // ALTERNATIVA MAIS PRODUTIVA
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $this->model->create($data);
/*
// teste

        $pass_reset = '';

        try {
            DB::beginTransaction();
            $user = User::create($data);
            $pass_reset = DB::insert("insert into password_resets (email, token) VALUES ('helio@email.com','kkkdjlajka'");
            DB::commit();
            return redirect()->route('user.index')->with('success','Thank You for your subscription');
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->route('users.index')
            ->with('warning','Something Went Wrong!');
            //return 'Um erro ocorreu: '. '<br>' .$e->getMessage();
        }
        
        //dd($pass_reset);
*/

        //return redirect()->route('users.show',$user->id);
        return redirect()->route('users.index');

    }

    public function edit($id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));

    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        //dd($request->all());

        $data = $request->only('name','email');
        if($request->password)
            $data['password'] = bcrypt($request->password); 

        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();

        return redirect()->route('users.index');
    }

}
