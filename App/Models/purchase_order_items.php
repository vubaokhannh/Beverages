<?php

namespace App\Models;

class Purchase_order_items extends BaseModel
{
    protected $table = 'purchase_order_items';
    protected $id = 'id';

    public function getAllpurchase_order_items()
    {
        return $this->getAll();
    }
    public function getOnepurchase_order_items($id)
    {
        return $this->getOne($id);
    }

    public function createpurchase_order_items($data)
    {
        return $this->create($data);
    }
    public function updatepurchase_order_items($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletepurchase_order_items($id)
    {
        return $this->delete($id);
    }
    public function getAllpurchase_order_itemsByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getAllByStatus()
    {
        $sql = "SELECT * FROM $this->table WHERE status = 1";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOnepurchase_order_itemsByName($name)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE name=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $name);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy loại sản phẩm bằng tên: ' . $th->getMessage());
            return $result;
        }
    }
    public function countTotalpurchase_order_items()
    {
        return $this->countTotal();
    }
    public function getAllInventoryProductByStatus(int $id)
    {

        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name 
                 FROM products 
                 INNER JOIN categories ON products.category_id = categories.id WHERE categories.status != 0 AND products.category_id = $id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function search($keyword)
    {
        $sql = "SELECT categories.* FROM categories WHERE categories.name REGEXP '$keyword' ";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getInventoryByMaterial()
    {
        $sql = "SELECT inventory.*, materials.*
                FROM inventory
                INNER JOIN materials ON inventory.material_id = materials.id";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
