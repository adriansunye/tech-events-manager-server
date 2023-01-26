<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit-events']);
        Permission::create(['name' => 'delete-events']);
        Permission::create(['name' => 'create-events']);
        Permission::create(['name' => 'join-events']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('join-events');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('edit-events');
        $role2->givePermissionTo('delete-events');
        $role2->givePermissionTo('create-events');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::factory()->create([
            'name' => 'Example User',
            'email' => 'user@example.com',
            'password' => bcrypt('user'),
        ]);
        $user->assignRole($role1);

        $admin = User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole($role2);

        $superAdmin = User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('superAdmin'),
        ]);
        $superAdmin->assignRole($role3);

        // create demo posts
        Event::factory()->create([
            'title' => 'Seeder Event',
            'description' => 'description',
            'expiration_date' => '2023-04-20',
            'location' => 'Barcelona',
            'max_participants' => '100',
        ]);

        Event::factory()->create([
            'title' => 'Past Event',
            'description' => 'description',
            'expiration_date' => '1999-12-31',
            'location' => 'FactoriaF5',
            'max_participants' => '50',
        ]);

        Event::factory()->create([
            'title' => 'Full Event',
            'description' => 'description',
            'expiration_date' => '2023-12-3',
            'location' => 'Tortosa',
            'max_participants' => '0',
        ]);

        $event = Event::factory()->create([
            'title' => 'Joined Event',
            'description' => 'description',
            'expiration_date' => '2023-07-24',
            'location' => 'Barcelona',
            'max_participants' => '100',
        ]);
        $event->users()->attach($user);

        Event::factory()->count(5)->create([
            'highlighted' => '1',
        ]);
    }
}
