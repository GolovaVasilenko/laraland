<template>
    <div class="cart-container">
        <span class="cart-info">
            Cart: {{ count }}
        </span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 0,
                products: []
            }
        },
        methods: {
            addProduct: function(product) {
                this.products.push(product);
                this.count = this.products.length;
            }
        }
        /*mounted() {
            console.log('Component mounted.')
        }*/
    }
</script>
