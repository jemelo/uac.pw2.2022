<?php

interface Databaseable 
{
    public function save(): bool;
    public static function get(int $id): Databaseable;
    public static function search(array $colunas, array $operadores, array $valores): array;
    // public function update() bool;
    // public function delete(int $id): bool;
    // public function getAll(): array;
}