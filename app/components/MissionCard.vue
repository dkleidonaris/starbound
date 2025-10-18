<script setup>

defineProps({
    icon: {
        type: String,
        required: true
    },
    heading: {
        type: String,
        required: true
    }
});

</script>
<template>
    <div class="opacity-0 translate-y-8 flex flex-col gap-4 border border-blue-500 glow-sm glow-blue-500 hover:glow-md hover:-translate-y-1 transition rounded-md p-4 drop-shadow-md drop-shadow-blue-200 bg-[#17213C]"
        ref="missionCards">
        <div class="bg-[#21284D] rounded-full p-4 flex self-start">
            <Icon :name="icon" class="w-8 h-8 text-[#865BE1] bg-[#865BE1]" />
        </div>
        <h3 class="text-2xl font-semibold mt-4 mb-2">{{ heading }}</h3>
        <p class="">
            <slot />
        </p>
    </div>
</template>