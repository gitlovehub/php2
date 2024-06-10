<?php 

namespace MyNamespace\MyProject\Models;

use MyNamespace\MyProject\Common\Model;

class Product extends Model
{
    protected string $tableName = 'tbl_products';

    public function countAvailableProducts() {
        return $this->queryBuilder
            ->select("COUNT(*)")
            ->from($this->tableName)
            ->where('instock > 0')
            ->fetchOne();
    }

    public function getCategoryName() {
        // Tạo một bản sao của queryBuilder bằng cách sử dụng clone
        $queryBuilder = clone($this->queryBuilder);
        return $queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.instock', 'p.category_id', 'cate.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'cate', 'cate.id = p.category_id')
            ->orderBy('p.id', 'DESC')
            ->fetchAllAssociative();
    }

    public function paginateProducts($page = 1, $perPage = 3) {
        // Tạo một bản sao của queryBuilder bằng cách sử dụng clone
        $queryBuilder = clone($this->queryBuilder);
        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);
        $data = $queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.instock', 'p.category_id', 'cate.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'cate', 'cate.id = p.category_id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('p.id', 'DESC')
            ->fetchAllAssociative();
    
        return [$data, $totalPage];
    }

    public function findByProductID($id) {
        // Tạo một bản sao của queryBuilder bằng cách sử dụng clone
        $queryBuilder = clone($this->queryBuilder);
        return $queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.instock', 'p.category_id', 'cate.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'cate', 'cate.id = p.category_id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function getRelatedProducts($categoryId) {
        return $this->queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.instock', 'p.category_id', 'cate.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'cate', 'cate.id = p.category_id')
            ->where('p.category_id = ?')
            ->setParameter(0, $categoryId)
            ->fetchAllAssociative();
    }
    
    public function searchProductsByName($keyword) {
        return $this->queryBuilder
            ->select(
                'p.id', 'p.thumbnail', 'p.name', 'p.description', 'p.price', 'p.instock', 'p.category_id', 'cate.name as category_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'tbl_categories', 'cate', 'cate.id = p.category_id')
            ->where('p.name LIKE :keyword')
            ->setParameter('keyword', "%$keyword%")
            ->fetchAllAssociative();
    }
    
}