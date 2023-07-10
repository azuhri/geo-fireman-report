module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
      extend: {
        fontFamily: {
          'poppins': ['Poppins', 'sans-serif']
        },
      },
  },
  plugins: [require("tw-elements/dist/plugin.cjs")],
  darkMode: "class"
}
