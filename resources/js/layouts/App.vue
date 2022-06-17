<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Shiny Memory</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link
                class="nav-link"
                data-toggle="collapse"
                :to="{ name: 'level' }"
              >
                Add
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                class="nav-link"
                data-toggle="collapse"
                :to="{ name: 'multipleOperator' }"
              >
                Multiple
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                class="nav-link"
                data-toggle="collapse"
                :to="{ name: 'old' }"
              >
                Old
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {};
</script>