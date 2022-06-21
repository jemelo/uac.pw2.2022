<?php


trait WithPrintable
{
    public function print(): void
    {
        echo "classe " . get_class() . "\n";
    }
}