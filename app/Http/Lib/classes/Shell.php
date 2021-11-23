<?php

namespace App\Http\Lib\classes;


use App\Http\Lib\Interfaces\System\ShellInterface;

class Shell implements ShellInterface
{
    protected $command;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function validate()
    {
        /// escapeshellcmd is Enough for this task
        $this->command = escapeshellcmd($this->command);
    }

    public function run()
    {
        $this->validate();
        return shell_exec($this->command);
    }
}
