<?php 
include_once('CPUMachine.php');

class Mobile implements CPUMachine {

    public function getCPUInformation(): String {
        return 'Intel core I5';
    }

    public function addCPUTask(object $task): int {
        return array_push($this->taskList, $task);
    }
    
    public function getCPUTask(int $key): object {
        return $this->taskList[$key] ?? null;
    }
    
    public function removeCPUTask(int $key): void {
        if (($this->taskList[$key] ?? null) != null) {
            $this->taskList[$key] == null;
        }
    }
}