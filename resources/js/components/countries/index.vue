<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Countries</h1>
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
                                :to="{ name: 'CountriesCreate' }"
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
                                <th scope="col">Country Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(country, key) in countries"
                                :key="country.id"
                            >
                                <td>{{ key+1 }}</td>
                                <td>{{ country.country_code }}</td>
                                <td>{{ country.name }}</td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'CountriesEdit',
                                            params: { id: country.id }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteCountry(country.id)"
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
            countries: [],
            showMessage: false,
            message: "",
            search: null,
        };
    },
    watch: {
        search() {
            this.getCountries();
        },
    },
    created() {
        this.getCountries();
    },
    methods: {
        getCountries() {
            axios
                .get("/api/countries", {
                    params: {
                        search: this.search,
                    }
                })
                .then(res => {
                    this.countries = res.data.data;
                    // console.log(res.data);
                    // this.countries = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteCountry(id) {
            axios.delete("api/countries/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getCountries();
            });
        }
    }
};
</script>

<style></style>
