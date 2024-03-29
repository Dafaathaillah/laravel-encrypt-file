<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    DB::table('users')->insert(
      [
        'name' => 'admin', 'role' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('12345678')
      ]
    );
    DB::table('users')->insert(
      [
        'name' => 'Ananda Salsabila', 'role' => 'user', 'email' => 'usertest@gmail.com', 'password' => bcrypt('12345678')
      ]
    );
  }
}
