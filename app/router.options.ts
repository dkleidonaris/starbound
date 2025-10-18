import type { RouterConfig } from "@nuxt/schema";

export default {
  scrollBehavior(to, from, savedPosition) {
    // if going back/forward in history
    if (savedPosition) return savedPosition

    // custom logic
    if (to.meta.resetScroll) {
      return { left: 0, top: 0 } // reset scroll to top
    }

    // otherwise, do not change scroll (for locale switch etc.)
    return false
  }
} as RouterConfig;
