// Asignar nombre y version de la cache
const CACHE_NAME = 'api';

//ficheros
var urlsToCache = [
	'./',
	'./assets/stylesheet.css',
	'./assets/img/logo.png',
	'./assets/img/clash.png'
];

// instal event
//instalacion del service workery guardar cache recursos estaticos
self.addEventListener('install', e => {
	e.waitUntil(
		caches.open(CACHE_NAME)
				.then(cache => {
					return cache.addAll(urlsToCache)
								.then(() => {
									self.skipWaiting();
								});
				})
				.catch(err => console.log('no se guardo el cache', err))
				);
});

//evento activate
//app sin conexion
self.addEventListener('activate',e => {
	const cacheWhitelist = [CACHE_NAME];
	
	e.waitUntil(
		caches.keys()
				.then(cacheNames => {
					return Promise.all(
						cacheNames.map(cacheName => {
							
							if(cacheWhitelist.indexOf(cacheName) === -1){
								//borrar elementos que no se necesitan
								return caches.delete(cacheName);
							}
						
						})
					);
				})
				.then(() => {
					//activar cache
					self.clients.claim();
					
				})
	);
});

//evento fecth
self.addEventListener('fetch',e => {
	e.respondWith(
		caches.match(e.request)
				.then(res => {
					if(res){
						//devuleov datos desde cache
						return res;
					}
					return fetch(e.request);
				})
	
	);
});




