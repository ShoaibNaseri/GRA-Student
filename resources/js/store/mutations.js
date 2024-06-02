export default {
  login(state) {
    state.loggedIn = true;
  },
  logout(state) {
    state.loggedIn = false;
  },
   SET_CURRENT_ROUTE(state, route) {
    state.currentRoute = route
  }
  // Add other mutations as needed
};
