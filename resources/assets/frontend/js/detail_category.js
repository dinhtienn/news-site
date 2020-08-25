var masonry = new Macy({
    container: '#macy-container',
    trueOrder: false,
    waitForImages: false,
    useOwnImageLoader: false,
    debug: true,
    mobileFirst: true,
    columns: 1,
    margin: 30,
    breakAt: {
        1200: 3,
        992: 3,
        768: 2,
        480: 2
    }
});
