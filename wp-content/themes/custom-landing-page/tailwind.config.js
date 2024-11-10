/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.php', // Ensure this points to the files where Tailwind classes are used
    './src/**/*.{js,jsx,ts,tsx}',],
  theme: {
    extend: {
      maxWidth: {
        '1.0': '100%',
      },
    },
  },
  plugins: [],
}

