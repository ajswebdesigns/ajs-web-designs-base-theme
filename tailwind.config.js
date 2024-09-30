/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: '#B80A0C',
        secondary: '#ed0000',
        accent: '#8D0003',
        gray: "#F2F2F2",
        graymedium: "#E7E7E7",
        graylight: "#EFEFEF",
        darkgray: "#34373D"
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            h1: {
              color: theme('colors.black'),
              fontWeight: 'bold',
              fontSize: theme('fontSize.4xl'), // 36px
              lineHeight: theme('lineHeight.tight'), // 40px
            },
            h2: {
              color: theme('colors.black'),
              fontWeight: 'bold',
              fontSize: theme('fontSize.3xl'), // 30px
              lineHeight: theme('lineHeight.snug'), // 36px
            },
            h3: {
              color: theme('colors.black'),
              fontWeight: 'bold',
              fontSize: theme('fontSize.2xl'), // 24px
              lineHeight: theme('lineHeight.normal'), // 32px
            },
            h4: {
              color: theme('colors.black'),
              fontWeight: 'bold',
              fontSize: theme('fontSize.xl'), // 20px
              lineHeight: theme('lineHeight.relaxed'), // 28px
            },
            h5: {
              color: theme('colors.black'),
              fontWeight: 'bold',
              fontSize: theme('fontSize.lg'), // 18px
              lineHeight: theme('lineHeight.normal'), // 24px
            },
            h6: {
              color: theme('colors.black'),
              fontWeight: 'bold',
              fontSize: theme('fontSize.base'), // 16px
              lineHeight: theme('lineHeight.normal'), // 24px
            },
            a: {
              color: theme('colors.primary'), // Links are primary color by default
              textDecoration: 'none',
              fontWeight: 'bold', // Always bold
              transition: 'color 0.3s ease', // Smooth color transition
              '&:hover': {
                color: theme('colors.black'), // Change to black on hover
              },
            },
          },
        },
      }),
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
