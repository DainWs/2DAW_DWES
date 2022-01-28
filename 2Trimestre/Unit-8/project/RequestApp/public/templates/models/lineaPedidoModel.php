<!-- This model use VUE -->
<article v-for="data in list" :key="data.product.id" v-bind:id="'product-'+data.product.id" class="product--item">
    <div class="product--item__content">
        <figure>
            <img v-bind:src="getImageURL(data.product)" v-bind:alt="data.product.nombre" width="50" height="50">
        </figure>
        <div class="product--item__description">
            <h3>{{data.product.nombre}}</h3>
            <span>{{data.product.descripcion}}</span>
        </div>
        <div class="product--item__prices">
            <span :class="precioStyle(data.product)">{{(data.product.precio).toFixed(2)}}€</span>
            <span v-if="data.product.oferta > 0">{{calcOferta(data.product)}}€</span>
            <span v-if="data.product.oferta > 0">-{{data.product.oferta}}%</span>
            <span>{{data.cantidad}} Units</span>
        </div>
        <div>
            <a v-bind:href="'<?= $_SERVER['APP_BASE_URL'] ?>/CarritoController/remove.php?productID=' + data.product.id">Remove</a>    
        </div>
    </div>
</article>