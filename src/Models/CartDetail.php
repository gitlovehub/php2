<?php 

namespace MyNamespace\MyProject\Models;

use MyNamespace\MyProject\Common\Model;

class CartDetail extends Model
{
    protected string $tableName = 'tbl_cart_details';

    public function getCartByCustomer($userId) {
        $queryBuilder = clone($this->queryBuilder);
        return $queryBuilder
            ->select(
                'cd.id', 'cd.cart_id', 'cd.product_id', 'cd.quantity', 'cd.price', 'p.thumbnail as thumbnail'
            )
            ->from('tbl_cart_details', 'cd')
            ->innerJoin('cd', 'tbl_carts', 'c', 'c.id = cd.cart_id')
            ->innerJoin('cd', 'tbl_products', 'p', 'p.id = cd.product_id')
            ->where('c.user_id = :user_id')
            ->setParameter('user_id', $userId)
            ->orderBy('cd.id', 'DESC')
            ->fetchAllAssociative();
    }    

    public function findByCartIDAndProductID($cartID, $productID) {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)

            ->where('cart_id = ?')->setParameter(0, $cartID)
            ->andWhere('product_id = ?')->setParameter(1, $productID)

            ->fetchAssociative();
    }

    public function deleteByCartID($cartID) {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('cart_id = ?')
            ->setParameter(0, $cartID)
            ->executeQuery();
    }

    public function deleteByCartIDAndProductID($cartID, $productID) {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('cart_id = ?')->setParameter(0, $cartID)
            ->andWhere('product_id = ?')->setParameter(1, $productID)
            ->executeQuery();
    }
}