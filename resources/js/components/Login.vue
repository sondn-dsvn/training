<template>
    <div>
        <div class="alert alert-danger" v-if="error">
            <p>There was an error, unable to sign in with those credentials.</p>
        </div>
        <form autocomplete="off" @submit.prevent="login" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
            </div>
           <button @click="login">Login</button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    import auth from '../auth.js';

    export default {
        data() {
            return {
                email: '',
                password: '',
            };
        },

        methods: {
            login() {
                let data = {
                    email: this.email,
                    password: this.password
                };
                axios.post('/login', data)
                    .then(({data}) => {
                        // TODO: store data
                        // auth.login(data.token, data.user);
                        this.$router.push('/dashboard');
                    })
                    .catch(({response}) => {
                        alert(response.data.message);
                        console.log(response.data.message);
                    });
            }
        }
    }
</script>