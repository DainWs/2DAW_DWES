<?php

namespace src\domain\packages;

abstract class DataPackager {
    public abstract function getData(...$args): Array;
}