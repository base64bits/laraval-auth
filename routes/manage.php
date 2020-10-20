<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/

// Admin routes to manage users
Route::prefix('admin')->middleware(['activity', 'web','auth:sanctum'])->group(function () {

    Route::get('/', function(Request $request, User $user){
        return redirect(route("admin.users.index"));
    })->name("admin.index");

    Route::middleware(['can:manage-users'])->group(function () {

        // USERS

        Route::get('users', function(Request $request){
            return view("users.index", ["users" => User::paginate(8)]);
        })->name("admin.users.index");


        Route::get('users/{user}', function(User $user){
            return view("users.edit", [
                "user" => $user,
                "roles" => Role::all()
            ]);
        })->name("admin.user.roles.edit");


        Route::put('users/{user}', function(User $user){
            $user->syncRoles(request('roles'));
            return redirect(route("admin.users.index"));
        })->name("admin.user.roles.update");



        // ROLES

        Route::get('roles', function(Request $request){
            return view("roles.index", ["roles" => Role::paginate(8)]);
        })->name("admin.roles.index");

        Route::get('roles/create', function(){
            return view("roles.create", [
                "permissions" => Permission::all()
            ]);
        })->name("admin.role.create");

        Route::post('roles', function(){
            Role::create([
                "name" => request("name"),
                "guard_name" => "web"
            ]);
            return redirect(route("admin.roles.index"));
        })->name("admin.role.store");

        Route::get('roles/{role}', function(Role $role){
            return view("roles.edit", [
                "role" => $role,
                "permissions" => Permission::all()
            ]);
        })->name("admin.role.permissions.edit");

        Route::put('roles/{role}', function(Role $role){
            $role->syncPermissions(request('permissions'));
            return redirect(route("admin.roles.index"));
        })->name("admin.role.permissions.update");

        // PERMISSIONS

        Route::get('permissions', function(Request $request){
            return view("permissions.index", ["permissions" => Permission::paginate(8)]);
        })->name("admin.permissions.index");

        Route::get('permissions/create', function(){
            return view("permissions.create");
        })->name("admin.permission.create");

        Route::post('permissions', function(){
            Permission::create([
                "name" => request("name"),
                "guard_name" => "web"
            ]);
            return redirect(route("admin.permissions.index"));
        })->name("admin.permission.store");

    });


});
