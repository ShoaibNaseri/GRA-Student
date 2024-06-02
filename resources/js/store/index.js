import { createStore } from "vuex";


import mutations from "./mutations";
import state from "./state";
import actions from "./actions";

const store = createStore({
    mutations,
    state,
    actions
});

export default store;
