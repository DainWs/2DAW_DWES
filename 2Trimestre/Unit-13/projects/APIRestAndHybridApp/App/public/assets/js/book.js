const Book = {
    data() {
        return {
            book: {id: null, titulo: null, editorial: null, autor: null, genero: null, nPaginas: 0, year: null, precio: 0}
        }
    },
    mounted() {
        this.requestBook();
    },
    methods: {
        requestBook() {
            $.ajax( `${BASE_URL}/../Api/BooksController/book`, {
                type : 'GET',
                data : {id: BOOK_ID},
                success: this.onBookRequestSuccess,
                error: this.onBookRequestFailed
            });
        },
        onBookRequestSuccess(response) {
            console.log(response);
            this.book = JSON.parse(response);
        },
        onBookRequestFailed(response = 'Books not founds.') {
            console.log(`Error: ${JSON.parse(response)}`);
        }
    }
}
window.onload = () => {
    Vue.createApp(Book).mount('#book');
}