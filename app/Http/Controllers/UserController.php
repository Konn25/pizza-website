<?php

namespace App\Http\Controllers;

use App\Exceptions\WorkTimeRegistrationException;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 

        $users = User::with('orders')->withCount('orders')->paginate();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        //
        /*
        $user = new User($request->validated());
        $user->save();
        */
        throw_if(now()->hour < 17, new WorkTimeRegistrationException);
        $user = User::create($request->validated());
        return UserResource::make($user); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return config('app.timezone', 'Missing time zone');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
