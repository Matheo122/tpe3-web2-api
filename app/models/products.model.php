<?php
require_once 'app/models/model.php';
class productsModel extends Model{
    
    public function getProducts(){
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    public function getProductsByCategories($id){
        $query = $this->db->prepare('SELECT * FROM productos WHERE categoria = ?');
        $query->execute([$id]);
        
        $productsByCategory = $query->fetchAll(PDO::FETCH_OBJ);
        return $productsByCategory;
    }
    
    public function getProductsPaginated($page) {
        $query = $this->db->prepare('SELECT * FROM productos LIMIT 5 OFFSET ' . (($page-1)*5));
        $query->execute();
        
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function updateProduct($category,$description,$talla,$price,$name,$productId) {
        $query = $this->db->prepare('UPDATE productos SET categoria = ?, descripcion = ?, talla = ?, precio = ?, nombre = ? WHERE id_producto = ?');
        $query->execute([$category, $description, $talla, $price, $name, $productId]);
    }
    
    function getProductById($id){
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $query->execute([$id]);
    
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }
    
    function deleteProduct($productId) {
        $query = $this->db->prepare('DELETE FROM productos WHERE id_producto = ?');
        $query->execute([$productId]);
    }

    public function sortbyorder($sortby = null , $order = null){
        $query = $this->db->prepare("SELECT * FROM productos ORDER BY $sortby $order");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function updateDataProduct($category,$description,$talla,$price,$name,$productId) {
        $query = $this->db->prepare('UPDATE productos SET categoria = ?, descripcion = ?, talla = ?, precio = ?, nombre = ? WHERE id_producto = ?');
        $query->execute([$category, $description, $talla, $price, $name, $productId]);
    }
}

