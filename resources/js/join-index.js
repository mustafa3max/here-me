Echo.channel("room.1").listen("JoinIndexEvent", (e) => {
    console.log(e);
});
