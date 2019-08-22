<template>
    <span>
        <button class="btn btn-primary" @click="clickBtnAdd(product)">Add to Cart</button>
    </span>
</template>

<script>
    import CartComponent from './CartComponent';

    export default {
        props: ['product'],
        methods: {
            clickBtnAdd: function (product) {
                CartComponent
                this.$emit('addToCart');
            }
        },
        components: {
            CartComponent
        }
    }
</script>
