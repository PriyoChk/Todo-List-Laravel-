<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use  App\Models\todos;
use App\Models\User;
use Hash;
use App\Http\Controllers\TodoController;
use App\Notifications\sendEmail;


class todoController extends Controller


{

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) 
        {
            if (Hash::check($request->password, $user->password))
             {
                $request->session()->put('loginId', $user->id);
                return redirect()->route('todo.home');
            } 
            else
             {
                return back()->with('fail', 'Password does not match');
            }
        }
         else 
         {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect(route("todo.login"));
        }
    }


    public function registration()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if ($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    // public function index()
    // {
    //     return view('welcome'); // Assuming you have a welcome.blade.php view
    // }


    public function index()
    {
        $todos = todos::orderBy('Completed_at', 'ASC')
                      ->orderBy('id', 'ASC')
                      ->get();
        $data = compact('todos');
        return view("welcome")->with($data);
    }
    
    public function store(Request $request){

        $request->validate(
            ['name'=>'required',
            'work'=>'required',
            'dueDate'=>'required'
            ]
        );
       $todo=new todos;
       $todo->name=$request['name'];
       $todo->work=$request['work'];
       $todo->dueDate=$request['dueDate'];
       $todo->save();

        return redirect(route("todo.home"));

    }



    public function edit($id)
    {
        $todo=todos::find($id);
        $data=compact('todo');
        return view("update")->with($data);
    }
    public function updateData(Request $request)
    {
        $request->validate(
            ['name'=>'required',
            'work'=>'required',
            'dueDate'=>'required'
            ]
        );
        $id=$request['id'];
       $todo= todos::find($id);
       $todo->name=$request['name'];
       $todo->work=$request['work'];
       $todo->dueDate=$request['dueDate'];
       $todo->save();

        return redirect(route("todo.home"));
    }


    public function delete($id)
    {
        todos::find($id)->delete();
        return redirect(route("todo.home"));

    }

    public function Complete($id){

        $todo=todos::find($id);
        $todo->Completed_at=now(); 
        $todo->save();
        return redirect(route("todo.home"));
    }



      }

    