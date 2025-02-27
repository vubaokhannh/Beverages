<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Recipes\Index;
use App\View\Admin\Page\Recipes\Create;
use App\View\Admin\Page\Recipes\Edit;

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

        $model = new Recipes();
        $recipes = $model->getAll();

      
        $model_ingredients = new Ingerdients();
        $ingredients = $model_ingredients->getAll();

    
        $ingredientsByRecipe = [];
        foreach ($ingredients as $ingredient) {
            $recipesId = $ingredient['recipes_id'];
            $ingredientsByRecipe[$recipesId][] = $ingredient;
        }

    
        $data = [
            'recipes' => $recipes,
            'ingredientsByRecipe' => $ingredientsByRecipe,
        ];
        

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
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
    
        $recipes = new Recipes();
        $existingRecipe = $recipes->findByProductId($_POST['product_id']);
    
        if ($existingRecipe) {
            NotificationHelper::error('duplicate_recipe', 'Sản phẩm này đã có công thức, không thể thêm mới!');
            header('location: /admin/recipes/create');
            exit;
        }
    
        $data_recipes = [
            'name' => $_POST['name'],
            'product_id' => $_POST['product_id'],
        ];
    
        $result_recipes = $recipes->createRecipes($data_recipes);
        $recipes_id = $recipes->getMaxId();
    
        if (!$result_recipes) {
            NotificationHelper::error('create_recipes', 'Thêm công thức thất bại');
            header('location: /admin/recipes/create');
            exit;
        }
    
        $ingredientsModel = new Ingerdients();
        $data_ingredients = [];
    
        foreach ($_POST['materials_id'] as $key => $material_id) {
            $data_ingredients[] = [
                'recipes_id' => $recipes_id,
                'materials_id' => $material_id,
                'quantity' => $_POST['quantity'][$key],
                'unit' => $_POST['unit'][$key],
            ];
        }
    
        $result = $ingredientsModel->create($data_ingredients);
    
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
