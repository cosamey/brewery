import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';
import mask from '@alpinejs/mask';
import ui from '@alpinejs/ui';

import checkout from './alpine/checkout';

Alpine.plugin(collapse);
Alpine.plugin(focus);
Alpine.plugin(mask);
Alpine.plugin(ui);

Alpine.data('checkout', checkout);

window.Alpine = Alpine;

Alpine.start();
