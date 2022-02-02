function turnVisibility(key) {
    let element = $(`#${key}`)[0];
    element.isShowing = !(element.isShowing);
    if (element.isShowing) {
        $(`#${key}`).addClass('active');
    } else {
        $(`#${key}`).removeClass('active');
    }

    let displayA = (element.isShowing) ? 'show' : 'hide';
    let displayB = !(element.isShowing) ? 'show' : 'hide';
    console.log(displayB);
    $(`#${key} .pedido__lineas`).addClass(displayA).removeClass(displayB);
}