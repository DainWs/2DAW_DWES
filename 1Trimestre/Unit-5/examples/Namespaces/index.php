<?php
namespace examples\namespaces;

use examples\namespaces\models\tasks\NormalTask;
use examples\namespaces\models\PCGamer;

$computer = new PCGamer();
$taskIndex = $computer->addCPUTask(new NormalTask('Buenos dias'));
echo $computer->getCPUInformation();
echo $computer->getCPUTask($taskIndex);