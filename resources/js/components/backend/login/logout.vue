<template>
  <div></div>
</template>

<script>
export default {
  name: "logout",
  mounted() {
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    Toast.fire({
      icon: "success",
      title: "Successfully Logout",
    });

    this.$router.push({ name: "login_admin" });
  },

  methods: {},
};
</script>