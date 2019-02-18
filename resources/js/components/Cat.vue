<template>
    <a href="#">
        <img v-bind:src="{{ asset('img/small-cart-wow.png') }}" alt="cat mimig" />
    </a>
</template>

<script>
    export default {
        mounted() {
            console.log('Navbar Component mounted.')
        }
    }
</script>
