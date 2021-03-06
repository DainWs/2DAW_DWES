<?php

namespace src\controllers;

use DateTime;
use Exception;
use Monolog\Logger;
use src\domain\ResourceManager;
use src\domain\validators\FormValidator;
use src\models\Productos;
use src\services\db\DBTableProductos;

/**
 * This is the controller for the products post requests
 */
class ProductController extends PostController {

    /**
     * Do all actions for a add product post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doAddProductPost(): bool {
        $name = $_POST['name'] ?? '';
        $category = $_POST['category'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';
        $stock = $_POST['stock'] ?? '';
        $oferta = $_POST['oferta'] ?? '';
    
        $errors = [];
        if (FormValidator::validateIsEmpty($name)) {
            $errors['name'] = 'You have to specify a name for this new product.';
        }

        if (FormValidator::validateIsEmpty($category)) {
            $errors['category'] = 'You have to specify a category for this new product.';
        }

        if (FormValidator::validateIsEmpty($description)) {
            $errors['description'] = 'You have to specify a description for this new product.';
        }

        if (FormValidator::validateIsEmpty($price)) {
            $errors['price'] = 'You have to specify a price for this new product.';
        } else if (!FormValidator::validateNumber($price)) {
            $errors['price'] = 'The price must be a number.';
        }

        if (FormValidator::validateIsEmpty($stock)) {
            $errors['stock'] = 'You have to specify a stock for this new product.';
        } else if (!FormValidator::validateNumber($stock)) {
            $errors['stock'] = 'The stock must be a number.';
        }

        if (!FormValidator::validateNumber($oferta)) {
            $errors['oferta'] = 'The oferta must be a number.';
        }

        $image = "$name.png";
        if (count($errors) == 0 && isset($_FILES['image']) && FormValidator::validateIsNotEmpty($_FILES['image']['name'])) {
            try {
                $extension = str_replace('image/', '', $_FILES['image']['type']);
                $image = "$name.$extension";
                $_FILES['image']['name'] =  $image;
                $resourceManager = new ResourceManager();
                $resourceManager->upload($_FILES['image'], 'public/assets/images/products');
            } catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $errors['other'] = 'An unknown error was success, please try it again more later.';
            }
        }

        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $producto = new Productos();
                $producto->id = 0;
                $producto->categoria_id = $category;
                $producto->nombre = $name;
                $producto->descripcion = $description;
                $producto->precio = $price;
                $producto->stock = $stock;
                $producto->oferta = $oferta;
                $producto->fecha = new DateTime(date('Y-m-d'));
                $producto->imagen = $image;
                $producto->enventa = true;

                $table = new DBTableProductos();
                $result = $table->insert($producto);
            } 
            catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $result = false;
            } 
            finally {
                if ($result) {
                    header("Location: ".$_SERVER["APP_BASE_URL"]."/moveTo/home.php");
                    exit();
                } else {
                    $errors['other'] = 'An unknown error was success, please try it again more later.';
                }
            }
        }

        $this->errors[CONTROLLER_PRODUCT] = $errors;
        return (count($errors) <= 0);
    }

    /**
     * Do all actions for a edit product post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doEditProductPost(): bool {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $category = $_POST['category'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';
        $stock = $_POST['stock'] ?? '';
        $oferta = $_POST['oferta'] ?? '';
    
        $errors = [];
        if (!FormValidator::validateNumber($price)) {
            $errors['price'] = 'You have to specify a price for this new product.';
        }

        if (!FormValidator::validateNumber($stock)) {
            $errors['stock'] = 'You have to specify a stock for this new product.';
        }

        if (!FormValidator::validateNumber($oferta)) {
            $errors['oferta'] = 'You have to specify a oferta for this new product.';
        }

        $image = "$name.png";
        if (count($errors) == 0 && isset($_FILES['image']) && FormValidator::validateIsNotEmpty($_FILES['image']['name'])) {
            try {
                $extension = str_replace('image/', '', $_FILES['image']['type']);
                $image = "$name.$extension";
                $_FILES['image']['name'] =  $image;
                $resourceManager = new ResourceManager();
                $resourceManager->upload($_FILES['image'], 'public/assets/images/products');
            } catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $errors['other'] = 'An unknown error was success, please try it again more later.';
            }
        }
    
        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $producto = new Productos();
                $producto->id = $id;
                $producto->categoria_id = $category;
                $producto->nombre = $name;
                $producto->descripcion = $description;
                $producto->precio = $price;
                $producto->stock = $stock;
                $producto->oferta = $oferta;
                $producto->imagen = $image;

                $table = new DBTableProductos();
                $result = $table->update($producto);
            } 
            catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $result = false;
            } 
            finally {
                if ($result) {
                    header("Location: ".$_SERVER["APP_BASE_URL"]."/moveTo/home.php");
                    exit();
                } else {
                    $errors['other'] = 'An unknown error was success, please try it again more later.';
                }
            }
        }
        $this->errors[CONTROLLER_PRODUCT] = $errors;
        return (count($errors) <= 0);
    }

    /**
     * Do all actions for a delete product post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doDeleteProductPost(): bool {
        $id = $_GET['productID'] ?? '';

        $errors = [];
        if (FormValidator::validateIsEmpty($id)) {
            $errors['others']= 'An unknown error was success, please try it again more later.';
        }
    
        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $table = new DBTableProductos();
                $result = $table->delete($id);
            } 
            catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $result = false;
            } 
            finally {
                if (!$result) {
                    $errors['others']= 'An unknown error was success, please try it again more later.';
                }
            }
        }
        $this->errors[CONTROLLER_PRODUCT_DELETE] = $errors;
        return (count($errors) <= 0);
    }
}