<template>
  <nav v-if="breadcrumbs.length > 0" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li
        v-for="(item, id) in breadcrumbs"
        :key="`crumb-${id}`"
        class="breadcrumb-item align-items-center"
        :class="item.isActive && 'active'"
      >
        <fa-icon
          v-if="item.icon"
          :icon="item.icon"
          class="mr-1 text-muted"
        ></fa-icon>
        <router-link
          v-if="item.to && !item.isActive"
          :to="item.to"
          v-text="item.text"
        ></router-link>
        <span v-else v-text="item.text"></span>
      </li>
    </ol>
  </nav>
</template>

<script>
export default {
  name: "Breadcrumb",

  computed: {
    breadcrumbs: function () {
      /**************************************************************************************************
       * Untuk menjadikan breadcrumb aaa > bbbb > ccc > dddd, maka harus membuat children pada router
       * Sehingga $route.matched akan berisi array sesuai children / nested route
       * NOTE: Khusus breadcrumb disini, diawali dengan Home route.
       * Nah jika ada route /aaa/bbb/ccc yg tidak dalam children route, maka dianggap root base.
       * NOTE! Jika menginginkan breadcrumb bernested, maka pastikan membuat children dalam router.
       */

      if (this.$route.path === "/") {
        return [{ text: "Home", icon: ["fas", "home"] }];
      }

      const splittedPaths = this.$route.path.split("/").filter((x) => x);
      const matched = this.$route.matched;

      const crumbs = splittedPaths.reduce((crumbArray, itemPath, index) => {
        const itemMatched = matched[index];
        if (itemMatched) {
          crumbArray.push({
            to: itemMatched.path,
            text: itemMatched.name || itemMatched.meta.name || itemPath,
          });
        }

        return crumbArray;
      }, []);

      if (crumbs.length > 0) {
        crumbs.unshift({ to: "/", text: "Home", icon: ["fas", "home"] });
      }

      /***********************************************************************
       * Kenapa dibuat seperti ini? Dikarenakan semisal path /user/stats
       * tidak dalam children route sehingga path tersebut displit jadi 2,
       * tetapi $route.matched hanya berisi 1 array.
       * Sehingga menentukan last index sebagai sebagai current page (isActive)
       * untuk dibuat disable link menjadi tidak tepat
       */
      // return crumbs.map((el, index) => {
      //   // Auto-detect active by position in list as last
      //   el.isActive = index + 1 === crumbs.length;
      //   return el;
      // });

      if (crumbs[crumbs.length - 1]) {
        crumbs[crumbs.length - 1].isActive = true;
      }

      return crumbs;
    },
  },
};
</script>
