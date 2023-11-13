<?php
require_once 'app/models/products.model.php';
require_once 'app/views/api.view.php';
class Controller{
    private $productModel;
    private $viewApi;
    private $data;
    public function __construct() {
        $this->productModel = new productsModel();
        $this->viewApi = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    // localhost/tpe3-web2-api/api/products/?sortby=precio&order=ASC
    function getAll($params = NULL){
        if (isset($_GET['sortby']) && isset($_GET['order'])) {
            if (($_GET['sortby'] == 'id_producto' || $_GET['sortby'] == 'categoria' || $_GET['sortby'] == 'talla' || $_GET['sortby'] == 'precio' || $_GET['sortby'] == 'nombre')
                && ($_GET['order'] == 'ASC' || $_GET['order'] == 'DESC')
            ) {
                $products = $this->productModel->sortbyorder($_GET['sortby'], $_GET['order']);
                return $this->viewApi->response($products, 200);
            } else {
                return $this->viewApi->response("Los campos son inválidos", 400);
            }
        } elseif (isset($_GET['category'])) { // localhost/tpe3-web2-api/api/products/?category=4
            $categoryId = $_GET['category'];
            $productsByCategory = $this->productModel->getProductsByCategories($categoryId);
            if($productsByCategory){
                return $this->viewApi->response($productsByCategory, 200);
            }else{
                return $this->viewApi->response('no existe la categoria ingresada', 404);
            }
        } elseif (isset($_GET['page'])) { // localhost/tpe3-web2-api/api/products/?page=2
            $page = $_GET['page'];
            $products = $this->productModel->getProductsPaginated($page);
            if ($products) {
                return $this->viewApi->response($products, 200);
            } else {
                return $this->viewApi->response('no existe productos con ese rango de pagina', 404);
            }
        } else {
            $products = $this->productModel->getProducts();
            return $this->viewApi->response($products, 200);
        }
    }
    // localhost/tpe3-web2-api/api/products/65
    // {
    //     "categoria": 1,
    //     "descripcion": "asdas",
    //     "talla": "asd",
    //     "precio": 223,
    //     "nombre": "Black madera"
    // }
    public function updateProducts($params = []) {
        $id = $params[':ID'];
        $productId = $this->productModel->getProductById($id);
        if ($productId) {
            $body = $this->getData();
            $category = $body->categoria;
            $description = $body->descripcion;
            $talla = $body->talla;
            $price = $body->precio;
            $name = $body->nombre;

            $this->productModel->updateDataProduct($category,$description,$talla,$price,$name,$id);
            $this->viewApi->response('product id=' . $id . ' actualizada con éxito', 200);
        }else {
        $this->viewApi->response('product id= ' . $id . ' not found', 404);
        }
    }

    // localhost/tpe3-web2-api/api/products/68
    public function getProductById($params = NULL){
        $id = $params[':ID'];
        $product = $this->productModel->getProductById($id);
        if($product){
            $this->viewApi->response($product, 200);
        }else{
            $this->viewApi->response('el producto con id= ' . $id . ' no existe', 404);
        }
    }

    public function deleteProduct($params = NULL){
        $id = $params[':ID'];
        $product = $this->productModel->getProductById($id);
        if($product){
            $this->productModel->deleteProduct($id);
            $this->viewApi->response('el producto con id= ' . $id . ' se elimino correctamente', 200);
        }else{
            $this->viewApi->response('el producto con id= ' . $id . ' no existe, no se elimino ningun producto', 404);
        }
    }
    
}