var masonry = new Macy({
    container: '#macy-container',
    trueOrder: false,
    waitForImages: false,
    useOwnImageLoader: false,
    debug: true,
    mobileFirst: true,
    columns: 1,
    margin: 2,
    breakAt: {
        1200: 2,
        992: 3,
        768: 2,
        480: 1
    }
});
