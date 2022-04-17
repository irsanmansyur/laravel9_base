<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => "Super Admin", "guard_name" => "web"],
            ['name' => "Admin", "guard_name" => "web"]
        ]);
        $this->command->info('Default Roles added.');

        $admin =  User::create([
            "name" => "Admin",
            "email" => "admin@app.com",
            "password" => password_hash("app", PASSWORD_DEFAULT),
            'email_verified_at' => now(),
            'remember_token' => str()->random(10),
        ]);
        $admin->assignRole("Admin");
        $this->command->info('Default User added.');
    }
}
