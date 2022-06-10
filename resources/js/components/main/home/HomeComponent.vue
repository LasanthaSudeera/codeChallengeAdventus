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
                        <div v-if="temperatures" class="row mt-4">
                            <div
                                v-for="(city, index) in temperatures"
                                :key="index"
                                class="col-6"
                            >
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="city-name-text">
                                            {{ city.city.name | nameStandard }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <table
                                                    class="table table-striped"
                                                >
                                                    <transition-group
                                                        enter-active-class="animate__animated animate__bounceIn"
                                                        tag="tbody"
                                                    >
                                                        <tr
                                                            v-for="temp in city
                                                                .temperatures
                                                                .data"
                                                            :key="temp.id"
                                                        >
                                                            <td>
                                                                {{
                                                                    temp.created_at
                                                                        | myDateWithTime
                                                                }}
                                                            </td>
                                                            <td>
                                                                {{ temp.temp }}
                                                                °C
                                                            </td>
                                                            <td>
                                                                {{
                                                                    temp.temp
                                                                        | celsiusInFahrenheit
                                                                }}
                                                                °F
                                                            </td>
                                                            <td
                                                                class="text-center"
                                                            >
                                                                <i
                                                                    style="
                                                                        cursor: pointer;
                                                                    "
                                                                    @click="
                                                                        deleteTemp(
                                                                            temp,
                                                                            index,
                                                                            city
                                                                                .city
                                                                                .id
                                                                        )
                                                                    "
                                                                    class="fa-solid fa-trash text-danger"
                                                                ></i>
                                                            </td>
                                                        </tr>
                                                    </transition-group>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div
                                                class="col-12 d-flex justify-content-center"
                                            >
                                                <pagination
                                                    :data="city.temperatures"
                                                    @pagination-change-page="
                                                        (page) => {
                                                            paginationChanged(
                                                                page,
                                                                city.city.id,
                                                                index
                                                            );
                                                        }
                                                    "
                                                ></pagination>
                                            </div>
                                        </div>
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
import DataTable from "../../modules/DataTable.vue";

export default {
    props: {
        channelName: {
            required: true,
            type: String,
        },
    },

    components: {
        DataTable,
    },

    data() {
        return {
            showTemps: false,

            temperatures: null,

            cities: null,

            searchParams: {
                hottest: 0,
                limit: 8,
            },
        };
    },

    created() {
        window.Echo.channel(this.channelName).listen(
            "\\App\\Events\\UpdateTempNotification",
            (e) => {
                this.getTemperaturesForCities();
            }
        );

        window.Echo.channel(this.channelName).listen(
            "\\App\\Events\\PriorUpdateTempNotification",
            (e) => {
                Toast.fire({
                    title: "Please wait, update incoming!",
                    icon: "info",
                });
            }
        );
    },

    mounted() {
        this.showTemps = true;

        this.getCities()
            .then(() => {
                this.getTemperaturesForCities();
            })
            .catch((error) => {
                Swal.fire({
                    title: "Error!",
                    text: error,
                    icon: "error",
                });
            });
    },

    methods: {
        getTemperatures(city, page = 1) {
            return new Promise((resolve, reject) => {
                axios
                    .get(`/api/user/city/${city}/temperatures`, {
                        params: { ...this.searchParams, page },
                    })
                    .then((response) => {
                        if (response.status == 200) {
                            resolve(response.data);
                        }
                    })
                    .catch((error) => {
                        reject(error.response.data.message);
                    });
            });
        },

        getCities() {
            return new Promise((resolve, reject) => {
                axios
                    .get("api/cities")
                    .then((response) => {
                        if (response.status == 200) {
                            this.cities = response.data;
                            resolve();
                        }
                    })
                    .catch((error) => {
                        reject(error.response.data.message);
                    });
            });
        },

        getTemperaturesForCities() {
            if (this.cities == null || this.cities.length <= 0) {
                return Swal.fire({
                    title: "Error!",
                    text: "No cities found for user!",
                    icon: "error",
                });
            }

            let cityTemp = [];
            this.cities.forEach((element) => {
                cityTemp.push(this.getTemperatures(element.id));
            });

            Promise.all(cityTemp).then(
                (res) => {
                    this.temperatures = res;
                },
                (err) => {
                    Swal.fire({
                        title: "Error!",
                        text: err,
                        icon: "error",
                    });
                }
            );
        },

        paginationChanged(page, city, arrayIndex) {
            this.getTemperatures(city, page)
                .then((response) => {
                    this.$set(this.temperatures, arrayIndex, response);
                })
                .catch((error) => {
                    Swal.fire({
                        title: "Error!",
                        text: error,
                        icon: "error",
                    });
                });
        },

        arrangeByHottestTemp(value = 0) {
            this.searchParams.hottest = value;
            this.getTemperaturesForCities();
        },

        deleteTemp(temp, arrayIndex, city) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(`api/user/city/${city}/temperature/${temp.id}`)
                        .then((response) => {
                            if (response.status == 204) {
                                Swal.fire(
                                    "Deleted!",
                                    "Your temperature has been deleted.",
                                    "success"
                                );

                                this.paginationChanged(1, city, arrayIndex);
                            }
                        })
                        .catch((error) => {
                            Swal.fire({
                                title: "Error!",
                                text: error.response.data.message,
                                icon: "error",
                            });
                        });
                }
            });
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
