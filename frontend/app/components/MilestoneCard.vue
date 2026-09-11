<script setup>

const { locale } = useI18n();

const props = defineProps({
    milestone: {
        type: Object,
        required: true
    }
});

const dateString = new Date(props.milestone.date).toLocaleDateString(locale.value, {
    month: 'long',
    year: 'numeric'
});

</script>

<template>
    <div class="flex flex-col items-center p-2">
        <div class="bg-purple-600 w-4 aspect-square rounded-full mt-2"></div>
        <div class="w-1 h-[100px] bg-purple-600"></div>
        <div
            class="bg-[#161725] rounded-md p-4 shadow-md flex flex-col gap-2 glow-sm glow-cyan-400 border border-white hover:glow-md hover:-translate-y-1 transition min-w-[250px] max-w-[300px]">
            <span class="text-purple-500">{{ dateString }}</span>
            <span class="bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent">{{
                milestone.title[locale] }}</span>
            <p class="text-white mt-auto">{{ milestone.description[locale] }}</p>
        </div>
    </div>
</template>
