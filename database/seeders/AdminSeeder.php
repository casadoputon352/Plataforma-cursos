<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Support\Arr;


class AdminSeeder extends Seeder
{
  /**
   * The current Faker instance.
   *
   * @var \Faker\Generator
   */
  protected $faker;

  /**
   * Create a new seeder instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->faker = $this->withFaker();
  }

  /**
   * Get a new Faker instance.
   *
   * @return \Faker\Generator
   */
  protected function withFaker()
  {
    return Container::getInstance()->make(Generator::class);
  }


  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = [
      [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('123123123'),
        'role' => 'admin'
      ],
    ];
    foreach ($user as $key => $value) {
      $newUser = User::create(Arr::except($value, 'role'));
      $newUser->assignRole($value['role']);
    }
  }
}
