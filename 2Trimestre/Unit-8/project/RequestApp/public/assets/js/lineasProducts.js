const LineasProducts = {
    data() {
        return {
            selected: null,
            list: [],
            pageIndex: 0,
            commingPageIndex: 0,
            limit: 10,
            order: undefined,
            orderType: undefined
        }
    },
    mounted() {
        this.list = LINEA_PRODUCT;
        console.log(this.list);
    },
    methods: {
        getImageURL(product) {
            return `${BASE_URL}/assets/images/products/${product.imagen}`;
        },
        precioStyle(product) {
            return (product.oferta > 0) ? 'tachado' : '';
        },
        calcOferta(product) {
            return (product.precio - (product.precio * (product.oferta/100))).toFixed(2);
        }
    },
    computed: {
        
    }
}
window.onload = () => {
    Vue.createApp(LineasProducts).mount('#products');
}