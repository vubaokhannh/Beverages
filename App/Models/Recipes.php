<?php

namespace App\Models;

class Recipes extends BaseModel
{
    protected $table = 'recipes';
    protected $id = 'id';

    public function getAllRecipes()
    {
        return $this->getAll();
    }
    public function getOneRecipes($id)
    {
        return $this->getOne($id);
    }

    public function createRecipes($data)
    {
        return $this->create($data);
    }
    public function updateRecipes($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRecipes($id)
    {
        return $this->delete($id);
    }
    public function getAllRecipesByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getAllByStatus()
    {
        $sql = "SELECT * FROM $this->table WHERE status = 1";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOneRecipesByName($name)
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
    public function countTotalRecipes()
    {
        return $this->countTotal();
    }
    public function getAllRecipesProductByStatus(int $id)
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
        $sql = "SELECT MAX(id) as max_id FROM recipes";
        $result = $this->_conn->MySQLi()->query($sql)->fetch_assoc()['max_id'];
        return $result;
    }
}
