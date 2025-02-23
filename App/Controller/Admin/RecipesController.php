<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Category\Index;
use App\View\Admin\Page\Recipes\Create;
use App\View\Admin\Page\Category\Edit;

use App\Models\Product;
use App\Models\Material;
use App\Models\Recipes;
use App\Models\Ingerdients;



use App\Validations\RecipesValidation;

use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;


class RecipesController
{
    public function index()
    {
        echo "This is the Recipes controller";
    }

    public function create()
    {

        $model = new Product();
        $products = $model->getAll();

        $materials = new Material();
        $data_materials = $materials->getAll();

        $data = [
            'products' => $products,
            'materials' => $data_materials,
        ];


        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render($data);
        Footer::render();
    }

    public function store()
    {
        $is_valid = RecipesValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('createvalidation', 'Thêm công thức thất bại');
            header('location: /admin/recipes/create');
            exit;
        }

        $data = [
            'name' => $_POST['name'],
            'product_id' => $_POST['product_id'],
            'materials_id' => $_POST['materials_id'], // Mảng
            'quantity' => $_POST['quantity'], // Mảng
            'unit' => $_POST['unit'], // Mảng
        ];

        // Thêm công thức vào bảng `recipes`
        $data_recipes = [
            'name' => $data['name'],
            'product_id' => $data['product_id'],
        ];

        $recipes = new Recipes();
        $result_recipes = $recipes->createRecipes($data_recipes);
        $recipes_id = $recipes->getMaxId(); // Lấy ID công thức vừa thêm

        if (!$result_recipes) {
            NotificationHelper::error('create_recipes', 'Thêm công thức thất bại');
            header('location: /admin/recipes/create');
            exit;
        }

        // Thêm nhiều nguyên liệu vào bảng `ingredients`
        $ingredientsModel = new Ingerdients();
        $data_ingredients = [];

        foreach ($data['materials_id'] as $key => $material_id) {
            $data_ingredients[] = [
                'recipes_id'  =>  $recipes_id,
                'materials_id' => $material_id,
                'quantity'    => $data['quantity'][$key],
                'unit'        => $data['unit'][$key],
            ];
        }
       

        $result = $ingredientsModel->create($data_ingredients); // Truyền mảng nhiều dòng

        if (!$result) {
            NotificationHelper::error('create_ingredient', 'Lỗi khi thêm nguyên liệu!');
            header('location: /admin/recipes/create');
            exit;
        }

        NotificationHelper::success('create_success', 'Thêm công thức thành công!');
        header('location: /admin/recipes');
        exit;
    }
}
