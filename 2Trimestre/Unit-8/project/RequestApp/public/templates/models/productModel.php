<!-- This model use VUE -->
<div v-for="product in productos" :key="product.id" v-bind:id="'product-'+product.id" class="product-item">
    <figure>
        <img v-bind:src="getImageURL(product)" v-bind:alt="product.nombre" width="50" height="50">
        <figcaption>{{product.descripcion}}</figcaption>
    </figure>
</div>