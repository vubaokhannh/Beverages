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

    public function getAllOrder_ByStatus($id , $status)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM orders WHERE user_id = ? AND status = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
    
            if (!$stmt) {
                throw new \Exception("Lỗi chuẩn bị truy vấn: " . $conn->error);
            }
    
            $stmt->bind_param('ii', $id, $status);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
            $stmt->close();
            $conn->close();
    
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
        }
        return $result;
    }
    
}
