<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resetpassword {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset admin password';

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
     * @return mixed
     */
    public function handle()
    {     
        User::where('username', 'admin')->update([
            'password' => Hash::make($this->argument('password'))
        ]);
        echo "\n";
        echo 'Ваш логин: '. User::where('username', 'admin')->value('username') . "\n";
        echo 'Ваш новый пароль: '. $this->argument('password');
        echo "\n";
    }
}
