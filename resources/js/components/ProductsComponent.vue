<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="row product-list">
                    <li v-for="product in products" class="col-md-4">
                        <div class="card card-dark">
                            <div class="card-header">
                                {{ product.title }}
                            </div>
                            <div class="card-body">
                                <div class="image-wrapp">
                                    <img src="/images/noimage.png" :alt="product.title">
                                </div>
                                {{ product.description }}

                            </div>
                            <div class="card-footer">
                                <a class="btn btn-warning" :href="product.slug">More info</a>
                                <a class="btn btn-primary" :href="product.id">Add to Cart</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .image-wrapp img {
        display: block;
        width: 100%;
    }
    .product-list {
        list-style: none;
    }
</style>

<script>
    export default {
        data() {
            return {
                products: []
            };
        },
        mounted() {
            axios.get('products-on-home')
                .then((response) => (this.products = response.data))
                .catch(function (error) {
                    console.log(error);
                })
        }
    }
</script>
