<?php

class Brave extends Human
{
  // プロパティ
  const MAX_HITPOINT = 120;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 30;


  // メソッド
  public function __construct($name)
  {
    // 親メソッドのコンストラクタを呼ぶ。
    Parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }

  public function doAttack($enemy)
  {
    // 1/3の確率でスキルを発生させる
    if (rand(1, 3) === 1) {
      echo "「{$this->getName()}」のスキルが発動した！" . PHP_EOL;
      echo "「全力斬り！！」" . PHP_EOL;
      echo "「{$enemy->getName()}」に" . $this->attackPoint * 1.5 . "のダメージ！" . PHP_EOL;
      $enemy->tookDamage($this->attackPoint * 1.5);
    } else {
      // 親のメソッドを使用する。
      Parent::doAttack($enemy);
    }
  }

}

?>