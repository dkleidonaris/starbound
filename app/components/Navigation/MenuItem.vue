<script setup>

const props = defineProps({
    to: { type: String, required: true },
    label: { type: String, required: true },
    exact: { type: Boolean, default: false },
    submenu: { type: Array, default: null },
});

const localePath = useLocalePath()

</script>

<template>
    <div v-if="props.submenu" class="relative group">
        <div class="flex gap-1 items-center">
            <p>{{ $t(props.label) }}</p>
            <Icon name="weui:arrow-filled" class="rotate-90" />
        </div>
        <div
            class="absolute top-full left-0 w-[200px] bg-white flex flex-col opacity-0 group-hover:opacity-100 transition">
            <NuxtLink v-for="subitem in submenu" :to="subitem.to" class="p-2 hover:bg-gray-200">
                {{ $t(subitem.label) }}
            </NuxtLink>
        </div>
    </div>
    <NuxtLink v-else :to="$localePath(props.to)" class="hover:underline transition-colors"
        active-class="text-blue-700 underline">
        {{ $t(props.label) }}
    </NuxtLink>
</template>