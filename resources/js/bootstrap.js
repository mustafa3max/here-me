import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: import.meta.env.VITE_PUSHER_PORT,
    // wssPort: 6001,
    cluster: "",
    disableStats: false,
    forceTLS: false,
    // enabledTransports: ["ws", "wss"],
});
