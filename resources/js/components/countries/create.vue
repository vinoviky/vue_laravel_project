<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Create Countries
                            <router-link
                                :to="{ name: 'CountriesIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="storeCountry">
                                <div class="form-group row">
                                    <label
                                        for="country_code"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Country Code</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="country_code"
                                            v-model="form.country_code"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
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
                                            Store
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
            
            form: {
                country_code: "",
                name: "",
                
            }
        };
    },
    
    methods: {
        storeCountry() {
            axios
                .post("/api/countries", {
                    country_code: this.form.country_code,
                    name: this.form.name,
                    
                })
                .then(res => {
                    this.$router.push({ name: "CountriesIndex" });
                });
        }
    }
};
</script>

<style></style>
