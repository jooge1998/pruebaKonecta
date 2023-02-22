<?php
include_once('./../db/database.php');

class Comprar extends DATABASE{

    //Nombre de la tabla
    private $table = 'ventas';


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

    //Obtiene un registro por Id
    public function VerificarProducto($id){
        try
        {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE ID_PRODUCTO= ?");
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
            $stm=$this->getConnection()->prepare("INSERT INTO $this->table (ID_PRODUCTO, CANTIDAD) VALUES (?,?)");
            
            $stm->execute([
                $_POST['id'],
                $_POST['cantidad'],
            ]);
        }catch(PDOException $e){
        echo $e->getMessage();
        }
      }

      // Actualiza un resgistro por Id
      public function update($id){
        try{
            $stm=$this->getConnection()->prepare("UPDATE $this->table SET PLAN= ? ,DESCRIPCION= ?,PRECIO= ? WHERE ID = ?");

            $stm->execute([
                $_POST['plan'],
                $_POST['descripcion'],
                $_POST['precio'],
                $id,
                
        ]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }

      public function updateCantidad($cantidad,$id){
        try{
            $stm=$this->getConnection()->prepare("UPDATE $this->table SET CANTIDAD = (CANTIDAD + ?)  WHERE ID_PRODUCTO = ?");

            $stm->execute([
                $cantidad,
                $id
        ]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }




}