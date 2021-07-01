<?php

class Lives
{
  // プロパティ
  private $name;
  private $hitPoint;
  private $attackPoint;
  private $intelligence;

  // メソッド
  public function __construct($name, $hitPoint = 50, $attackPoint = 10, $intelligence = 0)
  {
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
    $this->intelligence = $intelligence;
  }

  // 名前を取得する（ゲッター）
  public function getName()
  {
    return $this->name;
  }

  // 現在のHPを取得する（ゲッター）
  public function getHitPoint()
  {
    $result = $this->hitPoint;
    if ($result < 0) {
      $result = 0;
    }
    return $result;
  }

  // 現在のHPを設定する（セッター）
  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    // HPが0未満にならないための処理
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }

  public function recoveryDamage($heal, $target)
  {
    $this->hitPoint += $heal;
    // HPが最大HPを超えないようにするための処理
    if ($this->hitPoint > $target::MAX_HITPOINT) {
      $this->hitPoint = $target::MAX_HITPOINT;
    }
  }

  // 攻撃するメソッド
  public function doAttack($targets)
  {
    // 攻撃できるかのチェック
    if (!$this->isEnableAttack($targets)) {
      return false;
    }

    // ターゲット選定
    $target = $this->selectTarget($targets);

    // 攻撃する
    echo "「{$this->getName()}」の攻撃！" . PHP_EOL;
    echo "「{$target->getName()}」に{$this->attackPoint}のダメージ！" . PHP_EOL;
    $target->tookDamage($this->attackPoint);
    return true;
  }

  // 攻撃ができるかのチェック
  public function isEnableAttack($targets)
  {
    // ①自身のHPが0ではない
    if ($this->hitPoint <= 0) {
      return false;
    }

    // ②攻撃する相手のHPが0ではない
    foreach ($targets as $target) {
      if ($target->getHitPoint() > 0) {
        return true;
      }
    }
  }

  // ターゲットを決めるメソッド
  public function selectTarget($targets)
  {
    $target = $targets[rand(0, count($targets) - 1)];
    // 敵のHPが０以下の場合、再度ターゲットを決める
    while ($target->getHitPoint() <= 0) {
      $target = $targets[rand(0, count($targets) - 1)];
    }
    return $target;
  }

}

?>