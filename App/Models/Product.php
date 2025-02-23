<?php

namespace App\Models;


class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }
    public function countTotalProduct()
    {
        return $this->countTotal();
    }
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }

    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
    }

    public function search($keyword)
    {
        $sql = "SELECT products.* , categories.name AS category_name 
                FROM products
                INNER JOIN categories ON products.category_id = categories.id
                WHERE products.name REGEXP '$keyword' 
                AND products.status = " . self::STATUS_ENABLE . "
                AND categories.status = " . self::STATUS_ENABLE;
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllProductByCategoryAndStatus($id)
    {
        // $this->_conn = new Database();


        $sql = "SELECT products.*, categories.name AS category_name 
            FROM products INNER JOIN categories ON products.category_id = categories.id 
            WHERE products.category_id=? AND products.status=" . self::STATUS_ENABLE .
            " AND categories.status=" . self::STATUS_ENABLE;
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
