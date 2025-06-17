module.exports = {
  content: [
    "./templates/**/*.{twig,php}",
    "./templates/partials/**/*.{twig,php}",
    "./templates/components/**/*.{twig,php}",
    "./*.php"
  ],
  theme: {
    extend: {
      keyframes: {
        slide: {
          '0%': { transform: 'translateX(-100%)' },
          '100%': { transform: 'translateX(100%)' },
        },
        'slide-and-color': {
          '0%': { transform: 'translateX(-50%)', backgroundColor: '#22d3ee' }, // cyan-400
          '100%': { transform: 'translateX(50%)', backgroundColor: '#fbbf24' }, // amber-400
        },
      },
      animation: {
        slide: 'slide 3s linear infinite',
        'slide-fast': 'slide 0.5s ease-out forwards',
        'slide-and-color': 'slide-and-color 3s ease-in-out infinite alternate',
        'slow-bounce': 'bounce 2s infinite',
      },
    },
  },
  plugins: [],
}
