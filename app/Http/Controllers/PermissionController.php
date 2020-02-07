<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Permission;
use App\Post;
use App\Role;
use Illuminate\Http\Request;
use Lang;

class PermissionController extends Controller
{
    //
    public function index()
    {
        return view('permission.index');
    }

    public function create()
    {
        return view('permission.new');
    }

    public function store(Request $request)
    {       
        
        //print_r($_POST);
        $this->validate($request, [
            'permission' => 'required|min:2',
        ]);
            
        //Search a Permission with the same name 
        $validate_Permission = Permission::where('name','LIKE','%'.$request->permission)->get();
       
        if(count($validate_Permission)<=0)
        {
            $menssage = "";
            $permissions = $this->generatePermissions($request->permission);

                foreach ($permissions as $permission) {
                    Permission::firstOrCreate(['name' => $permission ]);
                }

                $menssage .= \Lang::get('words.Permissions').' '.implode(', ', $permissions).' '.\Lang::get('words.Created');
            // sync role for admin
            if( $role = Role::where('name', 'Admin')->first() ) {
                $role->syncPermissions(Permission::all());

                $menssage .= \Lang::get('validation.PermissionAdmin');
            }
            
            $alert = ['success', $menssage];
            return redirect()->route('permissions.index')->with('alert', $alert);		         
        }
        else
        {
           
            $error = \Lang::get('validation.PermissionTake');
            $alert = ['error', $error];
            return redirect()->route('permissions.index')->with('alert', $alert);		                    
            
        }
            
       

    }

    public function destroy($del)
    {
        $menssage = "";
        if( Permission::where('name', 'LIKE', '%'. $del)->delete() ) {
       
            $menssage .= \Lang::get('words.Permission').' '.$del.' '.\Lang::get('words.Deleted');

        }  else {
            $menssage .= "No". \Lang::get('words.Permissions').' '.$del;
           
        }

        if( $role = Role::where('name', 'Admin')->first() ) {
            $role->syncPermissions(Permission::all());

            $menssage .= " ".\Lang::get('validation.PermissionAdmin');
        }
        echo json_encode([
            'status' => $menssage,
        ]);		   
    }

    /// Next Functions only for acces in a permission controller. 
    private function generatePermissions($attr)
    {
        $abilities = ['view', 'add', 'edit', 'delete'];
        $name = $this->getNameArgument($attr);

        return array_map(function($val) use ($name) {
            return $val . '_'. $name;
        }, $abilities);
    }

    private function getNameArgument($attr)
    {
        return strtolower(str_plural($attr));
    }
}
