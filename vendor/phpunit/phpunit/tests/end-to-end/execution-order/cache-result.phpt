--TEST--
phpunit --order-by=no-depends,reverse --cache-result --cache-result-file ./tests/_files/MultiDependencyTest.php
--FILE--
<?php declare(strict_types=1);
$target = sys_get_temp_dir() . DIRECTORY_SEPARATOR . sha1(__FILE__);

$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--ignore-dependencies';   // keep coverage for legacy CLI option
$_SERVER['argv'][] = '--order-by=reverse';
$_SERVER['argv'][] = '--cache-result';
$_SERVER['argv'][] = '--cache-result-file=' . $target;
$_SERVER['argv'][] = realpath(__DIR__ . '/../execution-order/_files/MultiDependencyTest.php');

require __DIR__ . '/../../bootstrap.php';

PHPUnit\TextUI\Command::main(false);

print file_get_contents($target);
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

.SS..                                                               5 / 5 (100%)

Time: %s, Memory: %s

OK, but incomplete, skipped, or risky tests!
Tests: 5, Assertions: 3, Skipped: 2.
C:37:"PHPUnit\Runner\DefaultTestResultCache":%d:{a:2:{s:7:"defects";a:2:{s:29:"MultiDependencyTest::testFour";i:1;s:30:"MultiDependencyTest::testThree";i:1;}s:5:"times";a:5:{s:29:"MultiDependencyTest::testFive";d:%f;s:29:"MultiDependencyTest::testFour";d:%f;s:30:"MultiDependencyTest::testThree";d:%f;s:28:"MultiDependencyTest::testTwo";d:%f;s:28:"MultiDependencyTest::testOne";d:%f;}}}
--CLEAN--
<?php declare(strict_types=1);
unlink(sys_get_temp_dir() . DIRECTORY_SEPARATOR . sha1(__FILE__));
