<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $role1=Role::create(['name'=>'admin']);
       $role2=Role::create(['name'=>'coordinador']);
       $role3=Role::create(['name'=>'semillarista']);
       //$user=User::find(1);
       //$user->assignRole($role1);

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
};
