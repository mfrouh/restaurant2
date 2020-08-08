<template>
  <div class="card">
   <div class="card-body p-1 text-right">
    <div class="row m-0">
        <div class="col-3 p-1 m-0"> 
           <img v-if="product.image"  :src="product.image.url" height="100px" width="100px">
           <img v-else-if  src="/storage/product/1596679574f5.jpg" height="100px" width="100px">
        </div>
        <div class="col-7 p-1 m-0">
         {{product.name}} <br>
         {{product.description }}
        </div>
        <div class="col-2 text-center m-0 p-1" v-if="! product.variants">
           {{product.price}} جنية <br><br>
           <a @click="cart" class="btn-outline-primary btn-sm shadow-sm"> <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
        </div>
        <div class="col-2 text-center m-0 p-1" v-if="product.variants">
          السعر علي حسب اختيارك 
        </div>
    </div>
   </div>
 </div>
</template>
<script>
export default {
  props:['product'],
    methods: {
        cart()
        {  
            axios.post('/cart',{
            product:this.product.id,
            variant:null,
            additions:[],
        })
        .then(response => {
         })
        .catch(error => {
           this.$toaster.error(error.response.data.errors);
        });
        }
    },
    
        
   
}
</script>