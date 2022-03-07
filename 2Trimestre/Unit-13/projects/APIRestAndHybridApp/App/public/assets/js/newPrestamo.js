const NewPrestamos = {
    data() {
        return {
            users: [],
            books: [],
            selectedUserId: -1,
            selectedBookId: -1,
            selectedUser: undefined,
            selectedBook: undefined,
            returnDate: null,
            maxDelayDate: null
        }
    },
    mounted() {
        this.requestUsers();
        this.requestBooks();
    },
    methods: {
        selectUser() {
            this.selectedUser = Array.from(this.users).find((user) => user.id == this.selectedUserId);
        },
        selectBook() {
            this.selectedBook = Array.from(this.books).find((book) => book.id == this.selectedBookId);
        },
        requestUsers() {
            $.ajax( `${BASE_URL}/../Api/UsersController/users`, {
                type : 'GET',
                data : [],
                success: this.onUsersRequestSuccess,
                error: this.onRequestFailed
            });
        },
        onUsersRequestSuccess(response) {
            let parsedJSON = JSON.parse(response);
            if (Array.from(parsedJSON).length > 0) {
                this.users = parsedJSON;
            }
        },
        requestBooks() {
            $.ajax( `${BASE_URL}/../Api/BooksController/books`, {
                type : 'GET',
                data : [],
                success: this.onBooksRequestSuccess,
                error: this.onRequestFailed
            });
        },
        onBooksRequestSuccess(response) {
            let parsedJSON = JSON.parse(response);
            if (Array.from(parsedJSON).length > 0) {
                this.books = parsedJSON;
            }
        },
        onRequestFailed(response = 'Books not founds.') {
            console.log(`Error: ${JSON.parse(response)}`);
        },
        save() {
            let requestData = `libro_id=${this.selectedBookId}&usuario_id=${this.selectedUserId}&maxDelayDate=${this.maxDelayDate}&returnDate=${this.returnDate}`;
            $.ajax( `${BASE_URL}/../Api/PrestamosController/prestamos`, {
                type : 'PUT',
                data : requestData,
                success: function() { window.location = `${BASE_URL}/moveTo/home.php`; }
            });
        }
    },
    computed: {
    }
}
window.onload = () => {
    Vue.createApp(NewPrestamos).mount('#new-prestamo');
}