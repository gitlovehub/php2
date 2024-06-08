<?php 

namespace MyNamespace\MyProject\Models;

use MyNamespace\MyProject\Common\Model;

class Product extends Model
{
    protected string $tableName = 'tbl_products';

    public function getCategoryName() {
        return $this->queryBuilder
            ->select('p.id', 'c.name as category_name', 'p.name')
            ->from('tbl_products', 'p')
            ->join('p', 'tbl_categories', 'c', 'p.category_id = c.id')
            ->executeQuery()
            ->fetchAllAssociative();
    }
}