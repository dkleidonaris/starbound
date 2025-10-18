<script setup>
import { ref, onMounted } from 'vue';
import CountUp from 'countup.js';

const props = defineProps({
    endVal: {
        type: Number,
        required: true
    },
    duration: {
        type: Number,
        default: 2
    },
    options: {
        type: Object,
        default: () => ({})
    }
});

const counter = ref(null);

onMounted(() => {
    const countUp = new CountUp(counter.value, props.endVal , {
        duration: props.duration,
    })
    countUp.start()
})
</script>

<template>
    <span ref="counter"></span>
</template>