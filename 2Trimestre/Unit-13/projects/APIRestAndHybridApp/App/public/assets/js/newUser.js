const NewUsers = {
    data() {
        return {
            dni: '',
            firstName: '',
            lastName: '',
            domicile: '',
            population: '',
            province: '',
            birthday: null
        }
    },
    methods: {
        save() {
            let data = `dni=${this.dni}&first_name=${this.firstName}&last_name=${this.lastName}&domicile=${this.domicile}&population=${this.population}&province=${this.province}&birthday=${this.birthday}`;
            console.log(data);
            $.ajax( `${BASE_URL}/../Api/UsersController/users`, {
                type : 'PUT',
                data : data,
                success: function() { window.location = `${BASE_URL}/moveTo/home.php`; }
            });
        }
    }
}
window.onload = () => {
    Vue.createApp(NewUsers).mount('#new-user');
}