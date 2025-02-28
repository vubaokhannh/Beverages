<?php

namespace App\Models;

class Inventory extends BaseModel
{
    protected $table = 'inventory';
    protected $id = 'id';

    public function getAllInventory()
    {
        return $this->getAll();
    }
    public function getOneInventory($id)
    {
        return $this->getOne($id);
    }

    public function createInventory($data)
    {
        return $this->create($data);
    }
    public function updateInventory($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteInventory($id)
    {
        return $this->delete($id);
    }
    public function getAllInventoryByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getAllByStatus()
    {
        $sql = "SELECT * FROM $this->table WHERE status = 1";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOneInventoryByName($name)
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
    public function countTotalInventory()
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

    public function getInventoryByMaterialId($id)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM inventory WHERE material_id =?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
            return $result;
        }
    }

    public function update(int $material_id, array $data)
    {
        try {
            if (!isset($data['quantity'])) {
                throw new \Exception("Thiếu key 'quantity' trong mảng dữ liệu");
            }

            $sql = "UPDATE inventory SET quantity = ? WHERE material_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
           

            if (!$stmt) {
                throw new \Exception("Lỗi prepare statement: " . $conn->error);
            }

            $stmt->bind_param("ii", $data['quantity'], $material_id);

            if (!$stmt->execute()) {
                throw new \Exception("Lỗi khi cập nhật dữ liệu: " . $stmt->error);
            }
        

            return true;
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ' . $th->getMessage());
            return false;
        }
    }

    public function findByMaterialId(int $materials_id)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM inventory WHERE material_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
    
            $stmt->bind_param('i', $materials_id);
            $stmt->execute();
    
            $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
            return $data ?: []; // Trả về mảng rỗng nếu không có dữ liệu
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function updateMaterialQuantity(int $id, array $data)
    {
        try {
            $sql = "UPDATE inventory SET ";
            foreach ($data as $key => $value) {
                $sql .= "$key = '$value', ";
            }
            $sql = rtrim($sql, ", ");

            $sql .= " WHERE $this->id=$id";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ', $th->getMessage());
            return false;
        }
    }
}
