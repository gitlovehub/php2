<?php

namespace MyNamespace\MyProject\Models;

use MyNamespace\MyProject\Common\Model;

class User extends Model 
{
    protected string $tableName = 'tbl_users';
    
    public function findByEmail($email) {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }
}