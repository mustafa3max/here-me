Echo.join("ready." + Alpine.store("index").currentPage)
    .here((users) => {
        Alpine.store("index").usersNow = users;
    })
    .joining((user) => {
        Alpine.store("index").usersNow.push(user);
    })
    .leaving((user) => {
        const index = Alpine.store("index").usersNow.indexOf(user);
        Alpine.store("index").usersNow.splice(index, 1);
    });

Echo.private("waiting." + Alpine.store("index").userId).listenForWhisper(
    "index",
    (e) => {
        Alpine.store("index").roomId = e.roomId;
        Alpine.store("index").userIdHe = e.userIdHe;
        Alpine.store("index").nameHe = e.nameHe;
    }
);

Echo.join("waiting." + Alpine.store("index").userId).leaving((_) => {
    Alpine.store("index").roomId = null;
    Alpine.store("index").userIdHe = null;
});
