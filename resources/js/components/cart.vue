<template>
<div>
    <div class="card text-right p-0 " v-for="(cart, index) in mycarts" :key="index">
        <div class="card-body p-1">
            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <img class="float-right" src="/storage/product/1596679574f5.jpg" height="33px" width="40px">
                </div>
                <div class="col-3 p-0 text-center">
                    <span class="float-right" style="font-size: small;">{{cart['product'].name}} </span>
                </div>
                <div class="col-2 p-0 ">
                    <span class=" pl-2 pr-2">{{cart['quantity']}}</span>
                </div>
                <div class="col-3 p-0 text-center">
                    <span class=" pl-2">{{cart['price']}} </span>
                </div>
                <div class="col-2">
                    <button @click="deletecart(cart['id'])" class="btn btn-danger btn-sm float-left border border-0"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div v-if="is_empty">
        <i class="fas fa-shopping-cart "></i><br>
        السلة فارغة
    </div>
    <div v-if="! is_empty" class="">
        المجموع : {{tot}} جنية <br><br>
        <a href="/checkout" class=" btn btn-primary btn-sm">اطلب الان</a>
    </div>
</div>
</template>

<script>
export default {
    props: ['carts', 'total'],
    data() {
        return {
            'mycarts': [],
            'tot': 0,
            'is_empty': false,
        }
    },
    mounted() {
        this.mycarts = this.carts;
        this.tot = this.total;
        if (this.tot == 0) {
            this.is_empty = true;
        }
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
