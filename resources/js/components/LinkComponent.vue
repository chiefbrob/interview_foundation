<template>
    <b-button :variant="variant" v-text="text"></b-button>
</template>

<script>
    export default {
        prop: ['variant', 'text'],
        data() {
            return {
                variant: this.variant,
                text: this.text
            };
        },
        mounted() {
            //console.log('Component mounted.')
        }
    }
</script>
