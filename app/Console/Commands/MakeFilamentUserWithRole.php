<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Filament\Facades\Filament;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class MakeFilamentUserWithRole extends Command
{
    protected $signature = 'make:filament-super-admin';
    protected $description = 'Create a new Filament user with Super Admin role';

    public function handle()
    {
        try {
            $email = $this->ask('Enter email address');

            // Validasi apakah email sudah terdaftar
            if (User::where('email', $email)->exists()) {
                $this->error("User with this email already exists!");
                return;
            }

            // Meminta password dengan konfirmasi
            $password = $this->secret('Enter password');
            $confirmPassword = $this->secret('Confirm password');

            if ($password !== $confirmPassword) {
                $this->error("Passwords do not match!");
                return;
            }

            $role = Role::where('name', 'super_admin')->first();

            if (! $role) {
                $this->error("Role 'super_admin' not found. Please create it first.");
                return;
            }

            // Buat user baru
            $user = User::create([
                'name' => 'Super Admin',
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            // Beri role Super Admin dengan ID UUID yang benar
            $user->assignRole($role->name); // Pastikan ini menggunakan 'name' jika sistem tidak menggunakan ID langsung

            // Tandai user sebagai Filament admin
            Filament::auth()->login($user);

            $this->info("Super Admin user created successfully!");
        } catch (Exception $e) {
            $this->error("An error occurred: " . $e->getMessage());
        }
    }
}
