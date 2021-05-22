<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin
                            {email : The email of the user}
                            {password : The password of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        if (User::where('email', $email)->exists()) {
            return $this->error('Email already exists.');
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        tap(User::create([
            'name' => 'Administrator',
            'email' => $email,
            'password' => Hash::make($password)
        ]), function (User $admin) use ($adminRole) {
            $admin->assignRole($adminRole);
        });

        $this->info('Successfully create admin.');
    }
}
