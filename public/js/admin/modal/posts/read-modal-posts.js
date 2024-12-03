function setRatingStars(){
    const rating = document.querySelector(".postAvaliation").textContent;
    const $stars = document.querySelectorAll(".star");

    const fullStars = Math.floor(rating);
    const halfStars = (rating % 1) >= 0.5 ? 1 : 0;

    for(let i = 0; i < $stars.length; i++){
        if(i < fullStars){
            $stars[i].classList.add("full");
            $stars[i].classList.remove("half", "empty");
        }
        else if(i < fullStars + halfStars){
            $stars[i].classList.add("half");
            $stars[i].classList.remove("full", "empty");
        }else{
            $stars[i].classList.add("empty");
            $stars[i].classList.remove("full", "half");
        }
    }
}
setRatingStars();
