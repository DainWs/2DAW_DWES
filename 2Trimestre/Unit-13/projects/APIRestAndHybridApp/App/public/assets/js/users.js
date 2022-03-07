const Users = {
    data() {
        return {
            users: [],
            selectedId: -1,
            selectedUser: undefined
        }
    },
    mounted() {
        this.requestUsers();
    },
    methods: {
        selectUser() {
            this.selectedUser = Array.from(this.users).find((user) => user.id == this.selectedId);
        },
        requestUsers() {
            $.ajax( `${BASE_URL}/../Api/UsersController/users`, {
                type : 'GET',
                data : [],
                success: this.onUsersRequestSuccess,
                error: this.onUsersRequestFailed
            });
        },
        onUsersRequestSuccess(response) {
            let parsedJSON = JSON.parse(response);
            if (Array.from(parsedJSON).length > 0) {
                this.users = parsedJSON;
            }
        },
        onUsersRequestFailed(response = 'Users not founds.') {
            console.log(`Error: ${JSON.parse(response)}`);
        }
    },
    computed: {
    }
}
window.onload = () => {
    Vue.createApp(Users).mount('#users');
}