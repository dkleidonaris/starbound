<script setup>
const apiBase = useRuntimeConfig().public.apiBase;
const { locale } = useI18n();
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
      </div>
      <div class="flex flex-col gap-4 grow">
        <Suspense>
          <template #default>
            <NewsList />
          </template>
          <template #fallback>
            <div
              v-for="n in 3"
              :key="`news-skeleton-${n}`"
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
                <p class="mt-auto">{{$t('Διαβάστε περισσότερα')}}...</p>
              </div>
            </div>
          </template>
        </Suspense>
      </div>
    </div>
  </div>
</template>
