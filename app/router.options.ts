import type { RouterConfig } from "@nuxt/schema";

export default {
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) return savedPosition;

    // 👇 If keepScroll=1 is in the query, don't scroll
    if (to.query.keepScroll) {
      return false;
    }

    return { left: 0, top: 0 };
  },
} as RouterConfig;
