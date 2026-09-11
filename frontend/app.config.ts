export default defineAppConfig({
  // === Nuxt UI theming ===
  ui: {
    primary: 'violet',
    gray: 'slate',
    button: {
      rounded: 'xl',
    },
  },

  // === Tailwind v4-style theme extensions ===
  theme: {
    extend: {
      fontFamily: {
        playfair: ['"Playfair Display"', 'serif'],
      },
      keyframes: {
        pulseZoom: {
          '0%, 100%': { transform: 'scale(1)', opacity: '1' },
          '50%': { transform: 'scale(1.1)', opacity: '0.7' },
        },
        starFlash: {
          '0%, 100%': { opacity: '0.3' },
          '50%': { opacity: '1' },
        },
      },
      animation: {
        pulseZoom: 'pulseZoom 2.5s ease-in-out infinite',
        starFlash: 'starFlash 2.5s infinite ease-in-out',
      },
    },
  },

  // === Base element styling (replacement for addBase) ===
  typography: {
    headings: {
      h1: {
        fontSize: '2.25rem', // 4xl
        '@screen md': { fontSize: '3.75rem' }, // 6xl
        fontWeight: '700',
      },
      h2: {
        fontSize: '1.5rem', // 2xl
        '@screen md': { fontSize: '2.25rem' }, // 4xl
        fontWeight: '700',
      },
      h3: {
        fontSize: '1.5rem',
        '@screen md': { fontSize: '2.25rem' },
        fontWeight: '700',
      },
      h4: {
        fontSize: '1.25rem', // xl
        '@screen md': { fontSize: '1.5rem' }, // 2xl
        fontWeight: '700',
      },
      h5: {
        fontSize: '1.125rem', // lg
        '@screen md': { fontSize: '1.25rem' }, // xl
        fontWeight: '700',
      },
      h6: {
        fontSize: '1rem', // base
        '@screen md': { fontSize: '1.125rem' }, // lg
        fontWeight: '700',
      },
    },
    text: {
      p: {
        fontSize: '1rem', // base
        '@screen md': { fontSize: '1.125rem' }, // lg
      },
      a: {
        fontSize: '1rem',
        '@screen md': { fontSize: '1.125rem' },
      },
    },
  },

  // === Custom plugin-like utilities ===
  utilities: {
    textGlow: {
      default: '0 0 8px rgba(255, 255, 255, 0.8)',
    },
  },
})
