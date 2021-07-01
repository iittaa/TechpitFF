<?php

class WhiteMage extends Human
{
  // プロパティ
  const MAX_HITPOINT = 80;
  private $name;
  private $hitPoint = 80;
  private $attackPoint = 10;
  private $intelligence = 30; //魔法攻撃力

  // メソッド
  public function __construct($name)
  {
   Parent::__construct($name, $this->hitPoint, $this->attackPoint); 
  }

  public function doAttackWhiteMage($enemy, $human)
  {
    if (rand(1, 2) === 1) {
      echo "「{$this->getName()}」がスキルを発動した！" . PHP_EOL;
      echo "「ケアル！！！」" . PHP_EOL;
      echo "{$human->getName()}のHPを" . $this->intelligence * 1.5 . "回復！" . PHP_EOL ;
      $human->recoveryDamage($this->intelligence * 1.5, $human);
    } else { 
      Parent::doAttack($enemy);
    }
    // return true;
  }


}

?>