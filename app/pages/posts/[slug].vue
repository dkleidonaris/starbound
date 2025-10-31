<script setup>
const apiBase = useRuntimeConfig().public.apiBase;
const { locale } = useI18n();
const route = useRoute();

const { data, pending, error } = await useFetch(`${apiBase}/posts/${route.params.slug}`, {
  transform: (res) => res.data,
  default: () => [],
});
</script>
<template>
<p>{{ data.title[locale] }}</p>
</template>