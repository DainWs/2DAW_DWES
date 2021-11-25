<?php
interface CPUMachine {
    public function getCPUInformation(): String;
    public function addCPUTask(object $task): int;
    public function getCPUTask(int $key): object;
    public function removeCPUTask(int $key): void;
}