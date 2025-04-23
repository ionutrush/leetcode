<?php

require 'vendor/autoload.php';

$solutionNumber = $argv[1] ?? null;
$difficulty = $argv[2] ?? "Easy";

unset($argv[0]);
unset($argv[1]);
unset($argv[2]);
if (!$solutionNumber || !class_exists($className = "Rushdevelopment\\Leetcode\\{$difficulty}\\Solution{$solutionNumber}")) {
    throw new Exception("Class {$className} not found");
}
$instance = new $className();
$argv = array_map(function ($arg) {
    return json_decode($arg, true);
}, $argv);
$response = $instance->run(...$argv);
echo "Response: " . json_encode($response);