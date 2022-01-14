const Products = {
    data() {
        return {
            productos: [],
            pageindex: 0
        }
    },
    methods: {
        nextPage() {
            // TODO change this url
            $.ajax( URL, {
                type : 'GET',
                success: function (response) {
                    console.log(response);
                    this.pageindex = response.index;
                    this.productos = Array.from(response.productos);
                },
                error: function() {
                    console.log('error');
                }
            });
        },
        prevPage() {
            // TODO change this url
            $.ajax( URL, {
                type : 'GET',
                success: function (response) {
                    console.log(response);
                    this.pageindex = response.index;
                    this.productos = Array.from(response.productos);
                },
                error: function() {
                    console.log('error');
                }
            });
        }
    }
}
window.onload = () => {
    Vue.createApp(Products).mount('#products');
}