<?php

namespace App\Models;

class OrderDetail extends BaseModel
{
    protected $table = 'order_details';
    protected $id = 'id';

    public function getAllorderDetail()
    {
        return $this->getAll();
    }

    public function getOneorderDetail($id)
    {
        return $this->getOne($id);
    }

    public function createorderDetail($data)
    {
        return $this->create($data);
    }
    public function updateorderDetail($id, $data)
    {
        return $this->update($id, $data);
    }
    public function countTotalorderDetail()
    {
        return $this->countTotal();
    }
    public function deleteorderDetail($id)
    {
        return $this->delete($id);
    }


    public function create(array $data)
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

            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }

    public function getAllOrderDetailByOrderId($id)
    {
        // $this->_conn = new Database();


        $sql = "SELECT order_details.*, products.name AS pro_name , products.img AS pro_img 
            FROM order_details INNER JOIN products ON order_details.product_id = products.id 
            WHERE order_details.order_id =? ";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
