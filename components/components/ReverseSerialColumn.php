<?php
namespace app\components;


use yii\grid\SerialColumn;

class ReverseSerialColumn extends SerialColumn
{
protected function renderDataCellContent($model, $key, $index)
{
$pagination = $this->grid->dataProvider->getPagination();
$total = $this->grid->dataProvider->getTotalCount();

if ($pagination !== false) {
return $total - $pagination->offset - $index;
}

return $total - $index;
}
}
?>
