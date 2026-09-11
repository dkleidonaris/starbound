import type { Config } from "tailwindcss";
import defaultTheme from "tailwindcss/defaultTheme";
import typography from "@tailwindcss/typography";
const textGlow = require("tailwindcss-textglow");

export default <Partial<Config>>{
  theme: {
    extend: {
      fontFamily: {
        playfair: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
      },
      keyframes: {
        pulseZoom: {
          "0%, 100%": { transform: "scale(1)", opacity: "1" },
          "50%": { transform: "scale(1.1)", opacity: "0.7" },
        },
        starFlash: {
          "0%, 100%": { opacity: "0.3" },
          "50%": { opacity: "1" },
        },
      },
      animation: {
        pulseZoom: "pulseZoom 2.5s ease-in-out infinite",
        starFlash: "starFlash 2.5s infinite ease-in-out",
      },
    },
  },
  plugins: [
    typography,
    textGlow,
    function ({ addBase, theme }) {
      addBase({
        h1: {
          fontSize: theme("fontSize.4xl"),
          "@screen md": { fontSize: theme("fontSize.6xl") },
          fontWeight: theme("fontWeight.bold"),
        },
        h2: {
          fontSize: theme("fontSize.2xl"),
          "@screen md": { fontSize: theme("fontSize.4xl") },
          fontWeight: theme("fontWeight.bold"),
        },
        h3: {
          fontSize: theme("fontSize.2xl"),
          "@screen md": { fontSize: theme("fontSize.4xl") },
          fontWeight: theme("fontWeight.bold"),
        },
        h4: {
          fontSize: theme("fontSize.xl"),
          "@screen md": { fontSize: theme("fontSize.2xl") },
          fontWeight: theme("fontWeight.bold"),
        },
        h5: {
          fontSize: theme("fontSize.lg"),
          "@screen md": { fontSize: theme("fontSize.xl") },
          fontWeight: theme("fontWeight.bold"),
        },
        h6: {
          fontSize: theme("fontSize.base"),
          "@screen md": { fontSize: theme("fontSize.lg") },
          fontWeight: theme("fontWeight.bold"),
        },
        p: {
          fontSize: theme("fontSize.base"),
          "@screen md": { fontSize: theme("fontSize.lg") },
        },
        a: {
          fontSize: theme("fontSize.base"),
          "@screen md": { fontSize: theme("fontSize.lg") },
        },
      });
    },
  ],
};
