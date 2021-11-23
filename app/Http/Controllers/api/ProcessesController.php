<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Lib\Interfaces\System\ProcessesInterface;
use Illuminate\Http\Request;

class ProcessesController extends Controller
{
    protected $processes;
    public function __construct(ProcessesInterface $processes)
    {
        $this->processes = $processes;
    }
    public function getProcesses(){
        return $this->processes->getProcesses();
    }
}
