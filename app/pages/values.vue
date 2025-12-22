<script setup>
const { t } = useI18n()

const openIndex = ref(0)

const pageLoading = usePageLoading()
pageLoading.value = false

const toggle = (index) => {
    openIndex.value = index // πάντα μία ανοιχτή
}
</script>

<template>
    <div>
        <h1 class="text-center my-6 text-cyan-400 glow-sm glow-cyan-300 text-3xl">
            {{ $t('Οι αξίες μας') }}
        </h1>

        <div class="max-w-[1200px] mx-auto p-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

            <!-- LEFT: ACCORDION -->
            <div class="flex flex-col gap-4">
                <div v-for="(v, index) in $tm('values')" :key="index"
                    class="border border-blue-400/20 rounded-lg bg-[#131422]">
                    <!-- Header -->
                    <button class="w-full flex justify-between items-center px-4 py-4 text-left text-white
                   hover:bg-blue-500/10 transition" @click="toggle(index)">
                        <span class="font-semibold text-lg">
                            {{ $rt(v.title) }}
                        </span>

                        <span class="transition-transform duration-300"
                            :class="openIndex === index ? 'rotate-180' : ''">
                            ▼
                        </span>
                    </button>

                    <!-- EXPANDING CONTENT -->
                    <div class="overflow-hidden transition-[max-height] duration-500 ease-in-out"
                        :class="openIndex === index ? 'max-h-[500px]' : 'max-h-0'">
                        <div class="px-4 pb-4 text-gray-200 leading-relaxed">
                            {{ $rt(v.description) }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: IMAGE -->
            <div class="sticky top-24">
                <img src="/img/starbound_team.png" alt="Our values" class="w-full rounded-xl shadow-lg object-cover" />
            </div>
        </div>
    </div>
</template>
