<template>
<div class="card border">
    <img class="card-img-top" src="storage/restaurant/1596681047f8.jpg" alt="">
    <div class="card-body card-boreder ">
        <a class="btn btn-primary btn-sm border-50 float-left" :href="/restaurant/+restaurant.id"><i class="fas fa-hand-point-right"></i></a>
        <a class="btn btn-danger btn-sm border-50 float-left ml-1"><i class="fa fa-info m-1" aria-hidden="true"></i></a>

        <span class="float-right"> {{restaurant.name}} </span>
    </div>
</div>
</template>

<script>
export default {
    props: ['restaurant'],
    data() {
        return {

        }
    },
    mounted() {

    },
    methods: {

    },
}
</script>

<style>
.border {
    border-radius: 15px;
}

.border-50 {
    border-radius: 50%;
}

.card-boreder {
    border-bottom-color: #9100ff;
    border-bottom-style: groove;
    border-bottom-width: thick;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
}

.card-img-top {
    width: 100%;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.card-border-right {
    border-right-color: #9100ff;
    border-right-style: groove;
    border-right-width: thick;
    border-top-right-radius: 12px;
    border-bottom-right-radius: 12px;
}
</style>
