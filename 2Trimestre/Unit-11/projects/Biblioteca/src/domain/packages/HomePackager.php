<?php

namespace src\domain\packages;

use App\Repository\LibrosRepository;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class HomePackager extends DataPackager {
    public function getData(): Array {
        
        return [];
    }
}