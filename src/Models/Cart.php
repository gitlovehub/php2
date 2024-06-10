<?php 

namespace MyNamespace\MyProject\Models;

use MyNamespace\MyProject\Common\Model;

class Cart extends Model
{
    protected string $tableName = 'tbl_carts';

    public function findByUserID($userID) {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('user_id = ?')
            ->setParameter(0, $userID)
            ->fetchAssociative();
    }
}