<template>
  <div class="row">
    <div class="col-md-6" v-for="(post, i) in posts" :key="i">
      <div class="card mt-4">
        <img
          v-if="post.post_images.length"
          class="card-img-top h-48 w-full"
          :src="post.post_images[0].post_image_path"
        />
        <div class="card-body">
          <p class="card-text">
            <strong>{{ post.title }}</strong>
          </p>
        </div>
        <a class="text-white bg-blue-500 p-2 rounded m-2" :href="'/post/'+post.id">View Post</a>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  name: "all-posts",
  data() {
    return {
      postDialogVisible: false,
      currentPost: ""
    };
  },
  computed: {
    ...mapState(["posts"])
  },
  beforeMount() {
    this.$store.dispatch("getAllPosts");
  }
};
</script>

<style>
.card-text{
  @apply text-purple-700;
}
</style>
