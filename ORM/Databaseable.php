<?php

interface Databaseable 
{
    public function save(): bool;
    public static function get(int $id): Databaseable;
    public function search(string $search): array;
    // public function update() bool;
}