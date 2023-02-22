<?php
include_once('./../db/database.php');

class Categorias extends DATABASE{

    //Nombre de la tabla
    private $table = 'categoria';

    //Obtiene todos registros de la tabla
    public function getAll(){
        try
        {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    //Obtiene un registro por Id
    public function getById($id){
        try
        {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE id= ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    //Elimina un registro por Id
    public function delete($id){
        try
        {
            $stm = $this->getConnection()->prepare("DELETE FROM $this->table WHERE id=?");
            $stm->execute([$id]);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    // Inserta un nuevo registro en la tabla
    public function create(){
        try{
            $stm=$this->getConnection()->prepare("INSERT INTO $this->table (CATEGORIA,FECHA_CREACION,NOMBRE_PRODUCTO,PESO,PRECIO,REFERENCIA,STOCK) VALUES (?,?,?,?,?,?,?)");
            
            $stm->execute([
                $_POST['categoria'],
                $_POST['fecha'],
                $_POST['nombre_producto'],
                $_POST['peso'],
                $_POST['precio'],
                $_POST['referencia'],
                $_POST['stock'],
            ]);
        }catch(PDOException $e){
        echo $e->getMessage();
        }
      }

      // Actualiza un resgistro por Id
      public function update($id){
        try{
            $stm=$this->getConnection()->prepare("UPDATE $this->table SET CATEGORIA = ?,FECHA_CREACION = ?,NOMBRE_PRODUCTO = ? ,PESO = ?,PRECIO = ?,REFERENCIA = ?,STOCK = ?  WHERE ID = ?");

            $stm->execute([
                $_POST['categoria'],
                $_POST['fecha'],
                $_POST['nombre_producto'],
                $_POST['peso'],
                $_POST['precio'],
                $_POST['referencia'],
                $_POST['stock'],
                $id,
                
        ]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }

       
    public function getCategoria($id){
        try
        {
            $stm = $this->getConnection()->prepare("SELECT categoria FROM `categoria` WHERE ID_CATEGORIA = ?");

            $stm->execute([$id]);

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }




}