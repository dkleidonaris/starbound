<script setup>

const props = defineProps({
    to: { type: String, required: true },
    label: { type: String, required: true },
    exact: { type: Boolean, default: false }
});

const localePath = useLocalePath()

</script>

<template>
    <NuxtLink :to="$localePath(props.to)" class="hover:underline transition-colors"
        active-class="text-blue-700 underline">
        {{ $t(props.label) }}
    </NuxtLink>
</template>