<?php

namespace App\Console\Commands;

use App\Http\Lib\classes\ZipDirectory;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'backup all user data';
    protected $zip;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ZipDirectory $zip)
    {
        $this->zip = $zip;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get('username');
        foreach ($users as $user){
            if (!Storage::disk('backup')->exists($user->username)) {
                Storage::disk('backup')->makeDirectory($user->username);
            }
            if (!$this->zip->zip($user->username,date('Y-m-d'),'backup')) {
                print("there is a problem with user {$user->username} \n ");
            }
        }
        return Command::SUCCESS;
    }
}
