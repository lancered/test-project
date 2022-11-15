<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <h3 class="mb-5">List of Students</h3>
                <table class="table table-hover">
                    <thead>
                        <th>Students</th>
                        <th>Registration date</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <tr v-for="item in dataList" :key="item.id">
                            <td>{{item.firstName + ' ' + item.lastName}}</td>
                            <td>{{item.registration_date}}</td>
                            <td v-if="item.status == 0" class="bg-secondary text-white text-center">Cancelled</td>
                            <td v-else-if="item.status == 1" class="bg-success text-white text-center">Approved</td>
                            <td v-else-if="item.status == 2" class="bg-danger text-white text-center">Denied</td>
                            <td v-else-if="item.status == 3" class="bg-warning text-white text-center">Pending</td>
                            <td v-else class="text-center">Others</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</template>

<script>
export default {
    data() {
        return {
            dataList: [],
        }
    },
    mounted() {
        this.getStudents();
    },
    methods: {
        getStudents(){
            axios.get('/api/getstudents')
            .then(response => {
                this.dataList = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>