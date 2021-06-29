<?php

class Enemy
{
  // プロパティ
  const MAX_HITPOINT = 50; //最大HP
  private $name; //敵の名前
  private $hitPoint = 50; //敵のHP
  private $attackPoint = 10; //敵の攻撃力

  // メソッド
  public function __construct($name)
  {
    $this->name = $name;
  }

  public function doAttack($human)
  {
    echo "「{$this->getName()}」の攻撃！\n";
    echo "「{$human->getName()}」に{$this->attackPoint}のダメージ！\n";
    $human->tookDamage($this->attackPoint);
  }

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }

  public function getName()
  {
    return $this->name;
  }

  public function getHitPoint()
  {
    return $this->hitPoint;
  }

  public function getAttackPoint()
  {
    return $this->attackPoint;
  }
}




?>