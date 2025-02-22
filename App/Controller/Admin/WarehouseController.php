<?php

namespace App\Controller\Admin;

use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;


use App\View\Admin\Page\Warehouse\Index;
use App\View\Admin\Page\Warehouse\Create;

use App\Validations\InventoryValidation;

use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;
use App\Models\Purchase_orders;
use App\Models\Purchase_order_items;
use App\Models\Inventory;
use App\Models\Material;




class WarehouseController
{
    public function index()
    {

        $model = new Inventory();
        $inventory = $model->getInventoryByMaterial();

        $data = [
            'inventory' => $inventory,

        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }

    public function create()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render();
        Footer::render();
    }

    public function store()
    {
        $is_valid = InventoryValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('createvalidation', 'Thêm sản phẩm thất bại');
            header('location: /admin/warehouse/create');
            exit;
        }

        $data = [
            'name' => $_POST['name'],
            'unit' => $_POST['unit'],
            'unit_price' => $_POST['unit_price'],
            'quantity' => $_POST['quantity'],
            'date' => $_POST['date'],
            'status' => $_POST['status'],
        ];

        $material = new Material();

        $existingMaterial = $material->checkNameAndUnit($data['name'], $data['unit']);

        if ($existingMaterial) {
            $material_id = $existingMaterial['id'];
        } else {
            $material_data = [
                'name' => $data['name'],
                'unit' => $data['unit'],
                'created_at'  => $data['date'],
            ];


            $result_material_data = $material->createMaterial($material_data);
            $material_id = $material->getMaxId();
            if (!$result_material_data) {
                NotificationHelper::error('create_material', 'Thêm nguyên liệu thất bại');
                header('location: /admin/warehouse/create');
                exit;
            }
        }


        $data_purchase_orders = [
            'date' => $_POST['date'],
            'status' => $_POST['status'],
        ];


        $purchase_orders = new Purchase_orders();
        $result =  $purchase_orders->createPurchase_orders($data_purchase_orders);
        $purchase_order_id =  $purchase_orders->getMaxId();

        if (!$result) {
            NotificationHelper::error('create_purchase_order', 'Thêm đơn nhập hàng thất bại');
            header('location: /admin/warehouse/create');
            exit;
        }


        $data_purchase_order_items = [
            'purchase_order_id' => $purchase_order_id,
            'material_id' => $material_id,
            'quantity' => $data['quantity'],
            'unit_price' => $data['unit_price'],
        ];


        $inventory = new Inventory();

        $existing_inventory = $inventory->getInventoryByMaterialId($material_id);

        if ($existing_inventory) {

            $new_quantity = $existing_inventory['quantity'] + $data['quantity'];
            $update_data = ['quantity' => $new_quantity];
            $inventory->updateInventory($material_id, $update_data);
        } else {

            $new_inventory_data = [
                'material_id' => $material_id,
                'quantity' =>  $data['quantity'],

            ];
            $inventory->createInventory($new_inventory_data);
        }
        $purchase_order_items = new Purchase_order_items();
        $result_purchase_order_items = $purchase_order_items->createPurchase_order_items($data_purchase_order_items);

        if ($result_purchase_order_items) {
            NotificationHelper::success('create', 'Thêm đơn nhập thành công');
            header('location: /admin/warehouse');
            exit;
        } else {
            NotificationHelper::error('create', 'Thêm đơn nhập thất bại');
            header('location: /admin/warehouse/create');
            exit;
        }
    }
}
