<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    private $user;


    public function __construct()
    {
        $this->user = new User();
    }

    public function index(){

        $search = request('search');

        if(!empty($search)){
            $users = DB::table('users')->where('name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%'.$search.'%')->get()->paginate(10);
        } else {
            $users = $this->user->paginate(10);
        }

        return view('profileList', compact('users'));
    }

    public function create(){
        return view('registerUser');
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $this->user->find($request->user()->id);

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/listProfiles');
    }

    public function destroyProfileById(string $id): RedirectResponse
    {
        $user = $this->user->find($id);

        $destroy = $user->delete();

        if($destroy){
            return Redirect::to('/listProfiles');
        }
    }

    public function editProfileById(string $id){
        $user = $this->user->find($id);

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function insertProfile(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return Redirect::to('/listProfiles'); 
    }
}
