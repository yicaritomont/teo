<?php

use Illuminate\Database\Seeder;
use App\Menu;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $Menus = [
            ['id' => '1' , 'name' => 'ManagementTools'                  ,'status' => 1 , 'menu_id' => 1, 'icon' => 'fa-cog'],
            ['id' => '3' , 'name' => 'ManageUsers'                      ,'status' => 1 , 'menu_id' => 1, 'url' => 'users', 'icon' => 'fa-user'],
            ['id' => '4' , 'name' => 'ManagePermission'                 ,'status' => 1 , 'menu_id' => 1, 'url' => 'permissions', 'icon' => 'fa-wrench'],
            ['id' => '5' , 'name' => 'ManageRoles'                      ,'status' => 1 , 'menu_id' => 1, 'url' => 'roles', 'icon' => 'fa-lock'],
            ['id' => '6' , 'name' => 'ManageMenu'                       ,'status' => 1 , 'menu_id' => 1, 'url' => 'menus', 'icon' => 'fa-th-list'],

        ];

		foreach ($Menus as $Menu) {
			Menu::create($Menu);
		}
    }
}
