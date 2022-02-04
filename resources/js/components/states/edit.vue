<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Update States
                            <router-link
                                :to="{ name: 'StatesIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="updateState">
                                <div class="form-group row">
                                    <label
                                        for="country"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Country</label
                                    >

                                    <div class="col-md-6">
                                        <select
                                            v-model="form.country_id"
                                            name="country"
                                            class="form-control"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="country in countries"
                                                :key="country.id"
                                                :value="country.id"
                                                >{{ country.name }}</option
                                            >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="name"
                                            v-model="form.name"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
            form: {
                state_id: "",
                name: "",
                
            }
        };
    },
    created() {
        // this.getStates();
        this.getState();
    },
    methods: {
        getState() {
            axios
                .get("/api/states/" + this.$route.params.id)
                .then(res => {
                    this.form = res.data;
                    this.getCountries();
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCountries() {
            axios
                .get("/api/states/countries")
                .then(res => {
                    this.countries = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        updateState() {
            axios
                .put("/api/states/" + this.$route.params.id, {
                    country_id: this.form.country_id,
                    name: this.form.name,                    
                })
                .then(res => {
                    this.$router.push({ name: "StatesIndex" });
                });
        },
    }
};
</script>

<style></style>
