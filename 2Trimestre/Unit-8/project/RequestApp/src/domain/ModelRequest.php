<?php

namespace src\domain;

abstract class ModelRequest extends Request {
    public abstract function doAddTypeInteract(): bool;
    public abstract function doEditTypeInteract(): bool;
    public abstract function doDeleteTypeInteract(): bool;
}