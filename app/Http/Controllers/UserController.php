<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    private $users;
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->users = new User();
    }
    
    public function index()
    {
        $users = $this->users->simplePaginate(10);

        return view('userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = $this->users->find($id);

        return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', '=', $id)->delete();
        $user = $this->users->find($id);
        $destroy = $user->delete();

        if($destroy){
            return redirect('dashboard/listUsers');
        }
    }
}
