const Books = {
    data() {
        return {
            books: [],
            searched: ''
        }
    },
    mounted() {
        this.requestBooks();
    },
    methods: {
        requestBooks() {
            $.ajax( `${BASE_URL}/../Api/BooksController/books`, {
                type : 'GET',
                data : [],
                success: this.onBooksRequestSuccess,
                error: this.onBooksRequestFailed
            });
        },
        onBooksRequestSuccess(response) {
            let parsedJSON = JSON.parse(response);
            if (Array.from(parsedJSON).length > 0) {
                this.books = parsedJSON;
            }
        },
        onBooksRequestFailed(response = 'Books not founds.') {
            console.log(`Error: ${JSON.parse(response)}`);
        }
    },
    computed: {
        getBooks() {
            return Array.from(this.books).filter( (book) => book.titulo.includes(this.searched) );
        },
        latestBooks() {
            return this.books.slice(0, 6);
        }
    }
}
window.onload = () => {
    Vue.createApp(Books).mount('#books');
}