function getContrast50(hexcolor) {
    hexcolor = hexcolor.replace('#', '');

    return (parseInt(hexcolor, 16) > 0xffffff/2) ? 'black' : 'white';
}

function resetColor() {
    this.style.backgroundColor = '#ffffff';
    this.style.color = '#000000';
}


document.addEventListener('DOMContentLoaded', () => {
    /**
     * Thin UI Color Well
     *
     * Basic color changer to replace the native color picker
     */
    if (document.querySelector('.color-well')) {
        [].forEach.call(document.querySelectorAll('.color-well'), (colorWell) => {
            colorWell.style.backgroundColor = colorWell.value;
            colorWell.addEventListener('input', resetColor, false);
            colorWell.addEventListener('click', resetColor, false);
            colorWell.addEventListener('blur', () => {
                this.style.backgroundColor = this.value;
                this.style.color = getContrast50(this.value);
            });
        });
    }
});
