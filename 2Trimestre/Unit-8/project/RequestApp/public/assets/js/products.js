const Products = {
    data() {
        return {
            selected: null,
            productos: [],
            pageIndex: 0,
            commingPageIndex: 0,
            limit: 10,
            order: undefined,
            orderType: undefined
        }
    },
    mounted() {
        this.updateLimit();
        window.addEventListener('resize', this.updateLimit);

        this.requestProducts();
    },
    methods: {
        updateLimit() {
            let productsListWidth = $('#products-list').innerWidth();
            let productItemWidth = window.innerWidth * 0.12;
            let productsPerRow = Math.trunc(productsListWidth/productItemWidth);
            let neededsRows = Math.ceil((20 * 1) / productsPerRow);

            if (this.limit != (productsPerRow * neededsRows)) {
                this.limit = productsPerRow * neededsRows;
                this.requestProducts();
            }
        },
        select(product) {
            this.selected = (this.selected == product) ? null : product;
        },
        getImageURL(product) {
            return `${BASE_URL}/assets/images/products/${product.imagen}`;
        },
        nextPage() {
            this.commingPageIndex = this.pageIndex + 1;
            this.requestProducts();
        },
        prevPage() {
            if (this.pageIndex > 0) {
                this.commingPageIndex = this.pageIndex - 1;
                this.requestProducts();
            }
        },
        requestProducts() {
            let requestData = {
                page: this.commingPageIndex,
                limit: this.limit
            };

            if (this.order != undefined) {
                requestData['order'] = this.order;
            }

            if (this.orderType != undefined) {
                requestData['orderType'] = this.orderType;
            }

            $.ajax( `${BASE_URL}/AjaxController/getProducts`, {
                type : 'POST',
                data : requestData,
                success: this.onProductsRequestSuccess,
                error: this.onProductsRequestFailed
            });
        },
        onProductsRequestSuccess(response) {
            let parsedJSON = JSON.parse(response);
            if (Array.from(parsedJSON).length > 0) {
                this.productos = parsedJSON;
                this.pageIndex = this.commingPageIndex;
            }
        },
        onProductsRequestFailed(response = 'Products not founds.') {
            console.log(`Error: ${JSON.parse(response)}`);
        },
        precioStyle(product) {
            return (product.oferta > 0) ? 'tachado' : '';
        },
        calcOferta(product) {
            return (product.precio - (product.precio * (product.oferta/100))).toFixed(2);
        },
        removeConfirmDialog(url) {
            if (confirm("¿Quieres eliminar este producto?") == true) {
                window.location = url;
            }
        }
    },
    computed: {
        
    }
}
window.onload = () => {
    Vue.createApp(Products).mount('#products');
}