<?php
// echo "処理のはじまりはじまり〜\n\n";

// ファイル読み込み
require_once("classes/Enemy.php");
require_once("classes/Human.php");
require_once("classes/Brave.php");
require_once("classes/BlackMage.php");
require_once("classes/WhiteMage.php");
require_once("classes/Message.php");

// インスタンス化
$members = array();
$members[] = new Brave("ティーダ");
$members[] = new BlackMage("ユウナ");
$members[] = new WhiteMage("ルールー");

$enemies = array();
$enemies[] = new Enemy("ゴブリン", 20);
$enemies[] = new Enemy("ボム", 25);
$enemies[] = new Enemy("モルボル", 30);

$turn = 1;
$isFinishFlg = false;
// echo $tiida->name . "\n";
// echo $goblin->name . "\n";
// echo rand(1,3) . PHP_EOL;

// 全滅チェックメソッド
function isFinish($objects)
{
  $deathCnt = 0;
  foreach ($objects as $object) {
    if ($object->getHitPoint() > 0) {
      return false;
    }
    $deathCnt++;
  }

  if ($deathCnt === count($objects)) {
    return true;
  }
}



while (!$isFinishFlg) {
  echo "●●●●●●{$turn}ターン目●●●●●●" . PHP_EOL . PHP_EOL;
  // 味方のHP表示
  Message::displayStatusMessage($members);
  // 敵のHP表示
  Message::displayStatusMessage($enemies);

  // 現在のHPを表示する
  // foreach ($members as $member) {
    // echo "{$member->getName()} ： {$member->getHitPoint()}/" . $member::MAX_HITPOINT . PHP_EOL;
  // }

  // foreach ($enemies as $enemy) {
    // echo "{$enemy->getName()} ： {$enemy->getHitPoint()}/" . $enemy::MAX_HITPOINT . PHP_EOL;
  // }

  // echo "{$tiida->getName()} ： {$tiida->getHitPoint()}/" . $tiida::MAX_HITPOINT . "\n";
  // echo "{$goblin->getName()} ： {$goblin->getHitPoint()}/" . $goblin::MAX_HITPOINT . "\n";

  // 攻撃する
  // 味方の攻撃
  Message::displayAttackMessage($members, $enemies);
  // 敵の攻撃
  Message::displayAttackMessage($enemies, $members);

  // foreach ($members as $member) {
    // $enemiesIndex = rand(0, count($enemies) - 1);
    // $enemy = $enemies[$enemiesIndex];

    // 白魔道士の場合他オブジェクトも渡す
    // if (get_class($member) == "WhiteMage") {
    //   $member->doAttackWhiteMage($enemies, $members) . PHP_EOL;
      // $member->doAttackWhiteMage($enemy, $member) . PHP_EOL;
    // } else {
    //   $member->doAttack($enemies) . PHP_EOL;
      // $member->doAttack($enemy) . PHP_EOL;
  //   }
  //   echo PHP_EOL;
  // }

  // foreach ($enemies as $enemy) {
    // $membersIndex = rand(0, count($members) - 1);
    // $member = $members[$membersIndex];
  //   echo $enemy->doAttack($members) . PHP_EOL;
  // }

  // 味方の全滅をチェックする
  // $deathCnt = 0;
  // foreach ($members as $member) {
  //   if ($member->getHitPoint() > 0) {
  //     $isFinishFlg = false;
  //     break;
  //   }
  //   $deathCnt++;
  // }

  $isFinishFlg = isFinish($members);
  if ($isFinishFlg) {
    $message = "GAME OVER...." . PHP_EOL . PHP_EOL;
    break;
  }
  // if ($deathCnt === count($members)) {
  //   $isFinishFlg = true;
  //   echo "GAME OVER...." . PHP_EOL;
  //   break;
  // }

  // 敵の全滅をチェックする
  // $deathCnt = 0;
  // foreach ($enemies as $enemy) {
  //   if ($enemy->getHitPoint() > 0) {
  //     $isFinishFlg = false;
  //     break;
  //   }
  //   $deathCnt++;
  // }

  $isFinishFlg = isFinish($enemies);
  if ($isFinishFlg) {
    $message = "♪♪♪ファンファーレ♪♪♪" . PHP_EOL . PHP_EOL;
    break;
  }
  // if ($deathCnt === count($enemies)) {
  //   $isFinishFlg = true;
  //   echo "♪♪♪ファンファーレ♪♪♪" . PHP_EOL;
  //   break;
  // }

  // echo $tiida->doAttack($goblin) . PHP_EOL;
  // echo $goblin->doAttack($tiida) . PHP_EOL;

  $turn++;
}

// 現在のHPを表示する
echo "★★★戦闘終了★★★" . PHP_EOL . PHP_EOL;

echo $message;
// echo "{$tiida->getName()} ： {$tiida->getHitPoint()}/" . $tiida::MAX_HITPOINT . "\n";
// echo "{$goblin->getName()} ： {$goblin->getHitPoint()}/" . $goblin::MAX_HITPOINT . "\n";

// foreach ($members as $member) {
//   echo "{$member->getName()} ： {$member->getHitPoint()}/" . $member::MAX_HITPOINT . PHP_EOL;
// }
Message::displayStatusMessage($members);
echo PHP_EOL;

// foreach ($enemies as $enemy) {
//   echo "{$enemy->getName()} ： {$enemy->getHitPoint()}/" . $enemy::MAX_HITPOINT . PHP_EOL;
// }
Message::displayStatusMessage($enemies);

?>