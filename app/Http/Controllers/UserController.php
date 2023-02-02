<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id','ASC')->paginate(10);
        $value=($request->input('page',1)-1)*5;
        return view('users.list',compact('users'))->with('i',$value);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required','description' => 'required','price' => 'required','photo' => 'required']);
        // create new task
        User::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Your task added successfully!');
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('users.index')->with('success','Task updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','Task removed successfully');
    }
}
