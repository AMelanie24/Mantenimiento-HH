<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   public function handle()
{
    \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@test.com',
        'password' => bcrypt('password123')
    ]);
    $this->info('Usuario creado: admin@test.com / password123');
}
}
