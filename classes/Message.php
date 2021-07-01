<?php

class Message
{
  // ステータス表示
  public static function displayStatusMessage($objects)
  {
    foreach ($objects as $object) {
      echo "{$object->getName()} ： {$object->getHitPoint()}/" . $object::MAX_HITPOINT . PHP_EOL;
    }
  }

  // 攻撃メッセージ
  public static function displayAttackMessage($objects, $targets)
  {
    // 白魔道士の場合他オブジェクトも渡す
    foreach ($objects as $object) {
      if (get_class($object) == "WhiteMage") {
        $attackResult = $object->doAttackWhiteMage($targets, $objects);
      } else {
        $attackResult = $object->doAttack($targets);
      }
      if ($attackResult) {
        echo PHP_EOL;
      }
      $attackResult = false;
    }
    echo PHP_EOL;
  }



}

?>