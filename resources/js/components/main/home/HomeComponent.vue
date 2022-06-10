<template>
    <transition
        v-if="showTemps"
        enter-active-class="animate__animated animate__backInDown"
    >
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="temp-h1">Login Temperatures</h1>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button
                                    type="button"
                                    class="btn btn-outline-danger mx-1"
                                    @click="arrangeByHottestTemp(1)"
                                >
                                    Hottest First
                                </button>
                                <button
                                    @click="arrangeByHottestTemp()"
                                    type="button"
                                    class="btn btn-outline-info mx-1"
                                >
                                    Reset Order
                                </button>
                            </div>
                        </div>
                        <div v-if="temperatures" class="row mt-5">
                            <div
                                v-for="city in temperatures"
                                :key="city.id"
                                class="col-6"
                            >
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="city-name-text">
                                            {{ city.name | nameStandard }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr
                                                    v-for="temp in city.temperatures"
                                                    :key="temp.id"
                                                >
                                                    <td>
                                                        {{
                                                            temp.created_at
                                                                | myDateWithTime
                                                        }}
                                                    </td>
                                                    <td>{{ temp.temp }} °C</td>
                                                    <td>
                                                        {{
                                                            temp.temp
                                                                | celsiusInFahrenheit
                                                        }}
                                                        °F
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        channelName: {
            required: true,
            type: String,
        },
    },

    data() {
        return {
            showTemps: false,

            temperatures: null,

            searchParams: {
                hottest: 0,
            },
        };
    },

    created() {
        window.Echo.channel(this.channelName).listen(
            "\\App\\Events\\UpdateTempNotification",
            (e) => {
                this.getTemperatures();
            }
        );
    },

    mounted() {
        this.showTemps = true;
        this.getTemperatures();
    },

    methods: {
        getTemperatures() {
            axios
                .get("/api/user/get-user-temperatures", {
                    params: this.searchParams,
                })
                .then((response) => {
                    if (response.status == 200) {
                        this.temperatures = response.data;
                    }
                })
                .catch((error) => {
                    Swal.fire({
                        title: "Error!",
                        text: error.response.data.message,
                        icon: "error",
                    });
                });
        },

        arrangeByHottestTemp(value = 0) {
            this.searchParams.hottest = value;
            this.getTemperatures();
        },
    },
};
</script>

<style lang="scss" scoped>
.temp-h1 {
    color: #00e54c;
    font-family: "Ubuntu", sans-serif;
    font-size: 2.3rem;
    font-weight: 500;
}

.city-name-text {
    font-family: "Ubuntu", sans-serif;
    font-size: 1.9rem;
    font-weight: 500;
}
</style>
