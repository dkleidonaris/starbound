<script setup>
const apiBase = useRuntimeConfig().public.apiBase;
const { locale } = useI18n();
import { watchDebounced } from "@vueuse/core";

const props = defineProps({
  search: String,
});

const { data, pending, error } = await useFetch(`${apiBase}/posts`, {
  query: () => ({ q: props.search }),
  watch: [() => props.search],
  transform: (res) => res.data,
  default: () => [],
});
</script>
<template>
  <div
    v-for="post in data"
    :key="post.id"
    class="flex gap-4 p-2 rounded-md shadow-blue-600 shadow-md grow bg-slate-900 hover:bg-slate-800"
  >
    <img
      :src="post.featured_image ?? '/img/post-placeholder.png'"
      alt=""
      class="w-40 aspect-square object-cover"
    />
    <div class="flex flex-col">
      <p class="text-2xl font-semibold mb-2">{{ post.title[locale] }}</p>
      <p>{{ excerptFromHtml(post.content[locale]) }}</p>
      <a :href="`/posts/${post.slug}`" class="mt-auto"
        >{{ $t("Διαβάστε περισσότερα") }}...</a
      >
    </div>
  </div>
</template>
