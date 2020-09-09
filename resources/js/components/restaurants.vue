<template>
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card border">
            <div class="card-body text-right card-border-right">
                فلتر <i class="fa fa-filter float-left p-1" aria-hidden="true"></i>
            </div>
        </div>
        <div class="card border">
            <div class="card-body text-right">
                <input type="text" class="form-control border" placeholder="اسم المطعم">
            </div>
        </div>
        <div class="card border">
            <div class="card-body text-right">
                <input type="text" class="form-control border" placeholder=" العنوان">
            </div>
        </div>
        <div class="card border">
            <div class="card-body text-right">
                خدمة توصيل للمنازل : <input type="checkbox" class="float-left m-1">
            </div>
        </div>
        <div class="card border">
            <div class="card-body text-right">
                متاح الان : <input type="checkbox" class="float-left m-1">
            </div>
        </div>
        <input type="button" class="btn btn-outline-primary" value="بحث">
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4" v-for="(restaurant, id) in restaurants" :key="restaurant.id">
                <restaurant :restaurant="restaurant"></restaurant>
            </div>
            <div v-if="lastpage>1" class="w-100">
                <a class="btn btn-light shadow-sm float-right ml-5 mr-5" @click="changepage(first)">الاول</a>
                <a class="btn btn-light shadow-sm float-right ml-5 mr-5" :class="prev==null?'disabled':''" @click="changepage(prev)">السابق</a>
                <a class="btn btn-primary shadow-sm">{{current}}</a>
                <a class="btn btn-light shadow-sm float-left ml-5 mr-5" @click="changepage(last)">الاخير</a>
                <a class="btn btn-light shadow-sm float-left ml-5 mr-5" :class="next==null?'disabled':''" @click="changepage(next)">التالي</a>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            restaurants: [],
            total: 0,
            next: null,
            prev: null,
            first: null,
            last: null,
            current: null,
            lastpage: null,
        }
    },
    mounted() {
        this.allrestaurant();
    },
    methods: {
        allrestaurant() {
            axios.get('/allrestaurants?page=' + this.current)
                .then(response => {
                    this.pagination(response.data);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        changepage(url) {
            axios.get(url)
                .then(response => {
                    this.pagination(response.data);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        pagination(data) {
            this.restaurants = data.data;
            this.total = data.total;
            this.next = data.next_page_url;
            this.prev = data.prev_page_url;
            this.first = data.first_page_url;
            this.last = data.last_page_url;
            this.lastpage = data.last_page;
            this.current = data.current_page;
        }
    },
}
</script>

<style>
.w-100 {
    width: 100%;
}
</style>
