/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        // Primary Color: used for buttons, active states, etc.
        primary: '#FF5722', // Orange-ish color for primary actions
        // Accent Color: used for highlights like prices or special buttons
        accent: '#FF9800', // A warm orange for accents
        // Text Color Variants
        'text-primary': '#212121', // Dark text for headings or important text
        'text-secondary': '#757575', // Lighter text for descriptions
        'text-accent': '#FF5722', // Text in the accent color
        // Background Colors
        'bg-primary': '#FFFFFF', // White background for cards, sections, etc.
        'bg-secondary': '#F5F5F5', // Light gray background for hover states or secondary areas
        'bg-accent': '#FF9800', // Accent background, perhaps for active buttons or highlights
        // Border Color
        'border-primary': '#EEEEEE', // Light gray borders
        'border-accent': '#FF5722', // Accent color for active borders or selected items
        // Star Colors
        'star-filled': '#FFEB3B', // Yellow for filled stars
        'star-empty': '#E0E0E0', // Gray for unfilled stars
      },
    },
  },
  plugins: [],
}
