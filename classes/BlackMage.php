<?php

// 黒魔道士クラス
class BlackMage extends Human
{
  // プロパティ
  const MAX_HITPOINT = 80; //最大のHP
  private $name;
  private $hitPoint = 80;
  private $attackPoint = 10;
  private $intelligence = 30; //魔法攻撃力

  // メソッド

  public function __construct($name)
  {
    // 親メソッドのコンストラクタを呼ぶ
    Parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }

  public function doAttack($enemy)
  {
    if (rand(1, 2) === 1) {
      echo "「{$this->getName()}」がスキルを発動した！" . PHP_EOL;
      echo "「ファイア！！！」" . PHP_EOL;
      echo "{$enemy->getName()}に". $this->intelligence * 1.5 . "のダメージ" . PHP_EOL;
      $enemy->tookDamage($this->intelligence * 1.5);
    } else {
      Parent::doAttack($enemy);
    }
    // return true;
  }


}

?>