<template>
<div class="cart">
    <div class="card border shadow-sm text-center m-1" v-for="(cart, index) in mycarts" :key="index">
        <div class="card-body">
            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <img class="float-right" src="/storage/product/1596679574f5.jpg" height="100%" width="100%">
                </div>
                <div class="col-3">
                    <span class="float-right" style="font-size: small;">{{cart['product'].name}} </span>
                </div>
                <div class="col-2">
                    <span>{{cart['quantity']}}</span>
                </div>
                <div class="col-3 ">
                    <span>{{cart['price']}} </span>
                </div>
                <div class="col-2">
                    <button @click="deletecart(cart['id'])" class="btn btn-danger btn-sm float-left border border-0"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>

    </div>
    <div class="card border shadow-sm text-center">
        <div class="card-body" v-if="is_empty">
            <i class="fas fa-shopping-cart "></i><br>
            السلة فارغة
        </div>
        <div class="card-body" v-if="! is_empty">
            المجموع : {{tot}} جنية <br><br>
            <a href="/checkout" class=" btn btn-primary btn-sm">اطلب الان</a>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            'mycarts': [],
            'tot': 0,
            'is_empty': false,
        }
    },
    mounted() {
        this.getcart();
        this.$on('change', function () {
            this.getcart();
        });
    },
    methods: {
        deletecart(id) {
            axios.get('/cart/' + id)
                .then(response => {
                    this.getcart();
                })
                .catch(error => {
                    error.response.data.errors;
                });
        },
        getcart() {
            axios.get('/cart')
                .then(response => {
                    this.mycarts = response.data.carts;
                    this.tot = response.data.total;
                    if (this.tot == 0) {
                        this.is_empty = true;
                    }
                })
                .catch(error => {
                    error.response.data.errors;
                });
        }
    },
}
</script>
