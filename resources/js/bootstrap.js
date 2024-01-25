import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: "pusher",
    key: 'key',
    wsHost: window.location.hostname,
    wsPort: 6001,
    wssPort: 6001,
    cluster: 'mtl',
    disableStats: true,
    forceTLS: true,
    enabledTransports: ["ws", "wss"],
});