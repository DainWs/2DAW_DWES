const Carrito = {
    data() {
        return {
            pedido: {provincia: "", localidad: "", direccion: "", lineas: []}
        }
    },
    mounted() {
        $.ajax( `${BASE_URL}/CarritoController/get.php`, {
            type : 'POST',
            success: this.loadPedido
        });
    },
    methods: {
        addUnit(linea) {
            linea.unidades++;
            this.changeUnitRequest(linea);
        },
        removeUnit(linea) {
            if (linea.unidades > 1 ) {
                linea.unidades--;
                this.changeUnitRequest(linea);
            }
        },
        removeLinea(linea) {
            $.ajax( `${BASE_URL}/CarritoController/remove`, {
                type : 'POST',
                data : {productID: linea.producto_id},
                success: this.loadPedido
            });
        },
        changeUnitRequest(linea) {
            $.ajax( `${BASE_URL}/CarritoController/set`, {
                type : 'POST',
                data : {productID: linea.producto_id, cantidad: linea.unidades},
                success: this.loadPedido
            });
        },
        loadPedido(response) {
            this.pedido = JSON.parse(response);
        },
        getImageURL(product) {
            return `${BASE_URL}/assets/images/products/${product.imagen}`;
        },
        calcOferta(linea) {
            product = linea.producto;
            return ((product.precio - (product.precio * (product.oferta/100))) * linea.unidades).toFixed(2);
        }
    },
    computed: {
        calcTotalPrice() {
            let totalPrice = 0;
            let lineas = Object.values(this.pedido.lineas);
            Array.from(lineas).forEach((v) => {
                totalPrice += parseFloat(this.calcOferta(v));
            });
            return (totalPrice).toFixed(2);
        }
    }
}
window.onload = () => {
    Vue.createApp(Carrito).mount('#pedido');
}