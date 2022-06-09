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
                                >
                                    Hottest First
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-outline-info mx-1"
                                >
                                    Reset Order
                                </button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="city-name-text">
                                            {{ cityOneName | nameStandard}}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="city-name-text">
                                            {{ cityTwoName | nameStandard}}
                                        </h2>
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
        cityOneName: {
            required: true,
            type: String,
        },
        cityTwoName: {
            required: true,
            type: String,
        },
    },

    data() {
        return {
            showTemps: false,
        };
    },

    mounted() {
        this.showTemps = true;
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
