/* Definindo o botão de home do navbar*/
const $nomeDoSiteNoHome = document.querySelector('#home').firstElementChild;
let letras = $nomeDoSiteNoHome.textContent.trim().split('');
let posicao = 1;

$nomeDoSiteNoHome.innerHTML = letras.map(letra =>{
    if(letra == " "){ 
        posicao == 3 ? posicao = 1 : posicao++; 
        return ` `;
    };
    switch(posicao){
        case 1: posicao++; 
                return `<span style = "color: #237ECD;">${letra}</span>`; 
                break;
        case 2: posicao++; 
                return `<span style = "color: #FFC739;">${letra}</span>`;
                break;
        case 3: posicao = 1;
                return `<span style = "color: #C70E37;">${letra}</span>`;
                break;
   };
}).join('');

const $home = document.querySelector('#home');

const $logoPlayStroll = document.createElement('img');
$logoPlayStroll.src = '/public/assets/logo-escura-sem-fundo.png';
$logoPlayStroll.alt = 'Logo da PlayStroll';

$home.appendChild($logoPlayStroll);