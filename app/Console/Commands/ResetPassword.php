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
    protected $signature = 'resetpassword {user} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset password';

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
        User::where('id', $this->argument('user'))->update([
            'password' => Hash::make($this->argument('password'))
        ]);
        dump('Ваш логин: '. User::where('id', $this->argument('user'))->value('email'));
        dump('Ваш новый пароль: '. $this->argument('password'));
    }
}
