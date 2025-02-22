<?php

namespace App\Models;

class Purchase_orders extends BaseModel
{
    protected $table = 'purchase_orders';
    protected $id = 'id';

    public function getAllPurchase_orders()
    {
        return $this->getAll();
    }

    public function getOnePurchase_orders($id)
    {
        return $this->getOne($id);
    }

    public function createPurchase_orders($data)
    {

        return $this->create($data);
    }
    public function updatePurchase_orders($id, $data)
    {
        return $this->update($id, $data);
    }
    public function countTotalPurchase_orders()
    {
        return $this->countTotal();
    }
    public function deletePurchase_orders($id)
    {
        return $this->delete($id);
    }

    public function getAllPurchase_orders_ByStatus($id, $status)
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

    public function getMaxId()
    {
        $result = 0;
        $sql = "SELECT MAX(id) as max_id FROM purchase_orders";
        $result = $this->_conn->MySQLi()->query($sql)->fetch_assoc()['max_id'];
        return $result;
    }
}
