const Products = {
    data() {
        return {
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
            let neededsRows = Math.ceil((10 * 1) / productsPerRow);

            if (this.limit != (productsPerRow * neededsRows)) {
                this.limit = productsPerRow * neededsRows;
                this.requestProducts();
            }
        },
        select(product) {
            document.cookie = `selectedProduct=${product.id}`;
            window.location=`${BASE_URL}/moveTo/proveedores/product.php`;
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
            console.log(`Error: ${response}`);
        }
    }
}

window.onload = () => {
    Vue.createApp(Products).mount('#products');

}