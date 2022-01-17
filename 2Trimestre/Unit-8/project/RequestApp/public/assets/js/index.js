const Products = {
    data() {
        return {
            productos: [],
            pageIndex: 0,
            commingPageIndex: 0,
            limit: 2,
            order: undefined,
            orderType: undefined
        }
    },
    mounted() {
        this.requestProducts();
    },
    methods: {
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