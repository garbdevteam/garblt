<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ShowAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset-password
                            {--user= : The ID of the user}
                            {--password= : The new password}';



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset Password for user';

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
        //
        $UserID = $this->option('user');
        $password = $this->option('password');

        if (empty($UserID) || empty($password)) {
            if (empty($UserID)) {
                $this->info("Please enter user id");
            }
            if (empty($password)) {
                $this->info("Please enter new password");
            }
        } else {
            $User = User::find($UserID);
            if (empty($User)) {
                $this->info("User not exist");
            } else {
                $User->update([
                    "password" => Hash::make($password),
                ]);
                $this->info("Password Changed Successfully");
            }
        }
    }
}
