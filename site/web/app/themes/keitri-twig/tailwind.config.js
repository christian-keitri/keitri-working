/** @type {import('tailwindcss').Config} */
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
        marquee: {
          '0%': { transform: 'translateX(0%)' },
          '100%': { transform: 'translateX(-50%)' },
        },
        'slide-and-color': {
          '0%': {
            transform: 'translateX(-50%)',
            backgroundColor: '#22d3ee',
          },
          '100%': {
            transform: 'translateX(50%)',
            backgroundColor: '#fbbf24',
          },
        },
        bounce: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-40%)' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-5%)' },
        },
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
      },
      animation: {
        marquee: 'marquee 30s linear infinite',
        'slide-and-color': 'slide-and-color 3s ease-in-out infinite alternate',
        'slow-bounce': 'bounce 2s infinite',
        float: 'float 3s ease-in-out infinite',
        'float-slow': 'float 5s ease-in-out infinite',
        'fade-in': 'fadeIn 1s ease-out forwards',
        'fade-in-up': 'fadeInUp 1s ease-out forwards',
        'fade-in-up-delay': 'fadeInUp 1s ease-out forwards 0.3s',
      },
    },
  },
  plugins: [],
}
