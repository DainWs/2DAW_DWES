const Products = {
    data() {
        return {
            productos: [],
            pageIndex: 0,
            oldPageIndex: 0,
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
            this.oldPageIndex = this.pageIndex++;
            this.requestProducts();
        },
        prevPage() {
            if (this.pageIndex > 0) {
                this.oldPageIndex = this.pageIndex--;
                this.requestProducts();
            }
        },
        requestProducts() {
            let requestData = {
                page: this.pageIndex,
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
            this.productos = JSON.parse(response);
        },
        onProductsRequestFailed(response = 'Products not founds.') {
            console.log(`Error: ${response}`);
            this.pageIndex = this.oldPageIndex;
        }
    }
}

window.onload = () => {
    Vue.createApp(Products).mount('#products');

}