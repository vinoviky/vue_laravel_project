<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">States</h1>
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
                                :to="{ name: 'StatesCreate' }"
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
                                <th scope="col">Country name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(state, key) in states" :key="state.id">
                                <td>{{ key+1 }}</td>
                                <td>{{ state.country.name}}</td>
                                <td>{{ state.name }}</td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'StatesEdit',
                                            params: { id: state.id }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteState(state.id)"
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
            states: [],
            showMessage: false,
            message: "",
            search: null,
        };
    },
    watch: {
        search() {
            this.getStates();
        },
    },
    created() {
        this.getStates();
    },
    methods: {
        getStates() {
            axios
                .get("/api/states", {
                    params: {
                        search: this.search,
                    }
                })
                .then(res => {
                    this.states = res.data;
                    // console.log(res.data);
                    // this.countries = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteState(id) {
            axios.delete("api/states/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getStates();
            });
        }
    }
};
</script>
