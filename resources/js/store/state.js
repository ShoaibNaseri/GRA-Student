export default {
   loggedIn: !!localStorage.getItem('token'),
   // In your Vuex store module
  currentRoute: '/'
  // Add other state properties as needed
};
