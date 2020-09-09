<template>
<div class="card">
    <div class="card-body p-1 text-right">
        <div class="row m-0">
            <div class="col-3 p-1 m-0">
                <img v-if="product.image" :src="product.image.url" height="100px" width="100px">
                <img v-else-if src="/storage/product/1596679574f5.jpg" height="100px" width="100px">
            </div>
            <div class="col-7 p-1 m-0">
                {{product.name}} <br>
                {{product.description }}
            </div>
            <div class="col-2 text-center m-0 p-1" v-if="! product.variants">
                {{product.price}} جنية <br><br>
                <button @click="cart" class="btn-outline-primary btn-sm shadow-sm border border-0"> <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
            </div>
            <div class="col-2 text-center m-0 p-1" v-if="product.variants">
                السعر علي حسب اختيارك
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Cart from '../components/cart.vue';
export default {
    props: ['product'],
    components: {
        Cart
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
                    variant: null,
                    additions: [],
                })
                .then(response => {
                    Cart.is_empty = true;
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
