/* eslint-disable */
declare module '*.vue' {
  import type { DefineComponent } from 'vue'
  const component: DefineComponent<{}, {}, any>
  export default component
}
document.addEventListener("DOMContentLoaded", () => {
  feather.replace();
});
declare module 'bootstrap'
declare module 'feather-icons';
