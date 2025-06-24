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
          '0%': { transform: 'translateX(0%)' },
          '100%': { transform: 'translateX(-50%)' },
        },
        'slide-and-color': {
          '0%': {
            transform: 'translateX(-50%)',
            backgroundColor: '#22d3ee' // cyan-400
          },
          '100%': {
            transform: 'translateX(50%)',
            backgroundColor: '#fbbf24' // amber-400
          },
        },
        marquee: {
          '0%': { transform: 'translateX(100%)' },
          '100%': { transform: 'translateX(-100%)' },
        },
        bounce: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-40%)' }
        },
      },
      animation: {
        slide: 'slide 3s linear infinite',
        'slide-fast': 'slide 0.5s ease-out forwards',
        'slide-and-color': 'slide-and-color 3s ease-in-out infinite alternate',
        'slow-bounce': 'bounce 2s infinite',
        marquee: 'marquee 30s linear infinite',
       
      },
    },
  },
  plugins: [],
};
