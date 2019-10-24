<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     * Client ID: 1
     * Client secret: 61pL31tnzUC3V854ZbKiLj6z1C2fwyz2hdA27wbs
     * Password grant client created successfully.
     * Client ID: 2
     * Client secret: dqqF4tgXseLHuYJVrq1pu8cDHvdQEY4UmtLYQMH4
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => ['required', 'min:3'],
            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:6'],
            'bio' => 'required',
            'type' => 'required',
        ]);
        User::addUser($attributes);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function profile()
    {
        return auth('api')->user();
    }
    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();
        $name = '';
        $currentPhoto = $user->photo;
        if ($request->photo && $request->photo != $currentPhoto) {
            $image = $request->photo;
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/profile/') . $name);
            $newPhoto = $request->merge(['photo' => $name]);
        }
        if (!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $userPhoto = public_path('img/profile/') . $currentPhoto;
        if (file_exists($userPhoto)) {
            @unlink($userPhoto);
        }
        // $this->validate($request, [
        //     'name' => ['required', 'min:3'],
        //     'email' => 'unique:users,email,' . $user->id,
        // ]);
        dd($request);
        $user->update($request->all());

        return response()->json(['success' => 'You have successfully updated'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => ['required', 'string', 'min:6']
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($request['password']);
        $user->update($input);
        return ['message' => 'Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
