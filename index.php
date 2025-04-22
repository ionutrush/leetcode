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
$args = [];
if ($argv[3]) {
    $argv[3] = json_decode($argv[3], true);
}
$response = $instance->run(...$argv);
echo "Response: $response";