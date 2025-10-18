<script setup>
const {locale} = useI18n()

const props = defineProps({
    supporter: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="rounded-md hover:scale-105 transition bg-cyan-50 aspect-square w-[200px] p-4 relative group">
        <div class="p-2 absolute inset-0 flex flex-col gap-4 justify-center items-center bg-gray-400 bg-opacity-90 opacity-0 group-hover:opacity-100 transition duration-300">
            <span class="text-xl font-bold text-center">{{ supporter.name[locale] }}</span>
            <a v-if="supporter.url" :href="supporter.url" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:text-blue-800">More</a>
        </div>
        <img :src="supporter.logo_url" :alt="supporter.name[locale]" class="object-contain h-full w-full" />
    </div>
</template>