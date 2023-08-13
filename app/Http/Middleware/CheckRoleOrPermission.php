<?php

namespace App\Http\Middleware;
use App\Models\User;
use App\Models\RoleHasPermission;
use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class CheckRoleOrPermission
{
  
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission)
    {
        $user = Auth::user();
        
        // $check_id = RoleHasPermission::where('role_id', $user->roles_id )->get();
        // foreach($check_id as $ids){
        //     $id_permissions[] = $ids->permission_id;
        // }

        // $permissions_data = Permission::whereIn('id', $id_permissions)->get();
        // foreach($permissions_data as $permission){
        //     $name[] = $permission->name;
        //     $guardName = $permission->guard_name;
        // }

        if ($user && $user->roles_id === 1 ) {

            return $next($request);
        }

        return redirect('/unauthorizsaasaed');

    }
}
