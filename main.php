<?php
// echo "処理のはじまりはじまり〜\n\n";

// ファイル読み込み
require_once("classes/Enemy.php");
require_once("classes/Human.php");

$tiida = new Human();
$goblin = new Enemy();
$turn = 1;

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

echo $tiida->name . "\n";
echo $goblin->name . "\n";

while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
  echo "●●●●●●{$turn}ターン目●●●●●●" . PHP_EOL;

  echo "{$tiida->name} ： {$tiida->hitPoint}/" . $tiida::MAX_HITPOINT . "\n";
  echo "{$goblin->name} ： {$goblin->hitPoint}/" . $goblin::MAX_HITPOINT . "\n";

  echo $tiida->doAttack($goblin) . PHP_EOL;
  echo $goblin->doAttack($tiida) . PHP_EOL;

  $turn++;

}

echo "★★★戦闘終了★★★" . PHP_EOL;
echo "{$tiida->name} ： {$tiida->hitPoint}/" . $tiida::MAX_HITPOINT . "\n";
echo "{$goblin->name} ： {$goblin->hitPoint}/" . $goblin::MAX_HITPOINT . "\n";


?>