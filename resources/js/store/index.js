import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== "production";

export default new Vuex.Store({
    state: {
        posts: []
    },
    actions: {
        async getAllPosts({commit}){
            let response = await fetch('http://127.0.0.1:8000/post/get_all').then(res=> res.json());
            console.log(response.data)
            return commit('setPosts', response);
        }
    },
    mutations: {
        setPosts(state, response){
            state.posts=response.data;
        }
    },
    strict: debug
})