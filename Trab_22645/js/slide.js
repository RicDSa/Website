
/* funcao para trocar a imagem */
function mostraImagem(valor)
{
    console.log(valor);
    // alternar imagem
    Imagem(Sindice+=valor);
}
Sindice=1;
Imagem(Sindice);
function Imagem(indice)
{
    im=document.getElementsByClassName("slide");
    console.log(im.length);
    // validar se chegamos à ultima posição
    if(indice>im.length){Sindice=1;}
    // validar a posição minima
    if(indice<1){Sindice=im.length;}
    // esconder imagens
    for(i=0;i<im.length;i++)
    {
        im[i].style.display="none";
    }

    // mostrar imagem
    im[Sindice-1].style.display="block";
}