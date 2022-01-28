<!-- This model use VUE -->
<article v-for="product in list" :key="product.id" v-bind:id="'product-'+product.id" class="product--item" @click="select(product)">
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
        <div>
            <a v-bind:href="'<?= $_SERVER['APP_BASE_URL'] ?>/CarritoController/remove.php?productID=' + product.id">Remove</a>    
        </div>
    </div>
</article>