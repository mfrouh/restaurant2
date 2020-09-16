<template>
<div class="row">
    <div class="col-md-3">
        <div class="card border shadow-sm  text-center ">
            <div class="card-body ">
                الأصناف ({{restaurant.categories.length}})
            </div>
        </div>
        <div class="card border shadow-sm  m-1" :class="activecategory==category.id?'active':''" v-for="(category, id) in restaurant.categories" :key="category.id">
            <a class="btn btn-alink text-right" @click="changecategory(category)"> {{category.name}}</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border shadow-sm  text-center active">
            <div class="card-body ">
                <ul class="nav nav-tabs md-tabs nav-justified primary-color" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-alink" @click="tabactive ='menu'" data-toggle="tab" role="tab">{{active.name}} ({{products.length}})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-alink" @click="tabactive ='info'" data-toggle="tab" role="tab">معلومات عن المطعم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-alink" @click="tabactive ='rate'" data-toggle="tab" role="tab">الأراء والتقيمات</a>
                    </li>
                </ul>
            </div>
        </div>
        <product v-if="tabactive =='menu'" v-for="(product, id) in products" :key="product.id" :product="product" @addtocart="change"></product>
        <restaurantinfo v-if="tabactive =='info'"></restaurantinfo>
        <restaurantrate v-if="tabactive =='rate'"></restaurantrate>

    </div>
    <div class="col-md-3">
        <div class="card border shadow-sm  text-center ">
            <div class="card-body ">
                طلبك
            </div>
        </div>
        <cart @change="change"></cart>
    </div>
</div>
</template>

<script>
export default {
    props: ['restaurant'],
    data() {
        return {
            products: [],
            activecategory: this.restaurant.categories[0].id,
            active: this.restaurant.categories[0],
            tabactive: 'menu',
        }
    },
    mounted() {
        this.getproducts();
    },
    methods: {
        getproducts() {
            axios.get('/restaurantproducts/' + this.restaurant.id + '/' + this.activecategory)
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    error.response.data.errors;
                });
        },
        changecategory(category) {
            this.activecategory = category.id;
            this.active = category;
            this.getproducts();
        },
        change() {
            this.$emit('change');
        }

    },
}
</script>

<style>
.border {
    border-radius: 15px;
}

.active {
    background: cyan;
}
</style>
