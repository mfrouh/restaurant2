<template>
<div class="card border shadow-sm m-1">
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <img v-if="product.image" :src="product.image.url" height="100px" width="100%">
                <img v-else-if src="/storage/product/1596679574f5.jpg" class="border" height="100px" width="100%">
            </div>
            <div class="col-7 text-right">
                {{product.name}} <br>
                {{product.description }}
            </div>
            <div class="col-2 text-center" v-if="! product.variants">
                <span>{{product.price}} جنية </span><br><br>
                <button @click="cart" class="btn-outline-primary btn-sm shadow-sm border border-0"> <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
            </div>
            <div class="col-2 text-center" v-if="product.variants">
                السعر علي حسب اختيارك
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['product'],
    components: {

    },
    data() {
        return {
            variant: null,
            additions: [],
        }
    },
    methods: {
        cart() {
            axios.post('/cart', {
                    product: this.product.id,
                    variant: this.variant,
                    additions: this.additions,
                })
                .then(response => {
                    this.$emit('addtocart');
                })
                .catch(error => {
                    error.response.data.errors;
                });
        }
    },

}
</script>

<style>
.border {
    border-radius: 50%;
}
</style>
