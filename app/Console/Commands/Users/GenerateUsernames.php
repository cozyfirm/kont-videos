<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateUsernames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:generate-usernames';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate usernames from email';

    /**
     * Execute the console command.
     */
    public function handle(){
        $users = User::where('role', '=', 'user')->get();
        foreach ($users as $user){
            $username = explode('@', $user->email)[0];

            $user->update(['username' => $username]);
        }
    }
}
