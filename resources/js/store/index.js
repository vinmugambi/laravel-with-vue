import Vue from 'vue';
import Vuex from 'vuex';

import api from "../api";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== "production";

export default new Vuex.Store({
    state: {
        posts: []
    },
    actions: {
        async getAllPosts({commit}){
            let response = await api.get('post/get_all');
            return commit('setPosts', response);
        }
    },
    mutations: {
        setPosts(state, response){
            state.posts=response.data.data;
        }
    },
    strict: debug
})