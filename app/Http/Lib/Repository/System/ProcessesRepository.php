<?php

namespace App\Http\Lib\Repository\System;

use App\Http\Lib\classes\Shell;
use App\Http\Lib\Interfaces\System\ShellInterface;
use App\Http\Lib\Interfaces\System\ProcessesInterface;

class ProcessesRepository implements ProcessesInterface
{
    protected $shell;
    protected $command = 'ps axco command';
    public function __construct()
    {
        $this->getInstance(new Shell($this->command));
    }

    public function getInstance(ShellInterface $shell)
    {
        $this->shell=$shell;
    }

    public function getProcesses()
    {
        $results =$this->shell->run();
        $processes = array_filter(explode("\n",$results));
        $response = [
            'status'=>true,
            'data' => $processes
        ];
        return response($response,201);
    }
}
