<?php
namespace examples\namespaces\models;

use examples\namespaces\models\Computer;

class PCGamer extends Computer {

    private array $taskList = [];

    public function getInformation(): String {
        return "PC Gamer";
    }

    public function getCPUInformation(): String {
        return 'Amd CPU Ryzen 9 5950X 3.4GHz';
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