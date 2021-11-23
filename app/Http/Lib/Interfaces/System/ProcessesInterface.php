<?php

namespace App\Http\Lib\Interfaces\System;

interface ProcessesInterface
{
    public function getProcesses();
    public function getInstance(ShellInterface $shell);
}
