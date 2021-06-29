<?php
// echo "処理のはじまりはじまり〜\n\n";

// ファイル読み込み
require_once("classes/Enemy.php");
require_once("classes/Human.php");
require_once("classes/Brave.php");

$tiida = new Human("ティーダ");
$goblin = new Enemy("ゴブリン");
$turn = 1;

// echo $tiida->name . "\n";
// echo $goblin->name . "\n";
// echo rand(1,3) . PHP_EOL;

while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
  echo "●●●●●●{$turn}ターン目●●●●●●" . PHP_EOL;

  echo "{$tiida->getName()} ： {$tiida->getHitPoint()}/" . $tiida::MAX_HITPOINT . "\n";
  echo "{$goblin->getName()} ： {$goblin->getHitPoint()}/" . $goblin::MAX_HITPOINT . "\n";

  echo $tiida->doAttack($goblin) . PHP_EOL;
  echo $goblin->doAttack($tiida) . PHP_EOL;

  $turn++;

}

echo "★★★戦闘終了★★★" . PHP_EOL;
echo "{$tiida->getName()} ： {$tiida->getHitPoint()}/" . $tiida::MAX_HITPOINT . "\n";
echo "{$goblin->getName()} ： {$goblin->getHitPoint()}/" . $goblin::MAX_HITPOINT . "\n";


?>