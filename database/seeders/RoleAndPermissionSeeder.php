<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Permission::create(['name' => 'basico']);
    Permission::create(['name' => 'prata']);
    Permission::create(['name' => 'ouro']);

    $admin = Role::create(['name' => 'admin']);

    Role::create(['name' => 'user']); //Adicionar permissões ao pagar*

    $admin->givePermissionTo([
      'basico',
      'prata',
      'ouro',
    ]);
  }
}
