<!-- This model use VUE -->
<article v-for="product in productos" :key="product.id" v-bind:id="'product-'+product.id">
    <figure>
        <img v-bind:src="this.getImageURL(product)" v-bind:alt="product.nombre" width="50" height="50">
        <figcaption>{{product.descripcion}}</figcaption>
    </figure>
</article>