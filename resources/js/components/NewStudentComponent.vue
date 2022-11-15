<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="mb-5">Register below to request access to the portal</h3>
                <div class="form-group mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First name" v-model="form.firstName">
                </div>
                <div class="form-group mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last name" v-model="form.lastName">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="contact" placeholder="Contact no" v-model="form.phone">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" v-model="form.email">
                </div>
                <div class="col text-center">
                    <button @click="submit" class="btn btn-success p-2" style="width: 150px;">Register</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                firstName: null,
                lastName: null,
                phone: null,
                email: null,
                registration_date: new Date().toLocaleDateString('en-us', {day:"numeric", month:"short", year:"numeric"}),
                status: 1
            }
        }
    },
    methods: {
        submit() {
            axios.post('/api/addstudent', this.form)
            .then(function (response) {
               alert('Success');
            })
            .catch(function (error) {
                console.log(error.response.data);
            });
        }
    }
}
</script>