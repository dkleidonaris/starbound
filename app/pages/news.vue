<script setup>
const apiBase = useRuntimeConfig().public.apiBase;
const { locale } = useI18n();
import { watchDebounced } from "@vueuse/core";

const search = ref("");
const categories = ref([]);
const pending = ref(true);
const selectedCategories = ref([]);

const query = computed(() => ({
  q: search.value || undefined, // omit empty params
  category: selectedCategories.value.join(",") || undefined,
}));

const {
  data: posts,
  pending: postsPending,
  refresh: refreshPosts,
} = await useFetch(`${apiBase}/posts`, {
  query,
  server: false,
  lazy: true,
  transform: (res) => res.data,
  default: () => [],
});

const fetchCategories = async () => {
  try {
    const res = await $fetch(`${apiBase}/categories`).then((res) => {
      categories.value = res.data;
    });
  } catch (e) {
    console.error("Fetch categories error:", e);
  }
};

onMounted(() => {
  fetchCategories();
});

// watchDebounced(search, () => refreshPosts(), { debounce: 400 });
// watch(selectedCategories, () => refreshPosts());
</script>

<template>
  <div>
    <h1 class="text-center my-4 text-cyan-400 glow-sm glow-cyan-300">
      {{ $t("Νέα") }}
    </h1>

    <div
      class="max-w-[1500px] mx-auto min-h-[200px] flex flex-col md:flex-row gap-4 p-2 text-white"
    >
      <div class="basis-1/4">
        <h2>Filters</h2>
        <div v-for="cat in categories" :key="`cat-${cat.id}`">
          <label>
            <input
              type="checkbox"
              :value="cat.id"
              v-model="selectedCategories"
            />
            {{ cat.name[locale] }}
          </label>
        </div>
      </div>
      <div class="flex flex-col gap-4 grow">
        <input
          v-model="search"
          placeholder="Search..."
          class="border p-2 flex-1"
        />

        <div class="flex flex-col gap-4">
          <div
            v-if="postsPending"
            v-for="n in 3"
            :key="`skeleton-${n}`"
            class="flex gap-4 p-2 rounded-md shadow-blue-600 shadow-md grow bg-slate-900 hover:bg-slate-800"
          >
            <img
              src="/img/post-placeholder.png"
              alt=""
              class="w-40 aspect-square object-cover"
            />
            <div class="flex flex-col gap-2">
              <div class="bg-gray-500 animate-pulse rounded-sm">
                <p class="text-2xl font-semibold mb-2 invisible">Post Title</p>
              </div>
              <div class="bg-gray-500 animate-pulse rounded-sm">
                <p class="invisible">Post Excerpt</p>
              </div>
              <p class="mt-auto">{{ $t("Διαβάστε περισσότερα") }}...</p>
            </div>
          </div>
          <div
            v-else
            v-for="post in posts"
            class="flex gap-4 p-2 rounded-md shadow-blue-600 shadow-md grow bg-slate-900 hover:bg-slate-800"
          >
            <img
              :src="post.featured_image ?? '/img/post-placeholder.png'"
              alt=""
              class="w-40 aspect-square object-cover"
            />
            <div class="flex flex-col">
              <p class="text-2xl font-semibold mb-2">
                {{ post.title[locale] }}
              </p>
              <p>{{ excerptFromHtml(post.content[locale]) }}</p>
              <a :href="`/posts/${post.slug}`" class="mt-auto"
                >{{ $t("Διαβάστε περισσότερα") }}...</a
              >
            </div>
          </div>
        </div>

        <!-- <div v-else class="flex flex-col gap-4">
          <div
            v-for="post in posts"
            :key="post.id"
            class="flex gap-4 p-2 rounded-md shadow-blue-600 shadow-md grow bg-slate-900 hover:bg-slate-800"
          >
            <img
              :src="post.featured_image ?? '/img/post-placeholder.png'"
              alt=""
              class="w-40 aspect-square object-cover"
            />
            <div class="flex flex-col">
              <p class="text-2xl font-semibold mb-2">
                {{ post.title[locale] }}
              </p>
              <p>{{ excerptFromHtml(post.content[locale]) }}</p>
              <a :href="`/posts/${post.slug}`" class="mt-auto"
                >{{ $t("Διαβάστε περισσότερα") }}...</a
              >
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</template>
