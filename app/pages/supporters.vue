<script setup>
const config = useRuntimeConfig()
const { locale } = useI18n()

const apiBase = config.public.apiBase

const pageLoading = usePageLoading();
pageLoading.value = true;

const { data: supporterTypes, pending: supporterTypesPending, error: supporterTypesError } = await useFetch(`${apiBase}/supporter-types`, {
    transform: (res) => res.data,
    default: () => [],
    server: false,
})

const { data: supporters, pending: supportersPending, error: supportersError } = await useFetch(`${apiBase}/supporters`, {
    transform: (res) => res.data,
    default: () => [],
    server: false,
})

pageLoading.value = false;

const colors = {
    "galaxy": {
        "text": "text-purple-600",
        "bg": "bg-purple-600"
    },
    "gold": {
        "text": "text-yellow-400",
        "bg": "bg-yellow-600"
    },
    "silver": {
        "text": "text-[#C0C0C0]",
        "bg": "bg-[#C0C0C0]"
    },
    "collaborators": {
        "text": "text-green-600",
        "bg": "bg-green-600"
    }
};
</script>

<template>

    <div>
        <h1 class="text-center my-4 text-cyan-400 glow-sm glow-cyan-300">{{ $t('Υποστηρικτές') }}</h1>
        <div class="max-w-[1200px] mx-auto p-2">
            <div v-if="supporterTypesPending || supportersPending" class="text-white">Loading...</div>
            <div v-else-if="supporterTypesError || supportersError">Something went wrong {{ supporterTypesError ||
                supportersError }}</div>
            <div v-else class="flex flex-col gap-8">
                <div v-for="supporterType in supporterTypes" :key="supporterType.id"
                    class="bg-[#131422] rounded-md shadow-md p-4 glow-sm hover:glow transition hover:-translate-y-1 glow-cyan-300">
                    <div class="flex flex-col items-center gap-2 mb-4">
                        <h2 :class="colors[supporterType.slug].text">{{
                            supporterType.name[locale] }}</h2>
                        <div class="h-1 w-[100px] rounded-md" :class="colors[supporterType.slug].bg"></div>
                    </div>
                    <div class="flex flex-wrap justify-center gap-8">
                        <SupporterCard
                            v-for="supporter in supporters.filter(s => s.supporter_type_id === supporterType.id)"
                            :key="supporter.id" :supporter="supporter" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
