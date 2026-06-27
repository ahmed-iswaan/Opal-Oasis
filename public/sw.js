const CACHE_NAME = 'opal-oasis-v2';
const PRECACHE_URLS = [
    '/',
    '/assets/images/optimized/hero-guest-house.jpg',
    '/assets/images/optimized/logo-nav.png',
    '/assets/images/optimized/logo-gold.png',
    '/assets/images/optimized/guest-house-entrance.jpg',
    '/assets/images/optimized/guest-house-exterior.jpg',
    '/assets/images/optimized/guest-house-detail.jpg',
    '/assets/images/optimized/room-garden-double.jpg',
    '/assets/images/optimized/room-family.jpg',
    '/assets/images/optimized/room-premium-double.jpg',
    '/assets/images/optimized/room-signature-double.jpg'
];

self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open(CACHE_NAME).then(function (cache) {
            return cache.addAll(PRECACHE_URLS);
        })
    );
    self.skipWaiting();
});

self.addEventListener('activate', function (event) {
    event.waitUntil(
        caches.keys().then(function (keys) {
            return Promise.all(keys.map(function (key) {
                if (key !== CACHE_NAME) {
                    return caches.delete(key);
                }
            }));
        })
    );
    self.clients.claim();
});

self.addEventListener('fetch', function (event) {
    if (event.request.method !== 'GET') {
        return;
    }

    event.respondWith(
        caches.match(event.request).then(function (cachedResponse) {
            if (cachedResponse) {
                return cachedResponse;
            }

            return fetch(event.request).then(function (networkResponse) {
                var responseClone = networkResponse.clone();

                if (networkResponse.ok) {
                    caches.open(CACHE_NAME).then(function (cache) {
                        cache.put(event.request, responseClone);
                    });
                }

                return networkResponse;
            });
        })
    );
});
