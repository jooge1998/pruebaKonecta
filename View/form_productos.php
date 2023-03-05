<!-- Formulario  -->

<input type="hidden" name="id" id="id">

<input class="form-control mb-3" type="text" name="name" id="name"  placeholder="Nombre Producto" required>

<input class="form-control mb-3" type="number" name="peso" id="peso" placeholder="Peso Producto" required>

<input class="form-control mb-3" type="number" name="precio" id="precio" placeholder="Precio" required>

<input class="form-control mb-3" type="text" name="referencia" id="referencia" placeholder="Referencia" required>

<input class="form-control mb-3" type="number" name="stock" id="stock" placeholder="Stock" required>

<label for="">
    Categorias
</label>

<select name="categoria" id="categoria" class="form-select" aria-label="Default select example">

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

    <input class="form-control mt-3" type="date" name="fecha" id="fecha">

</label>