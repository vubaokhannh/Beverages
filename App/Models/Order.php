<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $id = 'id';

    public function getAllorder()
    {
        return $this->getAll();
    }
  
    public function getOneorder($id)
    {
        return $this->getOne($id);
    }

    public function createorder($data)
    {
       
        return $this->create($data);
    }
    public function updateorder($id, $data)
    {
        return $this->update($id, $data);
    }
    public function countTotalorder()
    {
        return $this->countTotal();
    }
    public function deleteorder($id)
    {
        return $this->delete($id);
    }

    public function getAllOrder_ByStatus($user_id, $transport)
    {
        $result = [];
        try {
            $sql = "SELECT orders.id, orders.total, orders.orderStatus, orders.date, orders.paymentMethod, orders.user_id , orders.transport
                    FROM orders 
                    WHERE orders.user_id = ? AND orders.transport = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $user_id, $transport);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }

    }


    public function createOder(array $data)
    {
        // $sql ="INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')";

        // $result = $this->_conn->connect()->query($sql);
        // return $result;

        try {
            $sql = "INSERT INTO $this->table (";
            foreach ($data as $key => $value) {
                $sql .= "$key, ";
            }
            // INSERT INTO $this->table (name, description, status, 
            $sql = rtrim($sql, ", ");
            // INSERT INTO $this->table (name, description, status
            $sql .= " ) VALUES (";
            // INSERT INTO $this->table (name, description, status) VALUES (
            foreach ($data as $key => $value) {
                $sql .= "'$value', ";
            }

            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1', 
            $sql = rtrim($sql, ", ");
            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1'

            $sql .= ")";
            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $conn->insert_id;
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }
}