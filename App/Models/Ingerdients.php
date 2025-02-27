<?php

namespace App\Models;

class Ingerdients extends BaseModel
{
    protected $table = 'ingerdients';
    protected $id = 'id';

    public function getAllingerdients()
    {
        return $this->getAll();
    }
    public function getOneingerdients($id)
    {
        return $this->getOne($id);
    }

    public function createingerdients($data)
    {
        return $this->create($data);
    }
    public function updateingerdients($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteingerdients($id)
    {
        return $this->delete($id);
    }
    public function getAllingerdientsByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getAllByStatus()
    {
        $sql = "SELECT * FROM $this->table WHERE status = 1";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOneingerdientsByName($name)
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
    public function countTotalingerdients()
    {
        return $this->countTotal();
    }
    public function getAllingerdientsProductByStatus(int $id)
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

    public function getMaxId()
    {
        $result = 0;
        $sql = "SELECT MAX(id) as max_id FROM ingerdients";
        $result = $this->_conn->MySQLi()->query($sql)->fetch_assoc()['max_id'];
        return $result;
    }


    public function create(array $data)
    {
        try {
            if (isset($data[0]) && is_array($data[0])) {

                $columns = implode(", ", array_keys($data[0]));
                $values = [];

                foreach ($data as $row) {
                    $rowValues = array_map(function ($value) {
                        return "'" . addslashes($value) . "'";
                    }, array_values($row));
                    $values[] = "(" . implode(", ", $rowValues) . ")";
                }

                $sql = "INSERT INTO $this->table ($columns) VALUES " . implode(", ", $values);
            } else {

                $columns = implode(", ", array_keys($data));
                $values = implode(", ", array_map(fn($value) => "'" . addslashes($value) . "'", array_values($data)));
                $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
            }



            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }

    public function getAll()
    {
        $result = [];
        try {
            $sql = "SELECT ingerdients.*, materials.name as materialName FROM ingerdients
            INNER JOIN materials ON ingerdients.materials_id  = materials.id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}
