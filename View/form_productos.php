<!-- Formulario  -->


<input class="form-control mb-3" type="text" name="name" placeholder="Nombre Producto" required>

<input class="form-control mb-3" type="number" name="peso" placeholder="Peso Producto" required>

<input class="form-control mb-3" type="number" name="precio" placeholder="Precio" required>

<input class="form-control mb-3" type="text" name="referencia" placeholder="Referencia" required>

<input class="form-control mb-3" type="number" name="stock" placeholder="Stock" required>

<label for="">
    Categorias
</label>

<select name="categoria" class="form-select" aria-label="Default select example">

    <option selected value="">Seleccione</option>

    <?php

        include_once './../Model/categorias.php';
        $controllers2 = new Categorias();

        $datos = $controllers2->getAll();

        foreach ($datos as $key => $value) {
    ?>

        <option value="<?php echo $datos[$key]->ID_CATEGORIA ?>"><?php echo $datos[$key]->CATEGORIA ?></option>

    <?php
        };
    ?>



</select>

<label for="">
    Fecha Creacion

    <input class="form-control mt-3" type="date" name="fecha">

</label>