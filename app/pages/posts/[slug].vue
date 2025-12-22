<script setup>
const apiBase = useRuntimeConfig().public.apiBase;
const { locale } = useI18n();
const route = useRoute();

const pageLoading = usePageLoading();
pageLoading.value = true;

const { data, pending, error } = await useFetch(`${apiBase}/posts/${route.params.slug}`, {
  transform: (res) => res.data,
  default: () => null,
  server: false,
});
pageLoading.value = false;

</script>
<template>
  <div>
    <div v-if="pending" class="text-center text-white py-20">
      Loading...
    </div>
    <div v-else-if="error" class="text-center text-red-500 py-20">
      Error loading post.
    </div>
    <div v-else class="max-w-3xl mx-auto p-4 text-white">
      <h1 class="text-4xl font-bold mb-4">{{ data?.title[locale] }}</h1>
      <div class="mb-6 text-gray-400">
        {{ new Date(data?.published_at).toLocaleDateString(locale, { year: 'numeric', month: 'long', day: 'numeric' })
        }}
      </div>
      <img :src="data?.featured_image_url" alt="">
      <div v-html="data?.content[locale]" class="my-8 prose prose-invert"></div>
    </div>
  </div>
</template>