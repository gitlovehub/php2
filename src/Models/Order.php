<?php 

namespace MyNamespace\MyProject\Models;

use MyNamespace\MyProject\Common\Model;

class Order extends Model
{
    protected string $tableName = 'tbl_orders';

    public function getOrders() {
        return $this->queryBuilder
            ->select('DATE_FORMAT(date, "%m") AS date', 'COUNT(*) AS total')
            ->from($this->tableName)
            ->where('date >= DATE_SUB(NOW(), INTERVAL 6 MONTH)')
            ->andWhere('date <= NOW()')
            ->groupBy('DATE_FORMAT(date, "%m")')
            ->fetchAllAssociative();
    }
}