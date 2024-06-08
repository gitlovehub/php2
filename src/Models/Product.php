<?php 

namespace MyNamespace\MyProject\Models;

use MyNamespace\MyProject\Common\Model;

class Product extends Model
{
    protected string $tableName = 'tbl_products';

    public function getCategoryName() {
        return $this->queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.category_id', 'cate.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'cate', 'cate.id = p.category_id')
            ->orderBy('p.id', 'DESC')
            ->fetchAllAssociative();
    }

    public function paginateProducts($page, $perPage) {
        $queryBuilder = clone($this->queryBuilder);
    
        $totalPage = ceil($this->count() / $perPage);
    
        $offset = $perPage * ($page - 1);
    
        $data = $queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.category_id', 'cate.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'cate', 'cate.id = p.category_id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('p.id', 'DESC')
            ->fetchAllAssociative();
    
        return [$data, $totalPage];
    }

    public function findProductByID($id) {
        return $this->queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.category_id', 'c.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'c', 'c.id = p.category_id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }
}