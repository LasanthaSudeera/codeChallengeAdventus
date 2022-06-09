<template>
    <transition v-if="showTemps" enter-active-class="animate__animated animate__backInDown">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="temp-h1">Login Temperatures</h1>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    data() {
        return {
            showTemps: false
        }
    },

    mounted() {
        this.showTemps = true;
    }
};
</script>

<style lang="scss" scoped>
.temp-h1 {
    color: #00e54c;
    font-family: "Ubuntu", sans-serif;
    font-size: 2.3rem;
    font-weight: 500;
}
</style>
