<template>
<div class="row">
    <div class="col-md-3">
        <div class="card border shadow-sm  text-center ">
            <div class="card-body ">
                الأصناف
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border shadow-sm  text-center ">
            <div class="card-body ">
                القائمة
            </div>
        </div>
        <product v-for="(product, id) in products" :key="product.id" :product="product" @addtocart="change"></product>
    </div>
    <div class="col-md-3">
        <div class="card border shadow-sm  text-center ">
            <div class="card-body ">
                طلبك
            </div>
        </div>
        <cart></cart>
    </div>
</div>
</template>

<script>
export default {
    props: ['restaurant'],
    data() {
        return {
            products: [],
        }
    },
    mounted() {
        this.getproducts();
    },
    methods: {
        getproducts() {
            axios.get('/restaurantproducts/' + this.restaurant.id)
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    error.response.data.errors;
                });
        },
        change() {
            this.$emit('change');
        }

    },
}
</script>

<style>
.border {
    border-raduis: 15px;
}
</style>
