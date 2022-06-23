<template>
  <div class="container">
    <div class="copy-container center-xy">
      <p>404, page not found.</p>
    </div>
  </div>
</template>

<script>
export default {
    name: 'NotFoundPages'
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css?family=Roboto+Mono");

.center-xy {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
}

html,
body {
  font-family: "Roboto Mono", monospace;
  font-size: 16px;
}

html {
  box-sizing: border-box;
  user-select: none;
}

body {
  background-color: rgb(255, 255, 255);
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

.container {
  width: 100%;
}

.copy-container {
  text-align: center;
}

p {
  color: rgb(0, 0, 0);
  font-size: 24px;
  letter-spacing: 0.2px;
  margin: 0;
}
</style>
