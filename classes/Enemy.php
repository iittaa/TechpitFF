<?php

class Enemy
{
  const MAX_HITPOINT = 50; //最大HP
  public $name; //敵の名前
  public $hitPoint = 50; //敵のHP
  public $attackPoint = 10; //敵の攻撃力

  public function doAttack($human)
  {
    echo "「{$this->name}」の攻撃！\n";
    echo "「{$human->name}」に{$this->attackPoint}のダメージ！\n";
    $human->tookDamage($this->attackPoint);
    
  }

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }

  }

}




?>