import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Frontend from "./Shared/Layouts/Frontend";
import { reduce } from 'lodash'

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;

    if (page.layout === undefined) {
        page.layout = Frontend;
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el)
  },

  title: title => title + " - Monstrous Light Games"
})

InertiaProgress.init({
    color: 'red',
    showSpinner: true,
});
