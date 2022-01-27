<!-- This model use VUE -->
<article v-for="product in productos" :key="product.id" v-bind:id="'product-'+product.id" class="product--item" @click="select(product)">
    <div class="product--item__content">
        <figure>
            <img v-bind:src="getImageURL(product)" v-bind:alt="product.nombre" width="50" height="50">
        </figure>
        <div class="product-item__description">
            <h3>{{product.nombre}}</h3>
            <span>{{product.descripcion}}</span>
        </div>
        <div class="product-item__prices">
            <span :class="precioStyle(product)">{{product.precio}}€</span>
            <span v-if="product.oferta > 0">{{calcOferta(product)}}€</span>
            <span v-if="product.oferta > 0">-{{product.oferta}}%</span>
        </div>
    </div>
    <div v-if="selected == product" class="product__actions">
        <a v-bind:href="'<?= $_SERVER['APP_BASE_URL'] ?>/CarritoController/add.php?productID=' + product.id">Buy</a>    
        
        <?php $userRol = $DATA[USER_SESSION]->rol ?? ROL_CLIENTE; ?>
        <?php if ($userRol == ROL_PROVEEDOR || $userRol == ROL_ADMIN) : ?>
            <a v-bind:href="'<?= $_SERVER['APP_BASE_URL'] ?>/moveTo/proveedores/newProduct.php?productID=' + product.id">Edit</a>
            <a @click="removeConfirmDialog('<?= $_SERVER['APP_BASE_URL'] ?>/ProductController/doDeleteProductPost.php?productID=' + product.id)">remove</a>
        <?php endif; ?>
    </div>
</article>