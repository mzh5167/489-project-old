<?php

trait addEdit
{
  private $values = [];
  private $isAdd = true;
  protected function isAdd()
  {
    return $this->isAdd;
  }
  public function setValues(array $values)
  {
    $this->values = $values;
    $this->isAdd = empty($values);
    return $this;
  }
  protected function insVal($value)
  {
    return isset($this->values[$value]) ?
      "value='" . $this->values[$value] . "'" :
      "";
  }
}
