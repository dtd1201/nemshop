<?php

namespace App\Http\Controllers\Crater\Users;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\UserRequest;
use App\Models\Crm\CompanySetting;
use App\Models\Crm\Country;
use App\Models\Crm\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 10;

        $users = User::where('role', 'admin', 'creator')
            ->applyFilters(
                $request->only([
                    'phone',
                    'email',
                    'display_name',
                    'orderByField',
                    'orderBy',
                ])
            )
            ->latest()
            ->paginate($limit);

        $data = [
            'users' => $users,
        ];

        return view('admin.crater.users.index', $data);
    }

    public function create()
    {
        $user = new User();
        $countries = Country::query()->get();

        $data = [
            'type' => 1,
            'user' => $user,
            'countries' => $countries
        ];

        return view('admin.crater.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'admin';
        $data['company_id'] = Auth::user()->company_id;
        $data['creator_id'] = Auth::id();
        $user = User::create($data);

        $user->setSettings([
            'language' => CompanySetting::getSetting('language', $user->company_id),
        ]);

        return redirect(route('sale.users.index'))->with('success', 'User Created!');

        //return response()->json(['user' => $user, 'success' => true,]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json([
            'user' => $user,
            'success' => true,
        ]);
    }


    public function edit(User $user)
    {
        $countries = Country::query()->get();

        $data = [
            'type' => 2,
            'countries' => $countries,
            'user' => $user,
        ];

        return view('admin.crater.users.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\UserRequest $request
     * @param \App\Models\Crm\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect(route('sale.users.index'))->with('success', 'User Updated!');

        //return response()->json(['user' => $user, 'success' => true,]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        if ($request->users) {
            User::destroy($request->users);
        }

        return redirect(route('sale.users.index'))->with('success', 'User Deleted!');

        //return response()->json(['success' => true,]);
    }
}
