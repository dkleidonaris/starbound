<script setup>
import { ref } from "vue";

const props = defineProps({
  to: { type: String, required: false },
  label: { type: String, required: true },
  exact: { type: Boolean, default: false },
  submenu: { type: Array, default: null },
  mobile: { type: Boolean, default: false },
});

const emit = defineEmits(["navigate"]);

const localePath = useLocalePath();
const open = ref(false);

function toggle() {
  open.value = !open.value;
}

function handleNavigate() {
  emit("navigate");
}
</script>

<template>
  <!-- ITEM WITH SUBMENU -->
  <div v-if="submenu">
    <!-- Desktop -->
    <div v-if="!mobile" class="relative group cursor-pointer">
      <div class="flex gap-1 items-center">
        <p class="text-sm md:text-lg text-nowrap">{{ $t(label) }}</p>
        <Icon name="weui:arrow-filled" class="rotate-90" />
      </div>

      <div
        class="absolute top-full left-0 w-[200px] bg-white flex flex-col opacity-0 group-hover:opacity-100 transition"
      >
        <NuxtLink
          v-for="subitem in submenu"
          :key="subitem.to"
          :to="localePath(subitem.to)"
          class="text-sm md:text-lg p-2 hover:bg-gray-200"
        >
          {{ $t(subitem.label) }}
        </NuxtLink>
      </div>
    </div>

    <!-- Mobile -->
    <div v-else class="flex flex-col items-center">
      <button @click="toggle" class="flex items-center gap-2">
        {{ $t(label) }}
        <Icon
          name="weui:arrow-filled"
          :class="['transition', open ? 'rotate-90' : '']"
        />
      </button>

      <div v-if="open" class="flex flex-col mt-2 gap-2">
        <NuxtLink
          v-for="subitem in submenu"
          :key="subitem.to"
          :to="localePath(subitem.to)"
          class="hover:underline"
          @click="handleNavigate"
        >
          {{ $t(subitem.label) }}
        </NuxtLink>
      </div>
    </div>
  </div>

  <!-- NORMAL LINK -->
  <NuxtLink
    v-else
    :to="localePath(to)"
    class="text-sm md:text-lg hover:underline transition-colors text-nowrap"
    active-class="text-blue-700 underline"
    @click="handleNavigate"
  >
    {{ $t(label) }}
  </NuxtLink>
</template>
