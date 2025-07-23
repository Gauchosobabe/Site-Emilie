const slide = ["lampadaire.jpg", "NAIKA.png", "papillonblanc.jpg"]
let numero = 0




function ChangeSlide(sens) {
    numero = numero + sens;
    if (numero > slide.length -1)
        numero = 0;
    if (numero < 0)
        numero = slide.length -1;
    document.getElementById("slide").src = "images/" + slide[numero];
}
setInterval("ChangeSlide(1)", 4000)