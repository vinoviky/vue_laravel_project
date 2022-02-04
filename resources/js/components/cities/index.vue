<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cities</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>
                </div>
                <div class="card-header">
                    <div class="row">
                        
                        <div>
                            <router-link
                                :to="{ name: 'CitiesCreate' }"
                                class="btn btn-primary mb-2"
                                >Create</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">State Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(city, key) in cities" :key="city.id">
                                <td>{{ key+1 }}</td>
                                <td>{{ city.state.name }}</td>
                                <td>{{ city.name }}</td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'CitiesEdit',
                                            params: { id: city.id }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteCity(city.id)"
                                    >
                                        Delete
                                    </button>

                                </td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
            cities: [],
            showMessage: false,
            message: "",
            search: null,
        };
    },
    watch: {
        search() {
            this.getCities();
        },
    },
    created() {
        this.getCities();
    },
    methods: {
        getCities() {
            axios
                .get("/api/cities", {
                    params: {
                        search: this.search,
                    }
                })
                .then(res => {
                    this.cities = res.data;
                    // console.log(res.data);
                    // this.countries = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteCity(id) {
            axios.delete("api/cities/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getCities();
            });
        }
    }
};
</script>
