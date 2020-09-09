<template>
<div>
    <form action="/checkout" method="post" id="payment-form">
        @csrf
        <div class="row text-right">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" class="form-control valid" name="name" value="{{auth()->user()->name}}" aria-invalid="false" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>الريد الالكتروني</label>
                            <input type="text" class="form-control" value="{{auth()->user()->email}}" name="email" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" class="form-control valid" name="address" value="" aria-invalid="false">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>الشارع</label>
                            <input type="text" class="form-control" name="street" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="text" class="form-control valid" name="phone_number" value="" aria-invalid="false">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>معلومة للسائق</label>
                            <textarea class="form-control" name="note_for_driver"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element" style="width: -webkit-fill-available;">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display Element errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <button class="btn btn-primary btn-sm shadow-sm">ادفع</button>
            </div>
        </div>
    </form>
</div>
</template>

<script>
export default {

}
</script>

<style lang="">

</style>
