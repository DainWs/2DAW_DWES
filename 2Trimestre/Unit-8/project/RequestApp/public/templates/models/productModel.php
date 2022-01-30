<!-- This model use VUE -->
<article v-for="product in productos" :key="product.id" v-bind:id="'product-'+product.id" class="product--item" @mouseover="select(product)">
    <div class="product--item__content">
        <figure>
            <img v-bind:src="getImageURL(product)" v-bind:alt="product.nombre" width="50" height="50">
        </figure>
        <div class="product--item__description">
            <h3>{{product.nombre}}</h3>
            <span>{{product.descripcion}}</span>
        </div>
        <div class="product--item__prices">
            <span :class="precioStyle(product)">{{product.precio}}€</span>
            <span v-if="product.oferta > 0">{{calcOferta(product)}}€</span>
            <span v-if="product.oferta > 0">-{{product.oferta}}%</span>
        </div>
    </div>
    <ul class="product__actions">
        <li><a :href="'<?= $_SERVER['APP_BASE_URL'] ?>/CarritoController/add.php?productID=' + product.id">Add to shopping car</a></li>
        
        <?php $userRol = $DATA[USER_SESSION]->rol ?? ROL_CLIENTE; ?>
        <?php if ($userRol == ROL_PROVEEDOR || $userRol == ROL_ADMIN) : ?>
            <li class="title"><span>Product management</span></li>
            <li><a v-bind:href="'<?= $_SERVER['APP_BASE_URL'] ?>/moveTo/proveedores/Productos.php?productID=' + product.id">Edit Product</a></li>
            <li><a @click="removeConfirmDialog('<?= $_SERVER['APP_BASE_URL'] ?>/ProductController/doDeleteProductPost?productID=' + product.id)">Remove Product</a></li>
        <?php endif; ?>
    </ul>
</article>