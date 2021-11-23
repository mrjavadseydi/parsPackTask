<?php

namespace App\Console\Commands;

use App\Http\Lib\classes\ZipDirectory;
use Illuminate\Console\Command;

class ZipCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zip:user {user}';
    protected $zip;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will create a zip  from given user files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ZipDirectory $zip)
    {
        parent::__construct();
        $this->zip = $zip;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username = $this->argument('user');
        if (!$username) {
            print("i need a real username! \n");
            return Command::FAILURE;
        }
        if (!$this->zip->zip($username,date('Y-m-d'),'myProgram')) {
            print("there is a problem ! the user must exists\n ");
            return Command::FAILURE;
        }else{
            print("zip file created in user directory!\n ");
            return Command::SUCCESS;
        }

    }
}
