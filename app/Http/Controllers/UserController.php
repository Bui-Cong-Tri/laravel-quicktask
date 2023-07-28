<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    const DEFAULT_LIMIT = 15;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::orderBy('created_at')->paginate(self::DEFAULT_LIMIT, ['*'], 'page', $request->input('page') ?? 1);

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User;
        $validated = $request->validated();
        $user->fullName = $validated['fullname'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()->route('users.index')->with('success', trans('message.user.store.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('articles');

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->fullName = $validated['fullname'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        $user->save();

        return redirect()->route('users.show', ['user' => $user->id])->with('success', trans('message.user.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === Auth::id() || Auth::user()->is_admin){
        DB::transaction(function () use ($user) {
            $user->load('articles');
            Article::destroy($user->articles->pluck('id'));
            $user->delete();
        });

        return redirect()->route('users.index')->with('success', trans('message.user.destroy.success'));}else {
            redirect()->route('users.index')->with('fail', trans('403'));
        }
    }
}
