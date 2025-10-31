<script setup>
import { skeleton } from "#build/ui";

const { locale } = useI18n();

const props = defineProps({
  member: { type: Object, default: () => ({}) },
  department: { type: Object, default: () => ({}) },
  colors: { type: Object, default: () => ({}) },
  skeleton: { type: Boolean, default: false },
});
</script>

<template>
  <div>
    <div class="flex flex-col items-center text-center gap-1">
      <div class="relative group">
        <img
          :src="member.photo_url"
          alt="Member Photo"
          class="w-40 aspect-square object-cover rounded-full glow-sm hover:glow-md transition"
          :class="colors.glow"
        />

        <div
          v-if="member.linkedin || member.github || member.email"
          class="hidden md:flex absolute inset-0 bg-black bg-opacity-50 rounded-full items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
        >
          <a
            v-if="member.linkedin"
            :href="member.linkedin"
            target="_blank"
            rel="noopener noreferrer"
          >
            <Icon
              name="mdi:linkedin"
              class="w-8 h-8 text-white hover:scale-110 transition"
            />
          </a>
          <a
            v-if="member.github"
            :href="member.github"
            target="_blank"
            rel="noopener noreferrer"
          >
            <Icon
              name="mdi:github"
              class="w-8 h-8 text-white hover:scale-110 transition"
            />
          </a>
          <a
            v-if="member.email"
            :href="'mailto:' + member.email"
            target="_blank"
            rel="noopener noreferrer"
          >
            <Icon
              name="mdi:email"
              class="w-8 h-8 text-white hover:scale-110 transition"
            />
          </a>
        </div>
      </div>

      <div
        v-if="member.linkedin || member.github || member.email"
        class="mt-4 flex items-center gap-2 justify0-center md:hidden"
      >
        <a
          v-if="member.linkedin"
          :href="member.linkedin"
          target="_blank"
          rel="noopener noreferrer"
        >
          <Icon
            name="mdi:linkedin"
            class="w-8 h-8 text-white hover:scale-110 transition"
          />
        </a>
        <a
          v-if="member.github"
          :href="member.github"
          target="_blank"
          rel="noopener noreferrer"
        >
          <Icon
            name="mdi:github"
            class="w-8 h-8 text-white hover:scale-110 transition"
          />
        </a>
        <a
          v-if="member.email"
          :href="'mailto:' + member.email"
          target="_blank"
          rel="noopener noreferrer"
        >
          <Icon
            name="mdi:email"
            class="w-8 h-8 text-white hover:scale-110 transition"
          />
        </a>
      </div>

      <h3 class="text-lg font-semibold" :class="colors.text">
        {{ member.name[locale] }}
      </h3>
      <p class="text-gray-400">{{ member.role[locale] }}</p>
      <p class="text-gray-400 text-sm">{{ department.name[locale] }}</p>
    </div>
  </div>
</template>
