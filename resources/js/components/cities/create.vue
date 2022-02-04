<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Create Cities
                            <router-link
                                :to="{ name: 'CitiesIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="storeCity">
                                <div class="form-group row">
                                    <label
                                        for="state"
                                        class="col-md-4 col-form-label text-md-right"
                                        >State</label
                                    >

                                    <div class="col-md-6">
                                        <select
                                            v-model="form.state_id"
                                            name="state"
                                            class="form-control"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="state in states"
                                                :key="state.id"
                                                :value="state.id"
                                                >{{ state.name }}</option
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
            states: [],
            form: {
                state_id: "",
                name: "",
                
            }
        };
    },
    created() {
        this.getStates();
    },
    methods: {
        getStates() {
            axios
                .get("/api/cities/states")
                .then(res => {
                    this.states = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        storeCity() {
            axios
                .post("/api/cities", {
                    state_id: this.form.state_id,
                    name: this.form.name,
                })
                .then(res => {
                    this.$router.push({ name: "CitiesIndex" });
                });
        },
    }
};
</script>

<style></style>
