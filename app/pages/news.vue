<script setup>
const config = useRuntimeConfig();
const { locale } = useI18n();
const localePath = useLocalePath();
import { watchDebounced, refDebounced } from '@vueuse/core';

const apiBase = config.public.apiBase;

const pageLoading = usePageLoading();
pageLoading.value = true;

const searchQuery = ref('');
const selectedCategory = ref('all');

const query = computed(() => ({
  q: searchQuery.value || undefined,
  category: selectedCategory.value !== 'all'
    ? selectedCategory.value
    : undefined,
}));

const { data: posts, pending: postsPending, error: postsError, refresh: refreshPosts } = await useFetch(`${apiBase}/posts`, {
  query: query,
  transform: (res) => res.data,
  default: () => [],
  server: false,
})

pageLoading.value = false;

const { data: categories, pending: categoriesPending, error: categoriesError } = await useFetch(`${apiBase}/categories`, {
  transform: (res) => res.data,
  default: () => [],
  server: false,
  lazy: true,
})

// watchDebounced([searchQuery, selectedCategory], () => {
//   refreshPosts();
// }, { debounce: 500 });
</script>

<template>

  <div>
    <h1 class="text-center my-4 text-cyan-400 glow-sm glow-cyan-300">{{ $t('news.title') }}</h1>
    <h2 class="text-white text-xl text-center my-2">{{ $t('news.subtitle') }}</h2>
    <div class="max-w-[1200px] mx-auto p-2">
      <div class="inline-flex items-center justify-center w-full">
        <hr class="w-full h-1 my-8 bg-blue-800 border-0">
        <div class="absolute px-4 -translate-x-1/2 bg-white rounded-full text-lg left-1/2">
          <span>{{ $t("Νέα") }}</span>
        </div>
      </div>
      <div class="flex gap-4 items-center my-2">
        <input v-model="searchQuery" type="text" class="p-2 text-white border border-blue-300 rounded-md w-1/2 bg-blue-800"
          :placeholder="$t('news.search')">
        <select v-model="selectedCategory" class="text-white p-2 border border-blue-300 rounded-md bg-blue-800">
          <option value="all">{{ $t('news.selectCategory') }}</option>
          <option v-for="cat in categories" :key="cat.id" :value="cat.id">
            {{ cat.name[locale] }}
          </option>
        </select>

      </div>
      <div class="grid md:grid-cols-3 gap-4">
        <div v-if="postsPending" v-for="n in 3" class="flex flex-col items-start gap-2 bg-[#131422] p-4 rounded-sm">
          <img src="/img/post-placeholder.png" alt="Placeholder" class="w-full h-48 object-cover animate-pulse">
          <div class="animate-pulse bg-gray-200 rounded-sm">
            <p class="text-2xl invisible">Sample Title</p>
          </div>
          <div class="animate-pulse bg-gray-200 rounded-sm">
            <p class="text-sm invisible">November 1, 2025</p>
          </div>
          <div class="animate-pulse bg-gray-200 rounded-sm">
            <p class="text-sm h-8 invisible">Sample excerpt</p>
          </div>
        </div>
        <div v-else v-for="post in posts" key:="`post-${post.id}`"
          class="bg-[#131422] text-white rounded-md shadow-md p-4 transition hover:-translate-y-1 glow-cyan-300">
          <img :src="post.featured_image_url" :alt="post.title[locale]"
            class="w-full h-48 object-cover rounded-md mb-4" />
          <p class="text-white text-2xl mb-2">{{ post.title[locale] }}</p>
          <p class="text-sm">{{ new Intl.DateTimeFormat(locale, {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
          }).format(new Date(post.published_at)) }}</p>
          <p class="text-gray-100">{{ excerptFromHtml(post.content[locale]) }}</p>
          <NuxtLink :to="localePath(`/posts/${post.slug}`)" class="mt-4 inline-block text-blue-400 hover:underline">{{
            $t('news.readMore') }}</NuxtLink>
        </div>
      </div>
    </div>
  </div>
</template>
